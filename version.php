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
 * @copyright  2017 Christos Savva
 *
 */

defined('MOODLE_INTERNAL') || die();

$plugin->version   = 2017082100;        // The current plugin version (Date: YYYYMMDDXX.
$plugin->requires  = 2014111012;        // Requires this Moodle version.
$plugin->component = 'local_get_user_courses'; // Full name of the plugin (used for diagnostics).
$plugin->release = 1.0;
$plugin->maturity = MATURITY_STABLE;
$plugin->cron = 0; // How often we need chrone to run.
