<?php namespace S25\Queue;

trait QueueNavigation
{
    public function push($value)
    {
        QueueProviderRedis::get()->lpush($this->key, $value);
    }

    public function pop(): ?string
    {
        return QueueProviderRedis::get()->lpop($this->key);
    }

    public function reset()
    {
        QueueProviderRedis::get()->del($this->key);
    }

    public function isExist(): bool
    {
        return QueueProviderRedis::get()->exists($this->key);
    }
}