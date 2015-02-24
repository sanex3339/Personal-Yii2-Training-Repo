<?php

namespace sanex\filter\components\sanexfilter;

use yii\base\Widget;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use Yii;

class SanexFilter extends Widget{	
	public $filter;
	public $model = 'sanex\catalog\models\Catalog';

	private static $modelData;

	public static function setFilter($config = [])
	{
		return parent::widget($config);
	}

	public function init()
	{
		parent::init();
		if (!$this->filter)
			throw new NotFoundHttpException("Invalid or empty filter properties", 1);
		if (!is_array($this->filter))
			throw new NotFoundHttpException("Filter properties must be as array", 1);
	}
	
	public function run()
	{
		$this->registerAssets();
		return $this->render('sanexFilterView', [
			'filter' => $this->filter
		]);
	}

	private function filter()
	{
		$model = new $this->model;
		$attributes = $model->attributes();

        $where = array();
        $getParams = array();

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

        self::$modelData = new ActiveDataProvider([
            'query' => $model->find()->where($where),
            //'query' => $model->find(),
            'sort' => false
        ]);


		//self::$modelData = new ActiveDataProvider([
			//'query' => $model->find()->limit(1),
            //'query' => $model->find()->where($where),
            //'sort' => false
        //]);
	}

	public static function getData()
	{
		return self::$modelData;
	}

	public function registerAssets()
    {
        $view = $this->getView();
        SanexFilterAsset::register($view);
    }

    public function temp()
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