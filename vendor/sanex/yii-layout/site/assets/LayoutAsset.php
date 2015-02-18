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
        'css/bootstrap.css',
        'css/normalize.css',
        'css/main.css',
        'css/style.css',
    ];

    public $js = [
        'js/vendor/modernizr-2.6.2.min.js',
        'js/vendor/jquery.query-object.js',
        'js/plugins.js',
        'js/main.js',
        //'http://jek-fdrv.16mb.com/pixp/pixp.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
