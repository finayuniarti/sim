@extends('templates.reviewer')

@section('content')
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">PENILAIAN PROPOSAL PENELITIAN</h6>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('reviewer.penelitian.pdf', $penelitian->id) }}" method="post">
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
                                        <input class="form-control {{ $errors->has('tema')?'is-invalid':''}}"
                                               type="text" name="tema" value="{{old('tema')}}">
                                        @if($errors->has('tema'))
                                            <span class="invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('tema') }}</b></p>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label>Program Studi</label>
                                        <input class="form-control" name="prodi" readonly
                                               value="{{ $penelitian->user->prodi }}">
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
                                        <input class="form-control {{ $errors->has('lama_teliti')?'is-invalid':''}}"
                                               type="text" name="lama_teliti" value="{{old('lama_teliti')}}">
                                        @if($errors->has('lama_teliti'))
                                            <span class="invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('lama_teliti') }}</b></p>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="example-email-input">Anggota</label>
                                        <input type="hidden" name="total_anggota"
                                               value="{{ count($penelitian->anggotas) }}">
                                        @foreach($penelitian->anggotas as $anggota)
                                            <input class="form-control" type="text" readonly name="anggota"
                                                   value="{{ $anggota->user->name}}">
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-6">
                                        <label for="example-email-input">Biaya Diusulkan</label>
                                        <input class="form-control {{ $errors->has('biaya_usul')?'is-invalid':''}}"
                                               type="text" name="biaya_usul" value="{{old('biaya_usul')}}">
                                        @if($errors->has('biaya_usul'))
                                            <span class="invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('biaya_usul') }}</b></p>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="example-email-input">Biaya Direkomendasikan</label>
                                        <input class="form-control {{ $errors->has('biaya_rekomendasi')?'is-invalid':''}}"
                                               type="text" name="biaya_rekomendasi" value="{{old('biaya_rekomendasi')}}">
                                        @if($errors->has('biaya_rekomendasil'))
                                            <span class="invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('biaya_rekomendasi') }}</b></p>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                                                aria-hidden="true">×</span> </button>
                                        <h3 class="text-danger"> Warning</h3> {{ $message }}
                                    </div>
                                @endif
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
                                        <td class="align-middle" id="bobot_1">15</td>
                                        <td class="align-middle">
                                            <select name="skor_1" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </td>
                                        <td class="align-middle"><input class="form-control" name="nilai_1" readonly></td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <h6>Peluang luaran penelitian/ Pengabdian Masyarakat:</h6>
                                            <p> a. Publikasi ilmiah</p>
                                        </td>
                                        <td class="align-middle" id="bobot_2">15</td>
                                        <td class="align-middle">
                                            <select name="skor_2" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </td>
                                        <td class="align-middle"><input readonly class="form-control" name="nilai_2"></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>
                                            <p>b. Pengembangan iptek-sosbud</p>
                                        </td>
                                        <td class="align-middle" id="bobot_3">15</td>
                                        <td class="align-middle">
                                            <select name="skor_3" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </td>
                                        <td class="align-middle"><input readonly class="form-control" name="nilai_3"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><p>c. Pengayaan bahan ajar/ HAKI</p></td>
                                        <td class="align-middle" id="bobot_4">10</td>
                                        <td class="align-middle">
                                            <select name="skor_4" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </td>
                                        <td class="align-middle"><input readonly class="form-control" name="nilai_4"></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>
                                            <h6>Metode penelitian/ Pengabdian Masyarakat :</h6>
                                            <p>Ketepatan dan kesesuaian metode yang digunakan</p>
                                        </td>
                                        <td class="align-middle" id="bobot_5">15</td>
                                        <td class="align-middle">
                                            <select name="skor_5" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </td>
                                        <td class="align-middle"><input readonly class="form-control" name="nilai_5"></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>
                                            <h6>Tinjauan pustaka :</h6>
                                            <p>a. Relevansi</p>
                                            <p>b. Kemutakhiran</p>
                                            <p>c. Penyusunan daftar pustaka</p>
                                        </td>
                                        <td class="align-middle" id="bobot_6">15</td>
                                        <td class="align-middle">
                                            <select name="skor_6" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </td>
                                        <td class="align-middle"><input readonly class="form-control" name="nilai_6"></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>
                                            <h6>Kelayakan Penelitian/Pengabdian Masyarakat :</h6>
                                            <p>a. Kesesuaian waktu</p>
                                            <p>b. Kesesuaian biaya</p>
                                            <p>c.Kesesuaian personalia</p>
                                        </td>
                                        <td class="align-middle" id="bobot_7">10</td>
                                        <td class="align-middle">
                                            <select name="skor_7" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </td>
                                        <td class="align-middle"><input readonly class="form-control" name="nilai_7"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center" class="align-middle"><h6>Jumlah</h6></td>
                                        <td colspan="2" class="align-middle" id="bobot_8">100</td>
                                        <td class="align-middle"><input readonly class="form-control" name="nilai_8"></td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" align="center" class="align-middle"><h6>Dana</h6></td>
                                        <td colspan="2" class="align-middle"><input readonly class="form-control" name="nilai_9"></td>
                                    </tr>

                                    </tbody>
                                </table>
                                <td>
                                    <label>Keterangan:</label>
                                    <h6>1. Skor : </h6>
                                    <p> -> 1, 2, 3, 5, 6, 7 (1 = buruk, 2 = sangat kurang, 3 = kurang, 5 = cukup, 6 =
                                        baik, 7 = sangat baik)</p>
                                    <h6>2. Nilai Tambah Publikasi Ilmiah :</h6>
                                    <p> -> Jurnal Nasional berissn Internal = 3</p>
                                    <p> -> Jurnal Nasional Terakreditasi = 7 </p>
                                    <p> -> Jurnal Nasional berissn DOAJ = 6</p>
                                    <p> -> Jurnal Nasional berissn Eksternal = 5</p>
                                    <h6>3. Nilai = Bobot × Skor (Konversasi nilai angka ke huruf dan dana yang
                                        dibiayai)</h6>
                                    <p> -> 6.00 - 7.00 = Baik (5 juta)</p>
                                    <p> -> 4.00 - 5.99 = Cukup (4 juta)</p>
                                    <p> -> 3.00 - 3.99 = Kurang (3 juta)</p>
                                    <p> -> < 2.99 = Tidak Lolos</p>
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

@section('script')
    <script>
        const nilai1 = document.querySelector('input[name="nilai_1"]');
        const nilai2 = document.querySelector('input[name="nilai_2"]');
        const nilai3 = document.querySelector('input[name="nilai_3"]');
        const nilai4 = document.querySelector('input[name="nilai_4"]');
        const nilai5 = document.querySelector('input[name="nilai_5"]');
        const nilai6 = document.querySelector('input[name="nilai_6"]');
        const nilai7 = document.querySelector('input[name="nilai_7"]');
        const nilai8 = document.querySelector('input[name="nilai_8"]');
        const nilai9 = document.querySelector('input[name="nilai_9');

        const skor1 = document.querySelector('select[name="skor_1"]');
        const skor2 = document.querySelector('select[name="skor_2"]');
        const skor3 = document.querySelector('select[name="skor_3"]');
        const skor4 = document.querySelector('select[name="skor_4"]');
        const skor5 = document.querySelector('select[name="skor_5"]');
        const skor6 = document.querySelector('select[name="skor_6"]');
        const skor7 = document.querySelector('select[name="skor_7"]');
        const skor8 = document.querySelector('select[name="skor_8"]');

        const bobot1 = document.querySelector('#bobot_1');
        const bobot2 = document.querySelector('#bobot_2');
        const bobot3 = document.querySelector('#bobot_3');
        const bobot4 = document.querySelector('#bobot_4');
        const bobot5 = document.querySelector('#bobot_5');
        const bobot6 = document.querySelector('#bobot_6');
        const bobot7 = document.querySelector('#bobot_7');
        const bobot8 = document.querySelector('#bobot_8');

        changeSkor(skor1, bobot1, nilai1);
        changeSkor(skor2, bobot2, nilai2);
        changeSkor(skor3, bobot3, nilai3);
        changeSkor(skor4, bobot4, nilai4);
        changeSkor(skor5, bobot5, nilai5);
        changeSkor(skor6, bobot6, nilai6);
        changeSkor(skor7, bobot7, nilai7);


        let totalNilai = 0;
        function changeSkor(s, b, n) {
            s.addEventListener('change', function () {
               let nilai = s.value * b.innerText;
               n.value = nilai;

               totalNilai += nilai;
               let rata2 = totalNilai / 100;
               nilai8.value = rata2;

               if (rata2 > 6.00){
                   nilai9.value ="Rp. 5.000.000"
               }else if(rata2 > 4.00 && rata2 < 5.99){
                   nilai9.value ="Rp. 4.000.000"
               }else if(rata2 > 3.00 && rata2 < 3.99){
                   nilai9.value ="Rp. 3.000.000"
               }else {
                   nilai9.value ="Tidak Lolos"
               }
            });
        }

    </script>
@endsection
