@extends('templates.user')

@section('content')
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Form Pengajuan Proposal Penelitian</h4>
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
                                    <label for="example-text-input" class="col-md-2 col-form-label">Nama</label>
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
                                    <label class="control-label col-md-2">Anggota</label>
                                    <div class="col-md-10">
                                        <select class="select2 form-control select2-multiple" multiple="multiple"
                                                data-placeholder="Choose ..." name="anggota[]">
                                            @foreach($datas as $data)
                                                <option value="{{$data->id}}">{{$data->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-md-2 col-form-label">Judul</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="judul">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-email-input" class="col-md-2 col-form-label">Nominal</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="number" name="nominal">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-email-input" class="col-md-2 col-form-label">Proposal</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="file" name="proposal" accept=".pdf">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Bidang Penelitian</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="bidang_penelitian">
                                            <option readonly>----</option>
                                            <option value="teknik">Teknik</option>
                                            <option value="akuntansi">Akuntansi</option>
                                            <option value="kesehatan">Kesehatan</option>
                                        </select>
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
