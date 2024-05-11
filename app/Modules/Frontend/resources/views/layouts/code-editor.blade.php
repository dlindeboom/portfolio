<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('app/Modules/Frontend/resources/css/app.css')
    @livewireStyles
</head>
    <body class="w-full text-primary-content bg-primary overflow-hidden" >
        <div class="flex flex-col h-screen">
            <div class="flex flex-1n">
               <x-navigation-navbar/>
                <div class="flex h-screen flex-col flex-1 overflow-y-auto"> <!-- Main content flex container -->
                    <header class="bg-primary-darkest flex items-center">
                        <div x-data="{}" class="lg:hidden p-2">
                            <button @click="$dispatch('open-sidebar')" id="menu" type="button" class="flex p-2 rounded-lg hover:bg-primary-darker items-center justify-center w-full h-full">
                                <x-feather-icon name="menu" class="h-5 w-5 stroke-2"/>
                            </button>
                        </div>
                        <livewire:navigation.components.history/>
                    </header>
                    <main x-data="{}" @click="$dispatch('open-sidebar')" class="flex flex-1 overflow-y-auto">
                        <x-line-numbers line-height="25" height="90"/>
                        <div class="p-4 ml-8 flex-1">
                            @yield('content')
                        </div>
                    </main>
                </div>
            </div>
            <!-- Settings button as a fixed bar at the bottom -->
            <footer class="w-full text-center p-2 fixed bottom-0 left-0 z-10 border-t bg-secondary-bottom-bar border-primary-darkest">
                <x-settings-button/>
            </footer>
        </div>

        <x-settings-modal/>
        @vite('app/Modules/Frontend/resources/js/app.js')
        @livewireScripts
    </body>
</html>
