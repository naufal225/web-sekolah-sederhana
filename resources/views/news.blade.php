@extends('layouts.app')

@section('title', 'Berita - SMK Telekomunikasi Telesandi Bekasi')

@section('content')
<!-- Hero Section -->
<section class="py-20 bg-gradient-to-br from-gray-900 to-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-primary mb-6" data-aos="fade-up">Berita Sekolah</h1>
        <p class="text-xl text-secondary max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Informasi terkini seputar SMK Telekomunikasi Telesandi Bekasi
        </p>
    </div>
</section>

<!-- Search Section -->
<section class="py-8 bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-md mx-auto">
            <div class="relative">
                <input type="text" id="search-input" placeholder="Cari berita..."
                    class="w-full px-4 py-3 pl-12 bg-primary text-primary border border-gray-600 rounded-lg focus:outline-none focus:border-accent-primary">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                    <svg class="h-5 w-5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- News Grid -->
<section class="py-16 bg-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div id="news-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- News will be loaded via AJAX -->
        </div>

        <!-- Loading Spinner -->
        <div id="loading-spinner" class="text-center py-8">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-accent-primary"></div>
            <p class="text-secondary mt-2">Memuat berita...</p>
        </div>

        <!-- No Results -->
        <div id="no-results" class="text-center py-16 hidden">
            <svg class="w-16 h-16 text-secondary mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.5-1.01-6-2.709M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                </path>
            </svg>
            <h3 class="text-xl font-semibold text-primary mb-2">Tidak ada berita ditemukan</h3>
            <p class="text-secondary">Coba gunakan kata kunci yang berbeda</p>
        </div>

        <!-- Pagination -->
        <div id="pagination" class="flex justify-center mt-12">
            <!-- nanti di generate via JavaScript -->
        </div>
    </div>
</section>

<!-- News Detail Modal -->
<div id="news-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-secondary rounded-lg max-w-4xl w-full max-h-screen overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <h2 id="modal-title" class="text-2xl font-bold text-primary"></h2>
                    <button id="close-modal" class="text-secondary hover:text-primary">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <div id="modal-content">
                    <!-- Nanti diload via AJAX -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Pastikan jQuery dan axios tersedia
document.addEventListener('DOMContentLoaded', function() {
    let currentPage = 1;
    let searchQuery = "";
    let searchTimeout;

    // Load news on page load
    loadNews();

    // Search input handler
    $("#search-input").on("input", function() {
        clearTimeout(searchTimeout);
        searchQuery = $(this).val();

        searchTimeout = setTimeout(() => {
            currentPage = 1;
            loadNews();
        }, 500);
    });

    // Modal handlers
    $("#close-modal").click(() => {
        $("#news-modal").addClass("hidden");
    });

    $("#news-modal").click(function(e) {
        if (e.target === this) {
            $(this).addClass("hidden");
        }
    });

    function loadNews() {
        // Tampilkan loading spinner dan sembunyikan konten lainnya
        $("#loading-spinner").removeClass("hidden");
        $("#news-grid").addClass("hidden");
        $("#no-results").addClass("hidden");
        $("#pagination").addClass("hidden");

        const params = {
            page: currentPage,
            search: searchQuery,
        };

        axios.get("/api/news", { params })
            .then((response) => {
                const data = response.data;
                displayNews(data.data);
                displayPagination(data);

                if (data.data.length === 0 && searchQuery) {
                    $("#no-results").removeClass("hidden");
                }
            })
            .catch((error) => {
                console.error("Error loading news:", error);
                $("#news-grid").html(`
                    <div class="col-span-full text-center py-16">
                        <svg class="w-16 h-16 text-secondary mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-xl font-semibold text-primary mb-2">Terjadi kesalahan</h3>
                        <p class="text-secondary">Gagal memuat berita. Silakan coba lagi.</p>
                    </div>
                `);
                $("#news-grid").removeClass("hidden");
            })
            .finally(() => {
                // Sembunyikan loading spinner setelah selesai
                $("#loading-spinner").addClass("hidden");
            });
    }

    function displayNews(news) {
        let html = "";

        if (news.length === 0 && !searchQuery) {
            html = `
                <div class="col-span-full text-center py-16">
                    <svg class="w-16 h-16 text-secondary mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-primary mb-2">Belum ada berita</h3>
                    <p class="text-secondary">Berita akan segera hadir</p>
                </div>
            `;
        } else {
            news.forEach((article) => {
                html += `
                    <div class="bg-secondary rounded-lg overflow-hidden shadow-lg cursor-pointer news-card" data-id="${article.id}" data-slug="${article.slug}" data-aos="fade-up">
                        <img src="${article.cover || '/images/news-placeholder.jpg'}" alt="${article.title}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center text-sm text-secondary mb-2">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                ${formatDate(article.published_at)}
                            </div>
                            <h3 class="text-xl font-semibold text-primary mb-2">${article.title}</h3>
                            <p class="text-secondary mb-4">${article.excerpt}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-secondary text-sm">Oleh: ${article.author}</span>
                                <span class="text-accent-primary font-semibold">Baca →</span>
                            </div>
                        </div>
                    </div>
                `;
            });
        }

        $("#news-grid").html(html);
        $("#news-grid").removeClass("hidden");

        if (typeof AOS !== 'undefined') {
            AOS.refresh();
        }

        // Add click handlers for news cards
        $(".news-card").click(function() {
            const newsId = $(this).data("slug");
            showNewsDetail(newsId);
        });
    }

    function displayPagination(data) {
        if (data.last_page <= 1) {
            $("#pagination").html("");
            return;
        }

        let html = '<div class="flex space-x-2">';

        // Previous button
        if (data.current_page > 1) {
            html += `<button class="pagination-btn px-4 py-2 bg-secondary text-primary rounded-lg hover:bg-accent-primary hover:text-white transition-colors" data-page="${data.current_page - 1}">Sebelumnya</button>`;
        }

        // Page numbers
        for (let i = Math.max(1, data.current_page - 2); i <= Math.min(data.last_page, data.current_page + 2); i++) {
            const activeClass = i === data.current_page ? "bg-accent-primary text-white" : "bg-secondary text-primary hover:bg-accent-primary hover:text-white";
            html += `<button class="pagination-btn px-4 py-2 ${activeClass} rounded-lg transition-colors" data-page="${i}">${i}</button>`;
        }

        // Next button
        if (data.current_page < data.last_page) {
            html += `<button class="pagination-btn px-4 py-2 bg-secondary text-primary rounded-lg hover:bg-accent-primary hover:text-white transition-colors" data-page="${data.current_page + 1}">Selanjutnya</button>`;
        }

        html += "</div>";
        $("#pagination").html(html);
        $("#pagination").removeClass("hidden");

        // Add click handlers for pagination
        $(".pagination-btn").click(function() {
            currentPage = Number.parseInt($(this).data("page"));
            loadNews();
        });
    }

    function showNewsDetail(newsId) {
        $("#modal-content").html(
            '<div class="text-center py-8"><div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-accent-primary"></div><p class="text-secondary mt-2">Memuat detail...</p></div>'
        );
        $("#news-modal").removeClass("hidden");

        axios.get(`/api/news/${newsId}`)
            .then((response) => {
                const article = response.data.data;

                const html = `
                    <div class="mb-6">
                        <img src="${article.cover || '/images/news-placeholder.jpg'}" alt="${article.title}" class="w-full h-64 object-cover rounded-lg mb-4">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-secondary">Oleh: ${article.author}</span>
                            <div class="flex items-center text-secondary">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                ${formatDate(article.published_at)}
                            </div>
                        </div>
                    </div>
                    <div class="prose prose-invert max-w-none">
                        <div class="text-secondary leading-relaxed">${article.content}</div>
                    </div>
                `;

                $("#modal-title").text(article.title);
                $("#modal-content").html(html);
            })
            .catch((error) => {
                console.error("Error loading news detail:", error);
                $("#modal-content").html(
                    '<div class="text-center py-8"><p class="text-red-400">Gagal memuat detail berita</p></div>'
                );
            });
    }

    // Fungsi utilitas untuk memformat tanggal
    function formatDate(dateString) {
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        return new Date(dateString).toLocaleDateString('id-ID', options);
    }
});
</script>
@endpush
