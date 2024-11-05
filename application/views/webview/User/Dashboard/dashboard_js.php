<script src="<?= base_url() ?>assets/cms/extensions/jquery/jquery.min.js"></script>
<?php
// Prepare the title string in PHP
$nama = $this->session->userdata('name');
$nip = $this->session->userdata('kd_peserta');
$title = "Nama: " . $nama . " | NIP: " . $nip;
?>
<script>
    function fetchChartData() {
        $.ajax({
            url: "<?php echo site_url('Admin/Dashboard/saldo_per_6_bulan_user'); ?>", // Replace with your actual URL
            type: "GET", // Use GET or POST as needed
            dataType: "json",
            success: function(data) {
                // Update the chart with the fetched data
                updateChart(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error fetching chart data:', textStatus, errorThrown);
            }
        });
    }

    // Function to update the chart with new data
    function updateChart(data) {
        // Keep original sales data for the chart
        var salesData = data.sales;
        const isDarkTheme = true; // Set this based on your theme toggle

        var optionsProfileVisit = {
            annotations: {
                position: "back",
            },
            dataLabels: {
                enabled: true,
                formatter: function(value) {
                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
            },
            chart: {
                type: "bar",
                height: 300,
                events: {
                    mounted: function(chartContext, config) {
                        // Add custom title below the chart after it has mounted
                        let chartEl = chartContext.el;
                        let titleEl = document.createElement('div');
                        titleEl.style.textAlign = 'center';
                        titleEl.style.marginTop = '10px';
                        titleEl.style.fontSize = '12px';
                        titleEl.style.fontWeight = 'bold';
                        titleEl.style.color = '#607080';
                        titleEl.innerText = "<?php echo $title; ?>"; // Use the PHP variable for title text
                        chartEl.parentNode.appendChild(titleEl);
                    }
                }
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: "sales",
                data: salesData,
            }],
            colors: "#F7A400",
            xaxis: {
                categories: data.categories,
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    }
                }
            },
            tooltip: {
                y: {
                    formatter: function(value) {
                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    }
                }
            }
        };
        // Render the chart with the updated options
        var chartProfileVisit = new ApexCharts(
            document.querySelector("#chart-profile-visit"),
            optionsProfileVisit
        );
        chartProfileVisit.render();
    }

    $(document).ready(function() {
        fetchChartData(); // Call the function to fetch and render chart data
    });
</script>