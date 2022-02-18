<?php
session_start();
$users = [
    1 => ['name' => 'Василий', 'surname' => 'Петров', 'email' => 'vasya-petya@gmail.com', 'password' => '12345'],
    2 => ['name' => 'Василий', 'surname' => 'Пупкин', 'email' => 'vasya-naibator@gmail.com', 'password' => '123456']
];

class User
{
    private $id;
    private $name;
    private $surname;
    private $email;
    private $password;

    public function __construct()
    {
        $this->id = $_SESSION['id'];
        $this->name = $_SESSION['name'];
        $this->surname = $_SESSION['surname'];
        $this->email = $_SESSION['email'];
        $this->password = $_SESSION['password'];
    }

    public function __destruct()
    {
        $_SESSION['id'] = $this->id;
        $_SESSION['name'] = $this->name;
        $_SESSION['surname'] = $this->surname;
        $_SESSION['email'] = $this->email;
        $_SESSION['password'] = $this->password;
    }

    public function equalsemail($users, $email, $password)
    {
        foreach ($users as $key => $value) {
            if ($email == $value['email'] && $password == $value['password']) {
                $this->email = $value['email'];
                $this->password = $value['password'];
                $this->name = $value['name'];
                $this->surname = $value['surname'];
                $this->id = $key;
            }
        }
    }

        public function autendificated($password)
    {
        return $password && $password == $this->password;
    }

    public function getpassword()
    {
        return $this->password;
    }
}

/**Делаем класс пользователь(User).
 *Делаем форму авторизации. Где вводим мыло и пароль,
 *при отправке формы находим в массиве юзера по email создаем класс пользователя с этими данными.
 *При повторном заходе на страницу пользователь если он залогинен,
 * не видит форму авторизации, а видит фразу "Привет Василий Пупкин."
 */