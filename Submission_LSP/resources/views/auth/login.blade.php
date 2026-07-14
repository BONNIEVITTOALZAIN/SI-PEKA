@extends('layouts.guest')

@section('content')
    <div class="w-full max-w-6xl bg-white rounded-3xl shadow-2xl overflow-hidden grid md:grid-cols-2">

        <!-- Left Side -->
        <div
            class="hidden md:flex bg-gradient-to-br from-blue-600 to-cyan-500 text-white flex-col justify-center items-center p-12">

            <div class="w-28 h-28 rounded-full bg-white/20 flex items-center justify-center mb-6">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19.428 15.341A8 8 0 118.659 4.572M15 10h.01M12 7v6m-3-3h6" />

                </svg>

            </div>

            <h1 class="text-4xl font-bold mb-4">

                Klinik Sehat

            </h1>

            <p class="text-center text-lg opacity-90">

                Sistem Pendaftaran Pemeriksaan Pasien Online

            </p>

            <div class="mt-10 space-y-4">

                <div class="flex items-center gap-3">

                    Daftar Pemeriksaan

                </div>

                <div class="flex items-center gap-3">

                    Konfirmasi Pembayaran

                </div>

                <div class="flex items-center gap-3">

                    Informasi Pengumuman

                </div>

            </div>

        </div>

        <!-- Right Side -->
        <div class="p-10 md:p-14">

            <h2 class="text-3xl font-bold text-gray-800">

                Login

            </h2>

            <p class="text-gray-500 mt-2">

                Selamat datang kembali!
            </p>

            @include('components.alert')

            <form action="{{ route('login') }}" method="POST" class="mt-8 space-y-5">

                @csrf

                <div>

                    <label class="block text-sm font-medium text-gray-700">

                        Email

                    </label>

                    <input type="email" name="email" value="{{ old('email') }}"
                        class="mt-2 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3"
                        placeholder="Masukkan Email">

                </div>

                <div>

                    <label class="block text-sm font-medium text-gray-700">

                        Password

                    </label>

                    <input type="password" name="password"
                        class="mt-2 w-full rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 p-3"
                        placeholder="Masukkan Password">

                </div>

                <button
                    class="w-full bg-blue-600 hover:bg-blue-700 transition text-white py-3 rounded-xl font-semibold shadow-lg">

                    Login

                </button>

            </form>

            <div class="mt-8 text-center">

                Belum memiliki akun?

                <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">

                    Daftar Sekarang

                </a>

            </div>

        </div>

    </div>
@endsection
