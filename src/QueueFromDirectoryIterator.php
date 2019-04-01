<?php namespace S25\Queue;

class QueueFromDirectoryIterator extends QueueFrom
{
    private $dir;
    public function __construct($key, \DirectoryIterator $dir)
    {
        parent::__construct($key);
        $this->dir = $dir;
    }

    public function generate(): void
    {
        foreach ($this->dir as $fileInfo)
        {
            if($fileInfo->isDot()) continue;
            $this->push($fileInfo->getFilename());
        }
    }
}