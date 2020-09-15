<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArticleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'title') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary pull-right']) ?>
        <?= Html::resetButton('Reset', [
            'class' => 'btn btn-outline-secondary pull-right',
            'style' => 'margin-right: 1rem;'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
    <br>
    <br>
    <hr>
</div>