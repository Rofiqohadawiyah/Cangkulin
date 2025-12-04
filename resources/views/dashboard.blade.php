@extends('layout')

@section('content')

<style>
    body {
        background: 
            linear-gradient(rgba(46, 125, 50, 0.25), rgba(46, 125, 50, 0.25)),
            url("{{ asset('img/hero1.jpg') }}") center/cover no-repeat fixed;
        background-attachment: fixed;
    }

    /* ========= HERO FULLSCREEN ========= */
    .hero-full {
        position: relative;
        width: 100vw;
        margin-left: calc(50% - 50vw);
        margin-right: calc(50% - 50vw);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        padding: 0 6%;                 /* <-- jarak kiri kanan 6% */
        box-sizing: border-box;
        overflow: hidden;
        background: url("{{ asset('img/hero-dashboard.png') }}") center/cover no-repeat;
    }

    .hero-full::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: -1px;
        width: 100%;
        height: 40%;
        background: url("{{ asset('img/wave-green.svg') }}") no-repeat bottom;
        background-size: cover;
        z-index: 1;
    }

    .hero-left {
        flex: 1;
        z-index: 2;
        max-width: 480px;
    }

    .hero-kicker {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
        color: #2e7d32;
        margin-bottom: 6px;
    }

    .hero-title {
        font-size: 40px;
        line-height: 1.1;
        font-weight: 800;
        color: #1b5e20;
        margin: 0 0 12px;
    }

    .hero-sub {
        font-size: 14px;
        color: #607d8b;
        max-width: 420px;
        margin: 0 0 18px;
    }

    .hero-btns {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 10px;
    }

    .btn-main {
        padding: 10px 18px;
        border-radius: 999px;
        background: #2e7d32;
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        border: none;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: 0.2s;
    }

    .btn-main:hover {
        background: #256427;
    }

    .btn-ghost {
        padding: 9px 16px;
        border-radius: 999px;
        border: 1px solid #2e7d32;
        color: #2e7d32;
        background: transparent;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: 0.2s;
    }

    .btn-ghost:hover {
        background: #e8f5e9;
    }

    .hero-meta {
        font-size: 12px;
        color: #78909c;
    }

    /* ========== STRIP ALAT FULLSCREEN ========= */
    .alat-strip-full {
        width: 100vw;
        margin-left: calc(50% - 50vw);
        margin-right: calc(50% - 50vw);
        background: #42a547;
        color: #ffffff;
        padding: 40px 6% 36px;     /* <-- match fitur Cangkulin */
        box-sizing: border-box;
    }

    .alat-strip-inner {
        max-width: 1300px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: minmax(0, 0.9fr) minmax(0, 2fr);
        gap: 24px;
        align-items: flex-start;
    }

    .alat-strip-heading {
        font-size: 26px;
        font-weight: 800;
        margin-bottom: 8px;
        letter-spacing: 0.2px;
    }

    .alat-strip-desc {
        font-size: 13px;
        line-height: 1.4;
        opacity: .9;
        max-width: 460px;
    }

    .alat-strip-scroll {
        display: flex;
        gap: 14px;
        overflow-x: auto;
        padding-bottom: 4px;
        scrollbar-width: none;
    }
    .alat-strip-scroll::-webkit-scrollbar { display: none; }

    .alat-card {
        min-width: 170px;
        background: #f5fdf5;
        border-radius: 16px;
        padding: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.12);
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .alat-card-thumb {
        width: 100%;
        height: 110px;
        border-radius: 12px;
        background: white;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .alat-card-thumb img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        background: #ffffff;
    }

    .alat-card-name {
        font-size: 13px;
        font-weight: 700;
        margin-top: 6px;
        text-align: center;
        color: #1b5e20;
    }

    .alat-card-stock {
        font-size: 11px;
        color: #546e7a;
        margin-top: 2px;
        text-align: center;
    }

    .alat-badge {
        font-size: 10px;
        padding: 4px 12px;
        margin: 6px auto 0;
        border-radius: 999px;
        font-weight: 600;
        display: block;
        text-align: center;
        width: fit-content;
    }

    .alat-badge--ok {
        background: #c8e6c9;
        color: #1b5e20;
    }
    .alat-badge--habis {
        background: #ffcdd2;
        color: #c62828;
    }

    /* ========== SUMMARY FULL ========= */
    .summary-full {
        width: 100vw;
        margin-left: calc(50% - 50vw);
        margin-right: calc(50% - 50vw);
        background: rgba(245, 253, 245, 0.20);
        padding: 28px 6% 24px;      /* <-- kiri kanan 6% */
        box-sizing: border-box;
    }

    .summary-inner {
        max-width: 1300px;
        margin: 0 auto;
    }

    .summary-section {
        margin-top: 0;
        margin-bottom: 28px;
    }

    .summary-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.2fr) minmax(0, 1.2fr);
        gap: 22px;
        align-items: center;
    }

    .summary-grid > div:first-child {
        margin-top: -18px;
    }

    .summary-title-kicker {
        font-size: 13px;
        color: #c8e6c9;
        font-weight: 600;
        margin-bottom: 4px;
    }

    .summary-title-main {
        font-size: 26px;
        font-weight: 800;
        color: #ffffff;
        margin-bottom: 8px;
    }

    .summary-text {
        font-size: 13px;
        color: #e8f5e9;
        margin-bottom: 14px;
        max-width: 420px;
    }

    .summary-mini-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 10px;
        max-width: 360px;
        margin-bottom: 10px;
    }

    .summary-mini-card {
        background: #ffffff;
        border-radius: 14px;
        padding: 10px 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.06);
    }

    .summary-mini-label {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #78909c;
        margin-bottom: 2px;
    }

    .summary-mini-value {
        font-size: 16px;
        font-weight: 700;
        color: #1b5e20;
    }

    .summary-mini-desc {
        font-size: 11px;
        color: #607d8b;
        margin-top: 2px;
    }

    .summary-contact {
        font-size: 12px;
        color: #dcedc8;
        font-weight: 600;
        margin-top: 26px;
    }

    .summary-hero {
        background: #ffffff;
        border-radius: 20px;
        padding: 16px 18px 18px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.08);
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .summary-hero-label {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #78909c;
        margin-bottom: 3px;
    }

    .summary-hero-title {
        font-size: 24px;
        font-weight: 700;
        color: #1b5e20;
        margin-bottom: 6px;
    }

    .summary-hero-text {
        font-size: 12px;
        color: #607d8b;
        margin-bottom: 10px;
    }

    .summary-hero-illustration {
        border-radius: 14px;
        overflow: hidden;
        background: #f1f8f4;
    }

    .summary-hero-illustration img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        display: block;
    }

    .summary-hero-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 8px;
    }

    .summary-hero-meta {
        font-size: 11px;
        color: #78909c;
    }

    .btn-outline-white {
        padding: 7px 14px;
        border-radius: 999px;
        border: 1px solid #2e7d32;
        background: #e8f5e9;
        color: #1b5e20;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: .2s;
    }

    /* ========== MODULE STRIP (FITUR CANGKULIN) ========= */
    .module-strip-full {
        width:100vw;
        margin-left:calc(50% - 50vw);
        margin-right:calc(50% - 50vw);
        background:#9bda9e;
        padding:40px 6% 36px;      /* <-- referensi jarak kiri kanan */
        box-sizing:border-box;
        position:relative;
        z-index:0;
    }

    .module-strip-full::before,
    .module-strip-full::after{
        content:"";
        position:absolute;
        left:0;
        width:100%;
        height:28px;
        z-index:-1;
        background:linear-gradient(to bottom, rgba(0,0,0,.05), rgba(0,0,0,0));
    }
    .module-strip-full::before{ top:0; }
    .module-strip-full::after{ bottom:0; transform:scaleY(-1); }

    .module-inner {
        max-width: 1300px;
        margin: 0 auto;
    }

    .module-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 14px;
    }

    .module-title {
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: #ffffff;
        margin-bottom: 4px;
    }

    .module-sub {
        font-size: 20px;
        font-weight: 800;
        color: #1b5e20;
    }

    .module-scroll {
        display: flex;
        gap: 16px;
        overflow-x: auto;
        padding-bottom: 6px;
        scrollbar-width: none;
    }
    .module-scroll::-webkit-scrollbar { display: none; }

    .module-card {
        min-width: 240px;
        background: #ffffff;
        border-radius: 18px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.07);
        padding: 14px 14px 12px;
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        text-decoration: none;
        color: inherit;
        transition: transform .15s ease, box-shadow .15s ease;
    }

    .module-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 26px rgba(0,0,0,0.12);
    }

    .module-chip {
        font-size: 11px;
        display: inline-block;
        padding: 3px 10px;
        border-radius: 999px;
        background: #e8f5e9;
        color: #2e7d32;
        font-weight: 600;
        margin-bottom: 6px;
    }

    .module-name {
        font-size: 15px;
        font-weight: 700;
        color: #1b5e20;
        margin-bottom: 4px;
    }

    .module-desc {
        font-size: 12px;
        color: #607d8b;
        line-height: 1.4;
        margin-bottom: 8px;
    }

    .module-footer {
        margin-top: auto;
        font-size: 11px;
        color: #9e9e9e;
    }

    /* ========== HIGHLIGHT GRID ========= */
    .highlight-full {
        width: 100vw;
        margin-left: calc(50% - 50vw);
        margin-right: calc(50% - 50vw);
        background: rgba(245, 253, 245, 0.90); 
        padding: 40px 6% 60px;       /* <-- kiri kanan 6% */
        box-sizing: border-box;
    }

    .highlight-inner {
        max-width: 1300px;
        margin: 0 auto;
    }

    .highlight-grid {
        display: grid;
        grid-template-columns: 1.1fr 1.6fr 1.1fr;
        grid-auto-rows: 180px;
        gap: 18px;
    }

    .highlight-img {
        width: 100%;
        height: 100%;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 10px 24px rgba(0,0,0,0.15);
    }

    .highlight-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .highlight-big {
        grid-column: 2 / 3;
        grid-row: 1 / span 2;
    }

    .highlight-tall {
        grid-column: 3 / 4;
        grid-row: 1 / span 2;
    }

    @media (max-width: 992px) {
        .highlight-grid {
            grid-template-columns: 1fr;
            grid-auto-rows: auto;
        }
        .highlight-big,
        .highlight-tall {
            grid-column: auto;
            grid-row: auto;
            height: 250px;
        }
    }

</style>

{{-- ===== HERO FULLSCREEN ===== --}}
<section class="hero-full">
    <div class="hero-left">
        <div class="hero-kicker">Cangkulin Admin Panel</div>
        <h1 class="hero-title">Kelola Alat Pertanian Setiap Hari dengan Lebih Teratur.</h1>
        <p class="hero-sub">
            Data stok, peminjaman, dan pengembalian alat terkumpul dalam satu tempat.
            Biar admin desa nggak pusing lagi cari-cari catatan di buku.
        </p>

        <div class="hero-btns">
            <a href="{{ route('alat.index') }}" class="btn-main">
                Kelola Alat Sekarang
            </a>
            <a href="{{ route('kelompok.index') }}" class="btn-ghost">
                Lihat Kelompok Tani
            </a>
        </div>

        <div class="hero-meta">
            Tip: pastikan semua alat sudah memiliki foto dan jumlah stok yang sesuai sebelum mulai mencatat peminjaman.
        </div>
    </div>
</section>

{{-- ===== STRIP ALAT FULLSCREEN ===== --}}
<section class="alat-strip-full">
    <div class="alat-strip-inner">
        <div>
            <h2 class="alat-strip-heading">Alat Pertanian Tersedia</h2>
            <p class="alat-strip-desc">
                Geser ke samping untuk melihat alat-alat yang terdaftar di sistem.
                Data nama, gambar, dan jumlah diambil langsung dari database.
            </p>
        </div>

        <div class="alat-strip-scroll">
            @forelse ($alat as $item)
                @php
                    $tersedia = $item->jumlah > 0;
                @endphp

                <div class="alat-card">
                    <div class="alat-card-thumb">
                        @if($item->gambar_alat)
                            <img src="{{ asset('uploads/alat/'.$item->gambar_alat) }}" alt="{{ $item->nama_alat }}">
                        @else
                            <img src="{{ asset('img/default-alat.jpg') }}" alt="Alat Pertanian">
                        @endif
                    </div>

                    <div class="alat-card-body">
                        <div class="alat-card-name">{{ $item->nama_alat }}</div>
                        <div class="alat-card-stock">
                            Jumlah tersedia: <span>{{ $item->jumlah }}</span>
                        </div>
                        <span class="alat-badge {{ $tersedia ? 'alat-badge--ok' : 'alat-badge--habis' }}">
                            {{ $tersedia ? 'Tersedia' : 'Habis' }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="alat-card">
                    <div class="alat-card-thumb">
                        <img src="{{ asset('img/default-alat.jpg') }}" alt="Alat Pertanian">
                    </div>
                    <div class="alat-card-body">
                        <div class="alat-card-name">Belum ada alat</div>
                        <div class="alat-card-stock">
                            Tambahkan data alat di menu <strong>Alat Pertanian</strong>.
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ===== SUMMARY SECTION ===== --}}
<section class="summary-full">
    <div class="summary-inner">
        <section class="summary-section">
            <div class="summary-grid">
                <div>
                    <div class="summary-title-kicker">Ringkasan Hari Ini</div>
                    <h2 class="summary-title-main">Pengelolaan alat lebih teratur</h2>
                    <p class="summary-text">
                        Cangkulin membantu kamu memantau stok alat, peminjaman, dan pengembalian
                        tanpa perlu membuka buku catatan lagi. Semua data tersimpan rapi di satu tempat.
                    </p>

                    <div class="summary-mini-grid">
                        <div class="summary-mini-card">
                            <div class="summary-mini-label">Alat tercatat</div>
                            <div class="summary-mini-value">{{ $alat->count() }}</div>
                            <div class="summary-mini-desc">Sudah tersimpan di sistem.</div>
                        </div>
                        <div class="summary-mini-card">
                            <div class="summary-mini-label">Kelompok tani</div>
                            <div class="summary-mini-value">5+</div>
                            <div class="summary-mini-desc">Siap meminjam dan mengembalikan alat.</div>
                        </div>
                        <div class="summary-mini-card">
                            <div class="summary-mini-label">Peminjaman</div>
                            <div class="summary-mini-value">{{ $jumlahSedangDipinjam }}</div>
                            <div class="summary-mini-desc">Sedang dipinjam oleh kelompok tani.</div>
                        </div>
                        <div class="summary-mini-card">
                            <div class="summary-mini-label">Riwayat alat</div>
                            <div class="summary-mini-value">Real-time</div>
                            <div class="summary-mini-desc">Data siap dicek kapan saja.</div>
                        </div>
                    </div>

                    <div class="summary-contact">
                        Mau uji coba alur peminjaman? Mulai dari mengatur stok alat dan kelompok tani dulu, ya.
                    </div>
                </div>

                <div class="summary-hero">
                    <div class="summary-hero-label">Dashboard Admin</div>
                    <div class="summary-hero-title">Pantau Cangkulin dari satu layar.</div>
                    <p class="summary-hero-text">
                        Admin bisa memeriksa daftar alat, memperbarui stok, dan melihat kelompok tani
                        tanpa berpindah halaman terlalu jauh.
                    </p>

                    <div class="summary-hero-illustration">
                        <img src="{{ asset('img/dashboard.jpg') }}" alt="Admin mengelola dashboard Cangkulin">
                    </div>

                    <div class="summary-hero-footer">
                        <div class="summary-hero-meta">Tips: cek stok alat minimal 1x seminggu.</div>
                        <a href="{{ route('alat.index') }}" class="btn-outline-white">
                            Buka halaman alat
                        </a>
                    </div>
                </div>

            </div>
        </section>
    </div>
</section>

{{-- ===== FITUR DI CANGKULIN ===== --}}
<section class="module-strip-full">
    <div class="module-inner">
        <div class="module-header">
            <div>
                <div class="module-title">Fitur di Cangkulin</div>
                <h2 class="module-sub">Apa saja yang bisa kamu kelola?</h2>
            </div>
        </div>

        <div class="module-scroll">
            {{-- Admin --}}
            <a href="{{ route('admin') }}" class="module-card">
                <span class="module-chip">Manajemen akun</span>
                <div class="module-name">Admin</div>
                <p class="module-desc">
                    Mengelola pengguna yang punya akses ke sistem, seperti menambah atau menghapus admin.
                </p>
                <div class="module-footer">Menu navbar: <strong>Admin</strong></div>
            </a>

            {{-- Kelompok Tani --}}
            <a href="{{ route('kelompok.index') }}" class="module-card">
                <span class="module-chip">Data peminjam</span>
                <div class="module-name">Kelompok Tani</div>
                <p class="module-desc">
                    Menyimpan informasi kelompok tani yang boleh meminjam alat, lengkap dengan kontaknya.
                </p>
                <div class="module-footer">Menu navbar: <strong>Kelompok Tani</strong></div>
            </a>

            {{-- Alat Pertanian --}}
            <a href="{{ route('alat.index') }}" class="module-card">
                <span class="module-chip">Stok alat</span>
                <div class="module-name">Alat Pertanian</div>
                <p class="module-desc">
                    Mengatur nama alat, foto, dan jumlah stok yang tersedia di gudang desa.
                </p>
                <div class="module-footer">Menu navbar: <strong>Alat Pertanian</strong></div>
            </a>

            {{-- Peminjaman --}}
            <a href="{{ route('peminjaman.index') }}" class="module-card">
                <span class="module-chip">Rencana fitur</span>
                <div class="module-name">Peminjaman</div>
                <p class="module-desc">
                    Nantinya dipakai untuk mencatat alat apa saja yang sedang dipinjam oleh kelompok tani.
                </p>
                <div class="module-footer">Menu navbar: <strong>Peminjaman</strong></div>
            </a>

            {{-- Pengembalian --}}
            <a href="{{ route('pengembalian.index') }}" class="module-card">
                <span class="module-chip">Rencana fitur</span>
                <div class="module-name">Pengembalian</div>
                <p class="module-desc">
                    Mencatat kapan alat dikembalikan, kondisi alat, dan siapa yang mengembalikannya.
                </p>
                <div class="module-footer">Menu navbar: <strong>Pengembalian</strong></div>
            </a>

            {{-- Laporan (belum ada route) --}}
            <a href="#" class="module-card">
                <span class="module-chip">Rekap data</span>
                <div class="module-name">Laporan</div>
                <p class="module-desc">
                    Menampilkan ringkasan stok, peminjaman, dan penggunaan alat dalam periode tertentu.
                </p>
                <div class="module-footer">Menu navbar: <strong>Laporan</strong></div>
            </a>

            {{-- Riwayat (belum ada route) --}}
            <a href="#" class="module-card">
                <span class="module-chip">Jejak aktivitas</span>
                <div class="module-name">Riwayat</div>
                <p class="module-desc">
                    Menyimpan catatan siapa meminjam apa dan kapan, sehingga mudah ditelusuri kembali.
                </p>
                <div class="module-footer">Menu navbar: <strong>Riwayat</strong></div>
            </a>
        </div>
    </div>
</section>

{{-- ===== HIGHLIGHT GAMBAR ===== --}}
<section class="highlight-full">
    <div class="highlight-inner">
        <div class="highlight-grid">

            <div class="highlight-img">
                <img src="{{ asset('img/galeri1.png') }}" alt="">
            </div>

            <div class="highlight-img highlight-big">
                <img src="{{ asset('img/galeri2.png') }}" alt="">
            </div>

            <div class="highlight-img">
                <img src="{{ asset('img/galeri3.png') }}" alt="">
            </div>

            <div class="highlight-img highlight-tall">
                <img src="{{ asset('img/galeri4.png') }}" alt="">
            </div>

        </div>
    </div>
</section>

@endsection
