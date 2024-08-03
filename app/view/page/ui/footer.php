<?php require_once("../../../config/config.php"); ?>
<script src="<?=baseurl('dist/vendor/apexcharts/apexcharts.min.js')?>"></script>
<script src="<?=baseurl('dist/vendor/chart.js/chart.umd.js')?>"></script>
<script src="<?=baseurl('dist/vendor/echarts/echarts.min.js')?>"></script>
<script src="<?=baseurl('dist/vendor/quill/quill.js')?>"></script>
<script src="<?=baseurl('dist/vendor/simple-datatables/simple-datatables.js')?>"></script>
<script src="<?=baseurl('dist/vendor/tinymce/tinymce.min.js')?>"></script>
<script src="<?=baseurl('dist/vendor/php-email-form/validate.js')?>"></script>
<script src="<?=baseurl('dist/js/main.js')?>"></script>

<!-- Template Main JS File -->
<script crossorigin="anonymous" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>
<script crossorigin="anonymous" src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js">
</script>
<script crossorigin="anonymous" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script crossorigin="anonymous" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script crossorigin="anonymous" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
/* Settings DataTables */
new DataTable('#example1', {
        search: {
            return: false,
        },
    },
    $(document).ready(function() {
        $('#example1_filter').hide(true)
    }),
);

new DataTable('#example2', {
    search: {
        return: false,
    },
});

new DataTable('#example3', {
        search: {
            return: false,
        },
        "info": false,
        "ordering": false,
        "paging": false
    },
    $(document).ready(function() {
        $('#example3_filter').hide(true)
        $('#example3_length').hide(true)
    }),
);
/* Settings Pembayaran */
jQuery(document).ready(function($) {
    $('#cmb_siswa').change(function() { // Jika Select Box id provinsi dipilih
        var tamp = $(this).val(); // Ciptakan variabel provinsi
        $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
            url: '../pembayaran/get_siswa.php', // File yang akan memproses data
            data: 'tamp=' + tamp, // Data yang akan dikirim ke file pemroses
            success: function(data) { // Jika berhasil
                $('.tampung').html(data); // Berikan hasil ke id kota
            }
        });
    });
});

jQuery(document).ready(function($) {
    $('#cmb_pembayaran').change(function() { // Jika Select Box id provinsi dipilih
        var tamp = $(this).val(); // Ciptakan variabel provinsi
        $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
            url: '../pembayaran/get_nominal.php', // File yang akan memproses data
            data: 'tamp=' + tamp, // Data yang akan dikirim ke file pemroses
            success: function(data) { // Jika berhasil
                $('.tampung1').html(data); // Berikan hasil ke id kota
            }
        });
    });
});

function previewImage(input) {
    const file = input.files[0];
    if (file) {
        const preview = document.getElementById('preview');
        preview.src = URL.createObjectURL(file);
        preview.onload = function() {
            URL.revokeObjectURL(preview.src); // Free memory
        };
    }
}

function previewImageAyah(input) {
    const file = input.files[0];
    if (file) {
        const preview = document.getElementById('preview_ayah');
        preview.src = URL.createObjectURL(file);
        preview.onload = function() {
            URL.revokeObjectURL(preview.src); // Free memory
        };
    }
}

function previewImageIbu(input) {
    const file = input.files[0];
    if (file) {
        const preview = document.getElementById('preview_ibu');
        preview.src = URL.createObjectURL(file);
        preview.onload = function() {
            URL.revokeObjectURL(preview.src); // Free memory
        };
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const password = document.getElementById('passwrd');
    const repassword = document.getElementById('repasswrd');
    const error = document.getElementById('error');
    const success = document.getElementById('success');

    function validatePasswords() {
        if (password.value === repassword.value &&
            password.value !== '' && repassword.value !== '') {
            success.style.display = 'block';
            error.style.display = 'none';
        } else {
            success.style.display = 'none';
            if (password.value === '' || repassword.value === '') {
                error.style.display = 'none';
            } else {
                error.style.display = 'block';
            }
        }
    }
    // Menambahkan event listener untuk 'keyup' pada kedua input
    password.addEventListener('keyup', validatePasswords);
    repassword.addEventListener('keyup', validatePasswords);
    // Opsional: Validasi saat input kehilangan fokus
    password.addEventListener('blur', validatePasswords);
    repassword.addEventListener('blur', validatePasswords);
});
</script>
</body>

</html>