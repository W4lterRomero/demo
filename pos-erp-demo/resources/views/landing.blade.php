<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS E-Sal | Sistema de Gestión para Negocios Híbridos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-900 text-white overflow-x-hidden">

    <!-- Hero Section -->
    <div class="relative overflow-hidden">
        <!-- Background Gradients -->
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-purple-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute top-0 -right-40 w-96 h-96 bg-blue-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-40 left-20 w-96 h-96 bg-pink-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-16 text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight mb-4 bg-clip-text text-transparent bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400">
                Gestión Inteligente para<br>Tu Negocio en El Salvador
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-300">
                La solución todo-en-uno para restaurantes, turismo y eventos. 
                Controla tu inventario, ventas y facturación electrónica desde una sola plataforma.
            </p>
        </div>
    </div>

    <!-- Pricing Cards Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
            
            <!-- Paquete Básico -->
            <div class="relative group">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-cyan-600 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-1000 group-hover:duration-200"></div>
                <div class="relative bg-gray-800 rounded-2xl p-8 h-full flex flex-col border border-gray-700 hover:border-blue-500 transition-colors">
                    <h3 class="text-2xl font-bold text-white mb-2">Básico</h3>
                    <p class="text-gray-400 mb-6">Para emprendimientos que inician.</p>
                    <div class="text-4xl font-bold text-white mb-6">$1,200 <span class="text-lg font-normal text-gray-500">pago único</span></div>
                    
                    <ul class="space-y-4 mb-8 flex-1">
                        <li class="flex items-center text-gray-300">
                            <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Punto de Venta (POS) Touch
                        </li>
                        <li class="flex items-center text-gray-300">
                            <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Inventario Básico
                        </li>
                        <li class="flex items-center text-gray-300">
                            <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Cierre de Caja Diario
                        </li>
                        <li class="flex items-center text-gray-300">
                            <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Reportes de Ventas
                        </li>
                    </ul>

                    <a href="{{ route('demo.login', 'basico') }}" class="block w-full text-center py-3 px-6 rounded-lg bg-gray-700 hover:bg-gray-600 text-white font-medium transition-colors border border-gray-600">
                        Ver Demo Básico
                    </a>
                </div>
            </div>

            <!-- Paquete Completo (Destacado) -->
            <div class="relative group transform md:-translate-y-4">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl blur opacity-50 group-hover:opacity-100 transition duration-1000 group-hover:duration-200 animate-pulse"></div>
                <div class="relative bg-gray-900 rounded-2xl p-8 h-full flex flex-col border border-purple-500 shadow-2xl">
                    <div class="absolute top-0 right-0 bg-purple-600 text-white text-xs font-bold px-3 py-1 rounded-bl-lg rounded-tr-lg">MÁS VENDIDO</div>
                    <h3 class="text-2xl font-bold text-white mb-2">Completo</h3>
                    <p class="text-gray-400 mb-6">Para negocios en crecimiento.</p>
                    <div class="text-4xl font-bold text-white mb-6">$1,850 <span class="text-lg font-normal text-gray-500">pago único</span></div>
                    
                    <ul class="space-y-4 mb-8 flex-1">
                        <li class="flex items-center text-white">
                            <span class="bg-purple-600 p-1 rounded-full mr-2"><svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg></span>
                            Todo lo del Básico
                        </li>
                        <li class="flex items-center text-gray-300">
                            <svg class="w-5 h-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Facturación Electrónica (DTE)
                        </li>
                        <li class="flex items-center text-gray-300">
                            <svg class="w-5 h-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Gestión de Eventos y Reservas
                        </li>
                        <li class="flex items-center text-gray-300">
                            <svg class="w-5 h-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Control de Flota (Cuatrimotos)
                        </li>
                         <li class="flex items-center text-gray-300">
                            <svg class="w-5 h-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Usuarios Ilimitados
                        </li>
                    </ul>

                    <a href="{{ route('demo.login', 'completo') }}" class="block w-full text-center py-4 px-6 rounded-lg bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-bold shadow-lg transition-all transform hover:scale-105">
                        Ver Demo Completo
                    </a>
                </div>
            </div>

            <!-- Paquete Premium -->
            <div class="relative group">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-amber-400 to-orange-500 rounded-2xl blur opacity-25 group-hover:opacity-75 transition duration-1000 group-hover:duration-200"></div>
                <div class="relative bg-gray-800 rounded-2xl p-8 h-full flex flex-col border border-gray-700 hover:border-amber-500 transition-colors">
                    <h3 class="text-2xl font-bold text-white mb-2">Premium</h3>
                    <p class="text-gray-400 mb-6">Control total y automatización.</p>
                    <div class="text-4xl font-bold text-white mb-6">$2,650 <span class="text-lg font-normal text-gray-500">pago único</span></div>
                    
                    <ul class="space-y-4 mb-8 flex-1">
                         <li class="flex items-center text-gray-300">
                             <span class="text-amber-500 mr-2">✦</span> Todo lo del Completo
                        </li>
                        <li class="flex items-center text-gray-300">
                            <svg class="w-5 h-5 text-amber-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Inteligencia de Negocios (BI)
                        </li>
                        <li class="flex items-center text-gray-300">
                            <svg class="w-5 h-5 text-amber-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            App Móvil Administrativa
                        </li>
                        <li class="flex items-center text-gray-300">
                            <svg class="w-5 h-5 text-amber-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Automatizaciones (WhatsApp/Email)
                        </li>
                        <li class="flex items-center text-gray-300">
                            <svg class="w-5 h-5 text-amber-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Auditoría Avanzada
                        </li>
                    </ul>

                    <a href="{{ route('demo.login', 'premium') }}" class="block w-full text-center py-3 px-6 rounded-lg bg-gray-700 hover:bg-gray-600 text-white font-medium transition-colors border border-gray-600">
                        Ver Demo Premium
                    </a>
                </div>
            </div>

        </div>

        <div class="mt-16 text-center text-gray-500 text-sm">
            <p>© 2024 POS E-Sal Demo. Todos los derechos reservados.</p>
        </div>
    </div>

    <!-- Tailwind Config for Animations -->
    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
</body>
</html>
