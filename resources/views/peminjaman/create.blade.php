@extends('layout')

@section('content')

<style>
    body {
        background: linear-gradient(rgba(46, 125, 50, 0.25), rgba(46, 125, 50, 0.25)),
                    url('{{ asset('img/hero11.png') }}') center/cover fixed no-repeat;
        font-family: 'Poppins', sans-serif;
    }

    /* === WRAPPER === */
    .card-custom {
        background: #f1f8f4;
        padding: 32px;
        border-radius: 14px;
        box-shadow: 0 8px 28px rgba(0, 0, 0, 0.08);
        width: 92%;
        max-width: 900px;
        margin: 40px auto;
    }

    h2 {
        color: #1b5e20;
        font-weight: 800;
        margin-bottom: 20px;
        text-align: center;
    }

    /* === LABEL === */
    label {
        font-weight: 700;
        color: #4caf50; /* hijau muda elegan */
        font-size: 14px;
        display: block;
        margin-bottom: 6px;
    }

    /* === INPUT === */
    .input {
        width: 100%;
        padding: 10px 12px;
        border-radius: 8px;
        border: 1px solid #c8e6c9;
        background: white;
        outline: none;
        transition: 0.2s;
        font-size: 14px;
        color: #374151;
    }

    .input:focus {
        border-color: #43a047;
        box-shadow: 0 0 5px rgba(67, 160, 71, 0.3);
    }

    .form-section {
        margin-bottom: 18px;
    }

    /* === PILIH ALAT === */
    .alat-wrapper {
        margin-top: 28px;
    }

    .alat-title {
        font-weight: 700;
        color: #4caf50;
        font-size: 15px;
        margin-bottom: 10px;
        display: block;
    }

    /* === GRID CARD === */
    .grid-alat {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); /* pas 5 per baris */
        gap: 16px;
        justify-content: center;
    }

    /* === CARD ALAT === */
    .alat-card {
        background: #f8fff8;
        border: 1px solid #d6e8d6;
        padding: 8px;
        border-radius: 10px;
        text-align: center;
        cursor: pointer;
        transition: 0.25s;
        user-select: none;
        position: relative;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .alat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.08);
    }

    .alat-card.selected {
        border-color: #4caf50;
        background: #ecf8ed;
        box-shadow: 0 6px 14px rgba(46,125,50,0.12);
        transform: translateY(-4px);
    }

    /* === GAMBAR === */
    .alat-img {
        width: 100%;
        height: 120px;              /* proporsional, seragam */
        object-fit: contain;        /* biar ga kepotong */
        border-radius: 8px;
        background: #f9fff9;        /* hijau muda lembut */
        border: 1px solid #dceee0;  /* frame halus */
        padding: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 6px;
    }

    /* === TEKS DALAM CARD === */
    .alat-name {
        font-size: 13px;
        font-weight: 700;
        color: #1b5e20;
        margin: 4px 0 2px;
        text-align: center;
    }

    .alat-info {
        font-size: 12px;
        color: #4b5563;
        margin-bottom: 5px;
    }

    /* === BADGE STATUS === */
    .status {
        display: inline-block;
        padding: 3px 10px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 600;
        margin-bottom: 4px;
    }

    .status-green {
        background: #d6f5d6;
        color: #1b5e20;
    }

    .status-red {
        background: #ffdddd;
        color: #b71c1c;
    }

    /* === INPUT JUMLAH === */
    .jumlah-input {
        width: 80%;
        padding: 6px;
        border-radius: 6px;
        border: 1px solid #d0e6d0;
        text-align: center;
        font-size: 12px;
        margin-top: 6px;
        display: none;
    }

    /* === BUTTON === */
    .btn-save {
        background: linear-gradient(180deg, #2e7d32, #1b5e20);
        color: white;
        padding: 12px 14px;
        border-radius: 10px;
        border: none;
        font-weight: 700;
        width: 100%;
        transition: 0.2s;
        box-shadow: 0 6px 20px rgba(46, 125, 50, 0.2);
        margin-top: 25px;
    }

    .btn-save:hover {
        background: #256427;
        transform: translateY(-2px);
    }

    /* === RESPONSIVE === */
    @media (max-width: 992px) {
        .grid-alat {
            grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
        }
        .alat-img { height: 100px; }
    }

    @media (max-width: 576px) {
        .grid-alat {
            grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
        }
        .alat-img { height: 90px; }
    }
</style>

<div class="card-custom">
    <h2>Tambah Peminjaman</h2>

    @if ($errors->any())
        <div style="background:#fee2e2;padding:10px;border-radius:8px;margin-bottom:12px;color:#991b1b;">
            <ul style="margin:0;padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf

        {{-- FORM UTAMA --}}
        <div class="form-section">
            <label>Kelompok Tani</label>
            <select name="id_kelompoktani" class="input" required>
                <option value="">Pilih Kelompok Tani</option>
                @foreach($kelompok as $k)
                    <option value="{{ $k->id_kelompoktani }}">{{ $k->nama_kelompoktani }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-section" style="display:flex; gap:12px;">
            <div style="flex:1">
                <label>Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="input" required>
            </div>
            <div style="flex:1">
                <label>Tenggat Pengembalian</label>
                <input type="date" name="tenggat_pinjam" class="input" required>
            </div>
        </div>

        <div class="form-section">
            <label>Status Peminjaman</label>
            <select name="id_status" class="input" required>
                <option value="">Pilih Status</option>
                @foreach($status as $s)
                    <option value="{{ $s->id_status }}">{{ $s->deskripsi }}</option>
                @endforeach
            </select>
        </div>

        {{-- PILIH ALAT --}}
        <div class="alat-wrapper">
            <label class="alat-title">Pilih Alat Pertanian</label>
            <div class="grid-alat">
                @foreach($alat as $a)
                    <div class="alat-card" data-id="{{ $a->id_alat }}">
                        <img src="{{ asset('uploads/alat/'.$a->gambar_alat) }}" alt="{{ $a->nama_alat }}" class="alat-img">
                        <p class="alat-name">{{ $a->nama_alat }}</p>
                        <p class="alat-info">Jumlah tersedia: <strong>{{ $a->jumlah }}</strong></p>
                        @if($a->jumlah > 0)
                            <span class="status status-green">Tersedia</span>
                        @else
                            <span class="status status-red">Habis</span>
                        @endif

                        <input type="checkbox" name="id_alat[]" value="{{ $a->id_alat }}" class="alat-checkbox" style="display:none;">
                        <input type="number" min="1" name="jumlah[{{ $a->id_alat }}]" class="jumlah-input jumlah-{{ $a->id_alat }}" placeholder="Jumlah">
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn-save">💾 Simpan Peminjaman</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.alat-card');

    cards.forEach(card => {
        const id = card.getAttribute('data-id');
        const checkbox = card.querySelector('.alat-checkbox'); // 🔹 Ambil checkbox
        const jumlahInput = document.querySelector('.jumlah-' + id);

        card.addEventListener('click', function (e) {
            if (e.target.classList.contains('jumlah-input')) return;

            // 🔹 Toggle checkbox agar hanya alat yang diklik aktif
            checkbox.checked = !checkbox.checked;

            if (checkbox.checked) {
                card.classList.add('selected');
                jumlahInput.style.display = 'block';
                if (!jumlahInput.value) jumlahInput.value = 1;
            } else {
                card.classList.remove('selected');
                jumlahInput.style.display = 'none';
                jumlahInput.value = '';
            }
        });

        jumlahInput.addEventListener('click', function (ev) {
            ev.stopPropagation();
        });
    });
});
</script>


@endsection
