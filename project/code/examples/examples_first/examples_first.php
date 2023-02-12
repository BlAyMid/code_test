<!DOCTYPE html>
<main id="main">
    <section id="main-login" style="display: <?= $main_login ?>">
        <section id="main-login-logo" class="flex">
            <img src="/img/full.svg" alt="full logo" class="full-logo">
        </section>
        <section id="main-login-input">
            <section id="main-login-input-first">
                <p class="font">Логин</p>
                <input type="text">
            </section>
            <section id="main-login-input-second">
                <p class="font">Пароль</p>
                <input type="password">
            </section>
        </section>
        <section id="main-login-lost">
            <button class="font" onclick="lost_password()">Забыли пароль</button>
        </section>
        <section id="main-login-button" class="flex-between">
            <button type="submit" id="" class="btn font">Войти</button>
            <button id="" class="btn font" onclick="unhide_registration()">Регистрация</button>
        </section>
    </section>

    <section id="main-registration" class="screen" style="display: <?= $main_registration ?>">
        <section id="main-registration-header" class="flex-between">
            <p onclick="hide_registration()" class="header-pointer">Назад</p>
            <img src="/img/mini.svg" alt="mini logo" class="mini-logo">
        </section>
        <section id="main-registration-back" class="flex-between" style="display: <?= $main_registration_back ?>">
            <p onclick="back_to_registration()" class="header-pointer">Назад</p>
            <img src="/img/mini.svg" alt="mini logo" class="mini-logo">
        </section>
        <section id="main-registration-name" class="flex">
            <p>Регистрация</p>
        </section>
        <form action="/index.php" method="post">
            <section id="main-registration-data">
                <section id="main-registration-data-login" class="flex-between">
                    <section id="main-registration-data-login-name">
                        <p>Логин</p>
                        <input type="text" name="login" required>
                    </section>
                    <section id="main-registration-data-login-email">
                        <p>Почта</p>
                        <input type="email" name="email" required>
                    </section>
                </section>
                <section id="main-registration-data-password" class="flex-between">
                    <section id="main-registration-data-password-firs">
                        <p>Пароль</p>
                        <input type="password" name="password" required>
                    </section>
                    <section id="main-registration-data-password-second">
                        <p>Повторение пароля</p>
                        <input type="password" name="password_2" required>
                    </section>
                </section>
                <section class="flex">
                    <button class="btn-mini" type="submit" name="do_login">Далее</button>
                </section>
            </section>
        </form>
        <section id="main-registration-mail" style="display: <?= $main_registration_mail ?>">
            <section id="main-registration-mail-name" class="flex">
                <section>
                    <p>Код с почты*</p>
                    <input type="text">
                </section>
            </section>
            <section id="main-registration-mail-btn" class="flex">
                <button class="btn-mini">Готово</button>
            </section>
        </section>
    </section>

    <section id="main-password" class="screen" style="display: <?= $main_password ?>">
        <section id="main-password-header" class="flex-between">
            <p onclick="hide_registration()" class="header-pointer">Назад</p>
            <img src="/img/mini.svg" alt="mini logo" class="mini-logo">
        </section>
        <section id="main-password-back" class="flex-between" style="display: <?= $main_password_back ?>">
            <p onclick="back_to_lost_password()" class="header-pointer">Назад</p>
            <img src="/img/mini.svg" alt="mini logo" class="mini-logo">
        </section>
        <section id="main-password-name" class="flex">
            <p>Забыл пароль</p>
        </section>
        <section id="main-password-data">
            <section id="main-password-data-login">
                <p>Логин или почта</p>
                <input type="text">
            </section>
            <section id="main-password-data-btn">
                <button>Отправить код</button>
            </section>
            <section id="main-password-data-code">
                <input type="text">
            </section>
            <section id="main-password-data-next" class="flex">
                <button onclick="new_password()">Далее</button>
            </section>
        </section>
        <section id="main-password-new" style="display: <?= $main_password_new ?>">
            <section id="main-password-new-first">
                <p>Пароль</p>
                <input type="password">
            </section>
            <section id="main-password-new-second">
                <p>Повторение пароля</p>
                <input type="password">
            </section>
            <section id="main-password-new-btn" class="flex">
                <button>Готов</button>
            </section>
        </section>
    </section>
</main>