<?php

namespace Dependency;

class Validator
{
    private $msg = '';

    private function validPassword($password)
    {
        $pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()-_+=])[0-9a-zA-Z!@#$%^&*()-_+=]{8,}$/';
        if (!preg_match($pattern, $password)) {
            return "Некорректный пароль.\n";
        }
    }

    public function cryptPassword($password) {
        return md5($password);
    }

    private function comparisonPassword($password1, $password2)
    {
         if (strcmp($password1, $password2)) {
            return "Пароли не совпадают!\n";
         }
    }

    private function validName($name)
    {
        $pattern = '/^[a-zA-Zа-яА-ЯёЁ]+(?:-[a-zA-Zа-яА-ЯёЁ]+)*$/';
        if (!preg_match($pattern, $name)) {
            return "Некорректное имя.\n"; 
        }

    }

    public function valid ($name, $password1, $password2) 
    {
        $this->msg = $this->validName($name);
        $this->msg .= $this->validPassword($password1);
        $this->msg .= $this->comparisonPassword($password1, $password2);
        return $this->msg;
    }

}