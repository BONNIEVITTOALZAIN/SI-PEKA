@extends('layouts.guest')

@section('content')
    <div class="w-full max-w-7xl bg-white rounded-3xl shadow-2xl overflow-hidden grid lg:grid-cols-2">

        <!-- Left -->
        <div
            class="hidden lg:flex bg-gradient-to-br from-cyan-500 to-blue-700 text-white flex-col justify-center items-center p-14">

            <h1 class="text-5xl font-bold">

                Klinik Sehat

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

            <p class="text-gray-500">

                Lengkapi data berikut.

            </p>

            @include('components.alert')

            <form action="{{ route('register') }}" method="POST" class="mt-8">

                @csrf

                <div class="grid md:grid-cols-2 gap-5">

                    <div>

                        <label>Nama Lengkap</label>

                        <input type="text" name="name" class="mt-2 w-full rounded-xl border p-3">

                    </div>

                    <div>

                        <label>Email</label>

                        <input type="email" name="email" class="mt-2 w-full rounded-xl border p-3">

                    </div>

                    <div>

                        <label>Password</label>

                        <input type="password" name="password" class="mt-2 w-full rounded-xl border p-3">

                    </div>

                    <div>

                        <label>Konfirmasi Password</label>

                        <input type="password" name="password_confirmation" class="mt-2 w-full rounded-xl border p-3">

                    </div>

                    <div>

                        <label>NIK</label>

                        <input type="text" name="nik" class="mt-2 w-full rounded-xl border p-3">

                    </div>

                    <div>

                        <label>No HP</label>

                        <input type="text" name="no_hp" class="mt-2 w-full rounded-xl border p-3">

                    </div>

                    <div>

                        <label>Tanggal Lahir</label>

                        <input type="date" name="tanggal_lahir" class="mt-2 w-full rounded-xl border p-3">

                    </div>

                    <div>

                        <label>Jenis Kelamin</label>

                        <select name="jenis_kelamin" class="mt-2 w-full rounded-xl border p-3">

                            <option value="">Pilih</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>

                        </select>

                    </div>

                    <div class="md:col-span-2">

                        <label>Alamat</label>

                        <textarea name="alamat" rows="4" class="mt-2 w-full rounded-xl border p-3"></textarea>

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
