<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Vite -->
    @vite('resources/css/app.css') <!-- Pastikan file CSS Tailwind -->
    @vite('resources/js/app.js')  <!-- Jika ada file JS -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Public Sans', sans-serif;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/luxon"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>

</head>
<body class="dark:bg-slate-900 lg:flex lg:py-0 py-4">

    <!-- Toggle Sidebar -->
    <span class="lg:hidden p-4 text-white text-4xl cursor-pointer" onclick="Open()">
        <i class="bi bi-filter-left px-2 bg-gray-500 rounded-md"></i>
    </span>

    <!-- Sidebar -->
    <div class="sidebar fixed top-0 bottom-0 lg:left-0 left-[-300px] p-2 lg:w-2/12 w-[220px] overflow-y-auto text-center bg-white dark:bg-slate-900 border-r">
        <div class="dark:text-white text-gray-400 text-xl">
            <div class="p-2.5 mt-1 flex items-center">
                <i class="bi bi-app-indicator px-2 py-1 rounded-md"></i>
                <h1 class="font-bold dark:text-white text-gray-500 text-[15px] ml-3">Logo</h1>
                <i class="bi bi-x ml-20 cursor-pointer lg:hidden" onclick="Open()"></i>
            </div>
            <hr class="my-2">
        </div>

        <!-- Menu Items -->
        <a href="/">
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-slate-300 text-gray-500 dark:hover:bg-slate-700 dark:text-white">
                    <i class="bi bi-house-door"></i>
                    <span class="text-[15px] ml-4">Dashboard</span>
            </div>
        </a>

        <a href="/bookings">
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-slate-300 text-gray-500 dark:hover:bg-slate-700 dark:text-white">
                <i class="bi bi-hdd-stack"></i>
                <span class="text-[15px] ml-4">Bookings</span>
            </div>
        </a>

        <a href="/user">
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-slate-300 text-gray-500 dark:hover:bg-slate-700 dark:text-white">
                    <i class="bi bi-people"></i>
                    <span class="text-[15px] ml-4">User</span>
            </div>
        </a>

        <a href="/vehicle">
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-slate-300 text-gray-500 dark:hover:bg-slate-700 dark:text-white">
                    <i class="bi bi-car-front"></i>
                    <span class="text-[15px] ml-4">Vehicle</span>
            </div>
        </a>

        <a href="/driver">
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-slate-300 text-gray-500 dark:hover:bg-slate-700 dark:text-white">
                    <i class="bi bi-person-vcard"></i>
                    <span class="text-[15px] ml-4">Driver</span>
            </div>
        </a>

        <a href="/log">
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-slate-300 text-gray-500 dark:hover:bg-slate-700 dark:text-white">
                    <i class="bi bi-bug"></i>
                    <span class="text-[15px] ml-4">Log</span>
            </div>
        </a>

        <div class="p-2.5 mt-3 flex items-end rounded-md px-4 duration-300 cursor-pointer hover:bg-slate-300 text-gray-500 dark:hover:bg-slate-700 dark:text-white lg:mt-[120%]">
            <a href="/logout">
                <i class="bi bi-box-arrow-left"></i>
                <span class="text-[15px] ml-4">Logout</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 lg:fixed p-4 lg:ml-[16.66%] lg:w-7/12 w-full lg:px-12">
        <!-- Greetings -->
        <div class="lg:flex">
            <div class="dark:text-white lg:py-6 w-full">
                <h1 class="text-4xl font-bold">Hello, {{ auth()->user()->username }}</h1>
                <span class="text-gray-500">Track your vehicle fleet here</span>
            </div>
            <div class="lg:flex dark:text-white py-2 lg:py-6 w-full items-center text-gray-500 lg:flex-row-reverse justify-items-start">
                <i class="bi bi-calendar-week px-2 py-1 bg-slate-200 rounded-full"></i>
                <span class="pr-2">31 December 2024</span>
            </div>
        </div>

        <hr class="my-2">

        <!-- Review -->
        <div class="flex">
            <div class="flex basis-1/3 p-2">
                <i class="bi bi-truck p-2 lg:text-3xl lg:p-4 bg-slate-200 rounded-full mr-2"></i>
                <div>
                    <span class="hidden lg:flex text-xs text-gray-500">Available</span>
                    <h1 class="xl:hidden font-bold text-xs">Cargo</h1>
                    <h1 class="hidden xl:flex font-bold text-sm">Cargo Vehicle</h1>
                    <h1 class="font-bold lg:text-2xl text-green-600">{{ $cargoCount }}</h1>
                </div>
            </div>
            <div class="flex basis-1/3 p-2 border-x">
                <i class="bi bi-car-front p-2 lg:text-3xl lg:p-4 bg-slate-200 rounded-full mr-2"></i>
                <div>
                    <span class="hidden lg:flex text-xs text-gray-500">Available</span>
                    <h1 class="xl:hidden font-bold text-xs">Passenger</h1>
                    <h1 class="hidden xl:flex font-bold text-sm">Passenger Vehicle</h1>
                    <h1 class="font-bold lg:text-2xl text-green-600">{{ $passengerCount }}</h1>
                </div>
            </div>
            <div class="flex basis-1/3 p-2">
                <i class="bi bi-person-vcard p-2 lg:text-3xl lg:p-4 bg-slate-200 rounded-full mr-2"></i>
                <div>
                    <span class="hidden lg:flex text-xs text-gray-500">Available</span>
                    <h1 class="xl:hidden font-bold text-xs">Driver</h1>
                    <h1 class="hidden xl:flex font-bold text-sm">Driver</h1>
                    <h1 class="font-bold lg:text-2xl text-green-600">{{ $driverCount }}</h1>
                </div>
            </div>
        </div>

        <hr class="my-2">

        <!-- Graph -->
        <div class="container mx-auto mt-4">
            <h1 class="text-2xl font-bold mb-5">Bookings Line Chart</h1>
            <div class="bg-white p-5 rounded shadow w-full">
                <div class="flex space-x-4 mb-5 h-max">
                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input type="date" id="start_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                        <input type="date" id="end_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div class="flex flex-col lg:flex-row lg:gap-2 items-end text-xs lg:text-xl">
                        <button id="updateChart" class="p-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Update
                        </button>
                        <button id="exportExcel" class="p-2 bg-green-600 text-white rounded hover:bg-green-700">
                            Export
                        </button>
                    </div>
                </div>
                <canvas id="bookingsChart"></canvas>
            </div>
        </div>
        <script>
            document.getElementById('exportExcel').addEventListener('click', function() {
                const startDate = document.getElementById('start_date').value;
                const endDate = document.getElementById('end_date').value;

                // Kirim permintaan ke backend untuk mendapatkan data booking
                axios.get('/get-booking-data', {
                    params: {
                        start_date: startDate,
                        end_date: endDate
                    }
                })
                .then(function(response) {
                    const bookingsData = response.data;

                    // Convert data JSON ke sheet Excel
                    const ws = XLSX.utils.json_to_sheet(bookingsData);
                    const wb = XLSX.utils.book_new();
                    XLSX.utils.book_append_sheet(wb, ws, 'Bookings Data');
                    XLSX.writeFile(wb, 'Bookings_Report.xlsx');
                })
                .catch(function(error) {
                    console.error('Error fetching booking data:', error);
                });
            });

            const ctx = document.getElementById('bookingsChart').getContext('2d');
            const bookingsChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Approved Bookings',
                        data: [],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: true },
                    },
                    scales: {
                        x: {
                            title: { display: true, text: 'Date' },
                            ticks: {
                                callback: function(value, index, ticks) {
                                    return this.getLabelForValue(value).split('-')[2]; // Ambil tanggal saja
                                }
                            }
                        },
                        y: { title: { display: true, text: 'Total Bookings' } }
                    }
                }
            });

            async function fetchChartData(startDate, endDate) {
                const { data } = await axios.get('/bookings-chart-data', { params: { start_date: startDate, end_date: endDate } });
                const labels = data.map(item => item.date);
                const totals = data.map(item => item.total);

                bookingsChart.data.labels = labels;
                bookingsChart.data.datasets[0].data = totals;
                bookingsChart.update();
            }

            document.getElementById('updateChart').addEventListener('click', () => {
                const startDate = document.getElementById('start_date').value || null;
                const endDate = document.getElementById('end_date').value || null;

                fetchChartData(startDate, endDate);
            });

            // Initial load with default range
            fetchChartData();
        </script>
    </div>

    <div class="flex-2 lg:fixed lg:top-0 lg:bottom-0 p-4 lg:ml-[75%] lg:w-3/12 lg:border-l">
        <div class="mt-6 w-full">
            <span class="text-xl text-black font-bold">Currently Assigned</span>
            <div class="mt-4 overflow-y-scroll">
                @foreach ($bookings as $booking)
                    @if ($booking->status === 'approved')  <!-- Pastikan hanya yang approved yang ditampilkan -->
                        <div class="flex h-24 items-center">
                            @php
                                // Ambil data driver berdasarkan driver_name dari tabel drivers
                                $driver = \App\Models\Driver::where('driver_name', $booking->driver_name)->first();
                                // Ambil data vehicle berdasarkan vehicle_name dari tabel vehicles
                                $vehicle = \App\Models\Vehicle::where('vehicle_name', $booking->vehicle_name)->first();
                            @endphp
                            @if ($driver && $vehicle) <!-- Pastikan driver dan vehicle ada -->
                                <div class="relative flex items-center">
                                    <div class="absolute w-16 h-16 bg-cover rounded-full" style="background-image: url('{{ $driver->image_url }}')"></div>
                                    <div class="relative ml-20 p-2">
                                        <p class="font-bold">{{ $driver->driver_name }}</p> <!-- Nama driver yang bertugas -->
                                        <p class="text-sm">{{ $vehicle->vehicle_name }}</p> <!-- Nama kendaraan yang sedang bertugas -->
                                        <p class="text-xs">{{ $vehicle->license_plate }}</p> <!-- Plat nomor kendaraan yang sedang bertugas -->
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

    </div>

    <script type="text/javascript">
        function Open(){
            document.querySelector('.sidebar').classList.toggle('left-[-300px]');
        }
    </script>
</body>
</html>
