<?php
/**
 * Created by PhpStorm.
 * User: goas
 * Date: 25.09.15
 * Time: 19:00
 */

namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;

    public function rules(){
        return [
            [['name', 'email'], 'required'],
            ['email', 'email']
        ];
    }


}