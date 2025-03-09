@extends('backend/layouts.template')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="icon_document_alt"></i> Riwayat Hidup</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i> <a href="{{ url('dashboard') }}">Home</a></li>
                        <li><i class="icon_document_alt"></i> Riwayat Hidup</li>
                        <li><i class="fa fa-files-o"></i> Pengalaman Kerja</li>
                    </ol>
                </div>
            </div>

            <!-- Form Tambah Pengalaman Kerja -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">Pengalaman Kerja</header>
                        <div class="panel-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            <a href="{{ route('pengalaman_kerja.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Tambah
                            </a>
                        </div>
                    </section>
                </div>
            </div>

            <!-- Data Tabel Pengalaman Kerja -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <div class="panel-body">
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                    <tr>
                                        <th><i class="icon_bag"></i> Nama</th>
                                        <th><i class="icon_document"></i> Jabatan</th>
                                        <th><i class="icon_calendar"></i> Tahun Masuk</th>
                                        <th><i class="icon_calendar"></i> Tahun Selesai</th>
                                        <th><i class="icon_cogs"></i> Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengalaman_kerja as $item)
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->jabatan }}</td>
                                            <td>{{ $item->tahun_masuk }}</td>
                                            <td>{{ $item->tahun_keluar ?? '-' }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <!-- Tombol Edit -->
                                                    <a href="{{ route('pengalaman_kerja.edit', $item->id) }}"
                                                        class="btn btn-warning" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <!-- Tombol Hapus -->
                                                    <form action="{{ route('pengalaman_kerja.destroy', $item->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                            title="Hapus">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
            <!-- Page End -->
        </section>
    </section>
@endsection
