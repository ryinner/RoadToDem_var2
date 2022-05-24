<h1 class="text-center">Корзина</h1>
<?php

use App\models\Goods;

$cartItems = Goods::selectCart();
?>
<div class="d-grid grid-row">
    <?php foreach ($cartItems as $good) : ?>
        <div class="col-3">
            <form class="addToCart">
                <picture>
                    <img src="/img/<?php echo $good['photo'] ?>" alt="<?php echo $good['name'] ?>">
                </picture>

                <h3 class="text-center"><?php echo $good['name'] ?></h3>
                <h3 class="text-center"><?php echo $good['price'] ?> руб.</h3>
                <input type="hidden" name="good_id" value="<?php echo $good['id'] ?>">
                <input type="number" min="1" max="<?php echo $good['count'] ?>" value="<?php echo $_SESSION['cart'][$good['id']] ?>">
            </form>
        </div>
    <?php endforeach ?>
</div>