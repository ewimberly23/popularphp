<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RepoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'PHP Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repo-index">

    <h1>
        <?= Html::encode($this->title) ?>
    </h1>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'repo_id',
            'name',
            'url:url',
            // 'created_date',
            // 'last_push_date',
            'description:ntext',
            [
                'attribute' => 'star_count',
                'label' => 'Star Count',
                'format' => 'html',
                'value' => function($model) {
                    return '<i class="fa fa-star" style="color:#DAA520;" aria-hidden="true"></i> ' . $model->star_count;
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>

</div>
