<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Connexion</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('images/icon-traceagri-white.png') }}" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    @vite(['resources/scss/style.scss','resources/js/app.js'])
</head>
<body>


<div id="app" class="font-sans bg-gray-200 flex flex-col min-h-screen">
    <div class="flex justify-between min-h-screen ">
        <!-- Left section -->
        <div class="w-2/5 flex items-center justify-center cnra-genotic-background">
            <!-- Contenu pour la section de gauche -->
        </div>

        <!-- Right section -->
        <div class="w-3/5 bg-login-color shadow-md min-h-screen">
            <div class="flex flex-col justify-center items-start min-h-screen pt-10 px-8 md:px-16 lg:px-24">
                <div class="flex flex-col items-center">
                    <img src="{{ asset('assets/img/logo-cnra-2.png') }}" alt="Logo CNRA" class="img-logo mx-auto">
                    <h1 class="text-sm font-bold text-center text-green-800 py-4">POUR UNE COLLECTE INCLUSIVE DES DONNÉES AGRICOLES</h1>
                </div>

                <div class="container mx-auto px-4 md:px-10 lg:px-20 w-full">
                    <form method="post" action="{{ route('auth.login') }}" class="pt-6 pb-8 m-2 px-20">
                        
                        @if(session()->has('message') && session()->get('status'))
                            <div class="bg-red-400 text-white px-5 py-3 rounded shadow my-5 items-center">
                                {{ session()->get('message') }}
                            </div>
                        @endif

                        @csrf

                        

                        <h1 class="text-4xl font-bold text-center pb-2">Bienvenue</h1>
                        <h1 class="text-base font-semibold text-center pb-4">Merci de vous identifier pour accéder a la plateforme</h1>

                        <div class="relative flex flex-wrap items-stretch  ">
                            <span
                                class="flex items-center whitespace-nowrap rounded-l-lg  bg-green-cnra border border-r-0 border-solid border-neutral-300 px-6 py-[0.45rem] text-center text-xl font-normal text-gray-100 dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200"
                                id="inputGroup-sizing-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 36.979 36.979">
                                    <path id="UserP" d="M18.49,18.494a7.394,7.394,0,1,1,7.4-7.394A7.4,7.4,0,0,1,18.49,18.494Zm6.948,1.244a11.095,11.095,0,1,0-13.9,0C4.776,22.279,0,28.559,0,36.979H3.7c0-9.243,6.636-14.788,14.792-14.788s14.792,5.546,14.792,14.788h3.7C36.979,28.559,32.2,22.279,25.438,19.738Z" fill="#f9f9f9" fill-rule="evenodd"/>
                                </svg>

                                </span>
                            <input
                                type="text"
                                placeholder="login"
                                name="username"
                                id="username"
                                value="{{ old('username') }}"
                                class="relative m-0 block w-[1px] min-w-0 flex-auto rounded-r-lg border {{ $errors->has('username') ? ' border-red-500' : ' focus:shadow-outline' }} border-solid border-neutral-300 bg-gray-100 bg-clip-padding px-4 py-[0.45rem] text-xl font-normal text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-gray-100 focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-gray-100"
                                aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-lg" />
                               
                        </div>
                        <div class="aligns-center my-[20px]">
                                @if($errors->has('username'))
                                    <p class="text-red-500 text-sm text-center">{{ $errors->first('username') }}</p>
                                @endif
                        </div>


                        <div class="relative flex flex-wrap items-stretch w-50">
                            <span
                                class="flex items-center whitespace-nowrap rounded-l-lg bg-green-cnra border border-r-0 border-solid border-neutral-300 px-4 py-[0.45rem] text-center text-xl font-normal text-gray-100 dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200"
                                id="inputGroup-sizing-lg">
                                <svg id="Groupe_6" data-name="Groupe 6" xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 59 54">
                                    <!-- <path id="Rectangle_3200" data-name="Rectangle 3200" d="M10,0H44A10,10,0,0,1,54,10V59a0,0,0,0,1,0,0H0a0,0,0,0,1,0,0V10A10,10,0,0,1,10,0Z" transform="translate(0 54) rotate(-90)" fill="#0e5907"/> -->
                                    <g id="motDePasse" transform="translate(19 13)">
                                        <path id="Tracé_1" data-name="Tracé 1" d="M8.286,20A2.287,2.287,0,0,0,6,22.286v3.429A2.287,2.287,0,0,0,8.286,28H19.714A2.287,2.287,0,0,0,22,25.714V22.286A2.287,2.287,0,0,0,19.714,20Zm.571,2.621a.57.57,0,0,1,.4.167l.4.4.4-.4a.571.571,0,0,1,.808.808l-.4.4.4.4a.571.571,0,0,1-.808.808l-.4-.4-.4.4a.571.571,0,0,1-.808-.808l.4-.4-.4-.4a.571.571,0,0,1,.4-.975Zm4.335,0a.57.57,0,0,1,.4.167l.4.4.4-.4a.571.571,0,0,1,.808.808l-.4.4.4.4a.571.571,0,0,1-.808.808l-.4-.4-.4.4a.571.571,0,0,1-.808-.808l.4-.4-.4-.4a.571.571,0,0,1,.4-.975Zm4.335,0a.57.57,0,0,1,.4.167l.4.4.4-.4a.571.571,0,0,1,.808.808l-.4.4.4.4a.571.571,0,0,1-.808.808l-.4-.4-.4.4a.571.571,0,0,1-.808-.808l.4-.4-.4-.4a.571.571,0,0,1,.4-.975Z" fill="#fff" fill-rule="evenodd"/>
                                        <path id="Tracé_2" data-name="Tracé 2" d="M8.575,13.509A1.8,1.8,0,0,1,10.8,16.332V18a1.2,1.2,0,0,1-2.4,0V16.332a1.788,1.788,0,0,1,.175-2.823ZM15.6,6V8.4A3.6,3.6,0,0,1,19.2,12v8.034l-2.4.017V12a1.2,1.2,0,0,0-1.2-1.2H3.6A1.2,1.2,0,0,0,2.4,12v8.4a1.2,1.2,0,0,0,1.2,1.2H6.8L6.814,24H3.6A3.6,3.6,0,0,1,0,20.4V12A3.6,3.6,0,0,1,3.6,8.4V6a6,6,0,0,1,12,0ZM7.054,3.454A3.6,3.6,0,0,0,6,6V8.4h7.2V6A3.6,3.6,0,0,0,7.054,3.454Z" fill="#fff" fill-rule="evenodd"/>
                                    </g>
                                </svg>



                                </span>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Mot de passe"
                                class="relative m-0 block w-[1px] min-w-0 flex-auto rounded-r-lg border {{ $errors->has('password') ? ' border-red-500' : ' focus:shadow-outline' }}  border-solid border-neutral-300 bg-gray-100 bg-clip-padding px-4 py-[0.45rem] text-xl font-normal text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-gray-200 focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-gray-100"
                                aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-lg" />
                               
                        </div>
                        <div class="my-[20px]">
                                @if($errors->has('password'))
                                    <p class="text-red-500 text-sm text-center">{{ $errors->first('password') }}</p>
                                @endif
                        </div>

                        <div class="relative flex flex-wrap items-stretch w-50 mt-10">
                            <label class="custom-checkbox-label flex mx-auto">

                                <div class="bg-gray-300 shadow-lg rounded-lg border-solid border-green-cnra w-6 h-6 p-1 flex justify-center items-center mr-2">
                                    <input type="checkbox" name="remember_me" class="hidden">
                                    <svg class="hidden w-4 h-4 text-green-cnra pointer-events-none" viewBox="0 0 172 172">
                                        <g fill="none" stroke-width="none" stroke-miterlimit="10" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode:normal">
                                            <path d="M0 172V0h172v172z"/>
                                            <path d="M145.433 37.933L64.5 118.8658 33.7337 88.0996l-10.134 10.1341L64.5 139.1341l91.067-91.067z" fill="currentColor" stroke-width="2"/>
                                        </g>
                                    </svg>
                                </div>

                                <span class="select-none text-md text-green-900 font-semibold">Se rappeler de moi ?</span>
                            </label>
                        </div>

                        <div class="flex justify-center">
                            
                            <button class="py-[10px] mt-10 w-full rounded-full px-auto bg-green-cnra text-white" type="submit">Se connecter</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
