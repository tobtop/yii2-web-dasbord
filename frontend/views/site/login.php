<style>
.site-login {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #68A4F1;
}

.card {
    position: relative;
    width: 400px;
    padding: 20px;
}

.card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url('https://cdn.pixabay.com/photo/2015/01/09/11/08/startup-594090_960_720.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    opacity: 0.7;
    z-index: -1;
}

.btn-Navy {
    background-color: #001F3D;
    color: white;
}
</style>

<?php
/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
    <div class="card">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>Please fill out the following fields to login:</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div style="color:#999;margin:1em 0">
            If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.<br>
            Need a new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-Navy', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>