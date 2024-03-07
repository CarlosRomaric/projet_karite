<?php
/**
 * Created by PhpStorm.
 * User: salioudiabate
 * Date: 20/03/2020
 * Time: 07:55
 */
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} @yield('title')</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('images/icon-traceagri-white.png') }}" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    @vite(['resources/scss/style.scss','resources/js/app.js'])
    @livewireStyles
    @stack('stylesheets')
</head>
<body>

        
            <nav class="py-5 grid  grid-cols-6 gap-6 justify-items-center bg-green-50">
                <div class="col-start-1 col-end-3">
                    <img src="{{ asset('assets/img/logo-cnra.png') }}" alt="Logo" class="h-10 mx-4 inline">
                </div>
                <div class="col-end-7 grid justify-items-stretch col-span-2">
                    <div class="col-start-1 pt-1 pr-2">
                            <span class="text-sm float-right md:float-right sm:float-right">
                                <b>{{ auth()->user() ? auth()->user()->fullname : '' }}</b>
                            </span><br>
                            <span class="text-xs float-right  md:float-right sm:float-right">
                            Administrateur
                            </span>
                    </div>
                    <div class="col-end-7" id="dropdownDefaultButton" data-dropdown-toggle="dropdown">
                        <img src="https://picsum.photos/200" class="rounded-full mr-5" width="50">
                    </div>
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="{{ route('profile.edit', ['user' => auth()->id()]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mon profile</a>
                            </li>
                        
                            <li>
                                <a href="{{ route('auth.logout') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Deconnexion</a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </nav>

            <nav class="menu">
                <span class="text-3xl cursor-pointer md:hidden block mx-2  text-gray-100">
                    <ion-icon name="menu" class="text-gray-100" onclick="toggleMenu()"></ion-icon> Menu
                </span>
                <ul class="menu-content">
                    @canany(['ADMIN TABLEAU DE BORD'])
                    <li class="menu-hover my-6 md:my-0   hover:h-full  {{ (request()->is('dashboard', 'dashboard*')) ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}" class="menu-item ">
                            <img class="img-h " src="{{ asset('assets/img/icons/dashboard.svg') }}" alt="dashboardIcons">
                            <span for="" class="cursor-pointer text-base active-spa">Tableau de Bord</span>
                            <hr class="{{ (request()->is('dashboard', 'dashboard*')) ? 'active-div' : 'active-div-none' }}">
                        </a>
                    </li>
                    @endcanany
                  
                    @canany(['ADMIN PERMISSION LIST', 'ADMIN PERMISSION ADD', 'ADMIN PERMISSION UPDATE', 'ADMIN PERMISSION DELETE'])
                    <li class="menu-hover my-6 md:my-0 hover:h-full hover:active  {{ (request()->is('permissions', 'permissions*')) ? 'active' : '' }}">
                        <a href="{{  route('permissions.index') }}" class="menu-item">
                            <img class="img-h " src="{{ asset('assets/img/icons/Groupe 3206.svg') }} " alt="permissionIcons" >
                            <span for="" class="cursor-pointer text-base">Permissions</span>
                            <hr class="{{ (request()->is('permissions', 'permissions*')) ? 'active-div' : 'active-div-none' }}">
                        </a>
                    </li>
                    @endcanany
                    @canany(['ADMIN ROLE LIST', 'ADMIN ROLE ADD', 'ADMIN ROLE UPDATE', 'ADMIN ROLE DELETE', 'ADMIN ROLE ASSIGN PERMISSION'])
                    <li class="menu-hover my-6 md:my-0 hover:h-full hover:active {{ (request()->is('roles', 'roles*')) ? 'active' : '' }}">
                        <a href="{{ route('roles.index') }}" class="menu-item">
                            <img class="img-h" src="{{ asset('assets/img/icons/task-complete.svg') }} " alt="roleIcons" >
                            <span for="" class="cursor-pointer text-base">Rôles</span>
                            <hr class="{{ (request()->is('roles', 'roles*')) ? 'active-div' : 'active-div-none' }}">
                        </a>
                    </li>
                    @endcanany
                    @canany(['ADMIN USER LIST', 'ADMIN USER ADD', 'ADMIN USER UPDATE', 'ADMIN USER DELETE', 'ADMIN USER ASSIGN ROLE'])
                    <li class="menu-hover my-6  {{ (request()->is('users', 'users*')) ? 'active' : '' }} md:my-0 hover:h-full hover: hover:active">
                        <a href="{{ route('users.index') }}" class="menu-item">
                            <img class="img-h " src="{{ asset('assets/img/icons/UserP-1.svg') }} " alt="userIcons" >
                            <span for="" class="cursor-pointer text-base ">Utilisateur</span>
                            <hr class="{{ (request()->is('users', 'users*')) ? 'active-div' : 'active-div-none' }}">
                        </a>
                    </li>
                    @endcanany
                    <li class="menu-hover my-6 {{ (request()->is('appli-mobile', 'appli-mobile*')) ? 'active' : '' }} md:my-0 hover:h-full hover:active ">
                        <a href="{{ route('app-mobile.index') }}" class="menu-item">
                            <img class="img-h " src="{{ asset('assets/img/icons/phone.svg') }} " alt="phoneIcons" >
                            <span for="" class="cursor-pointer text-base">Application Mobile</span>
                            <hr class="{{ (request()->is('appli-mobile', 'appli-mobile*')) ? 'active-div' : 'active-div-none' }}">
                        </a>
                    </li>
                
                    
                </ul>

            </nav>

             @yield('content')

            <div class="footer bg-green-cnra text-white border-t py-2">
                <div class="container mx-auto px-4">
                    <div class="md:flex justify-center items-center text-sm">
                        <div class="md:flex md:flex-row-reverse items-center py-4">
                            <div class="text-grey text-center md:mr-4">
                                &copy;{{ date('Y') }} {{ mb_strtoupper(config('app.name')) }}. Tous droits réservés.
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@stack('javascript')

<script>
   
    document.addEventListener('alpine:init', () => {
        Alpine.data();
       
    })
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>


<script>
        function toggleMenu() {
                let list = document.querySelector('.menu-content');

                if (window.innerWidth < 768) {
                    // Si l'écran est de petite taille (mobile), bascule simplement la classe hidden
                    list.classList.toggle('hidden');
                } else {
                    // Pour les écrans plus grands, bascule la classe hidden comme précédemment
                    if (list.classList.contains('hidden')) {
                        list.classList.remove('hidden');
                    } else {
                        list.classList.add('hidden');
                    }
                }
        }
</script>


<script type="text/javascript" src="{{ asset('js/tw-elements.umd.min.js') }}"></script>
@stack('scripts')
@livewireScriptConfig
</body>
</html>
