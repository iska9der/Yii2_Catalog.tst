<?php

use yii\Helpers\Url;

?>

<div class="card m-3" style="width: 21rem;">
  <img class="card-img-top p-2" src="<?php echo $model->pic ?>" width="300" height="250" alt="Картинка товара <?php echo $model->name ?>">
  <div class="card-body">
    
    <a class="btn btn-success" style="width:80%; cursor:default;"><?php echo $model->price ?>RUB</a>
    <a href="#" class="btn btn-primary" style="width:18%"><i class="fas fa-cart-plus"></i></a>
    
    <h5 class="card-title" style="margin-top:20px;">
      <a href="<?= Url::to(['product/view?id=' . $model->product_id])  ?>">
        <?php echo $model->name ?>
      </a>
    </h5>

  </div>
</div>