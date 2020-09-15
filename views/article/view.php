<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <?php if (!Yii::$app->user->isGuest) : ?>
        <p>
            <?= Html::a('Update', ['update', 'slug' => $model->slug], ['class' => 'btn btn-primary pull-right']) ?>
            <?= Html::a('Delete', ['delete', 'slug' => $model->slug], [
                'class' => 'btn btn-danger pull-right',
                'style' => 'margin-right: 1rem;',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif; ?>

    <h1><?= Html::encode($this->title) ?></h1>
    <p class="text-muted">
        <small>
            <?php echo $model->createdBy->username ?> created <?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?>
        </small>
    </p>


    <div>
        <?php
        echo $model->getEncodedBody();
        ?>
    </div>

</div>