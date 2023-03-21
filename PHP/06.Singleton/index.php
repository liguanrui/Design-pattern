<?php

namespace PHP\Singleton;

function main()
{
    $c1 = Cache::getInstance();
    $c2 = Cache::getInstance();


    if ($c1 === $c2) {
        echo "this is a single instance. happy.";
    } else {
        echo "this is not single instance.";
    }
}

class Cache
{
    private static $instance;

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            return self::$instance = new static();
        } else {
            return self::$instance;
        }
    }


}

main();
