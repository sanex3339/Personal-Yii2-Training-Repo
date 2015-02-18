<?php

namespace sanex\blog\controllers;

use sanex\blog\models\Post;
use Yii;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\NotFoundHttpException;

class BlogController extends Controller
{
	public function actions()
    {
        return [
            'error' => [
                'class' => ErrorAction::className()
            ],
        ];
    }

    public function actionBlog()
    {
        $post = new Post;
        $data = $post->find()->all();

        return $this->render('blog', [
            'data' => $data
        ]);
    }

    public function actionRead($id)
    {
        $post = Post::findOne($id);
 
        if ($post === NULL) 
            if (is_numeric($id))
            {
                throw new NotFoundHttpException('Post With ID '.$id.' Does Not Exist');
            } else {
                throw new NotFoundHttpException('Invalid Post ID');
            }
 
        return $this->render('read', [
            'post' => $post,
        ]);
    }

    public function actionCreate()
    {
        $model = new Post;

        if (!Yii::$app->request->isAjax && !Yii::$app->request->isPost)
        {
            throw new NotFoundHttpException('Page not found.'); 
        }

        if (Yii::$app->request->post('Post'))
        {
            $postData = Yii::$app->request->post('Post');
            $model->title = $postData['title'];
            $model->content = $postData['content'];
     
            if ($model->save())
            {  
                Yii::$app->session->setFlash('PostCreated');  
                return Yii::$app->getResponse()->redirect(array('blog/blog/read', 'id' => $model->id));
            }    
        }

        echo $this->renderAjax('create', array(
            'model' => $model
        ));
    }

    public function actionUpdate($id = NULL)
    {     
        $model = Post::findOne($id);

        if (!Yii::$app->request->isAjax && !Yii::$app->request->isPost)
        {
            throw new NotFoundHttpException('Page not found.'); 
        }
        
        if ($model === NULL)
        {
            if (is_numeric($id))
            {
                throw new NotFoundHttpException('Post With ID '.$id.' Does Not Exist');
            } else {
                throw new NotFoundHttpException('Invalid Post ID');
            }
        }    
     
        if (Yii::$app->request->post('Post'))
        {
            $postData = Yii::$app->request->post('Post');
            $model->title = $postData['title'];
            $model->content = $postData['content'];
     
            if ($model->save())
            {
                Yii::$app->session->setFlash('PostUpdated');
                return Yii::$app->getResponse()->redirect(array('blog/blog/read', 'id' => $model->id));
            }    
        }
     
        echo $this->renderAjax('create', array(
            'model' => $model
        )); 
    }

    public function actionDelete($id=NULL)
    {
        if ($id === NULL)
        {
            Yii::$app->session->setFlash('PostDeletedError');
            Yii::$app->getResponse()->redirect(array('blog/blog/blog'));
        }
     
        $post = Post::findOne($id);
     
     
        if ($post === NULL)
        {
            Yii::$app->session->setFlash('PostDeletedError');
            Yii::$app->getResponse()->redirect(array('blog/blog/blog'));
        }
     
        $post->delete();
     
        Yii::$app->session->setFlash('PostDeleted');
        Yii::$app->getResponse()->redirect(array('blog/blog/blog'));
    }
}
