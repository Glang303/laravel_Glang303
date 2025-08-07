<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | Aplikasi Medical</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .left-panel-bg {
            background: linear-gradient(135deg, #2a4365 0%, #1a202c 100%); 
            position: relative;
            overflow: hidden;
        }
        .left-panel-bg::before,
        .left-panel-bg::after {
            content: '';
            position: absolute;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
        }
        .left-panel-bg::before {
            width: 300px;
            height: 300px;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(45deg);
        }
        .left-panel-bg::after {
            width: 500px;
            height: 500px;
            bottom: 10%;
            right: 50%;
            transform: translate(50%, 50%) rotate(-30deg);
        }
        /* Star icon using SVG for simplicity */
        .star-icon {
            width: 40px;
            height: 40px;
            fill: white;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="font-sans bg-gray-100">
    <div class="min-h-screen flex">
        <div class="hidden md:flex md:w-1/2 left-panel-bg flex-col justify-center items-start p-12 lg:p-16 text-white relative z-10">
            <h1 class="text-4xl lg:text-5xl font-bold mb-4">Start <br> <span class="text-white">Your Journey </span> :V !</h1>
            <p class="mt-3 text-lg leading-relaxed max-w-md">
                lorem ipsum ya begitulah!
            </p>
            <p class="mt-auto text-sm opacity-80 absolute bottom-8 left-12 lg:left-16">&copy; 2025 Screening TeraMedik Soal B.</p>
        </div>

        <div class="w-full md:w-1/2 flex items-center justify-center p-8 md:p-12 lg:p-16 bg-white">
            <div class="w-full max-w-sm">
                <h4 class="text-2xl font-bold text-gray-800">Aplikasi Medical</h4>
                <h5 class="mt-4 text-xl font-semibold text-gray-700">Buat Akun Baru</h5>
                <p class="text-gray-500 mt-2 text-sm">Sudah punya akun? <a href="{{ route("login") }}" class="text-blue-600 hover:underline font-medium">Masuk di sini</a></p>

                <form method="POST" action="{{ route('register') }}" class="mt-8">
                    @csrf
                    
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Nama Lengkap</label>
                        <input type="text"
                               class="w-full px-3 py-2 border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 text-gray-900 placeholder-gray-400"
                               name="name" id="name" value="{{ old('name') }}"
                               required placeholder="Masukkan nama lengkap Anda">
                    </div>
                    
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700 text-sm font-medium mb-2">Username</label>
                        <input type="text"
                               class="w-full px-3 py-2 border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 text-gray-900 placeholder-gray-400"
                               name="username" id="username" value="{{ old('username') }}"
                               required placeholder="Pilih username Anda">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                        <input type="password"
                               class="w-full px-3 py-2 border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 text-gray-900 placeholder-gray-400"
                               name="password" id="password" required placeholder="Masukkan password">
                    </div>

                    <div class="mb-8">
                        <label for="password_confirmation" class="block text-gray-700 text-sm font-medium mb-2">Konfirmasi Password</label>
                        <input type="password"
                               class="w-full px-3 py-2 border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 text-gray-900 placeholder-gray-400"
                               name="password_confirmation" id="password_confirmation" required placeholder="Ulangi password Anda">
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="w-full bg-blue-700 text-white py-3 px-4 rounded-lg hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300 ease-in-out shadow-md hover:shadow-lg">
                            Daftar Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
