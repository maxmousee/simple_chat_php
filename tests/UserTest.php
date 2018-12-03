<?php  
  
require_once 'api/User.php';

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase  
{

    public function testCreateUser()
    {
        $username = "amado batista";
        $result = User::createUser($username);
        $this->assertEquals(TRUE, $result);
    }

    public function testShouldNotCreateUserWithExistingUsername()
    {
        $username = "paidefamilia";
        $result = User::createUser($username);
        $this->assertEquals(FALSE, User::createUser($username));
    }

    public function testShouldGetBootstrappedUser()
    {
        $username = "maxmouse";
        $result = User::getUserIdByUserName($username);
        $this->assertEquals(TRUE, $result);
    }

    public function testShouldNotGetInexistentUser()
    {
        $username = "toby";
        $result = User::getUserIdByUserName($username);
        $this->assertEquals("", $result);
    }
}