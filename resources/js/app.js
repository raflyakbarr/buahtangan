import './bootstrap';
import 'datatables.net-bs5';
import 'datatables.net-buttons-bs5';
import.meta.glob(["../images/**"]);
// Import Swiper JS
import Swiper from 'swiper/bundle';
import 'swiper/swiper-bundle.css';
import 'summernote/dist/summernote-bs4.css';
import 'summernote/dist/summernote-bs4.min.js';

$(document).ready(function() {
    $('#membersTable').DataTable();
    $('#articlesTable').DataTable();
    var swiper = new Swiper(".swiperCube", {
        effect: "cube",
        grabCursor: true,
        cubeEffect: {
          shadow: true,
          slideShadows: true,
          shadowOffset: 20,
          shadowScale: 0.94,
        },
        pagination: {
          el: ".swiper-pagination",
        },
      });
});

