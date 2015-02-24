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
?>
<?php \yii\widgets\Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $data,
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
<?php \yii\widgets\Pjax::end();?>