<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <?php if (!Yii::$app->user->isGuest) : ?>
        <p>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'slug' => $model->slug], ['class' => 'btn btn-primary pull-right']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'slug' => $model->slug], [
                'class' => 'btn btn-danger pull-right',
                'style' => 'margin-right: 1rem;',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
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

    <?php
    if (!empty($model->updatedBy->username)) {
    ?>
        <p class="text-muted text-right">
            <small>
                <i>
                    <?php echo $model->updatedBy->username ?> edited <?php echo Yii::$app->formatter->asRelativeTime($model->updated_at) ?>
                </i>
            </small>
        </p>
    <?php
    }
    ?>
</div>