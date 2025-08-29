// Import jQuery and axios
const $ = window.jQuery
const axios = window.axios

$(document).ready(() => {
  let currentPage = 1
  let currentFilter = "all"

  // Load activities on page load
  loadActivities()

  // Filter button click handlers
  $(".filter-btn").click(function () {
    $(".filter-btn").removeClass("active bg-accent-primary text-white").addClass("bg-primary text-secondary")
    $(this).removeClass("bg-primary text-secondary").addClass("active bg-accent-primary text-white")

    currentFilter = $(this).data("filter")
    currentPage = 1
    loadActivities()
  })

  // Modal handlers
  $("#close-modal").click(() => {
    $("#activity-modal").addClass("hidden")
  })

  $("#activity-modal").click(function (e) {
    if (e.target === this) {
      $(this).addClass("hidden")
    }
  })

  function loadActivities() {
    window.SMKUtils.showLoading("#activities-grid")

    const params = {
      page: currentPage,
      filter: currentFilter,
    }

    axios
      .get("/api/activities", { params })
      .then((response) => {
        const data = response.data
        displayActivities(data.data)
        displayPagination(data)
      })
      .catch((error) => {
        console.error("Error loading activities:", error)
        window.SMKUtils.showError("#activities-grid", "Gagal memuat kegiatan")
      })
  }

  function displayActivities(activities) {
    let html = ""

    if (activities.length === 0) {
      html = `
                <div class="col-span-full text-center py-16">
                    <svg class="w-16 h-16 text-secondary mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.5-1.01-6-2.709M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-primary mb-2">Tidak ada kegiatan</h3>
                    <p class="text-secondary">Belum ada kegiatan untuk kategori ini</p>
                </div>
            `
    } else {
      activities.forEach((activity) => {
        html += `
                    <div class="bg-secondary rounded-lg overflow-hidden shadow-lg cursor-pointer activity-card" data-id="${activity.id}" data-aos="fade-up">
                        <img src="${activity.thumbnail || "/images/activity-placeholder.jpg"}" alt="${activity.title}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-2">
                                <span class="bg-accent-primary text-white px-3 py-1 rounded-full text-sm">${activity.category}</span>
                                <div class="flex items-center text-sm text-secondary">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    ${window.SMKUtils.formatDate(activity.date)}
                                </div>
                            </div>
                            <h3 class="text-xl font-semibold text-primary mb-2">${activity.title}</h3>
                            <p class="text-secondary mb-4">${window.SMKUtils.truncateText(activity.description, 120)}</p>
                            <div class="flex items-center text-secondary text-sm">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                ${activity.location}
                            </div>
                        </div>
                    </div>
                `
      })
    }

    $("#activities-grid").html(html)
    window.AOS.refresh()

    // Add click handlers for activity cards
    $(".activity-card").click(function () {
      const activityId = $(this).data("id")
      showActivityDetail(activityId)
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
      loadActivities()
    })
  }

  function showActivityDetail(activityId) {
    $("#modal-content").html(
      '<div class="text-center py-8"><div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-accent-primary"></div><p class="text-secondary mt-2">Memuat detail...</p></div>',
    )
    $("#activity-modal").removeClass("hidden")

    axios
      .get(`/api/activities/${activityId}`)
      .then((response) => {
        const activity = response.data.data

        const html = `
                    <div class="mb-6">
                        <img src="${activity.thumbnail || "/images/activity-placeholder.jpg"}" alt="${activity.title}" class="w-full h-64 object-cover rounded-lg mb-4">
                        <div class="flex items-center justify-between mb-4">
                            <span class="bg-accent-primary text-white px-3 py-1 rounded-full text-sm">${activity.category}</span>
                            <div class="flex items-center text-secondary">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                ${window.SMKUtils.formatDate(activity.date)}
                            </div>
                        </div>
                        <div class="flex items-center text-secondary mb-4">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            ${activity.location}
                        </div>
                    </div>
                    <div class="prose prose-invert max-w-none">
                        <p class="text-secondary leading-relaxed">${activity.description}</p>
                    </div>
                `

        $("#modal-title").text(activity.title)
        $("#modal-content").html(html)
      })
      .catch((error) => {
        console.error("Error loading activity detail:", error)
        $("#modal-content").html(
          '<div class="text-center py-8"><p class="text-red-400">Gagal memuat detail kegiatan</p></div>',
        )
      })
  }
})
