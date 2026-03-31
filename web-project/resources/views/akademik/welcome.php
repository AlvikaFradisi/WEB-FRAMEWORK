<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Student</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --ink: #0d0d0d;
            --cream: #f5f0e8;
            --gold: #c9a84c;
            --gold-light: #e8c96a;
            --rust: #c0392b;
            --sage: #4a7c59;
            --muted: #7a7167;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--cream);
            color: var(--ink);
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* === NOISE TEXTURE OVERLAY === */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 999;
            opacity: 0.4;
        }

        /* === DECORATIVE LINES === */
        .deco-line {
            position: fixed;
            background: var(--gold);
            opacity: 0.15;
        }
        .deco-line.vertical {
            width: 1px;
            height: 100vh;
            top: 0;
        }
        .deco-line.v1 { left: 8%; }
        .deco-line.v2 { right: 8%; }
        .deco-line.horizontal {
            height: 1px;
            width: 100vw;
            left: 0;
        }
        .deco-line.h1 { top: 12%; }
        .deco-line.h2 { bottom: 12%; }

        /* === CORNER ORNAMENTS === */
        .corner {
            position: fixed;
            width: 60px;
            height: 60px;
            z-index: 10;
        }
        .corner::before,
        .corner::after {
            content: '';
            position: absolute;
            background: var(--gold);
            opacity: 0.6;
        }
        .corner::before { width: 100%; height: 2px; }
        .corner::after  { width: 2px; height: 100%; }

        .corner.tl { top: 24px; left: 24px; }
        .corner.tr { top: 24px; right: 24px; transform: rotate(90deg); }
        .corner.bl { bottom: 24px; left: 24px; transform: rotate(-90deg); }
        .corner.br { bottom: 24px; right: 24px; transform: rotate(180deg); }

        /* === MAIN LAYOUT === */
        .wrapper {
            min-height: 100vh;
            display: grid;
            grid-template-rows: auto 1fr auto;
            padding: 0 10%;
        }

        /* === HEADER === */
        header {
            padding: 2.5rem 0 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(201,168,76,0.3);
            animation: fadeDown 0.8s ease both;
        }

        .logo-text {
            font-family: 'Playfair Display', serif;
            font-size: 0.9rem;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            color: var(--muted);
        }

        .badge {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.75rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--sage);
            font-weight: 500;
        }

        .badge-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--sage);
            animation: pulse 2s infinite;
        }

        /* === HERO SECTION === */
        .hero {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 4rem 0;
            position: relative;
        }

        .eyebrow {
            font-size: 0.75rem;
            letter-spacing: 0.35em;
            text-transform: uppercase;
            color: var(--gold);
            font-weight: 500;
            margin-bottom: 1.5rem;
            animation: fadeUp 0.7s 0.2s ease both;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3.5rem, 8vw, 7.5rem);
            font-weight: 900;
            line-height: 1.0;
            letter-spacing: -0.02em;
            color: var(--ink);
            animation: fadeUp 0.8s 0.35s ease both;
        }

        .hero-title .accent {
            color: var(--gold);
            font-style: italic;
        }

        .hero-title .outlined {
            -webkit-text-stroke: 2px var(--ink);
            color: transparent;
        }

        .hero-subtitle {
            margin-top: 2rem;
            max-width: 480px;
            font-size: 1.05rem;
            line-height: 1.7;
            color: var(--muted);
            font-weight: 300;
            animation: fadeUp 0.8s 0.5s ease both;
        }

        /* === INFO CARD GRID === */
        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1px;
            background: rgba(201,168,76,0.2);
            border: 1px solid rgba(201,168,76,0.2);
            margin-top: 3.5rem;
            animation: fadeUp 0.8s 0.65s ease both;
        }

        .card {
            background: var(--cream);
            padding: 1.8rem 1.5rem;
            transition: background 0.3s ease;
            cursor: default;
        }

        .card:hover {
            background: var(--ink);
        }

        .card:hover .card-label,
        .card:hover .card-value {
            color: var(--cream);
        }

        .card:hover .card-num {
            color: var(--gold);
        }

        .card-num {
            font-family: 'Playfair Display', serif;
            font-size: 0.7rem;
            color: var(--gold);
            letter-spacing: 0.3em;
            margin-bottom: 0.8rem;
        }

        .card-label {
            font-size: 0.72rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 0.4rem;
            transition: color 0.3s;
        }

        .card-value {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--ink);
            transition: color 0.3s;
        }

        /* === CTA BUTTON === */
        .cta-row {
            display: flex;
            align-items: center;
            gap: 2rem;
            margin-top: 3rem;
            animation: fadeUp 0.8s 0.8s ease both;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            background: var(--ink);
            color: var(--cream);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.8rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            font-weight: 500;
            padding: 1.1rem 2.2rem;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::after {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--gold);
            transform: translateX(-101%);
            transition: transform 0.4s cubic-bezier(0.77, 0, 0.18, 1);
        }

        .btn-primary:hover::after {
            transform: translateX(0);
        }

        .btn-primary span {
            position: relative;
            z-index: 1;
        }

        .btn-primary:hover {
            color: var(--ink);
        }

        .btn-arrow {
            position: relative;
            z-index: 1;
            font-size: 1rem;
            transition: transform 0.3s ease;
        }

        .btn-primary:hover .btn-arrow {
            transform: translateX(4px);
        }

        .link-alt {
            font-size: 0.8rem;
            letter-spacing: 0.1em;
            color: var(--muted);
            text-decoration: none;
            border-bottom: 1px solid transparent;
            transition: border-color 0.3s, color 0.3s;
        }

        .link-alt:hover {
            color: var(--ink);
            border-color: var(--ink);
        }

        /* === FOOTER === */
        footer {
            padding: 1.5rem 0 2rem;
            border-top: 1px solid rgba(201,168,76,0.3);
            display: flex;
            justify-content: space-between;
            align-items: center;
            animation: fadeUp 0.8s 1s ease both;
        }

        .footer-copy {
            font-size: 0.72rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--muted);
        }

        .footer-year {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: rgba(201,168,76,0.2);
            letter-spacing: -0.03em;
        }

        /* === FLOATING ORNAMENT === */
        .float-ornament {
            position: absolute;
            right: -5%;
            top: 50%;
            transform: translateY(-50%);
            font-family: 'Playfair Display', serif;
            font-size: 22vw;
            font-weight: 900;
            color: transparent;
            -webkit-text-stroke: 1px rgba(201,168,76,0.1);
            line-height: 1;
            user-select: none;
            pointer-events: none;
            animation: floatY 8s ease-in-out infinite;
        }

        /* === PHP DATE BADGE === */
        .date-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            background: rgba(201,168,76,0.12);
            border: 1px solid rgba(201,168,76,0.3);
            padding: 0.5rem 1rem;
            font-size: 0.72rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 2rem;
            animation: fadeUp 0.7s 0.1s ease both;
        }

        /* === ANIMATIONS === */
        @keyframes fadeDown {
            from { opacity: 0; transform: translateY(-20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50%       { opacity: 0.5; transform: scale(0.7); }
        }

        @keyframes floatY {
            0%, 100% { transform: translateY(-50%) translateX(0); }
            50%       { transform: translateY(-52%) translateX(-10px); }
        }

        /* === RESPONSIVE === */
        @media (max-width: 768px) {
            .wrapper { padding: 0 6%; }
            .cards { grid-template-columns: 1fr; }
            .float-ornament { display: none; }
            .deco-line.v1, .deco-line.v2 { display: none; }
        }
    </style>
</head>
<body>

<?php
    /* ── PHP Dynamic Data ── */
    $student_name  = "Haifa Hafitriyanti";
    $nim           = "2401093006";
    $prodi         = "Teknik Informatika";
    $angkatan      = "2024";
    $semester      = "Semester VI";
    $status        = "Aktif";

    $hour    = (int) date('H');
    $greeting = $hour < 11 ? "Selamat Pagi" : ($hour < 15 ? "Selamat Siang" : ($hour < 18 ? "Selamat Sore" : "Selamat Malam"));
    $today   = date('l, d F Y');
    $time    = date('H:i');
?>

<!-- Decorative Lines -->
<div class="deco-line vertical v1"></div>
<div class="deco-line vertical v2"></div>
<div class="deco-line horizontal h1"></div>
<div class="deco-line horizontal h2"></div>

<!-- Corner Ornaments -->
<div class="corner tl"></div>
<div class="corner tr"></div>
<div class="corner bl"></div>
<div class="corner br"></div>

<div class="wrapper">

    <!-- HEADER -->
    <header>
        <div class="logo-text">Universitas &mdash; Portal Mahasiswa</div>
        <div class="badge">
            <span class="badge-dot"></span>
            <span><?= $status ?></span>
        </div>
    </header>

    <!-- HERO -->
    <main class="hero">

        <!-- Floating large letter -->
        <div class="float-ornament">S</div>

        <div class="date-badge">
            &#9679;&nbsp; <?= $today ?> &nbsp;&#x2014;&nbsp; <?= $time ?> WIB
        </div>

        <p class="eyebrow"><?= $greeting ?>, Mahasiswa</p>

        <h1 class="hero-title">
            Welcome,<br>
            <span class="accent"><?= explode(' ', $student_name)[0] ?></span>
            <span class="outlined"><?= explode(' ', $student_name)[1] ?? '' ?></span>
        </h1>

        <p class="hero-subtitle">
            Anda telah berhasil masuk ke portal akademik. Semangat belajar dan terus
            berprestasi di program studi <strong><?= $prodi ?></strong>. Masa depan cerah
            menantimu!
        </p>

        <!-- Info Cards -->
        <div class="cards">
            <div class="card">
                <div class="card-num">01</div>
                <div class="card-label">NIM</div>
                <div class="card-value"><?= $nim ?></div>
            </div>
            <div class="card">
                <div class="card-num">02</div>
                <div class="card-label">Program Studi</div>
                <div class="card-value"><?= $prodi ?></div>
            </div>
            <div class="card">
                <div class="card-num">03</div>
                <div class="card-label">Angkatan / Semester</div>
                <div class="card-value"><?= $angkatan ?> &mdash; <?= $semester ?></div>
            </div>
        </div>

        <!-- CTA -->
        <div class="cta-row">
            <a href="/dashboard" class="btn-primary">
                <span>Masuk Dashboard</span>
                <span class="btn-arrow">&#x2192;</span>
            </a>
            <a href="/logout" class="link-alt">Keluar &rarr;</a>
        </div>

    </main>

    <!-- FOOTER -->
    <footer>
        <span class="footer-copy">&copy; <?= date('Y') ?> Portal Akademik &mdash; All Rights Reserved</span>
        <span class="footer-year"><?= date('Y') ?></span>
    </footer>

</div>

</body>
</html>