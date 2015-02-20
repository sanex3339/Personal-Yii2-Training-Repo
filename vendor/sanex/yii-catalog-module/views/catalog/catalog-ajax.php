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

    //$this->registerJsFile(Yii::$app->assetManager->getPublishedUrl('@sanex/layout/site').'/js/filters.js', ['depends' => ['yii\web\JqueryAsset']]);
?>
<?php \yii\widgets\Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'info',
            'country',
            'size',
            'price'
        ],
        'summary' => false,
        'emptyText' => 'Ничего не найдено'
    ]); ?>
<?php \yii\widgets\Pjax::end(); ?>