<?php
$servername = "localhost";
$username   = "STIGER-R1";
$password   = "5678";
$database   = "phpdasar";

// koneksi database 
$conn = mysqli_connect($servername, $username, $password, $database);
// Ambil data dari tabel database

$result = mysqli_query($conn, "SELECT * FROM data");

// ambil data (fetch) dari object result 
// mysqli_fetch_row(); Mengembalikan array numeric example = [0] => "tony";
// mysqli_fetch_assoc();Mengembalika array associative example = ["nama"] => "tony";
// mysqli_fecth_array();Mengembalikan keduanya numeric dan associative
// mysqli_fecth_object();

// // $mhs = mysqli_fetch_assoc($result);

// while ($mhs = mysqli_fetch_assoc($result)) {
//     var_dump($mhs);
// }




// mengecek error

if (!$result) {
    echo mysqli_error($conn);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="../Css/bootstrap.min.css">
</head>
<style>
    img {
        width: 50px;
        height: 50px;
    }
</style>

<body>
    <table border="1" cellpadding="10" cellspacing="0" class="table table-dark text-light table-striped">
        <tr>
            <th>No.1</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Nrp</th>
            <th>Email</th>
            <th>Jurusan</th>

        </tr>
        <?php $num = 1; ?>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>




            <tr>
                <td><?php echo $num; ?></td>
                <td>
                    <a href="">ubah</a> |
                    <a href="">hapus</a>
                </td>
                <td><img src="../img/<?php echo $row["gambar"]; ?>" alt=""></td>
                <td><?php echo $row["nama"]; ?></td>
                <td><?php echo $row["nrp"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["jurusan"]; ?></td>



            </tr>
            <?php $num++; ?>
        <?php endwhile; ?>

    </table>

    <div class="container mt-4">
        <div class="card bg-primary p-3 text-light ">
            <h1 class="card-title">F<span class="text-dark">orm</span></h1>

            <form action="" method="post">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control">
                <button type="submit" name="submit" class="btn btn-dark mt-3">Send</button>

            </form>
        </div>
    </div>
    <?php if (isset($_POST["submit"])) {
        # code...
        echo "<h1>Hello , " . $_POST["name"] . "</h1>";
    } else {
    } ?>
</body>

</html>