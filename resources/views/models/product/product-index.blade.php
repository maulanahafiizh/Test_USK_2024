<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ Auth::user()->name }}
    </h2>
  </x-slot>

  <x-slot name="slot">
    @include('components.homemade.alert')
    <p class="text-black text-2xl lg:text-3xl font-bold text-center">Daftar Produk</p>

    @include('components.homemade.card-info-product')

    @if(Auth::user()->role == "Toko")
    <a href="{{ route('product.create') }}" class="bg-green-500 p-2 rounded-lg w-fit">
      <p class="text-black font-semibold text-base lg:text-lg">Tambah Data</p>
    </a>
    @endif

    <div class="overflow-auto py-2">
      <table class="w-full">
        <caption class="caption-top text-base lg:text-lg font-bold">Daftar Produk</caption>
        <caption class="caption-top text-sm lg:text-base">Geser untuk lebih lengkap</caption>
        <thead>
          <tr>
            <th class="border border-black p-2 w-9">
              <p class="text-black text-base lg:text-lg">No</p>
            </th>
            <th class="border border-black p-2">
              <p class="text-black text-base lg:text-lg">Nama</p>
            </th>
            <th class="border border-black p-2">
              <p class="text-black text-base lg:text-lg">Deskripsi</p>
            </th>
            <th class="border border-black p-2">
              <p class="text-black text-base lg:text-lg">Harga</p>
            </th>
            <th class="border border-black p-2">
              <p class="text-black text-base lg:text-lg">Stok Awal</p>
            </th>
            <th class="border border-black p-2">
              <p class="text-black text-base lg:text-lg">Stok Akhir</p>
            </th>
            <th class="border border-black p-2">
              <p class="text-black text-base lg:text-lg">Selisih Stok</p>
            </th>
            <th class="border border-black p-2">
              <p class="text-black text-base lg:text-lg">Pemasukan Seharusnya</p>
            </th>
            <th class="border border-black p-2">
              <p class="text-black text-base lg:text-lg">Aksi</p>
            </th>
          </tr>
        </thead>
        @foreach($allProducts as $key => $product)
        <tbody>
          <tr class="text-center">
            <td class="border border-black p-2">
              <p class="text-black text-base lg:text-lg">{{ $key + 1 }}</p>
            </td>
            <td class="border border-black p-2">
              <p class="text-black text-base lg:text-lg">{{ $product->name }}</p>
            </td>
            <td class="border border-black p-2 text-start">
              <p class="text-black text-base lg:text-lg">{{ $product->desc }}</p>
            </td>
            <td class="border border-black p-2">
              <p class="text-black text-base lg:text-lg">@currency( $product->price )</p>
            </td>
            <td class="border border-black p-2">
              <p class="text-black text-base lg:text-lg">{{ $product->first_stock }}</p>
            </td>
            <td class="border border-black p-2">
              <p class="text-black text-base lg:text-lg">{{ $product->last_stock }}</p>
            </td>
            <td class="border border-black p-2">
              <p class="text-black text-base lg:text-lg">{{ $product->first_stock - $product->last_stock }}</p>
            </td>
            <td class="border border-black p-2">
              <p class="text-black text-base lg:text-lg">@currency( ($product->first_stock - $product->last_stock) * $product->price )</p>
            </td>
            <td class="border border-black p-2 flex flex-col gap-2">
              <a href="{{ route('product.show', $product) }}" class="bg-blue-500 p-2 rounded-lg w-full">
                <p class="text-base lg:text-lg">Lihat</p>
              </a>
              @if(Auth::user()->role == "Toko")
              <a href="{{ route('product.edit', $product) }}" class="bg-orange-500 p-2 rounded-lg w-full">
                <p class="text-base lg:text-lg">Edit</p>
              </a>
              <form action="{{ route('product.destroy', $product) }}" method="post" class="bg-red-500 p-2 rounded-lg w-full" onclick="return confirm('Yakin ingin hapus?')">
                @csrf
                @method('delete')
                <button type="submit">
                  <p class="text-base lg:text-lg">Hapus</p>
                </button>
              </form>
              @endif
            </td>
          </tr>
        </tbody>
        @endforeach
      </table>
    </div>
  </x-slot>
</x-app-layout>