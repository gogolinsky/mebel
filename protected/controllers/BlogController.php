<?php

class BlogController extends Controller
{
	public function actionIndex()
	{
        $criteria = new CDbCriteria();
        $count = Blog::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 5;
        $pages->applyLimit($criteria);
        $posts = Blog::model()->findAll($criteria);
		$this->render('index', array(
            'posts' => $posts,
            'pages' => $pages,
        ));
	}

	public function actionView()
	{
        $request = Yii::app()->request;
        $id = $request->getQuery('id');
        $post = Blog::model()->findByPk($id);
		$this->render('view', array(
            'post' => $post,
        ));
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