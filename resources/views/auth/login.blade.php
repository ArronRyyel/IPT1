<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Portal Login</title>
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
        .login-card {
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
        .login-btn {
            background: linear-gradient(90deg, #b21f1f, #fdbb2d);
            transition: all 0.3s ease;
        }
        .login-btn:hover {
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
        <div class="login-card w-full max-w-4xl flex rounded-xl shadow-2xl overflow-hidden">
            
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
                        <h2 class="text-white text-3xl font-bold">Healthcare Portal</h2>
                        <p class="text-white text-opacity-80 mt-4 max-w-xs">Access your medical dashboard and continue where you left off.</p>
                    </div>
                    
                    <div class="text-white text-opacity-60 text-sm">
                        © 2025 MediConnect Healthcare Systems. All rights reserved.
                    </div>
                </div>
            </div>
            
            <!-- Right Panel - Login Form -->
            <div class="w-full lg:w-1/2 bg-black bg-opacity-30 p-8 lg:p-12">
                <div class="text-center lg:text-left">
                    <h1 class="text-white text-3xl font-bold">Welcome Back</h1>
                    <p class="text-white text-opacity-70 mt-2">Please sign in to your healthcare account</p>
                </div>
                
                <form class="mt-10 space-y-6">
                    <!-- Username -->
                    <div>
                        <label for="username" class="block text-white text-opacity-90 text-sm font-medium mb-2">Username</label>
                        <input type="text" id="username" placeholder="Enter your username" 
                               class="custom-input w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-opacity-50">
                    </div>
                    
                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-white text-opacity-90 text-sm font-medium mb-2">Password</label>
                        <input type="password" id="password" placeholder="••••••••" 
                               class="custom-input w-full px-4 py-3 rounded-lg focus:ring-2 focus:ring-opacity-50">
                    </div>
                    
                    <!-- Options -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" 
                                   class="h-4 w-4 bg-black bg-opacity-20 border-0 rounded text-yellow-500 focus:ring-yellow-500">
                            <label for="remember-me" class="ml-2 block text-white text-opacity-70 text-sm">Remember me</label>
                        </div>
                        <div class="text-sm">
                            <a href="#" class="text-yellow-400 hover:text-yellow-300">Forgot password?</a>
                        </div>
                    </div>
                    
                    <!-- Login Button -->
                    <div>
                        <button type="submit" class="login-btn w-full py-3 px-4 text-white font-medium rounded-lg shadow-lg">
                            Sign In
                        </button>
                    </div>
                    
                    <!-- Sign Up Link -->
                    <div class="text-center mt-6">
                        <p class="text-white text-opacity-70">
                            Don't have an account?
                            <a href="/register" class="text-yellow-400 hover:text-yellow-300 ml-1">Register</a>
                        </p>
                    </div>
                    
                    <!-- Additional Notes -->
                    <div class="mt-8">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-white border-opacity-20"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-3 bg-black bg-opacity-30 text-white text-opacity-60">Secure login</span>
                            </div>
                        </div>
                        
                        <div class="mt-6 text-center text-white text-opacity-60 text-sm">
                            <p>This portal is for authorized healthcare personnel only.</p>
                            <p class="mt-2">For patient access, please visit our patient portal.</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>