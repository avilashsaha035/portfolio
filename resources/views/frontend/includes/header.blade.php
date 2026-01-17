<!-- Navigation -->
<nav class="fixed w-full z-50 glass-effect shadow-lg">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="#" class="text-2xl font-bold text-gradient">AM</a>

        <div class="hidden md:flex space-x-8">
            <a href="#home" class="nav-link text-gray hover:text-primary transition-colors duration-300">Home</a>
            <a href="#about" class="nav-link text-gray hover:text-primary transition-colors duration-300">About</a>
            <a href="#skills" class="nav-link text-gray hover:text-primary transition-colors duration-300">Skills</a>
            <a href="#projects" class="nav-link text-gray hover:text-primary transition-colors duration-300">Projects</a>
            <a href="#contact" class="nav-link text-gray hover:text-primary transition-colors duration-300">Contact</a>
        </div>

        <a href="#contact" class="bg-gradient text-white px-6 py-2 rounded-full font-medium hover:shadow-lg hover:shadow-primary/30 transition-all duration-300">Hire Me</a>

        <!-- Mobile menu button -->
        <button id="mobile-menu-button" class="md:hidden text-gray">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="md:hidden hidden bg-dark-light py-4 px-6 shadow-lg">
        <div class="flex flex-col space-y-4">
            <a href="#home" class="nav-link text-gray hover:text-primary transition-colors duration-300">Home</a>
            <a href="#about" class="nav-link text-gray hover:text-primary transition-colors duration-300">About</a>
            <a href="#skills" class="nav-link text-gray hover:text-primary transition-colors duration-300">Skills</a>
            <a href="#projects" class="nav-link text-gray hover:text-primary transition-colors duration-300">Projects</a>
            <a href="#contact" class="nav-link text-gray hover:text-primary transition-colors duration-300">Contact</a>
        </div>
    </div>
</nav>
