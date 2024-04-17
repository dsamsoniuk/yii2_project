<?php

use yii\db\Schema;
use app\migrations\Migration;
use app\models\User;

class m150603_083212_create_user_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%user}}', [
            'id' => 'pk',
            'role' => Schema::TYPE_STRING . ' NOT NULL COMMENT "Uprawnienia"',
            'first_name' => Schema::TYPE_STRING . '(64) NOT NULL comment "Imię"',
            'last_name' => Schema::TYPE_STRING . '(64) NOT NULL comment "Nazwisko"',
            'nip' => Schema::TYPE_STRING . '(16) NULL',
            'email' => Schema::TYPE_STRING,
            'password_hash' => Schema::TYPE_STRING,
            'password_reset_token' => Schema::TYPE_STRING . ' NULL',
            'register_token' => Schema::TYPE_STRING . ' NULL',
            'auth_key' => Schema::TYPE_STRING . ' UNIQUE',
            'image' => Schema::TYPE_STRING . ' DEFAULT NULL COMMENT "Zdjęcie profilowe"',
            'status' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
            'logged_in_from' => Schema::TYPE_STRING . '(45)',
            'logged_in_at' => Schema::TYPE_INTEGER,
            'created_at' => Schema::TYPE_INTEGER,
            'updated_at' => Schema::TYPE_INTEGER,
        ], $this->tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}