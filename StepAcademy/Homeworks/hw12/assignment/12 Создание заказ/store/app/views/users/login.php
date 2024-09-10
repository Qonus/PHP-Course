<form method="post" action="" name="login">
    <input name="email" type="email" placeholder="Почта"><br>
    <input name="password" type="password" placeholder="Пароль"><br>
    <?php if (isset($error)): ?>
        <p style="color: red"><?=$error?></p>
    <?php endif; ?>
    <button type="submit">Войти</button>
</form>