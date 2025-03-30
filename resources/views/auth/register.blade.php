<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Portal Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            overflow: hidden;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
            background-size: 600% 600%;
            animation: gradient-animation 10s ease infinite;
        }
        @keyframes gradient-animation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .register-card {
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .custom-input {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
        }
        .custom-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        .custom-input:focus {
            border-color: #fdbb2d;
            outline: none;
            box-shadow: 0 0 0 2px rgba(253, 187, 45, 0.3);
        }
        .register-btn {
            background: linear-gradient(90deg, #b21f1f, #fdbb2d);
            transition: all 0.3s ease;
        }
        .register-btn:hover {
            background: linear-gradient(90deg, #fdbb2d, #b21f1f);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(178, 31, 31, 0.4);
        }
        .medical-cross {
            width: 48px;
            height: 48px;
            position: relative;
        }
        .medical-cross .vertical {
            position: absolute;
            width: 30%;
            height: 100%;
            background: white;
            left: 35%;
            border-radius: 4px;
        }
        .medical-cross .horizontal {
            position: absolute;
            height: 30%;
            width: 100%;
            background: white;
            top: 35%;
            border-radius: 4px;
        }
    </style>
</head>
<body class="gradient-bg">
    <div class="flex items-center justify-center h-screen">
        <div class="register-card w-full max-w-4xl flex rounded-xl shadow-2xl overflow-hidden">
            
            <!-- Left Panel - Image/Branding -->
            <div class="hidden lg:block lg:w-1/2 relative">
                <div class="absolute inset-0 flex flex-col items-start justify-between p-12">
                    <div class="w-full">
                        <!-- Medical Cross Symbol -->
                        <div class="medical-cross">
                            <div class="vertical"></div>
                            <div class="horizontal"></div>
                        </div>
                        
                        <h2 class="text-white text-3xl font-bold mt-12">MediConnect</h2>
                        <h2 class="text-white text-3xl font-bold">Dispatch Portal</h2>
                        <p class="text-white text-opacity-80 mt-4 max-w-xs">Create your account to access our comprehensive schedule dispatch management system.</p>
                    </div>
                    
                    <div class="text-white text-opacity-60 text-sm">
                        © 2025 MediConnect Ambulance Dispatch Systems. All rights reserved.
                    </div>
                </div>
            </div>
            
            <!-- Right Panel - Registration Form -->
            <div class="w-full lg:w-1/2 bg-black bg-opacity-30 p-8 lg:p-12 overflow-y-auto" style="max-height: 100vh;">
                <div class="text-center lg:text-left">
                    <h1 class="text-white text-3xl font-bold">Create Account</h1>
                    <p class="text-white text-opacity-70 mt-2">Register for healthcare staff access</p>
                </div>
                
                <form method="POST" action="{{ route('register') }}" class="mt-10 space-y-6">
                    @csrf
                    
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-white text-opacity-90 text-sm font-medium mb-2">Full Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" 
                               placeholder="Enter your full name"
                               class="custom-input w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-opacity-50">
                        @error('name')
                            <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-white text-opacity-90 text-sm font-medium mb-2">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                               placeholder="your.email@example.com"
                               class="custom-input w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-opacity-50">
                        @error('email')
                            <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-white text-opacity-90 text-sm font-medium mb-2">Password</label>
                        <input type="password" id="password" name="password" required autocomplete="new-password"
                               placeholder="Create a secure password"
                               class="custom-input w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-opacity-50">
                        @error('password')
                            <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-white text-opacity-90 text-sm font-medium mb-2">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password"
                               placeholder="Confirm your password"
                               class="custom-input w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-opacity-50">
                        @error('password_confirmation')
                            <p class="text-red-300 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Terms and Conditions -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" name="terms" type="checkbox" required
                                   class="h-4 w-4 bg-black bg-opacity-20 border-0 rounded text-yellow-500 focus:ring-yellow-500">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="text-white text-opacity-70">I agree to the <a href="#" class="text-yellow-400 hover:text-yellow-300">Terms of Service</a> and <a href="#" class="text-yellow-400 hover:text-yellow-300">Privacy Policy</a></label>
                        </div>
                    </div>
                    
                    <!-- Register Button and Login Link -->
                    <div class="flex flex-col space-y-4">
                        <button type="submit" class="register-btn w-full py-3 px-4 text-white font-medium rounded-lg shadow-lg">
                            Create Account
                        </button>
                        
                        <div class="text-center">
                            <a href="{{ route('login') }}" class="text-white text-opacity-90 hover:text-yellow-300 transition-colors duration-300">
                                Already registered? Sign in
                            </a>
                        </div>
                    </div>
                    
                    <!-- Additional Notes -->
                    <div class="mt-6 text-center text-white text-opacity-60 text-sm">
                        <p>Your account will need approval before activation.</p>
                        <p class="mt-2">For technical support, please contact the IT department.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>