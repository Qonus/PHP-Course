<header>
    <nav>
        <ul style="display: flex; flex-direction: row; list-style: none; gap: 10px">
            <li><a href="/">Главная</a></li>
            <li><a href="/products/">Товары</a></li>
            <?php if (!isset($_SESSION["user"])): ?>
                <li><a href="/login/">Войти</a></li>
            <?php else: ?>
                <li><a href="/cart/">Корзина</a></li>
                <li><a href="/logout/">Выйти</a></li>
            <?php endif; ?>–
        </ul>
    </nav>
</header>
<hr>