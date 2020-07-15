@extends('templates.reviewer')

@section('content')
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">PENILAIAN PROPOSAL PENELITIAN</h6>

                            <form action="#" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">

                                    <div class="col-md-3">
                                        <label>Tahun Akademik</label>
                                        <select class="form-control" name="tahun_akademik">
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                        </select>
                                    </div>

                                    <div class="col-md-5">
                                        <label for="example-email-input">Tema</label>
                                        <input class="form-control" type="text" name="tema">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Program Studi</label>
                                        <input class="form-control" readonly value="{{ $penelitian->user->prodi }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="example-email-input">Judul Penelitian</label>
                                        <input class="form-control" readonly name="judul"
                                               value="{{ $penelitian->judul }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="example-email-input">Nama Lengkap</label>
                                        <input class="form-control" readonly name="nama"
                                               value="{{ $penelitian->user->name }}">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="example-email-input">NIDN</label>
                                        <input class="form-control" readonly name="nidn"
                                               value="{{ $penelitian->user->nidn }}">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="example-email-input">Lama Penelitian</label>
                                        <input class="form-control" type="text" name="lama teliti">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="example-email-input">Anggota</label>
                                        @foreach($penelitian->anggotas as $anggota)
                                            <input class="form-control" type="text" readonly name="anggota" value="{{ $anggota->user->name}}">
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-6">
                                        <label for="example-email-input">Biaya Diusulkan</label>
                                        <input class="form-control" type="text" name="biaya usul">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="example-email-input">Biaya Direkomendasikan</label>
                                        <input class="form-control" type="text" name="biaya rekomendasi">
                                    </div>
                                </div>

                                <h4>Penilaian</h4><br/>

                                <table class="table table-bordered dt-responsive nowrap"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="50%">Kriteria Penilaian</th>
                                        <th width="10%">Bobot(%)</th>
                                        <th width="10%">Skor</th>
                                        <th width="10%">Nilai</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <h6>Perumusan masalah :</h6>
                                            <p>a. Ketajaman perumusan masalah</p>
                                            <p>b. Tujuan Penelitian</p>
                                        </td>
                                        <td class="align-middle">15</td>
                                        <td class="align-middle"><input class="form-control" name="skor_1"></td>
                                        <td class="align-middle"><input class="form-control" name="nilai_1"></td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <h6>Peluang luaran penelitian/ Pengabdian Masyarakat:</h6>
                                            <p> a. Publikasi ilmiah</p>
                                        </td>
                                        <td class="align-middle">15</td>
                                        <td class="align-middle"><input class="form-control" name="skor_2"></td>
                                        <td class="align-middle"><input class="form-control" name="nilai_2"></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>
                                            <p>b. Pengembangan iptek-sosbud</p>
                                        </td>
                                        <td class="align-middle">15</td>
                                        <td class="align-middle"><input class="form-control" name="skor_3"></td>
                                        <td class="align-middle"><input class="form-control" name="nilai_3"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><p>c. Pengayaan bahan ajar/ HAKI</p></td>
                                        <td class="align-middle">10</td>
                                        <td class="align-middle"><input class="form-control" name="skor_4"></td>
                                        <td class="align-middle"><input class="form-control" name="nilai_4"></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>
                                            <h6>Metode penelitian/ Pengabdian Masyarakat :</h6>
                                            <p>Ketepatan dan kesesuaian metode yang digunakan</p>
                                        </td>
                                        <td class="align-middle">15</td>
                                        <td class="align-middle"><input class="form-control" name="skor_5"></td>
                                        <td class="align-middle"><input class="form-control" name="nilai_5"></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>
                                            <h6>Tinjauan pustaka :</h6>
                                            <p>a. Relevansi</p>
                                            <p>b. Kemutakhiran</p>
                                            <p>c. Penyusunan daftar pustaka</p>
                                        </td>
                                        <td class="align-middle">15</td>
                                        <td class="align-middle"><input class="form-control" name="skor_6"></td>
                                        <td class="align-middle"><input class="form-control" name="nilai_6"></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>
                                            <h6>Kelayakan Penelitian/Pengabdian Masyarakat :</h6>
                                            <p>a. Kesesuaian waktu</p>
                                            <p>b. Kesesuaian biaya</p>
                                            <p>c.Kesesuaian personalia</p>
                                        </td>
                                        <td class="align-middle">10</td>
                                        <td class="align-middle"><input class="form-control" name="skor_7"></td>
                                        <td class="align-middle"><input class="form-control" name="nilai_7"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center" class="align-middle"><h6>Jumlah</h6></td>
                                        <td class="align-middle">100</td>
                                        <td class="align-middle"><input class="form-control" name="skor_8"></td>
                                        <td class="align-middle"><input class="form-control" name="nilai_8"></td>
                                    </tr>

                                    </tbody>
                                </table>
                                    <td>
                                        <label>Keterangan:</label>
                                        <h6>1.	Skor : </h6>
                                        <p> -> 1, 2, 3, 5, 6, 7 (1 = buruk, 2 = sangat kurang, 3 = kurang, 5 = cukup, 6 = baik, 7 = sangat baik)</p>
                                        <h6>2.	Nilai Tambah Publikasi Ilmiah :</h6>
                                        <p> -> Jurnal Nasional berissn Internal = 3</p>
                                        <p> -> Jurnal Nasional Terakreditasi	=  7 </p>
                                        <p> -> Jurnal Nasional berissn DOAJ		=  6</p>
                                        <p> -> Jurnal Nasional berissn Eksternal	=  5</p>
                                        <h6>3.	Nilai  =   Bobot × Skor 	(Konversasi nilai angka ke huruf dan dana yang dibiayai)</h6>
                                        <p> -> 6.00 - 7.00   	=  Baik	(5 juta)</p>
                                        <p> -> 4.00 - 5.99   		=  Cukup 	(4 juta)</p>
                                        <p> -> 3.00 - 3.99   		=  Kurang (3 juta)</p>
                                        <p> ->      <    2.99   		=  Tidak Lolos</p>
                                    </td>

                                <div class="form-group float-right">
                                    <button class="btn btn-success" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </section>
@endsection
