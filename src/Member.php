<?php

class Member
{
    use HasUniqueId;

    const ADMIN_ROLE = 'admin';
    const DEFAULT_ROLE = 'member';

    public string $role = self::DEFAULT_ROLE;

    public function __construct(
        public string $username,
    )
    {
        $this->setId();
    }

    public function addWorkspaceMember(Member $member, Workspace $workspace)
    {
        $admin = $workspace->getAdmin();

        if (! $admin || $admin->username !== $this->username) {
            echonl('An admin is required to add members to ' . $workspace->getUrl());
            return;
        }

        $workspace->members[] = $member;
    }

    public function createChannel(string $title, Workspace $workspace)
    {
        if (! $workspace->hasMember($this)) {
            echonl('Member must belong to ' . $workspace->getUrl() . ' to create a chat');
            return;
        }

        $channel = new Channel($title);
        $workspace->chats[] = $channel;

        return $channel;
    }

    public function createDirectMessage(array $members, Workspace $workspace)
    {
        if (! $workspace->hasMember($this)) {
            echonl('Member must belong to ' . $workspace->getUrl() . ' to create a chat');
            return;
        }

        $members = array_merge([$this], $members);

        $dm = new DirectMessage($members);
        $workspace->chats[] = $dm;

        return $dm;
    }

    public function createWorkspace(string $subdomain)
    {
        $workspace = new Workspace($subdomain, $this);

        return $workspace;
    }

    public function postMessageToChat(string $content, Chat $chat)
    {
        $chat->addMessage($this, $content);
    }
}