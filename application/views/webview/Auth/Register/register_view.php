<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapen Bukopin</title>



    <link rel="shortcut icon" href="<?= base_url() ?>assets/cms/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC" type="image/png">
    <link rel="stylesheet" href="<?= base_url() ?>assets/cms/compiled/css/app.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/cms/compiled/css/app-dark.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/cms/compiled/css/auth.css">

    <!-- SWAL NOTIF -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url() ?>assets/cms/extensions/jquery/jquery.min.js"></script>

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
        .form-group {
            position: relative;
        }

        .floating-placeholder {
            background-color: #fff;
            position: absolute;
            left: 45px;
            width: 150px;
            /* Adjust this to move it past the icon */
            top: 50%;
            /* Center vertically */
            transform: translateY(-50%);
            color: #aaa;
            pointer-events: none;
            transition: all 0.2s ease;
        }

        html[data-bs-theme=dark] .floating-placeholder {
            color: #c2c2d9;
            background-color: #1b1b29;
        }
    </style>
</head>

<body>
    <script src="<?= base_url() ?>assets/cms/static/js/initTheme.js"></script>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="auth-logo">
                                <a href="<?= base_url('index') ?>"><img src="<?= base_url() ?>/assets/cms/Logo/dapenbukopin_lg1.png" alt="Logo"></a>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="auth-logo d-flex justify-content-end">
                                <a class="font-bold" href="<?= base_url('') ?>" style="font-size:20px"><i class="bi bi-arrow-left"></i>
                                    Back</a>
                            </div>
                        </div> -->
                    </div>
                    <h1 class="auth-title">Sign Up</h1>
                    <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

                    <form id="register_form">
                        <!-- <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="nama" id="nama" class="form-control form-control-xl" placeholder="Nama">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div> -->
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="nip" id="nip" class="form-control form-control-xl" placeholder="NIP">
                            <div class="form-control-icon">
                                <i class="bi bi-123"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email" id="email" class="form-control form-control-xl" placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password1" id="password1" class="form-control form-control-xl" placeholder="Password">

                            <!-- Left icon (lock) -->
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>

                            <!-- Right icon (eye) -->
                            <div style="position: absolute; top: 50%; right: 20px; transform: translateY(-50%); z-index: 2; font-size: 1.6rem;">
                                <a style="color: #adb5bd;" href="javascript:void(0)" onclick="changePassword(1)">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password2" id="password2" class="form-control form-control-xl" placeholder="Confirm Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <div style="position: absolute; top: 50%; right: 20px; transform: translateY(-50%); z-index: 2; font-size: 1.6rem;">
                                <a style="color: #adb5bd;" href="javascript:void(0)" onclick="changePassword(2)">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </div>
                        </div>
                        <!-- <label for="tgl_lahir" class="floating-placeholder">Tanggal Lahir</label> -->
                        <div class="form-group position-relative has-icon-left mb-4">
                            <!-- <label for="tgl_lahir" id="label-tgl-lahir" class="floating-placeholder">Tanggal Lahir</label> -->
                            <input type="text" id="tgl_lahir" name="tgl_lahir" class="form-control form-control-xl" onclick="hidePlaceholder()" placeholder="Tanggal Lahir" height="10">
                            <div class="form-control-icon">
                                <i class="bi bi-calendar"></i>
                            </div>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6LdrlXUqAAAAAH2b5HCyPARILJdKDA9a5_scWnx_"></div>
                    </form>
                    <button onclick="register()" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Already have an account? <a href="<?= base_url('auth') ?>" class="font-bold">Log
                                in</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right" style="background: #fffeff; height: 100%; display: flex; justify-content: center; align-items: center;">
                    <img src="<?= base_url('assets/cms/Logo/Logo Dapen KB Bukopin PNG1.png') ?>" alt="" width="70%">
                </div>
            </div>
        </div>

    </div>
</body>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    // Initialize Flatpickr with dd/mm/yyyy format
    flatpickr("#tgl_lahir", {
        dateFormat: "d/m/Y",
        allowInput: true, // Allows user to type in the date manually as well
        placeholder: "Tanggal Lahir" // Adds a placeholder to the input
    });

    function hidePlaceholder() {
        document.getElementById("label-tgl-lahir").style.display = "none";
    }

    document.getElementById("tgl_lahir").addEventListener("blur", function() {
        // Show the label again if the input is empty when it loses focus
        if (this.value === "") {
            document.getElementById("label-tgl-lahir").style.display = "block";
        }
    });

    function changePassword(id) {
        var passwordField = document.getElementById("password" + id);

        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }


    function formatDateInput(input) {
        // Remove any characters that are not digits
        let date = input.value.replace(/[^0-9]/g, '');

        // Format as dd/mm/yyyy
        if (date.length >= 2) {
            date = date.slice(0, 2) + '/' + date.slice(2);
        }
        if (date.length >= 5) {
            date = date.slice(0, 5) + '/' + date.slice(5, 9);
        }

        // Set the formatted value back to the input field
        input.value = date;
    }
</script>
</script>

</html>