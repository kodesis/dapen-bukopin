<script>
    function check_email() {
        const ttlnamaValue = $('#email').val();


        if (!ttlnamaValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Email Tidak Boleh Kosong',
                timer: 1500
            });
        } else {
            const recaptchaResponse = grecaptcha.getResponse();
            if (!recaptchaResponse) {
                swal.fire({
                    customClass: 'slow-animation',
                    icon: 'error',
                    showConfirmButton: false,
                    title: 'Please complete the reCAPTCHA',
                    timer: 1500
                });
                return;
            }

            var base_url = "<?php echo base_url(); ?>";
            var url;
            var formData;
            url = "<?php echo site_url('auth/reset_password') ?>";

            // window.location = url_base;
            var formData = new FormData($("#login_form")[0]);
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
                    } else if (data.status === "Email Tidak Ada") {
                        swal.fire({
                            customClass: 'slow-animation',
                            icon: 'warning',
                            showConfirmButton: false,
                            title: 'Email Tidak Di Temukan',
                            timer: 1500
                        });
                    } else {
                        // document.getElementById('rumahadat').reset();
                        // $('#add_modal').modal('hide');
                        (JSON.stringify(data));
                        // alert(data)
                        swal.fire({
                            customClass: 'slow-animation',
                            icon: 'success',
                            showConfirmButton: false,
                            // title: 'Silahkan Cek Email',
                            title: 'Email Ditemukan!',
                            timer: 5000
                        }).then(() => {
                            // This code will execute after the timer ends
                            // window.location.href = base_url + 'auth'; // Redirect after the timer
                            window.location.href = base_url + data.url; // Redirect after the timer
                        });


                        // window.location.href = base_url + 'auth'; // Assuming 'dashboard' is the path for admin dashboard
                        // location.reload();

                    }
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