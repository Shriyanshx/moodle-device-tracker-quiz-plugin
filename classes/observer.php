<?php

class local_quiz_tracker_observer
{
   // {"eventname":"\\mod_quiz\\event\\attempt_submitted","component":"mod_quiz","action":"submitted","target":"attempt","objecttable":"quiz_attempts","objectid":"55","crud":"u","edulevel":2,"contextid":36,"contextlevel":70,"contextinstanceid":"8","userid":"3","courseid":"2","relateduserid":"3","anonymous":0,"other":{"submitterid":"3","quizid":"5","studentisonline":true},"timecreated":1719423911}

	//Users observers
    public static function attempt_submitted(\mod_quiz\event\attempt_submitted $event) {
        $event_data = $event->get_data();
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $attempt_id = $event_data['objectid'];

        global $DB;

        $DB->insert_record('local_quiz_tracker', array(
            'attempt_id' => $attempt_id,
            'device' => $user_agent,
        ));
    }
}