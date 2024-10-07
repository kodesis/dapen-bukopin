<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
</script>