<?php

class Workspace implements Joinable
{
    private string $url;
    public array $chats = [];
    public array $members = [];

    public static string $urlDomain = '.flack.app';

    public function __construct(
        public string $subdomain,
        public Member $admin,
    )
    {
        $this->setUrl($subdomain);
        $this->setAdmin($admin);
    }

    public function setUrl(string $subdomain)
    {
        $this->url = $subdomain . self::$urlDomain;
    }

    public function setAdmin(Member $admin)
    {
        $admin->role = Member::ADMIN_ROLE;

        $this->members[] = $admin;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getAdmin()
    {
        $search = array_filter($this->members, function ($member) {
            if ($member->role !== Member::ADMIN_ROLE) {
                return;
            }

            return $member;
        });

        return empty($search) ? false : $search[0];
    }

    public function hasMember(Member $member)
    {
        return in_array(
            $member->username,
            array_map(fn($member) => $member->username, $this->members)
        );
    }
}