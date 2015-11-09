<?php
/**
 * Created by PhpStorm.
 * User: goas
 * Date: 25.09.15
 * Time: 19:18
 */
use yii\helpers\Html;
?>
<p>You have entered the following information:</p>

<ul>
    <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
</ul>