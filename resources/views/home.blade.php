@extends('layouts.front')

@section('title', 'Beranda')

@section('content')

    <section class="hero">

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

    <section class="section fade-section" id="galeri">
        <h2>Galeri Peminjaman</h2>
        <p class="section-sub">
            Dokumentasi singkat peminjaman dan penggunaan alat oleh kelompok tani.
        </p>

        <div style="display:flex; flex-wrap:wrap; gap:18px; margin-top:24px; justify-content:center;">
            <div style="width:260px; background:white; border-radius:12px; overflow:hidden; box-shadow:0 3px 10px rgba(0,0,0,.08);">
                <img src="/img/galeri1.png" style="width:100%; height:150px; object-fit:cover;" alt="Peminjaman alat">
                <div style="padding:10px 12px; font-size:13px; color:#455a64;">
                    Peminjaman alat oleh perwakilan kelompok tani sebelum masa tanam.
                </div>
            </div>

            <div style="width:260px; background:white; border-radius:12px; overflow:hidden; box-shadow:0 3px 10px rgba(0,0,0,.08);">
                <img src="/img/galeri2.png" style="width:100%; height:150px; object-fit:cover;" alt="Pengecekan alat">
                <div style="padding:10px 12px; font-size:13px; color:#455a64;">
                    Pengecekan kondisi alat oleh admin sebelum diserahkan ke peminjam.
                </div>
            </div>

            <div style="width:260px; background:white; border-radius:12px; overflow:hidden; box-shadow:0 3px 10px rgba(0,0,0,.08);">
                <img src="/img/galeri3.png" style="width:100%; height:150px; object-fit:cover;" alt="Penggunaan alat">
                <div style="padding:10px 12px; font-size:13px; color:#455a64;">
                    Penggunaan alat untuk kegiatan kerja bakti di lahan pertanian.
                </div>
            </div>

            <div style="width:260px; background:white; border-radius:12px; overflow:hidden; box-shadow:0 3px 10px rgba(0,0,0,.08);">
                <img src="/img/galeri4.png" style="width:100%; height:150px; object-fit:cover;" alt="Penggunaan alat">
                <div style="padding:10px 12px; font-size:13px; color:#455a64;">
                    Peminjaman alat oleh perwakilan kelompok tani sebelum masa tanam.
                </div>
            </div>

            <div style="width:260px; background:white; border-radius:12px; overflow:hidden; box-shadow:0 3px 10px rgba(0,0,0,.08);">
                <img src="/img/galeri5.png" style="width:100%; height:150px; object-fit:cover;" alt="Penggunaan alat">
                <div style="padding:10px 12px; font-size:13px; color:#455a64;">
                    Pengecekan kondisi alat oleh admin sebelum diserahkan ke peminjam.
                </div>
            </div>

            <div style="width:260px; background:white; border-radius:12px; overflow:hidden; box-shadow:0 3px 10px rgba(0,0,0,.08);">
                <img src="/img/galeri6.png" style="width:100%; height:150px; object-fit:cover;" alt="Penggunaan alat">
                <div style="padding:10px 12px; font-size:13px; color:#455a64;">
                    Penggunaan alat untuk kegiatan kerja bakti di lahan pertanian.
                </div>
            </div>

            <div style="width:260px; background:white; border-radius:12px; overflow:hidden; box-shadow:0 3px 10px rgba(0,0,0,.08);">
                <img src="/img/galeri7.png" style="width:100%; height:150px; object-fit:cover;" alt="Penggunaan alat">
                <div style="padding:10px 12px; font-size:13px; color:#455a64;">
                    Dokumentasi singkat kegiatan peminjaman dan penggunaan alat oleh kelompok tani.
                </div>
            </div>

            <div style="width:260px; background:white; border-radius:12px; overflow:hidden; box-shadow:0 3px 10px rgba(0,0,0,.08);">
                <img src="/img/galeri8.png" style="width:100%; height:150px; object-fit:cover;" alt="Penggunaan alat">
                <div style="padding:10px 12px; font-size:13px; color:#455a64;">
                    Dokumentasi singkat kegiatan peminjaman dan penggunaan alat oleh kelompok tani.
                </div>
            </div>

            <div style="width:260px; background:white; border-radius:12px; overflow:hidden; box-shadow:0 3px 10px rgba(0,0,0,.08);">
                <img src="/img/galeri9.png" style="width:100%; height:150px; object-fit:cover;" alt="Penggunaan alat">
                <div style="padding:10px 12px; font-size:13px; color:#455a64;">
                    Penggunaan salah satu mesin yang di pinjamkan kepada salah satu kelompok tani.
                </div>
            </div>
        </div>
    </section>

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

    <section class="section fade-section" id="alat">
        <h2>Daftar Alat Pertanian</h2>
        <p class="section-sub">Informasi ketersediaan alat diperbarui oleh admin.</p>

        <div class="alat-grid">
            @forelse($alat as $item)
                <div class="alat-card">

                    @if(!empty($item->gambar_alat))
                        <img src="{{ asset('uploads/alat/'.$item->gambar_alat) }}" alt="{{ $item->nama_alat }}">
                    @else
                        <img src="{{ asset('img/default-alat.jpg') }}" alt="Alat Pertanian">
                    @endif

                    <h3>{{ $item->nama_alat }}</h3>

                    <p>Jumlah tersedia: {{ $item->jumlah }}</p>

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
