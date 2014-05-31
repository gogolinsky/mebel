<?php

class LineWidget extends CWidget {
    public $linelist;

    public function init(){
        $this->linelist = Line::model()->findAll(array(
            'order' => 'sort ASC',
        ));
    }
	public function getData(){
        return $this->linelist;
    }
    public function run(){
        $this->render('linelist');
    }
}