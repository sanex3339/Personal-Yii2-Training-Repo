<?php 
    use yii\bootstrap\Modal;
    use yii\helpers\Html; 
    use yii\helpers\Url;

    $this->title = $post->title;
    $this->params['breadcrumbs'][] = $this->title;

    //update post modal
    Modal::begin([
        'header' => '<h2>Update Post</h2>',
        'id' => 'modalUpdatePost',
        'size' => 'size-lg',
    ]);
    echo "<div id='modalUpdatePostContent'></div>";
    Modal::end();
?>

<div class="layout-main">
    <div class="content clearfix">
		<?php if(Yii::$app->session->hasFlash('PostCreated')): ?>
		<div class="alert alert-success">
		    Post Created!
		</div>
		<?php endif; ?>
		<?php if(Yii::$app->session->hasFlash('PostUpdated')): ?>
		<div class="alert alert-success">
		    Post Updated!
		</div>
		<?php endif; ?>

		<div class="pull-right btn-group">
			<?=Html::button('Update', ['value' => Url::to(array('blog/update', 'id'=>$post->id)), 'class' => 'updatePostButton btn btn-primary'])?>
		    <?=Html::a('Delete', array('blog/delete', 'id' => $post->id), array('class' => 'btn btn-danger'));?>
		</div>
		 
		<h1><?=$post->title;?></h1>
		<p><?=$post->content;?></p>
		<hr />
		<time>Created On: <?=date('d/m/Y H:i:s' , strtotime($post->created))?></time><br />
		<?php if(date('y', strtotime($post->updated)) != '-1'): ?>
			<time>Updated On: <?=date('d/m/Y H:i:s' , strtotime($post->updated))?></time>
		<?php endif; ?>	
	</div>
</div>