<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 1</title>
    <link rel="stylesheet" href="soal1.css">
</head>
<body>

<?php
$step = 1;
if (isset($_POST['submit_step2'])) {
    $step = 3;
} elseif (isset($_POST['submit_step1'])) {
    $step = 2;
}

if ($step == 1) {
?>
    <div class="container">
        <form method="POST" action="">
            <div class="form-row">
                <label>Inputkan Jumlah Baris:</label>
                <input type="number" name="jumlah_baris" min="1" required>
                <span class="contoh">Contoh : 1</span>
            </div>
            <div class="form-row">
                <label>Inputkan Jumlah Kolom:</label>
                <input type="number" name="jumlah_kolom" min="1" required>
                <span class="contoh">Contoh : 3</span>
            </div>
            <div class="form-row">
                <input type="submit" name="submit_step1" value="SUBMIT">
            </div>
        </form>
    </div>
    <div><a href="../index.php">Kembali ke Menu</a></div>
<?php
} elseif ($step == 2) {
    $baris = (int)$_POST['jumlah_baris'];
    $kolom = (int)$_POST['jumlah_kolom'];
?>
    <div class="container">
        <form method="POST" action="">
            <input type="hidden" name="jumlah_baris" value="<?= $baris ?>">
            <input type="hidden" name="jumlah_kolom" value="<?= $kolom ?>">
            
            <?php for ($i = 1; $i <= $baris; $i++): ?>
                <div class="form-row">
                    <?php for ($j = 1; $j <= $kolom; $j++): ?>
                        <div class="input-group">
                            <strong><?= $i ?>.<?= $j ?>:</strong>
                            <input type="text" name="data[<?= $i ?>][<?= $j ?>]" required>
                        </div>
                    <?php endfor; ?>
                </div>
            <?php endfor; ?>
            
            <div class="form-row">
                <input type="submit" name="submit_step2" value="SUBMIT">
            </div>
        </form>
    </div>
<?php
} elseif ($step == 3) {
    $baris = (int)$_POST['jumlah_baris'];
    $kolom = (int)$_POST['jumlah_kolom'];
    $data = $_POST['data'];
?>
    <div class="container">
        <?php for ($i = 1; $i <= $baris; $i++): ?>
            <?php for ($j = 1; $j <= $kolom; $j++): ?>
                <div class="result-item">
                    <strong><?= $i ?>.<?= $j ?> : <?= htmlspecialchars($data[$i][$j]) ?></strong>
                </div>
            <?php endfor; ?>
        <?php endfor; ?>
    </div>
<div><a href="soal1.php">kembali</a></div>
<?php
}
?>

</body>
