<?php

use yii\Helpers\Url;

?>

<div class="card m-3" style="width: 21rem;">
  <a href="<?= Url::to(['category/view?id=' . $model->category_id]) ?>">
    <img class="card-img-top" src="<?php echo $model->pic ?>" width="300" height="250" alt="Картинка товара <?php echo $model->name ?>">
    <div class="card-body">
      <h5 class="card-title"><?php echo $model->name ?></h5>
    </div>
  </a>
</div>