<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Sistema de Roles</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .pulse-animation {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        .greeting-icon {
            animation: bounce 2s infinite;
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-lg shadow-xl border-b border-gray-200/50 dark:border-gray-700/50 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-gradient-to-r from-blue-500 to-purple-600 p-2 rounded-lg shadow-lg">
                        <i class="fas fa-shield-alt text-xl text-white"></i>
                    </div>
                    <div class="ml-3">
                        <span class="text-xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                            Dashboard
                        </span>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Sistema de Gestión</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <div class="relative">
                        <button class="p-2 text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200 relative">
                            <i class="fas fa-bell text-lg"></i>
                            <span class="absolute -top-1 -right-1 h-3 w-3 bg-red-500 rounded-full pulse-animation"></span>
                        </button>
                    </div>
                    
                    <!-- User Menu -->
                    <div class="flex items-center space-x-3 bg-gray-50 dark:bg-gray-700/50 rounded-full px-4 py-2 shadow-lg">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-white text-sm"></i>
                        </div>
                        <div class="hidden md:block">
                            <span class="text-sm font-medium text-gray-900 dark:text-gray-200">{{ Auth::user()->name }}</span>
                            <div class="flex items-center space-x-2">
                                <span class="text-xs px-2 py-0.5 rounded-full {{ Auth::user()->isAdmin() ? 'bg-gradient-to-r from-red-500 to-pink-500 text-white' : 'bg-gradient-to-r from-blue-500 to-indigo-500 text-white' }}">
                                    {{ Auth::user()->role->name }}
                                </span>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full text-sm transition-colors duration-200 shadow-lg">
                                <i class="fas fa-sign-out-alt mr-1"></i>
                                Cerrar Sesión
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <!-- Welcome Section -->
        <div class="mb-8">
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-xl border border-gray-200/50 dark:border-gray-700/50 overflow-hidden">
                <div class="gradient-bg p-8">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm greeting-icon">
                                @php
                                    $hour = (int) date('H');
                                    if ($hour >= 5 && $hour < 12) {
                                        echo '<i class="fas fa-sun text-3xl text-yellow-300"></i>';
                                        $greeting = 'Buenos Días';
                                    } elseif ($hour >= 12 && $hour < 18) {
                                        echo '<i class="fas fa-cloud-sun text-3xl text-orange-400"></i>';
                                        $greeting = 'Buenas Tardes';
                                    } else {
                                        echo '<i class="fas fa-moon text-3xl text-blue-300"></i>';
                                        $greeting = 'Buenas Noches';
                                    }
                                @endphp
                            </div>
                            <div class="ml-6">
                                <h1 class="text-4xl font-bold text-white mb-2">
                                    {{ $greeting }}, {{ Auth::user()->name }}!
                                </h1>
                                <p class="text-gray-200 text-lg">
                                    Bienvenido al sistema de gestión de roles
                                </p>
                                <p class="text-gray-300 text-sm mt-1">
                                    {{ date('d/m/Y H:i') }}
                                </p>
                            </div>
                        </div>
                        <div class="hidden md:block">
                            <div class="text-right text-gray-200">
                                <p class="text-sm">Estado del Sistema</p>
                                <div class="flex items-center mt-2">
                                    <div class="w-2 h-2 bg-green-400 rounded-full mr-2"></div>
                                    <span class="text-sm">En línea</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-xl card-hover border border-gray-200 dark:border-gray-700">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-users text-white text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Usuarios</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-gray-200">{{ \App\Models\User::count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-xl card-hover border border-gray-200 dark:border-gray-700">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-red-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user-shield text-white text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Administradores</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-gray-200">{{ \App\Models\User::where('role_id', 1)->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-xl card-hover border border-gray-200 dark:border-gray-700">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user text-white text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Usuarios</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-gray-200">{{ \App\Models\User::where('role_id', 2)->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-xl card-hover border border-gray-200 dark:border-gray-700">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-clock text-white text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Último Acceso</p>
                            <p class="text-sm font-bold text-gray-900 dark:text-gray-200">{{ Auth::user()->updated_at->format('d/m H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- User Info Card -->
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-xl border border-gray-200 dark:border-gray-700">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-200 mb-6 flex items-center">
                            <i class="fas fa-user-circle text-blue-600 mr-3"></i>
                            Información del Usuario
                        </h3>
                        <div class="space-y-6">
                            <div class="flex items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-user text-blue-600 dark:text-blue-400"></i>
                                </div>
                                <div>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Nombre Completo</span>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-200">{{ Auth::user()->name }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <div class="w-10 h-10 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-envelope text-green-600 dark:text-green-400"></i>
                                </div>
                                <div>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Correo Electrónico</span>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-200">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-user-tag text-purple-600 dark:text-purple-400"></i>
                                </div>
                                <div>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Rol del Sistema</span>
                                    <div class="flex items-center mt-1">
                                        <span class="px-3 py-1 text-sm rounded-full {{ Auth::user()->isAdmin() ? 'bg-gradient-to-r from-red-500 to-pink-500 text-white' : 'bg-gradient-to-r from-blue-500 to-indigo-500 text-white' }}">
                                            {{ Auth::user()->role->name }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <div class="w-10 h-10 bg-orange-100 dark:bg-orange-900 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-calendar text-orange-600 dark:text-orange-400"></i>
                                </div>
                                <div>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Miembro desde</span>
                                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-200">{{ Auth::user()->created_at->format('d/m/Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-xl border border-gray-200 dark:border-gray-700">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-200 mb-6 flex items-center">
                            <i class="fas fa-bolt text-yellow-500 mr-3"></i>
                            Acciones Rápidas
                        </h3>
                        <div class="space-y-3">
                            @if(Auth::user()->isAdmin())
                                <a href="#" class="block w-full text-left px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition duration-200 border border-gray-200 dark:border-gray-600">
                                    <i class="fas fa-users-cog text-blue-600 mr-3"></i>
                                    Gestionar Usuarios
                                </a>
                                <a href="#" class="block w-full text-left px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-green-50 dark:hover:bg-green-900/20 rounded-lg transition duration-200 border border-gray-200 dark:border-gray-600">
                                    <i class="fas fa-cog text-green-600 mr-3"></i>
                                    Configuración del Sistema
                                </a>
                                <a href="#" class="block w-full text-left px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-purple-900/20 rounded-lg transition duration-200 border border-gray-200 dark:border-gray-600">
                                    <i class="fas fa-chart-bar text-purple-600 mr-3"></i>
                                    Reportes
                                </a>
                            @else
                                <a href="#" class="block w-full text-left px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-lg transition duration-200 border border-gray-200 dark:border-gray-600">
                                    <i class="fas fa-user-edit text-blue-600 mr-3"></i>
                                    Editar Perfil
                                </a>
                                <a href="#" class="block w-full text-left px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-green-50 dark:hover:bg-green-900/20 rounded-lg transition duration-200 border border-gray-200 dark:border-gray-600">
                                    <i class="fas fa-key text-green-600 mr-3"></i>
                                    Cambiar Contraseña
                                </a>
                            @endif
                            <a href="{{ route('welcome') }}" class="block w-full text-left px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-lg transition duration-200 border border-gray-200 dark:border-gray-600">
                                <i class="fas fa-home text-gray-600 mr-3"></i>
                                Volver al Inicio
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Role-based Content -->
        @if(Auth::user()->isAdmin())
            <div class="mt-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-xl border border-gray-200 dark:border-gray-700">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-200 mb-4 flex items-center">
                            <i class="fas fa-crown text-yellow-500 mr-3"></i>
                            Panel de Administración
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Como administrador, tienes acceso completo a todas las funcionalidades del sistema.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="p-4 bg-red-50 dark:bg-red-900/20 rounded-lg border border-red-200 dark:border-red-800">
                                <i class="fas fa-shield-alt text-red-600 text-2xl mb-2"></i>
                                <h4 class="font-semibold text-red-800 dark:text-red-300">Control Total</h4>
                                <p class="text-sm text-red-600 dark:text-red-400">Gestiona usuarios y configuraciones</p>
                            </div>
                            <div class="p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">
                                <i class="fas fa-chart-line text-blue-600 text-2xl mb-2"></i>
                                <h4 class="font-semibold text-blue-800 dark:text-blue-300">Analytics</h4>
                                <p class="text-sm text-blue-600 dark:text-blue-400">Monitorea el rendimiento del sistema</p>
                            </div>
                            <div class="p-4 bg-green-50 dark:bg-green-900/20 rounded-lg border border-green-200 dark:border-green-800">
                                <i class="fas fa-cogs text-green-600 text-2xl mb-2"></i>
                                <h4 class="font-semibold text-green-800 dark:text-green-300">Configuración</h4>
                                <p class="text-sm text-green-600 dark:text-green-400">Personaliza el sistema según tus necesidades</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="mt-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-lg rounded-xl border border-gray-200 dark:border-gray-700">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-200 mb-4 flex items-center">
                            <i class="fas fa-info-circle text-blue-500 mr-3"></i>
                            Información del Usuario
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Tienes acceso a las funciones básicas del sistema. Contacta al administrador para obtener más permisos.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg border border-blue-200 dark:border-blue-800">
                                <i class="fas fa-user text-blue-600 text-2xl mb-2"></i>
                                <h4 class="font-semibold text-blue-800 dark:text-blue-300">Perfil Personal</h4>
                                <p class="text-sm text-blue-600 dark:text-blue-400">Gestiona tu información personal</p>
                            </div>
                            <div class="p-4 bg-green-50 dark:bg-green-900/20 rounded-lg border border-green-200 dark:border-green-800">
                                <i class="fas fa-lock text-green-600 text-2xl mb-2"></i>
                                <h4 class="font-semibold text-green-800 dark:text-green-300">Seguridad</h4>
                                <p class="text-sm text-green-600 dark:text-green-400">Cambia tu contraseña y configuración</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</body>
</html>