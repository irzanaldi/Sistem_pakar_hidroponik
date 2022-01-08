@extends('layout.indexLayout')

@section('content')

    <h1 class="cover-heading">Pilih Keluhan anda</h1>
    <div class="lead">
        <form action="" method="POST">
            @csrf
            <select class="form-select" aria-label="Default select example">
                <option selected value="">Pilih Tanaman</option>
                @foreach ($tanamen as $tanamen)
                    <option value="{{ $tanamen->id }}">{{ $tanamen->nama }}</option>
                @endforeach
            </select>
    </div>
    <p class="lead">
        <table class="table table-dark table-striped">
            <thead>
              <tr>
                @foreach ($bagians as $bagian)
                <th>{{ $bagian->nama }}</th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                <select class="form-select" aria-label="Default select example">
                    <option selected value="">Pilih Gejala Daun</option>
                    @foreach ($gejalaDaun as $daun)
                        <option value="{{ $daun->id }}">{{ $daun->name }}</option>
                    @endforeach
                </select>
                </td>
                <td>
                    <select class="form-select" aria-label="Default select example">
                        <option selected value="">Pilih Gejala Batang</option>
                        @foreach ($gejalaBatang as $batang)
                            <option value="{{ $batang->id }}">{{ $batang->name }}</option>
                        @endforeach
                    </select>
                    </td>
                    <td>
                        <select class="form-select" aria-label="Default select example">
                            <option selected value="">Pilih Gejala Akar</option>
                            @foreach ($gejalaAkar as $akar)
                                <option value="{{ $akar->id }}">{{ $akar->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-select" aria-label="Default select example">
                            <option selected value="">Pilih Gejala Proses Tumbuh</option>
                            @foreach ($gejalaProses as $proses)
                                <option value="{{ $proses->id }}">{{ $proses->name }}</option>
                            @endforeach
                        </select>
                    </td>
              </tr>
            </tbody>
          </table>
          <input class="btn btn-primary" type="submit" value="Submit">
        </form>
        <p class="lead"><span style="fw-bold"> Kesimpulan </span>: test bla bla bla bla bla bla</p>
      </p>
      {{-- <p class="lead">
        <a href="#" class="btn btn-lg btn-secondary">Learn more</a>
      </p> --}}
@endsection
