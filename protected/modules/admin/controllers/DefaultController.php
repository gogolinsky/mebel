<?php

class DefaultController extends BlockController
{
	public function actionIndex()
	{
		$this->render('index');
	}
}