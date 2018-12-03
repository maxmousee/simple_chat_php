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

    public function testInexistentUser()
    {
        $username = "invaliduser1234";
        $result = User::userExists($username);
        $this->assertEquals(false, $result);
    }

    public function testBootstrappedUserExists()
    {
        $username = "maxmouse";
        $result = User::userExists($username);
        $this->assertEquals(true, $result);
    }
}