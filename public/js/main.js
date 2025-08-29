// Main JavaScript file for SMK Telesandi website
// const $ = window.jQuery
const AOS = window.AOS

$(document).ready(() => {
  // Initialize AOS
  AOS.init({
    duration: 1000,
    once: false,
    offset: 100,
    mirror: true
  })

  $(document).on('ajaxComplete', function() {
    AOS.refresh();
  });

  // Set up CSRF token for all AJAX requests
  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
  })

  // Mobile menu toggle
  $("#mobile-menu-btn").click(() => {
    $("#mobile-menu").toggleClass("hidden")
  })

  // Smooth scrolling for anchor links
  $('a[href^="#"]').on("click", function (event) {
    var target = $(this.getAttribute("href"))
    if (target.length) {
      event.preventDefault()
      $("html, body")
        .stop()
        .animate(
          {
            scrollTop: target.offset().top - 80,
          },
          1000,
        )
    }
  })

  // Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      if (!$("#back-to-top").length) {
        $("body").append(
          '<button id="back-to-top" class="fixed bottom-8 right-8 bg-accent-primary hover:bg-green-600 text-white p-3 rounded-full shadow-lg transition-colors z-40"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg></button>',
        )
      }
      $("#back-to-top").fadeIn()
    } else {
      $("#back-to-top").fadeOut()
    }
  })

  // Back to top click handler
  $(document).on("click", "#back-to-top", () => {
    $("html, body").animate({ scrollTop: 0 }, 800)
  })

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
      ]

      const date = new Date(dateString)
      const day = date.getDate()
      const month = months[date.getMonth()]
      const year = date.getFullYear()

      return `${day} ${month} ${year}`
    },

    // Truncate text
    truncateText: (text, maxLength) => {
      if (text.length <= maxLength) return text
      return text.substr(0, maxLength) + "..."
    },

    // Show loading spinner
    showLoading: (element) => {
      $(element).html(
        '<div class="text-center py-8"><div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-accent-primary"></div><p class="text-secondary mt-2">Memuat...</p></div>',
      )
    },

    // Show error message
    showError: (element, message) => {
      $(element).html(
        `<div class="text-center py-8"><svg class="w-16 h-16 text-secondary mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg><h3 class="text-xl font-semibold text-primary mb-2">Terjadi Kesalahan</h3><p class="text-secondary">${message}</p></div>`,
      )
    },
  }
})
