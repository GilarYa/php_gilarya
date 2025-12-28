<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 2 - Data Person</title>
    <link rel="stylesheet" href="soal2.css">
</head>
<body>

<?php
include 'koneksi.php';

$sql = "SELECT id, nama, alamat FROM person ORDER BY id ASC";
$result = $conn->query($sql);
?>

<div class="container">
    <div class="links">
        <a href="soal2.php">Kembali ke Laporan Hobi</a>
    </div>
    
    <table>
        <tr>
            <th>id</th>
            <th>nama</th>
            <th>alamat</th>
        </tr>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['alamat']) ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">Tidak ada data</td>
            </tr>
        <?php endif; ?>
    </table>
</div>

<?php
$conn->close();
?>

</body>
