<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Repo */

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="repo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'repo_id',
            'name',
            'url:url',
            'created_date',
            'last_push_date',
            'description:ntext',
            [
                'attribute' => 'star_count',
                'format' => 'html',
                'value' => function($model) {
                    return '<i class="fa fa-star" style="color:#DAA520;" aria-hidden="true"></i> ' . $model->star_count;
                },
            ]

        ],
    ]) ?>

</div>
