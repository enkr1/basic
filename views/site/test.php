<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Test';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-test">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Testing message: <?php echo $msg; ?>
    </p>
    <i>
     Using "?r=site/test&msg=urmsg"
    </i>

    <!-- <code><?= __FILE__ ?></code> -->
</div>
