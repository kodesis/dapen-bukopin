<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="<?= base_url() ?>assets/cms/extensions/jquery/jquery.min.js"></script>

<script>
    function updateUserCount() {
        $.ajax({
            url: 'Admin/Dashboard/user_count', // Replace with the actual URL to your controller
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#user_count').text(data.user_count); // Update the user count in the modal
            },
            error: function(xhr, status, error) {
                console.error("Error fetching user count:", error);
            }
        });
    }

    function updateConnectedCount() {
        $.ajax({
            url: 'Admin/Dashboard/saldo_con_count', // Replace with the actual URL to your controller
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#user_con_count').text(data.user_con_count); // Update the user count in the modal
            },
            error: function(xhr, status, error) {
                console.error("Error fetching user count:", error);
            }
        });
    }

    function updateSaldoCount() {
        $.ajax({
            url: 'Admin/Dashboard/saldo_count', // Replace with the actual URL to your controller
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#total_saldo').text(data.total_saldo); // Update the user count in the modal
            },
            error: function(xhr, status, error) {
                console.error("Error fetching user count:", error);
            }
        });
    }
    // Call the function every 5 seconds (5000 milliseconds)
    setInterval(updateUserCount, 5000);
    setInterval(updateConnectedCount, 5000);
    setInterval(updateSaldoCount, 5000);

    // Initial call to update immediately when the page loads
    updateUserCount();
    updateConnectedCount();
    updateSaldoCount();


    // function fetchChartData() {
    //     $.ajax({
    //         url: "<?php echo site_url('Admin/Dashboard/saldo_per_6_bulan'); ?>", // Replace with your actual URL
    //         type: "GET", // Use GET or POST as needed
    //         dataType: "json",
    //         success: function(data) {
    //             // Update the chart with the fetched data
    //             updateChart(data);
    //         },
    //         error: function(jqXHR, textStatus, errorThrown) {
    //             console.error('Error fetching chart data:', textStatus, errorThrown);
    //         }
    //     });
    // }

    // Function to update the chart with new data
    // function updateChart(data) {
    //     // Keep original sales data for the chart
    //     var salesData = data.sales;

    //     // Format sales data with periods as thousands separators for display purposes
    //     var formattedSalesData = salesData.map(function(count) {
    //         return count.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    //     });

    //     var optionsProfileVisit = {
    //         annotations: {
    //             position: "back",
    //         },
    //         dataLabels: {
    //             enabled: true, // Enable data labels for better visibility
    //             formatter: function(value) {
    //                 // Format the value for data labels without using the already formatted array
    //                 return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    //             }
    //         },
    //         chart: {
    //             type: "bar",
    //             height: 300,
    //         },
    //         fill: {
    //             opacity: 1,
    //         },
    //         plotOptions: {},
    //         series: [{
    //             name: "sales",
    //             data: salesData, // Use the original sales data for the chart
    //         }],
    //         colors: "#435ebe",
    //         xaxis: {
    //             categories: data.categories, // Use the categories returned from the AJAX call
    //         },
    //         tooltip: {
    //             y: {
    //                 formatter: function(value) {
    //                     // Format the value for the tooltip
    //                     return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    //                 }
    //             }
    //         }
    //     };

    //     // Render the chart with the updated options
    //     var chartProfileVisit = new ApexCharts(
    //         document.querySelector("#chart-profile-visit"),
    //         optionsProfileVisit
    //     );
    //     chartProfileVisit.render();
    // }

    // $(document).ready(function() {
    //     fetchChartData(); // Call the function to fetch and render chart data
    // });


    //SUM
    function fetchChartData() {
        $.ajax({
            url: "<?php echo site_url('Admin/Dashboard/total_saldo_per_6_bulan'); ?>", // Replace with your actual URL
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