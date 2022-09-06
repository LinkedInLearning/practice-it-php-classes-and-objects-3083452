<?php

class Message
{
    public string $date;

    public function __construct(
        public string $content,
        public string $author,
    )
    {
        $this->date = date('m/d/Y');
    }
}