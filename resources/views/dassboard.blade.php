@extends('layout.adminLayout')
@section('content')
    <h1>Selamat Datang</h1>

    {{-- <div class="card mb-3">
        <img src="{{ asset('img/hidroponik.jpeg') }}" class="card-img-top" alt="..." height="500">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div> --}}

      <div class="card mb-3" style="max-width: 100%;">
        <div class="row g-0">
          <div class="col-md-4 mt-5">
            <img src="{{ asset('img/hidroponik.jpeg') }}" class="img-fluid rounded-start" alt="Hidroponik">
          </div>
          <div class="col-md-8">
            <div class="card-body">
            <h5 class="card-title">Hidroponik</h5>
            <p class="card-text text-justify">Dalam bahasa Yunani, hidroponik berasal dari dua kata yaitu hydro dan ponos. Hydro artinya air sementara ponos memiliki makna daya atau kerja
            Metode hidroponik ini juga bisa diartikan sebagai budidaya tanaman tanpa menggunakan media tanah. Metode ini memanfaatkan air atau larutan mineral bernutrisi sebagai pengganti tanah.
            Tak hanya menggunakan air, di masa ini metode hidroponik sudah berkembang.
            Untuk mendapatkan unsur hara yang penting untuk pertumbuhan tanaman, digunakan pengganti seperti sabut kelapa, serbuk kayu,pasir, pecahan genteng, dan lain sebagainya.
            Berkebun atau bercocok tanam dengan menggunakan metode hidroponik terbukti lebih hemat dan juga bisa membuat tanaman lebih cepat panen serta memiliki kualitas yang tinggi.
            Parents pun tak perlu menyiram tanaman setiap hari karena air dan larutan mineral yang digunakan sudah tertampung di dalam wadah penanaman tumbuhan.</p>
            <p class="card-text">Manfaat dari berkebun secara hidroponik adalah sebagai berikut:</p>
            <ul>
                <li>Hemat Air</li>
                <li>Hemat tempat</li>
                <li>Tidak bergantung pada musim</li>
                <li>Efisien</li>
                <li>Mudah untuk mengendalikan pemberian nutrisi</li>
                <li>Tidak menghasilkan polusi nutrisi ke lingkungan</li>
                <li>Bebas gulma atau tanaman pengganggu</li>
            </ul>
            </div>
          </div>
        </div>
      </div>
@endsection
