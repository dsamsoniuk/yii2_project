<?php

/**
 * @how_use
 * public function init()
 * {
 *      $this->on(self::EVENT_AFTER_INSERT, ['app\components\events\UserRecordAfterInsert', 'afterInsert']);
 * }
 *
 * @author Mirosław Seehawer
 *
 */

namespace app\components\events;

use Yii;
use app\models\domain\UserRecord;

class UserRecordAfterInsert extends \yii\base\Component
{
    /**
     * Usuwa domene z tablicy rbac
     * @param $event
     */
    public static function afterInsert($event)
    {
        /** @var Event $event */
        /** @var UserRecord $model */
        $model = $event->sender;
        $userId = $model->getPrimaryKey();

        /** @var \yii\rbac\DbManager $rbac */
        $rbac = \Yii::$app->authManager;
        if($model->role)
        {
            $role = $rbac->getRole($model->role);
        }

        $rbac->assign(
            $role,
            $userId
        );
    }
}