<?php

include '_includes.php';

$member = new Member('username');
$workspace = $member->createWorkspace('example');

// $chat = new Chat('example');
// echonl($chat);

echonl($member);