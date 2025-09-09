<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrarse - Sistema de Roles</title>
    
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
                        'pulse': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite'
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
        .password-strength-meter {
            height: 4px;
            border-radius: 2px;
            margin-top: 8px;
            background: #e5e7eb;
            overflow: hidden;
        }
        .password-strength-fill {
            height: 100%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }
        .strength-weak { width: 25%; background: #ef4444; }
        .strength-fair { width: 50%; background: #f59e0b; }
        .strength-good { width: 75%; background: #3b82f6; }
        .strength-strong { width: 100%; background: #10b981; }
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
                <div class="bg-gradient-to-br from-blue-500 to-purple-600 p-4 rounded-full shadow-lg">
                    <i class="fas fa-user-plus text-3xl text-white"></i>
                </div>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                Crear Cuenta
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Únete al sistema de gestión de roles
            </p>
        </div>

        <!-- Register Form -->
        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm py-8 px-6 shadow-2xl rounded-2xl border border-gray-200 dark:border-gray-700 animate-slideInUp">
            <form method="POST" action="{{ route('register') }}" class="space-y-6" id="registerForm">
                @csrf

                <!-- Name -->
                <div class="space-y-1">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="fas fa-user text-blue-500 mr-2"></i>Nombre Completo
                    </label>
                    <div class="relative">
                        <input id="name" 
                               type="text" 
                               name="name" 
                               value="{{ old('name') }}" 
                               required 
                               autofocus 
                               autocomplete="name"
                               class="w-full px-4 py-3 pl-12 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700/50 dark:text-white transition-all duration-200 @error('name') border-red-500 ring-2 ring-red-500 @enderror"
                               placeholder="Ingresa tu nombre completo">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                    </div>
                    @error('name')
                        <div class="flex items-center mt-2 text-sm text-red-600 dark:text-red-400">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

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
                               autocomplete="username"
                               class="w-full px-4 py-3 pl-12 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700/50 dark:text-white transition-all duration-200 @error('email') border-red-500 ring-2 ring-red-500 @enderror"
                               placeholder="ejemplo@correo.com">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                    </div>
                    @error('email')
                        <div class="flex items-center mt-2 text-sm text-red-600 dark:text-red-400">
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
                               autocomplete="new-password"
                               class="w-full px-4 py-3 pl-12 pr-12 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700/50 dark:text-white transition-all duration-200 @error('password') border-red-500 ring-2 ring-red-500 @enderror"
                               placeholder="Crea una contraseña segura">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <button type="button" class="absolute inset-y-0 right-0 pr-4 flex items-center" onclick="togglePassword('password')">
                            <i class="fas fa-eye text-gray-400 hover:text-gray-600 transition-colors duration-200" id="password-toggle"></i>
                        </button>
                    </div>
                    <div class="password-strength-meter">
                        <div class="password-strength-fill" id="password-strength"></div>
                    </div>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1" id="password-feedback">
                        Mínimo 8 caracteres con letras, números y símbolos
                    </p>
                    @error('password')
                        <div class="flex items-center mt-2 text-sm text-red-600 dark:text-red-400">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="space-y-1">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="fas fa-check-circle text-blue-500 mr-2"></i>Confirmar Contraseña
                    </label>
                    <div class="relative">
                        <input id="password_confirmation" 
                               type="password" 
                               name="password_confirmation" 
                               required 
                               autocomplete="new-password"
                               class="w-full px-4 py-3 pl-12 pr-12 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700/50 dark:text-white transition-all duration-200 @error('password_confirmation') border-red-500 ring-2 ring-red-500 @enderror"
                               placeholder="Repite tu contraseña">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i class="fas fa-check-circle text-gray-400"></i>
                        </div>
                        <button type="button" class="absolute inset-y-0 right-0 pr-4 flex items-center" onclick="togglePassword('password_confirmation')">
                            <i class="fas fa-eye text-gray-400 hover:text-gray-600 transition-colors duration-200" id="password_confirmation-toggle"></i>
                        </button>
                    </div>
                    <div id="password-match-indicator" class="text-xs mt-1 hidden">
                        <div class="flex items-center text-green-600 dark:text-green-400" id="password-match-success">
                            <i class="fas fa-check-circle mr-1"></i>
                            Las contraseñas coinciden
                        </div>
                        <div class="flex items-center text-red-600 dark:text-red-400" id="password-match-error">
                            <i class="fas fa-times-circle mr-1"></i>
                            Las contraseñas no coinciden
                        </div>
                    </div>
                    @error('password_confirmation')
                        <div class="flex items-center mt-2 text-sm text-red-600 dark:text-red-400">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Role Selection -->
                <div class="space-y-3">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        <i class="fas fa-user-tag text-blue-500 mr-2"></i>Tipo de Usuario
                    </label>
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 p-4 rounded-xl border border-blue-200 dark:border-gray-600">
                        <div class="flex items-center">
                            <input id="role_user" 
                                   type="radio" 
                                   name="role" 
                                   value="user" 
                                   checked
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                            <label for="role_user" class="ml-3 block">
                                <div class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                    <i class="fas fa-user mr-2 text-blue-500"></i>Usuario Estándar
                                </div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                    Acceso limitado a funciones básicas del sistema
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-medium py-3 px-4 rounded-xl shadow-lg hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98]">
                        <i class="fas fa-user-plus mr-2"></i>
                        Crear Cuenta
                    </button>
                </div>
            </form>
        </div>

        <!-- Login Link -->
        <div class="text-center animate-fadeIn">
            <div class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-xl px-6 py-4 border border-gray-200 dark:border-gray-700">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    ¿Ya tienes una cuenta?
                    <a href="{{ route('login') }}" 
                       class="font-medium text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300 transition duration-200 ml-1">
                        Inicia sesión aquí
                    </a>
                </p>
            </div>
        </div>

        <!-- Back to Home -->
        <div class="text-center">
            <a href="{{ route('welcome') }}" 
               class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition duration-200 group">
                <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform duration-200"></i>
                Volver al inicio
            </a>
        </div>
    </div>

    <script>
        // Password visibility toggle
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const toggle = document.getElementById(fieldId + '-toggle');
            
            if (field.type === 'password') {
                field.type = 'text';
                toggle.className = 'fas fa-eye-slash text-gray-400 hover:text-gray-600 transition-colors duration-200';
            } else {
                field.type = 'password';
                toggle.className = 'fas fa-eye text-gray-400 hover:text-gray-600 transition-colors duration-200';
            }
        }

        // Password strength checker
        function checkPasswordStrength(password) {
            let score = 0;
            let feedback = '';
            
            if (password.length >= 8) score++;
            if (/[a-z]/.test(password)) score++;
            if (/[A-Z]/.test(password)) score++;
            if (/[0-9]/.test(password)) score++;
            if (/[^A-Za-z0-9]/.test(password)) score++;
            
            const strengthMeter = document.getElementById('password-strength');
            const feedbackElement = document.getElementById('password-feedback');
            
            switch (score) {
                case 0:
                case 1:
                    strengthMeter.className = 'password-strength-fill strength-weak';
                    feedback = 'Contraseña muy débil';
                    break;
                case 2:
                    strengthMeter.className = 'password-strength-fill strength-fair';
                    feedback = 'Contraseña débil';
                    break;
                case 3:
                case 4:
                    strengthMeter.className = 'password-strength-fill strength-good';
                    feedback = 'Contraseña buena';
                    break;
                case 5:
                    strengthMeter.className = 'password-strength-fill strength-strong';
                    feedback = 'Contraseña fuerte';
                    break;
            }
            
            feedbackElement.textContent = feedback;
            return score;
        }

        // Password confirmation checker
        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmation = document.getElementById('password_confirmation').value;
            const indicator = document.getElementById('password-match-indicator');
            const success = document.getElementById('password-match-success');
            const error = document.getElementById('password-match-error');
            
            if (confirmation.length === 0) {
                indicator.classList.add('hidden');
                return;
            }
            
            indicator.classList.remove('hidden');
            
            if (password === confirmation) {
                success.classList.remove('hidden');
                error.classList.add('hidden');
            } else {
                success.classList.add('hidden');
                error.classList.remove('hidden');
            }
        }

        // Event listeners
        document.getElementById('password').addEventListener('input', function(e) {
            checkPasswordStrength(e.target.value);
        });

        document.getElementById('password_confirmation').addEventListener('input', checkPasswordMatch);
        document.getElementById('password').addEventListener('input', checkPasswordMatch);

        // Form validation
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmation = document.getElementById('password_confirmation').value;
            
            if (password !== confirmation) {
                e.preventDefault();
                alert('Las contraseñas no coinciden. Por favor, verifica e intenta nuevamente.');
                return false;
            }
            
            if (checkPasswordStrength(password) < 2) {
                e.preventDefault();
                alert('Por favor, utiliza una contraseña más segura.');
                return false;
            }
        });
    </script>
</body>
</html>