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
                    <li class="breadcrumb-item active">Rekap Proposal Penelitian</li>
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

                <h4 class="card-title">Rekap Proposal Penelitian</h4>
                <table id="datatable" class="table table-bordered owrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Judul</th>
                            <th>Tahun</th>
                            <th>Proposal</th>
                            <th>Nilai 1</th>
                            <th>Nilai 2</th>
                            <th>Biaya Diajukan</th>
                            <th>Rekomendasi 1</th>
                            <th>Rekomendasi 2</th>
                            <th>Pilih Reviewer</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                        <tr>
                            <td>{{$data->user->name}}</td>
                            <td>{{$data->judul}}</td>
                            <td>{{$data->tahun}}</td>
                            <td>
                                <a
                                    href="{{ route('admin.judul.download',[ $data->proposal, $data->jenis_proposal]) }}">download</a>
                            </td>
                            <td>
                                @if ($data->penilaian != null)
                                <a
                                    href="{{ route('reviewer.penelitian.penilaian.download', $data->penilaian) }}">{{$data->penilaian}}</a>
                                @else
                                belum dinilai
                                @endif
                            </td>
                            <td>
                                @if ($data->penilaian2 != null)
                                <a
                                    href="{{ route('reviewer.penelitian.penilaian.download', $data->penilaian2) }}">{{$data->penilaian2}}</a>
                                @else
                                belum dinilai
                                @endif
                            </td>
                            <td>Rp. {{number_format($data->nominal)}}</td>
                            <td>
                                @if ($data->nominal_rekomendasi1 != null)
                                Rp. {{number_format($data->nominal_rekomendasi1)}}
                                @else
                                belum dinilai
                                @endif
                            </td>
                            <td>
                                @if ($data->nominal_rekomendasi2 != null)
                                Rp. {{number_format($data->nominal_rekomendasi2)}}
                                @else
                                belum dinilai
                                @endif
                            </td>
                            <td>
                                <a href="" class="btn btn-success btn-sm" id="btn-choose-reviewer"
                                    data-id="{{ $data->id }}" data-toggle="modal"
                                    data-target="#reviewer{{ $data->id }}">Pilih reviewer</a>
                            </td>
                            <td>a</td>

                            <div class="modal fade" id="reviewer{{ $data->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Pilih Reviewer</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.judul.reviewer.choose') }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" id="id-p3m" name="id">
                                                    <select name="id_reviewer1" id="select-reviewer1"
                                                        class="form-control"></select>
                                                    <select name="id_reviewer2" id="select-reviewer2"
                                                        class="form-control"></select>
                                                </div>

                                                <div class="form-actions">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Pilih</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{--                                <td>--}}
                            {{--                                    @if($data->terima == '2' && $data->terima == '')--}}
                            {{--                                        <span class="badge badge-info">terkirim ke dosen</span>--}}
                            {{--                                @endif--}}

                        </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection


@section('script')
<script>
    const chooseReviewer = document.querySelectorAll('#btn-choose-reviewer');
        const selectReviewer = document.querySelectorAll('#select-reviewer1');
        const selectReviewer2 = document.querySelectorAll('#select-reviewer2');
        const idP3m = document.querySelectorAll('#id-p3m');
        const url = '{{ config('app.url') }}';
        chooseReviewer.forEach((cr, i) => {
            const id =cr.dataset.id;
            let op = ``;
            cr.addEventListener('click', async function () {
                const data = await getData(id);
                data.map(d => op += show(d));
                selectReviewer.forEach((rev, i) => {
                    idP3m[i].value = id;
                    selectReviewer[i].innerHTML = op;
                    selectReviewer2[i].innerHTML = op;
                })
            })
        });

        function getData(id) {
            return  fetch('judul/'+id+'/reviewer')
                .then(res => res.json())
                .then(res => res)
        }

        function show(d){return `<option value="${d.id}">${d.name}</option>`}

</script>
@endsection