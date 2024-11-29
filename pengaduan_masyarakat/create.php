<?php
session_start(); // -> Harus ditambahkan ketika menggunakan session

if(!isset($_SESSION['login'])) {
    header('location: auth/login.php');
    exit;
}
    include('connect.php');
    
    if(isset($_GET['submit'])) {
        $id = '';
        $nama = $_GET['nama'];
        $pesan = $_GET['pesan'];
        $pos = $_GET['pos'];

    $query = mysqli_query($conn, "INSERT INTO e_report(id, nama_lengkap, pesan, kode_pos) VALUES ('$id', '$nama', '$pesan', '$pos')");

        if($query) {
            header('location: index.php');
        };
    };

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PENGADUAN MASYARAKAT</title>

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

.back {
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

        form{
            margin-top: 3%;
            border: 2px solid black;
            border-radius: 30px;
            padding: 30px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        form .lable{
            width: max-content;
            gap: 5px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        .container{
            gap: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .container input{
            font-size: 1rem;
            padding: 5px 10px;
        }

        .container input:focus{
            box-shadow: 0px 0px 10px 1px #80C4E9;
        }

        .pesan{
            width: max-content;
            gap: 5px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .pesan input{
            width: 29vw;
            height: 20vh;
            font-size: 1rem;
            padding: 10px;
            transition: all 0.3s ease-in-out;
        }

        .pesan input:focus{
            box-shadow: 0px 0px 10px 1px #80C4E9;
        }

        button{
            width: 20vw;
            padding: 10px 0;
            font-size: 1rem;
            font-weight: 600;
            border: 2px solid black;
            border-radius: 30px;
            background-color: transparent;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        button:hover,button:focus{
            color: white;
            background-color: black;
            box-shadow: 0px 0px 10px 1px black;
        }
    </style>

</head>
<body>

   

    <form action="create.php" method="get">
        <div class="container">
            <div class="lable">
                <label for="">Nama Lengkap:</label>
                <input type="text" name="nama" id="nama">
            </div>
            <div class="lable">
                <label for="">Kode Pos:</label>
                <input type="number" name="pos" id="pos">
            </div>
        </div>

        <div class="pesan">
            <label for="">Pesan:</label>
            <input type="teks" name="pesan" id="pesan">
        </div>

        <button type="submit" name="submit">Kirim</button>
    </form>

</body>
</html>