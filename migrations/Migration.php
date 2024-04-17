<?php
/**
 * Log migration yii migrate --migrationPath=@yii/log/migrations/
 * php composer.phar require --prefer-dist yii2mod/yii2-rbac "*"
 * php yii migrate/up --migrationPath=@yii/rbac/migrations
 * https://github.com/yii2mod/yii2-rbac
 * 
 */
namespace app\migrations;
use Yii;

class Migration extends \yii\db\Migration
{
    /**
     * @var string
     */
    protected $tableOptions;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        switch (Yii::$app->db->driverName) {
            case 'mysql':
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $this->tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
                break;
            case 'pgsql':
                $this->tableOptions = null;
                break;
            default:
                throw new \RuntimeException('Your database is not supported!');
        }
    }
}