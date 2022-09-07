<?php

class Channel extends Chat
{
    public function getMessages()
    {
        return $this->messages;
    }
}