<?php 
	use yii\helpers\Html; 
	use yii\widgets\ActiveForm;

	if (Yii::$app->controller->action->id == 'create'){
		$this->title = 'New Post';
	} elseif (Yii::$app->controller->action->id == 'update') {
		$this->title = 'Update Post';
	}

	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content clearfix">
	<div class="col-lg-12">
		<?php $form = ActiveForm::begin([
		    'options' => ['class' => 'form-horizontal'],
		]); ?>

		<?=$form->field($model, 'title')->textInput();?>

		<?=$form->field($model, 'content')->textArea();?>

		<div class="form-group">
		    <?=Html::submitButton('Submit', ['class' => 'btn btn-primary']);?>
		</div>

		<?php ActiveForm::end(); ?>
	</div>
</div>