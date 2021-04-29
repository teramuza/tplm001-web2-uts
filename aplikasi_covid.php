<?php
if (isset($_POST['cancel'])) { unset($_POST); } // untuk mereset value yg sudah di post

if (isset($_POST['submit'])) {
    $today = date("j F Y G:i");
    $wilayah = $_POST['namaWilayahOption'];
    $positif = $_POST['jumlahPositif'];
    $dirawat = $_POST['jumlahDirawat'];
    $sembuh = $_POST['jumlahSembuh'];
    $meninggal = $_POST['jumlahMeninggal'];
    $operator = $_POST['namaOperator'];
    $nim = $_POST['nim'];


    if (isset($_POST['spesificFileName'])) {
        $file_name = "data_".date("Ymd").'_'.str_replace(' ', '', $wilayah).".txt";
    } else {
        $file_name = "data.txt";
    }

    $berkas = fopen($file_name, "w");

    fprintf($berkas, "Data Pemantauan Covid19 Wilayah %s\n", $wilayah);
    fprintf($berkas, "Per %s\n", $today);
    fprintf($berkas, "%s / %s\n\n", $operator, $nim);

    fprintf($berkas, "-------------------------------------------------------------------------\n");
    fprintf($berkas, "| %-15s | %-15s | %-15s | %-15s |\n", "Positif", "Dirawat", "Sembuh", "Meninggal");
    fprintf($berkas, "-------------------------------------------------------------------------\n");
    fprintf($berkas, "| %-15s | %-15s | %-15s | %-15s |\n", $positif, $dirawat, $sembuh, $meninggal);
    fprintf($berkas, "-------------------------------------------------------------------------\n");

    fclose($berkas);
    echo '<script type="text/javascript">alert("Data berhasil disimpan di file '. $file_name .'")</script>';
    unset($_POST);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="teramuza">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Aplikasi Covid-19</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid my-5">

            <div class="card" style="width: 70rem;">

                <div class="card-header pt-4">
                    <h5 class="card-title text-center">Aplikasi Covid-19</h5>
                </div>

                <div class="card-body p-5">

                    <form method="post" action="">
                        <div class="form-group">
                            <label for="namaWilayahOption">Nama Wilayah: </label>
                            <select class="form-control" id="namaWilayahOption" name="namaWilayahOption" required>
                                <option value="" selected disabled>--pilih wilayah--</option>
                                <option value="DKI Jakarta">DKI Jakarta</option>
                                <option value="Jawa Barat">Jawa Barat</option>
                                <option value="Banten">Banten</option>
                                <option value="Jawa Tengah">Jawa Tengah</option>
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="jumlahPositif">Jumlah Positif: </label>
                                <input type="number" name="jumlahPositif" class="form-control" id="jumlahPositif" placeholder="masukkan jumlah pasien positif" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jumlahDirawat">Jumlah Dirawat: </label>
                                <input type="number" name="jumlahDirawat" class="form-control" id="jumlahDirawat" placeholder="masukkan jumlah pasien dirawat"required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="jumlahSembuh">Jumlah Sembuh: </label>
                                <input type="number" name="jumlahSembuh" class="form-control" id="jumlahSembuh" placeholder="masukkan jumlah pasien sembuh" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jumlahMeninggal">Jumlah Meninggal: </label>
                                <input type="number" name="jumlahMeninggal" class="form-control" id="jumlahMeninggal" placeholder="masukkan jumlah pasien meninggal" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="namaOperator">Nama Operator: </label>
                                <input type="text" name="namaOperator" class="form-control" id="namaOperator" placeholder="masukkan nama operator" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nim">NIM Mahasiswa: </label>
                                <input type="text" name="nim" class="form-control" id="nim" placeholder="masukkan nomor induk mahasiswa" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check" title="Nama file akan seperti data_yyyymmdd_wilayah.txt">
                                <input class="form-check-input" type="checkbox" name="spesificFileName" id="spesificFileName">
                                <label class="form-check-label" for="spesificFileName">
                                    Gunakan nama file spesifik
                                </label>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        <button type="submit" name="cancel" class="btn">Batal</button>
                    </form>

                </div>

                <div class="card-footer text-muted text-center">
                    &copy; Teuku Raja Muhammad Zaki. Powered by <a target="_blank" href="https://getbootstrap.com/">Bootstrap</a>
                </div>

            </div>

        </div>
    </body>
</html>