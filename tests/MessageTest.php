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
        $result_user = User::createUser($username);
        $result = Message::sendMessage($username, $to_username, $text);
    }

    public function testNotSendMessageNonExistentSender()
    {
        $this->expectException(Exception::class);
        $username = "sender2";
        $to_username = "maxmouse";
        $text = "a test message";
        $result = Message::sendMessage($username, $to_username, $text);
    }

    public function testNotSendMessageNonExistentReceiver()
    {
        $this->expectException(Exception::class);
        $username = "maxmouse";
        $to_username = "invaliduser";
        $text = "a test message";
        $result = Message::sendMessage($username, $to_username, $text);
    }
}