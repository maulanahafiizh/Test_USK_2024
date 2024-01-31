<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ Auth::user()->name }}
    </h2>
  </x-slot>

  <x-slot name="slot">
    <p class="text-black text-2xl lg:text-3xl font-bold text-center">Edit Produk</p>

    <form action="{{ route('product.update', $product) }}" method="post" class="grid grid-cols-1 gap-3">
      @csrf
      @method('put')
      <div class="flex flex-col">
        <label for="name">Nama</label>
        <input required type="text" name="name" id="name" placeholder="Masukkan nama" value="{{ $product->name }}" class="rounded-lg outline-none">
      </div>

      <div class="flex flex-col">
        <label for="desc">Deskripsi</label>
        <input required type="text" name="desc" id="desc" placeholder="Masukkan deskripsi" value="{{ $product->desc }}" class="rounded-lg outline-none">
      </div>

      <div class="flex flex-col">
        <label for="price">Harga</label>
        <input required type="number" name="price" id="price" placeholder="Masukkan harga" value="{{ $product->price }}" class="rounded-lg outline-none">
      </div>

      <div class="flex flex-col">
        <label for="stock">Stok Awal</label>
        <input required type="number" name="stock" id="stock" placeholder="Masukkan stok" value="{{ $product->first_stock }}" class="rounded-lg outline-none">
      </div>

      <div class="grid grid-cols-2 gap-3 text-center">
        <a href="{{ route('product.index') }}" class="bg-red-500 p-2 rounded-lg">
          <p class="font-bold text-base lg:text-lg">Kembali</p>
        </a>
        <button type="submit" class="bg-green-500 p-2 rounded-lg">
          <p class="font-bold text-base lg:text-lg">Edit</p>
        </button>
      </div>
    </form>
  </x-slot>
</x-app-layout>