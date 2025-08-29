@extends('layouts.app')

@section('title', 'Beranda - SMK Telekomunikasi Telesandi Bekasi')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 to-black">
    <div class="absolute inset-0">
        <img src="/images/sekolah-hero.jpg" alt="SMK Telesandi" class="w-full h-full object-cover opacity-30">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    </div>

    <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8" data-aos="fade-up">
        <h1 class="text-4xl md:text-6xl font-bold text-primary mb-6">
            SMK Telekomunikasi<br>
            <span class="accent-primary">Telesandi Bekasi</span>
        </h1>
        <p class="text-xl md:text-2xl text-secondary mb-8 max-w-3xl mx-auto">
            Membangun Generasi Unggul di Bidang Telekomunikasi dan Teknologi Informasi
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('activities') }}"
                class="bg-accent-primary hover:bg-green-600 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                Lihat Kegiatan
            </a>
            <a href="{{ route('contact') }}"
                class="border-2 border-accent-primary text-accent-primary hover:bg-accent-primary hover:text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

<!-- Highlight Cards -->
<section class="py-16 bg-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-secondary p-6 rounded-lg text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="text-3xl font-bold accent-primary mb-2">850+</div>
                <div class="text-secondary">Siswa Aktif</div>
            </div>
            <div class="bg-secondary p-6 rounded-lg text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="text-3xl font-bold accent-primary mb-2">45+</div>
                <div class="text-secondary">Guru & Staff</div>
            </div>
            <div class="bg-secondary p-6 rounded-lg text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="text-3xl font-bold accent-secondary mb-2">A</div>
                <div class="text-secondary">Akreditasi</div>
            </div>
            <div class="bg-secondary p-6 rounded-lg text-center" data-aos="fade-up" data-aos-delay="400">
                <div class="text-3xl font-bold accent-primary mb-2">5</div>
                <div class="text-secondary">Program Keahlian</div>
            </div>
        </div>
    </div>
</section>

<!-- Kegiatan Terbaru -->
<section class="py-16 bg-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Kegiatan Terbaru</h2>
            <p class="text-secondary text-lg">Berbagai kegiatan menarik yang dilakukan siswa SMK Telesandi</p>
        </div>

        <div id="latest-activities" class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Activities will be loaded via AJAX -->
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('activities') }}"
                class="bg-accent-primary hover:bg-green-600 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                Lihat Semua Kegiatan
            </a>
        </div>
    </div>
</section>

<!-- Berita Terbaru -->
<section class="py-16 bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Berita Terbaru</h2>
            <p class="text-secondary text-lg">Informasi terkini seputar SMK Telesandi Bekasi</p>
        </div>

        <div id="latest-news" class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- News will be loaded via AJAX -->
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('news') }}"
                class="bg-accent-primary hover:bg-green-600 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

<!-- Testimoni -->
<section class="py-16 bg-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">Testimoni</h2>
            <p class="text-secondary text-lg">Apa kata siswa dan guru tentang SMK Telesandi</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-secondary p-8 rounded-lg" data-aos="fade-right">
                <div class="flex items-center mb-4">
                    <img src="/images/student-1.png" alt="Siswa" class="w-16 h-16 rounded-full mr-4">
                    <div>
                        <h4 class="font-semibold text-primary">Ahmad Rizki</h4>
                        <p class="text-secondary">Siswa Kelas XII TKJ</p>
                    </div>
                </div>
                <p class="text-secondary italic">"SMK Telesandi memberikan pendidikan yang sangat berkualitas. Fasilitas
                    laboratorium yang lengkap membantu saya memahami teknologi dengan baik."</p>
            </div>

            <div class="bg-secondary p-8 rounded-lg" data-aos="fade-left">
                <div class="flex items-center mb-4">
                    <img src="/images/teacher-1.png" alt="Guru" class="w-16 h-16 rounded-full mr-4">
                    <div>
                        <h4 class="font-semibold text-primary">Ibu Sari Dewi, S.Pd</h4>
                        <p class="text-secondary">Guru Produktif</p>
                    </div>
                </div>
                <p class="text-secondary italic">"Mengajar di SMK Telesandi sangat menyenangkan. Siswa-siswa antusias
                    belajar dan sekolah mendukung penuh inovasi dalam pembelajaran."</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-accent-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Bergabunglah dengan Kami</h2>
        <p class="text-white text-lg mb-8 max-w-2xl mx-auto">
            Wujudkan impian menjadi ahli di bidang telekomunikasi bersama SMK Telesandi Bekasi
        </p>
        <a href="{{ route('contact') }}"
            class="bg-white text-accent-primary hover:bg-gray-100 px-8 py-3 rounded-lg font-semibold transition-colors">
            Hubungi Kami Sekarang
        </a>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('js/home.js') }}"></script>
@endpush
