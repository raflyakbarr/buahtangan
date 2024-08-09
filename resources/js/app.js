import './bootstrap';
import 'datatables.net-bs5';
import 'datatables.net-buttons-bs5';
import.meta.glob(["../images/**"]);
// Import Swiper JS
import Swiper from 'swiper/bundle';
import 'swiper/swiper-bundle.css';
import 'summernote/dist/summernote-bs4.css';
import 'summernote/dist/summernote-bs4.min.js';
import Quill from 'quill';
import 'quill/dist/quill.snow.css'; // Import Quill's Snow theme CSS
import ImageResize from 'quill-image-resize-module';
Quill.register('modules/imageResize', ImageResize);
