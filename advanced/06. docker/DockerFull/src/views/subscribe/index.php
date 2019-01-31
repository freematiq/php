<?php
use \yii\helpers\Html;
?>
<p>DB: <?= number_format($total_db, 10) ?></p>
<p>Memory: <?= number_format($total_mem, 10) ?></p>
<p>Variable: <?= number_format($total_var, 10) ?></p>
<ol>
    <?php foreach($subs as $s): ?>
        <li>
            <?= Html::encode($s->user->username) ?> <?= Html::encode($s->course->title) ?>
        </li>
    <?php endforeach; ?>
</ol>
