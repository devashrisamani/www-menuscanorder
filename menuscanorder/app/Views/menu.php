<?php
$addmenuitem = new App\Models\MenuItemModel();
$userId = session()->get('user_id');
$menuItems = $addmenuitem->where('user_id', $userId)->findAll();
$restaurantName = session()->get('restaurant_name');

?>


<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="dashboard-container">
    <h2 class="text-center mb-4 heading"><?= $restaurantName ?> Restaurant Menu</h2>

    
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
    <?php endif; ?>

    <div class="d-flex justify-content-end">
    <a href="<?= site_url('addmenuitem'); ?>" class="btn btn-success btn-sm btn-cat ms-2">Add Menu Item</a>
    </div>

    <?php if (!empty($menuItems)): ?>
        <?php foreach ($menuItems as $item): ?>
            <!-- <div class="menu-item py-2"> -->
            <div class="menu-item">
            <div>
                <p><strong><?= esc($item['name']); ?></strong></p>
                <p class="menu-item-description"><?= esc($item['description']); ?></p>
                <p class="menu-item-price">Price: $<?= esc($item['price']); ?></p>
            </div>
            <div class="menu-actions">
                <a href="<?= site_url('editmenuitem/' . $item['item_id']); ?>" class="icon-link">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <form action="<?= site_url('deletemenuitem/' . $item['item_id']); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                    <button type="submit" class="icon-button bi bi-trash-fill"></button>
                </form>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="menu-item">
            <p>No menu items yet.</p>
        </div>
    <?php endif; ?>

</div>

<?= $this->endSection() ?>
