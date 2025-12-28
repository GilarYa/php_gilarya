<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 2</title>
    <link rel="stylesheet" href="soal2.css">
</head>
<body>

<?php
include 'koneksi.php';

$search = isset($_GET['search']) ? trim($_GET['search']) : '';

$sql = "SELECT hobi, COUNT(DISTINCT person_id) AS jumlah_person 
        FROM hobi";

if (!empty($search)) {
    $search_safe = $conn->real_escape_string($search);
    $sql .= " WHERE hobi LIKE '%$search_safe%'";
}

$sql .= " GROUP BY hobi 
          ORDER BY jumlah_person DESC, hobi ASC";

$result = $conn->query($sql);
?>

<div class="container">
    <div class="search-form">
        <form method="GET" action="">
            <label>Search by hobi:</label>
            <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Masukkan hobi...">
            <input type="submit" value="Cari">
            <?php if (!empty($search)): ?>
                <a href="soal2.php">Reset</a>
            <?php endif; ?>
        </form>
    </div>
    
    <div class="links">
        <a href="soal2-a.php">Lihat Data Person</a> | 
        <a href="soal2-b.php">Lihat Data Hobi</a>
    </div>
    
    <table>
        <tr>
            <th>hobi</th>
            <th>jumlah person</th>
        </tr>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['hobi']) ?></td>
                    <td><?= $row['jumlah_person'] ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="2">Tidak ada data ditemukan</td>
            </tr>
        <?php endif; ?>
    </table>
</div>

<?php
$conn->close();
?>

</body>
