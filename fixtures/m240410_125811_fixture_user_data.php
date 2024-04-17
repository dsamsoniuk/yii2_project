<?php

use app\models\User;
use yii\db\Migration;

/**
 * Class m240410_125811_fixture_user_data
 */
class m240410_125811_fixture_user_data extends Migration
{
      /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $email = 'admin@local.dot';
        $role = 'admin';
        $first_name = 'admin';
        $last_name = 'admin';
        $password = 'admin';
        $status = 1;

        $userRecord = new User();
        // $userRecord->off(User::EVENT_AFTER_INSERT);
        $userRecord->attributes = compact('email', 'role', 'status', 'first_name', 'last_name');
        $userRecord->password_new = $password;
        $userRecord->save();

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }
}
