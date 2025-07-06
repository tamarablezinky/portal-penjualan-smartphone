<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-pink-900">Dashboard</h2>
    </x-slot>

    <div class="p-6 bg-pink-50 min-h-screen">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Grafik 1 --}}
            <div class="bg-white rounded shadow p-4">
                <h3 class="text-lg font-semibold text-pink-900 mb-2">Pendapatan per Bulan</h3>
                <canvas id="lineChart" class="w-full" style="max-height: 300px;"></canvas>
            </div>

            {{-- Grafik 2 --}}
            <div class="bg-white rounded shadow p-4">
                <h3 class="text-lg font-semibold text-pink-900 mb-2">Jumlah Terjual per Merek</h3>
                <canvas id="barChart" class="w-full" style="max-height: 300px;"></canvas>
            </div>

            {{-- Grafik 3 --}}
            <div class="bg-white rounded shadow p-4">
                <h3 class="text-lg font-semibold text-pink-900 mb-2">Distribusi Penjualan per Kota</h3>
                <canvas id="pieChart" class="w-full" style="max-height: 300px;"></canvas>
            </div>

            {{-- Grafik 4 --}}
            <div class="bg-white rounded shadow p-4">
                <h3 class="text-lg font-semibold text-pink-900 mb-2">Pendapatan per Tahun</h3>
                <canvas id="lineChartTahun" class="w-full" style="max-height: 300px;"></canvas>
            </div>

            {{-- Grafik 5 --}}
            <div class="bg-white rounded shadow p-4">
                <h3 class="text-lg font-semibold text-pink-900 mb-2">Jumlah Terjual per Toko</h3>
                <canvas id="barChartToko" class="w-full" style="max-height: 300px;"></canvas>
            </div>

            {{-- Grafik 6 --}}
            <div class="bg-white rounded shadow p-4">
                <h3 class="text-lg font-semibold text-pink-900 mb-2">Jumlah Terjual per Tahun</h3>
                <canvas id="lineChartJumlah" class="w-full" style="max-height: 300px;"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const lineChart = new Chart(document.getElementById('lineChart'), {
            type: 'line',
            data: {
                labels: @json($bulanan->keys()),
                datasets: [{
                    label: 'Pendapatan',
                    data: @json($bulanan->values()),
                    borderColor: '#9f1239', // pink gelap
                    backgroundColor: 'rgba(219, 39, 119, 0.3)', // pink lembut transparan
                    fill: true,
                    tension: 0.3,
                    pointRadius: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });

        const barChart = new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: @json($merek->keys()),
                datasets: [{
                    label: 'Jumlah Terjual',
                    data: @json($merek->values()),
                    backgroundColor: '#be185d' // pink medium
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });

        const pieChart = new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: {
                labels: @json($kota->keys()),
                datasets: [{
                    label: 'Distribusi',
                    data: @json($kota->values()),
                    backgroundColor: ['#fbcfe8', '#f9a8d4', '#ec4899', '#db2777', '#9d174d'] // gradasi pink
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });

        const lineChartTahun = new Chart(document.getElementById('lineChartTahun'), {
            type: 'line',
            data: {
                labels: @json($tahunPendapatan->keys()),
                datasets: [{
                    label: 'Pendapatan per Tahun',
                    data: @json($tahunPendapatan->values()),
                    borderColor: '#9f1239',
                    backgroundColor: 'rgba(219, 39, 119, 0.3)',
                    fill: true,
                    tension: 0.3,
                    pointRadius: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });

        const barChartToko = new Chart(document.getElementById('barChartToko'), {
            type: 'bar',
            data: {
                labels: @json($toko->keys()),
                datasets: [{
                    label: 'Jumlah Terjual',
                    data: @json($toko->values()),
                    backgroundColor: '#f472b6' // pink cerah
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });

        const lineChartJumlah = new Chart(document.getElementById('lineChartJumlah'), {
            type: 'line',
            data: {
                labels: @json($tahunJumlah->keys()),
                datasets: [{
                    label: 'Jumlah per Tahun',
                    data: @json($tahunJumlah->values()),
                    borderColor: '#9f1239',
                    backgroundColor: 'rgba(219, 39, 119, 0.3)',
                    fill: true,
                    tension: 0.3,
                    pointRadius: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    </script>
</x-app-layout>
