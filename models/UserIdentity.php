<?php

namespace app\models;
use app\models\Employees;
use Yii;

class Useridentity extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $employeesname;
    public $password;
    public $authKey;
    public $accessToken;
    
     /**
     * Текущий пользователь
     * @var Employees
     */
    public $employees;    
    
    protected static function createIdentity(Employees $employees): UserIdentity {
        $identity = new EmployeesIdentity();
        $identity->id = $employees->id;
        $identity->employeesname = $employees->email;
        $identity->employees = $employees;
    return $identity;}

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $employees = Employees::findOne($id);
        return $employees ? self::createIdentity($employees) : null;
       
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * Finds user by employeesname
     *
     * @param string $employeesname
     * @return static|null
     */
    public static function findByUsername($employeesname)
    {
               $employees = Employees::findOne(['email' => $employeesname]);
        return $employees ? self::createIdentity($employees) : null;   
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
         return Yii::$app->security->validatePassword($password, $this->employees->password_hash);        
    }
}
