<?php 
    $tableId = isset($tableId) ? $tableId : session()->get('table_id');
    $tableNumber = $_GET['table'] ?? null;
    $userId = session()->get('user_id');
    
    // Load the MenuItemModel
    $menuItemModel = new \App\Models\MenuItemModel();
    
    // Retrieve the menu items for the corresponding user_id
    $menuItems = $menuItemModel->where('user_id', $userId)->findAll();
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
                    <h3><?= esc($item['name']); ?></h3>
                    <p class="menu-item-description"><?= esc($item['description']); ?></p>
                    <p class="menu-item-price">$<?= esc($item['price']); ?></p>
                    <input type="number" class="quantity" min="1" value="1">
                </div>
                <div class="menu-actions">
                    <button class="add-to-cart" data-item-id="<?= esc($item['item_id']); ?>" data-table-id="<?= esc($tableId); ?>">
                        <i class="bi bi-cart-plus"></i> Add to Cart
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="menu-item">
            <p>No menu items available.</p>
        </div>
    <?php endif; ?>
</div>

<!-- Include the jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.add-to-cart').click(function() {
            var itemId = $(this).data('item-id');
            var tableId = $(this).data('table-id');
            var quantity = $(this).siblings('.quantity').val();

            // Make an AJAX request to add the item to the cart
            $.ajax({
                url: '<?= site_url('menu/addcart') ?>',
                method: 'POST',
                data: {
                    item_id: itemId,
                    table_id: tableId,
                    quantity: quantity
                },
                success: function(response) {
                    alert('Item added to cart successfully!');
                },
                error: function(xhr, status, error) {
                    alert('Error adding item to cart. Please try again.');
                    console.log('Error:', error);
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>

<!-- Referenced Generative AI to develop this page. Chat GPT and Pop AI. -->