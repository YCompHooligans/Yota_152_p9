<?php
include "admin/koneksi.inc.php";

$sql = "SELECT * FROM kontak ORDER BY id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table width='75%' cellpadding='2' cellspacing='0' border='1'>
    <tr>
        <th>No</th>
        <th>id</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Kota</th>
        <th>Pesan</th>
    </tr>";

    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>" . $no . "</td>
            <td>" . $row["id"] . "</td>
            <td>" . $row["Nama"] . "</td>
            <td>" . $row["jkel"] . "</td>
            <td>" . $row["Email"] . "</td>
            <td>" . $row["Alamat"] . "</td>
            <td>" . $row["Kota"] . "</td>
            <td>" . $row["Pesan"] . "</td>
        </tr>";
        $no++;
    }

    echo "</table>";
} else {
    echo "Tidak ada data";
}

mysqli_close($conn);
?>