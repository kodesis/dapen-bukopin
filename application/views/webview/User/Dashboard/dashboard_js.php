<script src="<?= base_url() ?>assets/cms/extensions/jquery/jquery.min.js"></script>
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

        var optionsProfileVisit = {
            annotations: {
                position: "back",
            },
            dataLabels: {
                enabled: true, // Enable data labels for better visibility
                formatter: function(value) {
                    // Format the value for data labels with commas as thousand separators
                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
            },
            chart: {
                type: "bar",
                height: 300,
            },
            fill: {
                opacity: 1,
            },
            plotOptions: {},
            series: [{
                name: "sales",
                data: salesData, // Use the original sales data for the chart
            }],
            colors: "#F7A400",
            xaxis: {
                categories: data.categories, // Use the categories returned from the AJAX call
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        // Format the value for the vertical axis with commas as thousand separators
                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    }
                }
            },
            tooltip: {
                y: {
                    formatter: function(value) {
                        // Format the value for the tooltip
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