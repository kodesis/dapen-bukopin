<script src="<?= base_url() ?>assets/cms/static/js/initTheme.js"></script>
<script src="<?= base_url() ?>assets/cms/extensions/jquery/jquery.min.js"></script>
<script>
    // Function to toggle the password form visibility
    function ganti_password_form() {
        var checkbox = document.getElementById('ganti_password');
        var passwordForm = document.getElementById('form_password');

        // Toggle visibility of the password form based on checkbox state
        if (checkbox.checked) {
            passwordForm.classList.remove('hidden');
        } else {
            passwordForm.classList.add('hidden');
        }
    }

    // Initial check to hide the password form if checkbox is not checked
    document.addEventListener("DOMContentLoaded", function() {
        if (!document.getElementById('ganti_password').checked) {
            document.getElementById('form_password').classList.add('hidden');
        }
    });

    function update_profile() {

        const ttlnamaValue = $('#nama').val();
        const ttlemailValue = $('#email').val();
        const ttlcheckboxValue = $('#ganti_password').prop('checked'); // Check if the checkbox is checked
        const ttlpassword1Value = $('#password1').val();
        const ttlpassword2Value = $('#password2').val();


        if (ttlcheckboxValue == true) {
            // Check if Password1 is filled
            if (!ttlpassword1Value) {
                swal.fire({
                    customClass: 'slow-animation',
                    icon: 'error',
                    showConfirmButton: false,
                    title: 'Kolom Password Tidak Boleh Kosong',
                    timer: 1500
                });
                return; // Stop further validation if password1 is empty
            }
            // Check if Password2 is filled
            else if (!ttlpassword2Value) {
                swal.fire({
                    customClass: 'slow-animation',
                    icon: 'error',
                    showConfirmButton: false,
                    title: 'Kolom Konfirmasi Password Tidak Boleh Kosong',
                    timer: 1500
                });
                return; // Stop further validation if password2 is empty
            }
            // Check if Password1 and Password2 match
            else if (ttlpassword1Value !== ttlpassword2Value) {
                swal.fire({
                    customClass: 'slow-animation',
                    icon: 'error',
                    showConfirmButton: false,
                    title: 'Password Tidak Sama',
                    timer: 1500
                });
                return; // Stop further validation if passwords don't match
            }
        }

        if (!ttlnamaValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Email Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlemailValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Nama Tidak Boleh Kosong',
                timer: 1500
            });
        } else {
            var base_url = "<?php echo base_url(); ?>";
            var url;
            var formData;
            url = "<?php echo site_url('profile/update_profile') ?>";

            // window.location = url_base;
            var formData = new FormData($("#profile_form")[0]);
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                beforeSend: function() {
                    swal.fire({
                        icon: 'info',
                        timer: 3000,
                        showConfirmButton: false,
                        title: 'Loading...'

                    });
                },
                success: function(data) {
                    /* if(!data.status)alert("ho"); */
                    if (!data.status) {
                        swal.fire('Gagal menyimpan data', 'error');
                    }
                    // document.getElementById('rumahadat').reset();
                    // $('#add_modal').modal('hide');
                    (JSON.stringify(data));
                    // alert(data)
                    swal.fire({
                        customClass: 'slow-animation',
                        icon: 'success',
                        showConfirmButton: false,
                        title: 'Berhasil Update Profile',
                        timer: 1500
                    });


                    // if (data.status == 'admin') {
                    //     window.location.href = base_url + 'dashboard'; // Assuming 'dashboard' is the path for admin dashboard
                    // } else if (data.status == 'user') {
                    //     window.location.href = base_url + 'SaldoUser'; // Assuming 'SaldoUser' is the path for the user page
                    // }
                    // window.location.href = base_url + 'profile'; // Assuming 'dashboard' is the path for admin dashboard

                    // location.reload();

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal.fire('Operation Failed!', errorThrown, 'error');
                },
                complete: function() {
                    console.log('Editing job done');
                }
            });


        }
    }
</script>