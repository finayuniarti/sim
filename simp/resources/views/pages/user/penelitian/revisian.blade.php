@extends('templates.user')

@section('content')
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                            <h3 class="text-success"><i class="fa fa-check-circle"></i> Success</h3> {{ $message }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Nominal</th>
                                    <th>Proposal</th>
                                    <th>Revisi</th>
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
                                            <a href="{{ route('user.penelitian.download', $data->proposal) }}">{{$data->proposal}}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('user.penelitian.download', $data->revisi_proposal) }}">{{$data->revisi_proposal}}</a>
                                        </td>
                                        @if($data->revisi == '2')
                                            <td><span class="badge badge-danger">silahkan di revisi</span></td>
                                        @elseif($data->revisi == '1')
                                            <td><span class="badge badge-info">proposal sudah di upload</span></td>
                                        @else
                                            <td><span class="badge badge-success">proposal sudah di acc</span></td>
                                        @endif
                                        @if($data->revisi == '2')
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#upload{{$data->id}}"
                                                   class="btn btn-warning btn-sm">Upload Proposal Lagi</a>
                                            </td>
                                        @endif
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="upload{{$data->id}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="{{ route('user.penelitian.uploadProposalAgain', $data->id) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('patch')
                                                        <div class="form-group">
                                                            <label for="">Upload Proposal</label>
                                                            <input type="file" class="form-control" name="proposal">
                                                        </div>
                                                        <div class="form-actions mt-3 pull-right">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--endmodal--}}
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </section>
@endsection
