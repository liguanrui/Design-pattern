<?php

namespace PHP\SimpleFactory;


function main()
{
    $user = SocialFactory::getUserInfo('Google', 'xxxxx');

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
        return new User('F-1','bommcast');
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

    static public function getUserInfo(string $platform, string $code): User
    {
        switch($platform) {
            case "Facebook":
                $plaform = new Facebook('clientId','clientKey');
                break;
            case "Google":
                $platform = new Google('clientId', 'clientKey');
                break;
            default:
                break;
        }

        return $platform->getUser($code);
    }
}
main();
