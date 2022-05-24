<h1 class="text-center">Мы copy star</h1>

<h2 class="text-center">Мы лучшие на рынке</h2>

<div class="img-800">
    <picture> 
        <img src="img/logo.png" alt="logo">
    </picture>
</div>

<div id="slider">
    <div class="slides">
        <?php

        use App\models\Goods;

        $slides = Goods::selectSlider();
        foreach ($slides as $slide):
        ?>
        <div class="slide">
            <picture><img src="/img/<?php echo $slide['photo']?>" alt="<?php echo $slide['name']?>"></picture>
            <h2><?php echo $slide['name']?></h2>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="/js/about_us.js"></script>