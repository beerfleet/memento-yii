<?php

use app\models\Memo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\MemoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Memos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Memo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="table-responsive">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'options' => ['class' => 'grid-view table-responsive table-striped table-bordered'],
            'columns' => [
                [
                    'attribute' => 'name',
                    'headerOptions' => ['class' => 'text-center'],
                ],
                [
                    'attribute' => 'description',
                    'format' => 'ntext',
                    'headerOptions' => ['class' => 'text-center'],
                ],
                [
                    'attribute' => 'type_id',
                    'headerOptions' => ['class' => 'text-center'],
                ],
                [
                    'class' => ActionColumn::class,
                    'urlCreator' => function ($action, Memo $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            },
                    'headerOptions' => ['class' => 'text-center'],
                    'contentOptions' => ['class' => 'text-center'],
                    'template' => '{view} {update} {delete}',
                ],
            ],
        ]); ?>

    </div>


</div>