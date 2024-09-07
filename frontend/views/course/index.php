<?php

use common\models\Course;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\CourseSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Create';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">





    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="card card-blue">
        <div class="card-header" style="background-color: #000080;">
            <h3 class="card-title "><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="card-body" style="background-color:#ffff;">
            <p>
                <?= Html::a('Create Course', ['create'], ['class' => 'btn btn-primary']) ?>
            </p>
           
           <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',
                'Course_Name',
                'Description',
                'price',
                'Duration',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Course $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
        </div>
    </div>
    </div>

        