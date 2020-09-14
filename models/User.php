<?php

namespace app\models;

use app\core\Model;
use app\core\DbModel;
use app\core\UserModel;

class User extends UserModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    public string $username = '';
    public string $fullname = '';
    public string $email = '';
    public int $status = self::STATUS_INACTIVE;
    public string $password = '';
    public string $confirmPassword = '';

    public static function tableName(): string
    {
        return 'users';
    }
    public  function primaryKey(): string
    {
        return 'id';
    }
    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'username' => [self::RULE_REQUIRED],
            'fullname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
            'password' => [self::RULE_REQUIRED],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }
    public function attributes(): array
    {
        return ['username', 'fullname', 'email', 'status', 'password'];
    }

    public function getDisplayName(): string
    {
        return $this->fullname;
    }
}
