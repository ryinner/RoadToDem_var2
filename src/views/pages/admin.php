<h1 class="text-center">Админ панель</h1>
<hr>
<form action="/Api/AddCategory.php" method="post">
    <h2 class="text-center">Добавить категорию</h2>
    <div class="form-conroll">
        <input type="text" name="category" required placeholder="Введите название">
    </div>

    <div class="form-conroll">
        <button type="submit" class="btn">Создать</button>
    </div>

    <div class="form-conroll">
        <div class="answer">
            <?php
                if (!empty($_SESSION['message']['category'])) {
                    echo $_SESSION['message']['category'];
                    unset($_SESSION['message']['category']);
                }
            ?>
        </div>
    </div>
</form>

<hr>

<form action="/Api/DeleteCategory.php" method="post">
    <h2 class="text-center">Удалить категорию</h2>
    <div class="form-conroll">
        <select name="category">
            <?php 
                use App\models\Categories;
                $categories = Categories::select();

                foreach ($categories as $category) {
                    echo '<option value="'.$category['id'].'">'.$category['name'].'</option>';
                }
            ?>
            
        </select>
    </div>
    <div class="form-conroll">
        <button type="submit" class="btn">Удалить</button>
    </div>
    <div class="form-conroll">
        <div class="answer">
            <?php
                if (!empty($_SESSION['message']['category_delete'])) {
                    echo $_SESSION['message']['category_delete'];
                    unset($_SESSION['message']['category_delete']);
                }
            ?>
        </div>
    </div>
</form>

<hr>

<form action="/Api/AddGood.php" method="post" enctype="multipart/form-data">
    <h2 class="text-center">Добавить Товар</h2>
    <div class="form-conroll">
        <input type="text" name="name" required placeholder="Введите название">
    </div>
    <div class="form-conroll">
        <input type="number" min="1" name="price" required placeholder="Введите цену">
    </div>
    <div class="form-conroll">
        <input type="text" name="country" required placeholder="Введите страну">
    </div>
    <div class="form-conroll">
        <input type="text" name="model" required placeholder="Введите модель">
    </div>
    <div class="form-conroll">
        <input type="number" name="year" min="1970" max="2022" required placeholder="Введите год выпуска">
    </div>
    <div class="form-conroll">
        <input type="number" name="count" min="1" required placeholder="Введите количество">
    </div>
    <div class="form-conroll">
        <input type="file" name="photo" required placeholder="Добавьте фотографию">
    </div>
    
    <div class="form-conroll">
        <select name="category">
            <?php 
                foreach ($categories as $category) {
                    echo '<option value="'.$category['id'].'">'.$category['name'].'</option>';
                }
            ?>
            
        </select>
    </div>

    <div class="form-conroll">
        <button type="submit" class="btn">Создать</button>
    </div>

    <div class="form-conroll">
        <div class="answer">
            <?php
                if (!empty($_SESSION['message']['good'])) {
                    echo $_SESSION['message']['good'];
                    unset($_SESSION['message']['good']);
                }
            ?>
        </div>
    </div>
</form>

<hr>

<form action="/Api/DeleteGood.php" method="post">
    <h2 class="text-center">Удалить товар</h2>
    <div class="form-conroll">
        <select name="good">
            <?php 
                use App\models\Goods;
                $goods = Goods::select();

                foreach ($goods as $good) {
                    echo '<option value="'.$good['id'].'">'.$good['name'].'</option>';
                }
            ?>
            
        </select>
    </div>
    <div class="form-conroll">
        <button type="submit" class="btn">Удалить</button>
    </div>
    <div class="form-conroll">
        <div class="answer">
            <?php
                if (!empty($_SESSION['message']['good_delete'])) {
                    echo $_SESSION['message']['good_delete'];
                    unset($_SESSION['message']['good_delete']);
                }
            ?>
        </div>
    </div>
</form>

<hr>