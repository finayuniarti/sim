@extends('templates.admin')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Form Elements</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Form Elements</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Textual inputs</h4>

                    <form action="{{route('admin.reviewer.update', $data->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Nidn</label>
                            <div class="col-md-10">
                                <input class="form-control" readonly value="{{$data->nidn}}"
                                type="number" name="nidn">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Nama</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="nama" value="{{$data->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                                <input class="form-control" type="email" name="email" value="{{$data->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-md-2 col-form-label">Bidang Penelitian</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="bidang_penelitian" value="{{$data->bidang_penelitian}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
