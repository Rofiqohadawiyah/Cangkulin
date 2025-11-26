@extends('layouts.front')

@section('title', 'Beranda')

@section('content')

    {{-- HERO SLIDER (SATU-SATUNYA HERO) --}}
    <section class="hero">

        {{-- slide background, pastikan file gambarnya ada di public/img --}}
        <div class="hero-slide" style="background-image:url('/img/hero1.jpg')"></div>
        <div class="hero-slide" style="background-image:url('/img/hero2.jpg')"></div>
        <div class="hero-slide" style="background-image:url('/img/hero3.jpg')"></div>

        <div class="hero-overlay-dark"></div>

        <div class="hero-content">
            <h1>Selamat Datang di <span>Cangkullin</span></h1>
            <p>
                Cek ketersediaan alat pertanian dari mana saja.
                Pencatatan peminjaman & pengembalian dikelola oleh admin.
            </p>
            <a href="#alat" class="btn-hero">Lihat Daftar Alat</a>
        </div>

    </section>

    {{-- FITUR --}}
    <section class="section fade-section">
        <h2>Kenapa Menggunakan Cangkullin?</h2>
        <p class="section-sub">
            Sistem dibuat untuk membantu kelompok tani dan admin dalam mengatur peminjaman alat.
        </p>

        <div class="feature-grid">
            <div class="feature-card">
                <h3>Cek Alat dari Rumah</h3>
                <p>User dapat melihat alat apa saja yang masih tersedia tanpa harus datang ke gudang.</p>
            </div>

            <div class="feature-card">
                <h3>Pencatatan Rapi</h3>
                <p>Admin mencatat peminjaman dan pengembalian sehingga riwayat penggunaan selalu jelas.</p>
            </div>

            <div class="feature-card">
                <h3>Mengurangi Bentrok</h3>
                <p>Petani dapat menyesuaikan jadwal peminjaman karena tahu alat mana yang sedang dipakai.</p>
            </div>
        </div>
    </section>

    {{-- DAFTAR ALAT --}}
    <section class="section fade-section" id="alat">
        <h2>Daftar Alat Pertanian</h2>
        <p class="section-sub">Informasi ketersediaan alat diperbarui oleh admin.</p>

        <div class="alat-grid">
            @forelse($alat as $item)
                <div class="alat-card">
                    {{-- GAMBAR --}}
                    @if(!empty($item->gambar_alat))
                        <img src="{{ asset('uploads/alat/'.$item->gambar_alat) }}" alt="{{ $item->nama_alat }}">
                    @else
                        <img src="{{ asset('img/default-alat.jpg') }}" alt="Alat Pertanian">
                    @endif

                    {{-- NAMA --}}
                    <h3>{{ $item->nama_alat }}</h3>

                    {{-- JUMLAH --}}
                    <p>Jumlah tersedia: {{ $item->jumlah }}</p>

                    {{-- STATUS --}}
                    <span class="badge {{ $item->jumlah > 0 ? 'badge-green' : 'badge-red' }}">
                        {{ $item->jumlah > 0 ? 'Tersedia' : 'Habis' }}
                    </span>
                </div>
            @empty
                <p style="text-align:center; width:100%; margin-top:20px; color:#607d8b;">
                    Belum ada data alat yang ditambahkan.
                </p>
            @endforelse
        </div>
    </section>

    <footer>
        &copy; {{ date('Y') }} Cangkullin · Sistem Informasi Peminjaman Alat Pertanian
    </footer>
@endsection
