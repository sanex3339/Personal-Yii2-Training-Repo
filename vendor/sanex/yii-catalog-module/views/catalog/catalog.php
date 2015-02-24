<?php
    use sanex\filter\SanexFilter;
    use yii\bootstrap\ActiveForm;
    use yii\captcha\Captcha;
    use yii\grid\GridView;
    use yii\helpers\Html;
    use yii\web\View;

    $this->title = 'Blog';
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="layout-main">
    <div class="content clearfix">
        <h2><?=Html::encode($this->title)?></h2>
        <?=$filter->setFilter([
            'filter' => 
            [
                [
                    'property' => 'color',
                    'caption' => 'Цвет',
                    'values' => [
                        'Красный',
                        'Зеленый',
                        'Синий',
                        'Черный'
                    ]
                ],
                [
                    'property' => 'country',
                    'caption' => 'Страна',
                    'values' => [
                        'Россия',
                        'Украина',
                        'США'
                    ]
                ],
                [
                    'property' => 'size',
                    'caption' => 'Размер',
                    'values' => [
                        '45x45',
                        '50x50',
                        '60x60'
                    ]
                ]
            ], 
            'modelClass' => $modelClass,
            'viewFile' => $viewFile,
            'setDataProvider' => true
        ])?>
        <?=$filter->renderDataView()?>
    </div>
</div>