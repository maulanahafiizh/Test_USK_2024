<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ Auth::user()->name }}
    </h2>
  </x-slot>

  <x-slot name="slot">
    @include('components.homemade.alert')
    <p class="text-black text-2xl lg:text-3xl font-bold text-center">Daftar Pengguna</p>

    @include('components.homemade.card-info-user')

    <a href="{{ route('user.create') }}" class="bg-green-500 p-2 rounded-lg w-fit">
      <p class="text-black font-semibold text-base lg:text-lg">Tambah Data</p>
    </a>

    <div class="overflow-auto py-2">
      <table class="w-full">
        <caption class="caption-top text-base lg:text-lg font-bold">Daftar Pengguna</caption>
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
              <p class="text-black text-base lg:text-lg">Peran</p>
            </th>
            <th class="border border-black p-2">
              <p class="text-black text-base lg:text-lg">Saldo</p>
            </th>
            <th class="border border-black p-2">
              <p class="text-black text-base lg:text-lg">Email</p>
            </th>
            <th class="border border-black p-2">
              <p class="text-black text-base lg:text-lg">Aksi</p>
            </th>
          </tr>
        </thead>
        @foreach($allUsers as $key => $user)
        <tbody>
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
            <td class="border border-black p-2">
              <p class="text-black text-base lg:text-lg">@currency( $user->balance )</p>
            </td>
            <td class="border border-black p-2">
              <p class="text-black text-base lg:text-lg">{{ $user->email }}</p>
            </td>
            <td class="border border-black p-2 flex flex-col gap-2">
              <a href="{{ route('user.show', $user) }}" class="bg-blue-500 p-2 rounded-lg w-full">
                <p class="text-base lg:text-lg">Lihat</p>
              </a>
              <a href="{{ route('user.edit', $user) }}" class="bg-orange-500 p-2 rounded-lg w-full">
                <p class="text-base lg:text-lg">Edit</p>
              </a>
              <form action="{{ route('user.destroy', $user) }}" method="post" class="bg-red-500 p-2 rounded-lg w-full" onclick="return confirm('Yakin ingin hapus?')">
                @csrf
                @method('delete')
                <button type="submit">
                  <p class="text-base lg:text-lg">Hapus</p>
                </button>
              </form>
            </td>
          </tr>
        </tbody>
        @endforeach
      </table>
    </div>
  </x-slot>
</x-app-layout>