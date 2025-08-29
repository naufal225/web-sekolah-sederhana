@extends('layouts.app')

@section('title', 'Tentang Kami - SMK Telekomunikasi Telesandi Bekasi')

@section('content')
<!-- Hero Section -->
<section class="py-20 bg-gradient-to-br from-gray-900 to-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-primary mb-6" data-aos="fade-up">Tentang Kami</h1>
        <p class="text-xl text-secondary max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Mengenal lebih dekat SMK Telekomunikasi Telesandi Bekasi
        </p>
    </div>
</section>

<!-- Profil Sekolah -->
<section class="py-16 bg-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <h2 class="text-3xl font-bold text-primary mb-6">Profil Sekolah</h2>
                <div class="space-y-6 text-secondary">
                    <p>
                        SMK Telekomunikasi Telesandi Bekasi didirikan pada tahun 2008 dengan visi menjadi sekolah
                        menengah kejuruan terdepan dalam bidang telekomunikasi dan teknologi informasi di Indonesia.
                    </p>
                    <p>
                        Kami telah menghasilkan lulusan yang kompeten dan siap kerja di industri telekomunikasi, baik di
                        dalam maupun luar negeri.
                    </p>
                    <p>
                        Dengan dukungan fasilitas modern dan tenaga pengajar berpengalaman, kami berkomitmen memberikan
                        pendidikan berkualitas tinggi yang sesuai dengan perkembangan teknologi terkini.
                    </p>
                </div>
            </div>
            <div data-aos="fade-left">
                <img src="/images/sekolah-building.jpg" alt="Gedung SMK Telesandi" class="w-full rounded-lg shadow-lg">
            </div>
        </div>
    </div>
</section>

<!-- Visi Misi -->
<section class="py-16 bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div data-aos="fade-up">
                <h3 class="text-2xl font-bold text-primary mb-6">Visi</h3>
                <div class="bg-primary p-6 rounded-lg">
                    <p class="text-secondary leading-relaxed">
                        Menjadi Sekolah Menengah Kejuruan yang unggul dalam menghasilkan tenaga kerja profesional di
                        bidang telekomunikasi dan teknologi informasi yang berkarakter, kompeten, dan berdaya saing
                        global.
                    </p>
                </div>
            </div>

            <div data-aos="fade-up" data-aos-delay="200">
                <h3 class="text-2xl font-bold text-primary mb-6">Misi</h3>
                <div class="bg-primary p-6 rounded-lg">
                    <ul class="text-secondary space-y-3">
                        <li class="flex items-start">
                            <span class="accent-primary mr-2">•</span>
                            Menyelenggarakan pendidikan kejuruan yang berkualitas dan relevan dengan kebutuhan industri
                        </li>
                        <li class="flex items-start">
                            <span class="accent-primary mr-2">•</span>
                            Mengembangkan kompetensi siswa melalui pembelajaran yang inovatif dan berbasis teknologi
                        </li>
                        <li class="flex items-start">
                            <span class="accent-primary mr-2">•</span>
                            Membangun karakter siswa yang berakhlak mulia dan berjiwa entrepreneur
                        </li>
                        <li class="flex items-start">
                            <span class="accent-primary mr-2">•</span>
                            Menjalin kerjasama dengan industri untuk meningkatkan kualitas lulusan
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Struktur Organisasi -->
<section class="py-16 bg-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-primary mb-4">Struktur Organisasi</h2>
            <p class="text-secondary text-lg">Kepemimpinan yang berpengalaman dan berdedikasi</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <img src="/images/kepala-sekolah.jpg" alt="Kepala Sekolah"
                    class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                <h4 class="font-semibold text-primary text-lg">Guruh Wijanarko, S.T</h4>
                <p class="text-secondary">Kepala Sekolah</p>
            </div>

            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <img src="/images/wakil-kepala.jpg" alt="Wakil Kepala Sekolah"
                    class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                <h4 class="font-semibold text-primary text-lg">Ahyat Triadi, S.Pd</h4>
                <p class="text-secondary">Wakil Kepala Sekolah</p>
            </div>

            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <img src="/images/kepala-jurusan.jpg" alt="Kepala Jurusan"
                    class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                <h4 class="font-semibold text-primary text-lg">Tiara Kusuma Dewi, S.Tr</h4>
                <p class="text-secondary">Kepala Jurusan RPL</p>
            </div>
        </div>
    </div>
</section>

<!-- Fasilitas -->
<section class="py-16 bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-primary mb-4">Fasilitas</h2>
            <p class="text-secondary text-lg">Fasilitas lengkap untuk mendukung pembelajaran optimal</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-primary p-6 rounded-lg" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-accent-primary rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
                <h4 class="font-semibold text-primary text-lg mb-2">Laboratorium Komputer</h4>
                <p class="text-secondary">5 lab komputer dengan perangkat terbaru untuk praktik programming dan jaringan
                </p>
            </div>

            <div class="bg-primary p-6 rounded-lg" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-accent-primary rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0">
                        </path>
                    </svg>
                </div>
                <h4 class="font-semibold text-primary text-lg mb-2">Lab Jaringan</h4>
                <p class="text-secondary">Laboratorium khusus untuk praktik instalasi dan konfigurasi jaringan</p>
            </div>

            <div class="bg-primary p-6 rounded-lg" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-accent-primary rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                </div>
                <h4 class="font-semibold text-primary text-lg mb-2">Perpustakaan</h4>
                <p class="text-secondary">Koleksi buku dan e-book terlengkap di bidang teknologi dan umum</p>
            </div>

            <div class="bg-primary p-6 rounded-lg" data-aos="fade-up" data-aos-delay="400">
                <div class="w-16 h-16 bg-accent-primary rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                </div>
                <h4 class="font-semibold text-primary text-lg mb-2">Workshop</h4>
                <p class="text-secondary">Ruang praktik untuk perakitan dan perbaikan perangkat elektronik</p>
            </div>

            <div class="bg-primary p-6 rounded-lg" data-aos="fade-up" data-aos-delay="500">
                <div class="w-16 h-16 bg-accent-primary rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h4 class="font-semibold text-primary text-lg mb-2">Lapangan Olahraga</h4>
                <p class="text-secondary">Lapangan basket, futsal, dan area olahraga lainnya</p>
            </div>

            <div class="bg-primary p-6 rounded-lg" data-aos="fade-up" data-aos-delay="600">
                <div class="w-16 h-16 bg-accent-primary rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                </div>
                <h4 class="font-semibold text-primary text-lg mb-2">Aula</h4>
                <p class="text-secondary">Ruang serbaguna untuk acara sekolah dan presentasi</p>
            </div>
        </div>
    </div>
</section>

<!-- Akreditasi & Penghargaan -->
<section class="py-16 bg-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-primary mb-4">Akreditasi & Penghargaan</h2>
            <p class="text-secondary text-lg">Pengakuan atas kualitas pendidikan yang kami berikan</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="w-20 h-20 bg-accent-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-black">A</span>
                </div>
                <h4 class="font-semibold text-primary">Akreditasi A</h4>
                <p class="text-secondary text-sm">Badan Akreditasi Nasional</p>
            </div>

            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="w-20 h-20 bg-accent-primary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                </div>
                <h4 class="font-semibold text-primary">Sekolah Terbaik</h4>
                <p class="text-secondary text-sm">Tingkat Provinsi 2023</p>
            </div>

            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="w-20 h-20 bg-accent-primary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h4 class="font-semibold text-primary">ISO 9001:2015</h4>
                <p class="text-secondary text-sm">Sertifikat Manajemen Mutu</p>
            </div>

            <div class="text-center" data-aos="fade-up" data-aos-delay="400">
                <div class="w-20 h-20 bg-accent-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z">
                        </path>
                    </svg>
                </div>
                <h4 class="font-semibold text-primary">Adiwiyata</h4>
                <p class="text-secondary text-sm">Sekolah Peduli Lingkungan</p>
            </div>
        </div>
    </div>
</section>
@endsection