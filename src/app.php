<?php

include '_includes.php';

$member = new Member('username');
$workspace = $member->createWorkspace('example');
