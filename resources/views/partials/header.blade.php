<!-- SHARED UNIFIED BRAND HEADER (New England Waste & Recycling) -->
<header id="site-header" class="fixed top-0 left-0 right-0 z-50 shadow-[0_2px_12px_rgba(0,0,0,0.06)] bg-white transition-all duration-200">
    <!-- Top Scroll Progress Indicator -->
    <div id="scroll-progress-bar" class="h-[3px] bg-gradient-to-r from-[#96C93D] via-[#005D2A] to-[#96C93D] w-full origin-left transform scale-x-0 transition-transform duration-75 ease-out fixed top-0 left-0 z-50 pointer-events-none" aria-hidden="true"></div>

    <!-- 1. TOP ANNOUNCEMENT & HOURS BAR -->
    <div class="bg-[#00421D] text-white border-b border-[#005D2A]/60">
        <div class="w-full px-4 sm:px-6 lg:px-8 mx-auto max-w-7xl h-9 flex items-center justify-between text-xs">
            <!-- Left: Heritage & Ownership -->
            <div class="flex items-center gap-2.5">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-[#96C93D]/20 text-[#96C93D] text-[11px] font-bold tracking-wider uppercase border border-[#96C93D]/40">
                    EST. 1979
                </span>
                <span class="text-white/85 hidden sm:inline text-[12px] font-normal tracking-wide">
                    Proudly Lancaster Family Owned &amp; Operated • New England, NSW
                </span>
            </div>

            <!-- Right: Operational Hours -->
            <div class="flex items-center gap-1.5 text-white/85 text-[12px]">
                <span class="material-symbols-outlined text-[15px] text-[#96C93D]">schedule</span>
                <span>Mon–Sat 6:30am–5:30pm</span>
            </div>
        </div>
    </div>

    <!-- 2. MAIN NAVIGATION BAR -->
    <div class="bg-white/98 backdrop-blur-md border-b border-slate-200/90">
        <div class="w-full px-4 sm:px-6 lg:px-8 mx-auto max-w-7xl h-20 flex items-center justify-between gap-4">
            
            <!-- Left: Brand Logo (Enlarged & Prominent) -->
            <div class="flex items-center gap-3 shrink-0">
                <a class="flex items-center gap-3 py-1 group focus:outline-none focus-visible:ring-2 focus-visible:ring-[#96C93D] rounded-lg" href="{{ route('home') }}" aria-label="New England Waste &amp; Recycling Home">
                    <img 
                        src="/images/logo.webp" 
                        alt="New England Waste &amp; Recycling" 
                        class="h-11 sm:h-12 w-auto object-contain transition-transform duration-200 group-hover:scale-[1.02]"
                        loading="eager"
                        onerror="this.onerror=null; this.src='https://newenglandwaste.com.au/wp-content/uploads/2026/03/cropped-3264_Logo_Horizontal-scaled-1.webp';"
                    />
                    <span class="sr-only">New England Waste &amp; Recycling</span>
                </a>
            </div>

            <!-- Center: Desktop Navigation Links (No wrapping, Single-line, Dynamic Active State) -->
            <nav class="hidden lg:flex items-center gap-2 font-medium text-sm text-slate-700" aria-label="Main Navigation">
                <!-- 1. Book Skip Bin -->
                <a 
                    href="{{ route('home') }}#booking-dock" 
                    class="px-3.5 py-2 rounded-lg transition-all duration-150 whitespace-nowrap {{ request()->routeIs('home') ? 'bg-[#F2F9E6] text-[#005D2A] font-bold border border-[#96C93D]/50 shadow-xs' : 'hover:bg-slate-100/80 hover:text-[#005D2A]' }}"
                >
                    Book Skip Bin
                </a>
                <!-- 1. Bin Size Guide -->
                <a 
                    href="{{ route('bin-guide') }}" 
                    class="px-3.5 py-2 rounded-lg transition-all duration-150 whitespace-nowrap {{ request()->routeIs('bin-guide') ? 'bg-[#F2F9E6] text-[#005D2A] font-bold border border-[#96C93D]/50 shadow-xs' : 'hover:bg-slate-100/80 hover:text-[#005D2A]' }}"
                >
                    Bin Size Guide
                </a>

                <!-- 2. Service Areas -->
                <a 
                    href="{{ route('service-areas') }}" 
                    class="px-3.5 py-2 rounded-lg transition-all duration-150 whitespace-nowrap {{ request()->routeIs('service-areas') ? 'bg-[#F2F9E6] text-[#005D2A] font-bold border border-[#96C93D]/50 shadow-xs' : 'hover:bg-slate-100/80 hover:text-[#005D2A]' }}"
                >
                    Service Areas
                </a>

                <!-- 3. EPA Waste Rules -->
                <a 
                    href="{{ route('home') }}#epa-rules-section" 
                    class="px-3.5 py-2 rounded-lg text-slate-600 hover:text-[#005D2A] hover:bg-slate-100/80 transition-all duration-150 whitespace-nowrap"
                >
                    EPA Waste Rules
                </a>
            </nav>

            <!-- Right: Primary CTA & Mobile Hamburger -->
            <div class="flex items-center gap-3 shrink-0">
                <!-- Tombol WhatsApp CTA Desktop (Hidden on Mobile) -->
                <a 
                    href="https://wa.me/61429323696?text=Hi%20New%20England%20Waste,%20I%20would%20like%20to%20enquire%20about%20a%20skip%20bin" 
                    target="_blank" 
                    rel="noopener noreferrer"
                    class="hidden sm:inline-flex items-center justify-center gap-2 px-4 py-2 rounded-lg bg-[#25D366] hover:bg-[#1EBE5D] text-white shadow-sm hover:shadow-md transition-all duration-150 text-xs sm:text-sm font-bold tracking-tight whitespace-nowrap"
                    title="Chat via WhatsApp"
                >
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.472 14.382c-.301-.15-1.78-.878-2.056-.979-.276-.1-.476-.15-.676.15-.2.301-.776.979-.951 1.179-.175.2-.351.226-.652.075-1.802-.902-2.981-1.603-4.168-3.642-.314-.541.314-.502.898-1.671.1-.2.05-.376-.025-.526-.075-.15-.676-1.63-.927-2.232-.244-.588-.493-.508-.676-.517-.175-.008-.376-.01-.576-.01-.2 0-.526.075-.802.376-.276.301-1.052 1.028-1.052 2.508 0 1.48 1.077 2.909 1.228 3.109.15.2 2.12 3.238 5.136 4.542.717.311 1.277.496 1.713.634.72.229 1.376.197 1.895.119.579-.087 1.78-.727 2.031-1.429.251-.702.251-1.304.176-1.429-.076-.125-.276-.201-.577-.351zM12.04 21.734c-1.745 0-3.456-.469-4.966-1.359l-.356-.21-3.694.969.986-3.602-.23-.367a9.704 9.704 0 0 1-1.488-5.187c0-5.367 4.366-9.733 9.738-9.733 2.6 0 5.045 1.013 6.884 2.852a9.673 9.673 0 0 1 2.85 6.882c0 5.369-4.367 9.735-9.724 9.735zM12.04 0C5.402 0 0 5.402 0 12.04c0 2.12.552 4.186 1.601 6.004L0 24l6.155-1.614a12.012 12.012 0 0 0 5.885 1.533h.005c6.638 0 12.04-5.402 12.04-12.04 0-3.217-1.253-6.242-3.528-8.518A11.96 11.96 0 0 0 12.04 0z"/>
                    </svg>
                    <span>0429 323 696</span>
                </a>

                <!-- Mobile Hamburger Toggle Button -->
                <button 
                    type="button" 
                    id="mobile-menu-toggle-btn"
                    class="lg:hidden inline-flex items-center justify-center w-11 h-11 rounded-xl bg-slate-50 hover:bg-slate-100 border border-slate-200 text-slate-700 hover:text-[#005D2A] focus:outline-none focus:ring-2 focus:ring-[#005D2A]/30 active:scale-95 transition-all cursor-pointer shadow-xs"
                    aria-label="Toggle Navigation Menu"
                    aria-expanded="false"
                    aria-controls="mobile-nav-menu"
                >
                    <span id="mobile-menu-icon-open" class="material-symbols-outlined text-[26px]">menu</span>
                    <span id="mobile-menu-icon-close" class="material-symbols-outlined text-[26px] hidden">close</span>
                </button>
            </div>
        </div>
    </div>

    <!-- 3. MOBILE RESPONSIVE DRAWER / DROPDOWN -->
    <div 
        id="mobile-nav-menu" 
        class="hidden lg:hidden bg-white border-b border-slate-200 shadow-xl overflow-hidden transition-all duration-200"
    >
        <div class="px-4 pt-3 pb-6 space-y-2.5">
            <!-- Nav Links -->

            <!-- 1. Book Skip Bin -->
            <a 
                href="{{ route('home') }}#booking-dock" 
                class="flex items-center justify-between px-4 py-3 rounded-lg text-sm font-semibold {{ request()->routeIs('home') ? 'bg-[#F2F9E6] text-[#005D2A] border border-[#96C93D]/40' : 'text-slate-700 hover:bg-slate-50' }}"
            >
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-[20px] text-[#005D2A]">local_shipping</span>
                    <span>Book Skip Bin</span>
                </div>
                <span class="material-symbols-outlined text-[18px] text-slate-400">arrow_forward</span>
            </a>

            <a 
                href="{{ route('bin-guide') }}" 
                class="flex items-center justify-between px-4 py-3 rounded-lg text-sm font-semibold {{ request()->routeIs('bin-guide') ? 'bg-[#F2F9E6] text-[#005D2A] border border-[#96C93D]/40' : 'text-slate-700 hover:bg-slate-50' }}"
            >
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-[20px] text-[#005D2A]">view_in_ar</span>
                    <span>Bin Size Guide</span>
                </div>
                <span class="material-symbols-outlined text-[18px] text-slate-400">arrow_forward</span>
            </a>

            <a 
                href="{{ route('service-areas') }}" 
                class="flex items-center justify-between px-4 py-3 rounded-lg text-sm font-semibold {{ request()->routeIs('service-areas') ? 'bg-[#F2F9E6] text-[#005D2A] border border-[#96C93D]/40' : 'text-slate-700 hover:bg-slate-50' }}"
            >
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-[20px] text-[#005D2A]">map</span>
                    <span>Service Areas</span>
                </div>
                <span class="material-symbols-outlined text-[18px] text-slate-400">arrow_forward</span>
            </a>

            <a 
                href="{{ route('home') }}#epa-rules-section" 
                class="flex items-center justify-between px-4 py-3 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50"
            >
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-[20px] text-[#005D2A]">verified</span>
                    <span>EPA Waste Rules &amp; Compliance</span>
                </div>
                <span class="material-symbols-outlined text-[18px] text-slate-400">arrow_forward</span>
            </a>

            <div class="pt-2 flex flex-col gap-2">
                <!-- Direct Phone Call CTA -->
                <a 
                    href="tel:0429323696" 
                    class="flex items-center justify-center gap-2 w-full py-3 px-4 rounded-lg bg-[#005D2A] hover:bg-[#00421D] active:scale-95 text-white font-bold text-sm shadow-sm transition-all cursor-pointer"
                >
                    <span class="material-symbols-outlined text-[20px]">call</span>
                    <span>Call Dispatch: 0429 323 696</span>
                </a>

                <!-- WhatsApp CTA -->
                <a 
                    href="https://wa.me/61429323696?text=Hi%20New%20England%20Waste,%20I%20would%20like%20to%20enquire%20about%20a%20skip%20bin" 
                    target="_blank" 
                    rel="noopener noreferrer"
                    class="flex items-center justify-center gap-2 w-full py-3 px-4 rounded-lg bg-[#25D366] hover:bg-[#1EBE5D] active:scale-95 text-white font-bold text-sm shadow-sm transition-all cursor-pointer"
                >
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.472 14.382c-.301-.15-1.78-.878-2.056-.979-.276-.1-.476-.15-.676.15-.2.301-.776.979-.951 1.179-.175.2-.351.226-.652.075-1.802-.902-2.981-1.603-4.168-3.642-.314-.541.314-.502.898-1.671.1-.2.05-.376-.025-.526-.075-.15-.676-1.63-.927-2.232-.244-.588-.493-.508-.676-.517-.175-.008-.376-.01-.576-.01-.2 0-.526.075-.802.376-.276.301-1.052 1.028-1.052 2.508 0 1.48 1.077 2.909 1.228 3.109.15.2 2.12 3.238 5.136 4.542.717.311 1.277.496 1.713.634.72.229 1.376.197 1.895.119.579-.087 1.78-.727 2.031-1.429.251-.702.251-1.304.176-1.429-.076-.125-.276-.201-.577-.351zM12.04 21.734c-1.745 0-3.456-.469-4.966-1.359l-.356-.21-3.694.969.986-3.602-.23-.367a9.704 9.704 0 0 1-1.488-5.187c0-5.367 4.366-9.733 9.738-9.733 2.6 0 5.045 1.013 6.884 2.852a9.673 9.673 0 0 1 2.85 6.882c0 5.369-4.367 9.735-9.724 9.735zM12.04 0C5.402 0 0 5.402 0 12.04c0 2.12.552 4.186 1.601 6.004L0 24l6.155-1.614a12.012 12.012 0 0 0 5.885 1.533h.005c6.638 0 12.04-5.402 12.04-12.04 0-3.217-1.253-6.242-3.528-8.518A11.96 11.96 0 0 0 12.04 0z"/>
                    </svg>
                    <span>Chat WhatsApp: 0429 323 696</span>
                </a>
            </div>

            <p class="text-center text-xs text-slate-600 font-medium mt-2">
                Mon–Sat 6:30am–5:30pm • Same-Day Armidale Dispatch
            </p>
        </div>
    </div>
    </div>
</header>

<!-- Floating Back to Top Button -->
<button 
    type="button" 
    id="back-to-top-btn"
    onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
    class="fixed bottom-6 right-6 z-40 p-3 rounded-full bg-[#005D2A] text-white shadow-lg hover:bg-[#00421D] hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-[#96C93D] transition-all duration-200 transform translate-y-4 opacity-0 pointer-events-none flex items-center justify-center cursor-pointer group"
    aria-label="Scroll back to top"
>
    <span class="material-symbols-outlined text-[20px] transition-transform duration-150 group-hover:-translate-y-0.5">arrow_upward</span>
</button>

<!-- Header & Scroll Experience Script -->
<script>
    (function() {
        const toggleBtn = document.getElementById('mobile-menu-toggle-btn');
        const mobileMenu = document.getElementById('mobile-nav-menu');
        const iconOpen = document.getElementById('mobile-menu-icon-open');
        const iconClose = document.getElementById('mobile-menu-icon-close');
        const progressBar = document.getElementById('scroll-progress-bar');
        const siteHeader = document.getElementById('site-header');
        const backToTopBtn = document.getElementById('back-to-top-btn');

        if (toggleBtn && mobileMenu) {
            toggleBtn.addEventListener('click', function() {
                const isExpanded = toggleBtn.getAttribute('aria-expanded') === 'true';
                toggleBtn.setAttribute('aria-expanded', !isExpanded);
                mobileMenu.classList.toggle('hidden');
                if (iconOpen && iconClose) {
                    iconOpen.classList.toggle('hidden');
                    iconClose.classList.toggle('hidden');
                }
            });

            // Close mobile menu when clicking any mobile link
            mobileMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    toggleBtn.setAttribute('aria-expanded', 'false');
                    if (iconOpen && iconClose) {
                        iconOpen.classList.remove('hidden');
                        iconClose.classList.add('hidden');
                    }
                });
            });
        }

        // Scroll-driven progress indicator, header elevation & back-to-top button
        function onWindowScroll() {
            const scrollY = window.scrollY;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;

            if (progressBar && docHeight > 0) {
                const progress = Math.min(Math.max(scrollY / docHeight, 0), 1);
                progressBar.style.transform = `scaleX(${progress})`;
            }

            if (siteHeader) {
                if (scrollY > 20) {
                    siteHeader.classList.add('shadow-md', 'backdrop-blur-lg');
                } else {
                    siteHeader.classList.remove('shadow-md');
                }
            }

            if (backToTopBtn) {
                if (scrollY > 400) {
                    backToTopBtn.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-4');
                    backToTopBtn.classList.add('opacity-100', 'translate-y-0');
                } else {
                    backToTopBtn.classList.add('opacity-0', 'pointer-events-none', 'translate-y-4');
                    backToTopBtn.classList.remove('opacity-100', 'translate-y-0');
                }
            }
        }

        window.addEventListener('scroll', onWindowScroll, { passive: true });
        onWindowScroll();
    })();
</script>
