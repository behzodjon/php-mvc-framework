<?php

namespace app\models;

use app\core\Application;
use app\core\Model;
use app\models\User;

class LoginForm extends Model
{
    public string $username = '';
    public string $password = '';
    public function rules(): array
    {
        return [
            'username' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function login()
    {
        $user=User::findOne(['username' => $this->username]);

        if (!$user) {
            $this->addErrorForAuth('username', 'User doesn`t exist!');
            return false;
        }
        if (!password_verify($this->password, $user->password)) {
            $this->addErrorForAuth('password', 'Password is incorrect!');
            return false;
        }

        return Application::$app->login($user);
    }
}
