<?php
    use yii\bootstrap\ActiveForm;
    use yii\captcha\Captcha;
    use yii\grid\GridView;
    use yii\helpers\Html;
    use yii\web\View;

    /* @var $this yii\web\View */
    /* @var $form yii\bootstrap\ActiveForm */
    /* @var $model sanex\site\models\ContactForm */

    $this->title = 'Blog';
    $this->params['breadcrumbs'][] = $this->title;

    $this->registerJsFile(Yii::$app->assetManager->getPublishedUrl('@sanex/layout/site').'/js/filters.js', ['depends' => ['yii\web\JqueryAsset']]);
?>
<div class="layout-main">
    <div class="content clearfix">
        <h2><?=Html::encode($this->title)?></h2>
        <div class="filters-wrapper">
            <div class="fltr-cat clearfix" id="color">
                <span class="fltr-cat-caption">Цвет:</span>
                <?=Html::a('Красный', 'javascript:', ['value' => 'Красный', 'class' => 'fltr-check'])?>
                <?=Html::a('Зеленый', 'javascript:', ['value' => 'Зеленый', 'class' => 'fltr-check'])?>
                <?=Html::a('Синий', 'javascript:', ['value' => 'Синий', 'class' => 'fltr-check'])?>
                <?=Html::a('Черный', 'javascript:', ['value' => 'Черный', 'class' => 'fltr-check'])?>
            </div>
            <div class="fltr-cat clearfix" id="country">  
                <span class="fltr-cat-caption">Страна:</span>
                <?=Html::a('Россия', 'javascript:', ['value' => 'Россия', 'class' => 'fltr-check'])?>
                <?=Html::a('Украина', 'javascript:', ['value' => 'Украина', 'class' => 'fltr-check'])?>
                <?=Html::a('США', 'javascript:', ['value' => 'США', 'class' => 'fltr-check'])?>
            </div>
            <div class="fltr-cat clearfix" id="size">
                <span class="fltr-cat-caption">Размер:</span>
                <?=Html::a('45x45', 'javascript:', ['value' => '45x45', 'class' => 'fltr-check'])?>
                <?=Html::a('50x50', 'javascript:', ['value' => '50x50', 'class' => 'fltr-check'])?>
                <?=Html::a('60x60', 'javascript:', ['value' => '60x60', 'class' => 'fltr-check'])?>
            </div>
        </div>
        <br />
        <br />
        <div class="table-data">
            <?= $this->render('catalog-ajax', [
                'dataProvider' => $dataProvider
            ]) ?>
        </div>
    </div>
</div>