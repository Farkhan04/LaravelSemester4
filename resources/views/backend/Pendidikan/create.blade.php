@extends('backend.layouts.template')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">
                    <i class="icon_document_alt"></i> Riwayat Hidup
                </h3>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{ url('dashboard') }}">Home</a>
                    </li>
                    <li>
                        <i class="icon_document_alt"></i> Riwayat Hidup
                    </li>
                    <li>
                        <i class="fa fa-files-o"></i> Pendidikan
                    </li>
                </ol>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Pendidikan
                    </header>

                    <div class="panel-body">
                        <!-- Menampilkan error validasi -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Ada beberapa masalah dengan inputan Anda.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Form Input Pendidikan -->
                        <form class="form-validate form-horizontal" id="pendidikan_form" method="POST"
                            action="{{ route('pendidikan.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="nama" class="control-label col-lg-2">
                                    Nama Sekolah <span class="required">*</span>
                                </label>
                                <div class="col-lg-10">
                                    <input class="form-control" id="nama" name="nama" type="text"
                                        minlength="5" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tingkatan" class="control-label col-lg-2">
                                    Tingkatan <span class="required">*</span>
                                </label>
                                <div class="col-lg-10">
                                    <select class="form-control" name="tingkatan" id="tingkatan" required>
                                        <option value="1">TK</option>
                                        <option value="2">SD</option>
                                        <option value="3">SMP</option>
                                        <option value="4">SMA/SPK</option>
                                        <option value="5">D3</option>
                                        <option value="6">D4/S1</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tahun_masuk" class="control-label col-lg-2">
                                    Tahun Masuk <span class="required">*</span>
                                </label>
                                <div class="col-lg-10">
                                    <input id="tahun_masuk" name="tahun_masuk" class="form-control"
                                        type="text" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tahun_keluar" class="control-label col-lg-2">
                                    Tahun Selesai <span class="required">*</span>
                                </label>
                                <div class="col-lg-10">
                                    <input id="tahun_keluar" name="tahun_keluar" class="form-control"
                                        type="text" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <a href="{{ route('pendidikan.index') }}" class="btn btn-default">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
@endsection

@push('content-css')
<link href="{{ asset('backend/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
@endpush

@push('content-js')
<script src="{{ asset('backend/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript">
    $('#tahun_masuk').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    });

    $('#tahun_keluar').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    });
</script>
@endpush
