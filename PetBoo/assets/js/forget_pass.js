'use strict';
/* ==================== Preloader ======================= */
window.onload = function () {
  window.setTimeout(fadeout, 300);
}

function fadeout() {
  document.querySelector('.preloader').style.opacity = '0';
  document.querySelector('.preloader').style.display = 'none';
}
