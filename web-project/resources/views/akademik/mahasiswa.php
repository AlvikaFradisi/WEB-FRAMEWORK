<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Mahasiswa</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <ol>
        <li><?= $mhs1 ?></li>
        <li><?= $mhs2 ?></li>
        <li>Bill gates</li>
        <li>John Doe</li>
        <li>Linus Torvalds</li>
        <li>Charlie</li>
    </ol>
    <div>
        <p>Padang &copy; <?= date('Y'); ?></p>
        <img src="/images/pnp.png" alt="Logo Universitas" width="500px">
    </div>
</body>
</html>