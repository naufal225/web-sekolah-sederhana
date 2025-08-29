// Utility functions for SMK Telesandi website
const SMKUtils = {
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
    const $ = window.jQuery // Declare the $ variable
    $(element).html(
      '<div class="text-center py-8"><div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-accent-primary"></div><p class="text-secondary mt-2">Memuat...</p></div>',
    )
  },

  // Show error message
  showError: (element, message) => {
    const $ = window.jQuery // Declare the $ variable
    $(element).html(
      `<div class="text-center py-8"><svg class="w-16 h-16 text-secondary mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg><h3 class="text-xl font-semibold text-primary mb-2">Terjadi Kesalahan</h3><p class="text-secondary">${message}</p></div>`,
    )
  },
}

// Export for module systems
if (typeof module !== "undefined" && module.exports) {
  module.exports = SMKUtils
}

// Make available globally
window.SMKUtils = SMKUtils
