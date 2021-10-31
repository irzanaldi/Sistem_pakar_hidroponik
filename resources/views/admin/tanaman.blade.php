@extends('layout.adminLayout')
@section('content')
  <!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Tanaman</h6>
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
                    <th>Nama Tanaman</th>
                    <th width="300px;">Action</th>
                </tr>
            </thead>
            <tbody>
                
                @if(!empty($tanaman) && $tanaman->count())
                    @foreach($tanaman as $key => $value)
                        <tr>
                            <td>{{ $key + $tanaman->firstItem() }}</td>
                            <td>{{ $value->nama_tanaman }}</td>
                            <td>
                                <a href="" class="btn btn-danger" data-toggle="modal" name="_method" value="DELETE" 
                                data-target="#hapustanaman{{  $value->id_tanaman }}">Delete</a>
                                <a href="" class="btn btn-warning">Update</a>
                            </td>
                        </tr>

                        {{-- Hapus Tanaman --}}
    <div class="modal fade" id="hapustanaman{{  $value->id_tanaman }}" tabindex="-1" aria-labelledby="modalHapusBarang" aria-hidden="true">
        <div class="modal-dialog">
             <div class="modal-content">
                <div class="modal-body">
                     <h4 class="text-center">Apakah anda yakin menghapus tanaman ini? : <span>{{ $value->nama_tanaman }}</span></h4>
                </div>
             <div class="modal-footer">
               <form action="{{ route('tanaman.destroy', [$value->id_tanaman] ) }}" method="post">
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
            {!! $tanaman->links() !!}
        </table>
        
        
    </div>
</div> 

    {{-- Tambah Tanaman --}}
<div class="modal fade" id="tambah-modal" tabindex="-1" aria-labelledby="modalTambahBarang" aria-hidden="true">
    <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                  <h5 class="modal-title">Tambah Barang</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
    </div>
         <div class="modal-body">
                <!--FORM TAMBAH BARANG-->
         <form action="{{ route('tanaman.store') }}" method="post">
            @csrf
            <div class="form-group">
                 <label for="">Nama Barang</label>
                 <input type="text" class="form-control" id="nama_tanaman" name="nama_tanaman" aria-describedby="emailHelp">
            </div>
          <button type="submit" class="btn btn-primary">Simpan Data</button>
         </form>
    <!--END FORM TAMBAH BARANG-->
              </div>
            </div>
          </div>
    </div>

    
@endsection  