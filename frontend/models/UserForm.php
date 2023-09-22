<?php

namespace frontend\models;

use mdm\admin\components\UserStatus;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * UserForm form
 */
class UserForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $status;

    public $id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.', 'on' => 'create'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.',  'on' => 'create'],

            ['password', 'required', 'on' => 'create'],
            ['password', 'string', 'min' => 8],
            [['username', 'email'], 'unique', 'targetClass' => '\common\models\User', 'on' => 'create'],

            // Unique validation rule for updating users
            [['username'], 'unique', 'targetClass' => '\common\models\User', 'on' => 'update', 'when' => function ($model) {
                // Add a condition here to skip unique validation when updating the same username
                return $model->username !== $this->username;
            }],

            [['email'], 'unique', 'targetClass' => '\common\models\User', 'on' => 'update', 'when' => function ($model) {
                // Add a condition here to skip unique validation when updating the same email
                return $model->email !== $this->email;
            }],

            ['password', 'string', 'skipOnEmpty' => true, 'when' => function ($model) {
                return !empty($model->password);
            }],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function create()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->status = UserStatus::ACTIVE;

        return $user->save();
    }

    public function update($id)
    {
        if (!$this->validate()) {
            return null;
        }

        $user = User::findOne($id);
        $user->username = $this->username;
        $user->email = $this->email;
        if ($this->password) {
            $user->setPassword($this->password);
        }
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->status = $this->status;

        return $user->save();
    }
}