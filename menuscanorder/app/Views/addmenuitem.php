<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h2 class="mb-3">Add New Menu Item</h2>
    <form action="<?= site_url('/menu/addmenuitem'); ?>" method="post">
        <!-- Input for Item Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Item Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <!-- Input for Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>

        <!-- Input for Price -->
        <div class="mb-3">
            <label for="price" class="form-label">Price ($)</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>

        <!-- Submission Button -->
        <button type="submit" class="btn btn-primary">Add Item</button>
    </form>
</div>

<?= $this->endSection() ?>

<!-- Referenced Generative AI to develop this page. Chat GPT and Pop AI. -->