/**---------------------------------------------------------------------------------------- */
/**-----------------------------------Annonce image---------------------------------- */
/**---------------------------------------------------------------------------------------- */




document.querySelectorAll(".small-img-1").forEach((image) => {
  image.addEventListener("click", () => {
    var src = image.getAttribute("src");
    document.querySelector(".big-img-1").src = src;
  });
});





  /**---------------------------------------------------------------------------------------- */
  /**--------------------------------MENU---------------------------------------------------- */
  /**---------------------------------------------------------------------------------------- */

  // mobile menu variables
  const mobileMenuOpenBtn = document.querySelectorAll('[data-mobile-menu-open-btn]');
  const mobileMenu = document.querySelectorAll('[data-mobile-menu]');
  const mobileMenuCloseBtn = document.querySelectorAll('[data-mobile-menu-close-btn]');
  const overlay = document.querySelector('[data-overlay]');

  for (let i = 0; i < mobileMenuOpenBtn.length; i++) {

    // mobile menu function
    const mobileMenuCloseFunc = function () {
      mobileMenu[i].classList.remove('active');
      overlay.classList.remove('active');
    }

    mobileMenuOpenBtn[i].addEventListener('click', function () {
      mobileMenu[i].classList.add('active');
      overlay.classList.add('active');
    });

    mobileMenuCloseBtn[i].addEventListener('click', mobileMenuCloseFunc);
    overlay.addEventListener('click', mobileMenuCloseFunc);

  }

  // accordion variables
  const accordionBtn = document.querySelectorAll('[data-accordion-btn]');
  const accordion = document.querySelectorAll('[data-accordion]');

  for (let i = 0; i < accordionBtn.length; i++) {

    accordionBtn[i].addEventListener('click', function () {

      const clickedBtn = this.nextElementSibling.classList.contains('active');

      for (let i = 0; i < accordion.length; i++) {

        if (clickedBtn) break;

        if (accordion[i].classList.contains('active')) {

          accordion[i].classList.remove('active');
          accordionBtn[i].classList.remove('active');

        }

      }

      this.nextElementSibling.classList.toggle('active');
      this.classList.toggle('active');

    });
  
  }

  /**---------------------------------------------------------------------------------------- */
  /**-----------------------------------Profile mobile menu---------------------------------- */
  /**---------------------------------------------------------------------------------------- */

  // Profile mobile menu variables
  const profilemobileMenuOpenBtn = document.querySelectorAll('[profile-data-mobile-menu-open-btn]');
  const profilemobileMenu = document.querySelectorAll('[profile-data-mobile-menu]');
  const profilemobileMenuCloseBtn = document.querySelectorAll('[profile-data-mobile-menu-close-btn]');
  const profileoverlay = document.querySelector('[profile-data-overlay]');


  for (let i = 0; i < profilemobileMenuOpenBtn.length; i++) {

    // mobile menu function
    const profilemobileMenuCloseFunc = function () {
      profilemobileMenu[i].classList.remove('active');
      profileoverlay.classList.remove('active');
    }

    profilemobileMenuOpenBtn[i].addEventListener('click', function () {
      profilemobileMenu[i].classList.add('active');
      profileoverlay.classList.add('active');
    });

    profilemobileMenuCloseBtn[i].addEventListener('click', profilemobileMenuCloseFunc);
    profileoverlay.addEventListener('click', profilemobileMenuCloseFunc);

  }









