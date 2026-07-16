@extends('layouts.guest')

@section('title', 'Daftar - SI-PEKA')

@section('content')
    <div class="w-full max-w-7xl bg-white rounded-3xl shadow-2xl overflow-hidden grid lg:grid-cols-2">

        <!-- Left -->
        <div
            class="hidden lg:flex bg-gradient-to-br from-cyan-500 to-blue-700 text-white flex-col justify-center items-center p-14">

            <h1 class="text-5xl font-bold">
                Si-Peka
            </h1>

            <p class="mt-5 text-xl text-center">
                Daftarkan akun Anda dan nikmati kemudahan pendaftaran pemeriksaan secara online.
            </p>

        </div>

        <!-- Right -->
        <div class="p-10">

            <h2 class="text-3xl font-bold text-gray-800">
                Registrasi Pasien
            </h2>

            <p class="text-gray-500 mt-2">
                Lengkapi data berikut untuk membuat akun Si-Peka.
            </p>

            @include('components.alert')

            <form action="{{ route('register') }}" method="POST" class="mt-8">
                @csrf

                <div class="grid md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="mt-2 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3"
                            placeholder="Masukkan Nama Lengkap">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="mt-2 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3"
                            placeholder="Masukkan Email">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password"
                            class="mt-2 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3"
                            placeholder="Masukkan Password">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation"
                            class="mt-2 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3"
                            placeholder="Ulangi Password">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">NIK</label>
                        <input type="text" name="nik" value="{{ old('nik') }}"
                            class="mt-2 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3"
                            placeholder="Masukkan NIK">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">No HP</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                            class="mt-2 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3"
                            placeholder="Masukkan No HP">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                            class="mt-2 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <select name="jenis_kelamin"
                            class="mt-2 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3">
                            <option value="">Pilih</option>
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea name="alamat" rows="4"
                            class="mt-2 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3"
                            placeholder="Masukkan Alamat Lengkap">{{ old('alamat') }}</textarea>
                    </div>

                </div>

                <button
                    class="mt-8 w-full bg-blue-600 hover:bg-blue-700 transition text-white py-4 rounded-xl font-bold shadow-lg">
                    Daftar Sekarang
                </button>

            </form>

            <div class="mt-6 text-center">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">
                    Login
                </a>
            </div>

        </div>

    </div>
@endsection
