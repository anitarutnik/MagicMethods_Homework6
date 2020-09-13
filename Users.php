<?php

class Users
{

    private $userFirstName;
    private $userLastName;

    public function __construct($userFirstName = "John ", $userLastName = "Doe")
    {
        $this->userFirstName = $userFirstName;
        $this->userLastName = $userLastName;
    }

    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        } else {
            echo "Property doesn't exist." . "<br>";
        }
    }

    public function __get($name)
    {
        return $this->$name;
    }
}

$user1 = new Users();
$user1->userFirstName = "Morgan ";
$user1->age = 15;
echo $user1->userFirstName . $user1->userLastName;
echo "<br>";

$user2 = new Users("Anita ", "Rutnik");
echo $user2->userFirstName . $user2->userLastName;
echo "<br>";