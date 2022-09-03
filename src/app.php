<?php

include '_includes.php';

$member = new Member();
$workspace = new Workspace();
$chat = new Chat();
$message = new Message();

echonl(get_declared_classes());

echonl($workspace);