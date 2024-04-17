<?php

use yii\db\Migration;

/**
 * Class m240410_125235_fixture_roles
 */
class m240410_125235_fixture_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $rbac = \Yii::$app->authManager;

        try {
            $guest = $rbac->createRole('guest');
            $guest->description = 'Gość';
            $rbac->add($guest);
        } catch (\Exception $e) {}

        try {
            $admin = $rbac->createRole('admin');
            $admin->description = 'Administrator';
            $rbac->add($admin);
        } catch (\Exception $e) {}

        try {
            $newRole = $rbac->createRole('manager');
            $newRole->description = 'Kierownik';
            $rbac->add($newRole);
        } catch (\Exception $e) {}

        try {
            $newRole = $rbac->createRole('reception');
            $newRole->description = 'Recepcja';
            $rbac->add($newRole);
        } catch (\Exception $e) {}

        try {
            $newRole = $rbac->createRole('employee');
            $newRole->description = 'Pracownik';
            $rbac->add($newRole);
        } catch (\Exception $e) {}

        try {
            $newRole = $rbac->createRole('management');
            $newRole->description = 'Zarząd';
            $rbac->add($newRole);
        } catch (\Exception $e) {}

        $this->insert('auth_item', [
            'name' => '/admin/*',
            'type' => 2
        ]);

        $this->insert('auth_item_child', [
            'parent' => 'admin',
            'child' => '/admin/*'
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $manager = \Yii::$app->authManager;
        $manager->removeAll();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240410_125235_fixture_roles cannot be reverted.\n";

        return false;
    }
    */
}
