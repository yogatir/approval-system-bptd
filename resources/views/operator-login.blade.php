<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center h-screen">

    <div class="bg-white shadow-lg rounded-lg w-full max-w-md p-8">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Login</h2>

        <!-- Login form -->
        <form method="POST" action="{{ route('operator-sign-in') }}">
            @csrf

            <!-- Email Input -->
            <div class="mb-5">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email:</label>
                <input type="email" name="email" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter your email">
            </div>

            <!-- Password Input -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password:</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Enter your password">
            </div>

            <!-- Login Button -->
            <div class="text-center">
                <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-lg font-medium hover:bg-blue-600 transition duration-300">
                    Login
                </button>
            </div>
        </form>
    </div>

    @vite('resources/js/app.js')
</body>
</html>