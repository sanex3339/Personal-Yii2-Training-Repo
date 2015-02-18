<?php

namespace sanex\hexal;

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
                'hexal' => 'hexal/hexal/run-hexal',
                'get-images' => 'hexal/hexal/get-images',
            ]
        );
    }
}
