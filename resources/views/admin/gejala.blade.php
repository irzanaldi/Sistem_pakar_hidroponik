
@extends('layout.adminLayout')
@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Gejala</h1>
{{-- @dump($gejala->unsur()) --}}
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        @if(session('success'))
            <div class="alert alert-primary">
                <b>Opps!</b> {{session('success')}}
            </div>
            @endif
        <a href="" class="btn btn-primary float-end" data-toggle="modal" data-target="#tambah-modal">Tambah</a>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bagian</th>
                    <th>Tumbuhan</th>
                    <th>Unsur</th>
                    <th>Nama Gejala</th>
                    <th width="300px;">Action</th>
                </tr>
            </thead>
            <tbody>

                @if(!empty($gejala) && $gejala->count())
                    @foreach($gejala as $key => $value)
                        <tr>
                            <td>{{ $key + $gejala->firstItem() }}</td>
                            <td>{{ $value->bagianTanamen->nama }}</td>
                            <td>{{ $value->tanamen->nama }}</td>
                            <td>{{ $value->unsur->nama }}</td>
                            <td>{{ $value->name }}</td>
                            {{-- <td>{{ $value->unsur->nama }}</td> --}}
                            <td>
                                <a href="" class="btn btn-danger" data-toggle="modal" name="_method" value="DELETE"
                                data-target="#hapustanaman{{  $value->id_gejala }}">Delete</a>
                                <a href="" class="btn btn-warning">Update</a>
                            </td>
                        </tr>

                        {{-- Hapus Tanaman --}}
    <div class="modal fade" id="hapustanaman{{  $value->id_gejala }}" tabindex="-1" aria-labelledby="modalHapusBarang" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                <h4 class="text-center">Apakah anda yakin menghapus tanaman ini? : <span>{{ $value->nama_gejala }}</span></h4>
            </div>
        <div class="modal-footer">
            <form action="{{ route('gejala.destroy', [$value->id] ) }}" method="post">
            @csrf
            @method('delete')
                <button type="submit" class="btn btn-primary">Hapus tanaman!</button>
            </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak Jadi</button>
        </div>
        </div>
    </div>
</div>


                    @endforeach
                @else
                    <tr>
                        <td colspan="10">There are no data.</td>
                    </tr>
                @endif
            </tbody>
            {!! $gejala->links() !!}
        </table>


    </div>
</div>

    {{-- Tambah Tanaman --}}
<div class="modal fade" id="tambah-modal" tabindex="-1" aria-labelledby="modalTambahBarang" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Gejala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
    <div class="modal-body">
                <!--FORM TAMBAH BARANG-->
        <form action="{{ route('gejala.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nama Gejala</label>
                <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp">
            <label for="">Nama Bagian</label>
            <select name="bagian" id="bagian" class="form-control" aria-label="Default select example">
                <option value="">Bagian Tanaman</option>
                @foreach ($bagians as $gejala)
                    <option value="{{ $gejala->id }}">{{ $gejala->nama }}</option>
                @endforeach
                </select>
            <label for="tumbuhan">Nama Tumbuhan</label>
                <select name="tumbuhan" id="tumbuhan" class="form-control">
                    <option value="">Pilih Tumbuhan</option>
                    @foreach ($tanamen as $gejala)
                    <option value="{{ $gejala->id }}">{{ $gejala->nama }}</option>
                    @endforeach
                </select>
            <label for="">Nama Unsur</label>
                <select name="unsur" id="unsur" class="form-control">
                    <option value="">Pilih Unsur Hara</option>
                    @foreach ($unsurs as $gejala)
                    <option value="{{ $gejala->id }}">{{ $gejala->nama }}</option>
                    @endforeach
                </select>
        </div>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
    <!--END FORM TAMBAH BARANG-->
            </div>
        </div>
        </div>
    </div>


@endsection
