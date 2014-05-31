<?php

class LineController extends Controller
{
//	public function actionIndex()
//	{
//		$this->render('index');
//	}

	public function actionView()
	{
        $request = Yii::app()->request;
        $type = $request->getQuery('type');
        if ($type) {
            $line = Line::model()->with('lineImages')->find(array(
                'condition' => 'url = :url',
                'params' => array(
                    ':url' => $type,
                ),
            ));
            $this->render('view', array(
                'line' => $line,
            ));
        } else {
            $this->redirect('/site');
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