<?= $this->extend('template') ?>

<?= $this->section('content') ?>

<div class="dashboard-container">
    <h2 class="text-center mb-5 heading">Manage Orders</h2>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Item ID</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Table No</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= $order['item_id'] ?></td>
                        <td><?= $order['user_id'] ?></td>
                        <td><?= $order['table_no'] ?></td>
                        <td><?= $order['quantity'] ?></td>
                        <td><button onclick="toggleStatus(this)">Pending</button></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function toggleStatus(button) {
  if (button.innerHTML === "Pending") {
    button.innerHTML = "Completed";
  } else {
    button.innerHTML = "Pending";
  }
}
</script>

<?= $this->endSection() ?>
