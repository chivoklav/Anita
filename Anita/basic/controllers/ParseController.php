<?php
/**
 * Created by PhpStorm.
 * User: goas
 * Date: 29.09.15
 * Time: 1:41
 */

namespace app\controllers;
use yii\web\Controller;


class ParseController extends Controller {
    //look for key words on text. Open in divs text parts, allowing to edit tags Tags smth like:
    //[[id:123; tags: childhood, mother; ]] [[end id:123]]

    public $text;
    private $text_url = "../assets/lchuk3841.fb2";
    public function firstParse(){
        self::setText($this->text_url);
        $matches = array();
        //@todo clean cyrillic from code (use groups)
        $number = 0;
        $this->text = preg_replace("/[А-Я][а-я]+[ .,!?]/u", "<div class='possible_tag' style='background: #FFF281; display:inline'>$0</div>", $this->text, -1, $number);//
        //preg_match_all ("/[А-Я][а-я]*[ .,!?]/u", self::$text, $matches);//[ .,!?]"/\b[А-Я][а-я]*\b/""/\b[А-Я].*?\b/"

        //echo $this->render('index', ['text' => $this->text]);
        //var_dump($number, self::$text);
        //die();
    }

    public function actionParse(){
        self::firstParse();
        return $this->render('index');
    }

    public function actionIndex(){
        die("hello from index action");
    }



    private function getText(){
        return $this->text;
    }
    private function setText($filePath){
        $this->text = file_get_contents($filePath);
    }
}