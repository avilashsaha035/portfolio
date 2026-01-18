<footer class="bg-dark-light text-white py-8 border-t border-dark-lighter">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <div class="text-2xl font-bold text-gradient glow-text">Avilash Saha</div>
                <div class="text-gray mt-2">Software Engineer & Problem Solver</div>
            </div>

            <div class="flex space-x-6">
                @if (!empty($social['github']))
                    <a href="{{ $social['github'] }}" class="text-gray hover:text-primary transition-colors duration-300 hover:scale-110 transform">
                        <i class="fab fa-github"></i>
                    </a>
                @endif

                @if (!empty($social['linkedin']))
                    <a href="{{ $social['linkedin'] }}" class="text-gray hover:text-primary transition-colors duration-300 hover:scale-110 transform">
                        <i class="fab fa-linkedin"></i>
                    </a>
                @endif

                @if (!empty($social['twitter']))
                    <a href="{{ $social['twitter'] }}" class="text-gray hover:text-primary transition-colors duration-300 hover:scale-110 transform">
                        <i class="fab fa-twitter"></i>
                    </a>
                @endif

                @if (!empty($social['facebook']))
                    <a href="{{ $social['facebook'] }}" class="text-gray hover:text-primary transition-colors duration-300 hover:scale-110 transform">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                @endif
            </div>
        </div>

        <div class="border-t border-dark-lighter mt-8 pt-8 text-center text-gray">
            <p>&copy; Avilash Saha | All rights reserved, {{ date('Y') }}</p>
        </div>
    </div>
</footer>
