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

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Pendidikan
                    </header>

                    <div class="panel-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif

                        <a href="{{ route('pendidikan.create') }}">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-plus"></i> Tambah
                            </button>
                        </a>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tingkatan</th>
                                    <th>Tahun Masuk</th>
                                    <th>Tahun Keluar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendidikan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->tingkatan }}</td>
                                        <td>{{ $item->tahun_masuk }}</td>
                                        <td>{{ $item->tahun_keluar ?? '-' }}</td>
                                        <td>
                                            <form action="{{ route('pendidikan.destroy', $item->id) }}" method="POST">
                                                <a class="btn btn-warning" href="{{ route('pendidikan.edit', $item->id) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
@endsection
