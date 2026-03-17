<!DOCTYPE html>
<html>
<head>
    <title>Latihan Blade</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Latihan Blade</h2>

    <!-- =======================
         MENU NAVIGASI
    ======================== -->
    <div class="mb-4 d-flex flex-wrap gap-2">
        <a href="/latihan/data" class="btn btn-primary">Menampilkan Data</a>
        <a href="/latihan/if" class="btn btn-success">IF ELSE</a>
        <a href="/latihan/switch" class="btn btn-warning">Switch Case</a>
        <a href="/latihan/for" class="btn btn-info">For</a>
        <a href="/latihan/while" class="btn btn-secondary">While</a>
        <a href="/latihan/foreach" class="btn btn-dark">Foreach</a>
        <a href="/latihan/forelse" class="btn btn-danger">Forelse</a>
        <a href="/latihan/loop-control" class="btn btn-outline-primary">Continue & Break</a>
    </div>


    <!-- =======================
         Materi: Menampilkan Data
    ======================== -->
    @isset($nama)
        <h4>Menampilkan Data</h4>
        <p>Nama: {{ $nama }}</p>
        <p>NIM: {{ $nim ?? '-' }}</p>
        <p>Jurusan: {{ $jurusan ?? '-' }}</p>
    @endisset


    <!-- =======================
         Materi: IF ELSE
    ======================== -->
    @isset($total_nilai)
        <h4>IF ELSE</h4>
        @if($total_nilai >= 56)
            <div class="alert alert-success">
                Selamat, anda lulus
            </div>
        @else
            <div class="alert alert-danger">
                Maaf, anda tidak lulus
            </div>
        @endif
    @endisset


    <!-- =======================
         Materi: SWITCH CASE
    ======================== -->
    @isset($nilai_huruf)
        <h4>Switch Case</h4>
        @switch($nilai_huruf)
            @case('A')
                <p>Nilai Sangat Baik</p>
                @break
            @case('B')
                <p>Nilai Baik</p>
                @break
            @case('C')
                <p>Nilai Cukup</p>
                @break
            @default
                <p>Nilai Kurang</p>
        @endswitch
    @endisset


    <!-- =======================
         Materi: PERULANGAN FOR
    ======================== -->
    <h4>Perulangan For</h4>
    @for($i = 1; $i <= 5; $i++)
        <p>Perulangan ke-{{ $i }}</p>
    @endfor


    <!-- =======================
         Materi: PERULANGAN WHILE
    ======================== -->
    <h4>Perulangan While</h4>
    @php $i = 1; @endphp
    @while($i <= 3)
        <p>While ke-{{ $i }}</p>
        @php $i++; @endphp
    @endwhile


    <!-- =======================
         Materi: FOREACH
    ======================== -->
    @isset($mahasiswa)
        <h4>Foreach</h4>
        <ul>
            @foreach($mahasiswa as $mhs)
                <li>{{ $mhs }}</li>
            @endforeach
        </ul>
    @endisset


    <!-- =======================
         Materi: FORELSE
    ======================== -->
    @isset($kosong)
        <h4>Forelse</h4>
        <ul>
            @forelse($kosong as $data)
                <li>{{ $data }}</li>
            @empty
                <li>Data kosong</li>
            @endforelse
        </ul>
    @endisset


    <!-- =======================
         Materi: CONTINUE & BREAK
    ======================== -->
    <h4>Continue & Break</h4>
    @for($i = 1; $i <= 10; $i++)

        @if($i == 3)
            @continue
        @endif

        @if($i == 8)
            @break
        @endif

        <p>Angka {{ $i }}</p>

    @endfor

</div>

</body>
</html>