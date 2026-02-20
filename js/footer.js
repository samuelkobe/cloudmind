// // Display the "Back to Tours" button only on the single-tour page
// const tourDetailsButton = document.querySelector(".back-to-tours");

// if (document.body.classList.contains("single-tour")) {
//   tourDetailsButton.style.display = "inline-block";
// } else {
//   tourDetailsButton.style.display = "none";
// }

// Scroll event for the "Back to Top" button
window.addEventListener("scroll", function () {
  const scrollButtons = document.querySelector(".scroll-buttons");

  if (window.scrollY > 200) {
    scrollButtons.style.display = "block";
  } else {
    scrollButtons.style.display = "none";
  }
});

// Click event for the "Back to Top" button
document.querySelector(".back-to-top").addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});

// // Click event for the "Back to Tours" button
// document.querySelector(".back-to-tours").addEventListener("click", () => {
//   window.location.href = "/tours";
// });

// For Submenu fucntionality
const parentLis = document.querySelectorAll("li[aria-haspopup]");

parentLis.forEach((parentLi) => {
  const link = parentLi.querySelector("a");
  const plusIcon = parentLi.querySelector(".plus-icon");
  const submenu = parentLi.querySelector(".sub-menu");

  if (link && plusIcon && submenu) {
    plusIcon.addEventListener("click", () => {
      toggleSubmenu(parentLi, submenu, plusIcon);
    });

    plusIcon.addEventListener("keydown", (event) => {
      if (event.key === "Enter") {
        toggleSubmenu(parentLi, submenu, plusIcon);
      }
    });
  }
});

function toggleSubmenu(clickedParentLi, clickedSubmenu, clickedPlusIcon) {
  parentLis.forEach((parentLi) => {
    const link = parentLi.querySelector("a");
    const plusIcon = parentLi.querySelector(".plus-icon");
    const submenu = parentLi.querySelector(".sub-menu");

    if (link && plusIcon && submenu) {
      if (parentLi !== clickedParentLi) {
        // Close other submenus
        parentLi.setAttribute("aria-expanded", "false");
        plusIcon.textContent = "▼";
        plusIcon.setAttribute(
          "aria-label",
          "Expand submenu for " + link.dataset.title
        );
        submenu.classList.add("hidden");
      } else {
        // Toggle the clicked one
        const isExpanded = parentLi.getAttribute("aria-expanded") === "true";
        parentLi.setAttribute("aria-expanded", !isExpanded);

        if (isExpanded) {
          plusIcon.textContent = "▼";
          plusIcon.setAttribute(
            "aria-label",
            "Expand submenu for " + link.dataset.title
          );
        } else {
          plusIcon.textContent = "▲";
          plusIcon.setAttribute(
            "aria-label",
            "Collapse submenu for " + link.dataset.title
          );
        }
        submenu.classList.toggle("hidden");
      }
    }
  });
}
