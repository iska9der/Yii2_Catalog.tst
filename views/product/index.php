<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <div class="row justify-content-md-center">
        <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>
    </div>
    <p>
        <?= Html::a('Create', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'product_id',
            'name:ntext',
            'price',
            [
                'attribute' => 'category',
                'value' => function ($data) {
                    return Category::findOne(['category_id' => $data->category_id])->name;
                },
            ],
            [
                'attribute' => 'pic',
                'format' => ['image', ['width' => '80']],
            ],
            'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
