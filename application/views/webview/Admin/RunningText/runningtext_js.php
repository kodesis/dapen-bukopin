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
            url: "<?php echo site_url('Admin/RunningText/ajax_list') ?> ",
            type: "POST",
            data: function(data) {}
        },
        columnDefs: [{
            targets: 2, // The 8th column (0-indexed)
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
    document.getElementById('tanggal_upload').value = year + '-' + month + '-' + day;



    function add_user() {
        const ttlnamaValue = $('#Text_add').val();
        const ttllokasiValue = $('#lokasi_add').val();


        if (!ttlnamaValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Text Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttllokasiValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Lokasi Tidak Boleh Kosong',
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
                title: 'Ingin Menambahkan Running Text?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Tambahkan',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {

                    var url;
                    var formData;
                    url = "<?php echo site_url('Admin/RunningText/save') ?>";

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
                                // document.getElementById('rumahadat').reset();
                                // $('#add_modal').modal('hide');
                                (JSON.stringify(data));
                                // alert(data)
                                swal.fire({
                                    customClass: 'slow-animation',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    title: 'Berhasil Menambahkan Running Text',
                                    timer: 1500
                                });
                                document.getElementById('add_user').reset(); // Reset the form
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


    function onEdit(id) {
        $('#edit_user')[0].reset(); // reset form on modals
        // $('.form-group').removeClass('has-error'); // clear error class
        // $('.help-block').empty(); // clear error string
        // $('.modal-title').text('Edit Poster');
        console.log('bisa 1')
        $.ajax({
            url: "<?php echo site_url('Admin/RunningText/ajax_edit/') ?>" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {

                JSON.stringify(data.uid);
                // alert(JSON.stringify(data));

                $('#id_edit').val(data.uid);
                $('#Text_edit').val(data.text);
                $('#lokasi_edit').val(data.lokasi);
                $('.dropdown-toggle').dropdown();

                $('#edit_modal').modal('show'); // show bootstrap modal when complete loaded
                console.log('bisa 2')

                console.log('bisa 3')



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

        const ttlnamaValue = $('#Text_edit').val();
        const ttllokasiValue = $('#lokasi_edit').val();



        if (!ttlnamaValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Text Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttllokasiValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Lokasi Tidak Boleh Kosong',
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
                title: 'Ingin Mengubah Running Text?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Ubah',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {

                    var url;
                    var formData;
                    url = "<?php echo site_url('Admin/RunningText/update') ?>";

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
                                    title: 'Berhasil Mengubah Running Text',
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
                    url: "<?php echo site_url('Admin/RunningText/delete') ?>",
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