<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-2xl p-8 w-full max-w-md">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Create Your Account</h1>
            <p class="text-gray-600">Join us and start your journey</p>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('register') }}" class="grid grid-cols-2 gap-4">
            @csrf

            <!-- Username Field -->
            <div class="col-span-2">
                <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                <input
                    id="username"
                    type="text"
                    name="username"
                    value="{{ old('username') }}"
                    {{-- required --}}
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                    placeholder="Enter your username"
                />
                @error('username')
                    <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nama Lengkap Field -->
            <div class="col-span-2">
                <label for="namalengkap" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                <input
                    id="namalengkap"
                    type="text"
                    name="namalengkap"
                    value="{{ old('namalengkap') }}"
                    {{-- required --}}
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                    placeholder="Enter your full name"
                />
                @error('namalengkap')
                    <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="col-span-2">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    {{-- required --}}
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                    placeholder="Enter your email"
                />
                @error('email')
                    <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="col-span-1">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    {{-- required --}}
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                    placeholder="Enter your password"
                />
                @error('password')
                    <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password Field -->
            <div class="col-span-1">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    {{-- required --}}
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                    placeholder="Confirm your password"
                />
            </div>

            <!-- Alamat Field -->
            <div class="col-span-2">
                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                <textarea
                    id="alamat"
                    name="alamat"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                    placeholder="Enter your address"
                >{{ old('alamat') }}</textarea>
                @error('alamat')
                    <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="col-span-2">
                <button
                    type="submit"
                    class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all"
                >
                    Register
                </button>
            </div>
        </form>

        <!-- Login Link -->
        <div class="text-center mt-6">
            <p class="text-sm text-gray-600">Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login here</a></p>
        </div>
    </div>
</body>
</html>
