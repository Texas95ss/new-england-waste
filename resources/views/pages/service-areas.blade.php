<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=5.0" name="viewport"/>
    <meta name="theme-color" content="#005D2A"/>
    <link rel="icon" type="image/webp" href="/images/logo.webp"/>
    <title>Service Areas &amp; Regional Logistics Map | New England Waste NSW</title>

    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;600;700;800&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>

    <style>
        @layer base {
            html, body { margin: 0; padding: 0; }
            body { overscroll-behavior-y: auto; }
            .pb-safe { padding-bottom: env(safe-area-inset-bottom, 0px); }
            .pt-safe { padding-top: env(safe-area-inset-top, 0px); }
            main > :first-child { margin-top: 0 !important; }
            main > :last-child { margin-bottom: 0 !important; }
        }
        .scrollbar-none::-webkit-scrollbar { display: none; }
        .scrollbar-none { -ms-overflow-style: none; scrollbar-width: none; }
        
        @keyframes pulse-ring {
            0% { transform: scale(0.92); opacity: 0.85; }
            50% { transform: scale(1.35); opacity: 0.15; }
            100% { transform: scale(0.92); opacity: 0.85; }
        }
        .hub-pulse {
            transform-origin: center;
            animation: pulse-ring 2.4s infinite cubic-bezier(0.4, 0, 0.6, 1);
        }
        .hub-pulse-delayed {
            transform-origin: center;
            animation: pulse-ring 2.4s infinite cubic-bezier(0.4, 0, 0.6, 1) 1.2s;
        }

        .map-node {
            transition: all 0.25s ease;
            cursor: pointer;
        }
        .map-node:hover circle.marker-dot {
            fill: #96C93D;
            r: 9;
        }
        .map-node.active-node circle.marker-dot {
            fill: #96C93D;
            stroke: #005D2A;
            stroke-width: 3;
            r: 10;
        }
        .map-node.active-node text {
            font-weight: 800;
            fill: #005D2A;
        }

        /* Two-way table-map interaction */
        tr.town-row {
            transition: background-color 0.2s ease, box-shadow 0.2s ease;
            cursor: pointer;
        }
        tr.town-row.active-row {
            background-color: #F2F9E6 !important;
            box-shadow: inset 3px 0 0 #005D2A;
        }

        /* Scroll-reveal system */
        [data-scroll-reveal] {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.6s cubic-bezier(0.16, 1, 0.3, 1), transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }
        [data-scroll-reveal].revealed {
            opacity: 1;
            transform: translateY(0);
        }
        @media (prefers-reduced-motion: reduce) {
            [data-scroll-reveal] {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
            }
            .hub-pulse, .hub-pulse-delayed {
                animation: none !important;
            }
        }
    </style>

    <script src="https://cdn.tailwindcss.com"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        // Official New England Waste Brand Palette (newenglandwaste.com.au)
                        "primary": "#005D2A",               // Signature deep heritage green
                        "primary-dark": "#00421D",          // Deep forest green (topbar & hover)
                        "primary-container": "#00421D",     // High contrast dark container
                        "brand-primary": "#005D2A",         // Cross-page unified alias
                        "brand-primary-dark": "#00421D",    // Cross-page unified alias
                        "brand-forest-deep": "#00421D",     // Deep forest green
                        "brand-forest": "#00421D",          // Deep forest green alias

                        // Brand Lime Accents & Status Tints
                        "secondary": "#005D2A",             // Interactive accent green
                        "secondary-container": "#F2F9E6",   // Soft lime container
                        "secondary-fixed": "#96C93D",       // Brand lime accent
                        "brand-lime": "#96C93D",            // Official lime (#96C93D)
                        "brand-lime-hover": "#86AA37",      // Hover lime
                        "brand-lime-light": "#F2F9E6",      // Soft lime tint
                        "heritage-lime-legacy": "#96C93D",  // Brand lime alias
                        "bio-emerald-light": "#F2F9E6",     // Soft lime/emerald wash

                        // Neutrals, Surfaces & High-Contrast Typography
                        "text-charcoal-primary": "#0F172A", // Slate 900 primary text
                        "text-slate-muted": "#334155",      // Slate 700 (high contrast readability)
                        "brand-dark": "#0F172A",            // Slate 900 alias
                        "text-muted": "#334155",            // Slate 700 alias
                        "surface-white": "#FFFFFF",         // Crisp white card surface
                        "surface-slate": "#F8FAFC",         // Clean slate-50 background
                        "surface-container": "#F1F5F9",     // Slate 100 neutral container
                        "surface-container-low": "#F8FAFC", // Slate 50 low container
                        "surface-container-high": "#E2E8F0",// Slate 200 high container
                        "border-slate-subtle": "#E2E8F0",   // Slate 200 subtle divider
                        "border-slate-medium": "#CBD5E1",   // Slate 300 medium border
                        "border-subtle": "#CBD5E1",         // Border alias

                        // Safety, Compliance & System States
                        "safety-amber": "#D97706",          // Amber 600 warning
                        "safety-amber-light": "#FEF3C7",    // Amber 100 warning wash
                        "safety-amber-dark": "#B45309",     // Amber 700 warning text
                        "error": "#DC2626",                 // Red 600
                        "error-container": "#FEE2E2",       // Red 100
                        "on-primary": "#FFFFFF",
                        "on-secondary": "#FFFFFF",
                        "on-secondary-fixed": "#00421D",
                        "primary-fixed": "#96C93D"
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "2xl": "1rem",
                        "full": "9999px"
                    },
                    fontFamily: {
                        "headline-xl": ["Outfit", "sans-serif"],
                        "headline-lg": ["Outfit", "sans-serif"],
                        "headline-md": ["Outfit", "sans-serif"],
                        "headline-sm": ["Outfit", "sans-serif"],
                        "numeric-metric": ["Outfit", "sans-serif"],
                        "body-lg": ["Inter", "sans-serif"],
                        "body-md": ["Inter", "sans-serif"],
                        "body-sm": ["Inter", "sans-serif"],
                        "label-lg": ["Inter", "sans-serif"],
                        "label-md": ["Inter", "sans-serif"]
                    }
                }
            }
        };
    </script>
</head>
<body class="bg-surface-slate font-body-md text-brand-dark antialiased flex flex-col min-h-screen">

    <!-- SHARED BRAND HEADER -->
    @include('partials.header')

    <!-- MAIN CONTENT -->
    <main class="flex-1 flex flex-col relative w-full pt-[116px] pb-20 bg-[#F8FAFC]">
        <div class="flex flex-col w-full">

            <!-- 1. BREADCRUMB -->
            <section class="w-full px-4 md:px-8 pt-6 pb-2 max-w-7xl mx-auto">
                <nav class="flex items-center gap-2 text-text-muted font-label-md text-xs">
                    <a class="hover:text-brand-primary transition-colors flex items-center gap-1" href="{{ route('home') }}">
                        <span class="material-symbols-outlined text-[16px]">home</span>
                        <span>Home</span>
                    </a>
                    <span class="text-border-subtle font-medium">/</span>
                    <span class="text-brand-primary font-semibold">Service Areas &amp; Regional Logistics Map</span>
                </nav>
            </section>

            <!-- 2. HERO HEADER & FAST POSTCODE CHECKER -->
            <section class="w-full px-4 md:px-8 pt-3 pb-6 max-w-7xl mx-auto">
                <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
                    <div class="max-w-3xl">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-brand-lime-light text-brand-primary border border-brand-lime/40 font-label-md text-xs mb-3 font-bold">
                            <span class="w-2 h-2 rounded-full bg-brand-primary animate-pulse"></span>
                            <span>Direct High Country Fleet Dispatch • Armidale &amp; Glen Innes Depots</span>
                        </div>
                        <h1 class="font-headline-xl text-3xl sm:text-4xl lg:text-[42px] text-brand-primary tracking-tight font-extrabold leading-[1.15]">
                            Service Areas &amp; Delivery Logistics Map
                        </h1>
                        <p class="mt-2.5 font-body-lg text-base sm:text-lg text-text-muted max-w-2xl leading-relaxed">
                            Serving the New England tablelands since 1979. Daily scheduled routes, upfront fees, and 7-day standard hire across 12 key districts.
                        </p>
                    </div>

                    <!-- Instant Postcode / Town Finder Search -->
                    <div class="lg:w-96 bg-surface-white border border-border-subtle p-4 rounded-xl shadow-xs">
                        <label class="block text-xs font-bold uppercase tracking-wider text-brand-primary mb-1.5 flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-[16px] text-brand-lime">location_searching</span>
                            <span>Quick Town or Postcode Lookup</span>
                        </label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-text-muted pointer-events-none text-[18px]">search</span>
                            <input 
                                type="text" 
                                id="quick-search-input" 
                                placeholder="e.g. Uralla, 2350, Guyra..." 
                                inputmode="search"
                                autocomplete="postal-code"
                                class="w-full h-11 pl-9 pr-3 rounded-lg bg-surface-slate border border-border-subtle text-base sm:text-xs text-brand-dark placeholder-text-muted focus:bg-white focus:ring-2 focus:ring-brand-primary focus:outline-none transition-all font-medium"
                                oninput="handleQuickSearch(this.value)"
                            />
                        </div>
                        <p class="text-xs text-text-muted font-medium mt-2">
                            Type a town or postcode to locate it on the transit map below.
                        </p>
                    </div>
                </div>
            </section>

            <!-- 3. SIMPLIFIED INTERACTIVE REGIONAL VECTOR MAP & LIVE INSPECTOR -->
            <section class="w-full px-4 md:px-8 py-2 max-w-7xl mx-auto" data-scroll-reveal="fade-up">
                <div class="bg-surface-white rounded-2xl shadow-sm border border-border-subtle overflow-hidden">
                    
                    <!-- Map Dashboard Header -->
                    <div class="p-4 sm:p-5 border-b border-border-subtle bg-surface-slate flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-brand-lime animate-pulse"></span>
                                <h2 class="font-headline-sm text-lg font-bold text-brand-primary">
                                    New England Highway Regional Corridor &amp; Depot Coverage
                                </h2>
                            </div>
                            <p class="text-xs text-text-muted mt-0.5">
                                Daily transit route map. Click any pin to inspect delivery schedules and fees.
                            </p>
                        </div>

                        <!-- Map Legend -->
                        <div class="flex flex-wrap items-center gap-3 text-xs">
                            <span class="flex items-center gap-1.5 font-semibold text-brand-primary">
                                <span class="w-3.5 h-3.5 rounded-full bg-brand-primary border border-white flex items-center justify-center text-[9px] text-white font-bold">H</span>
                                <span>Operating Depot Hub</span>
                            </span>
                            <span class="flex items-center gap-1.5 font-semibold text-text-muted">
                                <span class="w-3 h-3 rounded-full bg-brand-lime border border-brand-primary"></span>
                                <span>Zone 1: Free Local Route</span>
                            </span>
                            <span class="flex items-center gap-1.5 font-semibold text-text-muted">
                                <span class="w-3 h-3 rounded-full bg-brand-primary"></span>
                                <span>Zone 2 &amp; 3: Regional Express</span>
                            </span>
                            <button onclick="selectLocation('Armidale')" class="px-2.5 py-1 rounded bg-surface-white border border-border-subtle hover:bg-surface-slate text-xs font-semibold text-brand-primary shadow-2xs transition-colors cursor-pointer flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">my_location</span>
                                <span>Center Armidale</span>
                            </button>
                        </div>
                    </div>

                    <!-- Split Layout: Regional Vector Map (Left) + Live Inspector Panel (Right) -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-0">
                        
                        <!-- Left: High-Precision Clean Vector Transit Map (No 3rd party tile watermarks) -->
                        <div class="lg:col-span-8 p-4 sm:p-6 bg-[#FAFCF8] flex items-center justify-center border-b lg:border-b-0 lg:border-r border-border-subtle relative min-h-[480px]">
                            
                            <!-- Background Map Watermark Grid -->
                            <div class="absolute inset-0 bg-[radial-gradient(#96C93D_1px,transparent_1px)] [background-size:24px_24px] opacity-15 pointer-events-none"></div>

                            <svg id="regional-vector-map" class="w-full h-auto max-h-[560px] drop-shadow-xs" viewBox="0 0 740 580" fill="none" xmlns="http://www.w3.org/2000/svg">
                                
                                <!-- Background Great Dividing Range Relief / Soft Boundary Area -->
                                <path d="M 120,40 C 260,20 480,30 620,60 C 650,180 630,360 590,520 C 450,550 240,540 130,480 C 90,320 100,160 120,40 Z" fill="#F0FDF4" stroke="#D1E7DD" stroke-width="1.5" stroke-dasharray="4 4" />
                                
                                <!-- Zone 1 Free Delivery Radius Envelope (Around Armidale) -->
                                <circle cx="340" cy="350" r="100" fill="#96C93D" fill-opacity="0.12" stroke="#96C93D" stroke-width="1.5" stroke-dasharray="3 3" />
                                <text x="445" y="345" fill="#005D2A" font-family="Inter" font-size="10" font-weight="700" letter-spacing="0.5">ZONE 1: FREE DEPOT RUN</text>

                                <!-- Zone Northern Hub Envelope (Around Glen Innes) -->
                                <circle cx="390" cy="150" r="85" fill="#005D2A" fill-opacity="0.08" stroke="#005D2A" stroke-width="1.5" stroke-dasharray="3 3" />
                                <text x="480" y="145" fill="#005D2A" font-family="Inter" font-size="10" font-weight="700" letter-spacing="0.5">NORTHERN MRF HUB</text>

                                <!-- Arterial Highway Backbone (New England Highway - Route 15) -->
                                <path d="M 460,50 L 420,105 L 390,150 L 370,230 L 360,285 L 340,350 L 310,420 L 290,470 L 320,530" stroke="#CBD5E1" stroke-width="8" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M 460,50 L 420,105 L 390,150 L 370,230 L 360,285 L 340,350 L 310,420 L 290,470 L 320,530" stroke="#005D2A" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                                
                                <!-- Branch Highway Links -->
                                <!-- Bundarra Rd to Invergowrie -->
                                <line x1="340" y1="350" x2="230" y2="335" stroke="#96C93D" stroke-width="2.5" stroke-dasharray="4 2" />
                                <!-- Dangarsleigh Rd -->
                                <line x1="340" y1="350" x2="360" y2="395" stroke="#96C93D" stroke-width="2.5" stroke-dasharray="4 2" />
                                <!-- Grafton Rd to Hillgrove -->
                                <line x1="340" y1="350" x2="480" y2="365" stroke="#005D2A" stroke-width="2" stroke-dasharray="3 2" />
                                <!-- Oxley Hwy to Walcha -->
                                <line x1="310" y1="420" x2="320" y2="530" stroke="#005D2A" stroke-width="3" />

                                <!-- Highway Label -->
                                <rect x="375" y="250" width="85" height="18" rx="4" fill="#005D2A" />
                                <text x="417" y="263" fill="#FFFFFF" font-family="Inter" font-size="9" font-weight="700" text-anchor="middle">NEW ENGLAND HWY</text>

                                <!-- 1. TENTERFIELD (Top) -->
                                <g id="pin-Tenterfield" class="map-node cursor-pointer" onclick="selectLocation('Tenterfield', true)">
                                    <circle class="marker-dot" cx="460" cy="50" r="7" fill="#005D2A" stroke="#FFFFFF" stroke-width="2" />
                                    <text x="475" y="54" fill="#0F172A" font-family="Outfit" font-size="12" font-weight="600">Tenterfield (NSW 2372)</text>
                                    <text x="475" y="66" fill="#48514D" font-family="Inter" font-size="10">Border Gateway Run</text>
                                </g>

                                <!-- 2. DEEPWATER -->
                                <g id="pin-Deepwater" class="map-node cursor-pointer" onclick="selectLocation('Deepwater', true)">
                                    <circle class="marker-dot" cx="420" cy="105" r="7" fill="#005D2A" stroke="#FFFFFF" stroke-width="2" />
                                    <text x="435" y="108" fill="#0F172A" font-family="Outfit" font-size="12" font-weight="600">Deepwater (NSW 2371)</text>
                                    <text x="435" y="120" fill="#48514D" font-family="Inter" font-size="10">Weekly Transit Route</text>
                                </g>

                                <!-- 3. GLEN INNES (HUB 2) -->
                                <g id="pin-Glen-Innes" class="map-node active-node cursor-pointer" onclick="selectLocation('Glen Innes', true)">
                                    <circle class="hub-pulse" cx="390" cy="150" r="20" fill="#005D2A" fill-opacity="0.25" />
                                    <circle class="hub-pulse-delayed" cx="390" cy="150" r="28" fill="#005D2A" fill-opacity="0.12" />
                                    <circle class="marker-dot" cx="390" cy="150" r="11" fill="#005D2A" stroke="#96C93D" stroke-width="3" />
                                    <text x="390" y="154" fill="#FFFFFF" font-family="Inter" font-size="9" font-weight="800" text-anchor="middle">H2</text>
                                    <text x="375" y="172" fill="#005D2A" font-family="Outfit" font-size="13" font-weight="700" text-anchor="end">Glen Innes (NSW 2370)</text>
                                    <text x="375" y="184" fill="#96C93D" font-family="Inter" font-size="10" font-weight="700" text-anchor="end">Northern MRF Depot</text>
                                </g>

                                <!-- 4. GUYRA -->
                                <g id="pin-Guyra" class="map-node cursor-pointer" onclick="selectLocation('Guyra', true)">
                                    <circle class="marker-dot" cx="370" cy="230" r="7.5" fill="#005D2A" stroke="#FFFFFF" stroke-width="2" />
                                    <text x="355" y="233" fill="#0F172A" font-family="Outfit" font-size="12" font-weight="600" text-anchor="end">Guyra (NSW 2365)</text>
                                    <text x="355" y="245" fill="#48514D" font-family="Inter" font-size="10" text-anchor="end">Daily High Country Run</text>
                                </g>

                                <!-- 5. BLACK MOUNTAIN -->
                                <g id="pin-Black-Mountain" class="map-node cursor-pointer" onclick="selectLocation('Black Mountain', true)">
                                    <circle class="marker-dot" cx="360" cy="285" r="7" fill="#005D2A" stroke="#FFFFFF" stroke-width="2" />
                                    <text x="375" y="288" fill="#0F172A" font-family="Outfit" font-size="12" font-weight="600">Black Mountain (NSW 2365)</text>
                                    <text x="375" y="300" fill="#48514D" font-family="Inter" font-size="10">Highway Corridor</text>
                                </g>

                                <!-- 6. INVERGOWRIE (West of Armidale) -->
                                <g id="pin-Invergowrie" class="map-node cursor-pointer" onclick="selectLocation('Invergowrie', true)">
                                    <circle class="marker-dot" cx="230" cy="335" r="7" fill="#96C93D" stroke="#005D2A" stroke-width="2" />
                                    <text x="220" y="338" fill="#0F172A" font-family="Outfit" font-size="12" font-weight="600" text-anchor="end">Invergowrie (2350)</text>
                                    <text x="220" y="350" fill="#005D2A" font-family="Inter" font-size="10" font-weight="600" text-anchor="end">Acreage Estate</text>
                                </g>

                                <!-- 7. ARMIDALE (CENTRAL HQ - HUB 1) -->
                                <g id="pin-Armidale" class="map-node active-node cursor-pointer" onclick="selectLocation('Armidale', true)">
                                    <circle class="hub-pulse" cx="340" cy="350" r="24" fill="#96C93D" fill-opacity="0.3" />
                                    <circle class="hub-pulse-delayed" cx="340" cy="350" r="34" fill="#96C93D" fill-opacity="0.15" />
                                    <circle class="marker-dot" cx="340" cy="350" r="12" fill="#005D2A" stroke="#96C93D" stroke-width="3" />
                                    <text x="340" y="354" fill="#FFFFFF" font-family="Inter" font-size="10" font-weight="800" text-anchor="middle">HQ</text>
                                    <text x="340" y="380" fill="#005D2A" font-family="Outfit" font-size="15" font-weight="800" text-anchor="middle">ARMIDALE (NSW 2350)</text>
                                    <text x="340" y="394" fill="#96C93D" font-family="Inter" font-size="11" font-weight="700" text-anchor="middle">Central Fleet Depot • FREE Local Zone</text>
                                </g>

                                <!-- 8. DANGARSLEIGH (South of Armidale) -->
                                <g id="pin-Dangarsleigh" class="map-node cursor-pointer" onclick="selectLocation('Dangarsleigh', true)">
                                    <circle class="marker-dot" cx="360" cy="395" r="7" fill="#96C93D" stroke="#005D2A" stroke-width="2" />
                                    <text x="375" y="402" fill="#0F172A" font-family="Outfit" font-size="12" font-weight="600">Dangarsleigh (2350)</text>
                                    <text x="375" y="414" fill="#005D2A" font-family="Inter" font-size="10">Escarpment Farm Route</text>
                                </g>

                                <!-- 9. HILLGROVE (East) -->
                                <g id="pin-Hillgrove" class="map-node cursor-pointer" onclick="selectLocation('Hillgrove', true)">
                                    <circle class="marker-dot" cx="480" cy="365" r="7" fill="#005D2A" stroke="#FFFFFF" stroke-width="2" />
                                    <text x="495" y="368" fill="#0F172A" font-family="Outfit" font-size="12" font-weight="600">Hillgrove (NSW 2350)</text>
                                    <text x="495" y="380" fill="#48514D" font-family="Inter" font-size="10">Eastern Rural Gorge</text>
                                </g>

                                <!-- 10. URALLA -->
                                <g id="pin-Uralla" class="map-node cursor-pointer" onclick="selectLocation('Uralla', true)">
                                    <circle class="marker-dot" cx="310" cy="420" r="8" fill="#005D2A" stroke="#96C93D" stroke-width="2" />
                                    <text x="295" y="423" fill="#005D2A" font-family="Outfit" font-size="13" font-weight="700" text-anchor="end">Uralla (NSW 2358)</text>
                                    <text x="295" y="435" fill="#48514D" font-family="Inter" font-size="10" text-anchor="end">Daily Express Route (22km)</text>
                                </g>

                                <!-- 11. KENTUCKY -->
                                <g id="pin-Kentucky" class="map-node cursor-pointer" onclick="selectLocation('Kentucky', true)">
                                    <circle class="marker-dot" cx="290" cy="470" r="7" fill="#005D2A" stroke="#FFFFFF" stroke-width="2" />
                                    <text x="275" y="473" fill="#0F172A" font-family="Outfit" font-size="12" font-weight="600" text-anchor="end">Kentucky (NSW 2354)</text>
                                    <text x="275" y="485" fill="#48514D" font-family="Inter" font-size="10" text-anchor="end">Orchard &amp; Farm Acreage</text>
                                </g>

                                <!-- 12. WALCHA (South) -->
                                <g id="pin-Walcha" class="map-node cursor-pointer" onclick="selectLocation('Walcha', true)">
                                    <circle class="marker-dot" cx="320" cy="530" r="8" fill="#005D2A" stroke="#FFFFFF" stroke-width="2" />
                                    <text x="335" y="533" fill="#0F172A" font-family="Outfit" font-size="13" font-weight="700">Walcha (NSW 2354)</text>
                                    <text x="335" y="545" fill="#48514D" font-family="Inter" font-size="10">Tue, Thu &amp; Sat Pastoral Run</text>
                                </g>

                            </svg>

                            <!-- Mobile Tap Helper Hint -->
                            <div class="absolute bottom-3 left-3 bg-surface-white/95 px-3 py-1.5 rounded-lg border border-border-subtle shadow-xs text-xs text-text-muted font-medium flex items-center gap-1.5 pointer-events-none">
                                <span class="material-symbols-outlined text-[15px] text-brand-primary">touch_app</span>
                                <span>Click any town name to view live dispatch specs</span>
                            </div>
                        </div>

                        <!-- Right: Live Suburb & Dispatch Inspector Card -->
                        <div class="lg:col-span-4 p-5 sm:p-7 flex flex-col justify-between bg-surface-white">
                            <div>
                                <div class="flex items-center justify-between gap-2 pb-3 border-b border-border-subtle">
                                    <div>
                                        <span id="inspect-zone-badge" class="px-2.5 py-0.5 rounded-full bg-brand-lime-light text-brand-primary border border-brand-lime/40 text-xs font-bold uppercase tracking-wide">
                                            Central Operating Depot
                                        </span>
                                        <h3 id="inspect-town-title" class="font-headline-md text-2xl font-bold text-brand-primary mt-1.5 leading-tight">
                                            Armidale, NSW
                                        </h3>
                                    </div>
                                    <span id="inspect-postcode" class="px-2.5 py-1 rounded bg-surface-slate text-brand-dark font-mono text-xs font-bold border border-border-subtle">
                                        2350
                                    </span>
                                </div>

                                <p id="inspect-description" class="text-xs text-text-muted mt-3.5 leading-relaxed">
                                    Armidale CBD, UNE campus, North Hill, South Hill, and industrial precincts. Daily same-day dispatch from our central logistics headquarters.
                                </p>

                                <!-- Live Metrics Box -->
                                <div class="mt-5 space-y-3 bg-surface-slate p-4 rounded-xl border border-border-subtle text-xs">
                                    <div class="flex items-center justify-between">
                                        <span class="text-text-muted flex items-center gap-1.5">
                                            <span class="material-symbols-outlined text-[16px] text-brand-primary">payments</span>
                                            <span>Delivery Surcharge:</span>
                                        </span>
                                        <span id="inspect-fee" class="font-extrabold text-brand-primary text-sm">
                                            FREE (Direct Depot)
                                        </span>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <span class="text-text-muted flex items-center gap-1.5">
                                            <span class="material-symbols-outlined text-[16px] text-brand-primary">calendar_today</span>
                                            <span>Fleet Schedule:</span>
                                        </span>
                                        <span id="inspect-schedule" class="font-bold text-brand-dark">
                                            Daily Mon–Sat (Same-Day)
                                        </span>
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <span class="text-text-muted flex items-center gap-1.5">
                                            <span class="material-symbols-outlined text-[16px] text-brand-primary">schedule</span>
                                            <span>Standard Turnaround:</span>
                                        </span>
                                        <span id="inspect-turnaround" class="font-semibold text-text-muted">
                                            Within 2–4 hours
                                        </span>
                                    </div>

                                    <div class="flex items-center justify-between py-1.5">
                                        <span class="text-text-muted flex items-center gap-1.5">
                                            <span class="material-symbols-outlined text-[16px] text-brand-primary">delete</span>
                                            <span>Available Capacities:</span>
                                        </span>
                                        <span class="font-bold text-brand-primary">
                                            All 7 Sizes (2m³ to 12m³)
                                        </span>
                                    </div>
                                </div>

                                <!-- Trust Note -->
                                <div class="mt-4 p-3 rounded-lg bg-brand-lime-light/60 border border-brand-lime/30 text-xs text-brand-primary font-semibold flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[18px] text-brand-primary shrink-0">verified_user</span>
                                    <span>No hidden tip fees or excess transport surcharges at drop-off.</span>
                                </div>
                            </div>

                            <!-- Inspector Action Buttons -->
                            <div class="mt-6 pt-4 border-t border-border-subtle flex flex-col gap-2.5">
                                <a 
                                    id="inspect-book-btn"
                                    href="{{ route('home') }}" 
                                    class="w-full py-3 px-4 rounded-lg bg-brand-primary hover:bg-brand-primary-dark text-white font-headline-sm text-sm font-bold text-center flex items-center justify-center gap-2 transition-all shadow-sm"
                                >
                                    <span>Book Skip for Armidale</span>
                                    <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                                </a>

                                <a 
                                    href="tel:0429323696" 
                                    class="w-full py-2.5 px-4 rounded-lg bg-surface-slate hover:bg-slate-200 text-brand-dark font-label-md text-xs font-semibold text-center flex items-center justify-center gap-1.5 transition-colors border border-border-subtle"
                                >
                                    <span class="material-symbols-outlined text-[16px] text-brand-primary">call</span>
                                    <span>Call Local Dispatch: 0429 323 696</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- 4. COMPACT 3-ZONE SERVICE MATRIX (REPLACES THE 12 MESSY CARDS) -->
            <section class="w-full px-4 md:px-8 py-10 max-w-7xl mx-auto" data-scroll-reveal="fade-up">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-6">
                    <div>
                        <span class="font-label-md text-xs uppercase tracking-wider text-brand-primary font-bold">Transparent Delivery Schedule</span>
                        <h2 class="font-headline-lg text-2xl font-bold text-brand-primary mt-0.5">
                            New England 3-Zone Delivery Matrix
                        </h2>
                        <p class="font-body-md text-xs sm:text-sm text-text-muted mt-1">
                            Compact overview of all 12 regional destinations. Select any town to book online or confirm transit times.
                        </p>
                    </div>

                    <!-- Category Pills -->
                    <div class="flex items-center gap-2 text-xs font-semibold">
                        <span class="px-3 py-1 rounded-full bg-brand-lime-light text-brand-primary border border-brand-lime/40">Zone 1: Free Depot</span>
                        <span class="px-3 py-1 rounded-full bg-surface-slate text-brand-dark border border-border-subtle">Zone 2: Regional Express</span>
                        <span class="px-3 py-1 rounded-full bg-surface-slate text-brand-dark border border-border-subtle">Zone 3: Rural Acreage</span>
                    </div>
                </div>

                <!-- Mobile Horizontal Scroll Cue -->
                <div class="sm:hidden flex items-center gap-1.5 text-[11px] text-slate-500 font-medium mb-2.5 px-0.5">
                    <span class="material-symbols-outlined text-[15px] text-brand-primary">swipe</span>
                    <span>Scroll table horizontally to view transit schedules &amp; status</span>
                </div>

                <!-- Clean Compact Matrix Table (UI/UX Pro Max accessible tabular layout) -->
                <div class="bg-surface-white rounded-xl shadow-xs border border-border-subtle overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-xs text-brand-dark">
                            <thead class="bg-surface-slate text-xs font-bold uppercase tracking-wider text-brand-primary border-b border-border-subtle">
                                <tr>
                                    <th class="py-3.5 px-5">Township / Suburb</th>
                                    <th class="py-3.5 px-4">Postcode</th>
                                    <th class="py-3.5 px-4">Delivery Zone</th>
                                    <th class="py-3.5 px-4">Delivery Surcharge</th>
                                    <th class="py-3.5 px-4">Fleet Schedule</th>
                                    <th class="py-3.5 px-4">Standard Hire</th>
                                    <th class="py-3.5 px-5 text-right">Route Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-border-subtle" id="matrix-table-body">
                                
                                <!-- Zone 1: Free Depot -->
                                <tr class="town-row hover:bg-brand-lime-light/30 transition-colors active-row" data-town="Armidale" onclick="selectLocation('Armidale')">
                                    <td class="py-3.5 px-5 font-bold text-brand-primary flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-brand-primary"></span>
                                        <span>Armidale (Central Depot Hub)</span>
                                    </td>
                                    <td class="py-3.5 px-4 font-mono font-semibold">2350</td>
                                    <td class="py-3.5 px-4"><span class="px-2 py-0.5 rounded bg-brand-lime-light text-brand-primary font-bold text-xs">Zone 1: Free Local</span></td>
                                    <td class="py-3.5 px-4 font-bold text-brand-primary">FREE (Direct Depot)</td>
                                    <td class="py-3.5 px-4 text-text-muted">Daily Mon–Sat (Same-Day Ready)</td>
                                    <td class="py-3.5 px-4">7 Days Included</td>
                                    <td class="py-3.5 px-5 text-right">
                                        <span class="inline-flex items-center gap-1 text-xs font-semibold text-brand-primary">
                                            <span class="material-symbols-outlined text-[15px] text-brand-primary">check_circle</span>
                                            <span>Active Route</span>
                                        </span>
                                    </td>
                                </tr>

                                <tr class="town-row hover:bg-brand-lime-light/30 transition-colors" data-town="Invergowrie" onclick="selectLocation('Invergowrie')">
                                    <td class="py-3.5 px-5 font-bold text-brand-dark flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-brand-lime"></span>
                                        <span>Invergowrie</span>
                                    </td>
                                    <td class="py-3.5 px-4 font-mono font-semibold">2350</td>
                                    <td class="py-3.5 px-4"><span class="px-2 py-0.5 rounded bg-surface-slate text-text-muted font-semibold text-xs">Zone 1: West Fringe</span></td>
                                    <td class="py-3.5 px-4 font-bold text-brand-dark">+$15.00 AUD</td>
                                    <td class="py-3.5 px-4 text-text-muted">Daily Morning &amp; Afternoon</td>
                                    <td class="py-3.5 px-4">7 Days Included</td>
                                    <td class="py-3.5 px-5 text-right">
                                        <span class="inline-flex items-center gap-1 text-xs font-semibold text-brand-primary">
                                            <span class="material-symbols-outlined text-[15px] text-brand-primary">check_circle</span>
                                            <span>Active Route</span>
                                        </span>
                                    </td>
                                </tr>

                                <tr class="town-row hover:bg-brand-lime-light/30 transition-colors" data-town="Dangarsleigh" onclick="selectLocation('Dangarsleigh')">
                                    <td class="py-3.5 px-5 font-bold text-brand-dark flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-brand-lime"></span>
                                        <span>Dangarsleigh</span>
                                    </td>
                                    <td class="py-3.5 px-4 font-mono font-semibold">2350</td>
                                    <td class="py-3.5 px-4"><span class="px-2 py-0.5 rounded bg-surface-slate text-text-muted font-semibold text-xs">Zone 1: South Fringe</span></td>
                                    <td class="py-3.5 px-4 font-bold text-brand-dark">+$15.00 AUD</td>
                                    <td class="py-3.5 px-4 text-text-muted">Daily Morning Run</td>
                                    <td class="py-3.5 px-4">7 Days Included</td>
                                    <td class="py-3.5 px-5 text-right">
                                        <span class="inline-flex items-center gap-1 text-xs font-semibold text-brand-primary">
                                            <span class="material-symbols-outlined text-[15px] text-brand-primary">check_circle</span>
                                            <span>Active Route</span>
                                        </span>
                                    </td>
                                </tr>

                                <!-- Zone 2: Regional Express -->
                                <tr class="town-row hover:bg-brand-lime-light/30 transition-colors" data-town="Uralla" onclick="selectLocation('Uralla')">
                                    <td class="py-3.5 px-5 font-bold text-brand-dark flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-brand-primary"></span>
                                        <span>Uralla</span>
                                    </td>
                                    <td class="py-3.5 px-4 font-mono font-semibold">2358</td>
                                    <td class="py-3.5 px-4"><span class="px-2 py-0.5 rounded bg-surface-slate text-text-muted font-semibold text-xs">Zone 2: Southern Run</span></td>
                                    <td class="py-3.5 px-4 font-bold text-brand-dark">+$20.00 AUD</td>
                                    <td class="py-3.5 px-4 text-text-muted">Daily Scheduled Morning</td>
                                    <td class="py-3.5 px-4">7 Days Included</td>
                                    <td class="py-3.5 px-5 text-right">
                                        <span class="inline-flex items-center gap-1 text-xs font-semibold text-brand-primary">
                                            <span class="material-symbols-outlined text-[15px] text-brand-primary">check_circle</span>
                                            <span>Active Route</span>
                                        </span>
                                    </td>
                                </tr>

                                <tr class="town-row hover:bg-brand-lime-light/30 transition-colors" data-town="Guyra" onclick="selectLocation('Guyra')">
                                    <td class="py-3.5 px-5 font-bold text-brand-dark flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-brand-primary"></span>
                                        <span>Guyra</span>
                                    </td>
                                    <td class="py-3.5 px-4 font-mono font-semibold">2365</td>
                                    <td class="py-3.5 px-4"><span class="px-2 py-0.5 rounded bg-surface-slate text-text-muted font-semibold text-xs">Zone 2: Northern Run</span></td>
                                    <td class="py-3.5 px-4 font-bold text-brand-dark">+$25.00 AUD</td>
                                    <td class="py-3.5 px-4 text-text-muted">Daily Scheduled Dispatch</td>
                                    <td class="py-3.5 px-4">7 Days Included</td>
                                    <td class="py-3.5 px-5 text-right">
                                        <span class="inline-flex items-center gap-1 text-xs font-semibold text-brand-primary">
                                            <span class="material-symbols-outlined text-[15px] text-brand-primary">check_circle</span>
                                            <span>Active Route</span>
                                        </span>
                                    </td>
                                </tr>

                                <tr class="town-row hover:bg-brand-lime-light/30 transition-colors" data-town="Black Mountain" onclick="selectLocation('Black Mountain')">
                                    <td class="py-3.5 px-5 font-bold text-brand-dark flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-brand-primary"></span>
                                        <span>Black Mountain</span>
                                    </td>
                                    <td class="py-3.5 px-4 font-mono font-semibold">2365</td>
                                    <td class="py-3.5 px-4"><span class="px-2 py-0.5 rounded bg-surface-slate text-text-muted font-semibold text-xs">Zone 2: Highway Corridor</span></td>
                                    <td class="py-3.5 px-4 font-bold text-brand-dark">+$20.00 AUD</td>
                                    <td class="py-3.5 px-4 text-text-muted">Daily Mon–Fri Route</td>
                                    <td class="py-3.5 px-4">7 Days Included</td>
                                    <td class="py-3.5 px-5 text-right">
                                        <span class="inline-flex items-center gap-1 text-xs font-semibold text-brand-primary">
                                            <span class="material-symbols-outlined text-[15px] text-brand-primary">check_circle</span>
                                            <span>Active Route</span>
                                        </span>
                                    </td>
                                </tr>

                                <tr class="town-row hover:bg-brand-lime-light/30 transition-colors" data-town="Hillgrove" onclick="selectLocation('Hillgrove')">
                                    <td class="py-3.5 px-5 font-bold text-brand-dark flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-brand-primary"></span>
                                        <span>Hillgrove</span>
                                    </td>
                                    <td class="py-3.5 px-4 font-mono font-semibold">2350</td>
                                    <td class="py-3.5 px-4"><span class="px-2 py-0.5 rounded bg-surface-slate text-text-muted font-semibold text-xs">Zone 2: Eastern Gorge</span></td>
                                    <td class="py-3.5 px-4 font-bold text-brand-dark">+$25.00 AUD</td>
                                    <td class="py-3.5 px-4 text-text-muted">Monday, Wednesday &amp; Friday</td>
                                    <td class="py-3.5 px-4">7 Days Included</td>
                                    <td class="py-3.5 px-5 text-right">
                                        <span class="inline-flex items-center gap-1 text-xs font-semibold text-brand-primary">
                                            <span class="material-symbols-outlined text-[15px] text-brand-primary">check_circle</span>
                                            <span>Active Route</span>
                                        </span>
                                    </td>
                                </tr>

                                <!-- Zone 3: Northern Hub & Extended Acreage -->
                                <tr class="town-row hover:bg-brand-lime-light/30 transition-colors" data-town="Glen Innes" onclick="selectLocation('Glen Innes')">
                                    <td class="py-3.5 px-5 font-bold text-brand-primary flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-brand-primary"></span>
                                        <span>Glen Innes (Northern Recovery Hub)</span>
                                    </td>
                                    <td class="py-3.5 px-4 font-mono font-semibold">2370</td>
                                    <td class="py-3.5 px-4"><span class="px-2 py-0.5 rounded bg-brand-lime-light text-brand-primary font-bold text-xs">Zone 3: Northern MRF</span></td>
                                    <td class="py-3.5 px-4 font-bold text-brand-dark">+$35.00 AUD</td>
                                    <td class="py-3.5 px-4 text-text-muted">Daily Mon–Sat Dedicated Fleet</td>
                                    <td class="py-3.5 px-4">7 Days Included</td>
                                    <td class="py-3.5 px-5 text-right">
                                        <span class="inline-flex items-center gap-1 text-xs font-semibold text-brand-primary">
                                            <span class="material-symbols-outlined text-[15px] text-brand-primary">check_circle</span>
                                            <span>Active Route</span>
                                        </span>
                                    </td>
                                </tr>

                                <tr class="town-row hover:bg-brand-lime-light/30 transition-colors" data-town="Walcha" onclick="selectLocation('Walcha')">
                                    <td class="py-3.5 px-5 font-bold text-brand-dark flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-brand-primary"></span>
                                        <span>Walcha</span>
                                    </td>
                                    <td class="py-3.5 px-4 font-mono font-semibold">2354</td>
                                    <td class="py-3.5 px-4"><span class="px-2 py-0.5 rounded bg-surface-slate text-text-muted font-semibold text-xs">Zone 3: Southern Pastoral</span></td>
                                    <td class="py-3.5 px-4 font-bold text-brand-dark">+$40.00 AUD</td>
                                    <td class="py-3.5 px-4 text-text-muted">Tuesday, Thursday &amp; Saturday</td>
                                    <td class="py-3.5 px-4">7 Days Included</td>
                                    <td class="py-3.5 px-5 text-right">
                                        <span class="inline-flex items-center gap-1 text-xs font-semibold text-brand-primary">
                                            <span class="material-symbols-outlined text-[15px] text-brand-primary">check_circle</span>
                                            <span>Active Route</span>
                                        </span>
                                    </td>
                                </tr>

                                <tr class="town-row hover:bg-brand-lime-light/30 transition-colors" data-town="Kentucky" onclick="selectLocation('Kentucky')">
                                    <td class="py-3.5 px-5 font-bold text-brand-dark flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-brand-primary"></span>
                                        <span>Kentucky</span>
                                    </td>
                                    <td class="py-3.5 px-4 font-mono font-semibold">2354</td>
                                    <td class="py-3.5 px-4"><span class="px-2 py-0.5 rounded bg-surface-slate text-text-muted font-semibold text-xs">Zone 3: Orchard Acreage</span></td>
                                    <td class="py-3.5 px-4 font-bold text-brand-dark">+$30.00 AUD</td>
                                    <td class="py-3.5 px-4 text-text-muted">Monday, Wednesday &amp; Friday</td>
                                    <td class="py-3.5 px-4">7 Days Included</td>
                                    <td class="py-3.5 px-5 text-right">
                                        <span class="inline-flex items-center gap-1 text-xs font-semibold text-brand-primary">
                                            <span class="material-symbols-outlined text-[15px] text-brand-primary">check_circle</span>
                                            <span>Active Route</span>
                                        </span>
                                    </td>
                                </tr>

                                <tr class="town-row hover:bg-brand-lime-light/30 transition-colors" data-town="Deepwater" onclick="selectLocation('Deepwater')">
                                    <td class="py-3.5 px-5 font-bold text-brand-dark flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-brand-primary"></span>
                                        <span>Deepwater</span>
                                    </td>
                                    <td class="py-3.5 px-4 font-mono font-semibold">2371</td>
                                    <td class="py-3.5 px-4"><span class="px-2 py-0.5 rounded bg-surface-slate text-text-muted font-semibold text-xs">Zone 3: Far North</span></td>
                                    <td class="py-3.5 px-4 font-bold text-brand-dark">+$40.00 AUD</td>
                                    <td class="py-3.5 px-4 text-text-muted">Wednesday &amp; Friday Scheduled</td>
                                    <td class="py-3.5 px-4">7 Days Included</td>
                                    <td class="py-3.5 px-5 text-right">
                                        <span class="inline-flex items-center gap-1 text-xs font-semibold text-brand-primary">
                                            <span class="material-symbols-outlined text-[15px] text-brand-primary">check_circle</span>
                                            <span>Active Route</span>
                                        </span>
                                    </td>
                                </tr>

                                <tr class="town-row hover:bg-brand-lime-light/30 transition-colors" data-town="Tenterfield" onclick="selectLocation('Tenterfield')">
                                    <td class="py-3.5 px-5 font-bold text-brand-dark flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-brand-primary"></span>
                                        <span>Tenterfield</span>
                                    </td>
                                    <td class="py-3.5 px-4 font-mono font-semibold">2372</td>
                                    <td class="py-3.5 px-4"><span class="px-2 py-0.5 rounded bg-surface-slate text-text-muted font-semibold text-xs">Zone 3: Border Gateway</span></td>
                                    <td class="py-3.5 px-4 font-bold text-brand-dark">+$50.00 AUD</td>
                                    <td class="py-3.5 px-4 text-text-muted">Weekly Dedicated Trade Route</td>
                                    <td class="py-3.5 px-4">7 Days Included</td>
                                    <td class="py-3.5 px-5 text-right">
                                        <span class="inline-flex items-center gap-1 text-xs font-semibold text-brand-primary">
                                            <span class="material-symbols-outlined text-[15px] text-brand-primary">check_circle</span>
                                            <span>Active Route</span>
                                        </span>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- 5. REGIONAL DEPOT INFRASTRUCTURE (Armidale & Glen Innes) -->
            <section class="w-full px-4 md:px-8 py-6 max-w-7xl mx-auto" data-scroll-reveal="fade-up">
                <div class="bg-brand-primary text-white rounded-2xl shadow-xl p-6 sm:p-10 relative overflow-hidden">
                    <div class="max-w-3xl mb-8 relative z-10">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-lime/20 text-brand-lime text-xs font-bold mb-3">
                            <span class="material-symbols-outlined text-[16px]">domain</span>
                            <span>Operational Depots in Armidale &amp; Glen Innes</span>
                        </div>
                        <h2 class="font-headline-lg text-2xl sm:text-3xl font-bold text-white tracking-tight">
                            Our Regional Facilities &amp; Resource Recovery Infrastructure
                        </h2>
                        <p class="font-body-md text-xs sm:text-sm text-white/80 mt-2 leading-relaxed">
                            New England Waste owns and manages its own regional truck marshalling yards, container fabrication bays, and EPA-licensed recycling sorting plant.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 relative z-10">
                        <!-- Hub 1: Armidale -->
                        <div class="bg-surface-white text-brand-dark rounded-xl p-6 shadow-md border border-border-subtle flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between mb-3">
                                    <span class="px-2.5 py-1 rounded bg-brand-lime-light text-brand-primary text-xs font-bold uppercase tracking-wider">
                                        Central Headquarters
                                    </span>
                                    <span class="font-mono text-xs text-text-muted font-bold">DEPOT #01</span>
                                </div>
                                <h3 class="font-headline-sm text-xl font-bold text-brand-primary">Armidale Central Fleet Depot</h3>
                                <p class="text-xs text-text-muted mt-1 leading-relaxed">
                                    Main logistics dispatch office, vehicle marshalling yard, skip bin inventory (2m³ to 12m³), and daily Southern Tablelands operations.
                                </p>
                                <div class="space-y-2 mt-4 text-xs font-body-sm text-brand-dark">
                                    <div class="flex items-start gap-2">
                                        <span class="material-symbols-outlined text-brand-primary text-[18px] shrink-0">location_on</span>
                                        <span>Armidale Regional Logistics Corridor, NSW 2350</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-brand-primary text-[18px] shrink-0">call</span>
                                        <span>Dispatch Office: <strong>0429 323 696</strong></span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-brand-primary text-[18px] shrink-0">schedule</span>
                                        <span>Mon – Fri: 6:30am – 5:30pm (Sat Standby)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 pt-3 border-t border-border-subtle flex items-center justify-between text-xs font-bold text-brand-primary">
                                <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px] text-brand-lime">verified</span> 2m³ to 12m³ Marrel &amp; Hooklift</span>
                                <span>Free Depot Route</span>
                            </div>
                        </div>

                        <!-- Hub 2: Glen Innes -->
                        <div class="bg-surface-white text-brand-dark rounded-xl p-6 shadow-md border border-border-subtle flex flex-col justify-between">
                            <div>
                                <div class="flex items-center justify-between mb-3">
                                    <span class="px-2.5 py-1 rounded bg-brand-lime-light text-brand-primary text-xs font-bold uppercase tracking-wider">
                                        Northern Recovery Hub
                                    </span>
                                    <span class="font-mono text-xs text-text-muted font-bold">MRF #02</span>
                                </div>
                                <h3 class="font-headline-sm text-xl font-bold text-brand-primary">Glen Innes Resource Recovery Yard</h3>
                                <p class="text-xs text-text-muted mt-1 leading-relaxed">
                                    Materials recovery facility (MRF), timber processing, clean masonry sorting, and Northern Tablelands truck staging hub.
                                </p>
                                <div class="space-y-2 mt-4 text-xs font-body-sm text-brand-dark">
                                    <div class="flex items-start gap-2">
                                        <span class="material-symbols-outlined text-brand-primary text-[18px] shrink-0">location_on</span>
                                        <span>Severn Regional Industrial Estate, Glen Innes NSW 2370</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-brand-primary text-[18px] shrink-0">recycling</span>
                                        <span>EPA Resource Recovery Licence #4421</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-brand-primary text-[18px] shrink-0">route</span>
                                        <span>Serving Glen Innes, Deepwater &amp; Tenterfield</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 pt-3 border-t border-border-subtle flex items-center justify-between text-xs font-bold text-brand-primary">
                                <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[16px] text-brand-lime">eco</span> 90%+ Landfill Diversion Rate</span>
                                <span>Heavy Hooklift Base</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 6. BOTTOM 1-DIRECTIONAL BOOKING CTA BANNER -->
            <section class="w-full px-4 md:px-8 py-8 max-w-7xl mx-auto" data-scroll-reveal="fade-up">
                <div class="bg-brand-forest text-white rounded-2xl shadow-xl p-8 sm:p-12 relative overflow-hidden">
                    <div class="max-w-3xl relative z-10">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/10 text-brand-lime font-label-md text-xs mb-3 font-semibold">
                            <span class="material-symbols-outlined text-[16px] text-brand-lime">check_circle</span>
                            <span>Transparent Regional Quotes • 7 Days Hire Included</span>
                        </div>
                        <h2 class="font-headline-xl text-2xl sm:text-4xl font-bold text-white tracking-tight leading-tight">
                            Ready to Book a Skip for Your Address?
                        </h2>
                        <p class="font-body-lg text-sm sm:text-base text-white/80 mt-2.5 max-w-2xl leading-relaxed">
                            Book online in 4 steps. Choose your capacity from 2m³ to 12m³ with tip fees and 7-day hire included.
                        </p>

                        <div class="mt-8 flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
                            <a class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-lg bg-brand-lime hover:bg-brand-lime-hover text-brand-primary-dark font-headline-sm text-base font-extrabold shadow-lg transition-all active:scale-98 cursor-pointer" href="{{ route('home') }}">
                                <span>Proceed to 4-Step Online Booking</span>
                                <span class="material-symbols-outlined text-[22px]">arrow_forward</span>
                            </a>
                            <a class="inline-flex items-center justify-center gap-2 px-6 py-4 rounded-lg bg-white/10 text-white font-label-lg text-sm font-semibold hover:bg-white/20 transition-all cursor-pointer" href="tel:0429323696">
                                <span class="material-symbols-outlined text-[20px] text-brand-lime">call</span>
                                <span>Need Advice? Call Dispatch: 0429 323 696</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <!-- FOOTER -->
    @include('partials.footer')

    <!-- INTERACTIVE MAP & INSPECTOR JAVASCRIPT -->
    <script>
        const locations = {
            'Armidale': {
                name: 'Armidale, NSW',
                postcode: '2350',
                zone: 'Central Operating Depot',
                fee: 'FREE (Direct Depot)',
                schedule: 'Daily Mon–Sat (Same-Day Ready)',
                turnaround: 'Within 2–4 hours',
                desc: 'Armidale CBD, UNE campus, North Hill, South Hill, and industrial precincts. Daily same-day dispatch from our central logistics headquarters.',
                pinId: 'pin-Armidale'
            },
            'Invergowrie': {
                name: 'Invergowrie, NSW',
                postcode: '2350',
                zone: 'Zone 1: West Fringe Acreage',
                fee: '+$15.00 AUD',
                schedule: 'Daily Morning & Afternoon Dispatch',
                turnaround: 'Same-Day / Next-Day Delivery',
                desc: 'Invergowrie acreage estates, Saumarez Ponds, and rural-residential subdivisions along Bundarra Road.',
                pinId: 'pin-Invergowrie'
            },
            'Dangarsleigh': {
                name: 'Dangarsleigh, NSW',
                postcode: '2350',
                zone: 'Zone 1: South Fringe Farm Route',
                fee: '+$15.00 AUD',
                schedule: 'Daily Scheduled Morning Run',
                turnaround: 'Same-Day / Next-Day Delivery',
                desc: 'Dangarsleigh war memorial precinct, rural lifestyle holdings, and farming gateway properties.',
                pinId: 'pin-Dangarsleigh'
            },
            'Uralla': {
                name: 'Uralla, NSW',
                postcode: '2358',
                zone: 'Zone 2: Direct Southern Highway Route',
                fee: '+$20.00 AUD',
                schedule: 'Daily Scheduled Morning Run',
                turnaround: 'Guaranteed 24-hour turnaround',
                desc: 'Uralla township, Arding, Salisbury Plains, and residential lifestyle properties. Fast daily 22km highway transit.',
                pinId: 'pin-Uralla'
            },
            'Guyra': {
                name: 'Guyra, NSW',
                postcode: '2365',
                zone: 'Zone 2: Top of the Range Northern Route',
                fee: '+$25.00 AUD',
                schedule: 'Daily Scheduled Dispatch',
                turnaround: 'Next-day morning delivery',
                desc: 'Top of the Range township, tomato glasshouses corridor, and Mother of Ducks lagoon district (40km North).',
                pinId: 'pin-Guyra'
            },
            'Black Mountain': {
                name: 'Black Mountain, NSW',
                postcode: '2365',
                zone: 'Zone 2: Mid-Tablelands Highway Run',
                fee: '+$20.00 AUD',
                schedule: 'Daily Mon–Fri Highway Route',
                turnaround: 'Next-day morning delivery',
                desc: 'Black Mountain village, railway siding district, and surrounding grazing properties along the New England Highway.',
                pinId: 'pin-Black-Mountain'
            },
            'Hillgrove': {
                name: 'Hillgrove, NSW',
                postcode: '2350',
                zone: 'Zone 2: Eastern Gorge Rural Run',
                fee: '+$25.00 AUD',
                schedule: 'Monday, Wednesday & Friday Scheduled',
                turnaround: 'Scheduled route delivery',
                desc: 'Historic Hillgrove village, mine access roads, and Bakers Creek valley acreage via Grafton Road.',
                pinId: 'pin-Hillgrove'
            },
            'Glen Innes': {
                name: 'Glen Innes, NSW',
                postcode: '2370',
                zone: 'Northern Recovery & MRF Facility Yard',
                fee: '+$35.00 AUD',
                schedule: 'Daily Mon–Sat Dedicated Fleet',
                turnaround: 'Daily morning & afternoon runs',
                desc: 'Glen Innes township, Severn industrial estate, and regional highway corridors. Home of our resource recovery MRF plant.',
                pinId: 'pin-Glen-Innes'
            },
            'Walcha': {
                name: 'Walcha, NSW',
                postcode: '2354',
                zone: 'Zone 3: Southern Pastoral District',
                fee: '+$40.00 AUD',
                schedule: 'Tuesday, Thursday & Saturday Scheduled',
                turnaround: 'Scheduled route delivery',
                desc: 'Walcha township, Apsley Gorge fringe, timber mills, and southern cattle stations via Oxley Highway link.',
                pinId: 'pin-Walcha'
            },
            'Kentucky': {
                name: 'Kentucky, NSW',
                postcode: '2354',
                zone: 'Zone 3: Southern Orchards & Acreage',
                fee: '+$30.00 AUD',
                schedule: 'Monday, Wednesday & Friday Scheduled',
                turnaround: 'Scheduled route delivery',
                desc: 'Kentucky South, orchard farms, rural subdivisions, and lifestyle acreage properties south of Uralla.',
                pinId: 'pin-Kentucky'
            },
            'Deepwater': {
                name: 'Deepwater, NSW',
                postcode: '2371',
                zone: 'Zone 3: Far North Highway Corridor',
                fee: '+$40.00 AUD',
                schedule: 'Wednesday & Friday Scheduled',
                turnaround: 'Weekly scheduled transit',
                desc: 'Deepwater township, New England Highway north, and rural agricultural holdings served via our Glen Innes Hub.',
                pinId: 'pin-Deepwater'
            },
            'Tenterfield': {
                name: 'Tenterfield, NSW',
                postcode: '2372',
                zone: 'Zone 3: Border Gateway Corridor',
                fee: '+$50.00 AUD',
                schedule: 'Weekly Dedicated Construction Route',
                turnaround: 'Book 48 hours in advance',
                desc: 'Tenterfield Shire, commercial trade builders, and heritage rural properties near the Queensland border.',
                pinId: 'pin-Tenterfield'
            }
        };

        function selectLocation(key, shouldScroll = false) {
            const loc = locations[key];
            if (!loc) return;

            // Update UI elements
            document.getElementById('inspect-town-title').textContent = loc.name;
            document.getElementById('inspect-postcode').textContent = loc.postcode;
            document.getElementById('inspect-zone-badge').textContent = loc.zone;
            document.getElementById('inspect-description').textContent = loc.desc;
            document.getElementById('inspect-fee').textContent = loc.fee;
            document.getElementById('inspect-schedule').textContent = loc.schedule;
            document.getElementById('inspect-turnaround').textContent = loc.turnaround;
            document.getElementById('inspect-book-btn').innerHTML = `<span>Book Skip for ${key}</span><span class="material-symbols-outlined text-[18px]">arrow_forward</span>`;

            // Reset active nodes on map
            document.querySelectorAll('.map-node').forEach(node => node.classList.remove('active-node'));
            const activePin = document.getElementById(loc.pinId);
            if (activePin) {
                activePin.classList.add('active-node');
            }

            // Sync two-way active row in matrix table
            document.querySelectorAll('tr.town-row').forEach(row => row.classList.remove('active-row'));
            const matchingRow = document.querySelector(`tr.town-row[data-town="${key}"]`);
            if (matchingRow) {
                matchingRow.classList.add('active-row');
            }

            // Smooth scroll on mobile to inspector panel
            if (shouldScroll && window.innerWidth < 1024) {
                const target = document.getElementById('inspect-town-title');
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
        }

        function handleQuickSearch(query) {
            const q = query.trim().toLowerCase();
            if (!q) return;

            // Search by name or postcode
            for (const [key, val] of Object.entries(locations)) {
                if (key.toLowerCase().includes(q) || val.postcode.includes(q)) {
                    selectLocation(key, true);
                    break;
                }
            }
        }

        // Initialize with requested town parameter, hash, or default to Armidale
        document.addEventListener('DOMContentLoaded', () => {
            // Intersection Observer for subtle scroll reveal
            const revealObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.08,
                rootMargin: '0px 0px -25px 0px'
            });

            document.querySelectorAll('[data-scroll-reveal]').forEach(el => {
                revealObserver.observe(el);
            });

            const urlParams = new URLSearchParams(window.location.search);
            const queryTown = urlParams.get('town');
            const hashTown = window.location.hash.replace('#', '');
            
            let matchedTown = 'Armidale';
            if (queryTown) {
                for (const key of Object.keys(locations)) {
                    if (key.toLowerCase() === queryTown.toLowerCase() || key.toLowerCase().replace(/\s+/g, '') === queryTown.toLowerCase().replace(/[\s\-_]+/g, '')) {
                        matchedTown = key;
                        break;
                    }
                }
            } else if (hashTown) {
                for (const key of Object.keys(locations)) {
                    if (key.toLowerCase() === hashTown.toLowerCase() || key.toLowerCase().replace(/\s+/g, '') === hashTown.toLowerCase().replace(/[\s\-_]+/g, '')) {
                        matchedTown = key;
                        break;
                    }
                }
            }
            selectLocation(matchedTown);
        });
    </script>
</body>
</html>
