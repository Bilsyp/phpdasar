<?php
// Ambil data dari tabel database
require 'function.php';
$mhs = query("SELECT * FROM data");

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
        <?php foreach ($mhs as $row) : ?>




            <tr>
                <td><?php echo $num; ?></td>
                <td>
                    <a href="">ubah</a>
                    <a href="">hapus</a>
                </td>
                <td><img src="../img/<?php echo $row["gambar"]; ?>" alt=""></td>
                <td><?php echo $row["nama"]; ?></td>
                <td><?php echo $row["nrp"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["jurusan"]; ?></td>



            </tr>
            <?php $num++; ?>
        <?php endforeach; ?>

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
    <?php if (isset($_POST["submit"])) :
        # code...
        echo "<h1>Hello , " . $_POST["name"] . "</h1>";

    endif; ?>
</body>

</html>