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
                <span class="text-[15px] ml-4">Booking</span>
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
        <!-- Add User Button -->
        <div class="container mx-auto">
            <button id="openModalBtn" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Add User</button>

            <!-- Modal -->
            <div id="userModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                <div class="bg-white rounded p-6 w-96">
                    <h2 class="text-xl font-semibold mb-4">Add User</h2>

                    <!-- User Form -->
                    <form id="userForm" method="POST" action="{{ route('user.store') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="username" class="block text-sm font-medium text-gray-700">User Name</label>
                            <input type="text" id="username" name="username" class="w-full px-3 py-2 border rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-md" required>
                        </div>
                        <div class="mb-4">
                            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                            <select id="role" name="role" class="w-full px-3 py-2 border rounded-md">
                                <option value="admin">Admin</option>
                                <option value="approval">Approval</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                            <input type="text" id="position" name="position" class="w-full px-3 py-2 border rounded-md" required>
                        </div>

                        <!-- Hidden input for service_schedule and status -->
                        <input type="hidden" name="image_url" value="https://i.pinimg.com/236x/f8/19/e4/f819e4d4f5b6a266a71f8a5248003e39.jpg">

                        <div class="flex justify-end">
                            <button type="submit" id="submitUserBtn" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Submit</button>
                            <button type="button" id="closeModalBtn" class="ml-2 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Tabel users -->
        <div class="mt-6 overflow-auto max-h-96">
            <table class="min-w-full bg-white border border-gray-300 dark:bg-slate-800 dark:text-white" id="userTable">
                <thead>
                    <tr>
                        <th class="px-2 py-px border text-center bg-slate-200">user ID</th>
                        <th class="px-2 py-px border text-center bg-slate-200">Foto</th>
                        <th class="px-2 py-px border text-center bg-slate-200">Nama</th>
                        <th class="px-2 py-px border text-center bg-slate-200">Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr class="{{ $index % 2 === 0 ? 'bg-slate-100' : 'bg-slate-200' }}">
                            <td class="px-2 py-px border text-center">{{ $user->user_id }}</td>
                            <td class="px-2 py-px border text-center">
                                <img src="{{ $user->image_url }}" alt="User Image"
                                     class="w-16 h-16 object-cover aspect-square mx-auto cursor-pointer"
                                     onclick="zoomImage('{{ $user->image_url }}')">
                            </td>
                            <td class="px-2 py-px border text-center">{{ $user->username }}</td>
                            <td class="px-2 py-px border text-center">{{ $user->position }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <div id="zoomModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                    <div class="relative">
                        <img id="zoomedImage" class="max-w-full max-h-full" src="" alt="Zoomed Image">
                        <button onclick="closeZoom()" class="absolute top-2 right-2 text-white bg-black px-2 rounded-full">X</button>
                    </div>
                </div>
            </table>
        </div>
    </div>
        <script type="text/javascript">
        function Open(){
            document.querySelector('.sidebar').classList.toggle('left-[-300px]');
        }

        function zoomImage(imageUrl) {
            const modal = document.getElementById('zoomModal');
            const zoomedImage = document.getElementById('zoomedImage');
            zoomedImage.src = imageUrl;
            modal.classList.remove('hidden');
        }

        function closeZoom() {
            const modal = document.getElementById('zoomModal');
            modal.classList.add('hidden');
        }

        // Open Modal
        document.getElementById('openModalBtn').addEventListener('click', () => {
            document.getElementById('userModal').classList.remove('hidden');
        });

        // Close Modal
        document.getElementById('closeModalBtn').addEventListener('click', () => {
            document.getElementById('userModal').classList.add('hidden');
        });

        // Mengirim form tanpa reload halaman (AJAX)
        document.getElementById('userForm').addEventListener('submit', function(event) {
            event.preventDefault();  // Menghindari reload halaman

            let formData = new FormData(this);

            // Ambil token CSRF dari halaman
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch("{{ route('user.store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json', // Tambahkan header ini
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json(); // Parsing JSON
            })
            .then(data => {
                console.log('Server Response:', data);
                if (data.success) {
                    // Tambahkan baris ke tabel
                    const userTable = document.getElementById('userTable').getElementsByTagName('tbody')[0];
                    const newRow = userTable.insertRow();
                    newRow.innerHTML = `
                        <td class="px-2 py-px border text-center">${data.user_id}</td>
                        <td class="px-2 py-px border text-center">
                            <img src="${data.image_url}" alt="User Image" class="w-20 h-20 object-cover rounded">
                        </td>
                        <td class="px-2 py-px border text-center">${data.username}</td>
                        <td class="px-2 py-px border text-center">${data.position}</td>
                    `;
                } else {
                    alert('Error while saving user');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred');
            });
        });
    </script>
</body>
</html>
