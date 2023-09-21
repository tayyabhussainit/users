<?php


namespace common\models;

use yii\db\ActiveRecord;

class AuthItem extends ActiveRecord
{
    const ADMIN = 'sysadmin';

    const AUTH_ITEMS = [
        '/*' => '2',
        '/admin/*' => '2',
        'permission_admin' => '2',
        'sysadmin' => '1',
    ];

    const CHILD_AUTH_ITEMS = [
        '/*' => 'sysadmin',
        '/admin/*' => 'sysadmin',
        'permission_admin' => 'sysadmin',
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
