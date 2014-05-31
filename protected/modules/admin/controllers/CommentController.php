<?php

class CommentController extends Controller
{
	public function actionIndex()
	{
        $comments = Comment::model()->findAll();
		$this->render('index', array(
            'comments' => $comments,
        ));
	}

	public function actionView()
	{
        $request = Yii::app()->request;
        $id = $request->getQuery('id', false);
        if ($id) {
            $comment = Comment::model()->findByPk($id);
            $this->render('view', array(
                'comment' => $comment,
            ));
        } else {
            $this->redirect('admin/comment');
        }

	}

    public function actionCreate() {
        $line = new Comment();
        $line->save(false);
        $last_id = $line->id;
        $this->redirect($this->createUrl("/admin/comment/$last_id"));
    }

    public function actionUpdate() {

        $request = Yii::app()->request;
        $id = $request->getPost('id', false);
        $submit = $request->getPost('submit', false);
        $remove = $request->getPost('remove', false);
        if ($id) {
            if ($submit) {
                $comment = Comment::model()->findByPk($id);
                $comment->attributes = $_POST;
                $comment->save(false);
                $this->redirect("/admin/comment/$id");
            } elseif ($remove) {
                $comment = Comment::model()->findByPk($id);
                $comment->delete();
                $this->redirect("/admin/comment");
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