<?php
use sanex\layout\site\assets\LayoutAsset;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var \yii\web\View $this
 * @var string $content
 */

//Ренистрируем ассет бандл
$layoutAsset = LayoutAsset::register($this);

//Регистрируем JS переменную, в которой содержится путь до папки с ассетами. Используется в JS скриптах.
$this->registerJs('var AssetsPath = "'.Yii::$app->assetManager->getPublishedUrl('@sanex/layout/site').'"', View::POS_HEAD);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?=Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="b-wrapper">
            <div class="header-wrapper">
                <table class="menu" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="menu-l">
                            <div class="menu-t">
                                <ul class="menu-list">
                                    <li class="menu-item"><?=Html::a('catalog', '/catalog/')?></li>
                                    <li class="menu-item"><?=Html::a('about', '/about/')?></li>
                                </ul>
                            </div>
                            <div class="menu-b"></div>
                        </td>
                        <td class="menu-m">
                            <div class="header-arrow">
                                <?=Html::a('', '/', ['title' => 'Main Page'])?>
                            </div>
                        </td>
                        <td class="menu-r">
                            <div class="menu-t">
                                <ul class="menu-list">
                                    <li class="menu-item"><?=Html::a('blog', '/blog/')?></li>
                                    <li class="menu-item"><?=Html::a('get in touch', '#')?></li>
                                </ul>
                            </div>
                            <div class="menu-b"></div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="content-space">
                <?= $content ?>
            </div>
        </div>
        <div class="footer">
            <div class="footer-content">
                <div class="copyright">SaneX</div>
            </div>
        </div>
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>