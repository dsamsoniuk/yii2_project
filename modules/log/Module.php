<?php

namespace app\modules\log;
use yii2mod\rbac\filters\AccessControl;
/**
 * log module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\log\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    public function behaviors()
    {
        return [
            AccessControl::class
        ];
    }
}
