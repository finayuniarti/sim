@extends('templates.reviewer')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Form Review</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Form Review</li>
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

                    <h4 class="card-title">Form Reviewer</h4>

                    <form action="{{route('reviewer.penelitian.revisi_proposal', $data->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Revisi</label>
                            <div class="col-md-10">
                                <input type="file" class="form-control" name="revisi_proposal" value="{{ old('revisi_proposal') }}">
                            </div>


                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Kesimpulan</label>
                            <div class="col-md-10">
                                <textarea required class="form-control" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <button class="btn btn-success" type="submit">Revisi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
