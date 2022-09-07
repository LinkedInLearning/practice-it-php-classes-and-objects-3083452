<?php

trait HasUniqueId
{
    private string $id;

    public function setId()
    {
        $this->id = strtolower(get_class($this) . '_' . uniqid());
    }

    public function getId()
    {
        return $this->id;
    }
}
