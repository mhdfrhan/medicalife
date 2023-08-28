<div>
    <canvas id="newUserRegistrationsChart"></canvas>

    @push('script')
        <script data-navigate-track="reload">
            var ctx = document.getElementById('newUserRegistrationsChart').getContext('2d');
            var userData = @json($chartData);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: Object.keys(userData),
                    datasets: [{
                        label: 'New User Registrations',
                        data: Object.values(userData),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush
</div>
