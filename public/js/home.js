// Home page specific JavaScript
const $ = window.jQuery // Declare the $ variable
const axios = window.axios // Declare the axios variable

$(document).ready(() => {
  // Load latest activities
  loadLatestActivities()

  // Load latest news
  loadLatestNews()

  function loadLatestActivities() {
    axios
      .get("/api/activities/latest")
      .then((response) => {
        const activities = response.data.data
        let html = ""

        activities.forEach((activity) => {
          html += `
                        <div class="bg-secondary rounded-lg overflow-hidden shadow-lg" data-aos="fade-up">
                            <img src="${activity.thumbnail || "/images/activity-placeholder.jpg"}" alt="${activity.title}" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <div class="flex items-center text-sm text-secondary mb-2">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    ${window.SMKUtils.formatDate(activity.date)}
                                </div>
                                <h3 class="text-xl font-semibold text-primary mb-2">${activity.title}</h3>
                                <p class="text-secondary mb-4">${window.SMKUtils.truncateText(activity.description, 120)}</p>
                                <div class="flex items-center justify-between">
                                    <span class="bg-accent-primary text-white px-3 py-1 rounded-full text-sm">${activity.category}</span>
                                    <a href="/activities/${activity.slug}" class="text-accent-primary hover:text-green-600 font-semibold">Selengkapnya →</a>
                                </div>
                            </div>
                        </div>
                    `
        })

        $("#latest-activities").html(html)
        window.AOS.refresh()
      })
      .catch((error) => {
        console.error("Error loading activities:", error)
        window.SMKUtils.showError("#latest-activities", "Gagal memuat kegiatan terbaru")
      })
  }

  function loadLatestNews() {
    axios
      .get("/api/news/latest")
      .then((response) => {
        const news = response.data.data
        let html = ""

        news.forEach((article) => {
          html += `
                        <div class="bg-primary rounded-lg overflow-hidden shadow-lg" data-aos="fade-up">
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
                                    <a href="/news/${article.slug}" class="text-accent-primary hover:text-green-600 font-semibold">Baca →</a>
                                </div>
                            </div>
                        </div>
                    `
        })

        $("#latest-news").html(html)
        window.AOS.refresh()
      })
      .catch((error) => {
        console.error("Error loading news:", error)
        window.SMKUtils.showError("#latest-news", "Gagal memuat berita terbaru")
      })
  }
})
