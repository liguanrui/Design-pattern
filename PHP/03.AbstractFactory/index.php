<?php

namespace PHP\AbstractFactory;

function main()
{
    $platform = new Google('clientId', 'clientKey');
    $user = SocialFactory::getUserInfo($platform, 'xxxx');

    print_r($user);

}

class User
{
    public function __construct($uid, $name)
    {
        $this->uid = $uid;
        $this->name = $name;
    }

    public $uid;

    public $name;
}


abstract class SocialPlatform
{
    private $clientId;

    private $clientKey;

    public function __construct(string $clientId, string $clientKey)
    {
        $this->clientId = $clientId;
        $this->clientKey = $clientKey;
    }

    abstract public function getAccessToken(string $code): string;

    abstract public function getUser($accessToken): User;

}

class Facebook extends SocialPlatform
{

    public function getAccessToken(string $code): string
    {
        // code to token
        return 'Get Facebook AccessToken.';
    }

    public function getUser($accessToken): User
    {
        // get User Info
        return new User('F-1','Cat');
    }
}

class Google extends SocialPlatform
{

    public function getAccessToken(string $code): string
    {
        // code to token
        return 'Get Google AccessToken.';
    }

    public function getUser($accessToken): User
    {
        // get User Info
        return new User('G-2','dog');
    }

}

class SocialFactory
{

    static public function getUserInfo(SocialPlatform $platform, string $code): User
    {
        // 抽象工厂与工厂方法是极其相似
        // 抽象工厂把一大堆的操作都集合在工厂内处理而并非在基类/外部中
        $accessToken = $platform->getAccessToken($code);
        $user = $platform->getUser($accessToken);

        // .... more thing todo;
        // save_DB;
        // save_cache;
        // do_queue;
        // ...
        
        return $user;
    }
}
main();
