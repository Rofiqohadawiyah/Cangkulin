@extends('layout')

@section('content')

<style>
    body {
        margin: 0;
        padding: 0;
        background:
            linear-gradient(rgba(46, 125, 50, 0.25), rgba(46, 125, 50, 0.25)),
            url('{{ asset('img/hero10.jpg') }}') center/cover no-repeat fixed;
        font-family: 'Poppins', sans-serif;
    }

    .laporan-bg {
        max-width: 1200px;
        margin: 40px auto;
        background: #f1f8f4;
        border-radius: 12px;
        padding: 28px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

    .header-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
    }

    .laporan-title {
        font-size: 24px;
        font-weight: 800;
        color: #1b5e20;
        margin: 0;
    }

    .laporan-subtitle {
        font-size: 14px;
        color: #607d8b;
        margin-top: 4px;
    }

    .filter-box {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        align-items: center;
    }

    .filter-box input {
        border: 1px solid #a5d6a7;
        border-radius: 8px;
        padding: 8px 12px;
        font-size: 14px;
        outline: none;
        background: #fff;
        min-width: 170px;
        transition: 0.2s;
    }

    .filter-box input:focus {
        border-color: #43a047;
        box-shadow: 0 0 4px rgba(67, 160, 71, 0.3);
    }

    .filter-box button {
        background: #2e7d32;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 8px 16px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
    }

    .filter-box button:hover {
        background: #256427;
    }

    .filter-separator {
        font-size: 13px;
        color: #607d8b;
    }

    .chart-card {
        background: #ffffff;
        border-radius: 10px;
        padding: 18px 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        margin-top: 10px;
    }

    .chart-title {
        font-size: 18px;
        font-weight: 700;
        color: #1b5e20;
        margin-bottom: 14px;
    }

    #chart-container {
        width: 100%;
        overflow-x: auto;
        padding-bottom: 10px;
    }

    #chartPinjam {
        min-width: 1000px;
        height: 380px;
    }

    @media (max-width: 992px) {
        .laporan-bg {
            margin: 20px;
            padding: 20px;
        }

        .header-row {
            flex-direction: column;
            align-items: flex-start;
        }

        .filter-box input,
        .filter-box button {
            width: 100%;
        }
    }
</style>

<div class="laporan-bg">
    <div class="header-row">
        <div>
            <h2 class="laporan-title">Laporan Peminjaman</h2>
            <p class="laporan-subtitle">Ringkasan peminjaman alat berdasarkan rentang tanggal.</p>
        </div>

        <form method="GET" action="{{ route('laporan.index') }}" class="filter-box">
            <input type="date" name="start" value="{{ $start }}">
            <span class="filter-separator">s/d</span>
            <input type="date" name="end" value="{{ $end }}">
            <button type="submit">Filter</button>
        </form>
    </div>

    <div class="chart-card">
        <h4 class="chart-title">Grafik Alat yang Paling Banyak Dipinjam</h4>

        <div id="chart-container">
            <canvas id="chartPinjam"></canvas>
        </div>
    </div>

</div>

{{-- CHART.JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const rawLabels = @json($labels);

    const wrappedLabels = rawLabels.map(label => {
        const words = label.split(" ");

        if (words.length === 1) {
            return [label];
        }

        return [
            words[0],
            words.slice(1).join(" ")
        ];
    });

    const ctx = document.getElementById('chartPinjam').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: wrappedLabels, 
            datasets: [{
                label: 'Jumlah Dipinjam',
                data: @json($values),
                backgroundColor: 'rgba(46, 125, 50, 0.5)',
                borderColor: 'rgba(46, 125, 50, 1)',
                borderWidth: 1,

                barPercentage: 0.8,
                categoryPercentage: 0.8,
            }]
        },
        options: {
            responsive: false,
            scales: {
                x: {
                    ticks: {
                        maxRotation: 0,
                        minRotation: 0,
                        autoSkip: false,
                        font: { size: 11 }
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        font: { size: 13 }
                    }
                }
            },
            plugins: {
                legend: {
                    labels: { font: { size: 13 } }
                }
            }
        }
    });
</script>

@endsection
