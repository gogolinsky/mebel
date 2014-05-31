<?php

class LineController extends Controller
{
    public function actionIndex()
    {
        $lines = Line::model()->findAll();
        $this->render('index', array(
            'lines' => $lines,
        ));
    }

    public function actionView()
    {
        $request = Yii::app()->request;
        $id = $request->getQuery('id', false);
        if ($id) {
            $line = Line::model()->with('lineImages')->findByPk($id);
            $this->render('view', array(
                'line' => $line,
            ));
        }
    }

    public function actionCreate() {
        $line = new Line();
        $line->save(false);
        $last_id = $line->id;
        $this->redirect($this->createUrl("/admin/line/$last_id"));
    }

    public function actionUpdate()
    {
        $request = Yii::app()->request;
        $id = $request->getPost('id', false);
        $submit = $request->getPost('submit', false);
        $remove = $request->getPost('remove', false);
        if ($id) {
            if ($submit) {
                $line = Line::model()->findByPk($id);
                $line->attributes = $_POST;
                $line->save(false);
                if ($_FILES['images']['name'][0]!=='') {
                    $filearr = array();
                    $count = count($_FILES['images']['name'])-1;
                    for ($j = 0; $j<=$count; $j++) {
                        $filearr[$j]['name'] = $_FILES['images']['name'][$j];
                        $filearr[$j]['type'] = $_FILES['images']['type'][$j];
                        $filearr[$j]['tmp_name'] = $_FILES['images']['tmp_name'][$j];
                        $filearr[$j]['error'] = $_FILES['images']['error'][$j];
                        $filearr[$j]['size'] = $_FILES['images']['size'][$j];
                    }
                    $i = time().rand(1, 999);
                    foreach($filearr as $item) {
                        $ext = pathinfo($item['name'], PATHINFO_EXTENSION);
                        while (file_exists($_SERVER['DOCUMENT_ROOT']."/images/work/".$line->url."/".$i.'.'.$ext)) {
                            $i++;
                        }
                        $new_img = new LineImage();
                        $new_img->line_id = $id;
                        $new_img->name = $i.'.'.$ext;
                        $new_img->save(false);
                        move_uploaded_file($item['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/images/work/".$line->url."/".$i.'.'.$ext);
                    }
                }
                $this->redirect("/admin/line/$id");
            } elseif ($remove) {
                $line = Line::model()->findByPk($id);
                $line->delete();
                $this->redirect("/admin/line");
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