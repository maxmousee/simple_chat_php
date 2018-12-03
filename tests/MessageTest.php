<?php  
  
require_once 'api/User.php';
require_once 'api/Message.php';

use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase  
{
    public function testSendMessage()
    {
        $username = "sender1";
        $to_username = "maxmouse";
        $text = "a test message";
        User::createUser($username);
        Message::sendMessage($username, $to_username, $text);
    }

    public function testNotSendMessageNonExistentSender()
    {
        $this->expectException(Exception::class);
        $username = "sender2";
        $to_username = "maxmouse";
        $text = "a test message";
        Message::sendMessage($username, $to_username, $text);
    }

    public function testNotSendMessageNonExistentReceiver()
    {
        $this->expectException(Exception::class);
        $username = "maxmouse";
        $to_username = "invaliduser";
        $text = "a test message";
        Message::sendMessage($username, $to_username, $text);
    }
}