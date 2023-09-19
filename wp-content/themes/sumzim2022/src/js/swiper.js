import Swiper, { Navigation, Pagination } from "swiper";

Swiper.use([Navigation, Pagination]);

/* eslint-disable */
window.addEventListener(
  "DOMContentLoaded",
  () => {
    const swiper = new Swiper(".home__staff-slides", {
      slidesPerView: 2,
      slidesPerGroup: 2,
      spaceBetween: 10,
      lazy: true,
      loop: true,
      autoHeight: true,
      breakpoints: {
        480: {
          slidesPerView: 3,
          slidesPerGroup: 3,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 4,
          slidesPerGroup: 4,
          spaceBetween: 10,
        },
        960: {
          slidesPerView: 5,
          slidesPerGroup: 5,
          spaceBetween: 10,
        },
        1280: {
          slidesPerView: 6,
          slidesPerGroup: 6,
          spaceBetween: 20,
        },
        1600: {
          slidesPerView: 8,
          slidesPerGroup: 8,
          spaceBetween: 20,
        },
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });

    const content_features = new Swiper(".home__content-features-slides", {
      slidesPerView: 1,
      slidesPerGroup: 1,
      lazy: true,
      loop: true,
      autoHeight: true,
      observer: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  },
  false
);
/* eslint-enable */
