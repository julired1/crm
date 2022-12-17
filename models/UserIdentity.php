<?php

namespace app\models;
use app\models\User;
use Yii;

class Useridentity extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $emploueesname;
    public $password;
    public $authKey;
    public $accessToken;
    
     /**
     * Текущий пользователь
     * @var User
     */
    public $emplouees;    
    
    protected static function createIdentity(User $emplouees): UserIdentity {
        $identity = new EmploueesIdentity();
        $identity->id = $emplouees->id;
        $identity->emploueesname = $emplouees->email;
        $identity->emplouees = $emplouees;
    return $identity;}

    private static $emploueess = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $emplouees = User::findOne($id);
        return $emplouees ? self::createIdentity($emplouees) : null;
       
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$emploueess as $emplouees) {
            if ($emplouees['accessToken'] === $token) {
                return new static($emplouees);
            }
        }

        return null;
    }

    /**
     * Finds user by emploueesname
     *
     * @param string $emploueesname
     * @return static|null
     */
    public static function findByUsername($emploueesname)
    {
               $emplouees = User::findOne(['email' => $emploueesname]);
        return $emplouees ? self::createIdentity($emplouees) : null;
        
        
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
         return Yii::$app->security->validatePassword($password, $this->emplouees->password_hash);        
    }
}
