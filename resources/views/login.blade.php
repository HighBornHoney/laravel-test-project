<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        body {
            background-color: #121212; /* Dark background */
            color: #00ffcc; /* Neon color */
            font-family: 'Courier New', Courier, monospace; /* Futuristic font */
        }
        .bg-white {
            background-color: rgba(20, 20, 20, 0.8); /* Semi-transparent dark background */
            border: 1px solid #00ffcc; /* Neon border */
            box-shadow: 0 0 20px rgba(0, 255, 204, 0.5); /* Neon glow */
        }
        h2 {
            text-shadow: 0 0 10px #00ffcc, 0 0 20px #00ffcc; /* Neon text shadow */
        }
        input {
            background-color: rgba(30, 30, 30, 0.8); /* Dark input background */
            color: #00ffcc; /* Neon text color */
            border: 1px solid #00ffcc; /* Neon border */
        }
        input:focus {
            outline: none;
            border-color: #ff00ff; /* Pink focus border */
            box-shadow: 0 0 5px #ff00ff; /* Pink glow on focus */
        }
        button {
            background-color: #ff00ff; /* Pink button */
            color: #fff; /* White text */
            transition: background-color 0.3s, transform 0.3s;
        }
        button:hover {
            background-color: #00ffcc; /* Change to neon green on hover */
            transform: scale(1.05); /* Slightly enlarge on hover */
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen">
<div class="bg-white p-6 rounded-lg shadow-md w-96">
    <h2 class="text-2xl font-bold mb-6 text-center">Get a Token</h2>
    <form action="{{ route('passport.token') }}" method="POST">
        @csrf
        <div>
            <input type="hidden" name="grant_type" value="password">
            <input type="hidden" name="scope" value="">
        </div>
        <div class="mb-4">
            <label for="client_id" class="block text-sm font-medium">Client ID</label>
            <input type="text" name="client_id" id="client_id" required
                   class="mt-1 block w-full rounded-md p-2">
        </div>
        <div class="mb-4">
            <label for="client_secret" class="block text-sm font-medium">Client Secret</label>
            <input type="text" name="client_secret" id="client_secret" required
                   class="mt-1 block w-full rounded-md p-2">
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="email" name="username" id="email" required
                   class="mt-1 block w-full rounded-md p-2"
                   value="{{ old('username') }}">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium">Password</label>
            <input type="password" name="password" id="password" required
                   class="mt-1 block w-full rounded-md p-2">
        </div>
        <button type="submit"
                class="w-full rounded-md p-2">Submit
        </button>
    </form>
</div>
</body>
</html>
