<?php
session_start();

class User
{
    private $id;
    private $name;
    private $surname;
    private $email;
    private $password;

    static $users = [
        1 => ['name' => 'Василий', 'surname' => 'Петров', 'email' => 'vasya-petya@gmail.com', 'password' => '12345'],
        2 => ['name' => 'Василий', 'surname' => 'Пупкин', 'email' => 'vasya-naibator@gmail.com', 'password' => '123456']
    ];

    public function __construct($id)
    {
        $user = self::$users[$id];
        $this->name = $user['name'];
        $this->surname = $user['surname'];
        $this->id = $user['id'];
    }

    public function __get($value)
    {
        return ($value !== 'password') ? $this->{$value} : null;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getSurname()
    {
        return $this->surname;
    }
    public function getMail()
    {
       return $this->email;
    }

    public static function auth($password, $email)
    {
        $user = null;
        foreach (self::$users as $key => $value) {
            if ($email == $value['email'] && $password == $value['password']) {
                $user = new User($key);
                $_SESSION['id'] = $key;
            }
        }

        return $user;
    }

    public static function getCurrentUser()
    {
        $user = null;
        if ($_SESSION['id']) {
            $user = self::$users[$_SESSION['id']];
        }

        return $user;
    }

    public static function logOut()
    {
        unset ($_SESSION['id']);
        header("Location:form.php");
    }
}
