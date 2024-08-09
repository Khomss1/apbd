<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Pemerintahan</title>
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
        /* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body */
body {
    font-family: 'Roboto', sans-serif;
    background-color: #f8f9fa;
    color: #343a40;
    line-height: 1.6;
}

/* Container */
.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
}

/* Header */
header {
    background-color: #004085;
    color: white;
    padding: 20px 0;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

header h1 {
    text-align: center;
    font-size: 2.5rem;
}

nav ul {
    list-style-type: none;
    text-align: center;
    margin-top: 10px;
}

nav ul li {
    display: inline;
    margin: 0 20px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

nav ul li a:hover {
    color: #ffc107;
}

/* Main Content */
main {
    margin: 40px 0;
}

h2 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 2rem;
    color: #004085;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* News List */
.news-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

.news-item {
    background-color: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.news-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
}

.news-item h3 {
    background-color: #004085;
    color: white;
    padding: 15px;
    font-size: 1.5rem;
}

.news-item p {
    padding: 20px;
    font-size: 1rem;
    line-height: 1.8;
    color: #6c757d;
}

.read-more {
    display: block;
    text-align: center;
    padding: 15px;
    background-color: #ffc107;
    color: #004085;
    text-transform: uppercase;
    font-weight: bold;
    text-decoration: none;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.read-more:hover {
    background-color: #e0a800;
    color: white;
}

/* Footer */
footer {
    background-color: #343a40;
    color: white;
    text-align: center;
    padding: 20px 0;
    margin-top: 40px;
}

footer p {
    margin: 0;
    font-size: 0.9rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    header h1 {
        font-size: 2rem;
    }

    nav ul li {
        margin: 0 10px;
    }

    h2 {
        font-size: 1.75rem;
    }

    .news-item h3 {
        font-size: 1.25rem;
    }

    .news-item p {
        font-size: 0.95rem;
    }

    .read-more {
        padding: 10px;
    }
}


    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Website Input Pemerintahan </h1>
            <nav>
                <ul>
                    
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>Fitur Website</h2>
            <div class="news-list" style="text-align: center;">
                <?php
                // Array daftar
                $daftar = [
                    [
                        "judul" => "Daftar User Baru ",
                        "konten" => "Ini Untuk Daftar user login baru.",
                        "tanggal" => "2024-08-01"
                    ],
                     ];

                foreach ($daftar as $item) {
                    echo "<div class='news-item'>";
                    echo "<h3>{$item['judul']}</h3>";
                    echo "<p>" . substr($item['konten'], 0, 200) . "...</p>";
                    echo "<a href='register.php' class='read-more'>Daftar Disini</a>";
                    echo "</div>";
                }
                ?>
                <?php
                // Array daftar
                $input = [

                    [
                        "judul" => "Input",
                        "konten" => "Untuk Input Data APBD.",
                        "tanggal" => "2024-07-25"
                    ],

                    ];

                foreach ($input as $item) {
                    echo "<div class='news-item'>";
                    echo "<h3>{$item['judul']}</h3>";
                    echo "<p>" . substr($item['konten'], 0, 200) . "...</p>";
                    echo "<a href='input.php' class='read-more'>Daftar Disini</a>";
                    echo "</div>";
                }
                ?>
                <?php
                // Array daftar
                $laporan = [

                    [
                        "judul" => "Laporan",
                        "konten" => "Laporan Hasil Inputan APBD.",
                        "tanggal" => "2024-07-15"
                    ],
                ];

                foreach ($laporan as $item) {
                    echo "<div class='news-item'>";
                    echo "<h3>{$item['judul']}</h3>";
                    echo "<p>" . substr($item['konten'], 0, 200) . "...</p>";
                    echo "<a href='hasil.php' class='read-more'>Daftar Disini</a>";
                    echo "</div>";
                }
                ?>
            </div>
            
        </div>
    </main>
    <br><br><br><br><br><br>
    <footer>
        <div class="container">
            <p>&copy; 2024 Website Pemerintahan. Semua hak dilindungi.</p>
        </div>
    </footer>
</body>
</html>
