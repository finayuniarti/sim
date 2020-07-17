<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Demo in Laravel 7</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12px;
        }
    </style>
</head>
<body style="page-break-inside:avoid;">
<div>

    <table class="ml-5 mr-5 table table-sm table-borderless" style="height: 100%">
        <thead>
        </thead>
        <tbody>
        <tr>
            <td colspan="2" class="text-center">PENILAIAN PROPOSAL PENGABDIAN</td>
        </tr>
        <tr>
            <td width="40%">Judul Penelitian</td>
            <td rowspan="2" width="60%">:</td>
        </tr>
        <tr>
            <td width="40%" height="25px"></td>
        </tr>
        <tr>
            <td width="40%">Tema</td>
            <td width="60%">:</td>
        </tr>
        <tr>
            <td width="40%">Program Studi</td>
            <td width="60%">:</td>
        </tr>
        <tr>
            <td width="40%">Ketua Peneliti</td>
            <td width="60%">:</td>
        </tr>
        <tr>
            <td width="40%">a. Nama Lengkap</td>
            <td width="60%">:</td>
        </tr>
        <tr>
            <td width="40%">b. NIDN</td>
            <td width="60%">:</td>
        </tr>
        <tr>
            <td width="40%">Anggota Peneliti</td>
            <td width="60%">: &emsp;&emsp;&emsp; Orang</td>
        </tr>
        <tr>
            <td width="40%">Lama Penelitian Keseluruhan*</td>
            <td width="60%">: &emsp;&emsp;&emsp; Tahun</td>
        </tr>
        <tr>
            <td width="40%">Biaya Diusulkan</td>
            <td width="60%">: Rp.</td>
        </tr>
        <tr>
            <td width="40%">Biaya Direkomendasikan</td>
            <td width="60%">: Rp.</td>
        </tr>

        </tbody>
    </table>
    <table class="table table-sm table-bordered">
        <thead>
        </thead>
        <tbody>
        <tr class="text-center">
            <td width="10%">No</td>
            <td width="50%">Kriteria Penilaian</td>
            <td width="20%">Bobot(%)</td>
            <td width="10%">Skor</td>
            <td width="10%">Nilai</td>
        </tr>
        <tr>
            <td width="10%" class="text-center align-middle">1</td>
            <td width="50%">
                <b>Perumusan masalah:</b>
                <br>a.Ketajaman aaaaa
                <br>b.Ketajaman aaaaa
            </td>
            <td width="20%" class="text-center align-middle">15</td>
            <td width="10%"></td>
            <td width="10%"></td>
        </tr>
        <tr>
            <td width="10%" rowspan="3" class="align-middle text-center">2</td>
            <td width="50%">
                <b>Peluang luaran penelitian/ Pengabdian Masyarakat:</b>
                <br>a. Publikasi ilmiah
            </td>
            <td width="20%" class="text-center align-middle">20</td>
            <td width="10%"></td>
            <td width="10%"></td>
        </tr>
        <tr>
            <td width="50%">
                b. Pengembangan iptek-sosbud
            </td>
            <td width="20%" class="text-center align-middle">20</td>
            <td width="10%"></td>
            <td width="10%"></td>
        </tr>
        <tr>
            <td width="50%">
                c. Pengayaan bahan ajar/ HAKI
            </td>
            <td width="20%" class="text-center align-middle">20</td>
            <td width="10%"></td>
            <td width="10%"></td>
        </tr>
        <tr>
            <td width="10%" class="text-center align-middle">3</td>
            <td width="50%">
                <b>Metode penelitian/ Pengabdian Masyarakat :</b>
                <ul>
                    <li>Ketepatan dan kesesuaian metode yang digunakan</li>
                </ul>
            </td>
            <td width="20%" class="text-center align-middle">15</td>
            <td width="10%"></td>
            <td width="10%"></td>
        </tr>
        <tr>
            <td width="10%" class="text-center align-middle">4</td>
            <td width="50%">
                <b>Tinjauan pustaka :</b>
                <br>a. Relevansi
                <br>b. Kemutakhiran
                <br>c. Penyusunan daftar pustaka
            </td>
            <td width="20%" class="text-center align-middle">15</td>
            <td width="10%"></td>
            <td width="10%"></td>
        </tr>
        <tr>
            <td width="10%" class="text-center align-middle">5</td>
            <td width="50%">
                <b>Kelayakan Penelitian/Pengabdian Masyarakat :</b>
                <br>a. Kesesuaian waktu
                <br>b. Kesesuaian biaya
                <br>c. Kesesuaian personalia
            </td>
            <td width="20%" class="text-center align-middle">15</td>
            <td width="10%"></td>
            <td width="10%"></td>
        </tr>
        <tr>
            <td width="60%" colspan="2" class="text-center align-middle"><b>Jumlah</b></td>
            <td width="20%" class="text-center align-middle">15</td>
            <td width="10%"></td>
            <td width="10%"></td>
        </tr>
        </tbody>

    </table>

    <table class="table table-sm table-borderless">
        <tbody>
        <tr>
            <td colspan="5">Keterangan</td>
        </tr>
        <tr>
            <td rowspan="2" width="5%">1.</td>
            <td width="95%" colspan="4"><b>Skor:</b></td>
        </tr>
        <tr>
            <td colspan="4">1, 2, 3, 5, 6, 7 (1 = buruk, 2 = sangat kurang, 3 = kurang, 5 = cukup, 6 = baik, 7 = sangat
                baik)
            </td>
        </tr>
        <tr>
            <td rowspan="3" width="5%">2.</td>
            <td width="95%" colspan="4"><b>Nilai Tambah Publikasi Ilmiah :</b></td>
        </tr>
        <tr>
            <td width="20%">
                <ul>
                    <li>Jurnal Nasional berissn Internal</li>
                </ul>
            </td>
            <td width="10%">= 3</td>
            <td width="20%">
                <ul>
                    <li>Jurnal Nasional berissn DOAJ</li>
                </ul>
            </td>
            <td width="45%">= 6</td>
        </tr>
        <tr>
            <td width="20%">
                <ul>
                    <li>Jurnal Nasional Terakreditasi</li>
                </ul>
            </td>
            <td width="10%">= 7</td>
            <td width="20%">
                <ul>
                    <li>Jurnal Nasional berissn Eksternal</li>
                </ul>
            </td>
            <td width="45%">= 5</td>
        </tr>
        <tr>
            <td rowspan="5" width="5%">3.</td>
            <td width="95%" colspan="4"><b>Nilai = Bobot × Skor (Konversasi nilai angka ke huruf dan dana yang
                    dibiayai)</b></td>
        </tr>
        <tr>
            <td colspan="4">6.00 - 7.00 &emsp;= Baik (5 juta)</td>
        </tr>
        <tr>
            <td colspan="4">4.00 - 5.99 &emsp;= Cukup (4 juta)</td>
        </tr>
        <tr>
            <td colspan="4">3.00 - 4.99 &emsp;= Kurang (3 juta)</td>
        </tr>
        <tr>
            <td colspan="4">&leq; 2.99&emsp;&emsp;&emsp;= Tidak Lolos</td>
        </tr>
        </tbody>

    </table>

    <table class="table table-borderless">
        <tbody>
        <tr>
            <td width="70%" rowspan="4"></td>
            <td width="30%"><b>Tegal, . . . . . . . . . . . . . . . . . . 2020</b></td>
        </tr>
        <tr>
            <td width="30%"><i><u>Reviewer,</u></i></td>
        </tr>
        <tr>
            <td width="30%" height="100px"></td>
        </tr>
        <tr>
            <td width="30%">( . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . )</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
