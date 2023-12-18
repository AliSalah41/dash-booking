import './bootstrap';
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.css';
import 'tinymce/tinymce';
import 'tinymce/themes/silver';
import 'tinymce/plugins/paste';

document.addEventListener('DOMContentLoaded', function() {
    tinymce.init({
        selector: 'textarea',  // Change this selector based on where you want to use the editor
        plugins: 'paste',
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image',
    });
});
