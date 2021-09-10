<?php
$servername = "localhost";
$username   = "Bilsy-B1";
$password   = "5678";
$database   = "phpdasar";

$conn = mysqli_connect($servername, $username, $password, $database);
$mhs = mysqli_query($conn, "SELECT * FROM data");
// DEFAULT ASC
// ORDER BY id DESC
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
function cari($keyword)
{
    $query = "SELECT * FROM data WHERE 
    nama LIKE '%$keyword%' OR nrp LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jurusan LIKE '%$keyword%'
    ";

    return query($query);
}
if (isset($_POST["cari"])) {
    # code...
    $mhs =  cari($_POST["keyword"]);
}







?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" color="black">
    <title>Document</title>
    <link rel="stylesheet" href="../Css/bootstrap.min.css">
</head>
<style>
    img {
        width: 50px;
        height: 50px;
    }

    .over {
        overflow: hidden;
    }
</style>

<body class="bg-dark">
    <div class="container text-center text-light">
        <div class="title text-center">
            <h1 class="">Daftar Siswa</h1>
        </div>


        <div class="card bg-primary text-center  p-0 over ">
            <a href="tambah.php" class="btn btn-dark mb-3 mt-3">Tambah Siswa</a>

            <form action="" method="post" class="mb-4 text-start p-3">
                <h3 class="">Search</h3>
                <input class="form-control" type="text" name="keyword" autofocus autocomplete="off" id="search" placeholder="Search Siswa">
                <button class="btn btn-dark mt-3" type="submit" name="cari">Search</button>


            </form>
            <table class="table table-dark table-striped  text-center text-wrap" border="1" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Action</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Jurusan</th>
                    <th>Gambar</th>

                </tr>
                <?php $i = 1; ?>
                <?php foreach ($mhs as $data) :     ?>
                    <tr>
                        <tbody>
                            <td><?php echo $i; ?></td>
                            <td><a href="hapus.php?id=<?php echo $data["id"]; ?>" class="btn btn-primary" onclick="return confirm('yakin?');">Hapus </a> |
                                <a class="btn btn-primary" href="ubah.php?id=<?php echo $data["id"]; ?>">Ubah</a>
                            </td>
                            <td><?php echo $data["nama"]; ?></td>
                            <td><?php echo $data["email"]; ?></td>
                            <td><?php echo $data["nrp"]; ?></td>
                            <td><?php echo $data["jurusan"]; ?></td>
                            <td><img src="../img/<?php echo $data["gambar"]; ?>" alt=""></td>


                        </tbody>

                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>

            </table>
        </div>
    </div>









    <?php if (!$conn) {
        # code...
        global $conn;
        die("Connection Failed" . mysqli_error($conn));
    } else {
        // echo "<script>alert('Connection Success')</script>";
    } ?>

</body>

</html>