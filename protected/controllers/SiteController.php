<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$posts = Blog::model()->findAll(array(
            'order' => 'id DESC',
            'limit' => 3,
        ));
		$this->render('index', array(
            'posts' => $posts,
        ));
	}

    public function actionOrder() {
        $request = Yii::app()->request;
        $name = $request->getPost('name');
        $phone = $request->getPost('phone');
        $desc = $request->getPost('desc');
        $message = "$name, $phone. $desc";
        //Yii::app()->mailer->Host = 'smtp.yiiframework.com';
        //Yii::app()->mailer->IsSMTP();
        //Yii::app()->mailer->From = 'admin@pradosoft.com';
        Yii::app()->mailer->FromName = 'Cryzer Postmaster';
        //Yii::app()->mailer->AddReplyTo('wei@pradosoft.com');
        //Yii::app()->mailer->AddAddress('qian@yiiframework.com');
        Yii::app()->mailer->CharSet = 'UTF-8';
        Yii::app()->mailer->AddAddress(Yii::app()->params['adminEmail']);
        Yii::app()->mailer->Subject = 'Клиент с сайта';
        Yii::app()->mailer->Body = $message;
        Yii::app()->mailer->Send();
    }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}