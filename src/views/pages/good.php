<?php

use App\models\Goods;

if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
    $id = 1;
} else {
    $id = $_GET['id'];
}

$good = Goods::selectById($id);
?>

<div class="d-grid grid-row m-t-10">
    <div class="col-6">
        <img src="/img/<?php echo $good['photo'] ?>" alt="<?php echo $good['name'] ?>">
    </div>
    <div class="col-6 d-grid align-center">
        <div class="grid-fix">
            <h1 class="text-center"><?php echo $good['name'] ?></h1>
            <h2 class="text-center"><?php echo $good['price'] ?> руб.</h2>
            <h2 class="text-center">Модель: <?php echo $good['model'] ?></h2>
            <h2 class="text-center">Страна производитель: <?php echo $good['country'] ?></h2>
            <h2 class="text-center">Год выпуска: <?php echo $good['year'] ?></h2>
            <form class="addToCart">
                <input type="hidden" name="good_id" value="<?php echo $good['id'] ?>">
                <?php if (!empty($_SESSION['login'])) : ?>
                    <div class="form-conroll">
                        <button class="btn">Добавить в корзину</button>
                    </div>
                <?php endif ?>
                <div class="form-controll">
                    <div class="answer text-center"></div>
                </div>
            </form>
        </div>
    </div>
</div>