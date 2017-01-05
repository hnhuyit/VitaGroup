<?php
namespace backend\controllers;
use yii\web\Controller;
use yii\helpers\Url;
use Yii;

class LanguageController extends Controller{
	public function actionSet($language){
		$cookies = Yii::$app->response->cookies;
		$cookies->add(new \yii\web\Cookie([
		    'name' => 'language',
		    'value' => $language
		]));
		return $this->redirect(Url::previous());
	}
}