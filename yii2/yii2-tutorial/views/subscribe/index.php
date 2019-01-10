<?php
use \yii\helpers\Html;
?>
<ol>
    <?php foreach($subs as $s): ?>
        <li>
            <?= Html::encode($s->user->username) ?> <?= Html::encode($s->course->title) ?>
        </li>
    <?php endforeach; ?>
</ol>
