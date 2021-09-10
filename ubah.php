<?php

$servername = "localhost";
$username  = "STIGER-R1";
$password  = "5678";
$database  = "phpdasar";

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function ubah($add)
{
    global $id;
    global $conn;
    $nrp = htmlspecialchars($add["nrp"]);
    $nama = htmlspecialchars($add["nama"]);
    $email = htmlspecialchars($add["email"]);
    $gambar = htmlspecialchars($add["gambar"]);
    $jurusan = htmlspecialchars($add["jurusan"]);




    $query = "UPDATE  data SET 
    nama='$nama',
    nrp='$nrp',
    email='$email',
    gambar='$gambar'
    ,jurusan='$jurusan' WHERE id=$id";

    mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);
}
$id = $_GET["id"];;

$conn = mysqli_connect($servername, $username, $password, $database);
$mhs = query("SELECT * FROM data WHERE id=$id")[0];

if (isset($_POST["submit"])) {
    # code...
    if (ubah($_POST) > 0) {
        echo "<script>alert('Data Berhasil DiUbah');
        document.location = 'index.php';
        
        </script>";
    } else {
        echo "<script>alert('Maaf Data Gagal DiUbah');
        document.location = 'index.php';
        
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Css/all.css">
    <link rel="stylesheet" href="../Css/bootstrap.min.css">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }


    .box {
        width: 150px;
        height: 150px;
        animation: animas 10s linear infinite;
        background-color: aqua;
        margin: 40px auto;
    }


    @keyframes animas {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }
</style>

<body id="body">
    <div class="container mb-5 mt-3">
        <div class="box" id="box"></div>
        <div class="card bg-dark text-light p-3 ">
            <h1 class="card-title">Change Data</h1>
            <div class="form-group">
                <form action="" method="post" aria-required="require">
                    <label for="nama" class="form-label">Nama</label>
                    <input required type="text" name="nama" id="nama" class="form-control" value=<?php echo $mhs["nama"]; ?>>
                    <label for="email" class="form-label">Email</label>
                    <input required type="email" name="email" id="email" class="form-control" value=<?php echo $mhs["email"]; ?>>
                    <label for="nrp">Number</label>
                    <input required type="text" name="nrp" id="nrp" class="form-control" value=<?php echo $mhs["nrp"]; ?>>
                    <label for="jurusan">Jurusan</label>
                    <input required type="text" name="jurusan" id="jurusan" class="form-control" value=<?php echo $mhs["jurusan"]; ?>>
                    <label for="gambar">Gambar</label>
                    <input required type="text" name="gambar" id="gambar" class="form-control" value=<?php echo $mhs["gambar"]; ?>>
                    <button class="btn btn-primary mt-4" name="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
    <script src="../Js/all.js"></script>
    <script>
        const box = document.getElementById('box');
        const body = document.getElementById('body');

        body.addEventListener('mousemove', play);

        function play(e) {

            box.style.backgroundColor = `rgb(144,${e.clientX},${e.clientY})`;

        }
    </script>
</body>

</html>