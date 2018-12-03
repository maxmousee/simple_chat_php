<?php  
require_once 'PHPUnit/Framework.php';  
require_once 'User.php';

class UserTest extends PHPUnit_Framework_TestCase  
{

    public function testCreateUser()
    {
        $username = "amado batista";
        $this->assertEquals(TRUE, User.createUser($username));
    }

    public function testShouldNotCreateUserWithExistingUsername()
    {
        $username = "paidefamilia";
        $result = User.createUser($username);
        $this->assertEquals(FALSE, User.createUser($username));
    }

    public function testShouldGetBootstrappedUser()
    {
        $username = "maxmouse";
        $result = User.getUserIdByUserName($username);
        $this->assertEquals(TRUE, $result);
    }

    public function testShouldNotGetInexistentUser()
    {
        $username = "toby";
        $result = User.getUserIdByUserName($username);
        $this->assertEquals("", $result);
    }
}