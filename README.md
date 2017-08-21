# Get User  courses

## Description
Referring to [MDL-47229](https://tracker.moodle.org/browse/MDL-47229) the function core_enrol_get_users_courses return only visible courses.

This plugin can be used to retrieve the courses of a given user in Moodle by providing the USER ID

## How it works
1. Install plugin in Moodle
2. Enable WebServices
3. Assign the function to the web service user
4. Send a request to the server
> http://[moodleurl]/webservice/rest/server.php?wstoken=[YOURTOKEN]&wsfunction=local_wsgetusercourses&userid=18&moodlewsrestformat=json

### Parameters
```php
int  Default to "null" //The ID of the user"
```
### Returns
```php
object {
    cohorts list of (
        object {
            id int   //Cohort ID
            shortname string   //Cohort id number
            fullname string   //Cohort name
        }
    )
}
```
### Change log