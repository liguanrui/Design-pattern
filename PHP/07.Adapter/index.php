<?php

namespace PHP\Adapter;

function main()
{
    $m = (new Message(new EmailNotification('liguanrui@aipai.com')));
    $m->sayHi();
    $m->sayBye();

    $m = (new Message(new WechatNotification('TyIA145U34UUR44123')));
    $m->sayHi();
    $m->sayBye();
}

interface Notification
{
    public function send(string $text);
}

class EmailNotification implements Notification
{
    public $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function send(string $text)
    {
        echo "Send Email by $this->email:".$text.PHP_EOL;
    }
}

class WechatNotification implements Notification
{
    public $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function send(string $text)
    {
        echo "Send Wechat by $this->token:".$text.PHP_EOL;
    }
}

class Message
{
    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function sayBye()
    {
        echo $this->notification->send('bye!');
    }

    public function sayHi()
    {
        echo $this->notification->send("hi!");
    }
}

main();
