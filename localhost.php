<?php
include 'koneksi.php';

// Query data mahasiswa dari database
$sql = "SELECT * FROM datamahasiswa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #1e1e2f, #28294a);
            color: #f8f8f2;
        }
        h1 {
            text-align: center;
            margin: 20px 0;
            font-weight: 600;
            color: #ff79c6;
            text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.5);
        }
        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background: black;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid black;
            color: #f8f8f2;
        }
        th {
            background-color: #640D5F;
            font-weight: bold;
            letter-spacing: 1px;
        }
        tr:nth-child(even) { background-color: #414558; }
        tr:hover {
            background-color: #bd93f9;
            color: #28294a;
            transition: all 0.3s ease;
        }
        img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            object-fit: cover;
            border: 2px solid #76ABAE;
        }
        .edit-btn { background-color: #50fa7b; color: #282a36; }
        .edit-btn:hover { background-color: #45e67f; }
        .delete-btn { background-color: #ff5555; color: #f8f8f2; }
        .delete-btn:hover { background-color: #ff4444; }
    </style>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>NIM</th>
            <th>Program Studi</th>
            <th>Email</th>
            <th>Gambar</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $no = 1; 
            while ($row = $result->fetch_assoc()) {
                $imagePath = "gambar/" . $row['gambar'];
                if (!file_exists($imagePath) || empty($row['gambar'])) {
                    $imagePath = "gambar/default.jpg";
                }
                echo "
                <tr>
                    <td>$no</td>
                    <td>" . htmlspecialchars($row['namaMahasiswa']) . "</td>
                    <td>" . htmlspecialchars($row['npm']) . "</td>
                    <td>" . htmlspecialchars($row['prodi']) . "</td>
                    <td>" . htmlspecialchars($row['email']) . "</td>
                    <td><img src='$imagePath' alt='gambar'></td>
                </tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='7'>Tidak ada data.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>
