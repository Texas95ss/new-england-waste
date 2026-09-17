<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#005D2A"/>
    <link rel="icon" type="image/webp" href="/images/logo.webp"/>
    <title>New England Waste | Skip Bin Hire &amp; Waste Logistics NSW</title>

    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>

    <style>
        @layer base {
            html, body { margin: 0; padding: 0; }
            body { overscroll-behavior: none; }
            .pb-safe { padding-bottom: env(safe-area-inset-bottom, 0px); }
            main > :first-child { margin-top: 0 !important; }
            main > :last-child { margin-bottom: 0 !important; }
        }
        ::-webkit-scrollbar { display: none; }
        [x-cloak] { display: none !important; }

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
            .price-flash {
                animation: none !important;
            }
        }

        /* Dynamic Price Flash on update */
        @keyframes pricePulse {
            0% { transform: scale(1); }
            40% { transform: scale(1.08); color: #86AA37; }
            100% { transform: scale(1); }
        }
        .price-flash {
            animation: pricePulse 0.35s cubic-bezier(0.16, 1, 0.3, 1);
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
<body class="bg-surface-slate font-body-md text-text-charcoal-primary antialiased min-h-screen">

    <!-- SHARED BRAND HEADER -->
    @include('partials.header')

    <!-- MAIN BODY -->
    <main class="w-full pt-[116px] pb-24 md:pb-0 bg-surface-slate">
        <div class="flex flex-col w-full">
            
            <!-- HERO SECTION & 4-STEP BOOKING DOCK -->
            <div class="w-full">
                <section class="w-full px-4 sm:px-6 lg:px-8 mx-auto max-w-7xl pt-8 pb-12" id="booking-dock">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">
                        
                        <!-- Left Column: Grounded Authority & Logistics Details -->
                        <div class="lg:col-span-5 flex flex-col gap-5 pt-2">
                            <!-- Genuine Business Certification -->
                            <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-white border border-slate-200 text-slate-800 text-xs font-semibold w-fit shadow-xs">
                                <span class="material-symbols-outlined text-[17px] text-[#005D2A]">verified</span>
                                <span>EPA Resource Recovery Licence #4421 • Est. 1979</span>
                            </div>

                            <!-- Hero Main Statement -->
                            <h1 class="font-headline-xl text-3xl sm:text-4xl lg:text-[42px] tracking-tight text-[#005D2A] leading-[1.14] font-bold">
                                Reliable Skip Bin Hire Across New England: Fast Delivery &amp; Local Recycling
                            </h1>

                            <p class="font-body-lg text-base text-slate-700 leading-relaxed">
                                Direct delivery from our Armidale and Glen Innes yards. Upfront pricing, 7-day standard hire included, and prompt local pickup.
                            </p>

                            <!-- Operational Standards -->
                            <div class="flex flex-col sm:flex-row sm:items-center gap-3 pt-1 text-xs font-medium text-slate-800">
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[18px] text-[#005D2A]">check_circle</span>
                                    <span>Timber Pad Driveway Protection</span>
                                </div>
                                <div class="hidden sm:inline text-slate-300">•</div>
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[18px] text-[#005D2A]">check_circle</span>
                                    <span>Zero Hidden Tip Levies</span>
                                </div>
                            </div>

                            <!-- Dynamic Selected Bin Visualizer Card (Synced directly with Step 2 Dropdown) -->
                            <div class="rounded-xl overflow-hidden shadow-sm border border-slate-200 bg-white mt-2" id="selected-bin-preview-card" data-scroll-reveal="fade-up">
                                <!-- Card Header: Bin Category, Name, Subtitle & Capacity Badge -->
                                <div class="p-4 pb-3 flex items-start justify-between gap-3 border-b border-slate-100 bg-white">
                                    <div>
                                        <span class="text-xs uppercase tracking-wider text-slate-600 font-bold block" id="preview-bin-type">Marrel with Ramp</span>
                                        <h3 class="font-headline-md text-lg sm:text-xl font-bold text-slate-900 mt-0.5" id="preview-bin-title">4m³ Renovation Skip</h3>
                                        <p class="text-xs text-[#005D2A] font-semibold mt-0.5" id="preview-bin-subtitle">Standard Bathroom &amp; Kitchen Refit</p>
                                    </div>
                                    <span class="px-3 py-1 rounded-lg bg-[#F2F9E6] text-[#005D2A] border border-[#96C93D]/40 font-headline-sm text-base font-extrabold shrink-0" id="preview-bin-capacity-badge">
                                        4m³
                                    </span>
                                </div>

                                <!-- Architectural Vector Schematic Canvas -->
                                <div class="p-3 sm:p-4 bg-slate-50 border-b border-slate-100 relative min-h-[170px] flex items-center justify-center overflow-hidden">
                                    <div id="preview-bin-svg-container" class="w-full h-36 sm:h-40 flex items-center justify-center transition-opacity duration-150">
                                        <svg class="w-full h-32 sm:h-36 drop-shadow-xs" fill="none" viewBox="0 0 240 100" xmlns="http://www.w3.org/2000/svg">
                                            <polygon fill="#005D2A" opacity="0.95" points="30,18 210,18 190,85 50,85"></polygon>
                                            <polygon fill="#00421D" opacity="0.9" points="30,18 50,85 30,85 10,18"></polygon>
                                            <polygon fill="#063620" opacity="0.8" points="210,18 230,18 210,85 190,85"></polygon>
                                            <rect fill="#FEF3C7" height="40" rx="1" stroke="#B45309" stroke-width="1.5" width="8" x="180" y="45"></rect>
                                            <line stroke="#96C93D" stroke-width="3" x1="50" x2="190" y1="85" y2="85"></line>
                                            <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="middle" x="120" y="15">2.5m Length</text>
                                            <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="start" x="205" y="60">1.15m H</text>
                                        </svg>
                                    </div>

                                    <!-- Access / Ramp Feature Badge -->
                                    <div class="absolute bottom-2.5 left-3 bg-white/95 px-2.5 py-1 rounded-md border border-slate-200 shadow-2xs flex items-center gap-1.5 text-xs font-semibold text-slate-800" id="preview-bin-ramp-box">
                                        <span class="material-symbols-outlined text-[15px] text-[#005D2A]" id="preview-bin-ramp-icon">door_front</span>
                                        <span id="preview-bin-ramp-text">Wheelbarrow Ramp Door</span>
                                    </div>
                                </div>

                                <!-- Key Capacity Metrics: Wheelie Bins, Trailers & Dimensions -->
                                <div class="p-3.5 bg-white grid grid-cols-3 gap-2 text-center text-xs">
                                    <div class="bg-slate-50 p-2 rounded-lg border border-slate-100">
                                        <span class="text-xs uppercase font-bold text-slate-600 block">Wheelie Bins</span>
                                        <span class="font-bold text-slate-900 text-xs sm:text-sm mt-0.5 block" id="preview-bin-wheelie">≈ 16 Bins</span>
                                    </div>
                                    <div class="bg-slate-50 p-2 rounded-lg border border-slate-100">
                                        <span class="text-xs uppercase font-bold text-slate-600 block">Box Trailers</span>
                                        <span class="font-bold text-slate-900 text-xs sm:text-sm mt-0.5 block" id="preview-bin-trailers">≈ 4 Trailers</span>
                                    </div>
                                    <div class="bg-slate-50 p-2 rounded-lg border border-slate-100">
                                        <span class="text-xs uppercase font-bold text-slate-600 block">Dimensions</span>
                                        <span class="font-bold text-slate-900 text-xs mt-0.5 block truncate" id="preview-bin-dims" title="2.5m × 1.5m × 1.15m">2.5m × 1.5m × 1.15m</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: THE 4-STEP BOOKING DOCK -->
                        <div class="lg:col-span-7">
                            <div class="bg-white rounded-xl shadow-md p-6 sm:p-8 border border-slate-200" data-scroll-reveal="fade-up">
                                
                                <!-- Header of Booking Module -->
                                <div class="flex items-center justify-between pb-4 border-b border-slate-200">
                                    <div>
                                        <span class="text-xs uppercase tracking-wider text-[#005D2A] font-bold">Direct Fleet Booking</span>
                                        <h2 class="font-headline-md text-xl sm:text-2xl font-bold text-slate-900 leading-tight mt-0.5">Instant 4-Step Skip Dispatch</h2>
                                    </div>
                                </div>

                                <!-- Booking Stepper Form -->
                                <form class="flex flex-col gap-4 pt-4" id="booking-calculator" onsubmit="event.preventDefault();">
                                    
                                    <!-- STEP 1: Suburb & Delivery Zone -->
                                    <div class="flex flex-col gap-1.5">
                                        <div class="flex items-center justify-between">
                                            <label for="suburb-dropdown" class="flex items-center gap-2 font-bold text-sm text-slate-900">
                                                <span class="w-6 h-6 rounded-md bg-[#005D2A] text-white flex items-center justify-center font-bold text-[12px]">1</span>
                                                <span>Delivery Location (New England Region)</span>
                                            </label>
                                            <span class="text-xs font-semibold text-[#005D2A]" id="zone-status-badge">
                                                Direct Depot Route (Free Delivery)
                                            </span>
                                        </div>
                                        <div class="relative">
                                            <select 
                                                id="suburb-dropdown"
                                                class="w-full h-12 px-3.5 rounded-lg bg-white text-slate-900 font-medium text-base sm:text-sm focus:ring-2 focus:ring-[#005D2A] focus:outline-none transition-all cursor-pointer border border-slate-300"
                                                onchange="handleSuburbChange()"
                                            >
                                                @foreach($suburbs as $suburb)
                                                    <option value="{{ $suburb->id }}" data-fee="{{ (float) $suburb->delivery_fee }}" data-name="{{ $suburb->name }}">
                                                        {{ $suburb->name }} (NSW {{ $suburb->postcode }}) — {{ (float) $suburb->delivery_fee > 0 ? '+$' . number_format($suburb->delivery_fee, 2) . ' regional transit' : 'Free Direct Depot Delivery' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- STEP 2: Bin Size Selector (Tactile Segmented Visual Cards) -->
                                    <div class="flex flex-col gap-2 pt-1">
                                        <div class="flex items-center justify-between">
                                            <label class="flex items-center gap-2 font-bold text-sm text-slate-900">
                                                <span class="w-6 h-6 rounded-md bg-[#005D2A] text-white flex items-center justify-center font-bold text-[12px]">2</span>
                                                <span>Select Bin Capacity</span>
                                            </label>
                                            <a class="text-[#005D2A] hover:underline text-xs font-semibold flex items-center gap-1" href="{{ route('bin-guide') }}">
                                                <span>View Bin Size Guide</span>
                                                <span class="material-symbols-outlined text-[15px]">arrow_forward</span>
                                            </a>
                                        </div>

                                        <!-- Hidden Accessible Select for Form State & Test Assertions -->
                                        <select 
                                            id="bin-dropdown"
                                            name="bin_id"
                                            class="sr-only"
                                            tabindex="-1"
                                            aria-hidden="true"
                                            onchange="handleBinDropdownChange()"
                                        >
                                            @foreach($binSizes as $bin)
                                                @php
                                                    $cap = (int)$bin->capacity_m3;
                                                    $isDefault = ($cap === 4);
                                                @endphp
                                                <option 
                                                    value="{{ $bin->id }}" 
                                                    data-capacity="{{ $cap }}" 
                                                    data-price="{{ (float)$bin->base_price }}" 
                                                    data-title="{{ $bin->name }}"
                                                    data-wheelie="{{ $bin->wheelie_bins_equiv }}"
                                                    data-trailers="{{ $bin->trailer_loads_equiv }}"
                                                    data-dimensions="{{ $bin->dimensions }}"
                                                    {{ $isDefault ? 'selected' : '' }}
                                                >
                                                    {{ $cap }}m³ ({{ $bin->name }}) — ${{ number_format($bin->base_price, 0) }} AUD (7-Day Standard Hire)
                                                </option>
                                            @endforeach
                                        </select>

                                        <!-- Tactile 7-Size Segmented Card Matrix (1-Tap Direct Selection & Mobile Carousel) -->
                                        <div class="sm:hidden flex items-center justify-between text-[11px] text-slate-500 font-medium pt-0.5 px-0.5">
                                            <span class="flex items-center gap-1">
                                                <span class="material-symbols-outlined text-[14px] text-[#005D2A]">swipe</span>
                                                <span>Swipe horizontally for all sizes</span>
                                            </span>
                                            <span class="text-[#005D2A] font-bold">2m³ – 12m³</span>
                                        </div>
                                        <div 
                                            id="bin-cards-grid" 
                                            class="flex sm:grid overflow-x-auto sm:overflow-visible snap-x snap-mandatory pb-2.5 sm:pb-0 sm:grid-cols-4 lg:grid-cols-7 gap-2.5 sm:gap-2 pt-1 -mx-4 px-4 sm:mx-0 sm:px-0 no-scrollbar" 
                                            role="radiogroup" 
                                            aria-label="Select Bin Capacity"
                                        >
                                            @foreach($binSizes as $bin)
                                                @php
                                                    $cap = (int)$bin->capacity_m3;
                                                    $isDefault = ($cap === 4);
                                                    $shortName = match($cap) {
                                                        2 => 'Mini',
                                                        3 => 'Domestic',
                                                        4 => 'Renovate',
                                                        6 => 'Trade',
                                                        8 => 'Project',
                                                        10 => 'Commercial',
                                                        12 => 'Industrial',
                                                        default => $bin->name
                                                    };
                                                @endphp
                                                <button
                                                    type="button"
                                                    id="bin-card-{{ $cap }}"
                                                    data-bin-id="{{ $bin->id }}"
                                                    data-capacity="{{ $cap }}"
                                                    onclick="selectBinCard({{ $bin->id }}, {{ $cap }})"
                                                    role="radio"
                                                    aria-checked="{{ $isDefault ? 'true' : 'false' }}"
                                                    class="bin-card-btn group relative shrink-0 w-[104px] sm:w-auto snap-start flex flex-col items-center justify-between p-2 sm:p-2.5 rounded-xl border text-center transition-all duration-200 cursor-pointer select-none active:scale-[0.96] hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-[#005D2A] {{ $isDefault ? 'border-2 border-[#005D2A] bg-[#F2F9E6] ring-2 ring-[#005D2A]/20 shadow-xs' : 'border-slate-200 bg-white hover:border-slate-400 hover:bg-slate-50' }}"
                                                >
                                                    @if($cap === 4)
                                                        <span class="absolute -top-2 left-1/2 -translate-x-1/2 bg-[#005D2A] text-white text-[8.5px] font-bold px-1.5 py-0.2 rounded-full uppercase tracking-wider shadow-xs whitespace-nowrap z-10">
                                                            Popular
                                                        </span>
                                                    @endif

                                                    <!-- Top: Short Name & Active Check -->
                                                    <div class="w-full flex items-center justify-between gap-1 mb-0.5">
                                                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500 truncate">{{ $shortName }}</span>
                                                        <span class="bin-card-check material-symbols-outlined text-[13px] text-[#005D2A] font-bold {{ $isDefault ? '' : 'hidden' }}">check_circle</span>
                                                    </div>

                                                    <!-- Middle: Capacity Display -->
                                                    <div class="my-0.5 py-0.5">
                                                        <span class="bin-card-capacity font-headline-md text-lg sm:text-xl font-extrabold transition-colors {{ $isDefault ? 'text-[#005D2A]' : 'text-slate-900 group-hover:text-slate-950' }}">
                                                            {{ $cap }}m³
                                                        </span>
                                                    </div>

                                                    <!-- Bottom: Price & Hire Term -->
                                                    <div class="mt-0.5 pt-1 border-t border-slate-100 w-full flex flex-col items-center">
                                                        <span class="bin-card-price text-xs font-bold transition-colors {{ $isDefault ? 'text-[#00421D]' : 'text-slate-700' }}">
                                                            ${{ number_format($bin->base_price, 0) }}
                                                        </span>
                                                        <span class="text-[9px] text-slate-500 font-medium">7-Day Hire</span>
                                                    </div>
                                                </button>
                                            @endforeach
                                        </div>

                                        <!-- Selected Bin Specs & Ramp Summary Bar -->
                                        <div class="mt-1 px-3 py-2 rounded-lg bg-slate-50 border border-slate-200 flex flex-col sm:flex-row sm:items-center justify-between gap-1.5 text-xs text-slate-700">
                                            <div class="flex items-center gap-2">
                                                <span class="material-symbols-outlined text-[16px] text-[#005D2A] shrink-0">straighten</span>
                                                <span id="bin-specs-summary-line" class="font-medium text-slate-800">Dimensions: 2.5m × 1.5m × 1.15m • Fits ≈ 16 wheelie bins (4 box trailers)</span>
                                            </div>
                                            <span id="bin-specs-ramp-pill" class="inline-flex items-center gap-1 text-xs font-semibold text-[#005D2A] bg-[#F2F9E6] px-2 py-0.5 rounded border border-[#96C93D]/40 shrink-0 self-start sm:self-auto">
                                                <span class="material-symbols-outlined text-[13px]" id="bin-specs-ramp-icon">door_front</span>
                                                <span id="bin-specs-ramp-text">Wheelbarrow Ramp Door</span>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- STEP 3 & 4: Delivery Date & Collection Date -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                                        <!-- Step 3: Delivery -->
                                        <div class="flex flex-col gap-1.5">
                                            <label for="delivery-date-picker" class="flex items-center gap-1.5 font-bold text-xs text-slate-900">
                                                <span class="w-5 h-5 rounded-md bg-[#005D2A] text-white flex items-center justify-center font-bold text-[11px]">3</span>
                                                <span>Delivery Date</span>
                                            </label>
                                            <input 
                                                type="date" 
                                                id="delivery-date-picker" 
                                                class="w-full h-12 px-3.5 rounded-xl bg-white text-slate-900 font-semibold text-base sm:text-sm focus:ring-2 focus:ring-[#005D2A] focus:outline-none border border-slate-300 cursor-pointer" 
                                            />
                                        </div>

                                        <!-- Step 4: Collection Date -->
                                        <div class="flex flex-col gap-1.5">
                                            <label for="pickup-date-picker" class="flex items-center justify-between font-bold text-xs text-slate-900">
                                                <span class="flex items-center gap-1.5">
                                                    <span class="w-5 h-5 rounded-md bg-[#005D2A] text-white flex items-center justify-center font-bold text-[11px]">4</span>
                                                    <span>Scheduled Pickup</span>
                                                </span>
                                                <span class="text-xs text-[#005D2A] font-semibold" id="hire-duration-badge">7 Days Included</span>
                                            </label>
                                            <input 
                                                type="date" 
                                                id="pickup-date-picker" 
                                                class="w-full h-12 px-3.5 rounded-xl bg-white text-slate-900 font-semibold text-base sm:text-sm focus:ring-2 focus:ring-[#005D2A] focus:outline-none border border-slate-300 cursor-pointer" 
                                            />
                                        </div>
                                    </div>

                                    <!-- Permitted Waste Material Stream Selection -->
                                    <div class="flex flex-col gap-1.5 pt-1">
                                        <label class="text-xs font-bold uppercase tracking-wider text-slate-700">Permitted Material Stream</label>
                                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                                            @foreach($wasteTypes as $type)
                                                <button 
                                                    type="button" 
                                                    class="waste-type-btn p-3.5 rounded-xl border text-left text-xs min-h-[56px] transition-all duration-200 active:scale-[0.98] flex flex-col justify-between cursor-pointer select-none focus:outline-none focus:ring-2 focus:ring-[#005D2A] {{ $loop->first ? 'border-2 border-[#005D2A] bg-[#F2F9E6] font-bold text-[#005D2A] shadow-xs' : 'border-slate-300 bg-white text-slate-900 hover:bg-slate-50' }}"
                                                    onclick="selectWasteType({{ $type->id }}, {{ (float) $type->surcharge }}, '{{ addslashes($type->name) }}', this)"
                                                >
                                                    <span class="waste-type-name font-bold text-xs truncate {{ $loop->first ? 'text-[#005D2A]' : 'text-slate-900' }}">{{ $type->name }}</span>
                                                    <span class="waste-type-surcharge text-xs font-semibold mt-1 {{ $loop->first ? 'text-[#00421D]' : 'text-slate-600' }}">
                                                        {{ (float) $type->surcharge > 0 ? '+$' . number_format($type->surcharge, 0) . ' tip surcharge' : 'Included (No Extra Surcharge)' }}
                                                    </span>
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Summary & Dynamic Price Banner -->
                                    <div class="mt-2 p-4 rounded-xl bg-slate-50 border border-slate-200 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                                        <div class="flex flex-col">
                                            <span class="text-xs font-bold uppercase tracking-wider text-slate-700">All-Inclusive Driveway Price</span>
                                            <div class="flex items-baseline gap-2">
                                                <span class="font-headline-lg text-3xl font-extrabold text-[#005D2A] tracking-tight leading-none" id="price-display">$420.00</span>
                                                <span class="text-xs text-slate-600 font-medium">AUD inc. GST &amp; EPA Tip Fees</span>
                                            </div>
                                            <span class="text-xs text-slate-700 font-medium mt-1" id="bin-summary-pill">
                                                4m³ Renovation Skip • 7 Days Standard Hire • Armidale
                                            </span>
                                        </div>

                                        <button 
                                            type="button" 
                                            onclick="openReservationModal()"
                                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 sm:py-3.5 rounded-xl bg-[#005D2A] hover:bg-[#00421D] active:scale-95 text-white shadow-md hover:shadow-lg transition-all font-bold text-sm text-center cursor-pointer"
                                        >
                                            <span>Book Bin Now</span>
                                            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                                        </button>
                                    </div>

                                    <!-- Trust Line -->
                                    <div class="pt-1 text-xs text-slate-600 flex items-center gap-1.5">
                                        <span class="material-symbols-outlined text-[16px] text-[#005D2A]">lock</span>
                                        <span>No credit card required upfront to reserve your bin dispatch.</span>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </section>
            </div>

            <!-- 2. PERMITTED VS. PROHIBITED WASTE MATRIX (NSW EPA COMPLIANCE) -->
            <section class="w-full px-6 lg:px-8 mx-auto max-w-[1280px] py-16 border-t border-border-slate-subtle" id="epa-rules-section" data-scroll-reveal="fade-up">
                <div class="bg-surface-white rounded-xl shadow-lg p-6 sm:p-10 border border-border-slate-subtle">
                    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 pb-8 border-b border-slate-100">
                        <div>
                            <span class="inline-flex items-center gap-1.5 text-secondary font-label-md text-xs uppercase tracking-wider font-semibold">
                                <span class="material-symbols-outlined text-[16px]">verified</span> NSW EPA Regulatory Compliance
                            </span>
                            <h2 class="font-headline-lg text-2xl sm:text-3xl font-bold text-text-charcoal-primary leading-tight mt-1">
                                Acceptable Materials &amp; Hazardous Rules
                            </h2>
                            <p class="font-body-md text-sm text-text-slate-muted mt-1 max-w-2xl leading-relaxed">
                                To safeguard our recovery team and regional landfill resources, please follow these disposal guidelines.
                            </p>
                        </div>

                        <!-- Emergency / Asbestos Quick Dispatch Pill -->
                        <a class="inline-flex items-center gap-3 px-4 py-3 rounded-lg bg-safety-amber-light text-safety-amber-dark font-label-md text-xs hover:bg-safety-amber-dark hover:text-on-primary transition-colors shrink-0" href="tel:0429323696">
                            <span class="material-symbols-outlined text-[24px]">warning</span>
                            <div class="flex flex-col text-left">
                                <span class="font-bold">Need Certified Asbestos Bags?</span>
                                <span class="text-xs font-semibold text-safety-amber-dark">Call Dispatch Directly: 0429 323 696</span>
                            </div>
                        </a>
                    </div>

                    <!-- Split Columns: Permitted vs Prohibited -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-6">
                        <!-- Permitted Side -->
                        <div class="p-6 rounded-xl bg-bio-emerald-light/40 flex flex-col gap-4 border border-emerald-100">
                            <div class="flex items-center gap-2 text-primary-container">
                                <span class="material-symbols-outlined text-[24px] text-secondary">check_circle</span>
                                <h3 class="font-headline-sm text-base font-bold">Permitted &amp; Recycled (General &amp; Trade)</h3>
                            </div>
                            <p class="font-body-sm text-xs text-text-slate-muted leading-relaxed">
                                These materials can be mixed safely in our standard skips and will be sorted at our New England MRF for maximum resource diversion:
                            </p>
                            <ul class="space-y-2.5 font-body-sm text-xs text-text-charcoal-primary pt-1">
                                <li class="flex items-start gap-2.5">
                                    <span class="material-symbols-outlined text-[18px] text-secondary shrink-0 mt-0.5">check</span>
                                    <span><strong>Household Goods:</strong> Furniture, couches, mattresses, broken toys, carpets, whitegoods.</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <span class="material-symbols-outlined text-[18px] text-secondary shrink-0 mt-0.5">check</span>
                                    <span><strong>Renovation &amp; Timber:</strong> Untreated timber, framing studs, cabinetry, drywall, doors, flooring.</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <span class="material-symbols-outlined text-[18px] text-secondary shrink-0 mt-0.5">check</span>
                                    <span><strong>Green Vegetation:</strong> Tree clippings, branches, garden mulch, hedge trimmings, leaves.</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <span class="material-symbols-outlined text-[18px] text-secondary shrink-0 mt-0.5">check</span>
                                    <span><strong>Masonry &amp; Masonry Rubble:</strong> Clean bricks, roof tiles, pavers, concrete chunks (keep under weight load).</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <span class="material-symbols-outlined text-[18px] text-secondary shrink-0 mt-0.5">check</span>
                                    <span><strong>Scrap Metal &amp; Plastics:</strong> Corrugated iron sheeting, steel piping, gutters, heavy plastic bins.</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Prohibited Side -->
                        <div class="p-6 rounded-xl bg-slate-50 flex flex-col gap-4 border border-slate-200">
                            <div class="flex items-center gap-2 text-error">
                                <span class="material-symbols-outlined text-[24px]">cancel</span>
                                <h3 class="font-headline-sm text-base font-bold">Prohibited or Special Notice Items</h3>
                            </div>
                            <p class="font-body-sm text-xs text-text-slate-muted leading-relaxed">
                                Strict environmental penalties apply under NSW EPA laws if deposited without certified hazardous paperwork:
                            </p>
                            <ul class="space-y-2.5 font-body-sm text-xs text-text-charcoal-primary pt-1">
                                <li class="flex items-start gap-2.5">
                                    <span class="material-symbols-outlined text-[18px] text-error shrink-0 mt-0.5">close</span>
                                    <span><strong>Asbestos &amp; Fibro Sheeting:</strong> Strictly forbidden in general skips. Requires specialized lined containers.</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <span class="material-symbols-outlined text-[18px] text-error shrink-0 mt-0.5">close</span>
                                    <span><strong>Car &amp; Machinery Tyres:</strong> Surcharged per unit due to regional tyre stewardship programs.</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <span class="material-symbols-outlined text-[18px] text-error shrink-0 mt-0.5">close</span>
                                    <span><strong>Wet Paint, Chemicals, Solvents &amp; Motor Oils:</strong> Cannot accept liquid toxic agents or wet tins.</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <span class="material-symbols-outlined text-[18px] text-error shrink-0 mt-0.5">close</span>
                                    <span><strong>LPG Gas Bottles &amp; Fire Extinguishers:</strong> Explosive compaction hazard at tip transfer station.</span>
                                </li>
                                <li class="flex items-start gap-2.5">
                                    <span class="material-symbols-outlined text-[18px] text-error shrink-0 mt-0.5">close</span>
                                    <span><strong>Commercial Food Waste &amp; Putrescible Matter:</strong> Bio-hazard &amp; pest containment regulations.</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Compliance Guarantee Footer -->
                    <div class="mt-8 p-4 rounded-xl bg-surface-slate flex flex-col sm:flex-row items-center justify-between gap-4 border border-slate-100">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-[28px] text-secondary">eco</span>
                            <span class="font-body-sm text-xs text-text-charcoal-primary">
                                Every bin collected is processed through our Glen Innes and Armidale sorting plants, extracting timber, scrap metals, and clean masonry for local infrastructure reuse.
                            </span>
                        </div>
                        <a class="text-secondary font-label-md text-xs hover:text-brand-forest-deep font-bold whitespace-nowrap" href="tel:0429323696">
                            Depot Inquiry: 0429 323 696 →
                        </a>
                    </div>
                </div>
            </section>

            <!-- 4. HOW SKIP HIRE WORKS (3 STEPS) -->
            <section class="w-full px-6 lg:px-8 mx-auto max-w-[1280px] py-16 border-t border-border-slate-subtle" data-scroll-reveal="fade-up">
                <div class="text-center max-w-xl mx-auto mb-10">
                    <span class="text-secondary font-label-md text-xs uppercase tracking-wider font-semibold">Fast, Dependable Local Delivery</span>
                    <h2 class="font-headline-lg text-2xl sm:text-3xl font-bold text-text-charcoal-primary leading-tight mt-1">
                        How Skip Hire Works in 3 Clear Steps
                    </h2>
                    <p class="font-body-md text-xs sm:text-sm text-text-slate-muted mt-2">
                        Direct booking, driveway placement with timber pads, and scheduled collection across New England.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Step 1 -->
                    <div class="bg-surface-white rounded-xl p-6 shadow-xs border border-border-slate-subtle relative overflow-hidden flex flex-col justify-between group hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 rounded-xl bg-primary-container text-on-primary flex items-center justify-center font-headline-md text-xl font-bold mb-6">
                            1
                        </div>
                        <div>
                            <h3 class="font-headline-sm text-base font-bold text-text-charcoal-primary mb-2">Select Your Bin &amp; Suburb</h3>
                            <p class="font-body-sm text-xs text-text-slate-muted leading-relaxed">
                                Choose your town, pick a capacity from 2m³ to 12m³, select your delivery date, and view your upfront price with tip fees included.
                            </p>
                        </div>
                        <div class="mt-6 pt-4 flex items-center gap-2 text-secondary font-label-md text-xs font-semibold">
                            <span class="material-symbols-outlined text-[18px]">bolt</span>
                            <span>Instant Quote Confirmation</span>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="bg-surface-white rounded-xl p-6 shadow-xs border border-border-slate-subtle relative overflow-hidden flex flex-col justify-between group hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 rounded-xl bg-primary-container text-on-primary flex items-center justify-center font-headline-md text-xl font-bold mb-6">
                            2
                        </div>
                        <div>
                            <h3 class="font-headline-sm text-base font-bold text-text-charcoal-primary mb-2">Driveway Placement</h3>
                            <p class="font-body-sm text-xs text-text-slate-muted leading-relaxed">
                                Our drivers position the bin exactly where requested, placing timber pads underneath to protect pavers and concrete surfaces.
                            </p>
                        </div>
                        <div class="mt-6 pt-4 flex items-center gap-2 text-secondary font-label-md text-xs font-semibold">
                            <span class="material-symbols-outlined text-[18px]">verified_user</span>
                            <span>Timber Pad Protection</span>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="bg-surface-white rounded-xl p-6 shadow-xs border border-border-slate-subtle relative overflow-hidden flex flex-col justify-between group hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 rounded-xl bg-primary-container text-on-primary flex items-center justify-center font-headline-md text-xl font-bold mb-6">
                            3
                        </div>
                        <div>
                            <h3 class="font-headline-sm text-base font-bold text-text-charcoal-primary mb-2">Pickup &amp; Resource Recovery</h3>
                            <p class="font-body-sm text-xs text-text-slate-muted leading-relaxed">
                                Collected at the end of your 7-day hire (or earlier upon call) and transported directly to our Armidale or Glen Innes sorting facility.
                            </p>
                        </div>
                        <div class="mt-6 pt-4 flex items-center gap-2 text-secondary font-label-md text-xs font-semibold">
                            <span class="material-symbols-outlined text-[18px]">recycling</span>
                            <span>EPA Licence #4421 Sorting</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 5. FLEET, DEPOTS & REGIONAL COVERAGE -->
            <section class="w-full px-6 lg:px-8 mx-auto max-w-[1280px] py-16 border-t border-border-slate-subtle" id="heritage-section" data-scroll-reveal="fade-up">
                <div class="bg-primary text-on-primary rounded-xl shadow-xl p-8 sm:p-12 relative overflow-hidden">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                        <!-- Left: Lancaster Family Authority -->
                        <div class="lg:col-span-7 flex flex-col gap-4">
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-[#96C93D] text-xs font-semibold w-fit border border-[#96C93D]/30">
                                <span class="material-symbols-outlined text-[16px]">history_edu</span>
                                <span>Proud Lancaster Family Operation Since 1979</span>
                            </div>
                            <h2 class="font-headline-lg text-2xl sm:text-3xl font-bold text-surface-white leading-tight">
                                Lancaster Family Fleet &amp; Facilities Across Regional NSW
                            </h2>
                            <p class="font-body-md text-xs sm:text-sm text-white/90 leading-relaxed">
                                Founded in 1979, New England Waste operates its own depots in Armidale and Glen Innes, running local trucks and drivers across the Tablelands.
                            </p>

                            <div class="pt-2">
                                <span class="font-label-md text-xs text-[#96C93D] uppercase tracking-wider block mb-2 font-bold">Direct Operating Hubs &amp; Weekly Routes:</span>
                                <div class="flex flex-wrap gap-2 text-xs">
                                    <span class="px-3 py-1 rounded bg-surface-white/10 text-surface-white font-medium">Armidale (Hub)</span>
                                    <span class="px-3 py-1 rounded bg-surface-white/10 text-surface-white font-medium">Uralla</span>
                                    <span class="px-3 py-1 rounded bg-surface-white/10 text-surface-white font-medium">Guyra</span>
                                    <span class="px-3 py-1 rounded bg-surface-white/10 text-surface-white font-medium">Glen Innes</span>
                                    <span class="px-3 py-1 rounded bg-surface-white/10 text-surface-white font-medium">Walcha</span>
                                    <span class="px-3 py-1 rounded bg-surface-white/10 text-surface-white font-medium">Black Mountain</span>
                                    <span class="px-3 py-1 rounded bg-surface-white/10 text-surface-white font-medium">Kentucky</span>
                                    <span class="px-3 py-1 rounded bg-surface-white/10 text-surface-white font-medium">Regional Rural Runs</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right: Direct Dispatch Callout Box -->
                        <div class="lg:col-span-5">
                            <div class="bg-surface-white text-text-charcoal-primary rounded-xl p-6 sm:p-8 shadow-xl flex flex-col gap-4 border border-border-slate-subtle">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-full bg-bio-emerald-light text-primary-container flex items-center justify-center shrink-0">
                                        <span class="material-symbols-outlined text-[24px]">support_agent</span>
                                    </div>
                                    <div>
                                        <span class="font-label-md text-xs uppercase tracking-wider text-text-slate-muted font-semibold">Direct Fleet Dispatch</span>
                                        <h3 class="font-headline-sm text-lg font-bold text-primary leading-none mt-0.5">Speak With a Local</h3>
                                    </div>
                                </div>
                                <p class="font-body-sm text-xs text-text-slate-muted leading-relaxed">
                                    Have a tight gate, sloping rural access, or need multiple swap-out bins for commercial demolition? Talk directly with our Lancaster family dispatch office.
                                </p>
                                <a class="w-full py-3.5 rounded-lg bg-primary-container hover:bg-brand-forest-deep text-on-primary font-headline-sm text-base font-bold text-center flex items-center justify-center gap-2 transition-colors shadow-md" href="tel:0429323696">
                                    <span class="material-symbols-outlined text-[22px]">phone_in_talk</span>
                                    <span>0429 323 696</span>
                                </a>
                                <div class="flex items-center justify-center gap-4 text-center font-body-sm text-[12px] text-text-slate-muted pt-1">
                                    <span>Mon–Fri: 8:00 AM – 5:00 PM</span>
                                    <span>•</span>
                                    <span>Urgent Weekend Standby</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <!-- FOOTER -->
    @include('partials.footer')

    <!-- MOBILE BOTTOM DOCK (Booking page viewports) -->
    <div id="mobile-booking-dock" class="md:hidden fixed bottom-0 left-0 right-0 z-40 bg-white/95 backdrop-blur-md border-t border-slate-200 px-4 py-3 pb-[max(0.85rem,env(safe-area-inset-bottom))] shadow-[0_-4px_20px_rgba(0,0,0,0.08)] flex items-center justify-between gap-3">
        <div class="flex flex-col min-w-0">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 truncate" id="dock-bin-title">4m³ Renovation Skip</span>
            <div class="flex items-baseline gap-1.5">
                <span class="font-headline-lg text-2xl font-extrabold text-[#005D2A] leading-tight" id="dock-price-display">$420.00</span>
                <span class="text-[11px] text-slate-500 font-medium truncate">inc. GST</span>
            </div>
        </div>
        <button 
            type="button" 
            onclick="openReservationModal()"
            class="shrink-0 h-12 px-6 rounded-xl bg-[#005D2A] hover:bg-[#00421D] active:scale-95 text-white font-bold text-sm shadow-md flex items-center gap-2 cursor-pointer transition-all"
        >
            <span>Book Bin</span>
            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
        </button>
    </div>

    <!-- CHECKOUT RESERVATION MODAL (Native Bottom Sheet on Mobile, Modal on Desktop) -->
    <div id="checkout-modal" onclick="if(event.target === this) closeReservationModal()" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-end sm:items-center justify-center p-0 sm:p-4 hidden transition-opacity">
        <div class="bg-white rounded-t-2xl sm:rounded-2xl shadow-2xl max-w-lg w-full p-5 sm:p-8 border-t sm:border border-slate-200 relative max-h-[92vh] sm:max-h-[90vh] flex flex-col overflow-y-auto overscroll-contain pb-[max(1.5rem,env(safe-area-inset-bottom))] sm:pb-8">
            <!-- Mobile Pull Drag Indicator -->
            <div class="w-12 h-1.5 bg-slate-300 rounded-full mx-auto sm:hidden mb-3 shrink-0" aria-hidden="true"></div>

            <div class="flex items-center justify-between pb-3.5 border-b border-slate-200 shrink-0">
                <div>
                    <span class="text-xs font-bold uppercase tracking-wider text-[#005D2A]">Direct Dispatch Reservation</span>
                    <h3 class="font-headline-sm text-xl font-bold text-slate-900 mt-0.5">Complete Your Reservation</h3>
                </div>
                <button type="button" onclick="closeReservationModal()" class="w-11 h-11 flex items-center justify-center rounded-xl text-slate-500 hover:text-slate-800 hover:bg-slate-100 active:scale-90 transition-all cursor-pointer" aria-label="Close Reservation Modal">
                    <span class="material-symbols-outlined text-[24px]">close</span>
                </button>
            </div>

            <!-- Authentic Order Summary Breakdown -->
            <div class="my-4 p-4 rounded-xl bg-slate-50 border border-slate-200 flex flex-col gap-2.5 text-xs shrink-0">
                <div class="flex justify-between items-start">
                    <div>
                        <span class="font-bold text-slate-900 text-sm block" id="modal-bin-title">4m³ Renovation Skip</span>
                        <span class="text-slate-700 font-medium" id="modal-waste-stream">General Household Waste</span>
                    </div>
                    <div class="text-right">
                        <span class="text-xl font-extrabold text-[#005D2A] font-headline-sm" id="modal-price-display">$420.00 AUD</span>
                        <span class="text-xs text-slate-700 font-medium block">Inc. GST &amp; EPA Tip Fees</span>
                    </div>
                </div>
                <div class="pt-2.5 border-t border-slate-200 flex flex-col sm:flex-row sm:justify-between text-slate-700 gap-1 text-xs">
                    <span id="modal-suburb-recap"><strong class="text-slate-900">Delivery Suburb:</strong> Armidale</span>
                    <span id="modal-dates-recap"><strong class="text-slate-900">Hire Window:</strong> 7 Days Included</span>
                </div>
            </div>

            <form id="real-checkout-form" onsubmit="handleBookingSubmit(event)" class="flex flex-col gap-3.5">
                <div>
                    <label for="cust-name" class="block text-xs font-bold uppercase tracking-wider text-slate-800 mb-1">Full Name *</label>
                    <input type="text" id="cust-name" autocomplete="name" required placeholder="e.g. David Lancaster" class="w-full h-12 px-4 rounded-xl bg-white border border-slate-300 text-slate-900 text-base sm:text-sm focus:ring-2 focus:ring-[#005D2A] focus:outline-none"/>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label for="cust-phone" class="block text-xs font-bold uppercase tracking-wider text-slate-800 mb-1">Australian Phone *</label>
                        <input type="tel" id="cust-phone" inputmode="tel" autocomplete="tel" required placeholder="0412 345 678" class="w-full h-12 px-4 rounded-xl bg-white border border-slate-300 text-slate-900 text-base sm:text-sm focus:ring-2 focus:ring-[#005D2A] focus:outline-none"/>
                    </div>
                    <div>
                        <label for="cust-email" class="block text-xs font-bold uppercase tracking-wider text-slate-800 mb-1">Email Address *</label>
                        <input type="email" id="cust-email" inputmode="email" autocomplete="email" required placeholder="name@domain.com.au" class="w-full h-12 px-4 rounded-xl bg-white border border-slate-300 text-slate-900 text-base sm:text-sm focus:ring-2 focus:ring-[#005D2A] focus:outline-none"/>
                    </div>
                </div>

                <div>
                    <label for="cust-address" class="block text-xs font-bold uppercase tracking-wider text-slate-800 mb-1">Delivery Street Address *</label>
                    <input type="text" id="cust-address" autocomplete="street-address" required placeholder="e.g. 142 Marsh Street, Armidale" class="w-full h-12 px-4 rounded-xl bg-white border border-slate-300 text-slate-900 text-base sm:text-sm focus:ring-2 focus:ring-[#005D2A] focus:outline-none"/>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-800 mb-1">Placement Position</label>
                    <div class="grid grid-cols-2 gap-2 text-xs">
                        <label class="flex items-center gap-2.5 p-3 rounded-xl border border-slate-300 bg-white has-[:checked]:border-2 has-[:checked]:border-[#005D2A] has-[:checked]:bg-[#F2F9E6] has-[:checked]:text-[#005D2A] has-[:checked]:font-bold text-slate-700 cursor-pointer min-h-[48px] transition-all">
                            <input type="radio" name="placement" value="driveway" checked class="w-4 h-4 text-[#005D2A] focus:ring-[#005D2A]"/>
                            <span>Private Driveway</span>
                        </label>
                        <label class="flex items-center gap-2.5 p-3 rounded-xl border border-slate-300 bg-white has-[:checked]:border-2 has-[:checked]:border-[#005D2A] has-[:checked]:bg-[#F2F9E6] has-[:checked]:text-[#005D2A] has-[:checked]:font-bold text-slate-700 cursor-pointer min-h-[48px] transition-all">
                            <input type="radio" name="placement" value="nature_strip" class="w-4 h-4 text-[#005D2A] focus:ring-[#005D2A]"/>
                            <span>Nature Strip</span>
                        </label>
                    </div>
                </div>

                <div id="modal-error-box" class="hidden p-3 rounded-xl bg-red-50 text-red-700 text-xs border border-red-200"></div>

                <div class="pt-2">
                    <button type="submit" id="modal-submit-btn" class="w-full h-13 py-3.5 rounded-xl bg-[#005D2A] hover:bg-[#00421D] active:scale-98 text-white font-bold text-base shadow-md transition-all flex items-center justify-center gap-2 cursor-pointer">
                        <span>Confirm &amp; Lock Reservation</span>
                        <span class="material-symbols-outlined text-[18px]">lock</span>
                    </button>
                    <p class="text-xs text-slate-700 font-medium text-center mt-2">
                        Instant reservation reference issued &amp; dispatch schedule confirmed.
                    </p>
                </div>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT STATE & ENGINE (Native Interactive Dates, AJAX Calculations & Submission) -->
    <script>
        let currentBinId = {{ $binSizes->where('capacity_m3', 4)->first()->id ?? $binSizes->first()->id ?? 1 }};
        let currentBinCapacity = 4;
        let currentBinPrice = 420;
        let currentBinTitle = '4m³ Renovation Skip';
        let currentWasteTypeId = {{ $wasteTypes->first()->id ?? 1 }};
        let currentWasteSurcharge = 0;
        let currentWasteName = '{{ $wasteTypes->first()->name ?? "General Household Waste" }}';
        let deliveryDateStr = '';
        let pickupDateStr = '';

        document.addEventListener('DOMContentLoaded', function() {
            initNativeDates();

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
            const queryBin = urlParams.get('bin');
            if (queryBin) {
                const select = document.getElementById('bin-dropdown');
                if (select) {
                    const opt = select.querySelector(`option[data-capacity="${queryBin}"]`) || select.querySelector(`option[value="${queryBin}"]`);
                    if (opt) {
                        select.value = opt.value;
                    }
                }
            }

            handleBinDropdownChange();
        });

        function selectBinCapacityAndScroll(capacity) {
            const select = document.getElementById('bin-dropdown');
            if (!select) return;
            const opt = select.querySelector(`option[data-capacity="${capacity}"]`) || select.querySelector(`option[value="${capacity}"]`);
            if (opt) {
                select.value = opt.value;
                handleBinDropdownChange();
            }
            const dock = document.getElementById('booking-dock');
            if (dock) {
                dock.scrollIntoView({ behavior: 'smooth' });
            }
        }

        function initNativeDates() {
            const today = new Date();
            let minDelivery = new Date(today);
            minDelivery.setDate(today.getDate() + 1);
            if (minDelivery.getDay() === 0) minDelivery.setDate(minDelivery.getDate() + 1); // Skip Sunday

            let defaultPickup = new Date(minDelivery);
            defaultPickup.setDate(minDelivery.getDate() + 7);
            if (defaultPickup.getDay() === 0) defaultPickup.setDate(defaultPickup.getDate() + 1);

            const formatDate = (d) => {
                const year = d.getFullYear();
                const month = String(d.getMonth() + 1).padStart(2, '0');
                const day = String(d.getDate()).padStart(2, '0');
                return `${year}-${month}-${day}`;
            };

            deliveryDateStr = formatDate(minDelivery);
            pickupDateStr = formatDate(defaultPickup);

            const deliveryInput = document.getElementById('delivery-date-picker');
            const pickupInput = document.getElementById('pickup-date-picker');

            if (deliveryInput) {
                deliveryInput.min = deliveryDateStr;
                deliveryInput.value = deliveryDateStr;
                deliveryInput.addEventListener('change', function() {
                    deliveryDateStr = this.value;
                    if (this.value) {
                        const sel = new Date(this.value + 'T00:00:00');
                        let newPickup = new Date(sel);
                        newPickup.setDate(sel.getDate() + 7);
                        if (newPickup.getDay() === 0) newPickup.setDate(newPickup.getDate() + 1);
                        pickupDateStr = formatDate(newPickup);
                        if (pickupInput) {
                            pickupInput.min = this.value;
                            pickupInput.value = pickupDateStr;
                        }
                    }
                    fetchServerPricing();
                });
            }

            if (pickupInput) {
                pickupInput.min = deliveryDateStr;
                pickupInput.value = pickupDateStr;
                pickupInput.addEventListener('change', function() {
                    pickupDateStr = this.value;
                    fetchServerPricing();
                });
            }
        }

        const binVisualData = {
            2: {
                capacity: '2m³',
                name: '2m³ Mini Skip',
                subtitle: 'Garden Tidy & Small Cleanout',
                typeTitle: 'Standard Marrel Skip',
                rampLabel: 'No Ramp Door',
                rampIcon: null,
                wheelie: '≈ 8 Bins (240L)',
                trailers: '≈ 2 Trailers',
                dims: '2.0m × 1.4m × 0.95m',
                svg: `<svg class="w-full h-32 sm:h-36 drop-shadow-xs" fill="none" viewBox="0 0 240 100" xmlns="http://www.w3.org/2000/svg">
                    <polygon fill="#005D2A" opacity="0.95" points="40,25 200,25 180,85 60,85"></polygon>
                    <polygon fill="#00421D" opacity="0.9" points="40,25 60,85 45,85 25,25"></polygon>
                    <polygon fill="#063620" opacity="0.8" points="200,25 215,25 195,85 180,85"></polygon>
                    <line stroke="#96C93D" stroke-width="3" x1="60" x2="180" y1="85" y2="85"></line>
                    <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="middle" x="120" y="20">2.0m Length</text>
                    <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="start" x="195" y="60">0.95m H</text>
                </svg>`
            },
            3: {
                capacity: '3m³',
                name: '3m³ Domestic Skip',
                subtitle: 'Small Household Purge',
                typeTitle: 'Standard Marrel Skip',
                rampLabel: 'Compact Footprint',
                rampIcon: null,
                wheelie: '≈ 12 Bins (240L)',
                trailers: '≈ 3 Trailers',
                dims: '2.4m × 1.4m × 1.00m',
                svg: `<svg class="w-full h-32 sm:h-36 drop-shadow-xs" fill="none" viewBox="0 0 240 100" xmlns="http://www.w3.org/2000/svg">
                    <polygon fill="#005D2A" opacity="0.95" points="35,22 205,22 185,85 55,85"></polygon>
                    <polygon fill="#00421D" opacity="0.9" points="35,22 55,85 38,85 18,22"></polygon>
                    <polygon fill="#063620" opacity="0.8" points="205,22 222,22 202,85 185,85"></polygon>
                    <line stroke="#96C93D" stroke-width="3" x1="55" x2="185" y1="85" y2="85"></line>
                    <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="middle" x="120" y="18">2.4m Length</text>
                    <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="start" x="200" y="60">1.00m H</text>
                </svg>`
            },
            4: {
                capacity: '4m³',
                name: '4m³ Renovation Skip',
                subtitle: 'Standard Bathroom & Kitchen Refit',
                typeTitle: 'Marrel with Ramp',
                rampLabel: 'Wheelbarrow Ramp Door',
                rampIcon: 'door_front',
                wheelie: '≈ 16 Bins (240L)',
                trailers: '≈ 4 Trailers',
                dims: '2.5m × 1.5m × 1.15m',
                svg: `<svg class="w-full h-32 sm:h-36 drop-shadow-xs" fill="none" viewBox="0 0 240 100" xmlns="http://www.w3.org/2000/svg">
                    <polygon fill="#005D2A" opacity="0.95" points="30,18 210,18 190,85 50,85"></polygon>
                    <polygon fill="#00421D" opacity="0.9" points="30,18 50,85 30,85 10,18"></polygon>
                    <polygon fill="#063620" opacity="0.8" points="210,18 230,18 210,85 190,85"></polygon>
                    <rect fill="#FEF3C7" height="40" rx="1" stroke="#B45309" stroke-width="1.5" width="8" x="180" y="45"></rect>
                    <line stroke="#96C93D" stroke-width="3" x1="50" x2="190" y1="85" y2="85"></line>
                    <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="middle" x="120" y="15">2.5m Length</text>
                    <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="start" x="205" y="60">1.15m H</text>
                </svg>`
            },
            6: {
                capacity: '6m³',
                name: '6m³ Trade Skip',
                subtitle: 'Medium Construction & Estate Clearouts',
                typeTitle: 'Trade Marrel Skip',
                rampLabel: 'Swing-Door Ramp',
                rampIcon: 'door_front',
                wheelie: '≈ 24 Bins (240L)',
                trailers: '≈ 6 Trailers',
                dims: '3.6m × 1.5m × 1.25m',
                svg: `<svg class="w-full h-32 sm:h-36 drop-shadow-xs" fill="none" viewBox="0 0 240 100" xmlns="http://www.w3.org/2000/svg">
                    <polygon fill="#005D2A" opacity="0.95" points="25,14 215,14 195,85 45,85"></polygon>
                    <polygon fill="#00421D" opacity="0.9" points="25,14 45,85 25,85 5,14"></polygon>
                    <polygon fill="#063620" opacity="0.8" points="215,14 235,14 215,85 195,85"></polygon>
                    <rect fill="#FEF3C7" height="55" rx="1" stroke="#B45309" stroke-width="1.5" width="8" x="186" y="30"></rect>
                    <line stroke="#96C93D" stroke-width="3" x1="45" x2="195" y1="85" y2="85"></line>
                    <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="middle" x="120" y="12">3.6m Length</text>
                    <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="start" x="208" y="55">1.25m H</text>
                </svg>`
            },
            8: {
                capacity: '8m³',
                name: '8m³ Project Skip',
                subtitle: 'Major Home Building & Bulky Waste',
                typeTitle: 'Heavy Marrel Skip',
                rampLabel: 'High Wall Ramp',
                rampIcon: 'door_front',
                wheelie: '≈ 32 Bins (240L)',
                trailers: '≈ 8 Trailers',
                dims: '4.0m × 1.6m × 1.50m',
                svg: `<svg class="w-full h-32 sm:h-36 drop-shadow-xs" fill="none" viewBox="0 0 240 100" xmlns="http://www.w3.org/2000/svg">
                    <polygon fill="#005D2A" opacity="0.95" points="20,10 220,10 200,85 40,85"></polygon>
                    <polygon fill="#00421D" opacity="0.9" points="20,10 40,85 20,85 0,10"></polygon>
                    <polygon fill="#063620" opacity="0.8" points="220,10 240,10 220,85 200,85"></polygon>
                    <rect fill="#FEF3C7" height="65" rx="1" stroke="#B45309" stroke-width="1.5" width="10" x="190" y="20"></rect>
                    <line stroke="#96C93D" stroke-width="3" x1="40" x2="200" y1="85" y2="85"></line>
                    <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="middle" x="120" y="8">4.0m Length</text>
                    <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="start" x="215" y="50">1.50m H</text>
                </svg>`
            },
            10: {
                capacity: '10m³',
                name: '10m³ Commercial Skip',
                subtitle: 'Commercial Contractors & Bulky Debris',
                typeTitle: 'Commercial Hooklift',
                rampLabel: 'Full Walk-In Doors',
                rampIcon: 'meeting_room',
                wheelie: '≈ 40 Bins (240L)',
                trailers: '≈ 10 Trailers',
                dims: '4.6m × 1.7m × 1.50m',
                svg: `<svg class="w-full h-32 sm:h-36 drop-shadow-xs" fill="none" viewBox="0 0 240 100" xmlns="http://www.w3.org/2000/svg">
                    <rect fill="#005D2A" height="68" opacity="0.95" rx="2" width="190" x="25" y="16"></rect>
                    <line stroke="#96C93D" stroke-width="3" x1="25" x2="215" y1="84" y2="84"></line>
                    <path d="M 215 16 L 228 35 L 228 84" fill="none" stroke="#CBD5E1" stroke-width="4"></path>
                    <circle cx="218" cy="82" fill="#334155" r="5"></circle>
                    <line stroke="#00421D" stroke-dasharray="3 3" stroke-width="1.5" x1="120" x2="120" y1="16" y2="84"></line>
                    <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="middle" x="120" y="12">4.6m Length</text>
                    <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="start" x="210" y="55">1.50m H</text>
                </svg>`
            },
            12: {
                capacity: '12m³',
                name: '12m³ Industrial Skip',
                subtitle: 'Civil Demolition & Bulk Industrial',
                typeTitle: 'Civil Bulk Hooklift',
                rampLabel: 'Double Walk-In Rear Doors',
                rampIcon: 'door_sliding',
                wheelie: '≈ 48 Bins (240L)',
                trailers: '≈ 12 Trailers',
                dims: '5.2m × 1.8m × 1.60m',
                svg: `<svg class="w-full h-32 sm:h-36 drop-shadow-xs" fill="none" viewBox="0 0 240 100" xmlns="http://www.w3.org/2000/svg">
                    <rect fill="#005D2A" height="72" opacity="0.95" rx="2" width="205" x="15" y="12"></rect>
                    <line stroke="#96C93D" stroke-width="3" x1="15" x2="220" y1="84" y2="84"></line>
                    <circle cx="20" cy="85" fill="#334155" r="4.5"></circle>
                    <circle cx="215" cy="85" fill="#334155" r="4.5"></circle>
                    <line stroke="#00421D" stroke-width="2" x1="115" x2="115" y1="12" y2="84"></line>
                    <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="middle" x="115" y="9">5.2m Length</text>
                    <text fill="#0F172A" font-family="Inter" font-size="9" font-weight="600" text-anchor="start" x="210" y="52">1.60m H</text>
                </svg>`
            }
        };

        function updateBinPreviewVisual(capacity) {
            const data = binVisualData[capacity] || binVisualData[4];
            if (!data) return;

            const typeEl = document.getElementById('preview-bin-type');
            const titleEl = document.getElementById('preview-bin-title');
            const subtitleEl = document.getElementById('preview-bin-subtitle');
            const badgeEl = document.getElementById('preview-bin-capacity-badge');
            const svgContainer = document.getElementById('preview-bin-svg-container');
            const rampIcon = document.getElementById('preview-bin-ramp-icon');
            const rampText = document.getElementById('preview-bin-ramp-text');
            const wheelieEl = document.getElementById('preview-bin-wheelie');
            const trailersEl = document.getElementById('preview-bin-trailers');
            const dimsEl = document.getElementById('preview-bin-dims');

            if (typeEl) typeEl.textContent = data.typeTitle;
            if (titleEl) titleEl.textContent = data.name;
            if (subtitleEl) subtitleEl.textContent = data.subtitle;
            if (badgeEl) badgeEl.textContent = data.capacity;
            if (wheelieEl) wheelieEl.textContent = data.wheelie;
            if (trailersEl) trailersEl.textContent = data.trailers;
            if (dimsEl) {
                dimsEl.textContent = data.dims;
                dimsEl.title = data.dims;
            }

            if (rampText) rampText.textContent = data.rampLabel;
            if (rampIcon) {
                if (data.rampIcon) {
                    rampIcon.textContent = data.rampIcon;
                    rampIcon.classList.remove('hidden');
                } else {
                    rampIcon.classList.add('hidden');
                }
            }

            if (svgContainer) {
                svgContainer.style.opacity = '0';
                setTimeout(() => {
                    svgContainer.innerHTML = data.svg;
                    svgContainer.style.opacity = '1';
                }, 80);
            }
        }

        function selectBinCard(binId, capacity) {
            const select = document.getElementById('bin-dropdown');
            if (select) {
                select.value = binId;
            }
            handleBinDropdownChange();
        }

        function syncBinCardSelection(selectedBinId) {
            document.querySelectorAll('.bin-card-btn').forEach(btn => {
                const isSelected = (parseInt(btn.dataset.binId) === parseInt(selectedBinId));
                if (isSelected) {
                    btn.classList.add('border-2', 'border-[#005D2A]', 'bg-[#F2F9E6]', 'ring-2', 'ring-[#005D2A]/20', 'shadow-xs');
                    btn.classList.remove('border-slate-200', 'bg-white', 'hover:border-slate-400', 'hover:bg-slate-50');
                    btn.setAttribute('aria-checked', 'true');
                    
                    const capText = btn.querySelector('.bin-card-capacity');
                    if (capText) {
                        capText.classList.add('text-[#005D2A]');
                        capText.classList.remove('text-slate-900', 'group-hover:text-slate-950');
                    }
                    const priceText = btn.querySelector('.bin-card-price');
                    if (priceText) {
                        priceText.classList.add('text-[#00421D]');
                        priceText.classList.remove('text-slate-700');
                    }
                    const checkIcon = btn.querySelector('.bin-card-check');
                    if (checkIcon) {
                        checkIcon.classList.remove('hidden');
                    }
                } else {
                    btn.classList.remove('border-2', 'border-[#005D2A]', 'bg-[#F2F9E6]', 'ring-2', 'ring-[#005D2A]/20', 'shadow-xs');
                    btn.classList.add('border-slate-200', 'bg-white', 'hover:border-slate-400', 'hover:bg-slate-50');
                    btn.setAttribute('aria-checked', 'false');

                    const capText = btn.querySelector('.bin-card-capacity');
                    if (capText) {
                        capText.classList.remove('text-[#005D2A]');
                        capText.classList.add('text-slate-900', 'group-hover:text-slate-950');
                    }
                    const priceText = btn.querySelector('.bin-card-price');
                    if (priceText) {
                        priceText.classList.remove('text-[#00421D]');
                        priceText.classList.add('text-slate-700');
                    }
                    const checkIcon = btn.querySelector('.bin-card-check');
                    if (checkIcon) {
                        checkIcon.classList.add('hidden');
                    }
                }
            });
        }

        function handleBinDropdownChange() {
            const select = document.getElementById('bin-dropdown');
            if (!select) return;
            const selectedOpt = select.options[select.selectedIndex] || select.options[0];
            if (!selectedOpt) return;
            
            currentBinId = parseInt(select.value);
            currentBinCapacity = parseInt(selectedOpt.dataset.capacity);
            currentBinPrice = parseFloat(selectedOpt.dataset.price);
            currentBinTitle = selectedOpt.dataset.title;

            // Update specs helper line
            const specsLine = document.getElementById('bin-specs-summary-line');
            if (specsLine) {
                specsLine.textContent = `Dimensions: ${selectedOpt.dataset.dimensions} • Fits ≈ ${selectedOpt.dataset.trailers} standard box trailers`;
            }

            // Update Step 2 ramp summary pill
            const rampPill = document.getElementById('bin-specs-ramp-pill');
            const rampText = document.getElementById('bin-specs-ramp-text');
            const rampIcon = document.getElementById('bin-specs-ramp-icon');
            const visualData = binVisualData[currentBinCapacity] || binVisualData[4];
            if (rampPill && visualData) {
                if (rampText) rampText.textContent = visualData.rampLabel;
                if (rampIcon) {
                    if (visualData.rampIcon) {
                        rampIcon.textContent = visualData.rampIcon;
                        rampIcon.classList.remove('hidden');
                    } else {
                        rampIcon.classList.add('hidden');
                    }
                }
                if (visualData.rampIcon) {
                    rampPill.className = 'inline-flex items-center gap-1 text-xs font-semibold text-[#005D2A] bg-[#F2F9E6] px-2 py-0.5 rounded border border-[#96C93D]/40 shrink-0 self-start sm:self-auto';
                } else {
                    rampPill.className = 'inline-flex items-center gap-1 text-xs font-medium text-slate-600 bg-slate-100 px-2 py-0.5 rounded border border-slate-200 shrink-0 self-start sm:self-auto';
                }
            }

            // Sync visual cards active state
            syncBinCardSelection(currentBinId);

            // Sync mobile dock title
            const dockTitle = document.getElementById('dock-bin-title');
            if (dockTitle) dockTitle.textContent = currentBinTitle;

            // Dynamically update the visual diagram & specs on the left card
            updateBinPreviewVisual(currentBinCapacity);

            fetchServerPricing();
        }

        function selectWasteType(id, surcharge, name, btn) {
            currentWasteTypeId = id;
            currentWasteSurcharge = surcharge;
            currentWasteName = name;

            document.querySelectorAll('.waste-type-btn').forEach(b => {
                b.classList.remove('border-2', 'border-[#005D2A]', 'bg-[#F2F9E6]', 'font-bold', 'text-[#005D2A]', 'shadow-xs');
                b.classList.add('border-slate-300', 'bg-white', 'text-slate-900');
                const titleEl = b.querySelector('.waste-type-name');
                if (titleEl) {
                    titleEl.classList.remove('text-[#005D2A]');
                    titleEl.classList.add('text-slate-900');
                }
                const surchargeEl = b.querySelector('.waste-type-surcharge');
                if (surchargeEl) {
                    surchargeEl.classList.remove('text-[#00421D]');
                    surchargeEl.classList.add('text-slate-600');
                }
            });

            btn.classList.add('border-2', 'border-[#005D2A]', 'bg-[#F2F9E6]', 'font-bold', 'text-[#005D2A]', 'shadow-xs');
            btn.classList.remove('border-slate-300', 'bg-white', 'text-slate-900');
            const activeTitle = btn.querySelector('.waste-type-name');
            if (activeTitle) {
                activeTitle.classList.add('text-[#005D2A]');
                activeTitle.classList.remove('text-slate-900');
            }
            const activeSurcharge = btn.querySelector('.waste-type-surcharge');
            if (activeSurcharge) {
                activeSurcharge.classList.add('text-[#00421D]');
                activeSurcharge.classList.remove('text-slate-600');
            }

            fetchServerPricing();
        }

        function handleSuburbChange() {
            fetchServerPricing();
        }

        async function fetchServerPricing() {
            const suburbSelect = document.getElementById('suburb-dropdown');
            if (!suburbSelect) return;
            const suburbId = suburbSelect.value;
            if (!suburbId || !currentBinId || !deliveryDateStr || !pickupDateStr) return;

            const priceEl = document.getElementById('price-display');
            const dockPriceEl = document.getElementById('dock-price-display');
            if (priceEl) priceEl.classList.add('opacity-40', 'animate-pulse');
            if (dockPriceEl) dockPriceEl.classList.add('opacity-40', 'animate-pulse');

            try {
                const res = await fetch('/order/skipbin/calculate', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        suburb_id: suburbId,
                        bin_size_id: currentBinId,
                        waste_type_id: currentWasteTypeId,
                        delivery_date: deliveryDateStr,
                        pickup_date: pickupDateStr
                    })
                });

                const data = await res.json();
                if (data.success && data.pricing) {
                    const p = data.pricing;
                    if (priceEl) {
                        priceEl.textContent = p.total_inc_gst_formatted;
                        priceEl.classList.remove('price-flash');
                        void priceEl.offsetWidth;
                        priceEl.classList.add('price-flash');
                    }

                    if (dockPriceEl) {
                        dockPriceEl.textContent = p.total_inc_gst_formatted;
                        dockPriceEl.classList.remove('price-flash');
                        void dockPriceEl.offsetWidth;
                        dockPriceEl.classList.add('price-flash');
                    }

                    const summaryPill = document.getElementById('bin-summary-pill');
                    if (summaryPill) {
                        const subName = suburbSelect.options[suburbSelect.selectedIndex].text;
                        summaryPill.textContent = `${currentBinTitle} • ${p.total_days} Days Standard Hire • ${subName}`;
                    }
                    
                    const durationBadge = document.getElementById('hire-duration-badge');
                    if (durationBadge) {
                        if (p.extra_days > 0) {
                            durationBadge.textContent = `${p.total_days} Days (${p.extra_days}d extra)`;
                            durationBadge.classList.add('text-[#005D2A]', 'font-bold');
                        } else {
                            durationBadge.textContent = '7 Days Included';
                            durationBadge.classList.remove('text-[#005D2A]', 'font-bold');
                        }
                    }
                }
            } catch (err) {
                console.warn('Pricing fetch error:', err);
            } finally {
                if (priceEl) priceEl.classList.remove('opacity-40', 'animate-pulse');
                if (dockPriceEl) dockPriceEl.classList.remove('opacity-40', 'animate-pulse');
            }
        }

        function openReservationModal() {
            const suburbSelect = document.getElementById('suburb-dropdown');
            const suburbName = suburbSelect ? suburbSelect.options[suburbSelect.selectedIndex].text : 'Local Area';
            const priceText = document.getElementById('price-display').textContent;

            document.getElementById('modal-bin-title').textContent = currentBinTitle;
            document.getElementById('modal-waste-stream').textContent = currentWasteName;
            document.getElementById('modal-price-display').textContent = priceText + ' AUD';
            document.getElementById('modal-suburb-recap').innerHTML = `<strong class="text-slate-900">Delivery Suburb:</strong> ${suburbName}`;
            document.getElementById('modal-dates-recap').innerHTML = `<strong class="text-slate-900">Hire Window:</strong> ${deliveryDateStr} → ${pickupDateStr}`;
            document.getElementById('checkout-modal').classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeReservationModal() {
            document.getElementById('checkout-modal').classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        // Dismiss modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeReservationModal();
            }
        });

        async function handleBookingSubmit(e) {
            e.preventDefault();
            const btn = document.getElementById('modal-submit-btn');
            const errBox = document.getElementById('modal-error-box');
            errBox.classList.add('hidden');
            document.querySelectorAll('#real-checkout-form input').forEach(input => {
                input.classList.remove('border-red-500', 'ring-2', 'ring-red-500/20');
            });
            btn.disabled = true;
            btn.innerHTML = '<span>Processing Dispatch...</span>';

            const payload = {
                suburb_id: document.getElementById('suburb-dropdown').value,
                bin_size_id: currentBinId,
                waste_type_id: currentWasteTypeId,
                delivery_date: deliveryDateStr,
                pickup_date: pickupDateStr,
                customer_name: document.getElementById('cust-name').value,
                customer_phone: document.getElementById('cust-phone').value,
                customer_email: document.getElementById('cust-email').value,
                delivery_address: document.getElementById('cust-address').value,
                placement_location: document.querySelector('input[name="placement"]:checked').value,
            };

            try {
                const res = await fetch('/order/skipbin/store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                const data = await res.json();
                if (res.ok && data.success) {
                    window.location.href = data.redirect_url;
                } else {
                    errBox.classList.remove('hidden');
                    if (data.errors) {
                        const firstKey = Object.keys(data.errors)[0];
                        errBox.textContent = data.errors[firstKey][0];

                        const fieldMap = {
                            'customer_name': 'cust-name',
                            'customer_phone': 'cust-phone',
                            'customer_email': 'cust-email',
                            'delivery_address': 'cust-address'
                        };

                        for (const key of Object.keys(data.errors)) {
                            if (fieldMap[key]) {
                                const inputEl = document.getElementById(fieldMap[key]);
                                if (inputEl) {
                                    inputEl.classList.add('border-red-500', 'ring-2', 'ring-red-500/20');
                                    inputEl.addEventListener('input', () => {
                                        inputEl.classList.remove('border-red-500', 'ring-2', 'ring-red-500/20');
                                    }, { once: true });
                                }
                            }
                        }

                        if (fieldMap[firstKey]) {
                            document.getElementById(fieldMap[firstKey])?.focus();
                        }
                    } else {
                        errBox.textContent = data.message || 'Validation error occurred. Please check your phone number and address.';
                    }
                    btn.disabled = false;
                    btn.innerHTML = '<span>Confirm &amp; Lock Reservation</span><span class="material-symbols-outlined text-[18px]">lock</span>';
                }
            } catch (err) {
                errBox.classList.remove('hidden');
                errBox.textContent = 'Network error. Please call dispatch on 0429 323 696.';
                btn.disabled = false;
                btn.innerHTML = '<span>Confirm &amp; Lock Reservation</span><span class="material-symbols-outlined text-[18px]">lock</span>';
            }
        }
    </script>
</body>
</html>