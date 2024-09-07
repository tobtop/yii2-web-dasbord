<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Enroll $model */

$this->title = 'Register';
$this->params['breadcrumbs'][] = ['label' => 'Enrolls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enroll-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
