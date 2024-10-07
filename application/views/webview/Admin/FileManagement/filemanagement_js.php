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
        iDisplayLength: 6,

        // Load data for the table's content from an Ajax source
        ajax: {
            url: "<?php echo site_url('Admin/filemanagement/ajax_list') ?> ",
            type: "POST",
            data: function(data) {}
        },
        columnDefs: [{
            targets: 6, // The 8th column (0-indexed)
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
    document.getElementById('tgl_lahir').value = year + '-' + month + '-' + day;
    document.getElementById('pegawai').value = year + '-' + month + '-' + day;
    document.getElementById('peserta').value = year + '-' + month + '-' + day;



    function add_file() {
        // const ttlemailValue = $('#deskripsi_add').val();

        const ttlnamaValue = $('#nama_add').val();
        const ttlfileValue = $('#file_add').val();
        const ttljenisfileValue = $('#jenis_file_add').val();
        const ttltipefileValue = $('#jenis_dokumen_add').val();
        // const ttlhalamanpageValue = $('#halaman_page_add').val();


        if (!ttlnamaValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Nama Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlfileValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom File Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttljenisfileValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Jenis File Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttltipefileValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Tipe Dokumen Tidak Boleh Kosong',
                timer: 1500
            });
            // } else if (!ttlhalamanpageValue) {
            //     swal.fire({
            //         customClass: 'slow-animation',
            //         icon: 'error',
            //         showConfirmButton: false,
            //         title: 'Kolom Halaman Page Tidak Boleh Kosong',
            //         timer: 1500
            //     });
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
                title: 'Ingin Menambahkan Data File?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Tambahkan',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {

                    var url;
                    var formData;
                    url = "<?php echo site_url('Admin/filemanagement/save') ?>";

                    // window.location = url_base;
                    var formData = new FormData($("#add_file")[0]);
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
                                    title: 'Berhasil Menambahkan File',
                                    timer: 1500
                                });
                                document.getElementById('add_file').reset(); // Reset the form
                                $('#add_modal').modal('hide'); // Hide the modal
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

    function upload_user() {
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
                title: 'Ingin Menambahkan File?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Tambahkan',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {

                    var url;
                    var formData;
                    url = "<?php echo site_url('Admin/filemanagement/process_insert_excel') ?>";

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
                                // document.getElementById('rumahadat').reset();
                                // $('#add_modal').modal('hide');
                                (JSON.stringify(data));
                                // alert(data)
                                swal.fire({
                                    customClass: 'slow-animation',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    title: 'Berhasil Menambahkan File',
                                    timer: 1500
                                });
                                document.getElementById('upload_user').reset(); // Reset the form
                                $('#upload_modal').modal('hide'); // Hide the modal
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

    function onEdit(id) {
        $('#edit_file')[0].reset(); // reset form on modals
        // $('.form-group').removeClass('has-error'); // clear error class
        // $('.help-block').empty(); // clear error string
        // $('.modal-title').text('Edit Poster');
        console.log('bisa 1')
        $.ajax({
            url: "<?php echo site_url('Admin/filemanagement/ajax_edit/') ?>" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {

                JSON.stringify(data.uid);
                // alert(JSON.stringify(data));

                $('#id_edit').val(data.uid);
                $('#nama_edit').val(data.nama_file);
                $('#deskripsi_edit').val(data.deskripsi_file);
                $('#jenis_file_edit').val(data.jenis_file);
                $('#jenis_dokumen_edit').val(data.tipe);
                // $('#halaman_page_edit').val(data.halaman_page);

                $('.dropdown-toggle').dropdown();

                $('#edit_modal').modal('show'); // show bootstrap modal when complete loaded
                console.log('bisa 2')




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

    function update_file() {

        const ttlnamaValue = $('#nama_edit').val();
        const ttlroleValue = $('#jenis_file_edit').val();
        const ttltipeValue = $('#jenis_dokumen_edit').val();
        // const ttlnikValue = $('#halaman_page_edit').val();

        if (!ttlnamaValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Nama File Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttlroleValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Jenis File Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttltipeValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Tipe Dokumen Tidak Boleh Kosong',
                timer: 1500
            });
            // } else if (!ttlnikValue) {
            //     swal.fire({
            //         customClass: 'slow-animation',
            //         icon: 'error',
            //         showConfirmButton: false,
            //         title: 'Kolom Halaman Page Tidak Boleh Kosong',
            //         timer: 1500
            //     });
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
                title: 'Ingin Mengubah Data File?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Ubah',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {

                    var url;
                    var formData;
                    url = "<?php echo site_url('Admin/filemanagement/update') ?>";

                    // window.location = url_base;
                    var formData = new FormData($("#edit_file")[0]);
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
                                    title: 'Berhasil Mengubah Data File',
                                    timer: 1500
                                });
                                document.getElementById('edit_file').reset(); // Reset the form
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
                    url: "<?php echo site_url('Admin/filemanagement/delete') ?>",
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