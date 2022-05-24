<h1 class="text-center">Войти в аккаунт</h1>
<form name="login">
    <div class="form-conroll">
        <input type="text" required name="login" placeholder="Введите логин" pattern="^[A-Za-z0-9-]+$">
    </div>

    <div class="form-conroll">
        <input type="password" name="password" required placeholder="Введите пароль" pattern=".{6,}">
    </div>

    <div class="form-conroll">
        <button type="submit" class="btn">Войти</button>
    </div>

    <div class="form-conroll">
        <div class="answer"></div>
    </div>
</form>


<script src="/js/login.js"></script>