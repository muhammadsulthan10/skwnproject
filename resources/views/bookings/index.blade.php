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
                <h1 class="text-4xl font-bold">Hello, {{ auth()->user()->username }}</h1>
                <span class="text-gray-500">Track your vehicle fleet here</span>
            </div>
            <div class="lg:flex dark:text-whit2 py-px lg:py-6 w-full items-center text-gray-500 lg:flex-row-reverse justify-items-start">
                <i class="bi bi-calendar-week px-2 py-1 bg-slate-200 rounded-full"></i>
                <span class="pr-2">31 December 2024</span>
            </div>
        </div>
        <button type="button" class="px-4 py-2 bg-blue-500 text-white rounded-md" id="openModal">
            Tambah Booking
        </button>

        <!-- Modal -->
        <div id="addBookingModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-900 bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg w-3/4">
                <div class="flex justify-between items-center px-4 py-2 border-b">
                    <h5 class="text-lg font-bold">Tambah Booking</h5>
                    <button type="button" class="text-gray-400 hover:text-gray-600" id="closeModal">&times;</button>
                </div>
                <div class="p-4">
                    <form id="addBookingForm" method="POST" action="{{ route('bookings.store') }}" onsubmit="submitBooking(event)">
                        @csrf
                        <div class="mb-4">
                            <label for="vehicle_type" class="block text-sm font-medium text-gray-700">Vehicle Type</label>
                            <select id="vehicle_type" name="vehicle_type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="">Pilih Tipe Kendaraan</option>
                                @foreach($vehicles->unique('vehicle_type') as $vehicle)
                                    <option value="{{ $vehicle->vehicle_type }}">{{ $vehicle->vehicle_type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="vehicle_name" class="block text-sm font-medium text-gray-700">Vehicle Name</label>
                            <select id="vehicle_name" name="vehicle_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="">Pilih Nama Kendaraan</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="driver_name" class="block text-sm font-medium text-gray-700">Driver Name</label>
                            <select id="driver_name" name="driver_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="">Pilih Driver</option>
                                @foreach($drivers as $driver)
                                    <option value="{{ $driver->driver_name }}">{{ $driver->driver_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="created_by_name" class="block text-sm font-medium text-gray-700">Created By</label>
                            <input type="text" id="created_by_name" name="created_by_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="approved_by_level1_name" class="block text-sm font-medium text-gray-700">Level 1 Approver</label>
                            <select id="approved_by_level1_name" name="approved_by_level1_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="">Pilih Approver</option>
                                @foreach($approvers as $approver)
                                    <option value="{{ $approver->username }}">{{ $approver->username }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="approved_by_level2_name" class="block text-sm font-medium text-gray-700">Level 2 Approver</label>
                            <select id="approved_by_level2_name" name="approved_by_level2_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="">Pilih Approver</option>
                                @foreach($approvers as $approver)
                                    <option value="{{ $approver->username }}">{{ $approver->username }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                            <input type="date" id="start_date" name="start_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                            <input type="date" id="end_date" name="end_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="purpose" class="block text-sm font-medium text-gray-700">Purpose</label>
                            <textarea id="purpose" name="purpose" class="p-px mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="3" required></textarea>
                        </div>
                        <div class="flex justify-end space-x-2">
                            <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md" id="closeModalBtn">Close</button>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Tabel Bookings -->
        <div class="overflow-scroll mt-6 max-h-96">
            <table class="min-w-full bg-white border border-gray-300 dark:bg-slate-800 dark:text-white text-sm">
                <thead>
                    <tr>
                        <th class="px-2 py-px border text-center bg-slate-200">Booking ID</th>
                        <th class="px-2 py-px border text-center bg-slate-200">Vehicle</th>
                        <th class="px-2 py-px border text-center bg-slate-200">Driver</th>
                        <th class="px-2 py-px border text-center bg-slate-200">Created By</th>
                        <th class="px-2 py-px border text-center bg-slate-200">Level 1</th>
                        <th class="px-2 py-px border text-center bg-slate-200">Position</th>
                        <th class="px-2 py-px border text-center bg-slate-200">Level 2</th>
                        <th class="px-2 py-px border text-center bg-slate-200">Position</th>
                        <th class="px-2 py-px border text-center bg-slate-200">Status</th>
                        <th class="px-2 py-px border text-center bg-slate-200">Start Date</th>
                        <th class="px-2 py-px border text-center bg-slate-200">End Date</th>
                        <th class="px-2 py-px border text-center bg-slate-200">Purpose</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $index => $booking)
                        <tr class="{{ $index % 2 === 0 ? 'bg-slate-100' : 'bg-slate-200' }}">
                            <td class="px-2 py-px border text-center">{{ $booking->booking_id }}</td>
                            <td class="px-2 py-px border text-center">{{ $booking->vehicle->vehicle_name }}</td>
                            <td class="px-2 py-px border text-center">{{ $booking->driver->driver_name }}</td>
                            <td class="px-2 py-px border text-center">{{ $booking->createdBy->created_by_name }}</td>
                            <td class="px-2 py-px border text-center">{{ $booking->approvedByLevel1->approved_by_level1_name }}</td>
                            <td class="px-2 py-px border text-center">{{ $booking->approvedByLevel1->position ?? 'N/A' }}</td>
                            <td class="px-2 py-px border text-center">{{ $booking->approvedByLevel2->approved_by_level2_name }}</td>
                            <td class="px-2 py-px border text-center">{{ $booking->approvedByLevel2->position ?? 'N/A' }}</td>
                            <td class="px-2 py-px border text-center"
                                style="color: {{ $booking->status === 'approved' ? 'green' : ($booking->status === 'pending' ? '#ffc107' : ($booking->status === 'rejected' ? 'red' : 'black')) }};">
                                {{ ucfirst($booking->status) }}
                            </td>
                            <td class="px-2 py-px border text-center">{{ \Carbon\Carbon::parse($booking->start_date)->format('d-m-Y') }}</td>
                            <td class="px-2 py-px border text-center">{{ \Carbon\Carbon::parse($booking->end_date)->format('d-m-Y') }}</td>
                            <td class="px-2 py-px border text-center">{{ $booking->purpose }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        // Toggle Sidebar
        function Open() {
            document.querySelector('.sidebar').classList.toggle('left-[-300px]');
        }

        // Modal Elements
        const openModalButton = document.getElementById('openModal');
        const modal = document.getElementById('addBookingModal');
        const closeModalButton = document.getElementById('closeModal');

        // Open Modal on Button Click
        openModalButton?.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        // Close Modal when clicking outside of it
        window.addEventListener('click', (event) => {
            if (event.target === modal) {
                modal.classList.add('hidden');
            }
        });

        // Close Modal on Close Button Click
        closeModalButton?.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        async function submitBooking(event) {
            event.preventDefault(); // Prevent default form submission

            const form = document.getElementById('addBookingForm');
            const formData = new FormData(form);

            // Validasi form secara manual (contoh)
            if (!formData.get('driver_name') || !formData.get('start_date')) {
                alert('Name and Date are required!');
                return;
            }

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json', // Memastikan header menerima JSON
                    },
                });

                if (!response.ok) {
                    const errorText = await response.text();
                    console.error('Error response:', errorText);
                    throw new Error(`HTTP Error: ${response.status}`);
                }

                const text = await response.text();
                console.log("Server Response: ", text);

                try {
                    const data = JSON.parse(text);
                    if (data.message === 'Booking created successfully!') {
                        modal.classList.add('hidden');
                        alert('Booking has been successfully added!');
                    } else {
                        alert('Booking failed: ' + data.message);
                    }
                } catch (error) {
                    console.error("Parsing Error: ", error);
                    alert('Error in response format.');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Request failed: ' + error.message);
            }
}

        // Close Modal on additional close button
        document.getElementById('closeModalBtn')?.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        // Vehicle Data and Grouping
        const vehicles = @json($vehicles); // Ensure Laravel passes this correctly
        const groupedVehicles = vehicles.reduce((acc, vehicle) => {
            if (!acc[vehicle.vehicle_type]) {
                acc[vehicle.vehicle_type] = [];
            }
            acc[vehicle.vehicle_type].push(vehicle.vehicle_name);
            return acc;
        }, {});

        // Populate Vehicle Name based on Type
        document.getElementById('vehicle_type')?.addEventListener('change', function () {
            const vehicle_type = this.value;
            const vehicle_nameSelect = document.getElementById('vehicle_name');

            // Reset current options
            vehicle_nameSelect.innerHTML = '<option value="">Pilih Nama Kendaraan</option>';

            if (groupedVehicles[vehicle_type]) {
                groupedVehicles[vehicle_type].forEach((vehicle_name) => {
                    const option = document.createElement('option');
                    option.value = vehicle_name;
                    option.textContent = vehicle_name;
                    vehicle_nameSelect.appendChild(option);
                });
            }
        });

        // Synchronize Level 1 and Level 2 Selections
        function syncLevels(approved_by_level1_name, approved_by_level2_name) {
            const level1Select = document.getElementById(approved_by_level1_name);
            const level2Select = document.getElementById(approved_by_level2_name);

            level1Select?.addEventListener('change', () => {
                const selectedValue = level1Select.value;

                Array.from(level2Select.options).forEach((option) => {
                    option.disabled = option.value === selectedValue;
                });
            });

            level2Select?.addEventListener('change', () => {
                const selectedValue = level2Select.value;

                Array.from(level1Select.options).forEach((option) => {
                    option.disabled = option.value === selectedValue;
                });
            });
        }

        // Sync Level 1 and Level 2 dropdowns
        syncLevels('approved_by_level1_name', 'approved_by_level2_name');
    </script>

</body>
</html>
