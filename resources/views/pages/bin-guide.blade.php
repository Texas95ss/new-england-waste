<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=5.0" name="viewport"/>
    <meta name="theme-color" content="#005D2A"/>
    <link rel="icon" type="image/webp" href="/images/logo.webp"/>
    <title>Skip Bin Sizing &amp; Capacity Guide (2m³ to 12m³) | New England Waste NSW</title>

    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet"/>
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
                        "border-subtle": "#E2E8F0",         // Border alias

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
<body class="bg-surface-slate font-body-md text-text-charcoal-primary antialiased flex flex-col min-h-screen">

    <!-- SHARED BRAND HEADER -->
    @include('partials.header')

    <!-- MAIN BODY -->
    <main class="flex-1 flex flex-col relative w-full pt-[116px] pb-24 bg-surface-slate">
        <div class="flex flex-col w-full">

            <!-- 1. BREADCRUMB NAVIGATION -->
            <section class="w-full px-4 md:px-8 pt-6 pb-2 max-w-7xl mx-auto">
                <nav class="flex items-center gap-2 text-text-slate-muted font-label-md text-xs">
                    <a class="hover:text-primary transition-colors flex items-center gap-1" href="{{ route('home') }}">
                        <span class="material-symbols-outlined text-[16px]">home</span>
                        <span>Home</span>
                    </a>
                    <span class="text-border-slate-medium font-medium">/</span>
                    <span class="text-primary font-semibold">Skip Bin Sizing Guide</span>
                </nav>
            </section>

            <!-- 2. HERO HEADER & FILTER CONTROLS -->
            <section class="w-full px-4 md:px-8 pt-3 pb-8 max-w-7xl mx-auto">
                <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
                    <div class="max-w-3xl">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-bio-emerald-light text-brand-forest-deep font-label-md text-xs mb-3 font-semibold">
                            <span class="w-2 h-2 rounded-full bg-secondary"></span>
                            <span>Skip Bin Dimensions &amp; Capacity Guide</span>
                        </div>
                        <h1 class="font-headline-xl text-3xl sm:text-4xl lg:text-[44px] text-primary tracking-tight font-bold leading-[1.15]">
                            Skip Bin Sizing Guide &amp; Volume Calculator
                        </h1>
                        <p class="mt-3 font-body-lg text-base sm:text-lg text-text-slate-muted max-w-2xl leading-relaxed">
                            Dimensions, trailer equivalents, and wheelbarrow access specs for all 7 regional bin capacities.
                        </p>
                    </div>

                    <!-- Transport Law Compliance Pill -->
                    <div class="lg:max-w-xs bg-safety-amber-light/80 border border-amber-200 p-4 rounded-xl flex items-start gap-3 shadow-xs">
                        <span class="material-symbols-outlined text-safety-amber-dark text-[22px] shrink-0 mt-0.5">warning</span>
                        <div class="flex flex-col">
                            <span class="font-label-md text-xs text-safety-amber-dark font-bold uppercase tracking-wider">Transport Law Reminder</span>
                            <p class="font-body-sm text-xs text-text-charcoal-primary mt-1 leading-relaxed">
                                Heavy vehicle road regulations mandate that all skips must be loaded strictly level to the top rim for safe regional highway transit.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Category Filter Bar (Interactive Client-Side Switching) -->
                <div class="mt-8 flex items-center gap-2 overflow-x-auto pb-2 -mx-4 px-4 sm:mx-0 sm:px-0 no-scrollbar snap-x" id="bin-filter-bar">
                    <button class="filter-btn shrink-0 whitespace-nowrap min-h-[44px] px-4 py-2.5 rounded-full font-label-lg text-xs sm:text-sm font-semibold bg-primary text-on-primary transition-all shadow-sm active:scale-95 cursor-pointer" data-filter="all" type="button">
                        All Sizes (7)
                    </button>
                    <button class="filter-btn shrink-0 whitespace-nowrap min-h-[44px] px-4 py-2.5 rounded-full font-label-lg text-xs sm:text-sm font-semibold bg-surface-white text-text-slate-muted hover:bg-surface-container transition-all active:scale-95 cursor-pointer border border-border-slate-subtle" data-filter="domestic" type="button">
                        Domestic &amp; Garden (2m³ – 4m³)
                    </button>
                    <button class="filter-btn shrink-0 whitespace-nowrap min-h-[44px] px-4 py-2.5 rounded-full font-label-lg text-xs sm:text-sm font-semibold bg-surface-white text-text-slate-muted hover:bg-surface-container transition-all active:scale-95 cursor-pointer border border-border-slate-subtle" data-filter="trade" type="button">
                        Trades &amp; Renovation (6m³ – 8m³)
                    </button>
                    <button class="filter-btn shrink-0 whitespace-nowrap min-h-[44px] px-4 py-2.5 rounded-full font-label-lg text-xs sm:text-sm font-semibold bg-surface-white text-text-slate-muted hover:bg-surface-container transition-all active:scale-95 cursor-pointer border border-border-slate-subtle" data-filter="commercial" type="button">
                        Commercial &amp; Civil (10m³ – 12m³)
                    </button>
                </div>
            </section>

            <!-- 3. TECHNICAL 7-BIN SPECIFICATION GRID (With Exact Vector Schematics) -->
            <section class="w-full px-4 md:px-8 py-4 max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="bins-grid">

                    @php
                        // Helper data dictionary matching the technical schematics and specifications
                        $binDetails = [
                            2 => [
                                'category' => 'domestic',
                                'subtitle' => 'Garden Tidy & Small Cleanout',
                                'type_title' => 'Standard Marrel Skip',
                                'ramp_label' => 'No Ramp Door',
                                'ramp_icon' => null,
                                'wheelie' => '≈ 8 Bins (240L)',
                                'trailers' => '≈ 2 Standard 6x4',
                                'dims' => '2.0m × 1.4m × 0.95m',
                                'weight' => '500 kg included',
                                'access' => 'Low-sided manual lift',
                                'jobs' => [
                                    'Garden pruning, lawn turf offcuts & shrubs',
                                    'Single-room domestic spring decluttering'
                                ],
                                'truck' => 'Light Rig Truck Safe',
                                'hire' => 'Standard 7-Day Hire',
                                'svg_type' => '2m'
                            ],
                            3 => [
                                'category' => 'domestic',
                                'subtitle' => 'Small Household Purge',
                                'type_title' => 'Standard Marrel Skip',
                                'ramp_label' => 'Compact Footprint',
                                'ramp_icon' => null,
                                'wheelie' => '≈ 12 Bins (240L)',
                                'trailers' => '≈ 3 Standard 6x4',
                                'dims' => '2.4m × 1.4m × 1.00m',
                                'weight' => '750 kg included',
                                'access' => 'Low-profile driveway side',
                                'jobs' => [
                                    'Small kitchen update or cupboard cleanout',
                                    'Carpet rip-outs (up to 2 average bedrooms)'
                                ],
                                'truck' => 'Fits Single Garage Space',
                                'hire' => 'Standard 7-Day Hire',
                                'svg_type' => '3m'
                            ],
                            4 => [
                                'category' => 'domestic',
                                'subtitle' => 'Standard Bathroom & Kitchen Refit',
                                'type_title' => 'Marrel with Ramp',
                                'ramp_label' => 'Wheelbarrow Ramp Door',
                                'ramp_icon' => 'door_front',
                                'wheelie' => '≈ 16 Bins (240L)',
                                'trailers' => '≈ 4 Standard 6x4',
                                'dims' => '2.5m × 1.5m × 1.15m',
                                'weight' => '1,000 kg included',
                                'access' => 'Drop-down wheelbarrow ramp',
                                'jobs' => [
                                    'Full bathroom overhaul (tiles, tub, plasterboard)',
                                    'Timber fence line replacement & garden pavers'
                                ],
                                'truck' => 'Top Customer Choice',
                                'hire' => 'Standard 7-Day Hire',
                                'svg_type' => '4m'
                            ],
                            6 => [
                                'category' => 'trade',
                                'subtitle' => 'Medium Construction & Estate Clearouts',
                                'type_title' => 'Trade Marrel Skip',
                                'ramp_label' => 'Swing-Door Ramp',
                                'ramp_icon' => 'door_front',
                                'wheelie' => '≈ 24 Bins (240L)',
                                'trailers' => '≈ 6 Standard 6x4',
                                'dims' => '3.6m × 1.5m × 1.25m',
                                'weight' => '1,500 kg included',
                                'access' => 'Heavy-gauge ribbed steel',
                                'jobs' => [
                                    'Deceased estate & multi-shed comprehensive purges',
                                    'Roof tile replacements and structural timber debris'
                                ],
                                'truck' => 'Trade Builder Grade',
                                'hire' => 'Standard 7-Day Hire',
                                'svg_type' => '6m'
                            ],
                            8 => [
                                'category' => 'trade',
                                'subtitle' => 'Major Home Building & Bulky Waste',
                                'type_title' => 'Heavy Marrel / Hooklift',
                                'ramp_label' => 'High Wall Ramp',
                                'ramp_icon' => 'door_front',
                                'wheelie' => '≈ 32 Bins (240L)',
                                'trailers' => '≈ 8 Standard 6x4',
                                'dims' => '4.0m × 1.6m × 1.50m',
                                'weight' => '2,000 kg included',
                                'access' => 'Heavy-duty rear ramp door',
                                'jobs' => [
                                    'Multi-room residential renovations & extensions',
                                    'Commercial retail store defits & shopfittings'
                                ],
                                'truck' => 'Commercial Ready',
                                'hire' => 'Standard 7-Day Hire',
                                'svg_type' => '8m'
                            ],
                            10 => [
                                'category' => 'commercial',
                                'subtitle' => 'Commercial Contractors & Bulky Debris',
                                'type_title' => 'Commercial Hooklift',
                                'ramp_label' => 'Full Walk-In Doors',
                                'ramp_icon' => 'meeting_room',
                                'wheelie' => '≈ 40 Bins (240L)',
                                'trailers' => '≈ 10 Standard 6x4',
                                'dims' => '4.6m × 1.7m × 1.50m',
                                'weight' => '2,500 kg included',
                                'access' => 'Heavy Hooklift Truck Only',
                                'jobs' => [
                                    'Active commercial building construction sites',
                                    'Rural scrap metal cleanouts & agricultural cleanups'
                                ],
                                'truck' => 'Heavy Hooklift Truck',
                                'hire' => 'Flexible Trade Terms',
                                'svg_type' => '10m'
                            ],
                            12 => [
                                'category' => 'commercial',
                                'subtitle' => 'Civil Demolition & Bulk Industrial',
                                'type_title' => 'Civil Bulk Hooklift',
                                'ramp_label' => 'Double Walk-In Rear',
                                'ramp_icon' => 'door_sliding',
                                'wheelie' => '≈ 48 Bins (240L)',
                                'trailers' => '≈ 12 Standard 6x4',
                                'dims' => '5.2m × 1.8m × 1.60m',
                                'weight' => '3,500 kg included',
                                'access' => 'Twin full-height barn doors',
                                'jobs' => [
                                    'Industrial warehouse clearouts & commercial logistics',
                                    'Civil engineering works and major structure demolition'
                                ],
                                'truck' => 'Industrial Plant Class',
                                'hire' => 'Trade Account Terms',
                                'svg_type' => '12m'
                            ],
                        ];
                    @endphp

                    @foreach($binSizes as $bin)
                        @php
                            $cap = (int)$bin->capacity_m3;
                            $meta = $binDetails[$cap] ?? [
                                'category' => 'domestic',
                                'subtitle' => $bin->description,
                                'type_title' => 'Standard Skip',
                                'ramp_label' => 'Ground Placement',
                                'ramp_icon' => null,
                                'wheelie' => '≈ ' . $bin->wheelie_bins_equiv . ' Bins',
                                'trailers' => '≈ ' . $bin->trailer_loads_equiv . ' Trailers',
                                'dims' => $bin->dimensions,
                                'weight' => $bin->max_weight_tonnes . 'T included',
                                'access' => 'Rear Door / Lift',
                                'jobs' => ['General waste cleanout', 'Domestic overhaul'],
                                'truck' => 'Direct Delivery',
                                'hire' => 'Standard 7-Day Hire',
                                'svg_type' => '2m'
                            ];
                            $isPopular = ($cap === 4);
                        @endphp

                        <article id="bin-{{ $cap }}" class="bin-card bg-surface-white rounded-xl shadow-xs border border-border-slate-subtle p-6 flex flex-col justify-between transition-all duration-200 hover:shadow-lg hover:-translate-y-1 relative scroll-mt-28 target:ring-2 target:ring-[#96C93D] target:border-[#005D2A] target:shadow-lg" data-category="{{ $meta['category'] }}" data-scroll-reveal="fade-up">

                            <div>
                                <!-- Header info -->
                                <div class="flex items-start justify-between gap-3">
                                    <div class="flex-1 min-w-0 min-h-[84px] flex flex-col justify-start">
                                        <span class="font-label-md text-xs uppercase tracking-wider text-text-slate-muted font-semibold">{{ $meta['type_title'] }}</span>
                                        <h2 class="font-headline-md text-xl sm:text-2xl font-bold text-primary mt-0.5 leading-snug">{{ $bin->name }}</h2>
                                        <p class="font-body-sm text-xs text-secondary font-semibold mt-0.5 line-clamp-1">{{ $meta['subtitle'] }}</p>
                                    </div>
                                    <span class="px-2.5 py-1 rounded {{ $isPopular ? 'bg-secondary-container text-on-secondary-fixed' : 'bg-surface-container text-primary' }} font-numeric-metric text-lg font-bold shrink-0">
                                        {{ $cap }}m³
                                    </span>
                                </div>

                                <!-- Schematic Diagram (Exact SVG Vectors) -->
                                <div class="mt-4 {{ $isPopular ? 'bg-bio-emerald-light/40' : 'bg-surface-slate' }} rounded-lg p-3 flex items-center justify-center relative h-[148px] overflow-hidden border border-slate-100">
                                    @if($cap === 2)
                                        <svg class="w-full h-24 drop-shadow-xs" fill="none" viewBox="0 0 240 100" xmlns="http://www.w3.org/2000/svg">
                                            <polygon fill="#0A4D2E" opacity="0.95" points="40,25 200,25 180,85 60,85"></polygon>
                                            <polygon fill="#063620" opacity="0.9" points="40,25 60,85 45,85 25,25"></polygon>
                                            <polygon fill="#115132" opacity="0.8" points="200,25 215,25 195,85 180,85"></polygon>
                                            <line stroke="#96C93D" stroke-width="3" x1="60" x2="180" y1="85" y2="85"></line>
                                            <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="middle" x="120" y="20">2.0m Length</text>
                                            <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="start" x="195" y="60">0.95m H</text>
                                        </svg>
                                    @elseif($cap === 3)
                                        <svg class="w-full h-24 drop-shadow-xs" fill="none" viewBox="0 0 240 100" xmlns="http://www.w3.org/2000/svg">
                                            <polygon fill="#0A4D2E" opacity="0.95" points="35,22 205,22 185,85 55,85"></polygon>
                                            <polygon fill="#063620" opacity="0.9" points="35,22 55,85 38,85 18,22"></polygon>
                                            <polygon fill="#115132" opacity="0.8" points="205,22 222,22 202,85 185,85"></polygon>
                                            <line stroke="#96C93D" stroke-width="3" x1="55" x2="185" y1="85" y2="85"></line>
                                            <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="middle" x="120" y="18">2.4m Length</text>
                                            <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="start" x="200" y="60">1.00m H</text>
                                        </svg>
                                    @elseif($cap === 4)
                                        <svg class="w-full h-24 drop-shadow-xs" fill="none" viewBox="0 0 240 100" xmlns="http://www.w3.org/2000/svg">
                                            <polygon fill="#0A4D2E" opacity="0.95" points="30,18 210,18 190,85 50,85"></polygon>
                                            <polygon fill="#063620" opacity="0.9" points="30,18 50,85 30,85 10,18"></polygon>
                                            <polygon fill="#115132" opacity="0.8" points="210,18 230,18 210,85 190,85"></polygon>
                                            <rect fill="#FEF3C7" height="40" rx="1" stroke="#B45309" stroke-width="1.5" width="8" x="180" y="45"></rect>
                                            <line stroke="#96C93D" stroke-width="3" x1="50" x2="190" y1="85" y2="85"></line>
                                            <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="middle" x="120" y="15">2.5m Length</text>
                                            <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="start" x="205" y="60">1.15m H</text>
                                        </svg>
                                    @elseif($cap === 6)
                                        <svg class="w-full h-24 drop-shadow-xs" fill="none" viewBox="0 0 240 100" xmlns="http://www.w3.org/2000/svg">
                                            <polygon fill="#0A4D2E" opacity="0.95" points="25,14 215,14 195,85 45,85"></polygon>
                                            <polygon fill="#063620" opacity="0.9" points="25,14 45,85 25,85 5,14"></polygon>
                                            <polygon fill="#115132" opacity="0.8" points="215,14 235,14 215,85 195,85"></polygon>
                                            <rect fill="#FEF3C7" height="55" rx="1" stroke="#B45309" stroke-width="1.5" width="8" x="186" y="30"></rect>
                                            <line stroke="#96C93D" stroke-width="3" x1="45" x2="195" y1="85" y2="85"></line>
                                            <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="middle" x="120" y="12">3.6m Length</text>
                                            <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="start" x="208" y="55">1.25m H</text>
                                        </svg>
                                    @elseif($cap === 8)
                                        <svg class="w-full h-24 drop-shadow-xs" fill="none" viewBox="0 0 240 100" xmlns="http://www.w3.org/2000/svg">
                                            <polygon fill="#0A4D2E" opacity="0.95" points="20,10 220,10 200,85 40,85"></polygon>
                                            <polygon fill="#063620" opacity="0.9" points="20,10 40,85 20,85 0,10"></polygon>
                                            <polygon fill="#115132" opacity="0.8" points="220,10 240,10 220,85 200,85"></polygon>
                                            <rect fill="#FEF3C7" height="65" rx="1" stroke="#B45309" stroke-width="1.5" width="10" x="190" y="20"></rect>
                                            <line stroke="#96C93D" stroke-width="3" x1="40" x2="200" y1="85" y2="85"></line>
                                            <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="middle" x="120" y="8">4.0m Length</text>
                                            <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="start" x="215" y="50">1.50m H</text>
                                        </svg>
                                    @elseif($cap === 10)
                                        <svg class="w-full h-24 drop-shadow-xs" fill="none" viewBox="0 0 240 100" xmlns="http://www.w3.org/2000/svg">
                                            <rect fill="#0A4D2E" height="68" opacity="0.95" rx="2" width="190" x="25" y="16"></rect>
                                            <line stroke="#96C93D" stroke-width="3" x1="25" x2="215" y1="84" y2="84"></line>
                                            <path d="M 215 16 L 228 35 L 228 84" fill="none" stroke="#CBD5E1" stroke-width="4"></path>
                                            <circle cx="218" cy="82" fill="#475569" r="5"></circle>
                                            <line stroke="#063620" stroke-dasharray="3 3" stroke-width="1.5" x1="120" x2="120" y1="16" y2="84"></line>
                                            <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="middle" x="120" y="12">4.6m Length</text>
                                            <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="start" x="210" y="55">1.50m H</text>
                                        </svg>
                                    @else
                                        <svg class="w-full h-24 drop-shadow-xs" fill="none" viewBox="0 0 240 100" xmlns="http://www.w3.org/2000/svg">
                                            <rect fill="#0A4D2E" height="72" opacity="0.95" rx="2" width="205" x="15" y="12"></rect>
                                            <line stroke="#96C93D" stroke-width="3" x1="15" x2="220" y1="84" y2="84"></line>
                                            <circle cx="20" cy="85" fill="#475569" r="4.5"></circle>
                                            <circle cx="215" cy="85" fill="#475569" r="4.5"></circle>
                                            <line stroke="#063620" stroke-width="2" x1="115" x2="115" y1="12" y2="84"></line>
                                            <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="middle" x="115" y="9">5.2m Length</text>
                                            <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="start" x="210" y="52">1.60m H</text>
                                        </svg>
                                    @endif

                                    <span class="absolute bottom-2 left-3 font-label-md text-xs {{ $isPopular ? 'text-brand-forest-deep bg-bio-emerald-light font-bold' : 'text-text-slate-muted bg-surface-white/90 font-medium' }} px-2 py-0.5 rounded-md flex items-center gap-1 shadow-2xs">
                                        @if($meta['ramp_icon'])
                                            <span class="material-symbols-outlined text-[13px]">{{ $meta['ramp_icon'] }}</span>
                                        @endif
                                        <span>{{ $meta['ramp_label'] }}</span>
                                    </span>
                                </div>

                                <!-- Metric Comparison Badges -->
                                <div class="grid grid-cols-2 gap-2 mt-4">
                                    <div class="bg-surface-container-low p-2 rounded-lg flex items-center gap-2 border border-slate-100">
                                        <span class="material-symbols-outlined text-secondary text-[20px]">delete</span>
                                        <div>
                                            <span class="font-label-md text-[10px] text-text-slate-muted uppercase font-bold block">Wheelie Bins</span>
                                            <span class="font-label-lg text-xs font-bold text-primary">{{ $meta['wheelie'] }}</span>
                                        </div>
                                    </div>
                                    <div class="bg-surface-container-low p-2 rounded-lg flex items-center gap-2 border border-slate-100">
                                        <span class="material-symbols-outlined text-secondary text-[20px]">rv_hookup</span>
                                        <div>
                                            <span class="font-label-md text-[10px] text-text-slate-muted uppercase font-bold block">Box Trailers</span>
                                            <span class="font-label-lg text-xs font-bold text-primary">{{ $meta['trailers'] }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Specifications List -->
                                <dl class="mt-4 space-y-1.5 text-xs">
                                    <div class="flex items-center justify-between bg-surface-slate px-2.5 py-1.5 rounded border border-slate-100">
                                        <dt class="text-text-slate-muted">Dimensions (L × W × H)</dt>
                                        <dd class="font-semibold text-text-charcoal-primary">{{ $bin->dimensions }}</dd>
                                    </div>
                                    <div class="flex items-center justify-between bg-surface-slate px-2.5 py-1.5 rounded border border-slate-100">
                                        <dt class="text-text-slate-muted">Included Weight Limit</dt>
                                        <dd class="font-bold text-primary">{{ $meta['weight'] }}</dd>
                                    </div>
                                    <div class="flex items-center justify-between bg-surface-slate px-2.5 py-1.5 rounded border border-slate-100">
                                        <dt class="text-text-slate-muted">Access Style</dt>
                                        <dd class="font-semibold text-text-charcoal-primary">{{ $meta['access'] }}</dd>
                                    </div>
                                    <div class="flex items-center justify-between bg-surface-slate px-2.5 py-1.5 rounded border border-slate-100">
                                        <dt class="text-text-slate-muted">Standard Rate</dt>
                                        <dd class="font-bold text-secondary">${{ number_format($bin->base_price, 0) }} AUD (7-Day Hire)</dd>
                                    </div>
                                </dl>

                                <!-- Ideal Applications -->
                                <div class="mt-4">
                                    <span class="font-label-md text-xs text-text-charcoal-primary font-bold block mb-1.5">Recommended Job Types:</span>
                                    <ul class="text-xs text-text-slate-muted space-y-1">
                                        @foreach($meta['jobs'] as $job)
                                            <li class="flex items-center gap-1.5">
                                                <span class="material-symbols-outlined text-secondary text-[16px] shrink-0">check_circle</span>
                                                <span>{{ $job }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!-- Card Footer Action & Service Pill -->
                            <div class="mt-5 pt-3 border-t border-slate-100 flex flex-col gap-2.5">
                                <div class="bg-surface-slate px-2.5 py-1.5 rounded-lg flex items-center justify-between text-text-slate-muted font-label-md text-xs border border-slate-100">
                                    <span class="flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[15px] text-secondary">local_shipping</span>
                                        <span>{{ $meta['truck'] }}</span>
                                    </span>
                                    <span class="text-primary font-semibold">{{ $meta['hire'] }}</span>
                                </div>

                                <!-- High Conversion CTA Button -->
                                <a 
                                    href="{{ route('home') }}?bin={{ $cap }}#booking-dock" 
                                    class="w-full py-3 px-4 rounded-xl bg-[#005D2A] hover:bg-[#00421D] active:scale-95 text-white font-bold text-xs sm:text-sm text-center flex items-center justify-center gap-2 transition-all shadow-sm hover:shadow-md cursor-pointer group-hover:bg-[#00421D]"
                                    aria-label="Book {{ $bin->name }}"
                                >
                                    <span>Select &amp; Book {{ $cap }}m³ Bin</span>
                                    <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                                </a>

                                <div class="w-full py-0.5 text-center text-[11px] text-slate-500 font-medium flex items-center justify-center gap-1">
                                    <span class="material-symbols-outlined text-[14px] text-[#005D2A]">verified</span>
                                    <span>Standard 7-Day Hire • Eco-Sort Included</span>
                                </div>
                            </div>

                        </article>
                    @endforeach

                </div>
            </section>

            <!-- 4. INTERACTIVE VISUAL SCALE COMPARISON BENCHMARK SECTION -->
            <section class="w-full px-4 md:px-8 py-12 max-w-7xl mx-auto" data-scroll-reveal="fade-up">
                <div class="bg-surface-white rounded-2xl shadow-xs border border-border-slate-subtle p-6 md:p-8">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6">
                        <div>
                            <span class="font-label-md text-xs uppercase tracking-wider text-secondary font-bold">Elevation Benchmark</span>
                            <h2 class="font-headline-lg text-2xl sm:text-3xl font-bold text-primary tracking-tight mt-0.5">
                                True Scale &amp; Proportional Comparison
                            </h2>
                            <p class="font-body-md text-sm text-text-slate-muted mt-1 max-w-2xl">
                                Compare all 7 skip bins calibrated against an average human operator (1.8m) and a standard dual-cab trade utility vehicle (Toyota HiLux, 5.3m L × 1.75m H).
                            </p>
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-surface-container-low font-label-md text-xs text-primary font-semibold border border-slate-200">
                                <span class="w-2.5 h-2.5 rounded-full bg-secondary"></span> Ground Baseline Grid
                            </span>
                        </div>
                    </div>

                    <!-- Full-Width Architectural Elevation Graphic -->
                    <div class="w-full overflow-x-auto pt-4 pb-2">
                        <div class="min-w-[940px] relative bg-surface-slate rounded-xl p-6 overflow-hidden border border-slate-100">
                            <!-- Background measurement grid lines -->
                            <div class="absolute inset-0 flex flex-col justify-between pointer-events-none opacity-20">
                                <div class="w-full h-px bg-slate-400"></div>
                                <div class="w-full h-px bg-slate-400"></div>
                                <div class="w-full h-px bg-slate-400"></div>
                                <div class="w-full h-px bg-slate-400"></div>
                                <div class="w-full h-px bg-slate-600"></div>
                            </div>

                            <svg class="w-full h-auto drop-shadow-xs" fill="none" viewBox="0 0 1000 240" xmlns="http://www.w3.org/2000/svg">
                                <!-- Ground Line -->
                                <line stroke="#0F172A" stroke-width="2.5" x1="10" x2="990" y1="210" y2="210"></line>

                                <!-- Human Silhouette (1.8m scale -> 90px height, from y=120 to y=210) -->
                                <g transform="translate(30, 120)">
                                    <circle cx="16" cy="10" fill="#475569" r="8"></circle>
                                    <rect fill="#475569" height="35" rx="3" width="14" x="9" y="20"></rect>
                                    <rect fill="#475569" height="35" rx="1.5" width="5" x="10" y="55"></rect>
                                    <rect fill="#475569" height="35" rx="1.5" width="5" x="17" y="55"></rect>
                                    <rect fill="#475569" height="28" rx="2" width="4" x="4" y="22"></rect>
                                    <rect fill="#475569" height="28" rx="2" width="4" x="24" y="22"></rect>
                                    <text fill="#0F172A" font-family="Inter" font-size="10" font-weight="600" text-anchor="middle" x="16" y="-6">Person (1.8m)</text>
                                </g>

                                <!-- Toyota HiLux Ute Silhouette (approx 180px length, 85px height) -->
                                <g transform="translate(85, 125)">
                                    <path d="M 5,60 L 25,60 L 40,30 L 95,25 L 125,50 L 175,50 L 180,85 L 0,85 Z" fill="#CBD5E1"></path>
                                    <rect fill="#94A3B8" height="22" rx="2" width="45" x="45" y="32"></rect>
                                    <circle cx="35" cy="85" fill="#0F172A" r="14"></circle>
                                    <circle cx="35" cy="85" fill="#FFFFFF" r="6"></circle>
                                    <circle cx="145" cy="85" fill="#0F172A" r="14"></circle>
                                    <circle cx="145" cy="85" fill="#FFFFFF" r="6"></circle>
                                    <text fill="#0F172A" font-family="Inter" font-size="10" font-weight="600" text-anchor="middle" x="90" y="10">Trade Ute (Hilux)</text>
                                </g>

                                <!-- 2m³ Mini Skip (Height: 48px, Length: 75px) -->
                                <g transform="translate(290, 162)">
                                    <polygon fill="#0A4D2E" points="10,0 65,0 55,48 20,48"></polygon>
                                    <text fill="#0A4D2E" font-family="Outfit" font-size="10" font-weight="700" text-anchor="middle" x="37" y="-8">2 m³</text>
                                    <text fill="#FFFFFF" font-family="Inter" font-size="9" text-anchor="middle" x="37" y="30">0.95m</text>
                                </g>

                                <!-- 3m³ Compact Skip (Height: 50px, Length: 85px) -->
                                <g transform="translate(380, 160)">
                                    <polygon fill="#0A4D2E" points="10,0 75,0 65,50 20,50"></polygon>
                                    <text fill="#0A4D2E" font-family="Outfit" font-size="10" font-weight="700" text-anchor="middle" x="42" y="-8">3 m³</text>
                                    <text fill="#FFFFFF" font-family="Inter" font-size="9" text-anchor="middle" x="42" y="32">1.00m</text>
                                </g>

                                <!-- 4m³ Renovation Skip (Height: 58px, Length: 95px) -->
                                <g transform="translate(480, 152)">
                                    <polygon fill="#006C49" points="10,0 85,0 75,58 20,58"></polygon>
                                    <rect fill="#96C93D" height="33" width="5" x="70" y="25"></rect>
                                    <text fill="#006C49" font-family="Outfit" font-size="10" font-weight="700" text-anchor="middle" x="47" y="-8">4 m³ (Popular)</text>
                                    <text fill="#FFFFFF" font-family="Inter" font-size="9" text-anchor="middle" x="47" y="36">1.15m</text>
                                </g>

                                <!-- 6m³ Trade Skip (Height: 63px, Length: 110px) -->
                                <g transform="translate(590, 147)">
                                    <polygon fill="#0A4D2E" points="10,0 100,0 90,63 20,63"></polygon>
                                    <rect fill="#FEF3C7" height="43" width="5" x="85" y="20"></rect>
                                    <text fill="#0A4D2E" font-family="Outfit" font-size="10" font-weight="700" text-anchor="middle" x="55" y="-8">6 m³</text>
                                    <text fill="#FFFFFF" font-family="Inter" font-size="9" text-anchor="middle" x="55" y="40">1.25m</text>
                                </g>

                                <!-- 8m³ Project Skip (Height: 75px, Length: 120px) -->
                                <g transform="translate(715, 135)">
                                    <polygon fill="#0A4D2E" points="10,0 110,0 100,75 20,75"></polygon>
                                    <rect fill="#FEF3C7" height="50" width="5" x="95" y="25"></rect>
                                    <text fill="#0A4D2E" font-family="Outfit" font-size="10" font-weight="700" text-anchor="middle" x="60" y="-8">8 m³</text>
                                    <text fill="#FFFFFF" font-family="Inter" font-size="9" text-anchor="middle" x="60" y="45">1.50m</text>
                                </g>

                                <!-- 10m³ / 12m³ Hooklift (Height: 75px, Length: 135px) -->
                                <g transform="translate(850, 135)">
                                    <rect fill="#063620" height="75" rx="2" width="125" x="5" y="0"></rect>
                                    <circle cx="12" cy="74" fill="#CBD5E1" r="4"></circle>
                                    <circle cx="120" cy="74" fill="#CBD5E1" r="4"></circle>
                                    <text fill="#063620" font-family="Outfit" font-size="10" font-weight="700" text-anchor="middle" x="67" y="-8">10m³ / 12m³</text>
                                    <text fill="#FFFFFF" font-family="Inter" font-size="9" text-anchor="middle" x="67" y="45">1.5 - 1.6m H</text>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <!-- Visual Legend / Scale Footnote -->
                    <div class="mt-4 flex flex-wrap items-center justify-between gap-4 text-text-slate-muted font-body-sm text-xs pt-2">
                        <div class="flex flex-wrap items-center gap-4">
                            <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-primary"></span> Marrel Lift (2m³ – 8m³)</span>
                            <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-brand-forest-deep"></span> Hooklift Roll-On (10m³ – 12m³)</span>
                            <span class="flex items-center gap-1.5"><span class="w-3 h-3 rounded bg-heritage-lime-legacy"></span> Integrated Ramp Door</span>
                        </div>
                        <span class="italic text-xs text-text-slate-muted">Dimensions are indicative manufacturing standards (±50mm engineering tolerance)</span>
                    </div>
                </div>
            </section>

            <!-- 5. DRIVEWAY & SITE ACCESS GUIDELINES (3 ADVISORY CARDS) -->
            <section class="w-full px-4 md:px-8 py-8 max-w-7xl mx-auto" data-scroll-reveal="fade-up">
                <div class="mb-6">
                    <span class="font-label-md text-xs uppercase tracking-wider text-secondary font-bold">Safety &amp; Compliance</span>
                    <h2 class="font-headline-lg text-2xl sm:text-3xl font-bold text-primary tracking-tight mt-0.5">
                        Driveway &amp; Site Access Guidelines
                    </h2>
                    <p class="font-body-md text-sm text-text-slate-muted mt-1 max-w-2xl">
                        Three non-negotiable trade requirements ensuring your skip bin delivery is safe, legally compliant, and protects your property.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Advisory Card 1: Clearance Dimensions -->
                    <div class="bg-surface-white rounded-xl shadow-xs border border-border-slate-subtle p-6 flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-lg bg-surface-container flex items-center justify-center text-primary mb-4">
                                <span class="material-symbols-outlined text-[28px]">width</span>
                            </div>
                            <h3 class="font-headline-sm text-lg font-bold text-primary mb-1">1. Clearance Dimensions</h3>
                            <p class="font-body-sm text-xs text-text-slate-muted leading-relaxed">
                                Our dual-axle and tri-axle delivery trucks require dedicated room to maneuver without structural obstruction.
                            </p>
                            <ul class="mt-4 space-y-2.5 font-body-sm text-xs">
                                <li class="flex items-start gap-2.5 bg-surface-slate p-2.5 rounded-lg border border-slate-100">
                                    <span class="material-symbols-outlined text-secondary text-[18px] shrink-0 mt-0.5">straighten</span>
                                    <div>
                                        <strong class="text-text-charcoal-primary block font-semibold">Minimum 2.8m Driveway Width</strong>
                                        <span class="text-text-slate-muted text-xs font-medium">Allows clear gate and gutter entry for delivery arms.</span>
                                    </div>
                                </li>
                                <li class="flex items-start gap-2.5 bg-surface-slate p-2.5 rounded-lg border border-slate-100">
                                    <span class="material-symbols-outlined text-secondary text-[18px] shrink-0 mt-0.5">height</span>
                                    <div>
                                        <strong class="text-text-charcoal-primary block font-semibold">4.0m Overhead Clearance</strong>
                                        <span class="text-text-slate-muted text-xs font-medium">Must be completely clear of eaves, carports &amp; wires.</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-6 pt-3 border-t border-slate-100 text-xs font-label-md text-safety-amber-dark font-semibold flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-[16px]">power_off</span>
                            <span>Watch for low-hanging overhead powerlines</span>
                        </div>
                    </div>

                    <!-- Advisory Card 2: Surface Protection -->
                    <div class="bg-surface-white rounded-xl shadow-xs border border-border-slate-subtle p-6 flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-lg bg-bio-emerald-light flex items-center justify-center text-primary mb-4">
                                <span class="material-symbols-outlined text-[28px]">layers</span>
                            </div>
                            <h3 class="font-headline-sm text-lg font-bold text-primary mb-1">2. Driveway &amp; Paver Care</h3>
                            <p class="font-body-sm text-xs text-text-slate-muted leading-relaxed mb-3">
                                Heavy steel bins can scar asphalt and crack decorative driveways if not seated with professional care.
                            </p>
                            <div class="rounded-lg overflow-hidden relative shadow-xs mb-3 border border-slate-100">
                                <img class="w-full h-36 object-cover" alt="Skip bin on timber boards protecting driveway pavers" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDYykAT3Rr2LyiJoA-e2VMwYYevDWrnXwS7NTe7miLzKLtR8FmXncp_Pzso0wEeI9bAh6arVpZqOYs1asyQHlD7quVrSL7-lAgQDfSZ79d8CXU01y4wqozc0bUtpLrHsbMxpgkJkQzxiNtKnw4rEvq393A9AdqoNDImVIVfnYJoH9Clrzdgeigu_arYYfgIzv5_Rk-XE8ETTHfKNTgjC35dggfw4MCj1-8zhcV9OOlGeDIkggqlvQaK"/>
                                <span class="absolute bottom-2 left-2 bg-primary/90 text-on-primary font-label-md text-xs px-2 py-0.5 rounded font-medium backdrop-blur-xs">
                                    Lancaster Timber Stabilizer Policy
                                </span>
                            </div>
                            <p class="font-body-sm text-xs text-text-slate-muted leading-relaxed">
                                Our drivers carry certified hardwood timber boards to place beneath steel rollers upon request, safeguarding stamped concrete, exposed aggregate, and pavers.
                            </p>
                        </div>
                        <div class="mt-6 pt-3 border-slate-100 text-xs font-label-md text-secondary font-bold flex items-center gap-1.5 border-t">
                            <span class="material-symbols-outlined text-[16px]">verified</span>
                            <span>Hardwood timber boards on every truck</span>
                        </div>
                    </div>

                    <!-- Advisory Card 3: Council Permits -->
                    <div class="bg-surface-white rounded-xl shadow-xs border border-border-slate-subtle p-6 flex flex-col justify-between">
                        <div>
                            <div class="w-12 h-12 rounded-lg bg-surface-container flex items-center justify-center text-primary mb-4">
                                <span class="material-symbols-outlined text-[28px]">policy</span>
                            </div>
                            <h3 class="font-headline-sm text-lg font-bold text-primary mb-1">3. Council Nature Strip Permits</h3>
                            <p class="font-body-sm text-xs text-text-slate-muted leading-relaxed">
                                Placing a skip bin on a council road, verge, or public footpath requires approval under NSW road regulations.
                            </p>
                            <div class="mt-4 space-y-2.5 font-body-sm text-xs">
                                <div class="bg-surface-slate p-2.5 rounded-lg border border-slate-100">
                                    <span class="font-label-md text-xs text-secondary font-bold uppercase block">Section 138 Approval</span>
                                    <p class="text-text-charcoal-primary text-xs mt-0.5 leading-relaxed">
                                        Armidale Regional Council &amp; Glen Innes Severn Council mandate permits if bin sits past property boundaries.
                                    </p>
                                </div>
                                <div class="bg-surface-slate p-2.5 rounded-lg border border-slate-100">
                                    <span class="font-label-md text-xs text-primary font-bold uppercase block">We Handle It For You</span>
                                    <p class="text-text-charcoal-primary text-xs mt-0.5 leading-relaxed">
                                        Select "Nature Strip" in our online booking dock and our dispatch office assists with council lodgements.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 pt-3 border-t border-slate-100 text-xs font-label-md text-primary font-bold flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-[16px]">gavel</span>
                            <span>Fully Insured • $20M Public Liability</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 6. PHOTO REALISM SHOWCASE: REGIONAL FLEET CONTEXT -->
            <section class="w-full px-4 md:px-8 py-8 max-w-7xl mx-auto" data-scroll-reveal="fade-up">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center bg-surface-white rounded-2xl p-6 md:p-8 shadow-xs border border-border-slate-subtle">
                    <div class="relative rounded-xl overflow-hidden shadow-sm">
                        <img class="w-full h-72 object-cover" alt="New England Waste skip bin truck lifting bin safely onto driveway" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD4Bhl83SXcDqhLB5IePrB4rARTAiqsrPXg2VhYAlsQol2JcRo_QjHwVdfkSn2T_ipAL1qaEMzMu2K-HycfZG8HNwXJxKFh1Pexiti7gMVhwfLvHjefDwcQv8MGdy-o2vQQo85MKpKrxev6GrLBh2Yxe4BiA8GEfhp3DnQ6eZe0rXuhAEmlaOTIV06eI2IvlhqwMZ0Er6-Gjy4XM3-cNcBWv13EQRXw1PXublenQeyC-i4jv1LRzX0u"/>
                        <div class="absolute top-3 left-3 bg-brand-forest-deep/95 text-on-primary font-label-md text-xs px-3 py-1 rounded-md font-semibold backdrop-blur-xs">
                            Armidale • Uralla • Walcha • Guyra • Glen Innes
                        </div>
                    </div>
                    <div class="flex flex-col justify-center">
                        <span class="font-label-md text-xs uppercase tracking-wider text-secondary font-bold">Daily High Country Service</span>
                        <h3 class="font-headline-md text-2xl font-bold text-primary mt-1 leading-tight">
                            Scheduled Delivery &amp; Pickup Across the Tablelands
                        </h3>
                        <p class="font-body-md text-sm text-text-slate-muted mt-2.5 leading-relaxed">
                            Operating continuously since 1979, the Lancaster family fleet runs dedicated daily routes across the entire New England tablelands. From rural acreage gates to town residential driveways, our drivers handle delivery and collection on time.
                        </p>
                        <div class="grid grid-cols-3 gap-3 mt-6">
                            <div class="bg-surface-slate p-3 rounded-lg text-center border border-slate-100">
                                <span class="font-numeric-metric text-xl font-bold text-primary block">45+</span>
                                <span class="font-label-md text-xs font-semibold text-text-slate-muted">Years Serving NSW</span>
                            </div>
                            <div class="bg-surface-slate p-3 rounded-lg text-center border border-slate-100">
                                <span class="font-numeric-metric text-xl font-bold text-secondary block">99.4%</span>
                                <span class="font-label-md text-xs font-semibold text-text-slate-muted">On-Time Dispatch</span>
                            </div>
                            <div class="bg-surface-slate p-3 rounded-lg text-center border border-slate-100">
                                <span class="font-numeric-metric text-xl font-bold text-primary block">88%+</span>
                                <span class="font-label-md text-xs font-semibold text-text-slate-muted">Resource Diversion</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 7. BOTTOM 1-DIRECTIONAL BOOKING CTA BANNER -->
            <section class="w-full px-4 md:px-8 py-10 max-w-7xl mx-auto" data-scroll-reveal="fade-up">
                <div class="bg-primary text-on-primary rounded-2xl shadow-xl p-8 sm:p-12 relative overflow-hidden">
                    <div class="max-w-3xl relative z-10">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/10 text-[#96C93D] font-label-md text-xs mb-3 font-semibold border border-[#96C93D]/30">
                            <span class="material-symbols-outlined text-[16px] text-heritage-lime-legacy">check_circle</span>
                            <span>Upfront Fixed Regional Pricing • No Hidden Landfill Surcharges</span>
                        </div>
                        <h2 class="font-headline-xl text-2xl sm:text-4xl font-bold text-surface-white tracking-tight leading-tight">
                            Found the Right Bin Size for Your Job?
                        </h2>
                        <p class="font-body-lg text-sm sm:text-base text-white/90 mt-2.5 max-w-2xl leading-relaxed">
                            Select your delivery date for upfront pricing with 7-day standard hire, drop-off, pick-up, and recycling sort included.
                        </p>

                        <!-- Primary Action Buttons -->
                        <div class="mt-8 flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
                            <a class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-lg bg-secondary-fixed text-brand-forest-deep font-headline-sm text-base font-bold shadow-lg hover:bg-secondary transition-all hover:text-on-secondary active:scale-98 cursor-pointer" href="{{ route('home') }}">
                                <span>Proceed to 4-Step Online Booking</span>
                                <span class="material-symbols-outlined text-[22px]">arrow_forward</span>
                            </a>
                            <a class="inline-flex items-center justify-center gap-2 px-6 py-4 rounded-lg bg-surface-white/10 text-on-primary font-label-lg text-sm font-semibold hover:bg-surface-white/20 transition-all cursor-pointer" href="tel:0429323696">
                                <span class="material-symbols-outlined text-[20px] text-safety-amber-light">call</span>
                                <span>Need Advice? Call Dispatch: 0429 323 696</span>
                            </a>
                        </div>

                        <!-- Trust Footnotes -->
                        <div class="mt-8 pt-4 border-t border-primary-container/60 flex flex-wrap items-center gap-4 text-white/80 font-label-md text-xs">
                            <span class="flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-[16px] text-heritage-lime-legacy">lock</span>
                                <span>Safe &amp; Secure Online Booking • Direct Yard Delivery</span>
                            </span>
                            <span class="hidden sm:inline">•</span>
                            <span class="flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-[16px] text-heritage-lime-legacy">schedule</span>
                                <span>Dispatch Office: Mon – Fri 6:30am – 5:30pm</span>
                            </span>
                            <span class="hidden sm:inline">•</span>
                            <span class="flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-[16px] text-heritage-lime-legacy">handshake</span>
                                <span>Lancaster Direct Family Guarantee</span>
                            </span>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <!-- FOOTER -->
    @include('partials.footer')

    <!-- JAVASCRIPT FILTER SCRIPT -->
    <script>
        (function() {
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

            const filterButtons = document.querySelectorAll('#bin-filter-bar .filter-btn');
            const binCards = document.querySelectorAll('#bins-grid .bin-card');

            filterButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const filter = btn.getAttribute('data-filter');

                    // Style active button
                    filterButtons.forEach(b => {
                        b.classList.remove('bg-primary', 'text-on-primary', 'shadow-sm');
                        b.classList.add('bg-surface-white', 'text-text-slate-muted', 'border', 'border-border-slate-subtle');
                    });
                    btn.classList.add('bg-primary', 'text-on-primary', 'shadow-sm');
                    btn.classList.remove('bg-surface-white', 'text-text-slate-muted', 'border', 'border-border-slate-subtle');

                    // Filter card display
                    binCards.forEach(card => {
                        const category = card.getAttribute('data-category');
                        if (filter === 'all' || category === filter) {
                            card.style.display = 'flex';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });

            // Smooth hash scrolling & category expansion (e.g. arriving via #bin-12)
            if (window.location.hash) {
                const targetCard = document.querySelector(window.location.hash);
                if (targetCard) {
                    const allBtn = document.querySelector('#bin-filter-bar .filter-btn[data-filter="all"]');
                    if (allBtn) allBtn.click();
                    setTimeout(() => {
                        targetCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }, 200);
                }
            }
        })();
    </script>
</body>
</html>
