<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SI-PEKA - Sistem Pendaftaran Klinik')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-800 antialiased flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-xl hidden md:flex flex-col flex-shrink-0 z-20">
        <div class="h-16 flex items-center justify-center border-b border-slate-100">
            <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">
                SI-PEKA
            </span>
        </div>
        <div class="flex-1 overflow-y-auto py-4">
            <nav class="space-y-1 px-3">
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-50 hover:text-blue-600' }}">
                        <i class="fas fa-home w-6 text-center mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('admin.accounts.index') }}"
                        class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('admin.accounts.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-50 hover:text-blue-600' }}">
                        <i class="fas fa-users w-6 text-center mr-2"></i> Verifikasi Akun
                    </a>
                    <a href="{{ route('admin.pemeriksaan.index') }}"
                        class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('admin.pemeriksaan.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-50 hover:text-blue-600' }}">
                        <i class="fas fa-stethoscope w-6 text-center mr-2"></i> Pemeriksaan
                    </a>
                    <a href="{{ route('admin.payments.index') }}"
                        class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('admin.payments.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-50 hover:text-blue-600' }}">
                        <i class="fas fa-file-invoice-dollar w-6 text-center mr-2"></i> Pembayaran
                    </a>
                    <a href="{{ route('admin.announcements.index') }}"
                        class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('admin.announcements.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-50 hover:text-blue-600' }}">
                        <i class="fas fa-bullhorn w-6 text-center mr-2"></i> Pengumuman
                    </a>
                    <a href="{{ route('admin.doctors.index') }}"
                        class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('admin.doctors.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-50 hover:text-blue-600' }}">
                        <i class="fas fa-user-md w-6 text-center mr-2"></i> Manajemen Dokter
                    </a>
                    <a href="{{ route('admin.schedules.index') }}"
                        class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('admin.schedules.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-50 hover:text-blue-600' }}">
                        <i class="fas fa-calendar-alt w-6 text-center mr-2"></i> Jadwal Dokter
                    </a>
                @elseif(Auth::user()->role === 'pasien')
                    <a href="{{ route('pasien.dashboard') }}"
                        class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('pasien.dashboard') ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-50 hover:text-blue-600' }}">
                        <i class="fas fa-home w-6 text-center mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('pasien.pemeriksaan.index') }}"
                        class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('pasien.pemeriksaan.*') ? 'bg-blue-50 text-blue-700' : 'text-slate-700 hover:bg-slate-50 hover:text-blue-600' }}">
                        <i class="fas fa-calendar-plus w-6 text-center mr-2"></i> Pemeriksaan
                    </a>
                @endif
            </nav>
        </div>
        <div class="p-4 border-t border-slate-100">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="flex w-full items-center px-4 py-2 text-sm font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition-colors">
                    <i class="fas fa-sign-out-alt w-6 text-center mr-2"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top header -->
        <header class="h-16 bg-white shadow-sm flex items-center justify-between px-6 lg:px-8 z-10">
            <div class="flex items-center md:hidden">
                <span class="text-xl font-bold text-blue-600">SI-PEKA</span>
            </div>
            <div class="hidden md:block"></div>
            <div class="flex items-center space-x-4">
                <div class="flex items-center">
                    <img class="h-8 w-8 rounded-full border border-slate-200"
                        src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff"
                        alt="">
                    <span class="ml-3 text-sm font-medium text-slate-700">{{ Auth::user()->name }}</span>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto p-6 lg:p-8 relative">
            @if (session('success'))
                <div class="mb-4 bg-green-50 border-l-4 border-green-500 p-4 rounded-r shadow-sm flex items-center">
                    <i class="fas fa-check-circle text-green-500 mr-3"></i>
                    <p class="text-sm text-green-700">{{ session('success') }}</p>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4 rounded-r shadow-sm flex items-center">
                    <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                    <p class="text-sm text-red-700">{{ session('error') }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4 rounded-r shadow-sm flex flex-col">
                    <div class="flex items-center mb-2">
                        <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                        <p class="text-sm font-semibold text-red-700">Terdapat kesalahan:</p>
                    </div>
                    <ul class="list-disc pl-8 text-sm text-red-700">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>

</html>
