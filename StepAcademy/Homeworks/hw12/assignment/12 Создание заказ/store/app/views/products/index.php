<div>
    <h2><?=$title?></h2>
    <?php foreach($items as $item): ?>
        <div>
            <h3><?=$item['product_name']?></h3>
            <p><?=$item['price']?></p>
            <a href="/products/<?=$item["product_id"]?>/">Узнать больше »</a>
        </div>
    <?php endforeach; ?>
</div>