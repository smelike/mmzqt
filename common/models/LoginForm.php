<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
    public $access_token;
    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
		
        return [
            // username and password are both required
            [['username', 'password'], 'required', 'message' => '请先登录，再进行操作'],
            // rememberMe must be a boolean value
            //['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
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
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, '用户名或密码不正确');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $access_token = $this->_user->generateAccessToken();
            $this->_user->save();
            return $access_token;
        } else {
            return false;
        }
    }

    public function logout()
    {
        if ($this->getUserByToken()) {
            $this->_user->access_token = '';
            $this->_user->save();
        }
        return true;
    }

    protected function getUserByToken()
    {
        if ($this->_user === null) {
            $this->_user = User::findIdentityByAccessToken($this->access_token);
        }
        return $this->_user;
    }
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {

            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
