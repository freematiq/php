<?php

/* @var $this yii\web\View */

$this->title = 'Digital space';
?>
<div class="site-index">

    <div class="row">
        <div class="text-center"><h2>Все курсы</h2></div>
        <ul>
            <?php foreach($courses as $course) : ?>
                <li><?= $course->title ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="row">
        <div class="text-center"><h2>События</h2></div>
    </div>
    <div class="row section-about">
        <div class="text-center">
            <h2>«Digital Space» — это:</h2>
        </div>
        <div class="row">
            <div class="about-one col-xs-12 col-sm-6 col-md-3 sm-margin">
                <h3>Авторизированный Учебный центр </h3>
                <p>Ведущих ИТ-компаний региона (Freematiq, Mitra)  для лучших выпускников курсов – собеседование – стажировка, трудоустройство, оплата курсов</p>
            </div>
            <div class="about-one col-xs-12 col-sm-6 col-md-3 sm-margin">
                <h3>Уникальный комплекс образовательных программ </h3>
                <p>В сфере информационных технологий (программирование, разработка, повышение квалификации)</p>
            </div>
            <div class="about-one col-xs-12 col-sm-6 col-md-3 sm-margin">
                <h3>Команда преподавателей практиков</h3>
                <p>Региона (Freematiq, Mitra) для лучших выпускников курсов</p>
            </div>
            <div class="about-one col-xs-12 col-sm-6 col-md-3 sm-margin">
                <h3>Комфортная инфраструктура </h3>
                <p>Большой и малый конференц-зал, нетворкинг зона</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="text-center"><h2>Партнёры</h2></div>
    </div>

</div>
