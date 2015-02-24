<?php

namespace sanex\filter;

use sanex\filter\controllers\FilterController;

class SanexFilter extends \yii\base\Module
{
    public $controllerNamespace = 'sanex\filter\controllers';
    private $filterData;

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function setFilter($filter)
    {
        $this->params['filter'] = $filter;
    	return $this->runAction('filter/set-filter');
    }

    public function getData()
    {
        return $this->runAction('filter/show-data-get');
    }
}
