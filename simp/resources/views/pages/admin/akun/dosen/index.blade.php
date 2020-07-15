@extends('templates.admin')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Data Tables</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Data Tables</li>
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

                    <h4 class="card-title">Data Dosen</h4>
                    <form action="{{ route('admin.dosen.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <input type="file" name="file"
                                       class="form-control {{$errors->has('file')?'is-invalid':''}}" accept=".csv">
                                @if( $errors->has('file'))
                                    <span class="invalid-feedback" role="alert">
                                        <p><b>{{$errors->first('file')}}</b></p>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-success">Import User Data</button>
                            </div>
                        </div>
                        <br>

                    </form>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Nama Dosen</th>
                            <th>Prodi</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{{$data->prodi}}</td>
                                <td>{{$data->email}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
