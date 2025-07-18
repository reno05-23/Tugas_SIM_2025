<?php
include_once "config/fungsi.php";
include_once "config/koneksi.php";
$total = "SELECT sum(total) as jumlah FROM transaksi";
$q = mysqli_query($koneksi, $total);
$data = mysqli_fetch_array($q);

$total_order = "SELECT COUNT(*) as jumlah_order FROM transaksi";
$q_order = mysqli_query($koneksi, $total_order);
$data_order = mysqli_fetch_array($q_order);

$order_per_hari = [];
$labels = [];
for ($i = 6; $i >= 0; $i--) {
    $hari = date('Y-m-d', strtotime("-$i days"));
    $query = "SELECT COUNT(*) as total FROM transaksi WHERE DATE(create_at) = '$hari'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    $order_per_hari[] = (int)$row['total'];
    $labels[] = date('d M', strtotime($hari));
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
        
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="plugins/chart.js/Chart.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
</head>

<body>
    <ul class="box-info">
        <li>
            <i class='bx bxs-calendar-check'></i>
            <span class="text">
                <h3><?= $data_order['jumlah_order']?></h3>
                <p>Order</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-group'></i>
            <span class="text">
                <h3>2</h3>
                <p>Karyawan</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-dollar-circle'></i>
            <span class="text">
                <h3><?=rupiah($data['jumlah'])?></h3>
                <p>Penghasilan</p>
            </span>
        </li>
    </ul>




           
        </div>
        <div class="card-body">
            <div class="chart">
                <canvas id="barChart"
                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    <script>
    const labels = <?= json_encode($labels) ?>;
const data = <?= json_encode($order_per_hari) ?>;

const ctx = document.getElementById('barChart').getContext('2d');
const barChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Order per Hari',
            data: data,
            backgroundColor: 'rgba(54, 162, 235, 0.7)'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: { y: { beginAtZero: true } }
    }
});
    </script>
</body>

</html>