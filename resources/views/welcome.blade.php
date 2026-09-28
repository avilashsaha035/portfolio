@extends('layouts.app')

@section('content')
    @php
        $social = $aboutMe->social_links ?? [];
    @endphp
    <!-- Hero Section -->
    <section id="home" class="hero-shape code-bg pt-20 pb-20 md:pt-32 md:pb-48 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-dark via-dark-light to-dark opacity-90"></div>

        <!-- Animated background elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
            <!-- Hide on small screens, show on medium+ -->
            <div class="hidden sm:block absolute top-10 left-10 w-16 h-16 md:w-20 md:h-20 rounded-full bg-primary/10 animate-float" style="animation-delay: 0.5s;"></div>
            <div class="hidden sm:block absolute bottom-10 right-10 md:bottom-20 md:right-20 w-12 h-12 md:w-16 md:h-16 rounded-full bg-secondary/10 animate-float" style="animation-delay: 1s;"></div>
            <div class="hidden sm:block absolute top-1/3 right-1/4 w-8 h-8 md:w-12 md:h-12 rounded-full bg-accent/10 animate-float" style="animation-delay: 1.5s;"></div>
            <div class="hidden sm:block absolute top-2/3 left-1/4 md:left-1/3 w-16 h-16 md:w-24 md:h-24 rounded-full bg-primary/5 animate-float" style="animation-delay: 2s;"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 relative z-10 flex flex-col lg:flex-row items-center">
            <!-- Text Content - Takes full width on mobile, half on desktop -->
            <div class="w-full lg:w-1/2 mb-10 lg:mb-0 fade-in order-2 lg:order-1">
                <div class="mb-4 md:mb-6">
                    <span class="bg-primary/10 text-primary px-3 py-1 md:px-4 md:py-2 rounded-full text-xs md:text-sm font-medium border border-primary/30">Software Engineer</span>
                </div>

                <h1 class="text-3xl xs:text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-3 md:mb-4 leading-tight">
                    Hi, I'm <span class="text-gradient block sm:inline">Avilash Saha</span>
                </h1>

                <h2 class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-semibold text-gray mb-4 md:mb-6 overflow-hidden whitespace-nowrap animate-typing animate-blink-caret">
                    Full Stack Developer & Problem Solver
                </h2>

                <p class="text-gray text-base sm:text-lg mb-6 md:mb-8 max-w-2xl">
                    I craft exceptional digital experiences by merging elegant code with intuitive design. Passionate about solving complex challenges with innovative solutions.
                </p>


                <div class="flex flex-wrap gap-4">
                    <a href="#projects" class="bg-gradient text-white px-8 py-3 rounded-full font-semibold hover:shadow-xl hover:shadow-primary/30 transition-all duration-300"><i class="fa-regular fa-eye mr-2"></i>View My Work</a>
                    <a href="{{ $aboutMe->cv_link}}" target="blank" class="border-gradient text-white px-8 py-3 rounded-full font-semibold hover:bg-dark-light transition-all duration-300"><i class="fa-solid fa-cloud-arrow-down mr-2"></i>Download CV</a>
                </div>

                <div class="mt-12 flex items-center space-x-6">
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-gradient flex items-center justify-center mr-3 animate-pulse-slow">
                            <i class="fa-solid fa-chess-king fa-lg text-white"></i>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-white">5+</div>
                            <div class="text-gray text-sm">Years Experience</div>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-full bg-gradient flex items-center justify-center mr-3 animate-pulse-slow" style="animation-delay: 0.5s;">
                            <i class="fas fa-code text-white"></i>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-white">PHP</div>
                            <div class="text-gray text-sm">Most Used Language</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Image - Takes full width on mobile, half on desktop -->
            <div class="w-full lg:w-1/2 flex justify-center fade-in mb-8 lg:mb-0 order-1 lg:order-2">
                <div class="relative">
                    <!-- Profile image container with responsive sizing -->
                    <div class="w-48 h-48 xs:w-56 xs:h-56 sm:w-64 sm:h-64 md:w-72 md:h-72 lg:w-80 lg:h-80 rounded-full overflow-hidden border-4 border-primary/30 shadow-2xl animate-float mx-auto">
                        <div class="absolute inset-0 bg-gradient-to-br from-primary/20 to-secondary/20"></div>
                        <img src="{{ asset('/storage/'. $aboutMe->image) }}"
                            alt="Alex Morgan"
                            class="w-full h-full object-cover mix-blend-overlay">
                    </div>

                    <!-- Floating tech badges - Responsive positioning and sizing -->
                    <!-- JavaScript badge -->
                    <div class="absolute top-0 -left-2 xs:-left-4 sm:-left-4 md:-left-4 w-10 h-10 xs:w-12 xs:h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-dark-light p-2 xs:p-3 sm:p-3 md:p-4 rounded-2xl shadow-xl border border-dark-lighter">
                        <div class="text-lg xs:text-xl sm:text-2xl font-bold text-primary flex items-center justify-center h-full">
                            <i class="fab fa-js"></i>
                        </div>
                    </div>

                    <!-- React badge -->
                    <div class="absolute -bottom-2 xs:-bottom-4 sm:-bottom-4 md:-bottom-4 -right-2 xs:-right-4 sm:-right-4 md:-right-4 w-10 h-10 xs:w-12 xs:h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-dark-light p-2 xs:p-3 sm:p-3 md:p-4 rounded-2xl shadow-xl border border-dark-lighter">
                        <div class="text-lg xs:text-xl sm:text-2xl font-bold text-secondary flex items-center justify-center h-full">
                            <i class="fab fa-react"></i>
                        </div>
                    </div>

                    <!-- Node.js badge - Show on medium+ screens -->
                    <div class="hidden sm:block absolute top-1/4 -right-4 md:-right-6 w-10 h-10 md:w-12 md:h-12 bg-dark-light p-2 md:p-3 rounded-2xl shadow-xl border border-dark-lighter">
                        <div class="text-lg md:text-xl font-bold text-accent flex items-center justify-center h-full">
                            <i class="fab fa-node-js"></i>
                        </div>
                    </div>

                    <!-- Database badge - Show on medium+ screens -->
                    <div class="hidden sm:block absolute bottom-1/4 -left-4 md:-left-6 w-10 h-10 md:w-12 md:h-12 bg-dark-light p-2 md:p-3 rounded-2xl shadow-xl border border-dark-lighter">
                        <div class="text-lg md:text-xl font-bold text-primary flex items-center justify-center h-full">
                            <i class="fas fa-database"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($experiences->isNotEmpty())
    <!-- Work Experience Section -->
    <section id="experience" class="py-20 bg-dark relative overflow-hidden">
        <!-- Ambient background glows -->
        <div class="absolute top-1/4 -left-32 w-96 h-96 bg-primary/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-1/4 -right-32 w-96 h-96 bg-secondary/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="container mx-auto px-4 sm:px-6 relative z-10">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-12 md:mb-16 fade-in">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs md:text-sm font-medium bg-primary/10 text-primary border border-primary/30 mb-4">
                    <i class="fa-solid fa-briefcase"></i>
                    <span>Career Roadmap &amp; Experience</span>
                </div>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white">
                    Work <span class="text-gradient">Experience</span>
                </h2>
            </div>

            <div class="relative max-w-4xl mx-auto">
                <!-- Timeline Stem Track -->
                <div class="timeline-track"></div>

                <div class="space-y-12">
                    @forelse ($experiences as $exp)
                        <div class="relative pl-12 md:pl-20 fade-in group">
                            <!-- Timeline Node -->
                            <div class="absolute left-0 top-1.5 md:top-2 w-10 h-10 md:w-14 md:h-14 rounded-2xl bg-dark-light border-2 {{ $exp->is_current ? 'border-secondary shadow-lg shadow-secondary/30' : 'border-primary/40 group-hover:border-primary' }} flex items-center justify-center transition-all duration-300 z-10">
                                @if ($exp->is_current)
                                    <span class="relative flex h-3.5 w-3.5">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-secondary opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-3.5 w-3.5 bg-secondary"></span>
                                    </span>
                                @else
                                    <i class="fa-solid fa-code text-primary text-sm md:text-base group-hover:scale-110 transition-transform"></i>
                                @endif
                            </div>

                            <!-- Experience Card -->
                            <div class="bg-dark-light/80 p-6 md:p-8 rounded-2xl border border-dark-lighter hover:border-primary/40 transition-all duration-300 card-hover shadow-xl">
                                <!-- Card Header -->
                                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-4 pb-4 border-b border-dark-lighter/60">
                                    <div>
                                        <div class="flex flex-wrap items-center gap-2 mb-1.5">
                                            <h3 class="text-xl md:text-2xl font-bold text-white">
                                                {{ $exp->role }}
                                            </h3>
                                            @if ($exp->is_current)
                                                <span class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full text-xs font-semibold bg-secondary/15 text-secondary border border-secondary/30">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-secondary animate-pulse"></span> Present
                                                </span>
                                            @endif
                                        </div>
                                        <div class="flex flex-wrap items-center gap-3 text-sm">
                                            <span class="text-gradient font-semibold text-base">{{ $exp->company }}</span>
                                            @if ($exp->location)
                                                <span class="text-dark-lighter">•</span>
                                                <span class="text-gray flex items-center gap-1">
                                                    <i class="fa-solid fa-location-dot text-xs text-primary"></i> {{ $exp->location }}
                                                </span>
                                            @endif
                                            <span class="text-dark-lighter">•</span>
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-dark text-gray border border-dark-lighter">
                                                {{ $exp->workplace_type }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="md:text-right flex-shrink-0">
                                        <div class="text-white font-medium text-sm md:text-base flex items-center md:justify-end gap-1.5">
                                            <i class="fa-regular fa-calendar text-accent"></i>
                                            {{ $exp->period }}
                                        </div>
                                        <div class="text-gray text-xs mt-0.5">{{ $exp->employment_type }}</div>
                                    </div>
                                </div>

                                <!-- Role Scope Description -->
                                @if ($exp->description)
                                    <p class="text-gray text-sm md:text-base mb-6 leading-relaxed">
                                        {{ $exp->description }}
                                    </p>
                                @endif

                                <!-- Key Achievements -->
                                @if (!empty($exp->achievements))
                                    <div class="mb-6">
                                        <h4 class="text-xs uppercase tracking-wider font-semibold text-gray mb-3 flex items-center gap-2">
                                            <i class="fa-solid fa-trophy text-accent text-xs"></i>
                                            Key Impact &amp; Contributions
                                        </h4>
                                        <div class="experience-achievements text-gray text-sm md:text-base leading-relaxed">
                                            @if (is_array($exp->achievements))
                                                <ul class="space-y-2.5">
                                                    @foreach ($exp->achievements as $item)
                                                        <li class="flex items-start text-sm md:text-base text-gray leading-relaxed">
                                                            <span class="text-primary mt-1 mr-3 flex-shrink-0">
                                                                <i class="fa-solid fa-circle-check text-xs"></i>
                                                            </span>
                                                            <span>{{ $item }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                {!! $exp->achievements !!}
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                <!-- Tech Stack -->
                                @if (!empty($exp->tech_stack))
                                    <div>
                                        <h4 class="text-xs uppercase tracking-wider font-semibold text-gray mb-2.5 flex items-center gap-2">
                                            <i class="fa-solid fa-microchip text-primary text-xs"></i>
                                            Technologies &amp; Tools
                                        </h4>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach ($exp->tech_stack as $tech)
                                                <span class="bg-dark text-gray hover:text-white px-3 py-1 rounded-lg text-xs font-mono border border-dark-lighter transition-colors duration-200">
                                                    {{ $tech }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray py-12">No work experience entries yet. Add them from the admin panel.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    @endif


    <!-- Projects Section -->
    <section id="projects" class="py-20 bg-dark-light">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-white section-title fade-in">My Projects</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Project 1: Analytics Dashboard -->
                @foreach ($projects as $project)
                    <div class="bg-dark rounded-2xl shadow-xl overflow-hidden card-hover fade-in border border-dark-lighter">
                        <div class="h-48 relative overflow-hidden">
                            <!-- Image overlay for better text readability -->
                            <div class="absolute inset-0 bg-gradient-to-t from-dark/90 via-dark/50 to-transparent z-10"></div>
                            <img src="{{ asset('/storage/'. $project->image) }}"alt="{{ $project->title }}"
                                class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
                            <!-- Project Type Badge -->
                            <div class="absolute top-4 right-4 bg-accent/20 text-accent px-3 py-1 rounded-full text-sm font-bold border border-accent/30 z-20">{{ $project->project_type }}</div>
                            <!-- Project Title Overlay -->
                            <div class="absolute bottom-4 left-4 z-20">
                                <h3 class="text-xl font-bold text-white">{{ $project->title }}</h3>
                                <!-- <p class="text-gray-200 text-sm">Interactive data visualization</p> -->
                            </div>
                        </div>

                        <div class="p-6">
                            <p class="text-gray mb-4">{{ $project->description }}</p>

                            {{-- <div class="flex flex-wrap gap-2 mb-6">
                                <span class="bg-dark-light text-gray px-3 py-1 rounded-full text-sm border border-dark-lighter">React</span>
                                <span class="bg-dark-light text-gray px-3 py-1 rounded-full text-sm border border-dark-lighter">Node.js</span>
                                <span class="bg-dark-light text-gray px-3 py-1 rounded-full text-sm border border-dark-lighter">MongoDB</span>
                                <span class="bg-dark-light text-gray px-3 py-1 rounded-full text-sm border border-dark-lighter">D3.js</span>
                            </div> --}}

                            <div class="flex justify-between items-center">
                                @if(!empty($project->live_link))
                                    <a href="{{ $project->live_link }}" class="text-primary font-medium hover:underline inline-flex items-center">
                                        Live Preview <i class="fas fa-eye ml-2"></i>
                                    </a>
                                @endif
                                @if(!empty($project->repo_link))
                                    <a href="{{ $project->repo_link }}" class="text-gray hover:text-primary transition-colors duration-300">
                                        <i class="fab fa-github text-lg"></i> Github
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12 fade-in">
                <a href="{{ $social['github'] }}" class="bg-gradient text-white px-8 py-3 rounded-full font-semibold hover:shadow-xl hover:shadow-primary/30 transition-all duration-300 inline-flex items-center">
                    <i class="fab fa-github mr-2"></i> View More on GitHub
                </a>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-20 bg-dark">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-white section-title fade-in">My Skills</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Technical Skills -->
                <div class="fade-in">
                    <h3 class="text-2xl font-bold mb-8 text-white">Technical Skills</h3>

                    @php
                        $skills = [
                            ['name' => 'HTML',        'color' => '#E34F26', 'bg' => 'rgba(227,79,38,0.12)',   'border' => 'rgba(227,79,38,0.3)'],
                            ['name' => 'CSS',         'color' => '#1572B6', 'bg' => 'rgba(21,114,182,0.12)',  'border' => 'rgba(21,114,182,0.3)'],
                            ['name' => 'Bootstrap',   'color' => '#7952B3', 'bg' => 'rgba(121,82,179,0.12)', 'border' => 'rgba(121,82,179,0.3)'],
                            ['name' => 'Tailwind',    'color' => '#38BDF8', 'bg' => 'rgba(56,189,248,0.12)',  'border' => 'rgba(56,189,248,0.3)'],
                            ['name' => 'JavaScript',  'color' => '#F7DF1E', 'bg' => 'rgba(247,223,30,0.12)',  'border' => 'rgba(247,223,30,0.3)'],
                            ['name' => 'jQuery',      'color' => '#0769AD', 'bg' => 'rgba(7,105,173,0.12)',   'border' => 'rgba(7,105,173,0.3)'],
                            ['name' => 'Vue.js',      'color' => '#42B883', 'bg' => 'rgba(66,184,131,0.12)',  'border' => 'rgba(66,184,131,0.3)'],
                            ['name' => 'Node.js',     'color' => '#8CC84B', 'bg' => 'rgba(140,200,75,0.12)',  'border' => 'rgba(140,200,75,0.3)'],
                            ['name' => 'Express.js',  'color' => '#AAAAAA', 'bg' => 'rgba(170,170,170,0.12)', 'border' => 'rgba(170,170,170,0.3)'],
                            ['name' => 'PHP',         'color' => '#777BB4', 'bg' => 'rgba(119,123,180,0.12)', 'border' => 'rgba(119,123,180,0.3)'],
                            ['name' => 'Laravel',     'color' => '#FF2D20', 'bg' => 'rgba(255,45,32,0.12)',   'border' => 'rgba(255,45,32,0.3)'],
                            ['name' => 'MySQL',       'color' => '#00758F', 'bg' => 'rgba(0,117,143,0.12)',   'border' => 'rgba(0,117,143,0.3)'],
                            ['name' => 'Python',      'color' => '#3776AB', 'bg' => 'rgba(55,118,171,0.12)',  'border' => 'rgba(55,118,171,0.3)'],
                        ];
                    @endphp

                    <div class="flex flex-wrap gap-3">
                        @foreach ($skills as $skill)
                            <div
                                class="flex items-center gap-2 px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 hover:scale-105 cursor-default"
                                style="
                                    color: {{ $skill['color'] }};
                                    background-color: {{ $skill['bg'] }};
                                    border: 1px solid {{ $skill['border'] }};
                                "
                            >
                                <span class="w-2 h-2 rounded-full flex-shrink-0" style="background-color: {{ $skill['color'] }};"></span>
                                {{ $skill['name'] }}
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Tools & Technologies -->
                <div class="fade-in">
                    <h3 class="text-2xl font-bold mb-8 text-white">Tools & Technologies</h3>

                    <div class="flex flex-wrap gap-4">
                        <div class="bg-dark-light px-6 py-3 rounded-xl shadow-md hover:shadow-lg hover:shadow-primary/20 transition-all duration-300 border border-dark-lighter">
                            <i class="fab fa-docker text-primary text-xl mr-2"></i>
                            <span class="text-gray">Docker</span>
                        </div>
                        <div class="bg-dark-light px-6 py-3 rounded-xl shadow-md hover:shadow-lg hover:shadow-primary/20 transition-all duration-300 border border-dark-lighter">
                            <i class="fab fa-git-alt text-primary text-xl mr-2"></i>
                            <span class="text-gray">Git</span>
                        </div>
                        <div class="bg-dark-light px-6 py-3 rounded-xl shadow-md hover:shadow-lg hover:shadow-primary/20 transition-all duration-300 border border-dark-lighter">
                            <i class="fab fa-aws text-primary text-xl mr-2"></i>
                            <span class="text-gray">AWS</span>
                        </div>
                        <div class="bg-dark-light px-6 py-3 rounded-xl shadow-md hover:shadow-lg hover:shadow-primary/20 transition-all duration-300 border border-dark-lighter">
                            <i class="fas fa-database text-primary text-xl mr-2"></i>
                            <span class="text-gray">MongoDB</span>
                        </div>
                        <div class="bg-dark-light px-6 py-3 rounded-xl shadow-md hover:shadow-lg hover:shadow-primary/20 transition-all duration-300 border border-dark-lighter">
                            <i class="fas fa-server text-primary text-xl mr-2"></i>
                            <span class="text-gray">PostgreSQL</span>
                        </div>
                        <div class="bg-dark-light px-6 py-3 rounded-xl shadow-md hover:shadow-lg hover:shadow-primary/20 transition-all duration-300 border border-dark-lighter">
                            <i class="fab fa-figma text-primary text-xl mr-2"></i>
                            <span class="text-gray">Figma</span>
                        </div>
                        <div class="bg-dark-light px-6 py-3 rounded-xl shadow-md hover:shadow-lg hover:shadow-primary/20 transition-all duration-300 border border-dark-lighter">
                            <i class="fas fa-terminal text-primary text-xl mr-2"></i>
                            <span class="text-gray">VS Code</span>
                        </div>
                        <div class="bg-dark-light px-6 py-3 rounded-xl shadow-md hover:shadow-lg hover:shadow-primary/20 transition-all duration-300 border border-dark-lighter">
                            <i class="fas fa-code-branch text-primary text-xl mr-2"></i>
                            <span class="text-gray">Jira</span>
                        </div>
                    </div>

                    <!-- Soft Skills -->
                    <h3 class="text-2xl font-bold mt-12 mb-6 text-white">Soft Skills</h3>

                    <div class="flex flex-wrap gap-3">
                        <span class="bg-primary/20 text-primary px-4 py-2 rounded-full border border-primary/30">Communication</span>
                        <span class="bg-primary/20 text-primary px-4 py-2 rounded-full border border-primary/30">Problem Solving</span>
                        <span class="bg-secondary/20 text-secondary px-4 py-2 rounded-full border border-secondary/30">Team Leadership</span>
                        <span class="bg-accent/20 text-accent px-4 py-2 rounded-full border border-accent/30">Time Management</span>
                        <span class="bg-primary/20 text-primary px-4 py-2 rounded-full border border-primary/30">Adaptability</span>
                        <span class="bg-secondary/20 text-secondary px-4 py-2 rounded-full border border-secondary/30">Mentoring</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-dark-light">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-white section-title fade-in">About Me</h2>

            <div class="flex flex-col md:flex-row gap-12">
                <div class="md:w-1/2 fade-in">
                    <p class="text-gray text-lg text-justify mb-6">{{ $aboutMe->description }}</p>

                    <div class="flex items-center space-x-6">
                        @if (!empty($social['github']))
                            <a href="{{ $social['github'] }}" class="text-gray hover:text-primary transition-colors duration-300 hover:scale-110 transform">
                            <i class="fab fa-github text-2xl"></i>
                        </a>
                        @endif
                        @if (!empty($social['linkedin']))
                            <a href="{{ $social['linkedin'] }}" class="text-gray hover:text-primary transition-colors duration-300 hover:scale-110 transform">
                                <i class="fab fa-linkedin text-2xl"></i>
                            </a>
                        @endif
                        @if (!empty($social['twitter']))
                            <a href="{{ $social['twitter'] }}" class="text-gray hover:text-primary transition-colors duration-300 hover:scale-110 transform">
                                <i class="fab fa-twitter text-2xl"></i>
                            </a>
                        @endif
                        @if (!empty($social['facebook']))
                            <a href="{{ $social['facebook'] }}" class="text-gray hover:text-primary transition-colors duration-300 hover:scale-110 transform">
                                <i class="fa-brands fa-facebook text-2xl"></i>
                            </a>
                        @endif
                    </div>
                </div>

                <div class="md:w-1/2 fade-in">
                    <div class="glass-effect p-8 rounded-3xl shadow-xl">
                        <h3 class="text-2xl font-bold mb-6 text-white">My Approach</h3>

                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="bg-gradient text-white p-3 rounded-full mr-4">
                                    <i class="fas fa-code"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-white mb-1">Clean & Efficient Code</h4>
                                    <p class="text-gray">Writing maintainable, well-documented code that follows best practices and design patterns.</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="bg-gradient-accent text-white p-3 rounded-full mr-4">
                                    <i class="fas fa-lightbulb"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-white mb-1">Problem Solving</h4>
                                    <p class="text-gray">Breaking down complex problems into manageable pieces and finding innovative solutions.</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="bg-gradient text-white p-3 rounded-full mr-4">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-white mb-1">Collaboration</h4>
                                    <p class="text-gray">Working effectively in teams, communicating clearly, and mentoring junior developers.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-dark relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full opacity-10">
            <div class="absolute top-1/4 left-1/4 w-64 h-64 rounded-full bg-primary/20 animate-float" style="animation-delay: 0.2s;"></div>
            <div class="absolute bottom-1/4 right-1/4 w-48 h-48 rounded-full bg-secondary/20 animate-float" style="animation-delay: 0.8s;"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold text-white section-title fade-in">Get In Touch</h2>

            <div class="max-w-4xl mx-auto">
                <div class="bg-dark-light rounded-3xl shadow-2xl overflow-hidden border border-dark-lighter">
                    <div class="md:flex">
                        <div class="md:w-1/2 bg-gradient-to-br from-primary/20 to-secondary/20 p-8 md:p-12 text-white border-r border-dark-lighter">
                            <h3 class="text-2xl font-bold mb-6">Let's work together!</h3>
                            <p class="text-gray mb-8">I'm currently open to new opportunities and interesting projects. Whether you have a question or just want to say hi, feel free to reach out.</p>

                            <div class="space-y-6">
                                <div class="flex items-center">
                                    <div class="bg-primary/20 p-3 rounded-full mr-4 border border-primary/30">
                                        <i class="fas fa-envelope text-primary"></i>
                                    </div>
                                    <div>
                                        <div class="font-bold text-white">Email</div>
                                        <div class="text-gray">sahaavilash5055@gmail.com</div>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <div class="bg-primary/20 p-3 rounded-full mr-4 border border-primary/30">
                                        <i class="fas fa-phone text-primary"></i>
                                    </div>
                                    <div>
                                        <div class="font-bold text-white">Phone</div>
                                        <div class="text-gray">+880-1777-020313</div>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <div class="bg-primary/20 p-3 rounded-full mr-4 border border-primary/30">
                                        <i class="fas fa-map-marker-alt text-primary"></i>
                                    </div>
                                    <div>
                                        <div class="font-bold text-white">Location</div>
                                        <div class="text-gray">Dhaka, Bangladesh</div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-10 flex space-x-4">
                                @if (!empty($social['linkedin']))
                                    <a href="{{ $social['linkedin'] }}" class="bg-dark text-primary p-3 rounded-full hover:bg-primary/10 transition-colors duration-300 border border-dark-lighter">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                @endif
                                @if (!empty($social['github']))
                                    <a href="{{ $social['github'] }}" class="bg-dark text-primary p-3 rounded-full hover:bg-primary/10 transition-colors duration-300 border border-dark-lighter">
                                        <i class="fab fa-github"></i>
                                    </a>
                                @endif
                                @if (!empty($social['twitter']))
                                    <a href="{{ $social['twitter'] }}" class="bg-dark text-primary p-3 rounded-full hover:bg-primary/10 transition-colors duration-300 border border-dark-lighter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                @endif
                                @if (!empty($social['facebook']))
                                    <a href="{{ $social['facebook'] }}" class="bg-dark text-primary p-3 rounded-full hover:bg-primary/10 transition-colors duration-300 border border-dark-lighter">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="md:w-1/2 p-8 md:p-12">
                            <form id="contact-form">
                                <div class="mb-6">
                                    <label class="block text-white font-medium mb-2" for="name">Name</label>
                                    <input type="text" id="name" class="w-full px-4 py-3 bg-dark border border-dark-lighter rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-white" placeholder="Your name">
                                </div>

                                <div class="mb-6">
                                    <label class="block text-white font-medium mb-2" for="email">Email</label>
                                    <input type="email" id="email" class="w-full px-4 py-3 bg-dark border border-dark-lighter rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-white" placeholder="Your email">
                                </div>

                                <div class="mb-6">
                                    <label class="block text-white font-medium mb-2" for="message">Message</label>
                                    <textarea id="message" rows="5" class="w-full px-4 py-3 bg-dark border border-dark-lighter rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-white" placeholder="Your message"></textarea>
                                </div>

                                <button type="submit" class="bg-gradient text-white w-full py-3 rounded-lg font-semibold hover:shadow-lg hover:shadow-primary/30 transition-all duration-300 flex items-center justify-center">
                                    <i class="fas fa-paper-plane mr-2"></i> Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 @endsection
