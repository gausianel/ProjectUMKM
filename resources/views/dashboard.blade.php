<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMKM Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4 text-center">UMKM Dashboard</h1>

        <!-- Daftar Produk -->
        <h2 class="mb-4">Daftar Produk</h2>
        <table class="table table-bordered table-hover bg-white">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Harga (Rp)</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->category }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editProduct{{ $product->id }}">Edit</button>
                        <form action="/products/{{ $product->id }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Form Tambah Produk -->
        <form action="/products" method="POST" class="mb-5">
            @csrf
            <h4 class="mb-3">Tambah Produk</h4>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="product_name" class="form-control" placeholder="Nama Produk" required>
                </div>
                <div class="col">
                    <input type="number" name="price" class="form-control" placeholder="Harga" required>
                </div>
                <div class="col">
                    <input type="number" name="stock" class="form-control" placeholder="Stok" required>
                </div>
                <div class="col">
                    <input type="text" name="category" class="form-control" placeholder="Kategori" required>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>

          <!-- Modal Edit Produk -->
          @foreach($products as $product)
          <div class="modal fade" id="editProduct{{ $product->id }}" tabindex="-1" aria-labelledby="editProductLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Edit Produk</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form action="/products/{{ $product->id }}" method="POST">
                              @csrf @method('PUT')
                              <div class="mb-3">
                                  <label class="form-label">Nama Produk</label>
                                  <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}" required>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Harga</label>
                                  <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Stok</label>
                                  <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Kategori</label>
                                  <input type="text" name="category" class="form-control" value="{{ $product->category }}" required>
                              </div>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          @endforeach

        <!-- Daftar Transaksi -->
        <h2 class="mb-4">Daftar Transaksi</h2>
        <table class="table table-bordered table-hover bg-white">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Total Harga (Rp)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->date }}</td>
                    <td>{{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editTransaction{{ $transaction->id }}">Edit</button>
                        <form action="/transactions/{{ $transaction->id }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Form Tambah Transaksi -->
        <form action="/transactions" method="POST" class="mb-5">
            @csrf
            <h4 class="mb-3">Tambah Transaksi</h4>
            <div class="row mb-3">
                <div class="col">
                    <input type="date" name="date" class="form-control" required>
                </div>
                <div class="col">
                    <input type="number" name="total_price" class="form-control" placeholder="Total Harga" required>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </div>
        </form>

        <!-- Modal Edit Transaksi -->
@foreach($transactions as $transaction)
<div class="modal fade" id="editTransaction{{ $transaction->id }}" tabindex="-1" aria-labelledby="editTransactionLabel{{ $transaction->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTransactionLabel{{ $transaction->id }}">Edit Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/transactions/{{ $transaction->id }}" method="POST">
                @csrf @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="date" class="form-control" value="{{ $transaction->date }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Total Harga</label>
                        <input type="number" name="total_price" class="form-control" value="{{ $transaction->total_price }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

        <!-- Daftar Detail Transaksi -->
        <h2 class="mb-4">Detail Transaksi</h2>
        <table class="table table-bordered table-hover bg-white">
            <thead class="table-warning">
                <tr>
                    <th>ID</th>
                    <th>ID Transaksi</th>
                    <th>ID Produk</th>
                    <th>Jumlah</th>
                    <th>Sub Total (Rp)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $detail)
                <tr>
                    <td>{{ $detail->id }}</td>
                    <td>{{ $detail->transaction_id }}</td>
                    <td>{{ $detail->product_id }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ number_format($detail->sub_total, 0, ',', '.') }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editDetail{{ $detail->id }}">Edit</button>
                        <form action="/details/{{ $detail->id }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

      <!-- Form Tambah Detail Transaksi -->
<form action="/details" method="POST" class="mb-5">
    @csrf
    <h4 class="mb-3">Tambah Detail Transaksi</h4>
    <div class="row mb-3">
        <div class="col">
            <select name="transaction_id" class="form-control" required>
                <option value="">Pilih Transaksi</option>
                @foreach($transactions as $transaction)
                    <option value="{{ $transaction->id }}">#{{ $transaction->id }} - {{ $transaction->date }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <select name="product_id" class="form-control" required>
                <option value="">Pilih Produk</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <input type="number" name="quantity" class="form-control" placeholder="Jumlah" required>
        </div>
        <div class="col">
            <input type="number" name="sub_total" class="form-control" placeholder="Sub Total" required>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-warning">Tambah</button>
        </div>
    </div>
</form>


     <!-- Modal Edit Detail Transaksi -->
@foreach($details as $detail)
<div class="modal fade" id="editDetail{{ $detail->id }}" tabindex="-1" aria-labelledby="editDetailLabel{{ $detail->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDetailLabel{{ $detail->id }}">Edit Detail Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/details/{{ $detail->id }}" method="POST">
                @csrf @method('PUT')
                <div class="modal-body">
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
                        <label class="form-label">Sub Total</label>
                        <input type="number" name="sub_total" class="form-control" value="{{ $detail->sub_total }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
</body>
</html>
