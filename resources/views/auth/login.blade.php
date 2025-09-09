<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar Sesión - Sistema de Roles</title>
    
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'media',
            theme: {
                extend: {
                    animation: {
                        'slideInUp': 'slideInUp 0.6s ease-out',
                        'fadeIn': 'fadeIn 0.8s ease-out',
                        'bounce': 'bounce 1s infinite'
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <!-- Background Pattern -->
    <div class="fixed inset-0 opacity-10 dark:opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(59, 130, 246, 0.4) 1px, transparent 0); background-size: 20px 20px;"></div>
    </div>

    <div class="relative max-w-md w-full mx-auto space-y-8">
        <!-- Header -->
        <div class="text-center animate-fadeIn">
            <div class="flex justify-center mb-6">
                <div class="bg-gradient-to-br from-blue-500 to-purple-600 p-4 rounded-full shadow-lg animate-pulse">
                    <i class="fas fa-shield-alt text-3xl text-white"></i>
                </div>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                Iniciar Sesión
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Accede a tu cuenta del sistema de roles
            </p>
        </div>

        <!-- Login Form -->
        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm py-8 px-6 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700 animate-slideInUp">
            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900 dark:to-emerald-900 border border-green-200 dark:border-green-700 text-green-700 dark:text-green-300 rounded-xl flex items-center">
                    <i class="fas fa-check-circle mr-3 text-green-500"></i>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6" id="loginForm">
                @csrf

                <!-- Email Address -->
                <div class="space-y-1">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="fas fa-envelope text-blue-500 mr-2"></i>Correo Electrónico
                    </label>
                    <div class="relative">
                        <input id="email" 
                               type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autofocus 
                               autocomplete="username"
                               class="w-full px-4 py-3 pl-12 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700/50 dark:text-white transition-all duration-200 @error('email') border-red-500 ring-2 ring-red-500 @enderror"
                               placeholder="ejemplo@correo.com">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        @if(!$errors->has('email') && old('email'))
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                                <i class="fas fa-check-circle text-green-500"></i>
                            </div>
                        @endif
                    </div>
                    @error('email')
                        <div class="flex items-center mt-2 text-sm text-red-600 dark:text-red-400 animate-slideInUp">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="space-y-1">
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="fas fa-lock text-blue-500 mr-2"></i>Contraseña
                    </label>
                    <div class="relative">
                        <input id="password" 
                               type="password" 
                               name="password" 
                               required 
                               autocomplete="current-password"
                               class="w-full px-4 py-3 pl-12 pr-12 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700/50 dark:text-white transition-all duration-200 @error('password') border-red-500 ring-2 ring-red-500 @enderror"
                               placeholder="Ingresa tu contraseña">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <button type="button" class="absolute inset-y-0 right-0 pr-4 flex items-center" onclick="togglePassword()">
                            <i class="fas fa-eye text-gray-400 hover:text-gray-600 transition-colors duration-200" id="password-toggle"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="flex items-center mt-2 text-sm text-red-600 dark:text-red-400 animate-slideInUp">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" 
                               type="checkbox" 
                               name="remember" 
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded transition-colors duration-200">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-700 dark:text-gray-300 select-none cursor-pointer">
                            Recordarme
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" 
                           class="text-sm text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300 transition duration-200 group">
                            <i class="fas fa-key mr-1 group-hover:animate-bounce"></i>
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-medium py-3 px-4 rounded-xl shadow-lg hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98] disabled:opacity-50 disabled:cursor-not-allowed"
                            id="submitBtn">
                        <span id="submitText">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Iniciar Sesión
                        </span>
                        <span id="loadingText" class="hidden">
                            <i class="fas fa-spinner fa-spin mr-2"></i>
                            Iniciando sesión...
                        </span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Register Link -->
        @if (Route::has('register'))
            <div class="text-center animate-fadeIn">
                <div class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-xl px-6 py-4 border border-gray-200 dark:border-gray-700">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        ¿No tienes una cuenta?
                        <a href="{{ route('register') }}" 
                           class="font-medium text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300 transition duration-200 ml-1">
                            Regístrate aquí
                        </a>
                    </p>
                </div>
            </div>
        @endif

        <!-- Back to Home -->
        <div class="text-center">
            <a href="{{ route('welcome') }}" 
               class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition duration-200 group">
                <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform duration-200"></i>
                Volver al inicio
            </a>
        </div>

        <!-- Security Features Info -->
        <div class="bg-blue-50/50 dark:bg-blue-900/20 rounded-xl p-4 border border-blue-200 dark:border-blue-800">
            <div class="flex items-start space-x-3">
                <div class="flex-shrink-0">
                    <i class="fas fa-shield-alt text-blue-500 text-lg mt-0.5"></i>
                </div>
                <div class="text-sm">
                    <h4 class="font-medium text-gray-900 dark:text-white mb-1">Seguridad Garantizada</h4>
                    <p class="text-gray-600 dark:text-gray-400 text-xs">
                        Tus datos están protegidos con encriptación de última generación y autenticación segura.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Password visibility toggle
        function togglePassword() {
            const field = document.getElementById('password');
            const toggle = document.getElementById('password-toggle');
            
            if (field.type === 'password') {
                field.type = 'text';
                toggle.className = 'fas fa-eye-slash text-gray-400 hover:text-gray-600 transition-colors duration-200';
            } else {
                field.type = 'password';
                toggle.className = 'fas fa-eye text-gray-400 hover:text-gray-600 transition-colors duration-200';
            }
        }

        // Form submission loading state
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const loadingText = document.getElementById('loadingText');
            
            submitBtn.disabled = true;
            submitText.classList.add('hidden');
            loadingText.classList.remove('hidden');
            
            // Re-enable button after 5 seconds as fallback
            setTimeout(() => {
                submitBtn.disabled = false;
                submitText.classList.remove('hidden');
                loadingText.classList.add('hidden');
            }, 5000);
        });

        // Enhanced email validation
        document.getElementById('email').addEventListener('blur', function(e) {
            const email = e.target.value;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (email && !emailRegex.test(email)) {
                e.target.classList.add('border-red-500', 'ring-2', 'ring-red-500');
                
                // Remove existing feedback
                const existingFeedback = e.target.parentNode.querySelector('.email-feedback');
                if (existingFeedback) {
                    existingFeedback.remove();
                }
                
                // Add feedback
                const feedback = document.createElement('div');
                feedback.className = 'flex items-center mt-2 text-sm text-red-600 dark:text-red-400 email-feedback';
                feedback.innerHTML = '<i class="fas fa-exclamation-circle mr-2"></i><span>Por favor, ingresa un correo válido</span>';
                e.target.parentNode.appendChild(feedback);
            } else {
                e.target.classList.remove('border-red-500', 'ring-2', 'ring-red-500');
                const existingFeedback = e.target.parentNode.querySelector('.email-feedback');
                if (existingFeedback) {
                    existingFeedback.remove();
                }
            }
        });

        // Auto-hide session status after 5 seconds
        const sessionStatus = document.querySelector('.bg-gradient-to-r.from-green-50');
        if (sessionStatus) {
            setTimeout(() => {
                sessionStatus.style.opacity = '0';
                sessionStatus.style.transform = 'translateY(-20px)';
                setTimeout(() => {
                    sessionStatus.remove();
                }, 300);
            }, 5000);
        }

        // Focus management
        document.addEventListener('DOMContentLoaded', function() {
            const emailField = document.getElementById('email');
            if (emailField && !emailField.value) {
                emailField.focus();
            }
        });
    </script>
</body>
</html>