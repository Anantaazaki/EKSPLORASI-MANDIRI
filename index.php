
<!-- ini Form HTML buat mengirim data pakai metode POST -->
<form method="POST" action="" enctype="multipart/form-data">
    <table>
        <!-- Baris buat input NAMA -->
        <tr>
            <td>NAMA</td>
            <td>:</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <!-- Baris buat input KELAS -->
        <tr>
            <td>KELAS</td>
            <td>:</td>
            <td><input type="text" name="kelas"></td>
        </tr>
        <!-- Baris buat input NPM -->
        <tr>
            <td>NPM</td>
            <td>:</td>
            <td><input type="text" name="npm"></td>
        </tr>
        <!-- Baris buat input FILE FOTO DIRI -->
        <tr>
            <td>FOTO</td>
            <td>:</td>
            <td><input type="file" name="file_diri"></td>
        </tr>
        <!-- Baris buat input FILE KTP -->
        <tr>
            <td>KTP</td>
            <td>:</td>
            <td><input type="file" name="file_ktp"></td>
        </tr>
        <!-- Baris buat input FILE CV -->
        <tr>
            <td>CV</td>
            <td>:</td>
            <td><input type="file" name="file_cv"></td>
        </tr>
        <!-- Baris buat input FILE SERTIFIKAT -->
        
        <!-- Baris buat tombol submit -->
        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" name="hasil" value="KIRIM"></td>
        </tr>
    </table>
</form>

<!-- Ini bagian PHP buat proses data yang dikirimkan lewat form di atas -->
<?php
// ngecek apakah tombol submit telah ditekan
if (isset($_POST["hasil"])) {
    // ini ngambil data dari input form
    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"];
    $npm = $_POST["npm"];
    // ngambil nama file yang diunggah
    $file_diri = $_FILES["file_diri"]["name"];
    // ngambil lokasi sementara file yang diunggah
    $tmp_name_diri = $_FILES["file_diri"]["tmp_name"];
    
    $file_ktp = $_FILES["file_ktp"]["name"];
    
    $tmp_name_ktp = $_FILES["file_ktp"]["tmp_name"];

    $file_cv = $_FILES["file_cv"]["name"];
    
    $tmp_name_cv = $_FILES["file_cv"]["tmp_name"];

    // ini mindahin file yang diunggah ke folder 'images'
    move_uploaded_file($tmp_name_diri, "\/" . $file_diri);
    // ini mindahin file yang diunggah ke folder 'ktp'
    move_uploaded_file($tmp_name_ktp, "ktp/" . $file_ktp);
    // ini mindahin file yang diunggah ke folder 'cv'
    move_uploaded_file($tmp_name_cv, "cv/" . $file_cv);

?>
    <!-- ini nampilkan data dalam tabel setelah form dikirim -->
    <table border="1" cellspacing="0">
        <tr>
            <td>NAMA</td>
            <td>KELAS</td>
            <td>NPM</td>
            <td>FOTO</td>
            <td>KTP</td>
            <td>CV</td>
        </tr>
        <tr>
            <td><?php echo $nama; ?></td>
            <td><?php echo $kelas; ?></td>
            <td><?php echo $npm; ?></td>
            <td><img src="images/<?php echo $file_diri; ?>" style="width: 100px"></td>
            <td><img src="ktp/<?php echo $file_ktp; ?>" style="width: 100px"></td>
            <td><img src="cv/<?php echo $file_cv; ?>" style="width: 100px"></td>
        </tr>
    </table>
<?php
}
?>
