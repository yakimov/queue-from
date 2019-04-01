<?php namespace S25\Queue;

abstract class QueueFrom implements GeneratorInterface
{
    use QueueNavigation;
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function resetIfKeyExist(): void
    {
        if($this->isExist())
        {
            $this->reset();
        }
    }

    public function resetIfKeyNotExist(): void
    {
        if(!$this->isExist())
        {
            $this->reset();
        }
    }

    abstract public function generate(): void;
}