<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ Auth::user()->name }}
    </h2>
  </x-slot>

  <x-slot name="slot">
    <p class="text-black text-2xl lg:text-3xl font-bold text-center">Detail Pengguna</p>

    <table class="w-full">
      <tr>
        <td class="p-2 border border-black w-1/4">
          <p class="text-black text-base lg:text-lg">Nama:</p>
        </td>
        <td class="p-2 border border-black">
          <p class="text-black text-base lg:text-lg">{{ $user->name }}</p>
        </td>
      </tr>
      <tr>
        <td class="p-2 border border-black w-1/4">
          <p class="text-black text-base lg:text-lg">Peran:</p>
        </td>
        <td class="p-2 border border-black">
          <p class="text-black text-base lg:text-lg">{{ $user->role }}</p>
        </td>
      </tr>
      <tr>
        <td class="p-2 border border-black w-1/4">
          <p class="text-black text-base lg:text-lg">Saldo:</p>
        </td>
        <td class="p-2 border border-black">
          <p class="text-black text-base lg:text-lg">@currency( $user->balance )</p>
        </td>
      </tr>
      <tr>
        <td class="p-2 border border-black w-1/4">
          <p class="text-black text-base lg:text-lg">Email:</p>
        </td>
        <td class="p-2 border border-black">
          <p class="text-black text-base lg:text-lg">{{ $user->email }}</p>
        </td>
      </tr>
    </table>

    <a href="{{ route('user.index') }}" class="bg-red-500 p-2 rounded-lg w-fit">
      <p class="font-bold text-base lg:text-lg">Kembali</p>
    </a>
  </x-slot>
</x-app-layout>