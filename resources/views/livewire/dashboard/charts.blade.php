<div>
    <div class="flex flex-wrap -mx-5">
        <div class="w-full md:w-1/2 p-5">
            <div class="p-6 bg-white rounded-2xl">
                <div>
                    <h5 class="font-bold text-2xl capitalize mb-1">Total orders</h5>
                    <p class="text-gray-500">This is a chart of total orders</p>
                </div>
                <canvas id="productSalesChart" width="400" height="200"></canvas>

            </div>
        </div>
        <div class="w-full md:w-1/2 p-5">
            <div class="p-6 bg-white rounded-2xl">
                <div>
                    <h5 class="font-bold text-2xl capitalize mb-1">New User</h5>
                    <p class="text-gray-500">This is a chart of new users</p>
                </div>
                <canvas id="userRegistrationsChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            var userCtx = document.getElementById('userRegistrationsChart').getContext('2d');
            var userChartData = @json($chartDataUser);

            new Chart(userCtx, {
                type: 'line',
                data: {
                    labels: Object.keys(userChartData),
                    datasets: [{
                        label: 'New User Registrations',
                        data: Object.values(userChartData),
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

            var salesCtx = document.getElementById('productSalesChart').getContext('2d');
            var salesChartData = @json($chartData);

            new Chart(salesCtx, {
                type: 'bar',
                data: {
                    labels: Object.keys(salesChartData),
                    datasets: [{
                        label: 'Total Orders',
                        data: Object.values(salesChartData),
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
