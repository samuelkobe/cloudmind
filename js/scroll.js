// const url = window.location.href;
// let path = location.pathname;

// function scrollToTargetAdjusted(element) {
//   var headerOffset = 96;
//   var elementPosition = element.getBoundingClientRect().top;
//   var offsetPosition = elementPosition + window.pageYOffset - headerOffset;
//   window.scrollTo({
//     top: offsetPosition,
//     behavior: "smooth",
//   });
// }

// document.querySelectorAll("a.menu-anchor").forEach((anchor) => {
//   anchor.addEventListener("click", function (a) {
//     let href = a.target.href;
//     let anchorId = this.getAttribute("data-title");
//     let currentAnchor = document.getElementById(anchorId);

//     if (path == "/") {
//       if (href.match("#")) {
//         a.preventDefault();
//         if (currentAnchor != null) {
//           scrollToTargetAdjusted(currentAnchor);
//         }
//       } else {
//         return true;
//       }
//     } else {
//       if (href.match("#")) {
//         a.preventDefault();
//         window.location.assign("/#" + anchorId + "#");
//       } else {
//         return true;
//       }
//     }
//   });
// });

// document.addEventListener("DOMContentLoaded", function () {
//   if (url.match("#")) {
//     let anchor = document.location.href.split("#");
//     let currentAnchor = document.getElementById(anchor[1]);
//     setTimeout(function () {
//       if (currentAnchor != null) {
//         scrollToTargetAdjusted(currentAnchor);
//       }
//       // console.log(currentAnchor);
//     }, 250);
//   }
// });
