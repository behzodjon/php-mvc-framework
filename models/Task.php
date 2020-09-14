<?php

namespace app\models;

use app\core\Model;
use app\core\DbModel;

class Task extends DbModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    public string $username = '';
    public string $email = '';
    public string $task_text = '';
    public int $status = self::STATUS_INACTIVE;

    public static function tableName(): string
    {
        return 'tasks';
    }
    public  function primaryKey(): string
    {
        return 'id';
    }
    public function save()
    {
        // $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'username' => [self::RULE_REQUIRED],
            'task_text' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
        ];
    }
    public function attributes(): array
    {
        return ['username', 'task_text', 'email', 'status'];
    }

   
}
