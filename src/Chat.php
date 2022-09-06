<?php

class Chat
{
    public array $messages = [];

    public function __construct(
        public string $title,
    )
    {
        //
    }
}