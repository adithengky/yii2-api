<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class CountryController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Country';

    public function behaviors()
    {
        return [
            [
                'class' => \yii\filters\ContentNegotiator::className(),
                'only' => ['index', 'view'],
                'formats' => [
                    'application/json' => \yii\web\Response::FORMAT_JSON,
                ],
            ],
        ];
    }

    function actionSearch() {

    	$request = \Yii::$app->request->post();

    	if($request) {
    		$query = $this->modelClass::find()
    		->where(['like', 'name', $request['name']])
    		->asArray()
    		->all();

    		echo json_encode($query);
    	}
    }    
}


