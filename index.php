<?php

require_once "products.php";
require_once "functions.php";

$totalNilaiStok = hitungTotalNilaiStok($products);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Product Information System</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e8e0f7, #f8f5fc);
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 50px auto;
        }

        .header {
            background: linear-gradient(135deg, #7b5fc4, #9b83d7);
            color: white;
            padding: 30px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .header h1 {
            margin: 0;
            font-size: 32px;
        }

        .header p {
            margin-top: 10px;
            opacity: 0.9;
        }

        .card {
            background: white;
            margin-top: 25px;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 5px 18px rgba(0,0,0,0.08);
        }

        .card h2 {
            color: #6d51b5;
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            overflow: hidden;
            border-radius: 12px;
        }

        th {
            background: #7b5fc4;
            color: white;
            padding: 14px;
            text-align: center;
        }

        td {
            padding: 13px;
            border-bottom: 1px solid #eee;
            text-align: center;
        }

        tr:hover {
            background: #f5f1fc;
        }

        .stok-kritis {
            background: #ffe1e1;
            color: #c0392b;
            font-weight: bold;
        }

        .stok-aman {
            color: #27834a;
            font-weight: bold;
        }

        .total {
            margin-top: 25px;
            background: #eee8fa;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
        }

        .total p {
            margin: 0;
            color: #6d51b5;
            font-size: 16px;
        }

        .total h2 {
            margin: 8px 0 0;
            color: #54399b;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            color: #777;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>📦 Product Information System</h1>
        <p>Sistem Informasi Data Produk</p>
    </div>

    <div class="card">

        <h2>📋 Daftar Produk</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
            </tr>

            <?php foreach ($products as $product): ?>

                <tr class="<?= $product["stok"] < 3 ? 'stok-kritis' : ''; ?>">

                    <td><?= $product["id"]; ?></td>

                    <td><?= $product["nama"]; ?></td>

                    <td><?= $product["kategori"]; ?></td>

                    <td>
                        Rp <?= number_format($product["harga"], 0, ',', '.'); ?>
                    </td>

                    <td>
                        <?php if ($product["stok"] < 3): ?>
                            ⚠️ <?= $product["stok"]; ?> (Kritis)
                        <?php else: ?>
                            <span class="stok-aman">
                                ✓ <?= $product["stok"]; ?>
                            </span>
                        <?php endif; ?>
                    </td>

                    <td><?= $product["deskripsi"]; ?></td>

                </tr>

            <?php endforeach; ?>

        </table>

        <div class="total">
            <p>💰 Total Nilai Aset Gudang</p>

            <h2>
                Rp <?= number_format($totalNilaiStok, 0, ',', '.'); ?>
            </h2>
        </div>

    </div>

    <div class="footer">
        Product Information System © 2026
    </div>

</div>

</body>
</html>