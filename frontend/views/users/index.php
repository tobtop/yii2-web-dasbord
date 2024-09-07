<?php

use common\models\Users;
use yii\base\Model;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\UsersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'fname',
            'lname',
            'tel_no',
            //'role',
            [
                'label' => 'บทบาท',
                'format' => 'html',
                'value' => function($model){
                    if($model -> role == 0){
                        return '
                        <div align = "center">
                            <i class="fas fa-chess-king"></i>Super admin    
                        </div>';
                    }elseif($model -> role==1 ){
                        return '<i class="fas fa-user-tie"></i> Admin';
                    }else{
                        return '<i class="fas fa-user"></i>Users ';
                    }
                    
                },
            ],
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            //'email:email',
            //'status',
            //'isActive',
            //'created_by_user_id',
            //'updated_by_user_id',
            //'created_at',
            //'updated_at',
            //'verification_token',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Users $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
