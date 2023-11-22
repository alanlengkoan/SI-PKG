<?php
ob_start();
// untuk router
include_once '../../../configs/library/my_root.php';
// autoload class
spl_autoload_register('autoLoadClass');
// untuk memanggil class sql
$pdo = new sql;
// untuk class my_login
$mylog = new my_login;
// untuk class my_function
$myfun = new my_function;

// ambil data laporan
$id_riwayat = $_GET['id_riwayat'];
$sql        = "SELECT r.id_riwayat, g.id_guru, g.nip, g.nama AS guru, g.tmp_lahir, g.tgl_lahir, g.kelamin, j.nama AS jabatan, p.nama AS pangkat, e.nama AS pendidikan, kk.nama AS hasil, r.nilai, r.tgl FROM tb_riwayat AS r LEFT JOIN tb_guru AS g ON g.id_guru = r.id_guru LEFT JOIN tb_jabatan AS j ON j.id_jabatan = g.id_jabatan LEFT JOIN tb_pangkat AS p ON p.id_pangkat = g.id_pangkat LEFT JOIN tb_pendidikan AS e ON e.id_pendidikan = g.id_pendidikan LEFT JOIN tb_kriteria_kat AS kk ON kk.id_kriteria_kat = r.id_kriteria_kat WHERE r.id_riwayat = '$id_riwayat'";
$guru       = $pdo->Query($sql);
$row        = $guru->fetch(PDO::FETCH_OBJ);
?>

<!-- CSS -->
<style media="screen">
    .judul {
        padding: 4mm;
        text-align: center;
    }

    .nama {
        text-decoration: underline;
        font-weight: bold;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin-top: 0;
        margin-bottom: 5px;
    }

    h3 {
        font-family: times;
    }

    p {
        margin: 0;
    }
</style>
<!-- CSS -->

<div>
    <div class="judul">
        <table align="center">
            <tr>
                <td width="600" align="center">
                    <h4>SISTEM INFORMASI PENILAIAN KINERJA GURU</h4>
                </td>
            </tr>
        </table>
        <hr>
    </div>

    <br /><br />

    <h3 style="text-align: center">Hasil Penilaian</h3>

    <br /><br />

    <table align="center">
        <tr>
            <td align="center">Nama</td>
            <td>: <?= $row->guru ?></td>
        </tr>
        <tr>
            <td align="center">NIP</td>
            <td>: <?= $row->nip ?></td>
        </tr>
        <tr>
            <td align="center">Tempat, Tanggal Lahir</td>
            <td>: <?= $row->tmp_lahir ?>, <?= $row->tgl_lahir ?></td>
        </tr>
        <tr>
            <td align="center">Jenis Kelamin</td>
            <td>: <?= ($row->kelamin === 'L' ? 'Laki - laki' : 'Perempuan') ?></td>
        </tr>
        <tr>
            <td align="center">Jabatan</td>
            <td>: <?= $row->jabatan ?></td>
        </tr>
        <tr>
            <td align="center">Pangkat</td>
            <td>: <?= $row->pangkat ?></td>
        </tr>
        <tr>
            <td align="center">Pendidikan</td>
            <td>: <?= $row->pendidikan ?></td>
        </tr>
        <tr>
            <td align="center">Hasil Penilaian</td>
            <td>: <?= $row->hasil ?></td>
        </tr>
        <tr>
            <td align="center">Nilai</td>
            <td>: <?= $row->nilai ?></td>
        </tr>
        <tr>
            <td align="center">Tanggal Penilaian</td>
            <td>: <?= $myfun->tanggal_indo($row->tgl) ?></td>
        </tr>
    </table>
    <br /><br />
    <table id="tabel-pengembalian" style="width: 100%;">
        <tr>
            <td width="500"></td>
            <td style="text-align: center;">
                Mamasa, <?= $myfun->tanggal_indo(date('Y-m-d')) ?>
                <br />
                Mengetahui
                <br />
                <b>Kepala Sekolah</b>
                <br />
                <img src="./../../../assets/admin/images/ttd.png" alt="logo" title="logo" />
                <br />
                <b style="text-decoration: underline;">
                    Buttu Langi S.Pd.
                </b>
            </td>
        </tr>
    </table>
</div>

<?php
// proses untuk menampilkan file pdf
$content = ob_get_clean();
include_once "./../../../vendors/html2pdf/html2pdf.class.php";
$html2pdf = new HTML2PDF('P', 'A4', 'en', 'utf-8');
$html2pdf->WriteHTML($content);
$html2pdf->Output('Cetak Riwayat.pdf');
?>