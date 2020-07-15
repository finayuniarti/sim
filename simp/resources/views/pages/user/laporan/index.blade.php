@extends('templates.user')

@section('content')
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Form Laporan</h4>
                            <form action="{{route('user.penelitian.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Tahun Akademik</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="tahun">
                                            <option>----</option>
                                            <option value="2019/2020">2019/2020</option>
                                            <option value="2018/2019">2018/2019</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Nama Peneliti</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text"
                                               value="{{Auth::guard('web')->user()->name}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-md-2 col-form-label">NIDN</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text"
                                               value="{{Auth::guard('web')->user()->nidn}}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-md-2 col-form-label">Judul Penelitian</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="judul">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Teknik Pemantauan Oleh Pemonev</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="bidang_penelitian">
                                            <option readonly>----</option>
                                            <option value="#">Tinjauan Lapangan</option>
                                            <option value="#">Laboratorium</option>
                                            <option value="#">Wawancara</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-md-2 col-form-label">Tanggal Pemantauan</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="proposal">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-md-2 col-form-label">Tanggal Pelaksanaan Penelitian</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="proposal">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-md-2 col-form-label">Tanggal Selesai Penelitian</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="proposal">
                                    </div>
                                </div>


                                <div class="form-group">
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
