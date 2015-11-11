<?php
/**
 * Created by PhpStorm.
 * User: goas
 * Date: 11.11.15
 * Time: 19:48
 */

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Source;

class SourceController extends Controller {
    private $dir = "../assets/sources";
    public function actionIndex(){
        $query = Source::find();
        $pagination = new Pagination(["defaultPageSize" => 10, "totalCount" => $query->count()]);
        $sources = $query->orderBy("id")
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        /*foreach($sources as $source){

        }*/
        return $this->render("index", ["sources" =>$sources, "pagination" => $pagination ] );
    }

    private function scanDir(){
        //scan a directory for not processed books
        $dir = scandir($this->dir);
        if(!empty($dir)){
            foreach($dir as $source){
                //make sure we don't use it
                if(strpos( $source, "id_") !== false){
                    continue;
                }
                // make sure it's fb2
                if( pathinfo($source, PATHINFO_EXTENSION) != "fb2" ){
                    die("File $source has extension ".pathinfo($source, PATHINFO_EXTENSION)." instead of fb2");
                }

            }
        }
    }
} 