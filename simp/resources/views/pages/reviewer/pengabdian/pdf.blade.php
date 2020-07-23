<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Demo in Laravel 7</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 11px;
        }
    </style>
</head>
<body>
<div>
    <table class="ml-5 table table-sm table-borderless" style="height: 30%">
        <thead>
        </thead>
        <tbody>
        <tr>
            <td colspan="5" class="text-center">PENILAIAN PROPOSAL PENGABDIAN</td>
        </tr>
        <tr>
            <td width="40%">Judul Penelitian</td>
            <td rowspan="2" width="60%">: {{ $request->judul }}</td>
        </tr>
        <tr>
            <td width="40%" height="25px"></td>
        </tr>
        <tr>
            <td width="40%">Tema</td>
            <td width="60%">: {{ $request->tema }}</td>
        </tr>
        <tr>
            <td width="40%">Program Studi</td>
            <td width="60%">: {{ $request->prodi }}</td>
        </tr>
        <tr>
            <td width="40%">Ketua Peneliti</td>
            <td width="60%">:</td>
        </tr>
        <tr>
            <td width="40%">a. Nama Lengkap</td>
            <td width="60%">: {{ $request->nama }}</td>
        </tr>
        <tr>
            <td width="40%">b. NIDN</td>
            <td width="60%">: {{ $request->nidn }}</td>
        </tr>
        <tr>
            <td width="40%">Anggota Peneliti</td>
            <td width="60%">: {{ $request->total_anggota }}Orang</td>
        </tr>
        <tr>
            <td width="40%">Lama Penelitian Keseluruhan*</td>
            <td width="60%">: {{ $request->lama_teliti }}Tahun</td>
        </tr>
        <tr>
            <td width="40%">Biaya Diusulkan</td>
            <td width="60%">: Rp.{{ $request->biaya_usul }}</td>
        </tr>
        <tr>
            <td width="40%">Biaya Direkomendasikan</td>
            <td width="60%">: Rp. {{ $request->biaya_rekomendasi }}</td>
        </tr>

        </tbody>
    </table>
    <table class="table table-sm table-bordered" style="height: 30%" border="2">
        <thead>
        <tr class="text-center">
            <th width="3%">No</th>
            <th width="57%">Kriteria Penilaian</th>
            <th width="20%">Bobot(%)</th>
            <th width="10%">Skor</th>
            <th width="10%">Nilai</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td width="3%" class="text-center align-middle">1</td>
            <td width="57%">
                <b>Perumusan masalah:</b>
                <br>a.Ketajaman aaaaa
                <br>b.Ketajaman aaaaa
            </td>
            <td width="20%" class="text-center align-middle">15</td>
            <td width="10%">{{ $request->skor_1 }}</td>
            <td width="10%">{{ $request->nilai_1 }}</td>
        </tr>
        <tr>
            <td width="3%" rowspan="3" class="align-middle text-center">2</td>
            <td width="57%">
                <b>Peluang luaran penelitian/ Pengabdian Masyarakat:</b>
                <br>a. Publikasi ilmiah
            </td>
            <td width="20%" class="text-center align-middle">20</td>
            <td width="10%">{{ $request->skor_2 }}</td>
            <td width="10%">{{ $request->nilai_2 }}</td>
        </tr>
        <tr>
            <td width="57%">
                b. Pengembangan iptek-sosbud
            </td>
            <td width="20%" class="text-center align-middle">20</td>
            <td width="10%">{{ $request->skor_3 }}</td>
            <td width="10%">{{ $request->nilai_3 }}</td>
        </tr>
        <tr>
            <td width="57%">
                c. Pengayaan bahan ajar/ HAKI
            </td>
            <td width="20%" class="text-center align-middle">20</td>
            <td width="10%">{{ $request->skor_4 }}</td>
            <td width="10%">{{ $request->nilai_4 }}</td>
        </tr>
        <tr>
            <td width="3%" class="text-center align-middle">3</td>
            <td width="57%">
                <b>Metode penelitian/ Pengabdian Masyarakat :</b>
                <ul>
                    <li>Ketepatan dan kesesuaian metode yang digunakan</li>
                </ul>
            </td>
            <td width="20%" class="text-center align-middle">15</td>
            <td width="10%">{{ $request->skor_5 }}</td>
            <td width="10%">{{ $request->nilai_5 }}</td>
        </tr>
        <tr>
            <td width="3%" class="text-center align-middle">4</td>
            <td width="57%">
                <b>Tinjauan pustaka :</b>
                <br>a. Relevansi
                <br>b. Kemutakhiran
                <br>c. Penyusunan daftar pustaka
            </td>
            <td width="20%" class="text-center align-middle">15</td>
            <td width="10%">{{ $request->skor_6 }}</td>
            <td width="10%">{{ $request->nilai_6 }}</td>
        </tr>
        <tr>
            <td width="3%" class="text-center align-middle">5</td>
            <td width="57%">
                <b>Kelayakan Penelitian/Pengabdian Masyarakat :</b>
                <br>a. Kesesuaian waktu
                <br>b. Kesesuaian biaya
                <br>c. Kesesuaian personalia
            </td>
            <td width="20%" class="text-center align-middle">15</td>
            <td width="10%">{{ $request->skor_7 }}</td>
            <td width="10%">{{ $request->nilai_7 }}</td>
        </tr>
        <tr>
            <td width="3%" colspan="2" class="text-center align-middle"><b>Jumlah</b></td>
            <td width="20%" class="text-center align-middle">15</td>
            <td width="10%">{{ $request->skor_8 }}</td>
            <td width="10%">{{ $request->skor_8 }}</td>
        </tr>
        </tbody>
    </table>

    <table class="table table-sm table-borderless" style="height: 10%">
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
            <td colspan="4">6.00 - 7.00 = Baik (5 juta)</td>
        </tr>
        <tr>
            <td colspan="4">4.00 - 5.99 = Cukup (4 juta)</td>
        </tr>
        <tr>
            <td colspan="4">3.00 - 4.99 = Kurang (3 juta)</td>
        </tr>
        <tr>
            <td colspan="4"> &#00; &#60;&#61; 2.99 = Tidak Lolos</td>
        </tr>
        </tbody>

    </table>

    <table class="table table-sm table-borderless" style="height: 30%">
        <tbody>
        <tr>
            <td width="80%" rowspan="2"></td>
            <td width="20%"><b>Tegal, . . . . . . . . . . . . . . . . . . 2020</b></td>
        </tr>
        <tr>
            <td width="30%"><i><u>Reviewer,</u></i></td>
        </tr>
        <tr>
            <td width="40%" height="70px"></td>
        </tr>
        <tr>
            <td width="30%">( . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . )</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
