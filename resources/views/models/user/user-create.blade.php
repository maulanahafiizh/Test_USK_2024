<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ Auth::user()->name }}
    </h2>
  </x-slot>


  <x-slot name="slot">
    <p class="text-black text-2xl lg:text-3xl font-bold text-center">Tambah Pengguna</p>

    <form action="{{ route('user.store') }}" method="post" class="grid grid-cols-1 gap-3">
      @csrf
      <div class="flex flex-col">
        <label for="name">Nama</label>
        <input required type="text" name="name" id="name" placeholder="Masukkan nama" class="rounded-lg outline-none">
      </div>

      <div class="flex flex-col">
        <label for="role">Peran</label>
        <select name="role" id="role" class="rounded-lg outline-none">
          <option value="Admin">Admin</option>
          <option value="Bank">Bank</option>
          <option value="Toko">Toko</option>
          <option value="Siswa">Siswa</option>
        </select>
      </div>

      <div class="flex flex-col">
        <label for="email">Email</label>
        <input required type="email" name="email" id="email" placeholder="Masukkan email" class="rounded-lg outline-none">
      </div>

      <div class="flex flex-col">
        <label for="password">Password</label>
        <input required type="password" name="password" id="password" placeholder="Masukkan password" class="rounded-lg outline-none">
      </div>

      <div class="grid grid-cols-2 gap-3 text-center">
        <a href="{{ route('user.index') }}" class="bg-red-500 p-2 rounded-lg">
          <p class="font-bold text-base lg:text-lg">Kembali</p>
        </a>
        <button type="submit" class="bg-green-500 p-2 rounded-lg">
          <p class="font-bold text-base lg:text-lg">Tambah</p>
        </button>
      </div>
    </form>
  </x-slot>
</x-app-layout>