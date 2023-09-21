<?php


namespace common\models;

use yii\db\ActiveRecord;

class AuthItem extends ActiveRecord
{
    const ADMIN = 'admin';

    const ADMIN_TASKS = [
        'create-user' => 'Create User',
        'edit-user' => 'Edit User',
        'delete-user' => 'Delete User',
        'view-user' => 'View User',
    ];

    public static function tableName()
    {
        return '{{%auth_item}}';
    }

    public function getChildren()
    {
        return $this->hasMany(ChildAuthItem::class, ['parent', 'name']);
    }
}
