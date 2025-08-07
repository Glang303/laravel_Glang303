<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Aplikasi Medical</title>
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
            <h1 class="text-4xl lg:text-5xl font-bold mb-4">Hello Welcome To <br> <span class="text-white">Aplikasi Medical!</span></h1>
            <p class="mt-3 text-lg leading-relaxed max-w-md">
                Aplikasi Digital Rumah sakit
            </p>
            <p class="mt-auto text-sm opacity-80 absolute bottom-8 left-12 lg:left-16">&copy; 2025 Screening TeraMedik Soal B.</p>
        </div>

        <div class="w-full md:w-1/2 flex items-center justify-center p-8 md:p-12 lg:p-16 bg-white">
            <div class="w-full max-w-sm">
                <h4 class="text-2xl font-bold text-gray-800">Aplikasi Medical</h4>
                <h5 class="mt-4 text-xl font-semibold text-gray-700">Welcome !</h5>
                <p class="text-gray-500 mt-2 text-sm">Belum punya akun? <a href="{{ route("register") }}" class="text-blue-600 hover:underline font-medium">Buat akun sekarang</a></p>

                <form method="POST" action="{{ route('login') }}" class="mt-8">
                     @csrf

                        @if ($errors->any())
                            <div class="mb-4 text-red-600 text-sm">
                                <ul class="list-disc pl-5">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                    <!--USERNAME -->
                    <div class="mb-6">
                        <label for="username" class="block text-gray-700 text-sm font-medium mb-2">Username</label>
                        <input type="text"
                            class="w-full px-3 py-2 border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 text-gray-900 placeholder-gray-400"
                            name="username" id="username"
                            value="{{ old('username') }}" required autofocus placeholder="Masukkan username Anda">
                    </div>

                    <!--PASWORD -->
                    <!-- <div class="mb-8">
                        <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                        <input type="password"
                               class="w-full px-3 py-2 border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 text-gray-900 placeholder-gray-400"
                               name="password" id="password" required placeholder="Masukkan password Anda">
                    </div> -->
                     <!--PASWORD -->
                    <div class="mb-8">
                        <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                        <input type="password"
                            class="w-full px-3 py-2 border-b-2 border-gray-300 focus:outline-none focus:border-blue-500 text-gray-900 placeholder-gray-400"
                            name="password" id="password" required placeholder="Masukkan password Anda">
                    </div>


                    <div class="mb-4">
                        <button type="submit" class="w-full bg-blue-700 text-white py-3 px-4 rounded-lg hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300 ease-in-out shadow-md hover:shadow-lg">
                            Login Now
                        </button>
                    </div>

                    <!-- Forgot PW (in progress)-->
                    <p class="text-gray-500 text-sm text-center">
                        Lupa password? <a href="#" class="text-blue-600 hover:underline font-medium">Klik di sini</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
