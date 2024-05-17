<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h2 class="mb-3">Edit Menu Item</h2>
    <form action="<?= site_url('editmenuitem/'. $user['item_id']); ?>" method="POST">
    <!-- Hidden field for item_id -->
    <input type="hidden" name="item_id" value="<?= $user['item_id']; ?>">

    <!-- Input for Item Name, pre-filled if editing -->
    <div class="mb-3">
        <label for="name" class="form-label">Item Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?? ''; ?>" required>
    </div>

    <!-- Input for Description, pre-filled if editing -->
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="<?= $user['description'] ?? ''; ?>">
    </div>

    <!-- Input for Price, pre-filled if editing -->
    <div class="mb-3">
        <label for="price" class="form-label">Price ($)</label>
        <input type="number" class="form-control" id="price" name="price" value="<?= $user['price'] ?? ''; ?>" step="0.01" required>
    </div>

    <!-- Submission Button -->
    <button type="submit" class="btn btn-primary">Edit Item</button>
    </form>
    </div>

<?= $this->endSection() ?>

<!-- Referenced Generative AI to develop this page. Chat GPT and Pop AI. -->
