<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Detail Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2>Edit Detail Transaksi</h2>
        <form action="/details/{{ $detail->id }}/edit" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">ID Transaksi</label>
                <input type="number" name="transaction_id" class="form-control" value="{{ $detail->transaction_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">ID Produk</label>
                <input type="number" name="product_id" class="form-control" value="{{ $detail->product_id }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="number" name="quantity" class="form-control" value="{{ $detail->quantity }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Sub Total (Rp)</label>
                <input type="number" name="sub_total" class="form-control" value="{{ $detail->sub_total }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="/dashboard" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
