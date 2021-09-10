<?php

$servername = "localhost";
$username  = "STIGER-R1";
$password  = "5678";
$database  = "phpdasar";

$conn = mysqli_connect($servername, $username, $password, $database);

$id = $_GET["id"];
function hapus($active)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM data WHERE id=$active");
    return mysqli_affected_rows($conn);
}

if (
    hapus($id) > 0
) {

    echo "<script>alert('Data Berhasil Dihapus');
        document.location = 'index.php';
        </script>";
} else {
    echo "<script>alert('Data Gagal Dihapus');
    document.location = 'index.php';
    
    </script>";
}
