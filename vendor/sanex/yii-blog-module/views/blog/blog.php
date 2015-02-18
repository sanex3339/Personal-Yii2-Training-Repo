<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\bootstrap\ActiveForm;
    use yii\captcha\Captcha;
    use yii\bootstrap\Modal;

    /* @var $this yii\web\View */
    /* @var $form yii\bootstrap\ActiveForm */
    /* @var $model sanex\site\models\ContactForm */

    $this->title = 'Blog';
    $this->params['breadcrumbs'][] = $this->title;

    //create new post modal
    Modal::begin([
        'header' => '<h2>Create New Post</h2>',
        'id' => 'modalCreateNewPost',
        'size' => 'size-lg',
    ]);
    echo "<div id='modalCreateNewPostContent'></div>";
    Modal::end();

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
        <h2><?=Html::encode($this->title)?></h2>

        <?=Html::button('Create New Post', ['value' => Url::to('/blog/create/'), 'class' => 'createNewPostButton btn btn-success'])?>
        <div class="clearfix"></div>
        <hr />

        <?php if(Yii::$app->session->hasFlash('PostDeletedError')): ?>
        <div class="alert alert-danger">
            There was an error deleting your post!
        </div>
        <?php endif; ?>
         
        <?php if(Yii::$app->session->hasFlash('PostDeleted')): ?>
        <div class="alert alert-success">
            Your post has successfully been deleted!
        </div>
        <?php endif; ?>

        <table class="table table-striped table-hover">
            <tr>
                <td>#</td>
                <td>Title</td>
                <td>Created</td>
                <td>Updated</td>
                <td>Options</td>
            </tr>
            <?php foreach ($data as $post): ?>
                <tr>
                    <td>
                        <?=Html::a($post->id, array('blog/read', 'id'=>$post->id))?>
                    </td>
                    <td><?=Html::a($post->title, array('blog/read', 'id'=>$post->id))?></td>
                    <td><?=date('d/m/Y H:i:s' , strtotime($post->created))?></td>
                    <?php if(date('y', strtotime($post->updated)) != '-1'){ ?>
                        <td><?=date('d/m/Y H:i:s' , strtotime($post->updated))?></td>
                    <?php } else {?>
                        <td>--/--/-- --:--:--</td>
                    <?php } ?>
                    <td>
                        <?=Html::button(NULL, ['value' => Url::to(array('blog/update', 'id'=>$post->id)), 'class' => 'updatePostButton updatePostButtonStyle glyphicon glyphicon-edit'])?>
                        <?=Html::a(NULL, array('blog/delete', 'id'=>$post->id), array('class'=>'deletePostButton glyphicon glyphicon-trash'))?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>