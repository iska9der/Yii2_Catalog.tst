<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Category;
use app\models\Product;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropdownList(
        ArrayHelper::map(Category::find()->asArray()->all(), 'category_id', 'name')
    ); ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'picFile')->fileInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'qrcode')->textInput() ?>
    <?php
    foreach($model->getEavAttributes()->all() as $attr) {
        echo $form->field($model, $attr->name, ['class' => '\mirocow\eav\widgets\ActiveField'])->eavInput();
    }

    $category = $model->category_id;
    $constructorEAV = \mirocow\eav\admin\widgets\Fields::widget([
        'model' => $model,
        'categoryId' => $category,
        'entityName' => 'Продукт',
        'entityModel' => 'app\models\Product',
    ]);
    echo $constructorEAV;
    ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
