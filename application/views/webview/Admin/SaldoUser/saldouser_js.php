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
    let jquery_datatable = $("#table1").DataTable({
        responsive: true,
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.
        order: [], //Initial no order.
        iDisplayLength: 10,

        // Load data for the table's content from an Ajax source
        ajax: {
            url: "<?php echo site_url('Admin/SaldoUser/ajax_list') ?> ",
            type: "POST",
            data: function(data) {}
        },
        columnDefs: [{
            targets: 14, // The 8th column (0-indexed)
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
    document.getElementById('tanggal_upload').value = year + '-' + month + '-' + day;


    function add_user() {
        const ttlips_awalValue = $('#ips_awal_add').val();
        const ttlipk_awalValue = $('#ipk_awal_add').val();
        const ttltotal_awalValue = $('#total_awal_add').val();
        const ttlips_iuranValue = $('#ips_iuran_add').val();
        const ttlipk_iuranValue = $('#ipk_iuran_add').val();
        const ttlips_pValue = $('#ips_p_add').val();
        const ttlipk_pValue = $('#ipk_p_add').val();
        const ttlips_akhirValue = $('#ips_akhir_add').val();
        const ttlipk_akhirValue = $('#ipk_akhir_add').val();
        const ttltotal_akhirValue = $('#total_akhir_add').val();
        const tglDataValue = $('#tanggal_data_add').val();

        if (!ttlips_awalValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Ips Awal Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlipk_awalValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Ipk Awal Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttltotal_awalValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Total Awal Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlips_iuranValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Ips Iuran Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlipk_iuranValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Ipk Iuran Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlips_pValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Ips P Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlipk_pValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Ipk P Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlips_akhirValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Ips Akhir Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlipk_akhirValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Ipk Akhir Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttltotal_akhirValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Total Akhir Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!tglDataValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Tanggal Data Tidak Boleh Kosong',
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
                title: 'Ingin Menambahkan Data Saldo?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Tambahkan',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {

                    var url;
                    var formData;
                    url = "<?php echo site_url('Admin/SaldoUser/save') ?>";

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
                                if (data.status == "Peserta Tidak ada") {
                                    swal.fire({
                                        customClass: 'slow-animation',
                                        icon: 'warning',
                                        showConfirmButton: false,
                                        title: 'Peserta Tidak ada',
                                        text: 'Kode Peserta : ' + data.peserta,
                                        timer: 1500
                                    });
                                } else if (data.status == "Menimpa") {
                                    // document.getElementById('rumahadat').reset();
                                    // $('#add_modal').modal('hide');
                                    (JSON.stringify(data));
                                    // alert(data)
                                    swal.fire({
                                        customClass: 'slow-animation',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        title: 'Berhasil Menimpa Data Saldo',
                                        text: 'UID : ' + data.uid,
                                        timer: 1500
                                    });
                                    // document.getElementById('add_user').reset(); // Reset the form
                                    $('#table1').DataTable().ajax.reload(); // Assuming you are using AJAX to load data
                                } else {
                                    {
                                        // document.getElementById('rumahadat').reset();
                                        // $('#add_modal').modal('hide');
                                        (JSON.stringify(data));
                                        // alert(data)
                                        swal.fire({
                                            customClass: 'slow-animation',
                                            icon: 'success',
                                            showConfirmButton: false,
                                            title: 'Berhasil Menambahkan Data Saldo',
                                            timer: 1500
                                        });
                                        document.getElementById('add_user').reset(); // Reset the form
                                        $('#table1').DataTable().ajax.reload(); // Assuming you are using AJAX to load data
                                    }
                                }
                                $('#add_modal').modal('hide'); // Hide the modal
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

    function upload_user() {
        const ttltanggalValue = $('#tanggal_upload').val();
        const ttlnamaValue = $('#file').val();


        if (!ttltanggalValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Tanggal Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlnamaValue) {
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
                title: 'Ingin Menambahkan Data Saldo?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Tambahkan',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {

                    var url;
                    var formData;
                    url = "<?php echo site_url('Admin/SaldoUser/process_insert_excel') ?>";

                    // window.location = url_base;
                    var formData = new FormData($("#upload_user")[0]);
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
                                if (data.status == "Peserta Tidak ada") {
                                    swal.fire({
                                        customClass: 'slow-animation',
                                        icon: 'warning',
                                        showConfirmButton: false,
                                        title: 'Peserta Tidak ada',
                                        text: 'Kode Peserta : ' + data.peserta,
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
                                        title: 'Berhasil Menambahkan Data Saldo',
                                        timer: 1500
                                    });
                                    document.getElementById('upload_user').reset(); // Reset the form
                                    $('#table1').DataTable().ajax.reload(); // Assuming you are using AJAX to load data
                                }
                                $('#upload_modal').modal('hide'); // Hide the modal
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

    function onEdit(id) {
        $('#edit_user')[0].reset(); // reset form on modals
        // $('.form-group').removeClass('has-error'); // clear error class
        // $('.help-block').empty(); // clear error string
        // $('.modal-title').text('Edit Poster');
        console.log('bisa 1')
        $.ajax({
            url: "<?php echo site_url('Admin/SaldoUser/ajax_edit/') ?>" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {

                JSON.stringify(data.uid);
                // alert(JSON.stringify(data));

                $('#nama_edit').text('Nama :' + data.nama);
                $('#kd_edit').text('Kode Peserta :' + data.kd_peserta);
                $('#id_edit').val(data.uid);
                $('#ips_awal_edit').val(data.ips_awal);
                $('#ipk_awal_edit').val(data.ipk_awal);
                $('#total_awal_edit').val(data.total_awal);
                $('#ips_iuran_edit').val(data.ips_iuran);
                $('#ipk_iuran_edit').val(data.ipk_iuran);
                $('#ips_p_edit').val(data.ips_p);
                $('#ipk_p_edit').val(data.ipk_p);
                $('#ips_akhir_edit').val(data.ips_akhir);
                $('#ipk_akhir_edit').val(data.ipk_akhir);
                $('#total_akhir_edit').val(data.total_akhir);
                $('#tanggal_data_edit').val(data.tanggal_data);

                $('.dropdown-toggle').dropdown();

                $('#edit_modal').modal('show'); // show bootstrap modal when complete loaded
                console.log('bisa 2')

                $.ajax({
                    url: '<?php echo site_url('Admin/SaldoUser/cat_list'); ?>',
                    type: 'GET',
                    dataType: 'json',
                    success: function(categoryData) { // Use a different variable name (e.g., categoryData) to avoid confusion
                        console.log('Data from server:', categoryData);
                        $('#role_edit').empty();

                        // Populate the select element with data from the server
                        $.each(categoryData, function(index, item) {
                            var option = $('<option value="' + item.id + '">' + item.role_name + '</option>');
                            if (item.id === data.role_id) { // Compare with data.id_cat_announcement
                                option.prop('selected', true); // Automatically select the desired option
                            }
                            $('#role_edit').append(option);
                        });
                    }
                });




            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });

        // $.ajax({
        //     url: '<?php echo site_url('admin/master/announcement/cat_list'); ?>',
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

        const ttlips_awalValue = $('#ips_awal_edit').val();
        const ttlipk_awalValue = $('#ipk_awal_edit').val();
        const ttltotal_awalValue = $('#total_awal_edit').val();
        const ttlips_iuranValue = $('#ips_iuran_edit').val();
        const ttlipk_iuranValue = $('#ipk_iuran_edit').val();
        const ttlips_pValue = $('#ips_p_edit').val();
        const ttlipk_pValue = $('#ipk_p_edit').val();
        const ttlips_akhirValue = $('#ips_akhir_edit').val();
        const ttlipk_akhirValue = $('#ipk_akhir_edit').val();
        const ttltotal_akhirValue = $('#total_akhir_edit').val();
        const tglDataValue = $('#tanggal_data_edit').val();

        if (!ttlips_awalValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Ips Awal Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlipk_awalValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Ipk Awal Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttltotal_awalValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Total Awal Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlips_iuranValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Ips Iuran Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlipk_iuranValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Ipk Iuran Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlips_pValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Ips P Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlipk_pValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Ipk P Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlips_akhirValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Ips Akhir Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlipk_akhirValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Ipk Akhir Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttltotal_akhirValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Total Akhir Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!tglDataValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Tanggal Data Tidak Boleh Kosong',
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
                title: 'Ingin Mengubah Data Saldo?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Ubah',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {

                    var url;
                    var formData;
                    url = "<?php echo site_url('Admin/SaldoUser/update') ?>";

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
                                    title: 'Berhasil Mengubah Data Saldo',
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
    }

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
                    url: "<?php echo site_url('Admin/SaldoUser/delete') ?>",
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
</script>