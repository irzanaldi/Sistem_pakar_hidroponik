@extends('layout.adminLayout')
@section('content')
  <!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Tanaman</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        @if(session('success'))
            <div class="alert alert-primary">
                {{session('success')}}
            </div>
            @endif
        <a href="" class="btn btn-primary float-end" data-toggle="modal" data-target="#tambah-modal">Tambah</a>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tanaman</th>
                    <th width="300px;">Action</th>
                </tr>
            </thead>
            <tbody>

            @if(!empty($tanaman) && $tanaman->count())
                @foreach($tanaman as $key => $value)
                    <tr>
                        <td>{{ $key + $tanaman->firstItem() }}</td>
                        <td>{{ $value->nama }}</td>
                        <td>
                            <a href="" class="btn btn-danger" data-toggle="modal" name="_method" value="DELETE"
                            data-target="#hapustanaman{{  $value->id }}">Delete</a>
                            <a href="" class="btn btn-warning" data-toggle="modal" data-target="#update-modal{{ $value->id }}">Update</a>
                        </td>
                    </tr>

{{-- Hapus Tanaman --}}
    <div class="modal fade" id="hapustanaman{{  $value->id }}" tabindex="-1" aria-labelledby="modalHapusBarang" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-body">
                        <h4 class="text-center">Apakah anda yakin menghapus tanaman ini? : <span>{{ $value->nama }}</span></h4>
                    </div>
            <div class="modal-footer">
                <form action="{{ route('tanaman.destroy', [$value->id] ) }}" method="post">
                    @csrf
                    @method('delete')
                <button type="submit" class="btn btn-primary">Hapus tanaman!</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak Jadi</button>
            </div>
        </div>
    </div>
</div>


{{-- Update Tanaman --}}
<div class="modal fade" id="update-modal{{ $value->id }}" tabindex="-1" aria-labelledby="modalTambahBarang" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Tanaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
    </div>
        <div class="modal-body">
                <!--FORM TAMBAH BARANG-->
        <form action="{{ route('update', [ $value->id ]) }}" method="post">
                    @csrf
                    {{-- {{ method_field('PUT') }} --}}
                    @method('put')
                <div class="form-group">
                    <label for="">Nama Tanaman</label>
                    <input type="text" class="form-control" value="{{ $value->nama }}" id="nama" name="nama" aria-describedby="emailHelp">
                </div>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
    <!--END FORM TAMBAH BARANG-->
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
    {!! $tanaman->links() !!}
</table>


    </div>
</div>

    {{-- Tambah Tanaman --}}
<div class="modal fade" id="tambah-modal" tabindex="-1" aria-labelledby="modalTambahBarang" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Tanaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
    </div>
        <div class="modal-body">
                <!--FORM TAMBAH BARANG-->
        <form action="{{ route('tanaman.store') }}" method="post">
            @csrf
                <div class="form-group">
                    <label for="">Nama Tanaman</label>
                    <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp" placeholder="Nama Tanaman">
                </div>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
    <!--END FORM TAMBAH BARANG-->
            </div>
        </div>
    </div>
</div>
@endsection


