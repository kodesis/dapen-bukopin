<link rel="stylesheet" href="<?= base_url() ?>assets/cms/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/cms/compiled/css/table-datatable-jquery.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/cms/compiled/css/app.css">
<link rel="stylesheet" href="<?= base_url() ?>/assets/cms/compiled/css/app-dark.css">

<script src="<?= base_url() ?>assets/cms/static/js/initTheme.js"></script>
<script src="<?= base_url() ?>assets/cms/extensions/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/cms/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/cms/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>assets/cms/static/js/pages/datatables.js"></script>
<script>
    $(document).ready(function() {

        Latest_saldo(); // Call the function when the page loads

    }); // Get today's date
    var today = new Date();

    // Format the date to YYYY-MM-DD
    var day = ("0" + today.getDate()).slice(-2); // Add leading zero for single-digit days
    var month = ("0" + (today.getMonth() + 1)).slice(-2); // Add leading zero for single-digit months
    var year = today.getFullYear();

    // Set the input field's value to the current date
    document.getElementById('bulan_cari').value = year + '-' + month + '-' + day;
    document.getElementById('tahun_cari').value = year + '-' + month + '-' + day;

    function formatDate(dateString) {
        if (!dateString) return 'N/A';

        const [year, month, day] = dateString.split('-');
        return `${day}-${month}-${year}`;
    }

    function submitcari() {
        const ttlbulanValue = $('#bulan_cari').val();
        const ttltahunValue = $('#tahun_cari').val();
        const ttlrelasiValue = $('#id_relasi').val();

        if (!ttlbulanValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Bulan Tidak Boleh Kosong',
                timer: 1500
            });
        } else if (!ttltahunValue) {
            swal.fire({
                customClass: 'slow-animation',
                icon: 'error',
                showConfirmButton: false,
                title: 'Kolom Tahun Tidak Boleh Kosong',
                timer: 1500
            });
        } else {
            // $('.form-group').removeClass('has-error'); // clear error class
            // $('.help-block').empty(); // clear error string
            // $('.modal-title').text('Edit Poster');
            const monthNames = [
                "Januari", "Februari", "Maret", "April",
                "Mei", "Juni", "Juli", "Agustus",
                "September", "Oktober", "November", "Desember"
            ];

            // Convert month number to month name (1-12 to 0-11 index)
            const monthName = monthNames[ttlbulanValue - 1];

            // Combine month name and year
            const tanggal_hasil = monthName + ' ' + ttltahunValue;

            console.log('bisa 1')
            $.ajax({
                url: "<?php echo site_url('User/SaldoUser/cari/') ?>" + ttlbulanValue + '/' + ttltahunValue + '/' + ttlrelasiValue,
                type: "POST",
                dataType: "JSON",
                success: function(response) {
                    // Check if response status is "Success"
                    if (response.status === "Success") {
                        const data = response.data; // Access the 'data' field inside the response

                        // Ensure data fields are present and format them
                        function formatNumber(num) {
                            if (num === null || num === undefined || num === '') {
                                return "0"; // Fallback value
                            }
                            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        }

                        // Fill in the data into the HTML
                        $('#nama_user').text(data.nama || 'N/A');
                        $('#nik_user').text(data.kd_peserta || 'N/A');
                        $('#alamat_user').text(data.alamat || 'N/A');
                        // $('#tgl_lahir_user').text(data.tgl_lahir || 'N/A');
                        // $('#pegawai_user').text(data.pegawai || 'N/A');
                        // $('#peserta_user').text(data.peserta || 'N/A');
                        $('#tgl_lahir_user').text(formatDate(data.tgl_lahir));
                        $('#pegawai_user').text(formatDate(data.pegawai));
                        $('#peserta_user').text(formatDate(data.peserta));
                        $('#tanggal_hasil').text(tanggal_hasil);

                        // Use the formatNumber function for numeric fields
                        $('#saldo_awal_1').text(formatNumber(data.ipk_awal));
                        $('#saldo_awal_2').text(formatNumber(data.ips_awal)); // This is the key fix!
                        $('#saldo_awal_3').text(formatNumber(data.total_awal));
                        $('#iuran_1').text(formatNumber(data.ipk_iuran));
                        $('#iuran_2').text(formatNumber(data.ips_iuran));
                        // $('#iuran_3').text(formatNumber(data.ipk_akhir)); // Uncomment if needed
                        $('#hasil_1').text(formatNumber(data.ipk_p));
                        $('#hasil_2').text(formatNumber(data.ips_p));
                        // $('#hasil_3').text(formatNumber(data.tanggal_data)); // Uncomment if needed
                        $('#saldo_akhir_1').text(formatNumber(data.ipk_akhir));
                        $('#saldo_akhir_2').text(formatNumber(data.ips_akhir));
                        $('#saldo_akhir_3').text(formatNumber(data.total_akhir));

                        // Make the tab visible
                        $('#tab_ketemu').addClass('show');
                        swal.fire({
                            customClass: 'slow-animation',
                            icon: 'success',
                            showConfirmButton: false,
                            title: 'Berhasil Mencari Data Saldo',
                            timer: 1500
                        });
                    } else {
                        $('#tab_ketemu').removeClass('show');
                        swal.fire({
                            customClass: 'slow-animation',
                            icon: 'warning',
                            showConfirmButton: false,
                            title: 'Data Tidak Ditemukan',
                            timer: 1500
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
    }

    function Latest_saldo() {
        $('#cari_bulan_form')[0].reset(); // reset form on modals
        // $('.form-group').removeClass('has-error'); // clear error class
        // $('.help-block').empty(); // clear error string
        // $('.modal-title').text('Edit Poster');
        console.log('bisa 1')
        $.ajax({
            url: "<?php echo site_url('User/SaldoUser/get_last_saldo/') ?>",
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                const tanggalData = new Date(data.tanggal_data); // Convert to Date object

                const month = tanggalData.getMonth() + 1; // Get month (0-11, so add 1)
                const year = tanggalData.getFullYear(); // Get full year

                // Set the values in the input fields
                $('#bulan_cari').val(month);
                $('#tahun_cari').val(year);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }
</script>