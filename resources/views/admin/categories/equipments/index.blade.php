<h1>Kelola Peralatan</h1>

<a href="{{ route('admin.equipments.create') }}">
    Tambah Peralatan
</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1">

<tr>
    <th>No</th>
    <th>Gambar</th>
    <th>Nama</th>
    <th>Kategori</th>
    <th>Harga</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>

@foreach($equipments as $equipment)

<tr>

<td>{{ $loop->iteration }}</td>

<td>
@if($equipment->image)
    <img src="{{ asset('images/equipment/' . $equipment->image) }}"
         width="100">
@endif
</td>

<td>{{ $equipment->name }}</td>

<td>{{ $equipment->category->name ?? '-' }}</td>

<td>
Rp {{ number_format($equipment->price, 0, ',', '.') }}
</td>

<td>{{ $equipment->stock }}</td>

<td>

<a href="{{ route('admin.equipments.edit', $equipment) }}">
Edit
</a>

<form action="{{ route('admin.equipments.destroy', $equipment) }}"
      method="POST"
      style="display:inline">

@csrf
@method('DELETE')

<button type="submit">
Hapus
</button>

</form>

</td>

</tr>

@endforeach

</table>