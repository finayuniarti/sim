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
                        <li class="breadcrumb-item active">Rekap Proposal</li>
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

                    <h4 class="card-title">Rekap Proposal</h4>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Id_user</th>
                            <th>Nama</th>
                            <th>Judul</th>
                            <th>Tahun</th>
                            <th>Proposal</th>
                            <th>Jenis Proposal</th>
                            <th>Nominal</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$data->id_user}}</td>
                                <td>{{$data->user->name}}</td>
                                <td>{{$data->judul}}</td>
                                <td>{{$data->tahun}}</td>
                                <td>{{$data->proposal}}</td>
                                <td>{{$data->jenis_proposal}}</td>
                                <td>{{$data->nominal}}</td>
                                <td>
                                    @if($data->terima == '2' && $data->terima == '')
                                        <span class="badge badge-info">terkirim ke dosen</span>
                                @endif

                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
