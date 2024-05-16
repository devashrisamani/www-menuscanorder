<?php
$addmenuitem = new App\Models\MenuItemModel();
$userId = session()->get('user_id');
$menuItems = $addmenuitem->where('user_id', $userId)->findAll();
$tableNumber = session()->get('table_number');

?>

<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="dashboard-container">
    <h2 class="text-center mb-4 heading">Table <?= $tableNumber ?> - Menu</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
    <?php endif; ?>

    <?php if (!empty($menuItems)): ?>
        <?php foreach ($menuItems as $item): ?>
            <div class="menu-item">
                <div>
                    <p><strong><?= esc($item['name']); ?></strong></p>
                    <p class="menu-item-description"><?= esc($item['description']); ?></p>
                    <p class="menu-item-price">Price: $<?= esc($item['price']); ?></p>
                </div>
                <div class="menu-actions">
                    <a href="<?= site_url('addtocart/' . $item['item_id'] . '/' . $tableNumber); ?>" class="icon-link">
                        <i class="bi bi-cart-plus"></i> Add to Cart
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="menu-item">
            <p>No menu items available.</p>
        </div>
    <?php endif; ?>

</div>

<?= $this->endSection() ?>
