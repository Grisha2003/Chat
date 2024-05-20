<?php

namespace Dependency;

class Validator
{
    public function validPassword(string $password)
    {
        $pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()-_+=])[0-9a-zA-Z!@#$%^&*()-_+=]{8,}$/';
        return preg_match($pattern, $password);
    }

    public function cryptPassword($password) {
        return md5($password);
    }

    public function comparisonPassword($password, $password2)
    {
        return strcmp($password, $password2);
    }

    public function validName(string $name)
    {
        $pattern = '/^[a-zA-Zа-яА-ЯёЁ]+(?:-[a-zA-Zа-яА-ЯёЁ]+)*$/';
        return preg_match($pattern, $name);
    }

}