<?php

namespace PHP\FactoryMethod;


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

    abstract protected function getAccessToken(string $code): string;

    abstract public function getUser($accessToken): User;

}

class Facebook extends SocialPlatform
{

    protected function getAccessToken(string $code): string
    {
        // code to token
        return 'Get Facebook AccessToken.';
    }

    public function getUser($code): User
    {
        $this->getAccessToken($code);
        // get User Info
        return new User('F-1','Cat');
    }
}

class Google extends SocialPlatform
{

    protected function getAccessToken(string $code): string
    {
        // code to token
        return 'Get Google AccessToken.';
    }

    public function getUser($code): User
    {
        $this->getAccessToken($code);
        // get User Info
        return new User('G-2','dog');
    }

}

class SocialFactory
{

    static public function getUserInfo(SocialPlatform $platform, string $code): User
    {
        return $platform->getUser($code);
    }
}
main();
