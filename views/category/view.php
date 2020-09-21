<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ListView;

$this->title = 'Товары';
?>
<div class="category-index">

<div class="row justify-content-md-center">
    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>
</div>
<hr>

<?php echo  ListView::widget([
    'dataProvider' => $dataProvider,
    'pager' => [
        'class' => \yii\bootstrap4\LinkPager::class,
    ],
    'itemView' => '..\product\_product_item',
    'layout' => '<div class="d-flex flex-wrap">{items}</div>{pager}',
    'itemOptions' => [
        'tag' => false
    ]
])


?>
</div>