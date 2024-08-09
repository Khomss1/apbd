<!DOCTYPE html>
<html>
<style type="text/css">
	body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(to right, #f7f7f7, #e0e0e0);
    color: #333;
}

h1 {
    text-align: center;
    margin: 40px 0;
    font-size: 2.5em;
    color: #333;
}

form {
    margin: 20px auto;
    padding: 30px;
    max-width: 600px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border: 1px solid #ddd;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
}

input[type="text"],
input[type="number"] {
    width: calc(100% - 16px);
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 1em;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #007BFF;
    color: #fff;
    border: none;
    padding: 12px 24px;
    cursor: pointer;
    border-radius: 6px;
    font-size: 1em;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px auto;
    max-width: 1200px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    overflow: hidden;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f4f4f4;
    font-weight: 600;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

a {
    color: #007BFF;
    text-decoration: none;
    font-weight: 600;
}

a:hover {
    text-decoration: underline;
}

</style>
<head>
	<title>LAPORAN</title>
</head>
<body>
	<br>
	<h2 style="text-align: center;">LAPORAN INPUT APBD</h3>
		<br>

</body>
</html>
<?php
include 'config.php';

// Insert data
if (isset($_POST['submit'])) {
    $uraian = $_POST['uraian'];
    $pagu = $_POST['pagu'];
    $nilai_target = $_POST['nilai_target'];
    $nilai_realisasi = $_POST['nilai_realisasi'];

    $sql = "INSERT INTO data (uraian, pagu, nilai_target, nilai_realisasi) VALUES (:uraian, :pagu, :nilai_target, :nilai_realisasi)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['uraian' => $uraian, 'pagu' => $pagu, 'nilai_target' => $nilai_target, 'nilai_realisasi' => $nilai_realisasi]);
}

// Delete data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM data WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
}

// Update data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $uraian = $_POST['uraian'];
    $pagu = $_POST['pagu'];
    $nilai_target = $_POST['nilai_target'];
    $nilai_realisasi = $_POST['nilai_realisasi'];

    $sql = "UPDATE data SET uraian = :uraian, pagu = :pagu, nilai_target = :nilai_target, nilai_realisasi = :nilai_realisasi WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'uraian' => $uraian, 'pagu' => $pagu, 'nilai_target' => $nilai_target, 'nilai_realisasi' => $nilai_realisasi]);
}

// Fetch data
$sql = "SELECT * FROM data";
$stmt = $pdo->query($sql);
$data = $stmt->fetchAll();
?>

<table>
        <thead>
            <tr>
                <th>Uraian</th>
                <th>Pagu</th>
                <th>Nilai Target</th>
                <th>%</th>
                <th>Nilai Realisasi</th>
                <th>%</th>
                <th>Capaian</th>
                <th>Deviasi</th>
                <th>warna</th>
                <th>Sisa Anggaran</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['uraian']) ?></td>
                <td><?= htmlspecialchars($row['pagu']) ?></td>
                <td><?= htmlspecialchars($row['nilai_target']) ?></td>
				<td><?= number_format(($row['nilai_target'] / $row['pagu']) * 100, 2) ?></td>


                <td><?= htmlspecialchars($row['nilai_realisasi']) ?></td>
                <td><?= number_format(($row['nilai_realisasi'] / $row['pagu']) * 100, 2) ?></td>
                <td>
                    <?= htmlspecialchars(
                    ($row['nilai_target'] / 5) / ($row['nilai_realisasi'] / 5) * 100, -5
                    ) ?>
                </td>
                <td>
                    <?php
$nilaiRealisasi = $row['nilai_realisasi'];
$nilaiTarget = $row['nilai_target'];
$pagu = $row['pagu'];

$persentaseRealisasi = ($nilaiRealisasi / $pagu) * 100;
$persentaseTarget = ($nilaiTarget / $pagu) * 100;

$selisihPersentase = $persentaseRealisasi - $persentaseTarget;

echo number_format($selisihPersentase, 2);
?>

                </td>
                <td>
                	<?php
$nilaiRealisasi = $row['nilai_realisasi'];
$nilaiTarget = $row['nilai_target'];
$pagu = $row['pagu'];

$persentaseRealisasi = ($nilaiRealisasi / $pagu) * 100;
$persentaseTarget = ($nilaiTarget / $pagu) * 100;

$selisihPersentase = $persentaseRealisasi - $persentaseTarget;

// Menentukan warna berdasarkan selisih persentase
if ($selisihPersentase > 20) {
    $warna = 'pink';
} elseif ($selisihPersentase > 10) {
    $warna = 'orange';
} elseif ($selisihPersentase >= 5) {
    $warna = 'yellow';
} else {
    $warna = 'green';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persentase Selisih</title>
    <style>
        .result {
            padding: 10px;
            color: #fff;
            font-weight: bold;
        }
        .pink { background-color: pink; color: #000; }
        .orange { background-color: orange; color: #000; }
        .yellow { background-color: yellow; color: #000; }
        .green { background-color: green; }
    </style>
</head>
<body>
    <div class="result <?php echo $warna; ?>">
        <!-- Hapus nilai persentase, hanya menampilkan warna -->
    </div>
</body>
</html>
                </td>
                <td>
                    <?= htmlspecialchars(
                       ($row['pagu']) - ($row['nilai_realisasi'])
                    ) ?> 
                </td>


                <td>
                    <a href="hasil.php?edit=<?= $row['id'] ?>">Edit  </a><a href=""> | </a>
                    <a href="hasil.php?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">  Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="input.php" style="text-align: center;" style="">INPUT DATA</a>
    <?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

