@extends('templates.reviewer')
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

                <h4 class="card-title">Data Reviewer</h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Nominal</th>
                            <th>Proposal</th>
                            <th>Penilaian 1</th>
                            <th>Penilaian 2</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                        <tr>
                            <td>{{$data->judul}}</td>
                            <td>{{$data->nominal}}</td>
                            <td>
                                <a
                                    href="{{ route('reviewer.pengabdian.download', $data->proposal) }}">{{$data->proposal}}</a>
                            </td>
                            <td>
                                @if ($data->penilaian != null)
                                <a
                                    href="{{ route('reviewer.pengabdian.penilaian.download', $data->penilaian) }}">{{$data->penilaian}}</a>
                                @else
                                belum dinilai
                                @endif
                            </td>
                            <td>
                                @if ($data->penilaian2 != null)
                                <a
                                    href="{{ route('reviewer.pengabdian.penilaian.download', $data->penilaian2) }}">{{$data->penilaian2}}</a>
                                @else
                                belum dinilai
                                @endif
                            </td>

                            <td>
                                @if($data->status == '1' && $data->revisi == '2')
                                <span class="badge badge-info">terkirim ke dosen</span>
                                @elseif($data->status == '2' && $data->revisi == '0')
                                <span class="badge badge-success">terkirim ke ka. p3m</span>
                                @endif
                            </td>

                            <td>
                                @if($data->revisi == '1')
                                <a href="{{route('reviewer.pengabdian.get_revisi_proposal', $data->id)}}"
                                    class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i></a>

                                @endif
                                @if($data->revisi == '1' && $data->status == '1')
                                <a href="{{route('reviewer.pengabdian.acc_proposal', $data->id)}}"
                                    class="btn btn-warning btn-sm">Acc</a>
                                @endif
                                <a href="{{route('reviewer.pengabdian.nilai', $data->id)}}"
                                    class="btn btn-warning btn-sm">Nilai</a>
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