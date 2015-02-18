<?php

namespace sanex\layout\site;

use Yii;

class Layout extends \yii\base\Theme
{
    /**
     * @inheritdoc
     */
    public $pathMap = [
        '@frontend/views' => '@sanex/layout/site/views',
        //'@frontend/modules' => '@vova07/themes/site/modules'
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }
}
