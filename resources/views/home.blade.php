<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700;800&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    body {
        font-family: 'Open Sans', sans-serif;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Montserrat', sans-serif;
    }

    .hero-bg {
        background-image: url('/images/familia.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    /* Mobile Optimization Classes */
    .touch-target {
        min-height: 48px;
        min-width: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Nav Transitions */
    .nav-scrolled {
        background-color: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding-top: 0.75rem !important;
        padding-bottom: 0.75rem !important;
    }

    .nav-scrolled .nav-text {
        color: #1a1a1a;
    }

    .nav-scrolled .mobile-menu-btn {
        color: #1a1a1a;
    }

    .nav-transparent {
        background-color: transparent;
        padding-top: 1.25rem;
        padding-bottom: 1.25rem;
    }

    .nav-transparent .nav-text {
        color: white;
    }

    .nav-transparent .mobile-menu-btn {
        color: white;
    }

    /* Accordion Animations */
    .accordion-content {
        transition: max-height 0.4s cubic-bezier(0, 1, 0, 1);
        max-height: 0;
        overflow: hidden;
    }

    .accordion-active .accordion-content {
        max-height: 1000px;
        transition: max-height 0.5s ease-in-out;
    }

    .accordion-icon {
        transition: transform 0.3s ease;
    }

    .accordion-active .accordion-icon {
        transform: rotate(180deg);
    }

    /* Mobile Menu Animation */
    #mobile-menu {
        transition: transform 0.3s ease-in-out;
        transform: translateX(100%);
    }

    #mobile-menu.open {
        transform: translateX(0);
    }
</style>
</head>

<body class="overflow-x-hidden bg-white text-gray-800 antialiased">

    <!-- Navigation -->
    <nav id="navbar"
        class="nav-transparent fixed z-50 w-full border-b border-transparent px-4 transition-all duration-300">
        <div class="mx-auto flex max-w-7xl items-center justify-between">
            <!-- Logo -->
            <a href="#"
                class="nav-text group flex items-center gap-2 text-xl font-extrabold tracking-tight transition-colors md:text-2xl">
                <span>Guzmán Ochoa</span>
            </a>

            <!-- Desktop Links -->
            <div class="hidden items-center space-x-8 md:flex">
                <a href="#historia"
                    class="nav-text hover:text-brand-500 text-sm font-bold uppercase tracking-wide transition-colors">{{ __('Historia') }}</a>
                <a href="#ministerios"
                    class="nav-text hover:text-brand-500 text-sm font-bold uppercase tracking-wide transition-colors">{{ __('Ministerios') }}</a>
                <a href="#familia"
                    class="nav-text hover:text-brand-500 text-sm font-bold uppercase tracking-wide transition-colors">{{ __('Familia') }}</a>
                <a href="#transparencia"
                    class="nav-text hover:text-brand-500 text-sm font-bold uppercase tracking-wide transition-colors">{{ __('Finanzas') }}</a>
                <a href="#galeria"
                    class="nav-text hover:text-brand-500 text-sm font-bold uppercase tracking-wide transition-colors">{{ __('Galería') }}</a>
                <a href="#newsletters"
                    class="nav-text hover:text-brand-500 text-sm font-bold uppercase tracking-wide transition-colors">{{ __('Cartas de Noticias') }}</a>
                <a href="#donar"
                    class="bg-brand-500 hover:bg-brand-600 transform rounded-full px-6 py-2.5 text-sm font-bold uppercase tracking-wide text-white shadow-lg transition-all hover:-translate-y-1">
                    {{ __('Donar') }}
                </a>

                <!-- Language Switcher Desktop -->
                <div class="flex items-center gap-2">
                    <a href="{{ route('lang.switch', 'es') }}"
                        class="text-sm font-bold {{ app()->getLocale() == 'es' ? 'text-brand-500' : 'text-gray-400 hover:text-gray-600' }}">ES</a>
                    <span class="text-gray-300">|</span>
                    <a href="{{ route('lang.switch', 'en') }}"
                        class="text-sm font-bold {{ app()->getLocale() == 'en' ? 'text-brand-500' : 'text-gray-400 hover:text-gray-600' }}">EN</a>
                </div>
            </div>

            <!-- Mobile Hamburger (Large Touch Target) -->
            <button id="menu-btn" class="mobile-menu-btn touch-target md:hidden! p-2 text-2xl focus:outline-none"
                aria-label="Abrir menú">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu"
        class="fixed inset-0 z-[60] flex h-screen w-screen flex-col overflow-y-auto bg-white shadow-2xl md:hidden">
        <div class="flex items-center justify-between border-b border-gray-100 p-6">
            <div class="flex items-center gap-4">
                <span class="text-xl font-bold text-gray-900">{{ __('Menú') }}</span>
                <!-- Language Switcher Mobile -->
                <div class="flex items-center gap-2">
                    <a href="{{ route('lang.switch', 'es') }}"
                        class="text-sm font-bold {{ app()->getLocale() == 'es' ? 'text-brand-500' : 'text-gray-400 hover:text-gray-600' }}">ES</a>
                    <span class="text-gray-300">|</span>
                    <a href="{{ route('lang.switch', 'en') }}"
                        class="text-sm font-bold {{ app()->getLocale() == 'en' ? 'text-brand-500' : 'text-gray-400 hover:text-gray-600' }}">EN</a>
                </div>
            </div>
            <button id="close-menu-btn" class="touch-target text-3xl text-gray-500 focus:outline-none"
                aria-label="Cerrar menú">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="flex flex-grow flex-col space-y-6 p-6">
            <a href="#historia" class="text-2xl font-bold text-gray-800" onclick="toggleMenu()">{{ __('Historia') }}</a>

            <!-- Accordion for Ministries Mobile -->
            <div class="accordion-item border-b border-gray-100 pb-4">
                <button
                    class="mb-2 flex w-full items-center justify-between text-2xl font-bold text-gray-800 focus:outline-none"
                    onclick="toggleAccordion(this)">
                    {{ __('Ministerios') }} <i class="fas fa-chevron-down text-brand-500 accordion-icon text-lg"></i>
                </button>
                <div class="accordion-content">
                    <div class="flex flex-col space-y-4 pl-4 pt-2">
                        <a href="#envia-detalle" class="flex items-center text-lg font-medium text-gray-600"
                            onclick="toggleMenu()">
                            <span
                                class="bg-brand-100 text-brand-600 mr-3 flex h-8 w-8 items-center justify-center rounded-full"><i
                                    class="fas fa-seedling text-sm"></i></span>
                            Envía
                        </a>
                        <a href="#vengan-detalle" class="flex items-center text-lg font-medium text-gray-600"
                            onclick="toggleMenu()">
                            <span
                                class="mr-3 flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 text-blue-600"><i
                                    class="fas fa-cut text-sm"></i></span>
                            Vengan y Vean
                        </a>
                        <a href="#casas-detalle" class="flex items-center text-lg font-medium text-gray-600"
                            onclick="toggleMenu()">
                            <span
                                class="mr-3 flex h-8 w-8 items-center justify-center rounded-full bg-orange-100 text-orange-600"><i
                                    class="fas fa-home text-sm"></i></span>
                            Casas de Esperanza
                        </a>
                        <a href="#iglesia-detalle" class="flex items-center text-lg font-medium text-gray-600"
                            onclick="toggleMenu()">
                            <span
                                class="mr-3 flex h-8 w-8 items-center justify-center rounded-full bg-purple-100 text-purple-600"><i
                                    class="fas fa-church text-sm"></i></span>
                            Iglesia Local
                        </a>
                    </div>
                </div>
            </div>

            <a href="#familia" class="text-2xl font-bold text-gray-800" onclick="toggleMenu()">{{ __('Familia') }}</a>
            <a href="#galeria" class="text-2xl font-bold text-gray-800" onclick="toggleMenu()">{{ __('Galería') }}</a>
            <a href="#newsletters" class="text-2xl font-bold text-gray-800"
                onclick="toggleMenu()">{{ __('Cartas de Noticias') }}</a>
            <a href="#transparencia" class="text-2xl font-bold text-gray-800"
                onclick="toggleMenu()">{{ __('Finanzas') }}</a>
            <a href="#faq" class="text-2xl font-bold text-gray-800" onclick="toggleMenu()">{{ __('Preguntas') }}</a>

            <div class="mt-auto pt-8">
                <a href="#contacto"
                    class="bg-brand-500 shadow-mobile block w-full rounded-xl py-4 text-center text-xl font-bold text-white transition-transform active:scale-95"
                    onclick="toggleMenu()">
                    {{ __('Apoyar Ahora') }}
                </a>
            </div>
        </div>
    </div>

    <!-- Hero Section (Mobile Optimized) -->
    <header class="hero-bg relative flex h-screen min-h-[600px] items-center justify-center px-4">
        <!-- Overlay with Brand Color -->
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="bg-brand-900/40 absolute inset-0 mix-blend-multiply"></div>

        <div class="pt-16 animate-fade-in-up relative z-10 mx-auto w-full max-w-4xl text-center">
            <span
                class="bg-brand-500/90 mb-6 inline-block rounded-full border border-white/20 px-4 py-1.5 text-xs font-extrabold uppercase tracking-widest text-white shadow-lg backdrop-blur-sm md:text-sm">
                {{ __('JUCUM San Diego / Baja') }}
            </span>
            <h1 class="mb-6 text-5xl font-extrabold leading-tight text-white drop-shadow-2xl md:text-7xl">
                {{ __('Gratitud que se') }}<br /><span class="text-brand-400">{{ __('Transforma en Servicio') }}</span>
            </h1>
            <p
                class="mx-auto mb-10 max-w-2xl text-lg font-medium leading-relaxed text-gray-100 drop-shadow-md md:text-2xl">
                {{ __('Hero Description') }}
            </p>
            <div class="flex w-full flex-col justify-center gap-4 md:w-auto md:flex-row">
                <a href="#ministerios"
                    class="bg-brand-500 hover:bg-brand-600 flex w-full items-center justify-center gap-2 rounded-xl px-8 py-4 text-lg font-bold text-white shadow-lg transition md:w-auto">
                    <i class="fas fa-arrow-down"></i> {{ __('Ver Impacto') }}
                </a>
                <a href="#contacto"
                    class="hover:text-brand-900 flex w-full items-center justify-center rounded-xl border-2 border-white/30 bg-white/10 px-8 py-4 text-lg font-bold text-white backdrop-blur-md transition hover:bg-white md:w-auto">
                    {{ __('Contáctanos') }}
                </a>
            </div>
        </div>
    </header>

    <!-- Intro / History (Mobile Friendly Layout) -->
    <section id="historia" class="bg-white py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center gap-12 md:flex-row">
                <div class="w-full md:w-1/2">
                    <div class="relative aspect-[4/5] overflow-hidden rounded-3xl shadow-2xl md:aspect-square">
                        <img src="{{ asset('images/parents.jpg') }}" alt="Familia Guzman Ochoa"
                            class="h-full w-full object-cover">
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/80 to-transparent p-6">
                            <p class="text-lg font-bold text-white">{{ __('Sirviendo desde 2010') }}</p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <span
                        class="text-brand-500 mb-2 block text-sm font-bold uppercase tracking-widest">{{ __('Nuestra Historia') }}</span>
                    <h2 class="mb-6 text-3xl font-extrabold text-gray-900 md:text-4xl">
                        {{ __('Un Regalo que Cambió Todo') }}
                    </h2>
                    <div class="prose prose-lg text-gray-600">
                        <p class="mb-4">
                            {!! __('Historia P1', ['casa_open' => '<strong>', 'casa_close' => '</strong>']) !!}
                        </p>
                        <p class="mb-6">
                            {!! __('Historia P2', ['jucum_open' => '<strong>', 'jucum_close' => '</strong>']) !!}
                        </p>
                        <div class="bg-brand-50 border-brand-500 rounded-r-xl border-l-4 p-6">
                            <p class="text-brand-800 font-medium italic">
                                {{ __('Historia P3') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEW SECTION: La Próxima Generación (Family Focus) -->
    <section id="familia" class="border-y border-gray-100 bg-gray-50 py-20">
        <div class="mx-auto max-w-5xl px-4 text-center">
            <span
                class="mb-4 inline-block rounded-full bg-blue-100 px-4 py-1 text-xs font-bold uppercase tracking-wider text-blue-700">{{ __('Orgullo Familiar') }}</span>
            <h2 class="mb-6 text-3xl font-extrabold text-gray-900 md:text-4xl">{{ __('La Próxima Generación') }}</h2>
            <p class="mx-auto mb-12 max-w-3xl text-lg text-gray-600">
                {{ __('Familia Intro') }}
            </p>

            <div class="grid gap-8 text-left md:grid-cols-2">
                <!-- Erick Jr -->
                <div
                    class="group relative overflow-hidden rounded-3xl border border-gray-100 bg-white p-8 shadow-sm transition hover:shadow-md">
                    <div class="bg-brand-100 absolute right-0 top-0 -mr-4 -mt-4 h-24 w-24 rounded-bl-full opacity-50">
                    </div>
                    <div class="mb-4 flex items-center gap-4">
                        <div class="flex h-16 w-16 items-center justify-center rounded-full bg-gray-200 text-2xl">👨‍🎓
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Erick Jr.</h3>
                            <p class="text-brand-600 text-sm font-bold uppercase">{{ __('Universidad') }}</p>
                        </div>
                    </div>
                    <p class="text-gray-600">
                        {!! __('Erick Jr Desc', ['uni_open' => '<strong>', 'uni_close' => '</strong>']) !!}
                    </p>
                </div>

                <!-- Lupita -->
                <div
                    class="group relative overflow-hidden rounded-3xl border border-gray-100 bg-white p-8 shadow-sm transition hover:shadow-md">
                    <div class="absolute right-0 top-0 -mr-4 -mt-4 h-24 w-24 rounded-bl-full bg-purple-100 opacity-50">
                    </div>
                    <div class="mb-4 flex items-center gap-4">
                        <div class="flex h-16 w-16 items-center justify-center rounded-full bg-gray-200 text-2xl">👩‍🎓
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Lupita</h3>
                            <p class="text-sm font-bold uppercase text-purple-600">{{ __('Preparatoria') }}</p>
                        </div>
                    </div>
                    <p class="text-gray-600">
                        {!! __('Lupita Desc', ['prep_open' => '<strong>', 'prep_close' => '</strong>']) !!}
                    </p>
                </div>
            </div>

            <p class="mt-8 text-sm italic text-gray-500">{{ __('Familia Footer') }}</p>
        </div>
    </section>

    <!-- Ministries Overview (Grid Mobile First) -->
    <section id="ministerios" class="bg-white py-20">
        <div class="mx-auto max-w-7xl px-4">
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 md:text-4xl">{{ __('Nuestros Ministerios') }}</h2>
                <p class="mt-2 text-gray-600">{{ __('Ministerios Subtitle') }}</p>
            </div>

            <!-- Quick Access Grid -->
            <div class="mb-16 grid grid-cols-2 gap-4 md:grid-cols-4">
                <a href="#envia-detalle"
                    class="bg-brand-50 hover:bg-brand-100 border-brand-100 rounded-2xl border p-6 text-center transition">
                    <i class="fas fa-seedling text-brand-500 mb-3 text-3xl"></i>
                    <h4 class="font-bold text-gray-900">{{ __('Envía') }}</h4>
                </a>
                <a href="#vengan-detalle"
                    class="rounded-2xl border border-blue-100 bg-blue-50 p-6 text-center transition hover:bg-blue-100">
                    <i class="fas fa-cut mb-3 text-3xl text-blue-500"></i>
                    <h4 class="font-bold text-gray-900">{{ __('Costura') }}</h4>
                </a>
                <a href="#casas-detalle"
                    class="rounded-2xl border border-orange-100 bg-orange-50 p-6 text-center transition hover:bg-orange-100">
                    <i class="fas fa-home mb-3 text-3xl text-orange-500"></i>
                    <h4 class="font-bold text-gray-900">{{ __('Casas') }}</h4>
                </a>
                <a href="#iglesia-detalle"
                    class="rounded-2xl border border-purple-100 bg-purple-50 p-6 text-center transition hover:bg-purple-100">
                    <i class="fas fa-church mb-3 text-3xl text-purple-500"></i>
                    <h4 class="font-bold text-gray-900">{{ __('Iglesia') }}</h4>
                </a>
            </div>

            <!-- Detailed Sections -->
            <div class="space-y-24">

                <!-- Envia -->
                <div id="envia-detalle" class="flex flex-col items-center gap-8 md:flex-row">
                    <div class="w-full md:w-1/2">
                        <img src="{{ asset('images/envia.jpg') }}"
                            class="h-64 w-full rounded-3xl object-cover shadow-lg md:h-96">
                    </div>
                    <div class="w-full md:w-1/2">
                        <div
                            class="bg-brand-100 text-brand-700 mb-4 inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-bold uppercase">
                            <i class="fas fa-seedling"></i> {{ __('Discipulado') }}
                        </div>
                        <h3 class="mb-4 text-3xl font-bold">{{ __('Ministerio ENVÍA') }}</h3>
                        <p class="mb-4 leading-relaxed text-gray-600">
                            {!! __('Envia Desc 1', ['strong_open' => '<strong>', 'strong_close' => '</strong>']) !!}
                        </p>
                        <p class="mb-6 text-gray-600">
                            {!! __('Envia Desc 2', ['families_open' => '<strong>', 'families_close' => '</strong>', 'baptisms_open' => '<strong>', 'baptisms_close' => '</strong>']) !!}
                        </p>
                    </div>
                </div>

                <!-- Vengan y Vean -->
                <div id="vengan-detalle" class="flex flex-col items-center gap-8 md:flex-row-reverse">
                    <div class="w-full md:w-1/2">
                        <img src="{{ asset('images/vengan-y-vean.jpg') }}"
                            class="h-64 w-full rounded-3xl object-cover shadow-lg md:h-96">
                    </div>
                    <div class="w-full md:w-1/2">
                        <div
                            class="mb-4 inline-flex items-center gap-2 rounded-full bg-blue-100 px-3 py-1 text-xs font-bold uppercase text-blue-700">
                            <i class="fas fa-tshirt"></i> {{ __('Empoderamiento') }}
                        </div>
                        <h3 class="mb-4 text-3xl font-bold">{{ __('Vengan y Vean') }}</h3>
                        <p class="mb-4 leading-relaxed text-gray-600">
                            {{ __('Vengan Desc') }}
                        </p>
                        <ul class="mb-6 space-y-2 text-gray-600">
                            <li class="flex items-start"><i class="fas fa-check mr-2 mt-1 text-blue-500"></i>
                                {{ __('Vengan List 1') }}</li>
                            <li class="flex items-start"><i class="fas fa-check mr-2 mt-1 text-blue-500"></i>
                                {{ __('Vengan List 2') }}</li>
                            <li class="flex items-start"><i class="fas fa-check mr-2 mt-1 text-blue-500"></i>
                                {{ __('Vengan List 3') }}</li>
                        </ul>
                    </div>
                </div>

                <!-- Casas & Iglesia (Combined for Mobile Efficiency) -->
                <div class="grid gap-8 md:grid-cols-2">
                    <div id="casas-detalle" class="rounded-3xl border border-orange-100 bg-orange-50 p-8">
                        <i class="fas fa-home mb-4 text-4xl text-orange-500"></i>
                        <h3 class="mb-4 text-2xl font-bold">{{ __('Casas de Esperanza') }}</h3>
                        <p class="text-gray-700">
                            {{ __('Casas Desc') }}
                        </p>
                    </div>
                    <div id="iglesia-detalle" class="rounded-3xl border border-purple-100 bg-purple-50 p-8">
                        <i class="fas fa-church mb-4 text-4xl text-purple-500"></i>
                        <h3 class="mb-4 text-2xl font-bold">{{ __('Iglesia Local') }}</h3>
                        <p class="text-gray-700">
                            {{ __('Iglesia Desc') }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- NEW SECTION: Visión y Futuro -->
    <section class="bg-dark-900 relative overflow-hidden py-20 text-white">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10">
        </div>
        <div class="relative z-10 mx-auto max-w-4xl px-4 text-center">
            <i class="fas fa-star mb-6 text-4xl text-yellow-400"></i>
            <h2 class="mb-6 text-3xl font-extrabold md:text-4xl">{{ __('Visión y Futuro') }}</h2>
            <p class="mb-8 text-xl font-light leading-relaxed text-gray-300 md:text-2xl">
                {{ __('Vision Desc') }}
            </p>
            <div class="inline-block rounded-xl border border-white/20 bg-white/5 p-6 backdrop-blur-sm">
                <p class="text-brand-400 text-sm font-bold uppercase tracking-widest">{{ __('Objetivo Principal') }}</p>
                <p class="mt-2 text-lg">{{ __('Objetivo Desc') }}</p>
            </div>
        </div>
    </section>

    <!-- Transparency (No Prices) -->
    <section id="transparencia" class="bg-white py-20">
        <div class="mx-auto max-w-6xl px-4">
            <div class="mb-16 text-center">
                <h2 class="text-brand-500 mb-2 font-bold uppercase tracking-widest">{{ __('Transparencia Financiera') }}
                </h2>
                <h3 class="mb-6 text-3xl font-extrabold text-gray-900 md:text-4xl">
                    {{ __('¿Cómo funciona nuestro sustento?') }}
                </h3>
                <p class="mx-auto max-w-2xl text-lg text-gray-600">
                    {!! __('Transparencia Desc', ['no_salary_open' => '<strong>', 'no_salary_close' => '</strong>']) !!}
                </p>
            </div>

            <div class="grid gap-6 md:grid-cols-3">
                <!-- Card 1 -->
                <div class="rounded-3xl border border-gray-100 p-8 text-center shadow-sm">
                    <div
                        class="bg-brand-100 text-brand-600 mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full text-2xl">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h4 class="mb-3 text-xl font-bold">{{ __('Ministerio') }}</h4>
                    <p class="text-sm text-gray-600">{{ __('Ministerio Card Desc') }}</p>
                </div>
                <!-- Card 2 -->
                <div
                    class="bg-brand-50 border-brand-200 transform rounded-3xl border border-gray-100 p-8 text-center shadow-sm md:-translate-y-4">
                    <div
                        class="bg-brand-500 mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full text-2xl text-white">
                        <i class="fas fa-home"></i>
                    </div>
                    <h4 class="mb-3 text-xl font-bold">{{ __('Sustento Familiar') }}</h4>
                    <p class="text-sm text-gray-600">{{ __('Sustento Card Desc') }}</p>
                </div>
                <!-- Card 3 -->
                <div class="rounded-3xl border border-gray-100 p-8 text-center shadow-sm">
                    <div
                        class="bg-brand-100 text-brand-600 mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full text-2xl">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h4 class="mb-3 text-xl font-bold">{{ __('Educación') }}</h4>
                    <p class="text-sm text-gray-600">{{ __('Educación Card Desc') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Expanded FAQ -->
    <section id="faq" class="bg-gray-50 py-20">
        <div class="mx-auto max-w-3xl px-4">
            <h2 class="mb-12 text-center text-3xl font-extrabold text-gray-900">{{ __('Preguntas Frecuentes') }}</h2>

            <div class="space-y-4">
                <!-- FAQ 1 -->
                <div class="accordion-item overflow-hidden rounded-xl bg-white shadow-sm">
                    <button class="flex w-full items-center justify-between p-6 text-left focus:outline-none"
                        onclick="toggleAccordion(this)">
                        <span class="font-bold text-gray-800">{{ __('FAQ 1 Q') }}</span>
                        <i class="fas fa-chevron-down text-brand-500 accordion-icon"></i>
                    </button>
                    <div class="accordion-content bg-gray-50">
                        <div class="mt-2 p-6 pt-0 text-sm text-gray-600">
                            {!! __('FAQ 1 A', ['ywam_open' => '<strong>', 'ywam_close' => '</strong>']) !!}
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="accordion-item overflow-hidden rounded-xl bg-white shadow-sm">
                    <button class="flex w-full items-center justify-between p-6 text-left focus:outline-none"
                        onclick="toggleAccordion(this)">
                        <span class="font-bold text-gray-800">{{ __('FAQ 2 Q') }}</span>
                        <i class="fas fa-chevron-down text-brand-500 accordion-icon"></i>
                    </button>
                    <div class="accordion-content bg-gray-50">
                        <div class="mt-2 p-6 pt-0 text-sm text-gray-600">
                            {!! __('FAQ 2 A', ['no_open' => '<strong>', 'no_close' => '</strong>']) !!}
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="accordion-item overflow-hidden rounded-xl bg-white shadow-sm">
                    <button class="flex w-full items-center justify-between p-6 text-left focus:outline-none"
                        onclick="toggleAccordion(this)">
                        <span class="font-bold text-gray-800">{{ __('FAQ 3 Q') }}</span>
                        <i class="fas fa-chevron-down text-brand-500 accordion-icon"></i>
                    </button>
                    <div class="accordion-content bg-gray-50">
                        <div class="mt-2 p-6 pt-0 text-sm text-gray-600">
                            {{ __('FAQ 3 A') }}
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="accordion-item overflow-hidden rounded-xl bg-white shadow-sm">
                    <button class="flex w-full items-center justify-between p-6 text-left focus:outline-none"
                        onclick="toggleAccordion(this)">
                        <span class="font-bold text-gray-800">{{ __('FAQ 4 Q') }}</span>
                        <i class="fas fa-chevron-down text-brand-500 accordion-icon"></i>
                    </button>
                    <div class="accordion-content bg-gray-50">
                        <div class="mt-2 p-6 pt-0 text-sm text-gray-600">
                            {{ __('FAQ 4 A') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="galeria" class="bg-white py-20">
        <div class="mx-auto max-w-7xl px-4">
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 md:text-4xl">{{ __('Nuestra Galería') }}</h2>
                <p class="mt-2 text-gray-600">{{ __('Galeria Desc') }}</p>
            </div>

            <div class="columns-1 md:columns-3 gap-4 space-y-4">
                @foreach($images as $image)
                    <div class="break-inside-avoid relative group overflow-hidden rounded-2xl cursor-pointer"
                        onclick="openLightbox('{{ $image }}')">
                        <img src="{{ $image }}"
                            class="w-full object-cover transform transition duration-500 group-hover:scale-110"
                            loading="lazy">
                        <div
                            class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                            <i class="fas fa-search-plus text-white text-3xl"></i>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 z-[70] hidden bg-black/95 items-center justify-center p-4"
        onclick="closeLightbox()">
        <button
            class="absolute top-4 right-4 text-white text-4xl hover:text-gray-300 focus:outline-none">&times;</button>
        <img id="lightbox-img" src=""
            class="max-h-[90vh] max-w-[90vw] object-contain rounded-lg shadow-2xl animate-fade-in"
            onclick="event.stopPropagation()">
    </div>

    <!-- Newsletters Section -->
    <section id="newsletters" class="bg-gray-50 py-20">
        <div class="mx-auto max-w-4xl px-4">
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 md:text-4xl">{{ __('Cartas de Noticias') }}</h2>
                <p class="mt-2 text-gray-600">{{ __('Newsletters Desc') }}</p>
            </div>

            <div class="space-y-8">
                @foreach($newsletters as $newsletter)
                    @php
                        $title = $newsletter->{'title_' . app()->getLocale()};
                        $content = $newsletter->{'content_' . app()->getLocale()};
                    @endphp
                    @if($title && $content)
                        <div
                            class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
                            <div class="p-8">
                                <div class="flex items-center justify-between mb-4">
                                    <span
                                        class="bg-brand-100 text-brand-700 text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full">
                                        {{ __('Publicado el') }} {{ $newsletter->created_at?->format('d M, Y') }}
                                    </span>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $title }}</h3>
                                <div class="prose prose-brand max-w-none text-gray-600 mb-6">
                                    {!! Str::limit(strip_tags($content), 300) !!}
                                </div>

                                <!-- Expandable Content Logic (Simplified for this view, strictly requesting full post could be another page, but user asked for "letters" here. I'll make it collapsible or just show full content? User said "shown paginated in the section". Usually implies snippets or full cards. I will simulate a "Read More" modal or toggle if needed, or just show summary. I'll implement a simple toggle for full content to keep it single-page.) -->
                                <button onclick="toggleNewsletter('newsletter-{{ $newsletter->id }}')"
                                    class="text-brand-600 font-bold hover:text-brand-700 flex items-center gap-2">
                                    {{ __('Leer más') }} <i class="fas fa-chevron-down"></i>
                                </button>

                                <div id="newsletter-{{ $newsletter->id }}"
                                    class="hidden mt-6 pt-6 border-t border-gray-100 prose prose-brand max-w-none">
                                    {!! $content !!}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="mt-12">
                {{ $newsletters->fragment('newsletters')->links() }}
            </div>
        </div>
    </section>

    <!-- Donate Section -->
    <section id="donar" class="bg-brand-50 py-20">
        <div class="mx-auto max-w-4xl px-4 text-center">
            <div class="bg-white rounded-3xl shadow-xl p-10 md:p-16">
                <i class="fas fa-heart text-brand-500 text-5xl mb-6 animate-pulse"></i>
                <h2 class="text-3xl font-extrabold text-gray-900 md:text-4xl mb-6">{{ __('Donar Titulo') }}</h2>
                <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                    {{ __('Donar Desc') }}
                </p>
                <div class="bg-blue-50 border-l-4 border-blue-500 p-6 mb-8 text-left rounded-r-lg">
                    <p class="text-blue-800 font-medium">
                        <i class="fas fa-info-circle mr-2"></i>
                        {!! __('Donar Instruccion', ['name_open' => '<strong>', 'name_close' => '</strong>']) !!}
                    </p>
                </div>
                <a href="https://ywamsdb.givingfuel.com/staffsupport" target="_blank"
                    class="inline-flex items-center justify-center gap-3 bg-brand-500 hover:bg-brand-600 text-white font-bold text-xl py-5 px-10 rounded-full shadow-lg transform transition hover:-translate-y-1">
                    {{ __('Ir a Donar') }} <i class="fas fa-external-link-alt"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Contact & Footer -->
    <section id="contacto" class="border-t border-gray-100 bg-white pb-10 pt-20">
        <div class="mx-auto max-w-6xl px-4">
            <div class="bg-brand-500 relative mb-16 overflow-hidden rounded-3xl p-8 text-white shadow-2xl md:p-12">
                <div class="absolute right-0 top-0 -mr-20 -mt-20 h-64 w-64 rounded-full bg-white opacity-10"></div>
                <div class="relative z-10 flex flex-col items-center text-center">
                    <h2 class="mb-4 text-3xl font-extrabold">{{ __('Contáctanos') }}</h2>
                    <p class="text-brand-100 mb-8 max-w-2xl">
                        {{ __('Contact Desc') }}
                    </p>
                    <div class="flex w-full flex-col justify-center gap-4 md:w-auto md:flex-row">
                        <a href="https://wa.me/526642685826" target="_blank"
                            class="flex min-w-[240px] items-center justify-center gap-4 rounded-xl bg-white/20 p-4 text-left transition hover:bg-white/30 md:justify-start">
                            <i class="fab fa-whatsapp text-2xl"></i>
                            <div>
                                <p class="font-bold">{{ __('WhatsApp Erick') }}</p>
                                <p class="text-brand-100 text-xs">+52 664 268 58 26</p>
                            </div>
                        </a>
                        <a href="mailto:erick.guzman@ywamsdb.org"
                            class="flex min-w-[240px] items-center justify-center gap-4 rounded-xl bg-white/20 p-4 text-left transition hover:bg-white/30 md:justify-start">
                            <i class="fas fa-envelope text-2xl"></i>
                            <div>
                                <p class="font-bold">{{ __('Email') }}</p>
                                <p class="text-brand-100 text-xs">erick.guzman@ywamsdb.org</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-100 pt-8 text-center text-sm text-gray-500">
                <p class="mb-2"><strong>{{ __('Dirección Postal') }}:</strong> P.O. Box 5417, Chula Vista, CA 91912</p>
                <p>&copy; 2024 Familia Guzmán Ochoa. Misioneros JUCUM.</p>
            </div>
        </div>
    </section>

    <script>
        // Navbar Scroll Logic
        window.addEventListener('scroll', function () {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.remove('nav-transparent');
                navbar.classList.add('nav-scrolled');
            } else {
                navbar.classList.add('nav-transparent');
                navbar.classList.remove('nav-scrolled');
            }
        });

        // Accordion Logic
        function toggleAccordion(button) {
            const content = button.nextElementSibling;
            const parent = button.parentElement;

            // Close other items
            const allItems = document.querySelectorAll('.accordion-item');
            allItems.forEach(item => {
                if (item !== parent && !item.contains(parent)) {
                    item.classList.remove('accordion-active');
                    const innerContent = item.querySelector('.accordion-content');
                    if (innerContent) innerContent.style.maxHeight = null;
                }
            });

            parent.classList.toggle('accordion-active');
            if (parent.classList.contains('accordion-active')) {
                content.style.maxHeight = content.scrollHeight + "px";
            } else {
                content.style.maxHeight = null;
            }
        }

        // Mobile Menu Logic
        const menuBtn = document.getElementById('menu-btn');
        const closeMenuBtn = document.getElementById('close-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        function toggleMenu() {
            const isOpen = mobileMenu.classList.contains('open');
            if (isOpen) {
                mobileMenu.classList.remove('open');
                document.body.style.overflow = 'auto'; // Enable scroll
            } else {
                mobileMenu.classList.add('open');
                document.body.style.overflow = 'hidden'; // Disable scroll
            }
        }

        menuBtn.addEventListener('click', toggleMenu);
        closeMenuBtn.addEventListener('click', toggleMenu);

        // Lightbox Logic
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');

        function openLightbox(src) {
            lightboxImg.src = src;
            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
            document.body.style.overflow = 'auto';
            setTimeout(() => lightboxImg.src = '', 200);
        }

        // Close on Escape key
        document.addEventListener('keydown', function (event) {
            if (event.key === "Escape") {
                closeLightbox();
            }
        });

        // Newsletter Toggle
        function toggleNewsletter(id) {
            const content = document.getElementById(id);
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                content.classList.add('animate-fade-in');
            } else {
                content.classList.add('hidden');
            }
        }
    </script>
</body>

</html>
