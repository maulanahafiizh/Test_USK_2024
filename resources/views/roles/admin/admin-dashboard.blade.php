<p class="text-black text-2xl lg:text-3xl font-bold text-center">Beranda</p>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
  @include('components.homemade.card-info-user')
  @include('components.homemade.card-info-product')
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
  <div class="overflow-scroll">
    <table class="w-full">
      <caption class="caption-top text-base lg:text-lg font-bold">Daftar Pengguna</caption>
      <thead>
        <tr>
          <th class="border border-black p-2 w-9">
            <p class="text-black text-base lg:text-lg">No</p>
          </th>
          <th class="border border-black p-2">
            <p class="text-black text-base lg:text-lg">Nama</p>
          </th>
          <th class="border border-black p-2">
            <p class="text-black text-base lg:text-lg">Peran</p>
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($allUsers as $key => $user)
        <tr class="text-center">
          <td class="border border-black p-2">
            <p class="text-black text-base lg:text-lg">{{ $key + 1 }}</p>
          </td>
          <td class="border border-black p-2">
            <p class="text-black text-base lg:text-lg">{{ $user->name }}</p>
          </td>
          <td class="border border-black p-2">
            <p class="text-black text-base lg:text-lg">{{ $user->role }}</p>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="overflow-scroll">
    <table class="w-full">
      <caption class="caption-top text-base lg:text-lg font-bold">Daftar Produk</caption>
      <thead>
        <tr>
          <th class="border border-black p-2 w-9">
            <p class="text-black text-base lg:text-lg">No</p>
          </th>
          <th class="border border-black p-2">
            <p class="text-black text-base lg:text-lg">Nama</p>
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
        </tr>
      </thead>
      <tbody>
        @foreach($allProducts as $key => $product)
        <tr class="text-center">
          <td class="border border-black p-2">
            <p class="text-black text-base lg:text-lg">{{ $key + 1 }}</p>
          </td>
          <td class="border border-black p-2">
            <p class="text-black text-base lg:text-lg">{{ $product->name }}</p>
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
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>