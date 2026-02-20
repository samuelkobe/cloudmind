document.querySelectorAll(".faq-toggle").forEach((button) => {
  button.addEventListener("click", () => {
    const h3 = button.closest("h3");
    const h3Key = h3.getAttribute("data-faq-key");
    const answer = h3.nextElementSibling;
    const answerKey = answer.getAttribute("data-faq-key");

    if (answerKey === h3Key) {
      // Check if keys match
      button.classList.toggle("active");
      answer.classList.toggle("active");
    }
  });
});
