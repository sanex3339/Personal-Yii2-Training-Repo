<?php
    use yii\bootstrap\ActiveForm;
    use yii\captcha\Captcha;
    use yii\grid\GridView;
    use yii\helpers\Html;
    use yii\web\View;
    
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