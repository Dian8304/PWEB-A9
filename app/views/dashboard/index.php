<div class="container mt-5 bg-color">
    <h1 class="h1L"><?= $data['judul']; ?></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="chart-container" style="position: relative; height: 60vh; width: 100%;">
                <canvas id="panenChart"></canvas>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('panenChart').getContext('2d');
        var panenChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Status'],
                datasets: [
                    {
                        label: 'Dibuat oleh Pekebun',
                        data: [<?= $data['total_panen']; ?>],
                        backgroundColor: 'rgb(122, 179, 255)', 
                        borderColor: 'rgb(122, 179, 255)', 
                        borderWidth: 1
                    },
                    {
                        label: 'Ditolak oleh Admin Gudang',
                        data: [<?= $data['rejected_panen']; ?>],
                        backgroundColor: 'rgba(231, 63, 63, 1)', 
                        borderColor: 'rgba(231, 63, 63, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Diterima oleh Admin Gudang',
                        data: [<?= $data['accepted_panen']; ?>],
                        backgroundColor: 'rgba(197, 218, 75, 1)', 
                        borderColor: 'rgba(197, 218, 75, 1)', 
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#000', 
                            font: {
                                family: 'Poppins',
                                size: 14
                            }
                        }
                    },
                    x: {
                        ticks: {
                            color: '#000', 
                            font: {
                                family: 'Poppins',
                                size: 14
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                family: 'Poppins',
                                size: 14
                            },
                            color: '#000'
                        }
                    }
                }
            }
        });
    });
</script>