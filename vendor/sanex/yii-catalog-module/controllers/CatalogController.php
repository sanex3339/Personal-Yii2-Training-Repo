<?php

namespace sanex\catalog\controllers;

use sanex\catalog\models\Catalog;
use sanex\filter\Module;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\NotFoundHttpException;

class CatalogController extends Controller
{
	public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::className()
            ],
        ];
    }

    public function actionShowCatalog()
    {
        $modelName = 'sanex\catalog\models\Catalog';
        $viewFile = '@sanex/catalog/views/catalog/catalog-ajax';

        return $this->render('catalog', [
            'modelName' => $modelName,
            'viewFile' => $viewFile
        ]);
    }
}
