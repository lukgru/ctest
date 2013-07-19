<?php

class UserTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        require_once '../inc/user.class.php';
    }

    public function testSetId()
    {
        $user = new inc\User();
        $user->setId(1);
        $this->assertEquals(1, $user->getId());
    }

    public function testSetName()
    {
        $user = new inc\User();
        $user->setName("Łukasz");
        $this->assertEquals("Łukasz", $user->getName());
    }
    
    public function testSetSurname()
    {
        $user = new inc\User();
        $user->setSurname("Gruszka");
        $this->assertEquals("Gruszka", $user->getSurname());
    }
    
    public function testSetAge()
    {
        $user = new inc\User();
        $user->setAge(29);
        $this->assertEquals(29, $user->getAge());
    }
    
    public function testSetGender()
    {
        $user = new inc\User();
        $user->setGender("m");
        $this->assertEquals("m", $user->getGender());
    }

    public function tearDown()
    {
        
    }

}

?>