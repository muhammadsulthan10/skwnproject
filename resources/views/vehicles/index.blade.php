<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <a href="/login">
                <i class="bi bi-box-arrow-left"></i>
                <span class="text-[15px] ml-4">Logout</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 lg:fixed p-4 lg:ml-[16.66%] lg:w-10/12 w-full lg:px-12">
        <!-- Greetings -->
        <div class="lg:flex">
            <div class="dark:text-white lg:py-6 w-full">
                <h1 class="text-4xl font-bold">Hello, Sulthan</h1>
                <span class="text-gray-500">Track your vehicle fleet here</span>
            </div>
            <div class="lg:flex dark:text-white py-2 lg:py-6 w-full items-center text-gray-500 lg:flex-row-reverse justify-items-start">
                <i class="bi bi-calendar-week px-2 py-1 bg-slate-200 rounded-full"></i>
                <span class="pr-2">31 December 2024</span>
            </div>
        </div>
        <!-- Tambah Vehicle -->
        <div class="container mx-auto">
            <!-- Tombol untuk membuka modal -->
            <button id="openModalBtn" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add Vehicle</button>

            <!-- Modal Popup -->
            <div id="vehicleModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                <div class="bg-white rounded p-6 w-96">
                    <h2 class="text-xl font-semibold mb-4">Add Vehicle</h2>

                    <!-- Form untuk menambahkan vehicle -->
                    <form id="vehicleForm" method="POST" action="{{ route('vehicle.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="vehicle_name" class="block text-sm font-medium text-gray-700">Vehicle Name</label>
                            <input type="text" id="vehicle_name" name="vehicle_name" class="w-full px-3 py-2 border rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="vehicle_type" class="block text-sm font-medium text-gray-700">Vehicle Type</label>
                            <select id="vehicle_type" name="vehicle_type" class="w-full px-3 py-2 border rounded-md">
                                <option value="passenger">Passenger</option>
                                <option value="cargo">Cargo</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="license_plate" class="block text-sm font-medium text-gray-700">License Plate</label>
                            <input type="text" id="license_plate" name="license_plate" class="w-full px-3 py-2 border rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="ownership" class="block text-sm font-medium text-gray-700">Ownership</label>
                            <select id="ownership" name="ownership" class="w-full px-3 py-2 border rounded-md">
                                <option value="owned">Owned</option>
                                <option value="rented">Rented</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="fuel_consumption" class="block text-sm font-medium text-gray-700">Fuel Consumption (L/km)</label>
                            <input type="number" id="fuel_consumption" name="fuel_consumption" class="w-full px-3 py-2 border rounded-md" step="0.01" required>
                        </div>

                        <!-- Hidden input for service_schedule and status -->
                        <input type="hidden" name="service_schedule" value="{{ \Carbon\Carbon::now()->addMonth()->toDateString() }}">
                        <input type="hidden" name="status" value="available">

                        <div class="flex justify-end">
                            <button type="submit" id="submitVehicleBtn" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Submit</button>
                            <button type="button" id="closeModalBtn" class="ml-2 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabel vehicles -->
        <div class="overflow-scroll mt-6 max-h-96">
            <table class="min-w-full bg-white border border-gray-300 dark:bg-slate-800 dark:text-white" id="vehicleTable">
                <thead>
                    <tr>
                        <th class="px-2 py-px border text-center bg-slate-200">Vehicle ID</th>
                        <th class="px-2 py-px border text-center bg-slate-200">Brand</th>
                        <th class="px-2 py-px border text-center bg-slate-200">Vehicle Type</th>
                        <th class="px-2 py-px border text-center bg-slate-200">License Plate</th>
                        <th class="px-2 py-px border text-center bg-slate-200">Ownership</th>
                        <th class="px-2 py-px border text-center bg-slate-200">Service Schedule</th>
                        <th class="px-2 py-px border text-center bg-slate-200">Status</th>
                        <th class="px-2 py-px border text-center bg-slate-200">Fuel Consumption<br>(km/l)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vehicles as $index => $vehicle)
                        <tr class="{{ $index % 2 === 0 ? 'bg-slate-100' : 'bg-slate-200' }}">
                            <td class="px-2 py-px border text-center">{{ $vehicle->vehicle_id }}</td>
                            <td class="px-2 py-px border text-center">{{ $vehicle->vehicle_name }}</td>
                            <td class="px-2 py-px border text-center">{{ $vehicle->vehicle_type }}</td>
                            <td class="px-2 py-px border text-center">{{ $vehicle->license_plate }}</td>
                            <td class="px-2 py-px border text-center">{{ $vehicle->ownership }}</td>
                            <td class="px-2 py-px border text-center">{{ \Carbon\Carbon::parse($vehicle->service_schedule)->format('d-m-Y') }}</td>
                            <td class="px-2 py-px border text-center"
                                style="color: {{ $vehicle->status === 'available' ? 'green' : ($vehicle->status === 'in_use' ? '#ffc107' : ($vehicle->status === 'maintenance' ? 'red' : 'black')) }};">
                                {{ ucfirst($vehicle->status) }}
                            </td>
                            <td class="px-2 py-px border text-center">{{ $vehicle->fuel_consumption }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        function Open() {
            document.querySelector('.sidebar').classList.toggle('left-[-300px]');
        }

        // Membuka modal
        document.getElementById('openModalBtn').addEventListener('click', function() {
            document.getElementById('vehicleModal').classList.remove('hidden');
        });

        // Menutup modal
        document.getElementById('closeModalBtn').addEventListener('click', function() {
            document.getElementById('vehicleModal').classList.add('hidden');
        });

        // Mengirim form tanpa reload halaman (AJAX)
        document.getElementById('vehicleForm').addEventListener('submit', function(event) {
            event.preventDefault();  // Menghindari reload halaman

            let formData = new FormData(this);

            // Ambil token CSRF dari halaman
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch("{{ route('vehicle.store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,  // Menyertakan token CSRF
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);  // Cek respons dari server
                if (data.success) {
                    // Menutup modal
                    document.getElementById('vehicleModal').classList.add('hidden');

                    // Menambahkan data kendaraan baru ke dalam tabel
                    const vehicleTable = document.getElementById('vehicleTable').getElementsByTagName('tbody')[0];
                    const newRow = vehicleTable.insertRow();
                    newRow.innerHTML = `
                        <td class="px-2 py-px border text-center">${data.vehicle_id}</td>
                        <td class="px-2 py-px border text-center">${data.vehicle_name}</td>
                        <td class="px-2 py-px border text-center">${data.vehicle_type}</td>
                        <td class="px-2 py-px border text-center">${data.license_plate}</td>
                        <td class="px-2 py-px border text-center">${data.ownership}</td>
                        <td class="px-2 py-px border text-center">${data.service_schedule}</td>
                        <td class="px-2 py-px border text-center" style="color: green;">Available</td>
                        <td class="px-2 py-px border text-center">${data.fuel_consumption}</td>
                    `;
                } else {
                    alert("Error while saving vehicle");
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("An error occurred");
            });
        });
    </script>
</body>
</html>
