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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;1,9..144,500&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --ink: #0B2A4A;
            --paper: #FFFFFF;
            --paper-soft: #EFF6FF;
            --sage: #2563EB;
            --sage-soft: #DCEAFE;
            --clay: #0891B2;
            --clay-soft: #CFFAFE;
            --neutral: #64748B;
            --line: #E2E8F0;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #0f4c81 0%, #1a6fb5 50%, #2196F3 100%);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--paper);
            color: var(--ink);
        }

        .font-display {
            font-family: 'Fraunces', serif;
        }

        .eyebrow {
            font-family: 'Inter', sans-serif;
            font-size: .72rem;
            font-weight: 600;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: var(--sage);
        }

        .hairline {
            border-color: var(--line);
        }

        .btn-primary {
            background: var(--ink);
            color: var(--paper);
            transition: background .2s ease, transform .2s ease;
        }

        .btn-primary:hover {
            background: var(--sage);
            transform: translateY(-1px);
        }

        .btn-ghost {
            border: 1px solid rgba(251, 248, 243, .35);
            color: var(--paper);
            transition: background .2s ease, border-color .2s ease;
        }

        .btn-ghost:hover {
            background: rgba(251, 248, 243, .1);
            border-color: rgba(251, 248, 243, .6);
        }

        .service-card {
            background: #fff;
            border: 1px solid var(--line);
            transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px -20px rgba(22, 48, 44, .25);
            border-color: var(--sage);
        }

        .pulse-line {
            width: 100%;
            height: auto;
            color: var(--clay);
            opacity: .85;
        }

        .stat-divider {
            border-left: 1px solid var(--line);
        }

        .map-frame {
            filter: sepia(12%) saturate(85%) contrast(96%);
        }

        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 0;
            height: 1px;
            background: var(--sage);
            transition: width .25s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>

<body>

    <nav class="bg-[var(--paper)]/95 backdrop-blur border-b hairline sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-6 py-5 flex justify-between items-center">
            <a href="" class="flex items-center gap-2.5">
                <svg class="w-7 h-7" viewBox="0 0 32 32" fill="none">
                    <circle cx="16" cy="16" r="15" stroke="#2F6F5E" stroke-width="1.4" />
                    <path d="M7 16h4l2.5-6L18 22l2.5-6H25" stroke="#B8623A" stroke-width="1.6" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <span class="font-display text-lg font-semibold tracking-wide">Si&nbsp;—&nbsp;Peka</span>
            </a>
            <div class="hidden md:flex items-center gap-9 text-[.85rem] text-[var(--neutral)] font-medium">
                <a href="#layanan" class="nav-link hover:text-[var(--ink)]">Layanan</a>
                <a href="#jadwal" class="nav-link hover:text-[var(--ink)]">Jadwal Praktik</a>
                <a href="#pengumuman" class="nav-link hover:text-[var(--ink)]">Pengumuman</a>
                <a href="#kontak" class="nav-link hover:text-[var(--ink)]">Kontak</a>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('login') }}"
                    class="text-[.85rem] font-semibold text-[var(--ink)] hover:text-[var(--sage)]">Masuk</a>
                <a href="{{ route('register') }}"
                    class="text-[.85rem] font-semibold btn-primary px-5 py-2.5 rounded-full">Daftar Pasien</a>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero-gradient text-white relative overflow-hidden">
        <div class="max-w-6xl mx-auto px-6 pt-20 pb-16 md:pt-28 md:pb-20">
            <p class="eyebrow mb-5" style="color:#BFE0FF">Klinik Umum &amp; Spesialis · Sejak 2015</p>
            <div class="grid md:grid-cols-5 gap-10 items-end">
                <h1 class="md:col-span-3 font-display text-4xl md:text-6xl leading-[1.08] font-medium">
                    Kesehatan Anda,<br>
                    <span class="italic" style="color:#E0F7FF">diperiksa dengan tenang.</span>
                </h1>
                <p class="md:col-span-2 text-[15px] leading-relaxed text-blue-50/90">
                    Klinik Sehat melayani masyarakat dengan tenaga medis berpengalaman. Daftarkan
                    diri Anda secara online dan datang tepat waktu — tanpa antre pagi-pagi.
                </p>
            </div>

            <!-- Signature pulse line -->
            <svg class="pulse-line my-10 md:my-14" style="color:#E0F7FF" viewBox="0 0 1000 60"
                preserveAspectRatio="none">
                <path d="M0 30 H380 L410 8 L440 52 L465 30 H1000" stroke="currentColor" stroke-width="1.6"
                    fill="none" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <div class="flex flex-wrap items-center gap-4 mb-16">
                <a href="{{ route('register') }}"
                    class="bg-white text-[var(--sage)] font-semibold px-6 py-3 rounded-full text-sm transition hover:bg-[var(--paper-soft)]">
                    Daftar Pemeriksaan Online
                </a>
                <a href="https://wa.me/6281234567890" target="_blank"
                    class="btn-ghost font-semibold px-6 py-3 rounded-full text-sm">
                    Hubungi via WhatsApp
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4">
                <div class="pr-6">
                    <p class="font-display text-3xl font-medium">8+</p>
                    <p class="text-xs mt-1 text-blue-100/80">Tahun Beroperasi</p>
                </div>
                <div class="stat-divider pl-6 pr-6" style="border-color:rgba(255,255,255,.25)">
                    <p class="font-display text-3xl font-medium">12</p>
                    <p class="text-xs mt-1 text-blue-100/80">Dokter &amp; Tenaga Medis</p>
                </div>
                <div class="stat-divider pl-6 pr-6 mt-6 md:mt-0" style="border-color:rgba(255,255,255,.25)">
                    <p class="font-display text-3xl font-medium">5.200+</p>
                    <p class="text-xs mt-1 text-blue-100/80">Pasien Terdaftar</p>
                </div>
                <div class="stat-divider pl-6 mt-6 md:mt-0" style="border-color:rgba(255,255,255,.25)">
                    <p class="font-display text-3xl font-medium">4.8</p>
                    <p class="text-xs mt-1 text-blue-100/80">Rating Google Maps</p>
                </div>
            </div>
        </div>
    </section>

    <!-- LAYANAN -->
    <section id="layanan" class="max-w-6xl mx-auto px-6 py-20 md:py-24">
        <div class="mb-14 max-w-xl">
            <p class="eyebrow mb-3">Layanan Kami</p>
            <h2 class="font-display text-3xl md:text-4xl font-medium leading-tight">Perawatan yang menyeluruh,
                dijelaskan dengan jujur.</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="service-card rounded-2xl p-7">
                <div class="w-11 h-11 rounded-full flex items-center justify-center mb-6"
                    style="background:var(--sage-soft)">
                    <svg class="w-5 h-5" style="color:var(--sage)" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h3 class="font-display text-xl font-medium mb-2.5">Pemeriksaan Umum</h3>
                <p class="text-[14px] leading-relaxed" style="color:var(--neutral)">Konsultasi keluhan kesehatan
                    sehari-hari, cek tekanan darah, demam, batuk, flu, dan penanganan medis ringan lainnya.</p>
                <p class="text-sm font-semibold mt-5 pt-5 border-t hairline" style="color:var(--sage)">Mulai Rp
                    50.000</p>
            </div>
            <div class="service-card rounded-2xl p-7">
                <div class="w-11 h-11 rounded-full flex items-center justify-center mb-6"
                    style="background:var(--clay-soft)">
                    <svg class="w-5 h-5" style="color:var(--clay)" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="font-display text-xl font-medium mb-2.5">Pemeriksaan Gigi</h3>
                <p class="text-[14px] leading-relaxed" style="color:var(--neutral)">Perawatan gigi mulai dari
                    pembersihan karang gigi, tambal gigi, cabut gigi, hingga konsultasi ortodonti dasar.</p>
                <p class="text-sm font-semibold mt-5 pt-5 border-t hairline" style="color:var(--clay)">Mulai Rp
                    75.000</p>
            </div>
            <div class="service-card rounded-2xl p-7">
                <div class="w-11 h-11 rounded-full flex items-center justify-center mb-6" style="background:#E0E7FF">
                    <svg class="w-5 h-5" style="color:#4338CA" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <h3 class="font-display text-xl font-medium mb-2.5">Laboratorium</h3>
                <p class="text-[14px] leading-relaxed" style="color:var(--neutral)">Pemeriksaan darah lengkap, cek
                    gula darah, kolesterol, asam urat, tes urine, dan paket medical check-up tahunan.</p>
                <p class="text-sm font-semibold mt-5 pt-5 border-t hairline" style="color:#4338CA">Mulai Rp
                    120.000</p>
            </div>
        </div>
    </section>

    <!-- JADWAL -->
    <section id="jadwal" class="border-y hairline" style="background:var(--paper-soft)">
        <div class="max-w-6xl mx-auto px-6 py-20 md:py-24">
            <div class="mb-12 max-w-xl">
                <p class="eyebrow mb-3">Jadwal Praktik</p>
                <h2 class="font-display text-3xl md:text-4xl font-medium leading-tight">Temui dokter kami sesuai
                    waktu yang tersedia.</h2>
            </div>
            <div class="bg-white rounded-2xl border hairline overflow-hidden">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left border-b hairline">
                            <th class="px-7 py-4 eyebrow font-semibold">Dokter</th>
                            <th class="px-7 py-4 eyebrow font-semibold">Spesialisasi</th>
                            <th class="px-7 py-4 eyebrow font-semibold">Hari</th>
                            <th class="px-7 py-4 eyebrow font-semibold">Jam</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y" style="border-color:var(--line)">
                        @forelse ($doctors as $doctor)
                            <tr class="hover:bg-[var(--sage-soft)]/40 transition-colors">
                                <td class="px-7 py-4 font-display font-medium">{{ $doctor->name }}</td>
                                <td class="px-7 py-4" style="color:var(--neutral)">{{ $doctor->specialization }}</td>
                                <td class="px-7 py-4">
                                    @if ($doctor->schedules->count() > 0)
                                        <div class="flex flex-wrap gap-1.5">
                                            @foreach ($doctor->schedules as $schedule)
                                                <span class="text-xs px-2.5 py-1 rounded-full"
                                                    style="background:var(--sage-soft); color:var(--sage)">{{ $schedule->day }}</span>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="italic" style="color:var(--neutral)">Belum ada jadwal</span>
                                    @endif
                                </td>
                                <td class="px-7 py-4" style="color:var(--neutral)">
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
                                <td colspan="4" class="px-7 py-10 text-center" style="color:var(--neutral)">
                                    Data jadwal dokter belum tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <p class="text-xs mt-4" style="color:var(--neutral)">* Jadwal dapat berubah sewaktu-waktu. Hubungi
                kami untuk konfirmasi ketersediaan dokter.</p>
        </div>
    </section>

    <!-- TENTANG -->
    <section class="max-w-6xl mx-auto px-6 py-20 md:py-24">
        <div class="grid md:grid-cols-2 gap-14 items-center">
            <div>
                <p class="eyebrow mb-3">Tentang Kami</p>
                <h2 class="font-display text-3xl font-medium mb-5 leading-tight">Klinik Sehat, sejak 2015.</h2>
                <p class="text-[14.5px] leading-relaxed mb-4" style="color:var(--neutral)">
                    Berdiri di kawasan Jakarta Selatan dengan misi memberikan layanan kesehatan yang
                    terjangkau dan berkualitas bagi seluruh lapisan masyarakat. Kami dilengkapi peralatan
                    medis modern dan tenaga kesehatan profesional.
                </p>
                <p class="text-[14.5px] leading-relaxed mb-8" style="color:var(--neutral)">
                    Kini Anda dapat mendaftar secara online melalui Si-Peka. Tidak perlu datang pagi-pagi untuk
                    mengambil nomor antrean — cukup daftar dari rumah, dan datang sesuai jadwal.
                </p>
                <div class="flex gap-4">
                    <div class="px-5 py-4 rounded-xl" style="background:var(--sage-soft)">
                        <p class="text-xs font-semibold" style="color:var(--sage)">Jam Operasional</p>
                        <p class="text-sm mt-1.5" style="color:var(--ink)">Sen–Jum: 08.00–16.00</p>
                        <p class="text-sm" style="color:var(--ink)">Sabtu: 08.00–12.00</p>
                    </div>
                    <div class="px-5 py-4 rounded-xl flex items-center" style="background:var(--clay-soft)">
                        <p class="text-sm" style="color:var(--clay)">Layanan darurat<br>tersedia setiap hari</p>
                    </div>
                </div>
            </div>
            <div class="rounded-2xl overflow-hidden shadow-xl border hairline aspect-video bg-black">
                <iframe class="w-full h-full"
                    src="https://www.youtube.com/embed/Nzi3MF5Yn4k?autoplay=1&mute=1&loop=1&playlist=Nzi3MF5Yn4k&playsinline=1"
                    title="Profil Klinik Sehat" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>

    <!-- PENGUMUMAN -->
    <section id="pengumuman" class="border-y hairline" style="background:var(--paper-soft)">
        <div class="max-w-6xl mx-auto px-6 py-20 md:py-24">
            <div class="mb-12 max-w-xl">
                <p class="eyebrow mb-3">Pengumuman</p>
                <h2 class="font-display text-3xl md:text-4xl font-medium leading-tight">Informasi terbaru dari
                    Klinik Sehat.</h2>
            </div>
            @if ($announcements->count())
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach ($announcements as $a)
                        <div class="bg-white rounded-2xl border hairline overflow-hidden">
                            <img src="{{ Storage::url($a->image) }}" alt="{{ $a->judul }}"
                                class="h-44 w-full object-cover">
                            <div class="p-6">
                                <p class="eyebrow mb-2" style="color:var(--clay)">
                                    {{ $a->created_at->format('d M Y') }}</p>
                                <h3 class="font-display text-lg font-medium mb-2">{{ $a->judul }}</h3>
                                <p class="text-[14px] leading-relaxed" style="color:var(--neutral)">
                                    {{ Str::limit($a->isi, 120) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-10 bg-white rounded-2xl border hairline">
                    <p class="text-sm" style="color:var(--neutral)">Belum ada pengumuman saat ini.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- KONTAK -->
    <section id="kontak" class="max-w-6xl mx-auto px-6 py-20 md:py-24">
        <div class="grid md:grid-cols-2 gap-14">
            <div>
                <p class="eyebrow mb-3">Kontak</p>
                <h2 class="font-display text-3xl font-medium mb-8 leading-tight">Hubungi kami.</h2>
                <div class="space-y-6 text-sm">
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0"
                            style="background:var(--sage-soft)">
                            <svg class="w-4 h-4" style="color:var(--sage)" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold">Alamat</p>
                            <p style="color:var(--neutral)">Jl. Jendral Sudirman No. 45, Kebayoran Baru,<br>Jakarta
                                Selatan 12190</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0"
                            style="background:var(--clay-soft)">
                            <svg class="w-4 h-4" style="color:var(--clay)" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold">Telepon &amp; WhatsApp</p>
                            <p style="color:var(--neutral)">(021) 7654-3210</p>
                            <p style="color:var(--neutral)">0812-3456-7890 (WhatsApp)</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0"
                            style="background:var(--paper-soft)">
                            <svg class="w-4 h-4" style="color:var(--ink)" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold">Email</p>
                            <p style="color:var(--neutral)">info@kliniksehat.co.id</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-2xl overflow-hidden border hairline shadow-sm">
                <iframe class="map-frame"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2804846839895!2d106.80047431476882!3d-6.225634995494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14d6c2f2ba7%3A0x4c7d5e5f7fdae3f8!2sJl.%20Jend.%20Sudirman%2C%20Jakarta!5e0!3m2!1sid!2sid!4v1700000000000"
                    width="100%" height="320" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="text-xs" style="background:var(--ink); color:#9CA6A2">
        <div class="max-w-6xl mx-auto px-6 py-10 flex flex-col md:flex-row justify-between items-center gap-4">
            <p>&copy; {{ date('Y') }} Klinik Sehat · Si-Peka. Seluruh hak cipta dilindungi undang-undang.</p>
            <div class="flex gap-6">
                <a href="{{ route('login') }}" class="hover:text-[var(--paper)]">Login</a>
                <a href="{{ route('register') }}" class="hover:text-[var(--paper)]">Daftar Pasien</a>
                <a href="#layanan" class="hover:text-[var(--paper)]">Layanan</a>
                <a href="#kontak" class="hover:text-[var(--paper)]">Kontak</a>
            </div>
        </div>
    </footer>

</body>

</html>
