<h2>Корзина</h2>
<?php if (empty($items)): ?>
    <p>Корзина пуста</p>
<?php else: ?>
    <table>
        <tr>
            <th>Наименование</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Сумма</th>
            <th>Действия</th>
        </tr>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?=$item["product_name"]?></td>
                <td><?=$item["price"]?></td>
                <td><?=$item["quantity"]?></td>
                <td><?=$item["total"]?></td>
                <td>
                    <a href="/cart/remove/<?=$item["product_id"]?>/">Удалить</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <hr>
    <h3>Итого: <?=$total?></h3>
    <a href="/checkout/">Оформить заказ</a>
<?php endif; ?>