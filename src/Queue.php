<?php namespace S25\Queue;

class Queue
{
    use QueueNavigation;
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function getGenerator($source = []): GeneratorInterface
    {
        if($source instanceof \Generator)
        {
            return new QueueFromGenerator($this->key, $source);
        }
        elseif ($source instanceof \DirectoryIterator)
        {
            return new QueueFromDirectoryIterator($this->key, $source);
        }

        return new QueueFromArray($this->key, $source);
    }

    public function generateIfNotExist($items): void
    {
        if(!$this->isExist())
        {
            $this->getGenerator($items)->generate();
        }
    }
}