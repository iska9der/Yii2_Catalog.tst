<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->product_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <div class="container">
        <div class="row justify-content-md-center m-5">
            <img width="300" src="<?php echo $model->pic ?>" alt="<?php echo $model->name ?>">
    </div>
        </div>
    </div>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'category',
                'value' => function ($data) {
                    return Category::findOne(['category_id'=>$data->category_id])->name;
                },
            ],
            'name',
            'price',
            'description:ntext',
        ],
    ]);
    foreach($model->getEavAttributes()->all() as $attr){
        echo $model[$attr->name];
    }
    ?>
    <div class="d-flex justify-content-center">
        <img src="<?= Url::to(['product/qr?id=' . $model->product_id]) ?>" />
    </div>


</div>
