<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <?php if (!Yii::$app->user->isGuest) : ?>
        <p>
            <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success pull-right']) ?>
        </p>
    <?php endif; ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'itemView' => '_article_item'
    ]); ?>


</div>