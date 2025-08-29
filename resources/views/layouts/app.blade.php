<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SMK Telekomunikasi Telesandi Bekasi')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="icon" href="{{ asset('images/logo-sekolah.png') }}">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --bg-primary: #121212;
            --bg-secondary: #1E1E1E;
            --text-primary: #E0E0E0;
            --text-secondary: #A0A0A0;
            --accent-primary: #4CAF50;
            --accent-secondary: #FFC107;
        }

        body {
            background-color: var(--bg-primary);
            color: var(--text-primary);
            overflow-x: hidden;
        }

        .bg-primary {
            background-color: var(--bg-primary);
        }

        .bg-secondary {
            background-color: var(--bg-secondary);
        }

        .text-primary {
            color: var(--text-primary);
        }

        .text-secondary {
            color: var(--text-secondary);
        }

        .accent-primary {
            color: var(--accent-primary);
        }

        .bg-accent-primary {
            background-color: var(--accent-primary);
        }

        .accent-secondary {
            color: var(--accent-secondary);
        }

        .bg-accent-secondary {
            background-color: var(--accent-secondary);
        }

        /* Mobile Navigation Styles */
        #mobile-menu {
            position: fixed;
            top: 0;
            right: -300px;
            width: 300px;
            height: 100vh;
            background-color: var(--bg-secondary);
            z-index: 1000;
            transition: right 0.3s ease;
            padding-top: 60px;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.3);
        }

        #mobile-menu.active {
            right: 0;
        }

        #mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }

        #mobile-menu-overlay.active {
            display: block;
        }

        .close-menu {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            color: var(--text-secondary);
            font-size: 24px;
            cursor: pointer;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-content {
                padding-top: 2rem;
                padding-bottom: 2rem;
            }

            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .grid-cols-1 {
                grid-template-columns: 1fr;
            }

            .grid-cols-2 {
                grid-template-columns: 1fr;
            }

            .grid-cols-3 {
                grid-template-columns: 1fr;
            }

            .grid-cols-4 {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .cta-buttons {
                flex-direction: column;
                gap: 1rem;
            }

            .testimonial-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (min-width: 769px) and (max-width: 1024px) {
            .grid-cols-3 {
                grid-template-columns: repeat(2, 1fr);
            }

            .grid-cols-4 {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>

<body class="bg-primary text-primary">
    <!-- Navigation -->
    <nav class="bg-secondary shadow-lg fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <img src="/images/logo-sekolah.png" alt="Logo SMK" class="h-10 w-10">
                        <span class="font-bold text-lg text-primary">SMK Telesandi</span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}"
                        class="nav-link {{ request()->routeIs('home') ? 'accent-primary' : 'text-secondary' }} hover:accent-primary transition-colors">Beranda</a>
                    <a href="{{ route('about') }}"
                        class="nav-link {{ request()->routeIs('about') ? 'accent-primary' : 'text-secondary' }} hover:accent-primary transition-colors">Tentang
                        Kami</a>
                    <a href="{{ route('activities') }}"
                        class="nav-link {{ request()->routeIs('activities*') ? 'accent-primary' : 'text-secondary' }} hover:accent-primary transition-colors">Kegiatan</a>
                    <a href="{{ route('news') }}"
                        class="nav-link {{ request()->routeIs('news*') ? 'accent-primary' : 'text-secondary' }} hover:accent-primary transition-colors">Berita</a>
                    <a href="{{ route('contact') }}"
                        class="nav-link {{ request()->routeIs('contact') ? 'accent-primary' : 'text-secondary' }} hover:accent-primary transition-colors">Kontak</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-secondary hover:accent-primary focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu-overlay"></div>

        <!-- Mobile Menu Sidebar -->
        <div id="mobile-menu" class="md:hidden">
            <button class="close-menu" id="close-menu-btn">
                &times;
            </button>
            <div class="px-6 pt-16 pb-8 space-y-6">
                <a href="{{ route('home') }}"
                    class="block px-3 py-3 text-lg text-secondary hover:accent-primary hover:bg-gray-800 rounded-lg transition-colors {{ request()->routeIs('home') ? 'accent-primary bg-gray-800' : '' }}">Beranda</a>
                <a href="{{ route('about') }}"
                    class="block px-3 py-3 text-lg text-secondary hover:accent-primary hover:bg-gray-800 rounded-lg transition-colors {{ request()->routeIs('about') ? 'accent-primary bg-gray-800' : '' }}">Tentang
                    Kami</a>
                <a href="{{ route('activities') }}"
                    class="block px-3 py-3 text-lg text-secondary hover:accent-primary hover:bg-gray-800 rounded-lg transition-colors {{ request()->routeIs('activities*') ? 'accent-primary bg-gray-800' : '' }}">Kegiatan</a>
                <a href="{{ route('news') }}"
                    class="block px-3 py-3 text-lg text-secondary hover:accent-primary hover:bg-gray-800 rounded-lg transition-colors {{ request()->routeIs('news*') ? 'accent-primary bg-gray-800' : '' }}">Berita</a>
                <a href="{{ route('contact') }}"
                    class="block px-3 py-3 text-lg text-secondary hover:accent-primary hover:bg-gray-800 rounded-lg transition-colors {{ request()->routeIs('contact') ? 'accent-primary bg-gray-800' : '' }}">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-secondary mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 footer-grid">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <img src="/images/logo-sekolah.png" alt="Logo SMK" class="h-12 w-12">
                        <div>
                            <h3 class="font-bold text-lg text-primary">SMK Telekomunikasi Telesandi Bekasi</h3>
                            <p class="text-secondary text-sm">Membangun Generasi Unggul di Bidang Telekomunikasi</p>
                        </div>
                    </div>
                    <p class="text-secondary mb-4">Sekolah menengah kejuruan yang fokus pada pengembangan keahlian di
                        bidang telekomunikasi dan teknologi informasi.</p>
                </div>

                <div>
                    <h4 class="font-semibold text-primary mb-4">Menu Utama</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-secondary hover:accent-primary">Beranda</a></li>
                        <li><a href="{{ route('about') }}" class="text-secondary hover:accent-primary">Tentang Kami</a>
                        </li>
                        <li><a href="{{ route('activities') }}" class="text-secondary hover:accent-primary">Kegiatan</a>
                        </li>
                        <li><a href="{{ route('news') }}" class="text-secondary hover:accent-primary">Berita</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold text-primary mb-4">Kontak</h4>
                    <ul class="space-y-2 text-secondary">
                        <li>Jl. Raya Bekasi No. 123</li>
                        <li>Bekasi, Jawa Barat</li>
                        <li>Telp: (021) 123-4567</li>
                        <li>Email: info@smktelesandi.sch.id</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p class="text-secondary">&copy; {{ date('Y') }} SMK Telekomunikasi Telesandi Bekasi. All rights
                    reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Main JavaScript file for SMK Telesandi website
        $(document).ready(() => {
            // Initialize AOS
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 1000,
                    once: true,
                    offset: 100,
                });
            }

            // Set up CSRF token for all AJAX requests
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            // Mobile menu toggle - Sidebar style
            $("#mobile-menu-btn").click(() => {
                $("#mobile-menu").addClass("active");
                $("#mobile-menu-overlay").addClass("active");
                $("body").css("overflow", "hidden");
            });

            $("#close-menu-btn, #mobile-menu-overlay").click(() => {
                $("#mobile-menu").removeClass("active");
                $("#mobile-menu-overlay").removeClass("active");
                $("body").css("overflow", "auto");
            });

            // Close menu when clicking on a link
            $("#mobile-menu a").click(() => {
                $("#mobile-menu").removeClass("active");
                $("#mobile-menu-overlay").removeClass("active");
                $("body").css("overflow", "auto");
            });

            // Smooth scrolling for anchor links
            $('a[href^="#"]').on("click", function (event) {
                var target = $(this.getAttribute("href"));
                if (target.length) {
                    event.preventDefault();
                    $("html, body")
                        .stop()
                        .animate(
                            {
                                scrollTop: target.offset().top - 80,
                            },
                            1000
                        );
                }
            });

            // Back to top button
            $(window).scroll(function () {
                if ($(this).scrollTop() > 300) {
                    if (!$("#back-to-top").length) {
                        $("body").append(
                            '<button id="back-to-top" class="fixed bottom-8 right-8 bg-accent-primary hover:bg-green-600 text-white p-3 rounded-full shadow-lg transition-colors z-40"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg></button>'
                        );
                    }
                    $("#back-to-top").fadeIn();
                } else {
                    $("#back-to-top").fadeOut();
                }
            });

            // Back to top click handler
            $(document).on("click", "#back-to-top", () => {
                $("html, body").animate({ scrollTop: 0 }, 800);
            });

            // Utility functions
            window.SMKUtils = {
                // Format date to Indonesian format
                formatDate: (dateString) => {
                    const months = [
                        "Januari",
                        "Februari",
                        "Maret",
                        "April",
                        "Mei",
                        "Juni",
                        "Juli",
                        "Agustus",
                        "September",
                        "Oktober",
                        "November",
                        "Desember",
                    ];

                    const date = new Date(dateString);
                    const day = date.getDate();
                    const month = months[date.getMonth()];
                    const year = date.getFullYear();

                    return `${day} ${month} ${year}`;
                },

                // Truncate text
                truncateText: (text, maxLength) => {
                    if (!text) return '';
                    if (text.length <= maxLength) return text;
                    return text.substr(0, maxLength) + "...";
                },

                // Show loading spinner
                showLoading: (element) => {
                    $(element).html(
                        '<div class="text-center py-8"><div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-accent-primary"></div><p class="text-secondary mt-2">Memuat...</p></div>'
                    );
                },

                // Show error message
                showError: (element, message) => {
                    $(element).html(
                        `<div class="text-center py-8"><svg class="w-16 h-16 text-secondary mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg><h3 class="text-xl font-semibold text-primary mb-2">Terjadi Kesalahan</h3><p class="text-secondary">${message}</p></div>`
                    );
                },
            };
        });
    </script>

    @stack('scripts')
</body>

</html>
