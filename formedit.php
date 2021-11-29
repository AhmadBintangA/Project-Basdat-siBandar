<?php
include("config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = pg_query($db, "SELECT * FROM calonsiswa WHERE id = $id");
    $siswa = pg_fetch_array($query, NULL, PGSQL_ASSOC);
} else {
    header('Location: daftarsiswa.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulir edit Siswa Baru | SMK Coding</title>
</head>
<body>
    <header>
        <h3>Formulir edit Siswa Baru</h3>
    </header>
    <form action="prosesedit.php?id=<?=$siswa['id']?>" method="POST">
        <fieldset>
            <p>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" placeholder="nama lengkap" value="<?= $siswa['nama'] ?>" />
            </p>
            <p>
                <label for="alamat">Alamat: </label>
                <textarea name="alamat"><?= $siswa['alamat'] ?></textarea>
            </p>
            <p>
                <label for="jenis_kelamin">Jenis Kelamin: </label>
                <label><input type="radio" name="jenis_kelamin" value="laki-laki" 
                <?php
                    if ($siswa['jenis_kelamin'] == 'laki-laki') {
                        echo "checked";
                    }
                ?>> Laki-laki</label>
                <label><input type="radio" name="jenis_kelamin" 
                <?php
                    if ($siswa['jenis_kelamin'] == 'perempuan') {
                        echo "checked";
                    }
                   ?> value="perempuan"> Perempuan</label>
            </p>
            <p>
                <label for="sekolah_asal">Sekolah Asal: </label>
                <input type="text" name="sekolah_asal" placeholder="nama sekolah" value="<?= $siswa['sekolah_asal'] ?>" />
            </p>
            <p>
                <input type="submit" value="edit" name="daftar" />
            </p>
        </fieldset>
    </form>
</body>
</html>