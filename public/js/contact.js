// Import jQuery and axios
const $ = window.$
const axios = window.axios

$(document).ready(() => {
  // Form submission handler
  $("#contact-form").submit((e) => {
    e.preventDefault()

    // Clear previous errors
    $(".error-message").addClass("hidden")
    $("#form-messages").addClass("hidden")
    $("#success-message, #error-message").addClass("hidden")

    // Validate form
    if (!validateForm()) {
      return
    }

    // Show loading state
    const submitBtn = $("#submit-btn")
    submitBtn.prop("disabled", true)
    submitBtn.find(".btn-text").addClass("hidden")
    submitBtn.find(".btn-loading").removeClass("hidden")

    // Prepare form data
    const formData = {
      name: $("#name").val().trim(),
      email: $("#email").val().trim(),
      subject: $("#subject").val().trim(),
      message: $("#message").val().trim(),
    }

    // Submit form
    axios
      .post("/api/contact", formData)
      .then((response) => {
        // Show success message
        $("#success-message").removeClass("hidden")
        $("#form-messages").removeClass("hidden")

        // Reset form
        $("#contact-form")[0].reset()

        // Scroll to success message
        $("html, body").animate(
          {
            scrollTop: $("#form-messages").offset().top - 100,
          },
          500,
        )
      })
      .catch((error) => {
        console.error("Error submitting form:", error)

        if (error.response && error.response.data && error.response.data.errors) {
          // Show validation errors
          const errors = error.response.data.errors
          Object.keys(errors).forEach((field) => {
            const errorElement = $(`#${field}`).siblings(".error-message")
            errorElement.text(errors[field][0]).removeClass("hidden")
          })
        } else {
          // Show general error
          $("#error-message").removeClass("hidden")
          $("#form-messages").removeClass("hidden")
        }
      })
      .finally(() => {
        // Reset button state
        submitBtn.prop("disabled", false)
        submitBtn.find(".btn-text").removeClass("hidden")
        submitBtn.find(".btn-loading").addClass("hidden")
      })
  })

  function validateForm() {
    let isValid = true

    // Name validation
    const name = $("#name").val().trim()
    if (name.length < 2) {
      showFieldError("name", "Nama harus minimal 2 karakter")
      isValid = false
    }

    // Email validation
    const email = $("#email").val().trim()
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    if (!emailRegex.test(email)) {
      showFieldError("email", "Format email tidak valid")
      isValid = false
    }

    // Message validation
    const message = $("#message").val().trim()
    if (message.length < 10) {
      showFieldError("message", "Pesan harus minimal 10 karakter")
      isValid = false
    }

    return isValid
  }

  function showFieldError(fieldName, message) {
    const errorElement = $(`#${fieldName}`).siblings(".error-message")
    errorElement.text(message).removeClass("hidden")
  }

  // Real-time validation
  $("#name, #email, #message").on("blur", function () {
    const fieldName = $(this).attr("id")
    const errorElement = $(this).siblings(".error-message")

    if (fieldName === "name" && $(this).val().trim().length >= 2) {
      errorElement.addClass("hidden")
    } else if (fieldName === "email" && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test($(this).val().trim())) {
      errorElement.addClass("hidden")
    } else if (fieldName === "message" && $(this).val().trim().length >= 10) {
      errorElement.addClass("hidden")
    }
  })
})
