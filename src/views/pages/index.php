<h1 class="text-center">Каталог</h1>

<div class="filter">
    <form action="/index.php" method="get">
    <?php
        use App\models\Categories;
        $categories = Categories::select();
    ?>

    <div class="d-flex align-center">
        <div>
            <select name="category">
                    <?php 
                        foreach ($categories as $category) {
                            echo '<option value="'.$category['id'].'">'.$category['name'].'</option>';
                        }
                    ?>
            </select>
        </div>
        <div>
            <select name="type">
                <option value="g.year">По году выпуска</option>
                <option value="g.name">По наименованию</option>
                <option value="g.price">По цене</option>
            </select>
        </div>
        <div><button class="btn" type="submit">Фильтровать</button></div>
    </div>
    </form>
</div>

<div class="d-grid grid-row">
    <?php
    use App\models\Goods;

    $goods = Goods::selectInner();

    foreach ($goods as $good): ?>
        <div class="col-3">
            <a href="/good.php?id=<?php echo $good['id']?>">
                <form class="addToCart">
                    <picture>
                        <img src="/img/<?php echo $good['photo'] ?>" alt="<?php echo $good['name'] ?>">
                    </picture>
    
                    <h3 class="text-center"><?php echo $good['name'] ?></h3>
                    <h3 class="text-center"><?php echo $good['price'] ?> руб.</h3>
                    <input type="hidden" name="good_id" value="<?php echo $good['id'] ?>">
                    <?php if (!empty($_SESSION['login'])): ?>
                        <div class="form-conroll">
                            <button class="btn">Добавить в корзину</button>
                        </div>
                    <?php endif ?>
                    <div class="form-controll">
                        <div class="answer text-center"></div>
                    </div>
                </form>
            </a>
        </div>
    <?php endforeach ?>
</div>