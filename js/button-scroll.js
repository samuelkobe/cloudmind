// // JS for button element inside flexible content's section nodes
// const sectionBtns = document.querySelectorAll(".section_btn");
// if (sectionBtns.length > 0) {
//   // Loop through each button (which is the anchor in this case)
//   sectionBtns.forEach((btn) => {
//     btn.addEventListener("click", (event) => {
//       const href = btn.getAttribute("href");

//       if (href.includes("#")) {
//         event.preventDefault(); // Prevent default anchor link behavior
//         // Handle internal anchor links
//         const targetId = href.split("#")[1]; // Extract ID after the # symbol
//         const targetElement = document.getElementById(targetId);

//         if (targetElement) {
//           targetElement.scrollIntoView({ behavior: "smooth" });
//         } else {
//           console.warn(`Target element with ID "${targetId}" not found.`);
//         }
//       } else if (btn.target === "_blank" && href.startsWith("http")) {
//         // Handle external links or links with full URL
//         window.open(href, "_blank");
//       } else if (btn.target != "_blank" && href.startsWith("http")) {
//         // Handle external links or links with full URL
//         window.location.href = href;
//       }
//     });
//   });
// } else {
//   // Do nothing...
// }
