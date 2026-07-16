<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Si — Peka</title>
    <meta name="description"
        content="Klinik Sehat melayani pemeriksaan umum, gigi, dan laboratorium di Jl. Sudirman No. 45, Jakarta Selatan. Buka Senin–Sabtu.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .hero-bg {
            background: linear-gradient(135deg, #0f4c81 0%, #1a6fb5 50%, #2196F3 100%);
        }

        .service-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, .08);
        }

        .service-card {
            transition: transform .2s, box-shadow .2s;
        }
    </style>
</head>

<body class="bg-white text-gray-800">

    <nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="" class="flex items-center gap-2">
                <div class="w-9 h-9 bg-blue-600 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </div>
                <span class="text-lg font-bold text-gray-900">SI-PEKA</span>
            </a>
            <div class="hidden md:flex items-center gap-8 text-sm text-gray-600 font-medium">
                <a href="#layanan" class="hover:text-blue-600">Layanan</a>
                <a href="#jadwal" class="hover:text-blue-600">Jadwal Praktik</a>
                <a href="#pengumuman" class="hover:text-blue-600">Pengumuman</a>
                <a href="#kontak" class="hover:text-blue-600">Kontak</a>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-700 hover:text-blue-600">Masuk</a>
                <a href="{{ route('register') }}"
                    class="text-sm font-semibold bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Daftar
                    Pasien</a>
            </div>
        </div>
    </nav>

    <section class="hero-bg text-white">
        <div class="max-w-6xl mx-auto px-6 py-20 md:py-28 grid md:grid-cols-2 gap-12 items-center">
            <div>
                <p class="text-blue-200 text-sm font-semibold tracking-wide uppercase mb-3">Klinik Umum & Spesialis</p>
                <h1 class="text-3xl md:text-5xl font-extrabold leading-tight mb-5">
                    Kesehatan Anda,<br>Prioritas Kami.
                </h1>
                <p class="text-blue-100 text-base leading-relaxed mb-8 max-w-lg">
                    Klinik Sehat hadir melayani masyarakat sejak 2015 dengan tenaga medis berpengalaman.
                    Daftarkan diri Anda secara online untuk pemeriksaan yang lebih cepat tanpa antre panjang.
                </p>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('register') }}"
                        class="bg-white text-blue-700 font-bold px-6 py-3 rounded-lg text-sm hover:bg-blue-50">
                        Daftar Pemeriksaan Online
                    </a>
                    <a href="https://wa.me/6281234567890" target="_blank"
                        class="border border-white/40 text-white font-semibold px-6 py-3 rounded-lg text-sm hover:bg-white/10">
                        Hubungi via WhatsApp
                    </a>
                </div>
            </div>
            <div class="hidden md:block">
                <img src="https://images.unsplash.com/photo-1551190822-a9333d879b1f?auto=format&fit=crop&w=600&q=80"
                    alt="Dokter melayani pasien" class="rounded-2xl shadow-2xl w-full object-cover h-80">
            </div>
        </div>
    </section>

    <section class="bg-gray-50 border-b border-gray-100">
        <div class="max-w-6xl mx-auto px-6 py-10 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div>
                <p class="text-2xl font-extrabold text-blue-600">8+</p>
                <p class="text-xs text-gray-500 mt-1">Tahun Beroperasi</p>
            </div>
            <div>
                <p class="text-2xl font-extrabold text-blue-600">12</p>
                <p class="text-xs text-gray-500 mt-1">Dokter & Tenaga Medis</p>
            </div>
            <div>
                <p class="text-2xl font-extrabold text-blue-600">5.200+</p>
                <p class="text-xs text-gray-500 mt-1">Pasien Terdaftar</p>
            </div>
            <div>
                <p class="text-2xl font-extrabold text-blue-600">4.8</p>
                <p class="text-xs text-gray-500 mt-1">Rating Google Maps</p>
            </div>
        </div>
    </section>

    <section id="layanan" class="max-w-6xl mx-auto px-6 py-16">
        <div class="text-center mb-12">
            <h2 class="text-2xl font-bold text-gray-900">Layanan Kami</h2>
            <p class="text-sm text-gray-500 mt-2">Berbagai layanan kesehatan yang tersedia di Klinik Sehat</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="service-card bg-white border border-gray-100 rounded-xl p-6">
                <div class="w-11 h-11 bg-blue-50 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Pemeriksaan Umum</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Konsultasi keluhan kesehatan sehari-hari, cek tekanan
                    darah, demam, batuk, flu, dan penanganan medis ringan lainnya.</p>
                <p class="text-sm font-bold text-blue-600 mt-4">Mulai Rp 50.000</p>
            </div>
            <div class="service-card bg-white border border-gray-100 rounded-xl p-6">
                <div class="w-11 h-11 bg-green-50 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Pemeriksaan Gigi</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Perawatan gigi mulai dari pembersihan karang gigi,
                    tambal gigi, cabut gigi, hingga konsultasi ortodonti dasar.</p>
                <p class="text-sm font-bold text-green-600 mt-4">Mulai Rp 75.000</p>
            </div>
            <div class="service-card bg-white border border-gray-100 rounded-xl p-6">
                <div class="w-11 h-11 bg-purple-50 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Laboratorium</h3>
                <p class="text-sm text-gray-500 leading-relaxed">Pemeriksaan darah lengkap, cek gula darah, kolesterol,
                    asam urat, tes urine, dan paket medical check-up tahunan.</p>
                <p class="text-sm font-bold text-purple-600 mt-4">Mulai Rp 120.000</p>
            </div>
        </div>
    </section>

    <section id="jadwal" class="bg-gray-50 border-y border-gray-100">
        <div class="max-w-6xl mx-auto px-6 py-16">
            <div class="text-center mb-10">
                <h2 class="text-2xl font-bold text-gray-900">Jadwal Praktik Dokter</h2>
                <p class="text-sm text-gray-500 mt-2">Pastikan Anda datang sesuai jadwal dokter yang tersedia</p>
            </div>
            <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-blue-600 text-white text-left">
                            <th class="px-6 py-3 font-semibold">Dokter</th>
                            <th class="px-6 py-3 font-semibold">Spesialisasi</th>
                            <th class="px-6 py-3 font-semibold">Hari</th>
                            <th class="px-6 py-3 font-semibold">Jam</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($doctors as $doctor)
                            <tr class="{{ $loop->even ? 'bg-gray-50/50' : '' }}">
                                <td class="px-6 py-3 font-medium text-gray-900">{{ $doctor->name }}</td>
                                <td class="px-6 py-3 text-gray-600">{{ $doctor->specialization }}</td>
                                <td class="px-6 py-3 text-gray-600">
                                    @if ($doctor->schedules->count() > 0)
                                        @foreach ($doctor->schedules as $schedule)
                                            {{ $schedule->day }}@if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    @else
                                        <span class="italic text-gray-400">Belum ada jadwal</span>
                                    @endif
                                </td>

                                <td class="px-6 py-3 text-gray-600">
                                    @if ($doctor->schedules->count() > 0)
                                        @foreach ($doctor->schedules as $schedule)
                                            {{ \Carbon\Carbon::parse($schedule->start_time)->format('H.i') }} –
                                            {{ \Carbon\Carbon::parse($schedule->end_time)->format('H.i') }}
                                            @if (!$loop->last)
                                                <br>
                                            @endif
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                                        Data jadwal dokter belum tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <p class="text-xs text-gray-400 mt-3 text-center">* Jadwal dapat berubah sewaktu-waktu. Hubungi kami untuk
                    konfirmasi ketersediaan dokter.</p>
            </div>
        </section>

        <section class="max-w-6xl mx-auto px-6 py-16">
            <div class="grid md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-3">Tentang Klinik Sehat</h2>
                    <p class="text-sm text-gray-600 leading-relaxed mb-4">
                        Klinik Sehat berdiri sejak tahun 2015 di kawasan Jakarta Selatan dengan misi memberikan
                        layanan kesehatan yang terjangkau dan berkualitas bagi seluruh lapisan masyarakat.
                        Kami dilengkapi dengan peralatan medis modern dan tenaga kesehatan profesional.
                    </p>
                    <p class="text-sm text-gray-600 leading-relaxed mb-6">
                        Kini Anda dapat mendaftarkan diri secara online melalui sistem kami. Tidak perlu datang pagi-pagi
                        untuk mengambil nomor antrean — cukup daftar dari rumah, dan datang sesuai jadwal.
                    </p>
                    <div class="flex gap-4 text-xs">
                        <div class="bg-blue-50 px-4 py-3 rounded-lg">
                            <p class="font-bold text-blue-700">Jam Operasional</p>
                            <p class="text-gray-600 mt-1">Sen–Jum: 08.00–16.00</p>
                            <p class="text-gray-600">Sabtu: 08.00–12.00</p>
                        </div>
                        <div class="bg-green-50 px-4 py-3 rounded-lg">
                            <p class="text-gray-600">tersedia setiap hari</p>
                        </div>
                    </div>
                </div>
                <div class="rounded-xl overflow-hidden shadow-lg border border-gray-100 aspect-video bg-black">
                    <iframe class="w-full h-full" src="https://www.youtube.com/embed/Nzi3MF5Yn4k?si=GTt03esOfwkY-cCJ"
                        title="Profil Klinik Sehat" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </section>

        {{-- ===== PENGUMUMAN ===== --}}
        <section id="pengumuman" class="bg-gray-50 border-y border-gray-100">
            <div class="max-w-6xl mx-auto px-6 py-16">
                <div class="text-center mb-10">
                    <h2 class="text-2xl font-bold text-gray-900">Pengumuman Terbaru</h2>
                    <p class="text-sm text-gray-500 mt-2">Informasi penting dari Klinik Sehat</p>
                </div>
                @if ($announcements->count())
                    <div class="grid md:grid-cols-3 gap-6">
                        @foreach ($announcements as $a)
                            <div class="bg-white rounded-xl border border-gray-100 p-5">
                                <img src="{{ Storage::url($a->image) }}" alt="{{ $a->judul }}"
                                    class="h-48 w-full object-cover">
                                <p class="text-xs text-gray-400 mb-2">{{ $a->created_at->format('d M Y') }}</p>
                                <h3 class="font-bold text-gray-900 mb-2">{{ $a->judul }}</h3>
                                <p class="text-sm text-gray-500 leading-relaxed">{{ Str::limit($a->isi, 120) }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <p class="text-sm text-gray-400">Belum ada pengumuman saat ini.</p>
                    </div>
                @endif
            </div>
        </section>

        {{-- ===== KONTAK & PETA ===== --}}
        <section id="kontak" class="max-w-6xl mx-auto px-6 py-16">
            <div class="grid md:grid-cols-2 gap-10">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Hubungi Kami</h2>
                    <div class="space-y-5 text-sm">
                        <div class="flex gap-3">
                            <div class="w-9 h-9 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-blue-600" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Alamat</p>
                                <p class="text-gray-500">Jl. Jendral Sudirman No. 45, Kebayoran Baru,<br>Jakarta Selatan
                                    12190</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div class="w-9 h-9 bg-green-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-green-600" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Telepon & WhatsApp</p>
                                <p class="text-gray-500">(021) 7654-3210</p>
                                <p class="text-gray-500">0812-3456-7890 (WhatsApp)</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div class="w-9 h-9 bg-amber-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-amber-600" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Email</p>
                                <p class="text-gray-500">info@kliniksehat.co.id</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded-xl overflow-hidden border border-gray-200 shadow-sm">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2804846839895!2d106.80047431476882!3d-6.225634995494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14d6c2f2ba7%3A0x4c7d5e5f7fdae3f8!2sJl.%20Jend.%20Sudirman%2C%20Jakarta!5e0!3m2!1sid!2sid!4v1700000000000"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </section>

        {{-- ===== FOOTER ===== --}}
        <footer class="bg-gray-900 text-gray-400 text-xs">
            <div class="max-w-6xl mx-auto px-6 py-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p>&copy; {{ date('Y') }} Klinik Sehat. Seluruh hak cipta dilindungi undang-undang.</p>
                <div class="flex gap-6">
                    <a href="{{ route('login') }}" class="hover:text-white">Login</a>
                    <a href="{{ route('register') }}" class="hover:text-white">Daftar Pasien</a>
                    <a href="#layanan" class="hover:text-white">Layanan</a>
                    <a href="#kontak" class="hover:text-white">Kontak</a>
                </div>
            </div>
        </footer>

    </body>

    </html>
