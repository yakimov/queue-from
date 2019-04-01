<?php namespace S25\Queue;

use Predis\Client as Redis;

class QueueProviderRedis
{
    private static $redis;

    public static function get()
    {
        if(!isset(self::$redis))
        {
            self::$redis = new Redis([
                'scheme'   => 'tcp',
                'host'     => 'localhost',
                'port'     => 6379,
                'database' => 0
            ]);
        }
        return self::$redis;
    }
}