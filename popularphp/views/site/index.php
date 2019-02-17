<?php

use yii\grid\GridView;

/* @var $this yii\web\View */

$this->title = 'Popular GitHub Repositories';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>
        <p class="lead">You have successfully created your Yii-powered application.</p>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-md-7">
                <h1>PHP</h1>
            </div>
        </div>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
            ],
        ]) ?>
    </div>
</div>
