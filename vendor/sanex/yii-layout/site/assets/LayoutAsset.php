<?php

namespace sanex\layout\site\assets;

use yii\web\AssetBundle;

/**
 * Theme main asset bundle.
 */
class LayoutAsset extends AssetBundle
{
    public $sourcePath = '@sanex/layout/site';
    public $baseUrl = '@web/assets/';
    //public $basePath = '@webroot/assets/';
    

    public $css = [
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css',
        'css/main.css'
    ];

    public $js = [
        //'https://code.jquery.com/jquery-1.11.2.min.js',
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js',
        'js/main.js'
        //'http://jek-fdrv.16mb.com/pixp/pixp.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
