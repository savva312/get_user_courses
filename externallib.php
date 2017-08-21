<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Get User Cohorts
 *
 * @package    Get User Cohorts
 * @copyright  2016 Christos Savva
 */
defined('MOODLE_INTERNAL') || die();
require_once($CFG->libdir . "/externallib.php");

class local_wsgetusercourses_external extends external_api {

    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function get_user_courses_parameters() {
        return new external_function_parameters(
                array('userid' => new external_value(PARAM_INT, 'The ID of the user"', VALUE_DEFAULT))
        );
    }

    /**
     * Returns welcome message
     * @return string welcome message
     */
    public static function get_user_courses($userid = null) {
        global $USER, $DB;

        // Parameter validation.
        // REQUIRED!
        $params = self::validate_parameters(self::get_user_courses_parameters(),
                array('userid' => $userid));

        $context = get_context_instance(CONTEXT_USER, $USER->id);
        self::validate_context($context);

        if (!has_capability('moodle/user:viewdetails', $context)) {
            throw new moodle_exception('cannotviewprofile');
        }

        $courses = enrol_get_all_users_courses($params['userid'], true, NULL, 'visible DESC,sortorder ASC');

        $returndata = array();
        $coursestobereturned = array();
        foreach ($courses as $c) {
            $item = array(
                'id' => $c->id,
                'shortname'=> $c->shortname,
                'fullname'=> $c->fullname
            );
            array_push($coursestobereturned, $item);
        }
        //var_dump($coursestobereturned);
        $returndata['courses'] = $coursestobereturned;
        return $returndata;
    }
    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function get_user_courses_returns() {
        return new external_single_structure(
            array(
                'courses' => new external_multiple_structure(
                    new external_single_structure(
                        array(
                            'id' => new external_value(PARAM_INT, 'Course ID'),
                            'shortname' => new external_value(PARAM_RAW, 'Course id number'),
                            'fullname' => new external_value(PARAM_RAW, 'Course name'),
                        )
                    )
                )
            )
        );
    }

}
