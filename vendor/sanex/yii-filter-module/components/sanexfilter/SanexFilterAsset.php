<?php

namespace sanex\filter\components\sanexfilter;

use yii\web\AssetBundle;

class SanexFilterAsset extends AssetBundle{	
	public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset'
    ];

	public function init()
	{
		$this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('css', ['css/sanexFilter']);
        $this->setupAssets('js', ['js/jquery.query-object', 'js/sanexFilter']);
        parent::init();
	}

	protected function setupAssets($type, $files = [])
    {
        $srcFiles = [];
        $minFiles = [];
        foreach ($files as $file) {
            $srcFiles[] = "{$file}.{$type}";
            $minFiles[] = "{$file}.min.{$type}";
        }
        if (empty($this->$type)) {
            $this->$type = YII_DEBUG ? $srcFiles : $minFiles;
        }
    }

    protected function setSourcePath($path)
    {
        if (empty($this->sourcePath)) {
            $this->sourcePath = $path;
        }
    }
}