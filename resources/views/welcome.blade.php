<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistema de Redireccionamiento de Roles</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        
        <!-- Font Awesome 5 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        
        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                darkMode: 'media',
                theme: {
                    extend: {
                        fontFamily: {
                            'sans': ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif']
                        },
                        animation: {
                            'fadeInUp': 'fadeInUp 0.6s ease-out',
                            'fadeInDown': 'fadeInDown 0.6s ease-out'
                        }
                    }
                }
            }
        </script>
        <style>
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            @keyframes fadeInDown {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            .animate-fadeInUp {
                animation: fadeInUp 0.6s ease-out;
            }
            .animate-fadeInDown {
                animation: fadeInDown 0.6s ease-out;
            }
        </style>
    </head>
    <body class="bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800 text-gray-900 dark:text-gray-100 min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-sm shadow-lg border-b border-gray-200 dark:border-gray-700 animate-fadeInDown">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <i class="fas fa-shield-alt text-2xl text-blue-600 dark:text-blue-400 mr-3"></i>
                        <span class="text-xl font-bold text-gray-900 dark:text-white">Sistema de Redireccionamiento de Roles</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 rounded-md transition duration-200">
                                <i class="fas fa-tachometer-alt mr-2"></i>
                                Dashboard
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition duration-200">
                                    <i class="fas fa-sign-out-alt mr-2"></i>
                                    Cerrar Sesión
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 rounded-md transition duration-200">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                Iniciar Sesión
                            </a>
                            <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200">
                                <i class="fas fa-user-plus mr-2"></i>
                                Registrarse
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
                <div class="text-center animate-fadeInUp">
                    <h1 class="text-4xl md:text-6xl font-bold text-gray-900 dark:text-white mb-6">
                        Sistema de <span class="text-blue-600 dark:text-blue-400">Redireccionamiento de Roles</span>
                    </h1>
                    <p class="text-xl text-gray-600 dark:text-gray-300 mb-8 max-w-3xl mx-auto">
                        Una solución completa para la gestión y redireccionamiento de usuarios basado en roles y permisos en aplicaciones Laravel.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="#caracteristicas" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition duration-200 flex items-center justify-center hover:scale-105 transform">
                            <i class="fas fa-rocket mr-2"></i>
                            Ver Características
                        </a>
                        <a href="#requisitos" class="bg-white dark:bg-gray-800 text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 px-8 py-3 rounded-lg font-semibold transition duration-200 flex items-center justify-center hover:scale-105 transform">
                            <i class="fas fa-info-circle mr-2"></i>
                            Ver Requisitos
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <section id="caracteristicas" class="py-20 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        Características Principales
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">
                        Funcionalidades esenciales para un sistema robusto de gestión de roles
                    </p>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 hover:scale-105 transform">
                        <div class="text-blue-600 dark:text-blue-400 text-4xl mb-4">
                            <i class="fas fa-users-cog"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Gestión de Roles</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Crea, edita y administra roles de usuario con permisos específicos para cada funcionalidad del sistema.
                        </p>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 hover:scale-105 transform">
                        <div class="text-green-600 dark:text-green-400 text-4xl mb-4">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Control de Acceso</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Sistema de permisos granular que controla el acceso a diferentes secciones y funcionalidades.
                        </p>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 hover:scale-105 transform">
                        <div class="text-purple-600 dark:text-purple-400 text-4xl mb-4">
                            <i class="fas fa-route"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Redireccionamiento Inteligente</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Redirección automática de usuarios según su rol después del login o acceso a rutas protegidas.
                        </p>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 hover:scale-105 transform">
                        <div class="text-orange-600 dark:text-orange-400 text-4xl mb-4">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Autenticación Segura</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Sistema de autenticación robusto con validación de credenciales y sesiones seguras.
                        </p>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 hover:scale-105 transform">
                        <div class="text-red-600 dark:text-red-400 text-4xl mb-4">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Middleware de Protección</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Middleware personalizado que protege rutas y valida permisos antes de permitir el acceso.
                        </p>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300 hover:scale-105 transform">
                        <div class="text-indigo-600 dark:text-indigo-400 text-4xl mb-4">
                            <i class="fas fa-database"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Base de Datos Optimizada</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Estructura de base de datos optimizada para consultas rápidas y escalabilidad.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Requirements Section -->
        <section id="requisitos" class="py-20 bg-gray-50 dark:bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        Requisitos del Sistema
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">
                        Tecnologías y dependencias necesarias para implementar el sistema
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                            <i class="fas fa-server text-blue-600 dark:text-blue-400 mr-3"></i>
                            Requisitos del Servidor
                        </h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                <div>
                                    <strong class="text-gray-900 dark:text-white">PHP 8.1+</strong>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Versión mínima requerida para Laravel 10</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                <div>
                                    <strong class="text-gray-900 dark:text-white">Composer</strong>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Gestor de dependencias de PHP</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                <div>
                                    <strong class="text-gray-900 dark:text-white">MySQL/PostgreSQL</strong>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Base de datos relacional</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                <div>
                                    <strong class="text-gray-900 dark:text-white">Node.js & NPM</strong>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Para compilar assets frontend</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                            <i class="fas fa-code text-purple-600 dark:text-purple-400 mr-3"></i>
                            Dependencias Principales
                        </h3>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                <div>
                                    <strong class="text-gray-900 dark:text-white">Laravel 10+</strong>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Framework PHP principal</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                <div>
                                    <strong class="text-gray-900 dark:text-white">Tailwind CSS</strong>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Framework CSS para estilos</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                <div>
                                    <strong class="text-gray-900 dark:text-white">Font Awesome 5</strong>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Iconografía y elementos visuales</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                                <div>
                                    <strong class="text-gray-900 dark:text-white">Laravel Breeze</strong>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Sistema de autenticación</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Implementation Steps -->
        <section class="py-20 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        Pasos de Implementación
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">
                        Guía paso a paso para configurar el sistema
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="text-center group">
                        <div class="bg-blue-100 dark:bg-blue-900 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                            <span class="text-2xl font-bold text-blue-600 dark:text-blue-400">1</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Configuración Inicial</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Instalar dependencias y configurar el entorno de desarrollo</p>
                    </div>

                    <div class="text-center group">
                        <div class="bg-green-100 dark:bg-green-900 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                            <span class="text-2xl font-bold text-green-600 dark:text-green-400">2</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Base de Datos</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Crear migraciones para roles, permisos y usuarios</p>
                    </div>

                    <div class="text-center group">
                        <div class="bg-purple-100 dark:bg-purple-900 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                            <span class="text-2xl font-bold text-purple-600 dark:text-purple-400">3</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Middleware</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Implementar middleware de roles y permisos</p>
                    </div>

                    <div class="text-center group">
                        <div class="bg-orange-100 dark:bg-orange-900 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                            <span class="text-2xl font-bold text-orange-600 dark:text-orange-400">4</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Frontend</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Desarrollar interfaces de usuario con Tailwind CSS</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 dark:bg-gray-950 text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-3 gap-8">
                    <div>
                        <div class="flex items-center mb-4">
                            <i class="fas fa-shield-alt text-2xl text-blue-400 mr-3"></i>
                            <span class="text-xl font-bold">Sistema de Roles</span>
                        </div>
                        <p class="text-gray-400 mb-4">
                            Una solución completa para la gestión de usuarios y redireccionamiento basado en roles en aplicaciones Laravel.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-white transition duration-200 hover:scale-110 transform">
                                <i class="fab fa-github text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition duration-200 hover:scale-110 transform">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white transition duration-200 hover:scale-110 transform">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Características</h3>
                        <ul class="space-y-2 text-gray-400">
                            <li><i class="fas fa-check text-green-400 mr-2"></i> Gestión de Roles</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i> Control de Acceso</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i> Redireccionamiento Inteligente</li>
                            <li><i class="fas fa-check text-green-400 mr-2"></i> Middleware de Protección</li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Tecnologías</h3>
                        <ul class="space-y-2 text-gray-400">
                            <li><i class="fab fa-laravel text-red-400 mr-2"></i> Laravel 10+</li>
                            <li><i class="fab fa-php text-purple-400 mr-2"></i> PHP 8.1+</li>
                            <li><i class="fab fa-css3-alt text-blue-400 mr-2"></i> Tailwind CSS</li>
                            <li class="flex items-center">
                                <i class="fas fa-database text-yellow-400 mr-2"></i>
                                <span>MySQL/PostgreSQL</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                    <p>&copy; 2024 Sistema de Redireccionamiento de Roles. Todos los derechos reservados.</p>
                </div>
            </div>
        </footer>

        <!-- Smooth Scrolling Script -->
        <script>
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        </script>
    </body>
</html>