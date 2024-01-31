<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ Auth::user()->name }}
    </h2>
  </x-slot>

  <x-slot name="slot">
    <p class="text-black text-2xl lg:text-3xl font-bold text-center">Detail Produk</p>

    <table class="w-full">
      <tr>
        <td class="p-2 border border-black w-1/4">
          <p class="text-black text-base lg:text-lg">Nama:</p>
        </td>
        <td class="p-2 border border-black">
          <p class="text-black text-base lg:text-lg">{{ $product->name }}</p>
        </td>
      </tr>
      <tr>
        <td class="p-2 border border-black w-1/4">
          <p class="text-black text-base lg:text-lg">Deskripsi:</p>
        </td>
        <td class="p-2 border border-black">
          <p class="text-black text-base lg:text-lg">{{ $product->desc }}</p>
        </td>
      </tr>
      <tr>
        <td class="p-2 border border-black w-1/4">
          <p class="text-black text-base lg:text-lg">Harga:</p>
        </td>
        <td class="p-2 border border-black">
          <p class="text-black text-base lg:text-lg">@currency( $product->price )</p>
        </td>
      </tr>
      <tr>
        <td class="p-2 border border-black w-1/4">
          <p class="text-black text-base lg:text-lg">Stok Awal:</p>
        </td>
        <td class="p-2 border border-black">
          <p class="text-black text-base lg:text-lg">{{ $product->first_stock }}</p>
        </td>
      </tr>
      <tr>
        <td class="p-2 border border-black w-1/4">
          <p class="text-black text-base lg:text-lg">Stok Akhir:</p>
        </td>
        <td class="p-2 border border-black">
          <p class="text-black text-base lg:text-lg">{{ $product->last_stock }}</p>
        </td>
      </tr>
      <tr>
        <td class="p-2 border border-black w-1/4">
          <p class="text-black text-base lg:text-lg">Selisih Stok:</p>
        </td>
        <td class="p-2 border border-black">
          <p class="text-black text-base lg:text-lg">{{ $product->first_stock - $product->last_stock }}</p>
        </td>
      </tr>
      <tr>
        <td class="p-2 border border-black w-1/4">
          <p class="text-black text-base lg:text-lg">Pemasukan Seharusnya:</p>
        </td>
        <td class="p-2 border border-black">
          <p class="text-black text-base lg:text-lg">@currency( ($product->first_stock - $product->last_stock) * $product->price )</p>
        </td>
      </tr>
    </table>

    <a href="{{ route('product.index') }}" class="bg-red-500 p-2 rounded-lg w-fit">
      <p class="font-bold text-base lg:text-lg">Kembali</p>
    </a>
  </x-slot>
</x-app-layout>