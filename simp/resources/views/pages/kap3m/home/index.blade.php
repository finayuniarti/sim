@extends('templates.kap3m')
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
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3> {{ $message }}
                </div>
            @endif
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Data Proposal</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Nominal</th>
                            <th>Nama</th>
                            <th>Jenis Proposal</th>
                            <th>Proposal</th>
                            <th>Penilaian</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$data->judul}}</td>
                                <td>{{$data->nominal}}</td>
                                <td>{{$data->user->name}}</td>
                                <td>{{$data->jenis_proposal}}</td>
                                <td>
                                    <a href="{{ route('kap3m.download',[ $data->proposal, $data->jenis_proposal]) }}">download</a>
                                </td>
                                <td>
                                    <a href="{{ route('kap3m.download.penilaian',[ $data->penilaian, $data->jenis_proposal]) }}">download</a>
                                </td>
                                <td>
                                    <a href="{{ route('kap3m.tolak', $data->id) }}" class="btn btn-danger btn-sm">tolak</a>
                                    <a href="{{ route('kap3m.terima', $data->id) }}" class="btn btn-success btn-sm">terima</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
