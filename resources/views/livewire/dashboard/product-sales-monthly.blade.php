<div>
    <canvas id="productSalesChart" width="400" height="200"></canvas>

    @push('script')
        <script data-navigate-track="reload">
            var ctx = document.getElementById('productSalesChart').getContext('2d');
            var salesData = @json($chartData);

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: Object.keys(salesData),
                    datasets: [{
                        label: 'Total Orders',
                        data: Object.values(salesData),
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
