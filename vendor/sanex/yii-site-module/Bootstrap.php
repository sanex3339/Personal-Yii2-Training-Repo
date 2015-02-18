<?php

namespace sanex\site;

use yii\base\BootstrapInterface;

/**
 * Blogs module bootstrap class.
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        // Add module URL rules.
        $app->getUrlManager()->addRules(
            [
                '' => 'site/default/index',
                '<_a:(about|portfolio)>' => 'site/default/<_a>',
            ]
        );
    }
}
