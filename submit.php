<?php
include 'db.php';

$result = $conn->query("SELECT * FROM anggaran");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Data</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Daftar Data</h2>
        <a href="input.php">Tambah Data</a>
        <table>
            <tr>
                <th>Uraian</th>
                <th>Pagu</th>
                <th>Nilai Target</th>
                <th>Nilai Realisasi</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['uraian']); ?></td>
                <td><?php echo htmlspecialchars($row['pagu']); ?></td>
                <td><?php echo htmlspecialchars($row['nilai_target']); ?></td>
                <td><?php echo htmlspecialchars($row['nilai_realisasi']); ?></td>
                <td>
                    <a href="form.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
