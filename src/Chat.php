<?php

abstract class Chat
{
    protected array $messages = [];

    public function __construct(
        public string $title,
    )
    {
        //
    }

    public function addMessage(Member $postedBy, string $content)
    {
        $message = new Message($content, $postedBy->username);

        $this->messages[] = $message;
    }
}