<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Enroll $model */

$this->title = 'Update Enroll: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Enrolls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="enroll-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
