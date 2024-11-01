<link rel="stylesheet" href="<?= base_url() ?>assets/cms/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/cms/compiled/css/table-datatable-jquery.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/cms/compiled/css/app.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/cms/compiled/css/app-dark.css">

<script src="<?= base_url() ?>assets/cms/static/js/initTheme.js"></script>
<script src="<?= base_url() ?>assets/cms/extensions/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/cms/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/cms/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>assets/cms/static/js/pages/datatables.js"></script>
<script>
    $(document).ready(function() {


    });
    let jquery_datatable = $("#table1").DataTable({
        responsive: true,
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.
        order: [], //Initial no order.
        iDisplayLength: 10,

        // Load data for the table's content from an Ajax source
        ajax: {
            url: "<?php echo site_url('Admin/UserManagement/ajax_list') ?> ",
            type: "POST",
            data: function(data) {}
        },
        columnDefs: [{
            targets: 10, // The 8th column (0-indexed)
            orderable: false // Disable sorting
        }]
    })

    // Get today's date
    var today = new Date();

    // Format the date to YYYY-MM-DD
    var day = ("0" + today.getDate()).slice(-2); // Add leading zero for single-digit days
    var month = ("0" + (today.getMonth() + 1)).slice(-2); // Add leading zero for single-digit months
    var year = today.getFullYear();

    // Set the input field's value to the current date
    document.getElementById('tgl_lahir_add').value = year + '-' + month + '-' + day;
    document.getElementById('pegawai_add').value = year + '-' + month + '-' + day;
    document.getElementById('peserta_add').value = year + '-' + month + '-' + day;

    document.getElementById('tgl_lahir_add_nip').value = year + '-' + month + '-' + day;
    document.getElementById('pegawai_add_nip').value = year + '-' + month + '-' + day;
    document.getElementById('peserta_add_nip').value = year + '-' + month + '-' + day;
    document.getElementById('tanggal_upload').value = year + '-' + month + '-' + day;


    function add_user_nip() {

        const ttlkdpesertaValue = $('#kd_peserta_add_nip').val();
        // const ttlnikValue = $('#nik_add_nip').val();
        const ttltgl_lahirValue = $('#tgl_lahir_add_nip').val();
        const ttlpegawaiValue = $('#pegawai_add_nip').val();
        const ttlpesertaValue = $('#peserta_add_nip').val();


        if (!ttlkdpesertaValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Kode Peserta Tidak Boleh Kosong',
                timer: 1500
            });
            // } else if (!ttlnikValue) {
            //     swal.fire({
            //         customClass: 'slow-animation',
            //         icon: 'error',
            //         showConfirmButton: false,
            //         title: 'Kolom NIK Tidak Boleh Kosong',
            //         timer: 1500
            //     });
        } else if (!ttltgl_lahirValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Tanggal Lahir Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlpegawaiValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Pegawai Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlpesertaValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Peserta Tidak Boleh Kosong',
                timer: 1500
            });
        } else {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    InputEvent: 'form-control',
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Ingin Menambahkan Data NIP User?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Tambahkan',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {

                    var url;
                    var formData;
                    url = "<?php echo site_url('Admin/UserManagement/save_nip') ?>";

                    // window.location = url_base;
                    var formData = new FormData($("#add_user_nip")[0]);
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
                            if (!data.status) swal.fire('Gagal menyimpan data', 'error');
                            else {
                                if (data.status == 'NIK Sudah di Pakai') {
                                    swal.fire({
                                        customClass: 'slow-animation',
                                        icon: 'warning',
                                        showConfirmButton: false,
                                        title: 'NIK Sudah Di gunakan',
                                        text: 'NIK : ' + data.nik,
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
                                        title: 'Berhasil Menambahkan Data User',
                                        timer: 1500
                                    });
                                    document.getElementById('add_user_nip').reset(); // Reset the form
                                    $('#table1').DataTable().ajax.reload(); // Assuming you are using AJAX to load data
                                    $('#add_nip_modal').modal('hide'); // Hide the modal
                                    // location.reload();
                                }
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

            })
        }
    }

    function add_user() {
        const ttlnamaValue = $('#nama_add').val();
        const ttlemailValue = $('#email_add').val();
        const ttlkd_pesertaValue = $('#kd_peserta_add').val();
        const ttlroleValue = $('#role_add').val();
        const ttlpassword1Value = $('#password1_add').val();
        const ttlpassword2Value = $('#password2_add').val();
        // const ttlnikValue = $('#nik_add').val();
        const ttlalamatValue = $('#alamat_add').val();
        const ttltgl_lahirValue = $('#tgl_lahir_add').val();
        const ttlpegawaiValue = $('#pegawai_add').val();
        const ttlpesertaValue = $('#peserta_add').val();


        if (!ttlnamaValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Nama Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlemailValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Email Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlkd_pesertaValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Kode Peserta Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlroleValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Role Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlpassword1Value) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Password Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlpassword2Value) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Konfirmasi Password Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (ttlpassword1Value !== ttlpassword2Value) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Password dan Konfirmasi Password Tidak Cocok',
                timer: 1500
            });
            // } else if (!ttlnikValue) {
            //     swal.fire({
            //         customClass: 'slow-animation',
            //         icon: 'error',
            //         showConfirmButton: false,
            //         title: 'Kolom NIK Tidak Boleh Kosong',
            //         timer: 1500
            //     });
        } else if (!ttlalamatValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Alamat Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttltgl_lahirValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Tanggal Lahir Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlpegawaiValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Pegawai Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlpesertaValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Peserta Tidak Boleh Kosong',
                timer: 1500
            });
        } else {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    InputEvent: 'form-control',
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Ingin Menambahkan Data User?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Tambahkan',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {

                    var url;
                    var formData;
                    url = "<?php echo site_url('Admin/UserManagement/save') ?>";

                    // window.location = url_base;
                    var formData = new FormData($("#add_user")[0]);
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
                            if (!data.status) swal.fire('Gagal menyimpan data', 'error');
                            else {
                                if (data.status == 'Kode Peserta Sudah di Pakai') {
                                    swal.fire({
                                        customClass: 'slow-animation',
                                        icon: 'warning',
                                        showConfirmButton: false,
                                        title: 'Kode Peserta Sudah Di gunakan',
                                        text: 'Kode Peserta : ' + data.kd_peserta,
                                        timer: 1500
                                    });
                                } else if (data.status == 'NIK Sudah di Pakai') {
                                    swal.fire({
                                        customClass: 'slow-animation',
                                        icon: 'warning',
                                        showConfirmButton: false,
                                        title: 'NIK Sudah Di gunakan',
                                        text: 'NIK : ' + data.nik,
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
                                        title: 'Berhasil Menambahkan Data User',
                                        timer: 1500
                                    });
                                    document.getElementById('add_user').reset(); // Reset the form
                                    $('#table1').DataTable().ajax.reload(); // Assuming you are using AJAX to load data
                                    $('#add_modal').modal('hide'); // Hide the modal
                                    // location.reload();
                                }
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

            })
        }
    }

    function upload_user() {
        const ttltanggalValue = $('#tanggal_upload').val();
        const ttlnamaValue = $('#file').val();


        if (!ttlnamaValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom File Tidak Boleh Kosong',
                timer: 1500
            });
        } else {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    InputEvent: 'form-control',
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Ingin Menambahkan Data User?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Tambahkan',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {

                    var url;
                    var formData;
                    url = "<?php echo site_url('Admin/UserManagement/process_insert_excel') ?>";
                    // window.location = url_base;
                    var formData = new FormData($("#upload_user")[0]);
                    let accumulatedResponse = ""; // Variable to accumulate the response

                    $.ajax({
                        url: url,
                        type: "POST",
                        dataType: "text", // Change to 'text' to handle server-sent events
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            // Show the progress dialog before sending the request
                            Swal.fire({
                                title: 'Uploading...',
                                html: `
                <progress id="progressBar" value="0" max="100" style="width: 100%;"></progress>
                <div id="progressText" style="margin-top: 10px; font-weight: bold;">0/0 Data</div>
            `,
                                allowOutsideClick: false,
                                showConfirmButton: false
                            });
                        },
                        xhrFields: {
                            onprogress: function(e) {
                                // Read the response text for progress updates
                                accumulatedResponse += e.currentTarget.responseText; // Accumulate responses

                                var response = e.currentTarget.responseText.trim().split('\n');

                                // Loop through each line to find progress data
                                response.forEach(function(line) {
                                    try {
                                        var progressData = JSON.parse(line.replace("data: ", ""));
                                        if (progressData.progress) {
                                            $("#progressBar").val(progressData.progress);
                                            $("#progressText").text(`${progressData.currentRow}/${progressData.totalRows} Data`);
                                        }
                                    } catch (error) {
                                        console.error("Error parsing progress data:", error);
                                    }
                                });
                            },
                        },
                        success: function(data) {
                            try {
                                // Attempt to parse the final response
                                var finalResponse = JSON.parse(accumulatedResponse.trim().split('\n').pop()); // Get the last line which should be the status
                                console.log("Response data:", finalResponse); // Log final response to see its structure

                                if (!finalResponse.status) {
                                    swal.fire('Gagal menyimpan data', 'error');
                                } else {
                                    swal.fire({
                                        customClass: 'slow-animation',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        title: 'Berhasil Menambahkan Data User',
                                        timer: 3000 // Adjust timer for visibility
                                    });

                                    document.getElementById('upload_user').reset(); // Reset the form
                                    $('#upload_modal').modal('hide'); // Hide the modal
                                    $('#table1').DataTable().ajax.reload(); // Reload the data table
                                }
                            } catch (error) {
                                // If parsing fails, log the error
                                console.error("Error parsing final response:", error);
                                swal.fire('Gagal menyimpan data', 'error');
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            // Handle error here
                            swal.fire('Operation Failed!', errorThrown, 'error');
                        },
                        complete: function() {
                            console.log('Editing job done');
                        }
                    });

                }

            })
        }
    }

    function onEdit(id) {
        $('#edit_user')[0].reset(); // reset form on modals
        // $('.form-group').removeClass('has-error'); // clear error class
        // $('.help-block').empty(); // clear error string
        // $('.modal-title').text('Edit Poster');
        console.log('bisa 1')
        $.ajax({
            url: "<?php echo site_url('Admin/UserManagement/ajax_edit/') ?>" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {

                JSON.stringify(data.uid);
                // alert(JSON.stringify(data));

                $('#id_edit').val(data.uid);
                $('#nama_edit').val(data.nama);
                $('#email_edit').val(data.email);
                $('#kd_peserta_edit').val(data.kd_peserta);
                $('#nik_edit').val(data.nik);
                $('#alamat_edit').val(data.alamat);
                $('#tgl_lahir_edit').val(data.tgl_lahir);
                $('#pegawai_edit').val(data.pegawai);
                $('#peserta_edit').val(data.peserta);
                $('#role_edit').val(data.role_id);


                $('.dropdown-toggle').dropdown();

                $('#edit_modal').modal('show'); // show bootstrap modal when complete loaded
                console.log('bisa 2')

                // $.ajax({
                //     url: '<?php echo site_url('Admin/UserManagement/cat_list'); ?>',
                //     type: 'GET',
                //     dataType: 'json',
                //     success: function(categoryData) { // Use a different variable name (e.g., categoryData) to avoid confusion
                //         console.log('Data from server:', categoryData);
                //         $('#role_edit').empty();

                //         // Populate the select element with data from the server
                //         $.each(categoryData, function(index, item) {
                //             var option = $('<option value="' + item.id + '">' + item.role_name + '</option>');
                //             if (item.id === data.role_id) { // Compare with data.id_cat_announcement
                //                 option.prop('selected', true); // Automatically select the desired option
                //             }
                //             $('#role_edit').append(option);
                //         });
                //     }
                // });

                console.log('bisa 3')



            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });

        // $.ajax({
        //     url: '<?php echo site_url('Admin/master/announcement/cat_list'); ?>',
        //     type: 'GET',
        //     dataType: 'json',
        //     success: function(data) {
        //         var selectedItemId = data.id; // Replace with your specific criteria
        //         // Populate the select element with data from the server
        //         $.each(data, function(index, item) {
        //             var option = $('<option value="' + item.id + '">' + item.category_name + '</option>');
        //             if (item.id === selectedItemId) {
        //                 option.prop('selected', true); // Automatically select the desired option
        //             }
        //             $('#category_edit').append(option);
        //         });
        //     }
        // });
    }

    function onEditPassword(id) {
        $('#edit_user')[0].reset(); // reset form on modals
        // $('.form-group').removeClass('has-error'); // clear error class
        // $('.help-block').empty(); // clear error string
        // $('.modal-title').text('Edit Poster');
        console.log('bisa 1')

        $('#edit_password_modal').modal('show'); // show bootstrap modal when complete loaded
        console.log('bisa 2')


        console.log('bisa 3')
    }

    function update_password_user() {
        const ttlpassword1Value = $('#password1_edit').val();
        const ttlpassword2Value = $('#password2_edit').val();

        if (!ttlpassword1Value) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Password Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlpassword2Value) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Konfirmasi Password Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (ttlpassword1Value !== ttlpassword2Value) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Password dan Konfirmasi Password Tidak Cocok',
                timer: 1500
            });
        } else {

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    InputEvent: 'form-control',
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Ingin Mengubah Data User?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Ubah',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {

                    var url;
                    var formData;
                    url = "<?php echo site_url('Admin/UserManagement/update_password') ?>";

                    // window.location = url_base;
                    var formData = new FormData($("#edit_password_user")[0]);
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
                            if (!data.status) swal.fire('Gagal menyimpan data', 'error');
                            else {
                                // document.getElementById('rumahadat').reset();
                                // $('#add_modal').modal('hide');
                                (JSON.stringify(data));
                                // alert(data)
                                swal.fire({
                                    customClass: 'slow-animation',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    title: 'Berhasil Mengubah Password User',
                                    timer: 1500
                                });
                                document.getElementById('edit_password_user').reset(); // Reset the form
                                $('#edit_password_modal').modal('hide'); // Hide the modal
                                $('#table1').DataTable().ajax.reload(); // Assuming you are using AJAX to load data
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

            })
        }
    }


    function edit_password() {
        var checkbox = document.getElementById('update_password');
        var passwordInput1 = document.getElementById('password1_edit');
        var passwordInput2 = document.getElementById('password2_edit');

        if (checkbox.checked) {
            // Remove the readonly attribute
            passwordInput1.removeAttribute('readonly');
            passwordInput2.removeAttribute('readonly');

        } else {
            // Add the readonly attribute
            passwordInput1.setAttribute('readonly', true);
            passwordInput2.setAttribute('readonly', true);

        }
    }

    function update_user() {

        const ttlnamaValue = $('#nama_edit').val();
        const ttlemailValue = $('#email_edit').val();
        const ttlkd_pesertaValue = $('#kd_peserta_edit').val();
        const ttlroleValue = $('#role_edit').val();
        // const ttlnikValue = $('#nik_edit').val();
        const ttlupdate_passwordValue = $('#update_password').is(':checked');
        const ttlalamatValue = $('#alamat_edit').val();
        const ttltgl_lahirValue = $('#tgl_lahir_edit').val();
        const ttlpegawaiValue = $('#pegawai_edit').val();
        const ttlpesertaValue = $('#peserta_edit').val();


        if (ttlupdate_passwordValue) {
            const ttlpassword1Value = $('#password1_edit').val();
            const ttlpassword2Value = $('#password2_edit').val();

            if (!ttlpassword1Value) {
                swal.fire({
                    customClass: 'slow-animation',
                    icon: 'error',
                    showConfirmButton: false,
                    title: 'Kolom Password Tidak Boleh Kosong',
                    timer: 1500
                });
            } else if (!ttlpassword2Value) {
                swal.fire({
                    customClass: 'slow-animation',
                    icon: 'error',
                    showConfirmButton: false,
                    title: 'Kolom Konfirmasi Password Tidak Boleh Kosong',
                    timer: 1500
                });
            } else if (ttlpassword1Value !== ttlpassword2Value) {
                swal.fire({
                    customClass: 'slow-animation',
                    icon: 'error',
                    showConfirmButton: false,
                    title: 'Password dan Konfirmasi Password Tidak Cocok',
                    timer: 1500
                });
            }
        }

        // if (!ttlnamaValue) {
        //     swal.fire({
        //         customClass: 'slow-animation',
        //         icon: 'error',
        //         showConfirmButton: false,
        //         title: 'Kolom Nama Tidak Boleh Kosong',
        //         timer: 1500
        //     });
        // } else if (!ttlemailValue) {
        //     swal.fire({
        //         customClass: 'slow-animation',
        //         icon: 'error',
        //         showConfirmButton: false,
        //         title: 'Kolom Email Tidak Boleh Kosong',
        //         timer: 1500
        //     });
        // } else if (!ttlkd_pesertaValue) {
        //     swal.fire({
        //         customClass: 'slow-animation',
        //         icon: 'error',
        //         showConfirmButton: false,
        //         title: 'Kolom Kode Peserta Tidak Boleh Kosong',
        //         timer: 1500
        //     });
        // } else if (!ttlroleValue) {
        //     swal.fire({
        //         customClass: 'slow-animation',
        //         icon: 'error',
        //         showConfirmButton: false,
        //         title: 'Kolom Role Tidak Boleh Kosong',
        //         timer: 1500
        //     });
        // } else if (!ttlnikValue) {
        //     swal.fire({
        //         customClass: 'slow-animation',
        //         icon: 'error',
        //         showConfirmButton: false,
        //         title: 'Kolom NIK Tidak Boleh Kosong',
        //         timer: 1500
        //     });
        // } else if (!ttlalamatValue) {
        //     swal.fire({
        //         customClass: 'slow-animation',
        //         icon: 'error',
        //         showConfirmButton: false,
        //         title: 'Kolom Alamat Tidak Boleh Kosong',
        //         timer: 1500
        //     });
        // } else if (!ttltgl_lahirValue) {
        //     swal.fire({
        //         customClass: 'slow-animation',
        //         icon: 'error',
        //         showConfirmButton: false,
        //         title: 'Kolom Tanggal Lahir Tidak Boleh Kosong',
        //         timer: 1500
        //     });
        // } else if (!ttlpegawaiValue) {
        //     swal.fire({
        //         customClass: 'slow-animation',
        //         icon: 'error',
        //         showConfirmButton: false,
        //         title: 'Kolom Pegawai Tidak Boleh Kosong',
        //         timer: 1500
        //     });
        // } else if (!ttlpesertaValue) {
        //     swal.fire({
        //         customClass: 'slow-animation',
        //         icon: 'error',
        //         showConfirmButton: false,
        //         title: 'Kolom Peserta Tidak Boleh Kosong',
        //         timer: 1500
        //     });
        // } else {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                InputEvent: 'form-control',
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Ingin Mengubah Data User?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Ubah',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {

            if (result.isConfirmed) {

                var url;
                var formData;
                url = "<?php echo site_url('Admin/UserManagement/update') ?>";

                // window.location = url_base;
                var formData = new FormData($("#edit_user")[0]);
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
                        if (!data.status) swal.fire('Gagal menyimpan data', 'error');
                        else {
                            // document.getElementById('rumahadat').reset();
                            // $('#add_modal').modal('hide');
                            (JSON.stringify(data));
                            // alert(data)
                            swal.fire({
                                customClass: 'slow-animation',
                                icon: 'success',
                                showConfirmButton: false,
                                title: 'Berhasil Mengubah Data User',
                                timer: 1500
                            });
                            document.getElementById('edit_user').reset(); // Reset the form
                            $('#edit_modal').modal('hide'); // Hide the modal
                            $('#table1').DataTable().ajax.reload(); // Assuming you are using AJAX to load data
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

        })
    }
    // }

    function onDelete(id) {

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Apakah anda yakin ingin menghapus Data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus Data',
            cancelButtonText: 'Tidak',
            reverseButtons: true
        }).then((result) => {

            if (result.isConfirmed) {

                $.ajax({
                    url: "<?php echo site_url('Admin/UserManagement/delete') ?>",
                    type: "POST",
                    data: {
                        id_delete: id
                    },
                    dataType: "JSON",
                    beforeSend: function() {
                        // showLoading("Saving data...", "Mohon tunggu");
                    },
                    success: function(data) {
                        if (!data.status) showAlert('Gagal!', data.message.toString().replace(/<[^>]*>/g, ''), 'error');
                        else {
                            swalWithBootstrapButtons.fire(
                                'Terhapus!',
                                'Data berhasil dihapus.',
                                'success'
                            )
                            $('#table1').DataTable().ajax.reload(); // Assuming you are using AJAX to load data
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        swalWithBootstrapButtons.fire(
                            'Gagal',
                            'Data gagal dihapus',
                            'error'
                        )
                    },
                    complete: function() {
                        console.log('published job done');
                    }
                });


            }

        })



    }

    function onApprove_req(id) {
        // $('#edit_modal')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        // $('.modal-title').text('Edit Poster');

        $.ajax({
            url: "<?php echo site_url('Admin/UserManagement/ajax_edit/') ?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {

                // JSON.stringify(data.id_employee);
                // alert(JSON.stringify(data));
                // alert(data);
                $('#id_edit_status').val(data.uid);
                $('#status_user').val(data.active);

                $('#approval_modal_req').modal('show'); // show bootstrap modal when complete loaded

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function status_req() {
        id = $('#id_edit_status').val();
        var url;
        url = "<?php echo site_url('Admin/UserManagement/status_req') ?>";

        var formData = new FormData($("#status_request")[0]);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            beforeSend: function() {
                swal.fire("Saving data...");

            },
            success: function(data) {
                /* if(!data.status)alert("ho"); */
                if (!data.status) swal.fire('Gagal menyimpan data', 'error ');
                else {
                    // document.getElementById('PakaianAdat').reset();

                    (JSON.stringify(data));
                    swal.fire({
                        customClass: 'slow-animation',
                        icon: 'success',
                        showConfirmButton: false,
                        title: 'Berhasil Mengedit Konten',
                        timer: 1500

                    });


                    $('#table1').DataTable().ajax.reload(); // Assuming you are using AJAX to load data

                    $('#approval_modal_req').modal('hide');

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
</script>