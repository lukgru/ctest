<?php
/**
 * Class which generates users objects
 * Thanks this class we have all user access method in one place
 * We can re-use it in multiple places
 */
namespace inc;

class Users
{
    /**
     * Get user data from database and return user object or false
     * @param integer $userId User id
     * @return \inc\User|boolean
     */
    static public function getUser($userId)
    {
        $sql = "SELECT name, surname, age, gender
                FROM users
                WHERE user_id = :user_id";

        $request = \inc\registry\ApplicationRegistry::getInstance()->get("pdo")->prepare($sql);
        $request->bindValue(":user_id", $userId, \PDO::PARAM_INT);
        $request->execute();

        $row = $request->fetch();

        if(is_array($row))
        {
            $user = new \inc\User();
            $user->setId($userId);
            $user->setName($row["name"]);
            $user->setSurname($row["surname"]);
            $user->setAge($row["age"]);
            $user->setGender($row["gender"]);

            return $user;
        }
        else
        {
            return false;
        }
    }

    /**
     * Get from database and return user friends
     * @param \inc\User $user User
     * @return array|boolean Array of user objects or boolean
     */
    static public function getUserFriends(\inc\User $user)
    {
        $sql = "SELECT user_id, name, surname, age, gender 
                FROM users_friends AS a
                LEFT JOIN users AS b ON b.user_id = a.friend
                WHERE a.user = :user_id";
        
        $request = \inc\registry\ApplicationRegistry::getInstance()->get("pdo")->prepare($sql);
        $request->bindValue(":user_id", $user->getId(), \PDO::PARAM_INT);
        $request->execute();

        $result = array();

        foreach($request->fetchAll() as $row)
        {
            $tempUser = new \inc\User();
            $tempUser->setId($row["user_id"]);
            $tempUser->setName($row["name"]);
            $tempUser->setSurname($row["surname"]);
            $tempUser->setAge($row["age"]);
            $tempUser->setGender($row["gender"]);

            $result[$row["user_id"]] = $tempUser;
        }

        if(count($result) > 0)
        {
            \inc\core\Cache::get()->set("user_friends_".$user->getId(), array_keys($result));
            return $result;
        }

        return null;
    }

    /**
     * Get from database and return friends of user friends who not directy connected to user
     * @param \inc\User $user User
     * @return array|boolean Array of user objects or boolean
     */
    static public function getUserFriendsFriends(\inc\User $user)
    {
        if(!\inc\core\Cache::get()->check("user_friends_".$user->getId()))
        {
            \inc\Users::getUserFriends($user);
        }
        
        $userFriends = \inc\core\Cache::get()->get("user_friends_".$user->getId());

        $sql = "SELECT user_id, name, surname, age, gender 
          FROM users_friends AS a
          JOIN users_friends AS b ON a.friend = b.user
          LEFT JOIN users AS c ON b.friend = c.user_id
          WHERE a.user = :user_id AND b.friend != :user_id";

        $request = \inc\registry\ApplicationRegistry::getInstance()->get("pdo")->prepare($sql);
        $request->bindValue(":user_id", $user->getId(), \PDO::PARAM_INT);
        $request->execute();

        $result = array();

        foreach($request->fetchAll() as $row)
        {
            if(!in_array($row["user_id"], $userFriends))
            {
                $tempUser = new \inc\User();
                $tempUser->setId($row["user_id"]);
                $tempUser->setName($row["name"]);
                $tempUser->setSurname($row["surname"]);
                $tempUser->setAge($row["age"]);
                $tempUser->setGender($row["gender"]);

                $result[$row["user_id"]] = $tempUser;
            }
        }

        return count($result) > 0 ? $result : null;
    }

    /**
     * Get from database and return friends of user friends with 2 connectios to user friends who not directy connected to user
     * @param \inc\User $user User
     * @return array|boolean Array of user objects or boolean
     */
    static public function getUserFriendsFriendsWith2Connections(\inc\User $user)
    {
        if(!\inc\core\Cache::get()->check("user_friends_".$user->getId()))
        {
            \inc\Users::getUserFriends($user);
        }

        $userFriends = \inc\core\Cache::get()->get("user_friends_".$user->getId());
        
        $sql = "SELECT user_id, name, surname, age, gender 
                FROM users_friends AS a
                LEFT JOIN users AS b ON b.user_id = a.friend
                WHERE a.user IN (".implode(",", $userFriends).") AND a.friend != :user_id";

        $request = \inc\registry\ApplicationRegistry::getInstance()->get("pdo")->prepare($sql);
        $request->bindValue(":user_id", $user->getId(), \PDO::PARAM_INT);
        $request->execute();

        $result = array();

        foreach($request->fetchAll() as $row)
        {
            if(!in_array($row["user_id"], $userFriends))
            {
                $tempUser = new \inc\User();
                $tempUser->setId($row["user_id"]);
                $tempUser->setName($row["name"]);
                $tempUser->setSurname($row["surname"]);
                $tempUser->setAge($row["age"]);
                $tempUser->setGender($row["gender"]);

                if(!\inc\core\Cache::get()->check("user_friends_".$row["user_id"]))
                {
                    \inc\Users::getUserFriends($tempUser);
                }

                $userFriendFriends = \inc\core\Cache::get()->get("user_friends_".$row["user_id"]);
                
                if(is_array($userFriends) && is_array($userFriendFriends) && count(array_intersect($userFriends, $userFriendFriends)) >= 2)
                {
                    $result[$row["user_id"]] = $tempUser;
                }
            }
        }

        return count($result) > 0 ? $result : null;
    }
    
    /**
     * Get from database and return all users
     * @return array|boolean
     */
    static public function getUsers()
    {
        $pdo = \inc\registry\ApplicationRegistry::getInstance()->get("pdo");

        $sql = "SELECT user_id, name, surname, age, gender FROM users";

        $result = array();
        
        foreach($pdo->query($sql) as $row)
        {
            $user = new \inc\User();
            $user->setId($row["user_id"]);
            $user->setName($row["name"]);
            $user->setSurname($row["surname"]);
            $user->setAge($row["age"]);
            $user->setGender($row["gender"]);
            
            $result[] = $user;
        }

        return isset($result[0]) ? $result : null;
    }

}

?>