var swiper = new Swiper(".catigory-slider-2", {
  spaceBetween: 10,
  slidesPerView: calculateSlidesPerViewResponsive(
    116,
    70,
    document.querySelector(".catigory-slider-2")
  ),
  navigation: {
    nextEl: ".catigory-slider-2-next",
    prevEl: ".catigory-slider-2-preve",
  },
  scrollbar: {
    el: ".catigory-slider-2-scrollbar",
    draggable: true,
  },
  on: {
    resize: function () {
      this.params.slidesPerView = calculateSlidesPerViewResponsive(
        116,
        70,
        document.querySelector(".catigory-slider-2")
      );
      this.update();
    },
  },
});

var swiper = new Swiper(".articals-slider", {
  spaceBetween: calculateSpaceBetween(57, 4),
  slidesPerView: calculateSlidesPerViewResponsive(
    263,
    155,
    document.querySelector(".articals-slider")
  ),
  navigation: {
    nextEl: ".articals-slider-next",
    prevEl: ".articals-slider-preve",
  },
  on: {
    resize: function () {
      this.params.slidesPerView = calculateSlidesPerViewResponsive(
        263,
        155,
        document.querySelector(".articals-slider")
      );
      this.params.spaceBetween = calculateSpaceBetween(30, 10);
      this.update();
    },
  },
});

var swiper = new Swiper(".header-slider-1", {
  loop: true,
  autoplay: {
    delay: 8000,
  },

  pagination: {
    el: ".header-slider-1-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".header-slider-1-next",
    prevEl: ".header-slider-1-preve",
  },
});

console.log("header-slider loaded successfully");

function calculateSpaceBetween(websspace, mobsspace) {
  if (window.innerWidth <= 576) {
    return mobsspace;
  } else {
    return websspace;
  }
}

function calculateSlidesPerViewResponsive(
  webscreen,
  mobscreen,
  swiperContainer
) {
  const containerWidth = swiperContainer.clientWidth;

  let slideWidth;
  if (window.innerWidth <= 576) {
    slideWidth = mobscreen;
  } else {
    slideWidth = webscreen;
  }

  const slidesPerView = containerWidth / slideWidth;

  return slidesPerView;
}

document
  .querySelectorAll(".flash-sales-wrapper")
  .forEach((swiperContainer, index) => {
    const swiper = new Swiper(
      swiperContainer.querySelector(".flash-sales-slider-3"),
      {
        spaceBetween: calculateSpaceBetween(30, 10),
        slidesPerView: calculateSlidesPerViewResponsive(
          286,
          161,
          swiperContainer
        ),
        navigation: {
          nextEl: `.flash-sales-slider-3-next-${index + 1}`, // Ensure this matches with {{$index}} from the blade
          prevEl: `.flash-sales-slider-3-prev-${index + 1}`, // Match with {{$index}} from blade
        },
        on: {
          resize: function () {
            this.params.slidesPerView = calculateSlidesPerViewResponsive(
              286,
              171,
              swiperContainer
            );
            this.params.spaceBetween = calculateSpaceBetween(30, 10);
            this.update();
          },
        },
      }
    );
  });

console.log("products-slider loaded successfully");

var swiper = new Swiper(".home-banner-3-swiper", {
  loop: true,
  spaceBetween: 5,
  autoplay: {
    delay: 8000,
  },
  navigation: {
    nextEl: ".home-banner-3-next",
    prevEl: ".home-banner-3-preve",
  },
});

console.log("offer-slider loaded successfully");

function redHeart(element) {
  const heart = element.querySelector(".heart");
  heart.classList.toggle("filled");
}

function fillFavorite(element) {
  element.classList.toggle("filled");
}
