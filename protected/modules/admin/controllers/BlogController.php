<?php

class BlogController extends BlockController
{
	public function actionIndex()
	{
        $posts = Blog::model()->findAll();
		$this->render('index', array(
            'posts' => $posts,
        ));
	}

	public function actionView()
	{
        $request = Yii::app()->request;
        $id = $request->getQuery('id', false);
        if ($id) {
            $post = Blog::model()->findByPk($id);
            $this->render('view', array(
                'post' => $post,
            ));
        }
	}

    public function actionCreate() {
        $post = new Blog();
        $post->date = date('Y-m-d H:i:s');;
        $post->save(false);
        $last_id = $post->id;
        $this->redirect($this->createUrl("/admin/blog/$last_id"));
    }

    public function actionUpdate()
    {
        $request = Yii::app()->request;
        $id = $request->getPost('id', false);
        $submit = $request->getPost('submit', false);
        $remove = $request->getPost('remove', false);
        if ($id) {
            if ($submit) {
                $post = Blog::model()->findByPk($id);
                $post->attributes = $_POST;
                $post->save(false);
                $this->redirect("/admin/blog/$id");
            } elseif ($remove) {
                $post = Blog::model()->findByPk($id);
                $post->delete();
                $this->redirect("/admin/blog");
            }
        }
    }
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}