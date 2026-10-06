<h1>Tambah Peralatan</h1>

<form action="{{ route('admin.equipments.store') }}"
      method="POST"
      enctype="multipart/form-data">

@csrf

<label>Kategori</label>

<select name="category_id">

@foreach($categories as $category)

<option value="{{ $category->id }}">
{{ $category->name }}
</option>

@endforeach

</select>

<br><br>

<label>Nama Peralatan</label>

<input type="text" name="name">

<br><br>

<label>Deskripsi</label>

<textarea name="description"></textarea>

<br><br>

<label>Harga Sewa</label>

<input type="number" name="price">

<br><br>

<label>Stok</label>

<input type="number" name="stock">

<br><br>

<label>Gambar</label>

<input type="file" name="image">

<br><br>

<button type="submit">
Simpan
</button>

</form>