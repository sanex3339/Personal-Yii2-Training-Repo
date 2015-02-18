<?php

namespace sanex\site\controllers;

use sanex\site\models\ContactForm;
use yii\captcha\CaptchaAction;
use yii\web\Controller;
use yii\web\ErrorAction;
use Yii;

class DefaultController extends Controller
{
	public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::className()
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
