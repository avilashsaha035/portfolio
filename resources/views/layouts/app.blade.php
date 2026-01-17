<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Avilash Saha | Software Engineer</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

        <!-- Tailwind CSS v3.3.3 -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        colors: {
                            primary: '#8B5CF6', // Vibrant purple
                            'primary-dark': '#7C3AED',
                            secondary: '#10B981', // Emerald green
                            accent: '#F59E0B', // Amber
                            dark: '#0F172A', // Dark blue-gray
                            'dark-light': '#1E293B',
                            'dark-lighter': '#334155',
                            light: '#F1F5F9',
                            gray: '#94A3B8',
                        },
                        fontFamily: {
                            'sans': ['Inter', 'Figtree', 'system-ui', 'sans-serif'],
                        },
                        animation: {
                            'float': 'float 3s ease-in-out infinite',
                            'pulse-slow': 'pulse 3s infinite',
                            'typing': 'typing 3.5s steps(40, end)',
                            'blink-caret': 'blink-caret 0.75s step-end infinite',
                            'glow': 'glow 2s ease-in-out infinite alternate',
                        },
                        keyframes: {
                            float: {
                                '0%, 100%': { transform: 'translateY(0px)' },
                                '50%': { transform: 'translateY(-15px)' },
                            },
                            pulse: {
                                '0%': { boxShadow: '0 0 0 0 rgba(139, 92, 246, 0.7)' },
                                '70%': { boxShadow: '0 0 0 10px rgba(139, 92, 246, 0)' },
                                '100%': { boxShadow: '0 0 0 0 rgba(139, 92, 246, 0)' },
                            },
                            typing: {
                                'from': { width: '0' },
                                'to': { width: '100%' },
                            },
                            'blink-caret': {
                                'from, to': { borderColor: 'transparent' },
                                '50%': { borderColor: '#8B5CF6' },
                            },
                            glow: {
                                'from': { textShadow: '0 0 10px #8B5CF6, 0 0 20px #8B5CF6' },
                                'to': { textShadow: '0 0 20px #8B5CF6, 0 0 30px #8B5CF6, 0 0 40px #8B5CF6' },
                            }
                        }
                    }
                }
            }
        </script>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    </head>

    <body class="font-sans bg-dark text-light overflow-x-hidden scroll-smooth">

        @include('frontend.includes.header')

        <div class="">
            @yield('content')
        </div>

        @include('frontend.includes.footer')

        <!-- Back to Top Button -->
        <button id="back-to-top" class="fixed bottom-8 right-8 bg-gradient text-white p-3 rounded-full shadow-lg hover:shadow-xl hover:shadow-primary/30 transition-all duration-300 opacity-0 translate-y-10">
            <i class="fas fa-arrow-up"></i>
        </button>


        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="{{ asset('assets/frontend/js/script.js') }}"></script>

    </body>
</html>
