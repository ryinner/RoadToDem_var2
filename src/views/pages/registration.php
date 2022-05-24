<h1 class="text-center">Создай аккаунт</h1>

<form name="registration">
    <div class="form-conroll">
        <input type="text" name="name" required placeholder="Введите имя" pattern="^[А-Яа-я./$-]+$" title="разрешенные символы: кириллица, пробел и тире">
    </div>

    <div class="form-conroll">
        <input type="text" required name="surname" placeholder="Введите фамилию" pattern="^[А-Яа-я./$-]+$" title="разрешенные символы: кириллица, пробел и тире">
    </div>

    <div class="form-conroll">
        <input type="text" name="patronymic" placeholder="Введите отчество" pattern="^[А-Яа-я./$-]+$" title="разрешенные символы: кириллица, пробел и тире">
    </div>

    <div class="form-conroll">
        <input type="email" name="email" required placeholder="Введите email">
    </div>

    <div class="form-conroll">
        <input type="text" required name="login" placeholder="Введите логин" pattern="^[A-Za-z0-9-]+$" title="разрешенные символы: латиница, цифры и тире">
    </div>

    <div class="form-conroll">
        <input type="password" name="password" required placeholder="Введите пароль" pattern=".{6,}" title="не менее 6 символов">
    </div>

    <div class="form-conroll">
        <input type="password" name="password_repeat" required placeholder="Повторите пароль" pattern=".{6,}" title="не менее 6 символов">
    </div>

    <div class="form-conroll">
        <label for="rules">
            <input type="checkbox" name="rules" id="rules" required> Согласие с правилами регистрации
        </label>
    </div>

    <div class="form-conroll">
        <button type="submit" class="btn">Регистрация</button>
    </div>

    <div class="form-conroll">
        <div class="answer"></div>
    </div>
</form>

<script src="/js/registration.js"></script>