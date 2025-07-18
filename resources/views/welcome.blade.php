<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nadarte - Escuela de Natación</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #00B4D8;
            --secondary: #0077B6;
            --accent: #90E0EF;
            --light: #CAF0F8;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            scroll-behavior: smooth;
        }
        
        .wave-divider {
            position: relative;
            height: 100px;
            overflow: hidden;
        }
        
        .wave-divider svg {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100px;
        }
        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 180, 216, 0.3);
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        
        .login-modal {
            display: none;
            position: fixed;
            z-index: 50;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(5px);
        }
        
        .modal-content {
            animation: modalFadeIn 0.4s;
        }
        
        @keyframes modalFadeIn {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .profile-icon {
            background: linear-gradient(135deg, #00B4D8, #0077B6);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Barra de navegación -->
    <nav class="bg-white shadow-lg fixed w-full z-10">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/e0015209-0adc-4799-bd90-ca4f60e216f8.png" alt="Logo Nadarte con onda acuática" class="h-10">
                    <span class="ml-2 text-xl font-bold text-blue-900">Nadarte</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#inicio" class="text-blue-900 hover:text-blue-600 transition">Inicio</a>
                    <a href="#servicios" class="text-blue-900 hover:text-blue-600 transition">Servicios</a>
                    <a href="#profesores" class="text-blue-900 hover:text-blue-600 transition">Profesores</a> 
                    <a href="#privacidad" class="text-blue-900 hover:text-blue-600 transition">Privacidad</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">Iniciar Sesión</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">Registrarse</a>
                            @endif
                        @endauth
                    @endif
                </div>
                <button class="md:hidden text-blue-900">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="inicio" class="pt-24 pb-12 md:pt-32 md:pb-24 bg-gradient-to-r from-blue-500 to-cyan-400 text-white">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Domina el agua con confianza</h1>
                <p class="text-xl mb-8">Nuestros programas de natación están diseñados para todas las edades y niveles, desde principiantes hasta competidores avanzados.</p>
                <div class="flex flex-wrap gap-4">
                    <a href="" class="bg-white text-blue-600 hover:bg-blue-100 px-6 py-3 rounded-full text-lg font-semibold transition">Regístrate Ahora</a>
                    <a href="#servicios" class="border-2 border-white hover:bg-blue-600 px-6 py-3 rounded-full text-lg font-semibold transition">Explora Programas</a>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/8c7222f0-92a2-4fc3-b726-d32b9d06b84f.png" alt="Grupo diverso de personas disfrutando de la natación en una piscina bien iluminada" class="rounded-xl shadow-2xl floating">
            </div>
        </div>
    </section>

    <!-- Wave Divider -->
    <div class="wave-divider">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="#CAF0F8"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="#CAF0F8"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="#CAF0F8"></path>
        </svg>
    </div>

    <!-- Services Section -->
    <section id="servicios" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-blue-900 mb-12">Nuestros Programas de Natación</h2>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Card Niños -->
                <div class="card bg-white rounded-xl shadow-lg overflow-hidden transition duration-300">
                    <div class="card-image">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/a0dc87a9-cf2d-4f1a-93ad-7fc5cb1ceef9.png" alt="Niños sonriendo mientras aprenden natación con un instructor en una piscina poco profunda" class="w-full h-48 object-cover" />
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-blue-900 mb-3">Natación Infantil</h3>
                        <p class="text-gray-600 mb-4">Programas diseñados específicamente para niños de 4 a 12 años, enfocados en seguridad, diversión y desarrollo de habilidades básicas.</p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span>Grupos por edad y habilidad</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span>Enfoque lúdico y seguro</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span>Evaluaciones periódicas</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Card Adultos -->
                <div class="card bg-white rounded-xl shadow-lg overflow-hidden transition duration-300">
                    <div class="card-image">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/4954c2dd-8431-4a0d-96ae-c7bd544bce61.png" alt="Adultos entrenando en una piscina bajo la supervisión de un entrenador profesional" class="w-full h-48 object-cover" />
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-blue-900 mb-3">Natación para Adultos</h3>
                        <p class="text-gray-600 mb-4">Desde principiantes hasta avanzados, mejora tu técnica, resistencia o prepárate para competencias con nuestro programa estructurado.</p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span>4 niveles de habilidad</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span>Entrenamiento personalizado</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span>Horarios flexibles</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Card Natación Avanzada -->
                <div class="card bg-white rounded-xl shadow-lg overflow-hidden transition duration-300">
                    <div class="card-image">
                        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Nadadores expertos compitiendo en estilo mariposa" class="w-full h-48 object-cover" />
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-blue-900 mb-3">Natación Avanzada</h3>
                        <p class="text-gray-600 mb-4">Programa para nadadores experimentados que buscan mejorar su técnica y rendimiento en competencias.</p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span>Análisis de técnica avanzada con videografía subacuática</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span>Entrenamiento personalizado por estilo</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span>Preparación física y mental para competencias</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span>Nutrición deportiva especializada</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Teachers Section -->
    <section id="profesores" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center text-blue-900 mb-4">Nuestros Profesores</h2>
            <p class="text-center text-gray-600 max-w-2xl mx-auto mb-12">Contamos con un equipo multidisciplinario de instructores certificados con años de experiencia en enseñanza de natación.</p>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Profesor 1 -->
                <div class="card bg-gray-50 rounded-xl shadow-lg overflow-hidden transition duration-300">
                    <div class="card-image relative">
                        <div class="w-full h-64 flex items-center justify-center profile-icon">
                            <i class="fas fa-user text-6xl"></i>
                        </div>
                        <div class="absolute -bottom-1 left-0 right-0 h-3 bg-gradient-to-r from-blue-400 to-cyan-400"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-blue-900 mb-1">Andrea Zenteno</h3>
                        <span class="text-blue-600 font-medium">Especialista en natación infantil</span>
                        <p class="text-gray-600 my-4">Certificada en enseñanza acuática para niños con 5 años de experiencia.</p>
                        <div class="flex space-x-4 text-blue-600">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- Profesor 2 -->
                <div class="card bg-gray-50 rounded-xl shadow-lg overflow-hidden transition duration-300">
                    <div class="card-image relative">
                        <div class="w-full h-64 flex items-center justify-center profile-icon">
                            <i class="fas fa-user text-6xl"></i>
                        </div>
                        <div class="absolute -bottom-1 left-0 right-0 h-3 bg-gradient-to-r from-blue-400 to-cyan-400"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-blue-900 mb-1">Amanda Suárez</h3>
                        <span class="text-blue-600 font-medium">Entrenadora avanzada</span>
                        <p class="text-gray-600 my-4">Especialista en perfeccionamiento técnico con 7 años de experiencia.</p>
                        <div class="flex space-x-4 text-blue-600">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- Profesor 3 -->
                <div class="card bg-gray-50 rounded-xl shadow-lg overflow-hidden transition duration-300">
                    <div class="card-image relative">
                        <div class="w-full h-64 flex items-center justify-center profile-icon">
                            <i class="fas fa-user text-6xl"></i>
                        </div>
                        <div class="absolute -bottom-1 left-0 right-0 h-3 bg-gradient-to-r from-blue-400 to-cyan-400"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-blue-900 mb-1">Esmeralda Viggers</h3>
                        <span class="text-blue-600 font-medium">Especialista en natación avanzada</span>
                        <p class="text-gray-600 my-4">Entrenadora de alto rendimiento con certificación internacional.</p>
                        <div class="flex space-x-4 text-blue-600">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-blue-900 text-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">¿Listo para sumergirte en esta experiencia?</h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">Regístrate ahora para acceder a nuestras clases, horarios disponibles y descuentos exclusivos.</p>
        </div>
    </section>

    <!-- Privacy Notice Section -->
    <section id="privacidad" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-900 mb-8">Aviso de Privacidad</h2>
            <div class="prose max-w-4xl mx-auto">
                <h3 class="text-2xl font-semibold text-blue-800 mb-4">1. Responsable de tus datos</h3>
                <p class="mb-6">Nadarte S.A. de C.V., con domicilio en Av. Principal #123, Tecámac, Estado de México, es responsable del tratamiento de tus datos personales.</p>
                
                <h3 class="text-2xl font-semibold text-blue-800 mb-4">2. Finalidades del tratamiento</h3>
                <p class="mb-6">Tus datos personales serán utilizados para: inscripción a clases, evaluación de habilidades, seguridad en la piscina, facturación, comunicación sobre servicios y envío de información relevante sobre tu progreso.</p>
                
                <h3 class="text-2xl font-semibold text-blue-800 mb-4">3. Transferencia de datos</h3>
                <p class="mb-6">Tus datos podrán ser compartidos únicamente con autoridades sanitarias en caso de emergencia médica, o con instituciones deportivas cuando participes en competencias organizadas por terceros.</p>
                
                <h3 class="text-2xl font-semibold text-blue-800 mb-4">4. Derechos ARCO</h3>
                <p class="mb-4">Tienes derecho a:</p>
                <ul class="list-disc pl-6 mb-6 space-y-2">
                    <li>Acceder a tus datos personales</li>
                    <li>Rectificarlos si son inexactos o incompletos</li>
                    <li>Cancelar su uso cuando consideres que no se requieren para las finalidades señaladas</li>
                    <li>Oponerte al tratamiento de los mismos para fines específicos</li>
                </ul>
                
                <h3 class="text-2xl font-semibold text-blue-800 mb-4">5. Medidas de seguridad</h3>
                <p class="mb-6">Implementamos protocolos físicos, técnicos y administrativos para proteger tus datos contra daño, pérdida, alteración, destrucción o el uso, acceso o tratamiento no autorizado.</p>
                
                <h3 class="text-2xl font-semibold text-blue-800 mb-4">6. Cambios al aviso de privacidad</h3>
                <p class="mb-6">Nos reservamos el derecho de efectuar en cualquier momento modificaciones o actualizaciones al presente aviso de privacidad. Te notificaremos sobre cambios sustanciales a través de nuestro sitio web o correo electrónico.</p>
                
                <h3 class="text-2xl font-semibold text-blue-800 mb-4">7. Contacto</h3>
                <p>Para ejercer tus derechos ARCO o resolver dudas sobre este aviso, contáctanos en contacto@nadarte.com o al teléfono 55 8538 3299.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-950 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/e8529d64-0a6b-40dd-a16e-a9e5c137909e.png" alt="Logo pequeño de AquaFlow" class="h-10 mb-4">
                    <p class="mb-4">Nadarte es la escuela de natación líder en Tecámac, comprometida con la enseñanza de calidad en un ambiente seguro y divertido.</p>
                    <div class="flex space-x-4 text-blue-300">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Enlaces rápidos</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-blue-300 transition">Inicio</a></li>
                        <li><a href="#" class="hover:text-blue-300 transition">Servicios</a></li>
                        <li><a href="#" class="hover:text-blue-300 transition">Profesores</a></li>
                        <li><a href="#" class="hover:text-blue-300 transition">Contacto</a></li>
                        <li><a href="#privacidad" class="hover:text-blue-300 transition">Aviso de Privacidad</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Horarios</h4>
                    <ul class="space-y-2">
                        <li>Lunes a Viernes: 7am - 8pm</li>
                        <li>Sábados: 8am - 4pm</li>
                        <li>Domingos: Cerrado</li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contacto</h4>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-blue-300"></i>
                            <span>Av. Principal #123, Tecámac, Estado de México</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-phone-alt mt-1 mr-3 text-blue-300"></i>
                            <span>55 8538 3299</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-envelope mt-1 mr-3 text-blue-300"></i>
                            <span>contacto@nadarte.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-blue-800 mt-12 pt-6 text-center text-blue-400">
                <p>© 2023 Nadarte</p>
            </div>
        </div>
    </footer>

    <!-- Login Modal -->
    <div id="login-modal" class="login-modal">
        <div class="flex items-center justify-center min-h-screen">
            <div class="modal-content bg-white rounded-xl shadow-2xl p-8 max-w-md w-full relative">
                <button onclick="document.getElementById('login-modal').style.display='none'" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
                
                <h3 class="text-2xl font-bold text-center text-blue-900 mb-6">Accede a tu cuenta</h3>
                
                <form id="login-form">
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 mb-2">Correo electrónico</label>
                        <input type="email" id="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <p id="email-error" class="text-red-500 text-sm mt-1 hidden">Ingresa un correo válido</p>
                    </div>
                    
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 mb-2">Contraseña</label>
                        <input type="password" id="password" required minlength="6" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <p id="password-error" class="text-red-500 text-sm mt-1 hidden">Mínimo 6 caracteres</p>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 mb-2">Tipo de usuario</label>
                        <div class="flex flex-col space-y-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="user-type" value="profesor" class="form-radio text-blue-600" checked>
                                <span class="ml-2">Profesor</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="user-type" value="cliente" class="form-radio text-blue-600">
                                <span class="ml-2">Cliente</span>
                            </label>
                        </div>
                    </div>
                    
                    <button type="button" onclick="loginUser()" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold mb-4 transition">Iniciar Sesión</button>
                    
                    <div class="text-center text-sm">
                        <p class="text-gray-600 mb-2">¿No tienes cuenta? <a href="#" class="text-blue-600 hover:underline">Regístrate aquí</a></p>
                        <a href="#" class="text-blue-600 hover:underline">¿Olvidaste tu contraseña?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Cuenta de administrador predeterminada (oculta en la interfaz)
        const adminAccount = {
            email: "admin@nadarte.com",
            password: "AdminNadarte2023",
            role: "admin"
        };

        // Base de datos simulada de usuarios (en un sistema real esto estaría en el backend)
        const usersDatabase = {
            // Profesores
            "profe.andrea@nadarte.com": {
                password: "ProfeAndrea123",
                role: "profesor",
                name: "Andrea Zenteno"
            },
            "profe.amanda@nadarte.com": {
                password: "ProfeAmanda123",
                role: "profesor",
                name: "Amanda Suárez"
            },
            
            // Clientes
            "cliente1@ejemplo.com": {
                password: "Cliente123",
                role: "cliente",
                name: "Juan Pérez"
            },
            "cliente2@ejemplo.com": {
                password: "Cliente456",
                role: "cliente",
                name: "María García"
            }
        };

        // Función para validar el login
        function loginUser() {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const userType = document.querySelector('input[name="user-type"]:checked').value;

            // Validar campos vacíos
            if (!email || !password) {
                alert("Por favor completa todos los campos");
                return;
            }

            // Validar formato de email
            if (!validateEmail(email)) {
                document.getElementById('email-error').classList.remove('hidden');
                return;
            } else {
                document.getElementById('email-error').classList.add('hidden');
            }

            // Validar longitud de contraseña
            if (password.length < 6) {
                document.getElementById('password-error').classList.remove('hidden');
                return;
            } else {
                document.getElementById('password-error').classList.add('hidden');
            }

            // Verificar si es el admin
            if (email === adminAccount.email && password === adminAccount.password) {
                alert(`Bienvenido Administrador`);
                window.location.href = "admin-dashboard.html"; // Redirigir al panel de admin
                return;
            }

            // Verificar usuario en la "base de datos"
            const user = usersDatabase[email];
            
            if (user && user.password === password) {
                // Verificar que el tipo de usuario seleccionado coincida
                if (user.role !== userType) {
                    alert(`Este correo está registrado como ${user.role}, por favor selecciona el tipo de usuario correcto`);
                    return;
                }
                
                // Login exitoso
                alert(`Bienvenid@ ${user.name}`);
                
                // Redirigir según el rol
                if (user.role === "profesor") {
                    window.location.href = "profesor-dashboard.html";
                } else if (user.role === "cliente") {
                    window.location.href = "cliente-dashboard.html";
                }
            } else {
                alert("Credenciales incorrectas. Por favor verifica tu correo y contraseña.");
            }
        }

        // Función para validar email
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        // Función para cerrar el modal haciendo clic fuera
        window.onclick = function(event) {
            const modal = document.getElementById('login-modal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }
        
        // Función para el smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>
