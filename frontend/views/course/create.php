    <style>
    .card {
        max-width: 1000px;
        margin: 0 auto;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        border-radius: 5px;
    }

    .card-header {
        background-color: #000080;
        padding: 10px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        color: #fff;
    }

    .card-title {
        font-size: 18px;
        margin-bottom: 0;
    }

    .card-body {
        background-color: #ffff;
        padding: 20px;
    }
    </style>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

    
    
    
    <?php

    use yii\helpers\Html;

    /** @var yii\web\View $this */
    /** @var common\models\Course $model */

    $this->title = 'Create Course';
    $this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    ?>
    <div class="course-create">

        <div class="card card-blue">
            <div class="card-header" style="background-color: #000080;">
                <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="card-body" style="background-color: #ffff;">
                <div class="grid-view-container">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>

    </div>

    