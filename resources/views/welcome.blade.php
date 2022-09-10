<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nizek Technical Task</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg width="196px" height="80px" viewBox="0 0 146 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g id="SVG-Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="svgexport-0-copy" fill-rule="nonzero">
                                <path d="M141.628543,27.5 C140.486404,27.5 136.756998,27.0895636 136.756998,21.8105497 L136.756998,19.1544595 C136.756998,17.3296067 135.642784,16.8072331 135.161773,16.6662751 L131.766073,16.6579835 L131.766073,13.612186 L134.65144,13.612186 L134.933484,13.5824742 C135.007486,13.5679639 136.756998,13.3192145 136.756998,11.0141373 L136.756998,8.72011553 C136.756998,7.39137945 137.107459,3.05484922 141.628543,3.05484922 L145.501065,3.05484922 L145.501065,5.92375833 L141.798886,5.93066802 C140.514329,5.93066802 139.861578,6.88351621 139.861578,8.77470219 L139.861578,11.5123269 C139.861578,13.2929576 139.024521,14.3722534 138.326392,14.963724 L138.193748,15.08188 L138.329185,15.1931262 C139.028011,15.7749232 139.861578,16.8445455 139.861578,18.676308 L139.861578,21.7594179 C139.861578,23.6436943 140.514329,24.6020701 141.798886,24.6020701 L145.501065,24.6331639 L145.501065,27.5 L141.628543,27.5 Z M129.764773,4.76361903 L129.764773,27.5 L126.184069,27.5 L126.184069,6.32313921 C126.184069,5.79800171 125.897835,5.5485614 125.400069,5.5485614 L123.856506,5.5485614 L123.856506,2.5 L127.474909,2.5 C129.084098,2.5 129.764773,3.17162322 129.764773,4.76361903 Z M104.371802,5.5485614 L102.042843,5.5485614 L102.042843,2.5 L116.894145,2.5 C118.502635,2.5 119.183311,3.17162322 119.183311,4.76361903 L119.183311,7.91858986 L115.927236,7.91858986 L115.927236,6.32313921 C115.927236,5.79800171 115.641003,5.5485614 115.139049,5.5485614 L107.949016,5.5485614 L107.949016,13.3696554 L116.785935,13.3696554 L116.785935,16.4189078 L107.949016,16.4189078 L107.949016,23.6768607 C107.949016,24.1695226 108.235249,24.4562754 108.733015,24.4562754 L116.105958,24.4562754 C116.607912,24.4562754 116.894145,24.1695226 116.894145,23.6768607 L116.894145,22.085556 L120.183032,22.085556 L120.183032,25.2329261 C120.183032,26.8290678 119.505148,27.5 117.893866,27.5 L106.659572,27.5 C105.050384,27.5 104.371802,26.8290678 104.371802,25.2329261 L104.371802,5.5485614 Z M79.0863436,25.1638291 L91.5395719,7.81632625 C92.5406891,6.42954866 93.4342944,5.511249 93.4342944,5.511249 L93.4342944,5.4386971 C93.4342944,5.4386971 92.7557129,5.5485614 91.5395719,5.5485614 L83.4168389,5.5485614 C82.9169784,5.5485614 82.6307454,5.79800171 82.6307454,6.32313921 L82.6307454,7.91858986 L79.3753691,7.91858986 L79.3753691,4.76361903 C79.3753691,3.17162322 80.0525544,2.5 81.6638365,2.5 L97.8729998,2.5 L97.8729998,4.80507725 L85.3827706,22.1919654 C84.4186543,23.5697604 83.5229545,24.4562754 83.5229545,24.4562754 L83.5229545,24.5288272 C83.5229545,24.5288272 84.2050268,24.4562754 85.3827706,24.4562754 L94.2922951,24.4562754 C94.7921556,24.4562754 95.0783886,24.1695226 95.0783886,23.6768607 L95.0783886,22.085556 L98.3693695,22.085556 L98.3693695,25.2329261 C98.3693695,26.8290678 97.6914861,27.5 96.0809021,27.5 L79.0863436,27.5 L79.0863436,25.1638291 Z M67.074415,24.4562754 L69.5450941,24.4562754 L69.5450941,5.5485614 L67.074415,5.5485614 L67.074415,2.5 L75.4128699,2.5 L75.4128699,5.5485614 L72.9428888,5.5485614 L72.9428888,24.4562754 L75.4128699,24.4562754 L75.4128699,27.5 L67.074415,27.5 L67.074415,24.4562754 Z M38.75,24.4562754 L40.2872805,24.4562754 C40.7892354,24.4562754 41.0754683,24.1695226 41.0754683,23.6768607 L41.0754683,2.5 L44.3315428,2.5 L55.5658375,18.3308228 C56.4964436,19.6740692 57.6769801,21.7269424 57.6769801,21.7269424 L57.7509818,21.7269424 C57.7509818,21.7269424 57.4975609,19.749385 57.4975609,18.3308228 L57.4975609,4.76361903 C57.4975609,3.17162322 58.1775386,2.5 59.8251235,2.5 L63.4009411,2.5 L63.4009411,5.5485614 L61.8643589,5.5485614 C61.3610078,5.5485614 61.0782654,5.79800171 61.0782654,6.32313921 L61.0782654,27.5 L57.855003,27.5 L46.5844056,11.6712501 C45.6558938,10.3273127 44.5088676,8.27305769 44.5088676,8.27305769 L44.4390546,8.27305769 C44.4390546,8.27305769 44.6526821,10.2927642 44.6526821,11.6712501 L44.6526821,25.2329261 C44.6526821,26.8290678 43.9741006,27.5 42.3635166,27.5 L38.75,27.5 L38.75,24.4562754 Z" id="Nizek" fill="#3B3B3A"></path>
                                <path d="M3.80569037,16.7523663 L3.80569037,23.9829018 C3.80569037,24.9039923 4.56025806,25.6513305 5.49140486,25.6513305 L12.8045517,25.6513305 L12.8045517,29.4210448 L3.62346485,29.4210448 C1.62206387,29.4210448 0,27.8151059 0,25.8347358 L0,16.7523663 L3.80569037,16.7523663 Z M25.9176036,12.6712188 L25.9176036,5.43611084 C25.9176036,4.51502029 25.1630359,3.7681901 24.2318891,3.7681901 L16.9197689,3.7681901 L16.9197689,0.000508047741 L26.101369,0.000508047741 C28.1012301,0.000508047741 29.723294,1.60593891 29.723294,3.58630901 L29.723294,12.6712188 L25.9176036,12.6712188 Z M27.3148371,29.189883 L27.0946265,29.4230769 L2.69591123,5.20088474 C1.9937013,4.50485932 1.61282428,3.55328591 1.63900315,2.56970547 C1.66723528,1.5866331 2.10201,0.657921826 2.84169165,0 L27.2404069,24.2013622 C28.6217278,25.571567 28.6545798,27.7795425 27.3148371,29.189883 Z" id="Nizek-Symol" fill="#FF3366"></path>
                            </g>
                        </g>
                    </svg>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Testing</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.

                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel-news.com/" class="underline text-gray-900 dark:text-white">Laravel News</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Vibrant Ecosystem</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline">Forge</a>, <a href="https://vapor.laravel.com" class="underline">Vapor</a>, <a href="https://nova.laravel.com" class="underline">Nova</a>, and <a href="https://envoyer.io" class="underline">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline">Telescope</a>, and more.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                Shop
                            </a>

                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>

                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
