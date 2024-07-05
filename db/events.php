<?php


defined('MOODLE_INTERNAL') || die();

    $observers = array(
		        array(
            'eventname' => '\mod_quiz\event\attempt_submitted',
            'callback' => 'local_quiz_tracker_observer::attempt_submitted',
        ),
    );