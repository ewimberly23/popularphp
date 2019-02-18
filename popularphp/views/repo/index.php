<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RepoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

\app\assets\RepoAsset::register($this);

$this->title = 'PHP Projects';
$this->params['breadcrumbs']['homeLink'] = null;
?>
<div class="repo-index">


    <?php Pjax::begin(); ?>
    <h1>
        <?= Html::encode($this->title) ?>
        <?= Html::a('<i id="loading-gif" class="fas fa-spinner fa-spin" style="display:none;margin-right:12px;"></i>Update List', [], [
            'id' => 'fetch-more',
            'class' => ['btn btn-default pull-right'],
            'style' => ['margin-top:2px;']]
        ) ?>
    </h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'url:url',
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
    <?php Pjax::end(); ?>

</div>
