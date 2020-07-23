@extends('templates.user')

@section('content')
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Form Pengusulan HKI</h4>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{route('user.hki.store')}}" method="post" enctype="multipart/form-data">
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
                                    <label for="example-email-input" class="col-md-2 col-form-label">Alamat</label>
                                    <div class="col-md-10">
                                        <input class="form-control {{ $errors->has('alamat')?'is-invalid':'' }}"
                                               type="text" name="alamat" value="{{ old('alamat') }}">
                                        @if($errors->has('alamat'))
                                            <span class="invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('alamat') }}</b></p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Kewarganegaraan</label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="kewarganegaraan">
                                            <option>----</option>
                                            <option value="2019/2020">WNI</option>
                                            <option value="2018/2019">WNA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-md-2 col-form-label">Judul Cipta</label>
                                    <div class="col-md-10">
                                        <input class="form-control {{ $errors->has('judul_cipta')?'is-invalid':''}}"
                                               type="text" name="judul_cipta" value="{{old('judul_cipta')}}">
                                        @if ($errors->has('judul_cipta'))
                                            <span class="invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('judul_cipta')}}</b></p>
                                            </span>
                                        @endif
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
