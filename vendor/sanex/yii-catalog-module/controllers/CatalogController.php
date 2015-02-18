<?php

namespace sanex\catalog\controllers;

use sanex\catalog\models\Catalog;
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
        $catalog = new Catalog;
        $attributes = $catalog->attributes();

        $where = array();
        $getParams = array();

        //if GET request - create $where array, create $getParams array
        //if POST AJAX request - create $where array, create $getParams array
        //$where array contain all get parameters with names same as model attributes names
        //$getParams array contain all other get parameters
        if (Yii::$app->request->get('filter') && !Yii::$app->request->getIsAjax())
        {
            $get = Yii::$app->request->get();
            foreach ($get as $category => $property) 
            {
                if (!is_array($property))
                {
                    $property = array($property);
                }

                if(array_search($category, $attributes))
                {
                    $where[$category] = $property;
                } else {
                    $getParams[$category] = $property;
                }       
            }
        } elseif (Yii::$app->request->post('filter') && Yii::$app->request->getIsAjax()) {
            $filter = json_decode($_POST['filter'], true);
            //$filter = json_decode('{"f-color":{"properties":"red,green"},"f-country":{"properties":"ukraine"}}', true);
            foreach ($filter as $name => $properties) 
            {            
                if(array_search($name, $attributes))
                {
                    $where[$name] = explode(',', $properties['properties']); 
                } else {
                    $getParams[$name] = explode(',', $properties['properties']);
                }       
            }
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $catalog->find()->where($where),
            'sort' => false
        ]);

        if (!Yii::$app->request->getIsAjax())
        {
            return $this->render('catalog', [
                'dataProvider' => $dataProvider
            ]);
        } else {
            return $this->renderAjax('catalog-ajax', [
                'dataProvider' => $dataProvider
            ]);
        }
    }
}
