<?php

/**
 * @how_use
 * public function init()
 * {
 *      $this->on(self::EVENT_AFTER_DELETE, ['app\components\events\UserRecordAfterDelete', 'afterDelete']);
 * }
 *
 * @author Mirosław Seehawer
 *
 */

namespace app\components\events;

class UserRecordAfterUpdate extends \yii\base\Component
{
    /**
     * Usuwa uzytkownika z tablicy rbac
     * @param $event
     */
    public static function afterUpdate($event)
    {
        /** @var Event $event */
        /** @var ActiveRecord $model */
        $model = $event->sender;
        $userId = $model->id;

        /** @var \yii\rbac\DbManager $rbac */
        $rbac = \Yii::$app->authManager;

        $roles = $rbac->getRolesByUser($userId);

        foreach ($roles as $role) {
            $rbac->revoke($role, $userId);
        }
        
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