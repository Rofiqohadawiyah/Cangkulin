<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cangkullin - @yield('title', 'Beranda')</title>
    <style>
        * { box-sizing: border-box; }

.logo-img {
    height: 45px;
    width: auto;
}

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f9f4;
            color: #1b5e20;
        }
.menu {
    margin-left: auto;
    display: flex;
    align-items: center;
}
        /* NAVBAR */
        .navbar {
            background:#2e7d32;
            padding:14px 40px;
            display:flex;
            gap:10px;
            /* justify-content:space-between; */
            align-items:center;
            position:sticky;
            top:0;
            z-index:10;
            box-shadow:0 2px 6px rgba(0,0,0,0.15);
        }
        .navbar .logo {
            font-size:22px;
            font-weight:bold;
            color:white;
        }
        .navbar .logo span {
            font-size:11px;
            display:block;
            opacity:.8;
        }
        .navbar .menu a {
            margin-left:18px;
            color:white;
            text-decoration:none;
            font-weight:bold;
            font-size:14px;
            transition:.2s;
        }
        .navbar .menu a:hover {
            color:#ffebc8;
        }

        /* HERO SLIDER */
        .hero {
            position: relative;
            height: 85vh;
            overflow: hidden;
        }

        .hero-slide {
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transform: scale(1.05);
            transition: opacity 1s ease, transform 10s linear;
        }

        .hero-slide.active {
            opacity: 1;
            transform: scale(1);
        }

        .hero-overlay-dark {
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.45);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
            max-width: 550px;
            padding: 30px;
            margin-left: 70px;
            margin-top: 120px;
        }

        .hero-content h1 {
            font-size: 46px;
            margin: 0 0 10px;
            line-height: 1.2;
        }

        .hero-content h1 span {
            color: #8dff9a;
        }

        .hero-content p {
            font-size: 15px;
            margin-top: 8px;
            max-width: 420px;
            opacity: 0.92;
        }

        .btn-hero {
            display: inline-block;
            background: #43a047;
            color: white;
            padding: 11px 22px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 18px;
            font-size: 14px;
            transition: .2s;
        }
        .btn-hero:hover {
            background: #2e7d32;
            transform: translateY(-2px);
        }

        /* SECTION WRAPPER */
        .section {
            padding:50px 40px;
            max-width:1100px;
            margin:0 auto;
        }
        .section h2 {
            margin:0;
            text-align:center;
            font-size:24px;
        }
        .section p.section-sub {
            margin-top:6px;
            text-align:center;
            font-size:13px;
            color:#607d8b;
        }

        /* FEATURES */
        .feature-grid {
            display:flex;
            flex-wrap:wrap;
            gap:18px;
            justify-content:center;
            margin-top:26px;
        }
        .feature-card {
            background:white;
            width:250px;
            padding:20px;
            border-radius:12px;
            box-shadow:0 3px 10px rgba(0,0,0,0.08);
            text-align:left;
        }
        .feature-card h3 {
            margin:6px 0 6px;
            font-size:16px;
        }
        .feature-card p {
            margin:0;
            font-size:13px;
            color:#607d8b;
        }

        /* ALAT */
        .alat-grid {
            display:flex;
            flex-wrap:wrap;
            gap:20px;
            justify-content:center;
            margin-top:26px;
        }
        .alat-card {
            background:white;
            width:250px;
            border-radius:12px;
            padding:14px;
            box-shadow:0 3px 10px rgba(0,0,0,0.08);
            text-align:left;
        }
        .alat-card img {
            width:100%;
            height:150px;
            object-fit:cover;
            border-radius:10px;
            margin-bottom:8px;
        }
        .alat-card h3 {
            margin:0 0 4px;
            font-size:16px;
        }
        .alat-card p {
            margin:0 0 8px;
            font-size:13px;
            color:#607d8b;
        }
        .badge {
            padding:4px 10px;
            border-radius:999px;
            font-size:11px;
            display:inline-block;
        }
        .badge-green { background:#c8e6c9; color:#1b5e20; }
        .badge-red { background:#ffcdd2; color:#b71c1c; }

        /* ANIMASI SCROLL */
        .fade-section {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .fade-section.visible {
            opacity: 1;
            transform: translateY(0);
        }

        footer {
            margin-top:40px;
            background:#263238;
            color:#eceff1;
            padding:18px 20px;
            text-align:center;
            font-size:12px;
        }

        @media (max-width:768px){
            .hero-content {
                margin-left: 20px;
                margin-top: 80px;
                padding: 20px;
            }
            .navbar {
                padding:12px 18px;
            }
            .navbar .menu a {
                margin-left:10px;
                font-size:13px;
            }
        }
    </style>
    @yield('head')
</head>
<body>

    {{-- NAVBAR PUBLIC --}}
    <div class="navbar">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo-img">
        <div class="logo">
            CANGKULIN
            <span>Sistem Informasi Peminjaman Alat Pertanian</span>
        </div>
        <div class="menu">
            <a href="{{ url('/') }}">Beranda</a>
            <a href="#alat">Alat</a>
            <a href="#tentang">Tentang</a>
            <a href="#galeri">Galeri</a>
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>

    @yield('content')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // SLIDER
            const slides = document.querySelectorAll('.hero-slide');
            let current = 0;

            if (slides.length > 0) {
                slides[0].classList.add('active');
                setInterval(() => {
                    slides[current].classList.remove('active');
                    current = (current + 1) % slides.length;
                    slides[current].classList.add('active');
                }, 6000);
            }

            // ANIMASI SCROLL
            const faders = document.querySelectorAll('.fade-section');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.15 });

            faders.forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>
