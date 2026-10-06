<h1>Edit Peralatan</h1>

<form action="{{ route('admin.equipments.update', $equipment) }}"
      method="POST"
      enctype="multipart/form-data">

@csrf
@method('PUT')

<label>Kategori</label>

<select name="category_id">

@foreach($categories as $category)

<option value="{{ $category->id }}"
@if($equipment->category_id == $category->id)
selected
@endif
>
{{ $category->name }}
</option>

@endforeach

</select>

<br><br>

<label>Nama</label>

<input type="text"
       name="name"
       value="{{ $equipment->name }}">

<br><br>

<label>Deskripsi</label>

<textarea name="description">{{ $equipment->description }}</textarea>

<br><br>

<label>Harga</label>

<input type="number"
       name="price"
       value="{{ $equipment->price }}">

<br><br>

<label>Stok</label>

<input type="number"
       name="stock"
       value="{{ $equipment->stock }}">

<br><br>

<label>Gambar baru</label>

<input type="file" name="image">

<br><br>

<button type="submit">
Update
</button>

</form>