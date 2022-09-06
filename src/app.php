<?php

include '_includes.php';

$admin = new Member();
$admin->username = 'acme_admin';

$member = new Member();
$member->username = 'acme_member';

$workspace = $admin->createWorkspace('acme');
$admin->addWorkspaceMember($member, $workspace);

echonl($workspace->getUrl());
echonl($workspace->members);

$chat = $member->createChat('general', $workspace);
$member->postMessageToChat('Hello!', $chat);

echonl($chat->messages);

$member2 = new Member();
$member2->username = 'member2';

$member2->createChat('random', $workspace);
