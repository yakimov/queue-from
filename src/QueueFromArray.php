<?php namespace S25\Queue;

class QueueFromArray extends QueueFrom
{
    private $object;

    public function __construct($key, array $object)
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