<?php

namespace User\Entity;
use Doctrine\ORM\Mapping as ORM;
/** @ORM\Entity */
class User {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $username;

    /** @ORM\Column(type="string") */
    protected $fullname;

    /** @ORM\Column(type="string") */
    protected $email;

    /** @ORM\Column(type="string") */
    protected $phone;

    /** @ORM\Column(type="string") */
    protected $address;


    /**
     * Takes in array of users and sets them as property.
     *
     * @param string $property
     * @param mixed $value
     */
    public function set($userArray) 
    {
        foreach ($userArray as $property => $value) {
            $this->$property = $value;
        }
        
    }

     /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy() 
    {
        $userArray = array(
            "id" => $this->id,
            "username" => $this->username,
            "fullname" => $this->fullname,
            "email" => $this->email,
            "phone" => $this->phone,
            "address" => $this->address
        );
        return $userArray;
    }


}