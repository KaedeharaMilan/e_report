<?php
session_start(); // -> Harus ditambahkan ketika menggunakan session

if(!isset($_SESSION['login'])) {
    header('location: auth/login.php');
    exit;
}

require('connect.php');

// if (!$conn) {
//      echo "Koneksi gagal";
// } else {
//      echo "Koneksi berhasil";
// }

$query = mysqli_query($conn, 'SELECT * FROM e_report');

$i = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- Bricolage Grotesque Fonts Links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&display=swap" rel="stylesheet">
    <!-- Great Vibes Fonts Links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Great+Vibes&display=swap" rel="stylesheet">
    <title>Pengaduan Masyarakat</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: serif;
        }

        body{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .header {
                display: flex;
                flex-direction: row;
                margin-top: 3rem;
        }

        .headerbar{
        width: max-content;
        height: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        gap: 3rem;
        }

        .logo {
    display: flex;
    flex-direction: row;
    
}

.elogo {
    font-family: "Great Vibes";
    font-weight: 200;

    width: 4vh;
    color: #333333;
}

.reportlogo {
    font-family: "Bricolage Grotesque";
    font-weight: 700;
    font-style: italic;

    width: max-content;
    color: #333333;
}

.navmenu {
    display: flex;
    flex-direction: row;
}
.navmenu a {
    margin-left: 3rem;
    color: #333333;
    text-decoration: none;
    font-family: "Bricolage Grotesque";
    font-style: italic;
}

.logoutfill {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    gap: 2rem;
    margin-left: 3rem
}

.create {
    display: flex;
    width: 7rem;
    height: 3rem;
    text-align: center;
    justify-content: center;
    align-items: center;
    background-color: #131313;
    color: #f1f1f1;
    font-family: "Bricolage Grotesque";
    text-decoration: none;
    border: 0rem;
    border-radius: 20rem;
}

.formout button {
    display: flex;
    width: 7rem;
    height: 3rem;
    text-align: center;
    justify-content: center;
    align-items: center;
    background-color: #131313;
    color: #f1f1f1;
    font-family: "Bricolage Grotesque";
    text-decoration: none;
    border: 0rem;
    border-radius: 20rem;
}

        table{
            padding: 30px 30px;
            border: 2px solid black;
            border-radius: 30px;
            margin-top: 5vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        thead{
            padding: 0 0 15px 0;
            margin-bottom: 20px;
            border-bottom: 2px solid black;
        }

        thead tr{
            gap: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        thead tr th{
            border: none;
            width: 15vw;
            /* background-color: gold; */
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        tbody tr{
            gap: 10px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        tbody tr td{
            border: none;
            width: 15vw;
            /* background-color: gold; */
            margin-bottom: 20px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        tbody tr td a{
            width: 30%;
            padding: 5px 0;
            margin-right: 10px;
            border: 2px solid black;
            border-radius: 30px;
            font-size: 1rem;
            text-decoration: none;
            text-align: center;
            color: black;
            background-color: transparent;
            transition: all 0.3s ease-in-out;
        }

        tbody tr td a:hover, tbody tr td a:focus{
            color: white;
            background-color: black;
            box-shadow: 0px 0px 10px 1px black;
        }
    </style>
</head>
<body>
    <header>
        <div class="headerbar">
            <div class="logo">
                <h1 class="elogo">E</h1>
                <h1 class="reportlogo">- Report</h1>
            </div>
            
            <div class="navmenu">
                <a href="#">Dashboard</a>
                <a href="#">Info</a>
                <a href="#">Feedback</a>
                <a href="#">Contact</a>
            </div>

            <div class="logoutfill">
            <a class="create" href="create.php">Report</a>
            <form action="auth/logout.php" method="post" class="formout">
                <button type="submit">Log Out</button>
            </form>

            </div>
        </div>        
    </header>
    <main>
        
        <table border="1" cellpadding="3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Lengkap</th>
                    <th>Pesan</th>
                    <th>Kode Pos</th>
                    <th>Action</th>
                </tr>
            </thead>
            
            <tbody>
                <?php while ($baris = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $baris['nama_lengkap']; ?></td>
                        <td><?php echo $baris['pesan']; ?></td>
                        <td><?php echo $baris['kode_pos']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $baris['id']; ?>">EDIT</a>
                            <!-- Menggunakan POST agar ID yang dikirim tidak terlihat -->
                            <form action="delete.php" method="post">
                                <!-- Input tidak telihat dan tidak bisa diubah, hanya untuk mengirim ID -->
                                <input readonly type="hidden" name="id" value="<?= $baris['id']; ?>">
                                <button style="font-size: 1rem; background-color: transparent; border: none; cursor:pointer" type="submit" name="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>
    </main>
</body>
</html>