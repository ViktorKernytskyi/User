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


    public function __construct($users, $email, $password)
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
        if($password == $this->password){
            $_SESSION['id'] = $this->id;
            return true;
        }

        return false;
    }

}

/**Делаем класс пользователь(User).
 *Делаем форму авторизации. Где вводим мыло и пароль,
 *при отправке формы находим в массиве юзера по email создаем класс пользователя с этими данными.
 *При повторном заходе на страницу пользователь если он залогинен,
 * не видит форму авторизации, а видит фразу "Привет Василий Пупкин."
 */