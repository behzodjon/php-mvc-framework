<?php

namespace app\core;

abstract class Model
{
    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE = 'unique';

    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    abstract public function rules(): array;
    public array $errors = [];

    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }
                if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($attribute, self::RULE_EMAIL);
                }
                if ($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}) {
                    $this->addError($attribute, self::RULE_MATCH, $rule);
                }
                if ($ruleName === self::RULE_UNIQUE) {
                    $className = $rule['class'];
                    $uniqueAttr = $rule['attribute'] ?? $attribute;
                    $tableName=$className::tableName();
                        $statement=Application::$app->db->prepare("SELECT * FROM $tableName WHERE $uniqueAttr=:attr");
                        $statement->bindValue(":attr",$value);
                        $statement->execute();
                        $record=$statement->fetchObject();
                        if($record){
                            $this->addError($attribute, self::RULE_UNIQUE);

                        }

                }
            }
        }
        return empty($this->errors);
    }

    private function addError(string $attribute, string $rule)
    {
        $message = $this->errorMessages()[$rule] ?? '';
        $this->errors[$attribute][] = $message;
    }
    public function addErrorForAuth(string $attribute, string $message)
    {
        $this->errors[$attribute][] = $message;
    }
    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => 'Required!',
            self::RULE_EMAIL => 'Valid email address!',
            self::RULE_MIN => 'Required!',
            self::RULE_MAX => 'Required!',
            self::RULE_MATCH => 'Required!',
            self::RULE_UNIQUE => 'Record already exists !',
        ];
    }

    public function hasError($attribute)
    {
        return $this->errors[$attribute] ?? false;
    }

    public function getFirstError($attribute)
    {
        return $this->errors[$attribute][0] ?? false;
    }
}
