@extends('layouts.app')

@section('title', 'Kontak - SMK Telekomunikasi Telesandi Bekasi')

@section('content')
<!-- Hero Section -->
<section class="py-20 bg-gradient-to-br from-gray-900 to-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-primary mb-6" data-aos="fade-up">Hubungi Kami</h1>
        <p class="text-xl text-secondary max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="200">
            Kami siap membantu Anda dengan informasi yang dibutuhkan
        </p>
    </div>
</section>

<!-- Contact Info & Form -->
<section class="py-16 bg-primary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div data-aos="fade-right">
                <h2 class="text-3xl font-bold text-primary mb-8">Informasi Kontak</h2>

                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div
                            class="w-12 h-12 bg-accent-primary rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-primary text-lg mb-1">Alamat</h4>
                            <p class="text-secondary">Jl. Raya Bekasi No. 123<br>Bekasi Timur, Bekasi 17113<br>Jawa
                                Barat, Indonesia</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div
                            class="w-12 h-12 bg-accent-primary rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-primary text-lg mb-1">Telepon</h4>
                            <p class="text-secondary">(021) 123-4567<br>(021) 123-4568</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div
                            class="w-12 h-12 bg-accent-primary rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-primary text-lg mb-1">Email</h4>
                            <p class="text-secondary">info@smktelesandi.sch.id<br>admin@smktelesandi.sch.id</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div
                            class="w-12 h-12 bg-accent-primary rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-primary text-lg mb-1">Jam Kerja</h4>
                            <p class="text-secondary">Senin - Jumat: 07:00 - 16:00<br>Sabtu: 07:00 - 12:00<br>Minggu:
                                Tutup</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div data-aos="fade-left">
                <h2 class="text-3xl font-bold text-primary mb-8">Kirim Pesan</h2>

                <form id="contact-form" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-primary font-semibold mb-2">Nama Lengkap *</label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-4 py-3 bg-secondary text-primary border border-gray-600 rounded-lg focus:outline-none focus:border-accent-primary">
                        <span class="error-message text-red-400 text-sm hidden"></span>
                    </div>

                    <div>
                        <label for="email" class="block text-primary font-semibold mb-2">Email *</label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-3 bg-secondary text-primary border border-gray-600 rounded-lg focus:outline-none focus:border-accent-primary">
                        <span class="error-message text-red-400 text-sm hidden"></span>
                    </div>

                    <div>
                        <label for="subject" class="block text-primary font-semibold mb-2">Subjek</label>
                        <input type="text" id="subject" name="subject"
                            class="w-full px-4 py-3 bg-secondary text-primary border border-gray-600 rounded-lg focus:outline-none focus:border-accent-primary">
                        <span class="error-message text-red-400 text-sm hidden"></span>
                    </div>

                    <div>
                        <label for="message" class="block text-primary font-semibold mb-2">Pesan *</label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full px-4 py-3 bg-secondary text-primary border border-gray-600 rounded-lg focus:outline-none focus:border-accent-primary resize-vertical"></textarea>
                        <span class="error-message text-red-400 text-sm hidden"></span>
                    </div>

                    <button type="submit" id="submit-btn"
                        class="w-full bg-accent-primary hover:bg-green-600 text-white py-3 px-6 rounded-lg font-semibold transition-colors">
                        <span class="btn-text">Kirim Pesan</span>
                        <span class="btn-loading hidden">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            Mengirim...
                        </span>
                    </button>
                </form>

                <!-- Success/Error Messages -->
                <div id="form-messages" class="mt-4 hidden">
                    <div id="success-message" class="bg-green-600 text-white p-4 rounded-lg hidden">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Pesan Anda berhasil dikirim! Kami akan segera merespons.</span>
                        </div>
                    </div>

                    <div id="error-message" class="bg-red-600 text-white p-4 rounded-lg hidden">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>Terjadi kesalahan. Silakan coba lagi nanti.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-16 bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-primary mb-4">Lokasi Sekolah</h2>
            <p class="text-secondary text-lg">Temukan kami di peta</p>
        </div>

        <div class="bg-primary p-4 rounded-lg" data-aos="fade-up" data-aos-delay="200">
            <div class="aspect-w-16 aspect-h-9">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3769.842418102718!2d107.05842427499064!3d-6.253085793735425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698dffaa3e87c9%3A0x7f0f671bf57691ae!2sSMK%20TELEKOMUNIKASI%20TELESANDI%20BEKASI!5e1!3m2!1sid!2sid!4v1756501870334!5m2!1sid!2sid"
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="rounded-lg">
                </iframe>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
$(document).ready(() => {
    // Form submission handler
    $("#contact-form").submit((e) => {
        e.preventDefault();

        // Clear previous errors
        $(".error-message").addClass("hidden");
        $("#form-messages").addClass("hidden");
        $("#success-message, #error-message").addClass("hidden");

        // Validate form
        if (!validateForm()) {
            return;
        }

        // Show loading state
        const submitBtn = $("#submit-btn");
        submitBtn.prop("disabled", true);
        submitBtn.find(".btn-text").addClass("hidden");
        submitBtn.find(".btn-loading").removeClass("hidden");

        // Prepare form data
        const formData = {
            name: $("#name").val().trim(),
            email: $("#email").val().trim(),
            subject: $("#subject").val().trim(),
            message: $("#message").val().trim(),
            _token: $('meta[name="csrf-token"]').attr("content")
        };

        // Submit form
        axios
            .post("/api/contact", formData)
            .then((response) => {
                if (response.data.success) {
                    // Show success message
                    $("#success-message").removeClass("hidden");
                    $("#form-messages").removeClass("hidden");

                    // Reset form
                    $("#contact-form")[0].reset();

                    // Scroll to success message
                    $("html, body").animate(
                        {
                            scrollTop: $("#form-messages").offset().top - 100,
                        },
                        500
                    );
                } else {
                    throw new Error(response.data.message || 'Terjadi kesalahan');
                }
            })
            .catch((error) => {
                console.error("Error submitting form:", error);

                if (error.response && error.response.data && error.response.data.errors) {
                    // Show validation errors
                    const errors = error.response.data.errors;
                    Object.keys(errors).forEach((field) => {
                        const errorElement = $(`#${field}`).siblings(".error-message");
                        errorElement.text(errors[field][0]).removeClass("hidden");
                    });
                } else {
                    // Show general error
                    $("#error-message").removeClass("hidden");
                    $("#form-messages").removeClass("hidden");
                }
            })
            .finally(() => {
                // Reset button state
                submitBtn.prop("disabled", false);
                submitBtn.find(".btn-text").removeClass("hidden");
                submitBtn.find(".btn-loading").addClass("hidden");
            });
    });

    function validateForm() {
        let isValid = true;

        // Name validation
        const name = $("#name").val().trim();
        if (name.length < 2) {
            showFieldError("name", "Nama harus minimal 2 karakter");
            isValid = false;
        }

        // Email validation
        const email = $("#email").val().trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showFieldError("email", "Format email tidak valid");
            isValid = false;
        }

        // Message validation
        const message = $("#message").val().trim();
        if (message.length < 10) {
            showFieldError("message", "Pesan harus minimal 10 karakter");
            isValid = false;
        }

        return isValid;
    }

    function showFieldError(fieldName, message) {
        const errorElement = $(`#${fieldName}`).siblings(".error-message");
        errorElement.text(message).removeClass("hidden");
    }

    // Real-time validation
    $("#name, #email, #message").on("blur", function () {
        const fieldName = $(this).attr("id");
        const errorElement = $(this).siblings(".error-message");

        if (fieldName === "name" && $(this).val().trim().length >= 2) {
            errorElement.addClass("hidden");
        } else if (fieldName === "email" && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test($(this).val().trim())) {
            errorElement.addClass("hidden");
        } else if (fieldName === "message" && $(this).val().trim().length >= 10) {
            errorElement.addClass("hidden");
        }
    });
});
</script>
@endpush
