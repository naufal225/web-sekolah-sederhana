// Import jQuery and axios
// var $ = window.jQuery
var axios = window.axios

$(document).ready(() => {
  let currentPage = 1
  let searchQuery = ""
  let searchTimeout

  // Load news on page load
  loadNews()

  // Search input handler
  $("#search-input").on("input", function () {
    clearTimeout(searchTimeout)
    searchQuery = $(this).val()

    searchTimeout = setTimeout(() => {
      currentPage = 1
      loadNews()
    }, 500)
  })

  // Modal handlers
  $("#close-modal").click(() => {
    $("#news-modal").addClass("hidden")
  })

  $("#news-modal").click(function (e) {
    if (e.target === this) {
      $(this).addClass("hidden")
    }
  })

  function loadNews() {
    window.SMKUtils.showLoading("#news-grid")
    $("#no-results").addClass("hidden")

    const params = {
      page: currentPage,
      search: searchQuery,
    }

    axios
      .get("/api/news", { params })
      .then((response) => {
        const data = response.data
        displayNews(data.data)
        displayPagination(data)

        if (data.data.length === 0 && searchQuery) {
          $("#no-results").removeClass("hidden")
        }
      })
      .catch((error) => {
        console.error("Error loading news:", error)
        window.SMKUtils.showError("#news-grid", "Gagal memuat berita")
      })
  }

  function displayNews(news) {
    let html = ""

    if (news.length === 0 && !searchQuery) {
      html = `
                <div class="col-span-full text-center py-16">
                    <svg class="w-16 h-16 text-secondary mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-primary mb-2">Belum ada berita</h3>
                    <p class="text-secondary">Berita akan segera hadir</p>
                </div>
            `
    } else {
      news.forEach((article) => {
        html += `
                    <div class="bg-secondary rounded-lg overflow-hidden shadow-lg cursor-pointer news-card" data-id="${article.id}" data-aos="fade-up">
                        <img src="${article.cover || "/images/news-placeholder.jpg"}" alt="${article.title}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center text-sm text-secondary mb-2">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                ${window.SMKUtils.formatDate(article.published_at)}
                            </div>
                            <h3 class="text-xl font-semibold text-primary mb-2">${article.title}</h3>
                            <p class="text-secondary mb-4">${article.excerpt}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-secondary text-sm">Oleh: ${article.author}</span>
                                <span class="text-accent-primary font-semibold">Baca →</span>
                            </div>
                        </div>
                    </div>
                `
      })
    }

    $("#news-grid").html(html)
    window.AOS.refresh()

    // Add click handlers for news cards
    $(".news-card").click(function () {
      const newsId = $(this).data("id")
      showNewsDetail(newsId)
    })
  }

  function displayPagination(data) {
    if (data.last_page <= 1) {
      $("#pagination").html("")
      return
    }

    let html = '<div class="flex space-x-2">'

    // Previous button
    if (data.current_page > 1) {
      html += `<button class="pagination-btn px-4 py-2 bg-secondary text-primary rounded-lg hover:bg-accent-primary hover:text-white transition-colors" data-page="${data.current_page - 1}">Sebelumnya</button>`
    }

    // Page numbers
    for (let i = Math.max(1, data.current_page - 2); i <= Math.min(data.last_page, data.current_page + 2); i++) {
      const activeClass =
        i === data.current_page
          ? "bg-accent-primary text-white"
          : "bg-secondary text-primary hover:bg-accent-primary hover:text-white"
      html += `<button class="pagination-btn px-4 py-2 ${activeClass} rounded-lg transition-colors" data-page="${i}">${i}</button>`
    }

    // Next button
    if (data.current_page < data.last_page) {
      html += `<button class="pagination-btn px-4 py-2 bg-secondary text-primary rounded-lg hover:bg-accent-primary hover:text-white transition-colors" data-page="${data.current_page + 1}">Selanjutnya</button>`
    }

    html += "</div>"
    $("#pagination").html(html)

    // Add click handlers for pagination
    $(".pagination-btn").click(function () {
      currentPage = Number.parseInt($(this).data("page"))
      loadNews()
    })
  }

  function showNewsDetail(newsId) {
    $("#modal-content").html(
      '<div class="text-center py-8"><div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-accent-primary"></div><p class="text-secondary mt-2">Memuat detail...</p></div>',
    )
    $("#news-modal").removeClass("hidden")

    axios
      .get(`/api/news/${newsId}`)
      .then((response) => {
        const article = response.data.data

        const html = `
                    <div class="mb-6">
                        <img src="${article.cover || "/images/news-placeholder.jpg"}" alt="${article.title}" class="w-full h-64 object-cover rounded-lg mb-4">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-secondary">Oleh: ${article.author}</span>
                            <div class="flex items-center text-secondary">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                ${window.SMKUtils.formatDate(article.published_at)}
                            </div>
                        </div>
                    </div>
                    <div class="prose prose-invert max-w-none">
                        <div class="text-secondary leading-relaxed">${article.content}</div>
                    </div>
                `

        $("#modal-title").text(article.title)
        $("#modal-content").html(html)
      })
      .catch((error) => {
        console.error("Error loading news detail:", error)
        $("#modal-content").html(
          '<div class="text-center py-8"><p class="text-red-400">Gagal memuat detail berita</p></div>',
        )
      })
  }
})
