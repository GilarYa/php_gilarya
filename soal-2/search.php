<?php
include 'koneksi.php';

$search = isset($_GET['q']) ? trim($_GET['q']) : '';

$sql = "SELECT hobi, COUNT(DISTINCT person_id) AS jumlah_person FROM hobi";

if (!empty($search)) {
    $search_safe = $conn->real_escape_string($search);
    $sql .= " WHERE hobi LIKE '%$search_safe%'";
}

$sql .= " GROUP BY hobi ORDER BY jumlah_person DESC, hobi ASC";

$result = $conn->query($sql);

$output = '';
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output .= '<tr>';
        $output .= '<td>' . htmlspecialchars($row['hobi']) . '</td>';
        $output .= '<td>' . $row['jumlah_person'] . '</td>';
        $output .= '</tr>';
    }
} else {
    $output .= '<tr><td colspan="2">Tidak ada data ditemukan</td></tr>';
}

echo $output;
$conn->close();
?>
