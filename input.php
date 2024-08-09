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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="styles.css">
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
</head>
<body>
    <h1>INPUT DATA</h1>
    
    <form action="hasil.php" method="post">
        <input type="hidden" name="id" value="<?= isset($edit) ? $edit['id'] : '' ?>">
        <label for="uraian">Uraian:</label>
        <input type="text" id="uraian" name="uraian" value="<?= isset($edit) ? $edit['uraian'] : '' ?>" required>
        <label for="pagu">Pagu:</label>
        <input type="number" id="pagu" name="pagu" step="0.01" value="<?= isset($edit) ? $edit['pagu'] : '' ?>" required>
        <label for="nilai_target">Nilai Target:</label>
        <input type="number" id="nilai_target" name="nilai_target" step="0.01" value="<?= isset($edit) ? $edit['nilai_target'] : '' ?>" required>
        <label for="nilai_realisasi">Nilai Realisasi:</label>
        <input type="number" id="nilai_realisasi" name="nilai_realisasi" step="0.01" value="<?= isset($edit) ? $edit['nilai_realisasi'] : '' ?>" required>
        <input type="submit" name="<?= isset($edit) ? 'update' : 'submit' ?>" value="<?= isset($edit) ? 'Update' : 'Add' ?>">
    </form>
    
   