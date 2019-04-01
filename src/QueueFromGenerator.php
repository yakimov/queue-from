<?php namespace S25\Queue;

class QueueFromGenerator extends QueueFrom
{
    private $object;

    public function __construct($key, \Generator $object)
    {
        parent::__construct($key);
        $this->object = $object;
    }

    public function generate(): void
    {
        foreach ($this->object as $object)
        {
            $this->push($object);
        }
    }
}