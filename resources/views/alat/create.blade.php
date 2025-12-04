@extends('layout')

@section('content')

<style>
    body {
        background: linear-gradient(rgba(46, 125, 50, 0.25), rgba(46, 125, 50, 0.25)),
                    url('{{ asset('img/hero10.jpg') }}') center/cover fixed no-repeat;
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
    }

    .card-custom {
        background: #f1f8f4;
        padding: 32px;
        border-radius: 14px;
        box-shadow: 0 8px 28px rgba(0, 0, 0, 0.08);
        width: 92%;
        max-width: 700px;
        margin: 40px auto;
    }

    h2 {
        color: #1b5e20;
        font-weight: 800;
        margin-bottom: 12px;
        text-align: center;
    }

    p {
        color: #607d8b;
        font-size: 14px;
        margin-top: 0;
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        font-weight: 700;
        color: #4caf50;
        font-size: 14px;
        display: block;
        margin-bottom: 6px;
    }

    input[type="text"],
    input[type="number"] {
        width: 100%;
        padding: 10px 12px;
        border-radius: 8px;
        border: 1px solid #c8e6c9;
        background: white;
        outline: none;
        font-size: 14px;
        transition: 0.25s;
        margin-bottom: 14px;
    }

    input:focus {
        border-color: #43a047;
        box-shadow: 0 0 5px rgba(67,160,71,0.35);
    }

    input[type="file"] {
        width: 100%;
        border: none;
        background: none;
        font-size: 14px;
        color: #374151;
        cursor: pointer;
        margin-bottom: 10px;
        margin-left: 15px;
        margin-top: 8px;
    }

    input[type="file"]::-webkit-file-upload-button {
        background: #e0e0e0;
        color: #333;
        border: 1px solid #ccc;
        padding: 8px 14px;
        border-radius: 8px;
        font-weight: 500;
        transition: 0.2s;
    }

    input[type="file"]::-webkit-file-upload-button:hover {
        background: #d6d6d6;
    }

    .preview {
        text-align: center;
        margin-top: 10px;
    }

    .preview img {
        width: 180px;
        height: auto;
        border-radius: 10px;
        border: 1px solid #c8e6c9;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        margin-top: 6px;
    }

    .btn {
        display: inline-block;
        padding: 10px 16px;
        border-radius: 10px;
        font-weight: 700;
        text-decoration: none;
        font-size: 14px;
        cursor: pointer;
        text-align: center;
        transition: 0.25s;
        width: 48%;
    }

    .btn-green {
        background: #43a047;
        color: white;
        border: none;
    }

    .btn-green:hover {
        background: #2e7d32;
        transform: translateY(-1px);
    }

    .btn-red {
        background: #ef6c00;
        color: white;
        border: none;
    }

    .btn-red:hover {
        background: #d84315;
        transform: translateY(-1px);
    }

    .btn-row {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        margin-top: 20px;
    }

    .alert {
        background: #ffebee;
        color: #b71c1c;
        padding: 10px 14px;
        border-radius: 8px;
        margin-bottom: 14px;
        font-size: 13px;
        border: 1px solid #ffcdd2;
    }
</style>

<div class="card-custom">
    <h2>Tambah Alat Pertanian</h2>
    <p>Isi form berikut untuk menambahkan alat baru ke sistem.</p>

    @if($errors->any())
        <div class="alert">
            @foreach($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('alat.store') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <label>Nama Alat</label>
            <input type="text" name="nama_alat" value="{{ old('nama_alat') }}" required>
        </div>

        <div>
            <label>Jumlah</label>
            <input type="number" name="jumlah" value="{{ old('jumlah', 0) }}" min="0" required>
        </div>

        <div>
            <label>Foto Alat (wajib)</label>
            <input type="file" name="gambar_alat" accept="image/*" id="gambarInput" required>
            <div class="preview" id="previewContainer"></div>
        </div>

        <div class="btn-row">
            <button type="submit" class="btn btn-green">Simpan</button>
            <a href="{{ route('alat.index') }}" class="btn btn-red">Batal</a>
        </div>
    </form>
</div>

<script>
document.getElementById('gambarInput').addEventListener('change', function (event) {
    const previewContainer = document.getElementById('previewContainer');
    previewContainer.innerHTML = '';

    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            previewContainer.appendChild(img);
        }
        reader.readAsDataURL(file);
    }
});
</script>

@endsection
