@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Transaksi</h2>
    <form action="{{ url('/transactions/' . $transaction->id . '/edit') }}" method="POST">
        @csrf
        <label for="date">Tanggal:</label>
        <input type="date" name="date" class="form-control" value="{{ $transaction->date }}" required>

        <label for="total_price">Total Harga:</label>
        <input type="number" name="total_price" class="form-control" value="{{ $transaction->total_price }}" required>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
