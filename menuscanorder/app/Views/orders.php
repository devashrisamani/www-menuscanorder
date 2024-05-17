<?= $this->extend('template') ?>
<?= $this->section('content') ?>
<div class="dashboard-container">
    <h2 class="text-center mb-5 heading">Manage Orders</h2>
    <div class="form-group">
        <label for="tableSelect">Select Table:</label>
        <select class="form-control" id="tableSelect">
            <?php foreach ($tables as $table): ?>
                <option value="<?= $table['table_no'] ?>"><?= $table['table_no'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Item</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody id="orderTableBody">
                <!-- Table rows will be dynamically populated here -->
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>

<script>
    $(document).ready(function() {
        $('#tableSelect').on('change', function() {
            var selectedTable = $(this).val();
            fetchOrders(selectedTable);
        });

        function fetchOrders(tableNo) {
            $.ajax({
                url: '<?= site_url('getOrders') ?>',
                method: 'GET',
                data: {
                    user_id: <?= $userId ?>,
                    table_no: tableNo
                },
                success: function(response) {
                    var orders = JSON.parse(response);
                    var tableBody = $('#orderTableBody');
                    tableBody.empty();

                    orders.forEach(function(order) {
                        var row = `
                            <tr>
                                <td>${order.name}</td>
                                <td>$${order.price}</td>
                                <td>${order.quantity}</td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });
                },
                error: function(xhr, status, error) {
                    console.log('Error fetching orders:', error);
                }
            });
        }

        // Fetch orders for the first table by default
        var firstTable = $('#tableSelect').val();
        fetchOrders(firstTable);
    });
</script>