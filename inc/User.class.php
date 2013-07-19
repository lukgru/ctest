<?php
/**
 * User class
 */
namespace inc;

class User
{
    /**
     * User id
     * @var integer
     */
    private $id = 0;
    /**
     * User name
     * @var string
     */
    private $name = "";
    /**
     * User surname
     * @var string
     */
    private $surname = "";
    /**
     * User age
     * @var integer
     */
    private $age = 0;
    /**
     * User gender
     * @var string
     */
    private $gender = "";
    
    public function __construct()
    {
        
    }
    
    /**************************************************************************/
    /**************************************************************************/
    /**************************************************************************/
    
    public function setId($userId)
    {
        $this->id = (int)$userId;
    }

    public function getId()
    {
        return $this->id;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }
    
    public function getSurname()
    {
        return $this->surname;
    }
    
    public function setAge($age)
    {
        $this->age = (int)$age;
    }
    
    public function getAge()
    {
        return $this->age;
    }
    
    public function setGender($gender)
    {
        $this->gender = $gender;
    }
    
    public function getGender()
    {
        return $this->gender;
    }
}

?>