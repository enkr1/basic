<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Articles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <?php if (!Yii::$app->user->isGuest) : ?>
        <p>
            <?= Html::a(Yii::t('app', 'Create Article'), ['create'], ['class' => 'btn btn-success pull-right']) ?>
        </p>
    <?php endif; ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel, // what is this 
        'itemView' => '_article_item',
        // 'itemOptions' => ['class' => 'item'],
        // 'itemView' => function ($model, $key, $index, $widget) {
        //     return Html::a(Html::encode($model->title), ['view', 'id' => $model->id]);
        // }
    ]); ?>

    <?php Pjax::end(); ?>

</div>