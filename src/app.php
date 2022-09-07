<?php

include '_includes.php';

$admin = new Member('acme_admin');

$memberA = new Member('acme_memberA');
$memberB = new Member('acme_memberB');

$workspace = $admin->createWorkspace('acme');
$admin->addWorkspaceMember($memberA, $workspace);
$admin->addWorkspaceMember($memberB, $workspace);

// creating a chat using the Chat class
// $chat = $memberA->createChat('general', $workspace);

$channel = $admin->createChannel('example', $workspace);
$admin->postMessageToChat('Hello', $channel);

$dm = $memberA->createDirectMessage([$memberB], $workspace);
$memberB->postMessageToChat('Hello', $dm);
// admin cannot post to this chat
// $admin->postMessageToChat('Hello', $dm);

echonl($channel->getMessages());
echonl($dm->getMessages($memberB));

// admin cannot get messages for this chat
// echonl($dm->getMessages($admin));