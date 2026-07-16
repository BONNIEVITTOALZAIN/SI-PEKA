@extends('layouts.guest')

@section('title', 'Login - SI-PEKA')

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
                Si-Peka
            </h1>

            <p class="text-center text-lg opacity-90">
                Sistem Pendaftaran Pemeriksaan Pasien Online
            </p>

            <div class="mt-10 space-y-4">
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Daftar Pemeriksaan
                </div>

                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 14l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Konfirmasi Pembayaran
                </div>

                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>
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
                Selamat datang kembali di Si-Peka!
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
