@extends('layouts.app')

@section('title', 'Kegiatan - SMK Telekomunikasi Telesandi Bekasi')

@section('content')
<!-- Hero Section -->
<section class="py-20 bg-gradient-to-br from-gray-900 to-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-primary mb-6" data-aos="fade-up">Kegiatan Sekolah</h1>
        <p class="text-xl text-secondary max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Berbagai kegiatan menarik dan bermanfaat untuk pengembangan siswa
        </p>
    </div>
</section>

<!-- Filter Section -->
<section class="py-8 bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-4">
            <button class="filter-btn active bg-accent-primary text-white px-6 py-2 rounded-lg font-semibold transition-colors" data-filter="all">
                Semua
            </button>
            <button class="filter-btn bg-primary text-secondary hover:bg-accent-primary hover:text-white px-6 py-2 rounded-lg font-semibold transition-colors" data-filter="akademik">
                Akademik
            </button>
            <button class="filter-btn bg-primary text-secondary hover:bg-accent-primary hover:text-white px-6 py-2 rounded-lg font-semibold transition-colors" data-filter="osis">
                OSIS
            </button>
            <button class="filter-btn bg-primary text-secondary hover:bg-accent-primary hover:text-white px-6 py-2 rounded-lg font-semibold transition-colors" data-filter="lomba">
                Lomba
            </button>
            <button class="filter-btn bg-primary text-secondary hover:bg-accent-primary hover:text-white px-6 py-2 rounded-lg font-semibold transition-colors" data-filter="lainnya">
                Lainnya
            </button>
        </div>
    </div>
</section>

<!-- Activities Grid -->
<section class="py-16 bg-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div id="activities-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Activities will be loaded via AJAX -->
        </div>

        <!-- Loading Spinner -->
        <div id="loading-spinner" class="text-center py-8 hidden">
            <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-accent-primary"></div>
            <p class="text-secondary mt-2">Memuat kegiatan...</p>
        </div>

        <!-- Pagination -->
        <div id="pagination" class="flex justify-center mt-12">
            <!-- Pagination will be generated via JavaScript -->
        </div>
    </div>
</section>

<!-- Activity Detail Modal -->
<div id="activity-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-secondary rounded-lg max-w-4xl w-full max-h-screen overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <h2 id="modal-title" class="text-2xl font-bold text-primary"></h2>
                    <button id="close-modal" class="text-secondary hover:text-primary">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <div id="modal-content">
                    <!-- Modal content will be loaded via AJAX -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// JavaScript untuk halaman kegiatan
$(document).ready(() => {
    let currentPage = 1;
    let currentFilter = "all";
    let isLoading = false;

    // Load activities on page load
    loadActivities();

    // Filter button click handlers
    $(".filter-btn").click(function () {
        if (isLoading) return;

        $(".filter-btn").removeClass("active bg-accent-primary text-white").addClass("bg-primary text-secondary");
        $(this).removeClass("bg-primary text-secondary").addClass("active bg-accent-primary text-white");

        currentFilter = $(this).data("filter");
        currentPage = 1;
        loadActivities();
    });

    // Modal handlers
    $("#close-modal").click(() => {
        $("#activity-modal").addClass("hidden");
    });

    $("#activity-modal").click(function (e) {
        if (e.target === this) {
            $(this).addClass("hidden");
        }
    });

    function showLoading() {
        isLoading = true;
        $("#loading-spinner").removeClass("hidden");
        $("#activities-grid").addClass("opacity-50");
    }

    function hideLoading() {
        isLoading = false;
        $("#loading-spinner").addClass("hidden");
        $("#activities-grid").removeClass("opacity-50");
    }

    function loadActivities() {
        if (isLoading) return;

        showLoading();

        const params = {
            page: currentPage,
            category: currentFilter,
        };

        axios
            .get("/api/activities", { params })
            .then((response) => {
                const data = response.data;
                displayActivities(data.data);
                displayPagination(data);
                hideLoading();
            })
            .catch((error) => {
                console.error("Error loading activities:", error);
                $("#activities-grid").html(`
                    <div class="col-span-full text-center py-16">
                        <svg class="w-16 h-16 text-secondary mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="text-xl font-semibold text-primary mb-2">Terjadi Kesalahan</h3>
                        <p class="text-secondary">Gagal memuat kegiatan. Silakan coba lagi.</p>
                        <button class="mt-4 bg-accent-primary hover:bg-green-600 text-white px-6 py-2 rounded-lg font-semibold transition-colors" onclick="location.reload()">
                            Muat Ulang
                        </button>
                    </div>
                `);
                hideLoading();
            });
    }

    function displayActivities(activities) {
        let html = "";

        if (activities.length === 0) {
            html = `
                <div class="col-span-full text-center py-16">
                    <svg class="w-16 h-16 text-secondary mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.5-1.01-6-2.709M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-primary mb-2">Tidak ada kegiatan</h3>
                    <p class="text-secondary">Belum ada kegiatan untuk kategori ini</p>
                </div>
            `;
        } else {
            activities.forEach((activity) => {
                console.log(activity.thumbnail)
                html += `
                    <div class="bg-secondary rounded-lg overflow-hidden shadow-lg cursor-pointer activity-card" data-id="${activity.id}" data-slug="${activity.slug}" data-aos="fade-up">
                        <img src="${activity.thumbnail || "/images/activity-placeholder.jpg"}" alt="${activity.title}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-2">
                                <span class="bg-accent-primary text-white px-3 py-1 rounded-full text-sm">${activity.category}</span>
                                <div class="flex items-center text-sm text-secondary">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    ${formatDate(activity.date)}
                                </div>
                            </div>
                            <h3 class="text-xl font-semibold text-primary mb-2">${activity.title}</h3>
                            <p class="text-secondary mb-4">${truncateText(activity.description, 120)}</p>
                            <div class="flex items-center text-secondary text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                ${activity.location || 'SMK Telesandi Bekasi'}
                            </div>
                        </div>
                    </div>
                `;
            });
        }

        $("#activities-grid").html(html);

        // Initialize AOS if available
        if (typeof AOS !== 'undefined') {
            AOS.refresh();
        }

        // Add click handlers for activity cards
        $(".activity-card").click(function () {
            const activityId = $(this).data("slug");
            showActivityDetail(activityId);
        });
    }

    function displayPagination(data) {
        if (data.last_page <= 1) {
            $("#pagination").html("");
            return;
        }

        let html = '<div class="flex space-x-2 flex-wrap justify-center gap-2">';

        // Previous button
        if (data.current_page > 1) {
            html += `<button class="pagination-btn px-4 py-2 bg-secondary text-primary rounded-lg hover:bg-accent-primary hover:text-white transition-colors" data-page="${data.current_page - 1}">Sebelumnya</button>`;
        }

        // Page numbers
        for (let i = Math.max(1, data.current_page - 2); i <= Math.min(data.last_page, data.current_page + 2); i++) {
            const activeClass =
                i === data.current_page
                    ? "bg-accent-primary text-white"
                    : "bg-secondary text-primary hover:bg-accent-primary hover:text-white";
            html += `<button class="pagination-btn px-4 py-2 ${activeClass} rounded-lg transition-colors" data-page="${i}">${i}</button>`;
        }

        // Next button
        if (data.current_page < data.last_page) {
            html += `<button class="pagination-btn px-4 py-2 bg-secondary text-primary rounded-lg hover:bg-accent-primary hover:text-white transition-colors" data-page="${data.current_page + 1}">Selanjutnya</button>`;
        }

        html += "</div>";
        $("#pagination").html(html);

        // Add click handlers for pagination
        $(".pagination-btn").click(function () {
            if (isLoading) return;

            currentPage = Number.parseInt($(this).data("page"));
            loadActivities();

            // Scroll to top of activities section
            $('html, body').animate({
                scrollTop: $("#activities-grid").offset().top - 100
            }, 500);
        });
    }

    function showActivityDetail(activityId) {
        $("#modal-content").html(
            '<div class="text-center py-8"><div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-accent-primary"></div><p class="text-secondary mt-2">Memuat detail...</p></div>'
        );
        $("#activity-modal").removeClass("hidden");

        console.log(activityId)
        axios
            .get(`/api/activities/${activityId}`)
            .then((response) => {
                const activity = response.data.data;

                console.log(activity)

                const html = `
                    <div class="mb-6">
                        <img src="${activity.thumbnail || "/images/activity-placeholder.jpg"}" alt="${activity.title}" class="w-full h-64 object-cover rounded-lg mb-4">
                        <div class="flex items-center justify-between mb-4 flex-wrap gap-2">
                            <span class="bg-accent-primary text-white px-3 py-1 rounded-full text-sm">${activity.category}</span>
                            <div class="flex items-center text-secondary">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                ${formatDate(activity.date)}
                            </div>
                        </div>
                        <div class="flex items-center text-secondary mb-4">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            ${activity.location || 'SMK Telesandi Bekasi'}
                        </div>
                    </div>
                    <div class="prose prose-invert max-w-none">
                        <p class="text-secondary leading-relaxed">${activity.description || 'Tidak ada deskripsi yang tersedia.'}</p>
                    </div>
                `;

                $("#modal-title").text(activity.title);
                $("#modal-content").html(html);
            })
            .catch((error) => {
                console.error("Error loading activity detail:", error);
                $("#modal-content").html(
                    '<div class="text-center py-8"><p class="text-red-400">Gagal memuat detail kegiatan</p></div>'
                );
            });
    }

    // Helper functions
    function formatDate(dateString) {
        if (!dateString) return 'Tanggal tidak tersedia';

        const months = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        try {
            const date = new Date(dateString);
            if (isNaN(date.getTime())) return 'Tanggal tidak valid';

            const day = date.getDate();
            const month = months[date.getMonth()];
            const year = date.getFullYear();

            return `${day} ${month} ${year}`;
        } catch (error) {
            console.error("Error formatting date:", error);
            return 'Tanggal tidak valid';
        }
    }

    function truncateText(text, maxLength) {
        if (!text) return 'Tidak ada deskripsi';
        if (text.length <= maxLength) return text;
        return text.substr(0, maxLength) + "...";
    }
});
</script>
@endpush
