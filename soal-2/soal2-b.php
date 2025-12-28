<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 2 - Data Hobi</title>
    <link rel="stylesheet" href="soal2.css">
</head>
<body>

<?php
include 'koneksi.php';

$sql = "SELECT id, person_id, hobi FROM hobi ORDER BY id ASC";
$result = $conn->query($sql);
?>

<div class="container">
    <div class="links">
        <a href="soal2.php">Kembali ke Laporan Hobi</a>
    </div>
    
    <table>
        <tr>
            <th>id</th>
            <th>person_id</th>
            <th>hobi</th>
        </tr>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['person_id'] ?></td>
                    <td><?= htmlspecialchars($row['hobi']) ?></td>
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
