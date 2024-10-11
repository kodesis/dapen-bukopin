<script>
    function confirm_reset() {
        const ttlnamaValue = $('#password1').val();
        const ttlfileValue = $('#password2').val();


        if (!ttlnamaValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Email Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlfileValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Password Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (ttlnamaValue != ttlfileValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Password Tidak Sama',
                timer: 1500
            });
        } else {
            var base_url = "<?php echo base_url(); ?>";
            var url;
            var formData;
            url = "<?php echo site_url('auth/process_reset') ?>";

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
                    } else {
                        // document.getElementById('rumahadat').reset();
                        // $('#add_modal').modal('hide');
                        (JSON.stringify(data));
                        // alert(data)
                        swal.fire({
                            customClass: 'slow-animation',
                            icon: 'success',
                            showConfirmButton: false,
                            title: 'Berhasil Login',
                            timer: 1500
                        });


                        window.location.href = base_url + 'auth'; // Assuming 'dashboard' is the path for admin dashboard
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