<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class LoginForm extends Model
{
    public $employeesname;
    public $password;
    public $rememberMe = true;

    private $_employeesIdentity = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }
    public function attributeLabels(): array {
        return [
            'username' => 'Email',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $employeesIdentity = $this->getUserIdentity();

            if (!$employeesIdentity || !$employeesIdentity->validatePassword($this->password)) {
                $this->addError($attribute, 'У вас неправильный эмайл или пароль.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUserIdentity(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }   

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUserIdentity()
    {
        if ($this->_employeesIdentity === false) {
            $this->_employeesIdentity = Employees::findByUsername($this->employeesname);
        }

        return $this->_employeesIdentity;
    }
}
