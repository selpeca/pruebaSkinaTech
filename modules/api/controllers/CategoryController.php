<?php

namespace app\modules\api\controllers;

use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use yii\filters\Cors;
use yii\filters\auth\HttpBearerAuth;

class CategoryController extends ActiveController
{
    public $modelClass = 'app\models\Category';

    public function actions(): array 
    {
        $actions = parent::actions();
        $actions['index'] = [
            'class' => 'yii\rest\IndexAction',
            'modelClass' => $this->modelClass,
            'prepareDataProvider' => fn() => new ActiveDataProvider(
                [
                    'query' => $this->modelClass::find(),
                    'pagination' => false,
                ]
            ),
        ];

        return $actions;
    }

}
