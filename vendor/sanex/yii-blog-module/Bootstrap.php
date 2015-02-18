<?php

namespace sanex\blog;

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
                'blog' => 'blog/blog/blog',
                'blog/<action:(create|update|delete)>/<id:\w+>' => 'blog/blog/<action>',
                'blog/<action:(create|update|delete)>' => 'blog/blog/<action>',
                'blog/<id:\w+>' => 'blog/blog/read',
            ]
        );
    }
}
