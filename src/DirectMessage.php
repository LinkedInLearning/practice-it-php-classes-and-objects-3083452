<?php

class DirectMessage extends Chat implements Joinable
{
    public array $memberUsernames = [];

    public function __construct(
        public array $members,
    ) {
        $this->memberUsernames = array_map(fn($member) => $member->username, $members);

        $title = implode(', ', $this->memberUsernames);

        parent::__construct($title);
    }

    public function addMessage(Member $postedBy, string $content)
    {
        if (! $this->hasMember($postedBy)) {
            echonl('Message could not be posted:');
            echonl($postedBy->username . ' does not have access to this chat.');
            return;
        }

        $message = new Message($content, $postedBy->username);

        $this->messages[] = $message;
    }

    public function getMessages(Member $accessedBy)
    {
        if (! $this->hasMember($accessedBy)) {
            echonl('Messages could not be retrieved:');
            echonl($accessedBy->username . ' does not have access to this chat.');
            return;
        }

        return $this->messages;
    }

    public function hasMember(Member $member)
    {
        return in_array($member->username, $this->memberUsernames);
    }
}