<div>
    <canvas id="lineChart"></canvas>

    <script>
        document.addEventListener('livewire:load', () => {
            const ctx = document.getElementById('lineChart').getContext('2d');
            const chartData = @json($chartData);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartData.labels,
                    datasets: chartData.datasets,
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            display: true,
                        },
                        y: {
                            display: true,
                        }
                    }
                }
            });
        });
    </script>
</div>