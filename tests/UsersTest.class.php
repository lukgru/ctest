<?php

require_once 'PHPUnit/Autoload.php';
require_once "PHPUnit/Extensions/Database/TestCase.php";

class UsersTest extends PHPUnit_Extensions_Database_TestCase
{

    protected $pdo;

    public function __construct()
    {
        
    }

    public function getConnection()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=pearnet_ctest", "pearnet_ctest", "t73GWAJBHkbDO");
        return $this->createDefaultDBConnection($this->pdo, 'pearnet_ctest');
    }

    public function setUp()
    {
        parent::setUp();

        require_once '../inc/controllers/FrontController.class.php';
        FrontController::autoloaderInit();
        \inc\registry\ApplicationRegistry::getInstance()->set("pdo", $this->pdo);
    }

    public function testGetUser()
    {
        $user = \inc\Users::getUser(16);
        $this->assertInstanceOf("\inc\User", $user);
    }

    public function testGetUserFriends()
    {
        $user = \inc\Users::getUser(16);
        $userFriends = \inc\Users::getUserFriends($user);
        $userFriendsIds = array_keys($userFriends);
        sort($userFriendsIds);
        $this->assertEquals(array(18, 20), $userFriendsIds);
    }

    public function testGetUserFriendsFriends()
    {
        $user = \inc\Users::getUser(16);
        $userFriendsFriends = \inc\Users::getUserFriendsFriends($user);
        $userFriendsIds = array_keys($userFriendsFriends);
        sort($userFriendsIds);
        $this->assertEquals(array(7, 11, 12, 13, 17, 19), $userFriendsIds);
    }

    public function testGetUserFriendsFriendsWith2Connections()
    {
        $user = \inc\Users::getUser(16);
        $userFriendsFriendsWith2Connections = \inc\Users::getUserFriendsFriendsWith2Connections($user);
        $userFriendsIds = array_keys($userFriendsFriendsWith2Connections);
        sort($userFriendsIds);
        $this->assertEquals(array(17), $userFriendsIds);
    }

    public function getDataSet()
    {
        return $this->createMySQLXMLDataSet('database.xml');
    }

    public function tearDown()
    {
        
    }

}