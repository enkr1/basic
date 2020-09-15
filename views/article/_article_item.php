<?php
/*
** @var $model \app\models\Article
*/

use yii\bootstrap\Html;
use yii\helpers\Html as HelpersHtml;
use yii\helpers\StringHelper;

?>

<div>
    <a href="<?php echo yii\helpers\Url::to(['/article/view', 'slug' => $model->slug]) ?>">
        <h3><?php echo HelpersHtml::encode($model->title) ?></h3>
    </a>

    <div>
        <?php echo StringHelper::truncate($model->getEncodedBody(), 300) ?>
    </div>

    <p class="text-muted text-right">
        <small>
            <?php echo $model->createdBy->username ?> created <?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?>
        </small>
    </p>
    <hr>
</div>