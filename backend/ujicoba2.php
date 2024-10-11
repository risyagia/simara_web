<?php
$mysqli = new mysqli("localhost", "root", "", "projek_kua");

$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

$sql = "SELECT * FROM tempat_ibadah";
if ($filter) {
    $sql .= " WHERE jenis = '$filter'";
}

$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempat Ibadah</title>
</head>
<body>
    <div>
        <button onclick="filterData('')">Semua</button>
        <button onclick="filterData('Masjid')">Masjid</button>
        <button onclick="filterData('Gereja')">Gereja</button>
        <button onclick="filterData('Klenteng')">Klenteng</button>
        <button onclick="filterData('Vihara')">Vihara</button>
    </div>

    <div id="tempat-ibadah">
        <?php while($row = $result->fetch_assoc()): ?>
        <div class="tempat-ibadah-box">
            <img src="<?php echo $row['foto']; ?>" alt="<?php echo $row['nama']; ?>" width="100" height="100">
            <h3><?php echo $row['nama']; ?></h3>
            <p><?php echo $row['alamat']; ?></p>
            <p><?php echo $row['jenis']; ?></p>
        </div>
        <?php endwhile; ?>
    </div>

    <script>
    function filterData(jenis) {
        window.location.href = '/frontend/tempat_ibadah.php?filter=' + encodeURIComponent(jenis);
    }
</script>

</body>
</html>

<?php $mysqli->close(); ?>
