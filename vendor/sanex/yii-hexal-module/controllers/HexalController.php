<?php

namespace sanex\hexal\controllers;

use sanex\hexal\components\Hexal;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\helpers\FileHelper;
use Yii;

class HexalController extends Controller
{
	public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::className()
            ],
        ];
    }

    public function actionRunHexal()
    {
        //get path with source images
        $path = Yii::$app->assetManager->getPublishedUrl('@sanex/layout/site').'/img/imagesForConvert';
        //get array with source images names
        $images = $this->actionGetImages($path, false);
        //get source images count
        $imagesCount = count($images);
        //for each image run hexal convert
        for ($i = 1; $i <= $imagesCount; $i++)
        {
            $hexal = new Hexal(
                206, 
                $i.'.jpg', 
                Yii::$app->assetManager->getPublishedUrl('@sanex/layout/site').'/img/imagesForConvert', 
                $i.'.png', 
                Yii::$app->assetManager->getPublishedUrl('@sanex/layout/site').'/img/hexal'
            );
        }

        return Yii::$app->getResponse()->redirect('/', 302);
    }

    public function actionGetImages($path = '', $json = true)
    {
        $fileNames = [];

        //if call from ajax - path = post path, else - path = arg path
        //get full paths and filenames of each image in folder
        if (empty($path))
        {
            $imagesPath = Yii::$app->request->post('path');
            $files = FileHelper::findFiles(Yii::getAlias('@webroot').$imagesPath, ['only' => ['*.png']]);
        } else {
            $imagesPath = $path;
            $files = FileHelper::findFiles(Yii::getAlias('@webroot').$imagesPath, ['only' => ['*.png' , '*.jpg' , '*.jpeg']]);
        }

        //remove paths and left only filenames of images
        foreach ($files as $id => $file) 
        {
            $fileName = explode('/', $file);
            $fileName = $fileName[count($fileName)-1];
            $fileNames[] = $fileName;
        }

        //if ajax call - return json, else return array
        if ($json)
        {
            echo json_encode(['files' => $fileNames]);
        } else {
            return $fileNames;
        }
    }
}
