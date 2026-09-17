<!-- SHARED UNIFIED BRAND FOOTER (New England Waste & Recycling) -->
<footer id="site-footer" class="w-full bg-white border-t border-slate-200 text-slate-700">
    <div class="w-full px-4 sm:px-6 lg:px-8 mx-auto max-w-7xl pt-14 pb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-10">
            
            <!-- Column 1: Brand & Contact Info (lg:col-span-4) -->
            <div class="lg:col-span-4 flex flex-col gap-4">
                <div class="flex items-center gap-3">
                    <img 
                        src="/images/logo.webp" 
                        alt="New England Waste &amp; Recycling" 
                        class="h-9 w-auto object-contain" 
                        loading="lazy"
                        onerror="this.onerror=null; this.src='https://newenglandwaste.com.au/wp-content/uploads/2026/03/cropped-3264_Logo_Horizontal-scaled-1.webp';"
                    />
                    <span class="text-lg font-bold text-[#005D2A] tracking-tight">New England Waste</span>
                </div>
                
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-[#F2F9E6] border border-[#96C93D]/50 text-[#00421D] text-xs font-semibold w-fit">
                    <span class="material-symbols-outlined text-[18px] text-[#005D2A]">family_history</span>
                    <span>Lancaster Family Owned &amp; Operated Since 1979</span>
                </div>
                
                <p class="text-xs text-slate-600 leading-relaxed">
                    Skip bin hire, commercial recycling, and materials recovery across Armidale, Glen Innes, Guyra, Uralla, and surrounding New England districts since 1979.
                </p>
                
                <div class="flex flex-col gap-2.5 text-xs text-slate-600 pt-2">
                    <div class="flex items-center gap-2.5 text-slate-900 font-semibold">
                        <span class="material-symbols-outlined text-[18px] text-[#005D2A]">call</span>
                        <a class="hover:text-[#005D2A] transition-colors" href="tel:0429323696">0429 323 696</a>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <span class="material-symbols-outlined text-[18px] text-[#005D2A]">mail</span>
                        <a class="hover:text-[#005D2A] transition-colors" href="mailto:customerservice@newrecycling.com.au">customerservice@newrecycling.com.au</a>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <span class="material-symbols-outlined text-[18px] text-[#005D2A]">schedule</span>
                        <span>Mon–Sat 6:30am–5:30pm</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <span class="material-symbols-outlined text-[18px] text-[#005D2A]">chat</span>
                        <a class="hover:text-[#005D2A] transition-colors font-medium text-[#005D2A]" href="https://wa.me/61429323696" target="_blank" rel="noopener">WhatsApp Direct Dispatch</a>
                    </div>
                </div>
            </div>

            <!-- Column 2: Skip Bins & Sizes (lg:col-span-3) -->
            <div class="lg:col-span-3 flex flex-col gap-3">
                <span class="text-xs font-bold text-slate-900 uppercase tracking-wider">Skip Bins &amp; Sizes</span>
                <ul class="flex flex-col gap-1 text-xs text-slate-600">
                    <li class="flex items-center justify-between group hover:text-[#005D2A] transition-colors py-1 sm:py-0.5">
                        <a href="{{ route('bin-guide') }}#bin-2" class="hover:underline py-0.5">2m³ Mini Skip Bin</a>
                        <button type="button" onclick="selectBinCapacityAndScroll(2)" class="text-xs text-[#005D2A] font-semibold hover:underline cursor-pointer transition-colors px-2.5 py-1 rounded bg-slate-50 sm:bg-transparent border border-slate-200 sm:border-transparent active:scale-95" title="Select 2m³ in booking calculator">Select</button>
                    </li>
                    <li class="flex items-center justify-between group hover:text-[#005D2A] transition-colors py-1 sm:py-0.5">
                        <a href="{{ route('bin-guide') }}#bin-3" class="hover:underline py-0.5">3m³ Domestic Skip</a>
                        <button type="button" onclick="selectBinCapacityAndScroll(3)" class="text-xs text-[#005D2A] font-semibold hover:underline cursor-pointer transition-colors px-2.5 py-1 rounded bg-slate-50 sm:bg-transparent border border-slate-200 sm:border-transparent active:scale-95" title="Select 3m³ in booking calculator">Select</button>
                    </li>
                    <li class="flex items-center justify-between group hover:text-[#005D2A] transition-colors py-1 sm:py-0.5">
                        <a href="{{ route('bin-guide') }}#bin-4" class="hover:underline py-0.5">4m³ Renovator Skip</a>
                        <button type="button" onclick="selectBinCapacityAndScroll(4)" class="text-xs text-[#005D2A] font-semibold hover:underline cursor-pointer transition-colors px-2.5 py-1 rounded bg-slate-50 sm:bg-transparent border border-slate-200 sm:border-transparent active:scale-95" title="Select 4m³ in booking calculator">Select</button>
                    </li>
                    <li class="flex items-center justify-between group hover:text-[#005D2A] transition-colors py-1 sm:py-0.5">
                        <a href="{{ route('bin-guide') }}#bin-6" class="hover:underline py-0.5">6m³ Heavy Trade Skip</a>
                        <button type="button" onclick="selectBinCapacityAndScroll(6)" class="text-xs text-[#005D2A] font-semibold hover:underline cursor-pointer transition-colors px-2.5 py-1 rounded bg-slate-50 sm:bg-transparent border border-slate-200 sm:border-transparent active:scale-95" title="Select 6m³ in booking calculator">Select</button>
                    </li>
                    <li class="flex items-center justify-between group hover:text-[#005D2A] transition-colors py-1 sm:py-0.5">
                        <a href="{{ route('bin-guide') }}#bin-8" class="hover:underline py-0.5">8m³ Commercial Bin</a>
                        <button type="button" onclick="selectBinCapacityAndScroll(8)" class="text-xs text-[#005D2A] font-semibold hover:underline cursor-pointer transition-colors px-2.5 py-1 rounded bg-slate-50 sm:bg-transparent border border-slate-200 sm:border-transparent active:scale-95" title="Select 8m³ in booking calculator">Select</button>
                    </li>
                    <li class="flex items-center justify-between group hover:text-[#005D2A] transition-colors py-1 sm:py-0.5">
                        <a href="{{ route('bin-guide') }}#bin-10" class="hover:underline py-0.5">10m³ Bulk Industrial</a>
                        <button type="button" onclick="selectBinCapacityAndScroll(10)" class="text-xs text-[#005D2A] font-semibold hover:underline cursor-pointer transition-colors px-2.5 py-1 rounded bg-slate-50 sm:bg-transparent border border-slate-200 sm:border-transparent active:scale-95" title="Select 10m³ in booking calculator">Select</button>
                    </li>
                    <li class="flex items-center justify-between group hover:text-[#005D2A] transition-colors py-1 sm:py-0.5">
                        <a href="{{ route('bin-guide') }}#bin-12" class="hover:underline py-0.5">12m³ Commercial Hooklift</a>
                        <button type="button" onclick="selectBinCapacityAndScroll(12)" class="text-xs text-[#005D2A] font-semibold hover:underline cursor-pointer transition-colors px-2.5 py-1 rounded bg-slate-50 sm:bg-transparent border border-slate-200 sm:border-transparent active:scale-95" title="Select 12m³ in booking calculator">Select</button>
                    </li>
                </ul>
                <div class="pt-2">
                    <a href="{{ route('bin-guide') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#005D2A] hover:underline py-1">
                        <span>Compare All 7 Bin Dimensions</span>
                        <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                    </a>
                </div>
            </div>

            <!-- Column 3: Service Areas & Routes (lg:col-span-2) -->
            <div class="lg:col-span-2 flex flex-col gap-3">
                <span class="text-xs font-bold text-slate-900 uppercase tracking-wider">Service Areas &amp; Routes</span>
                <ul class="flex flex-col gap-1 text-xs text-slate-600">
                    <li class="hover:text-[#005D2A] transition-colors py-1 sm:py-0.5">
                        <a href="{{ route('service-areas') }}?town=Armidale#regional-vector-map" class="hover:underline py-0.5 block">Armidale Central Depot</a>
                    </li>
                    <li class="hover:text-[#005D2A] transition-colors py-1 sm:py-0.5">
                        <a href="{{ route('service-areas') }}?town=Glen+Innes#regional-vector-map" class="hover:underline py-0.5 block">Glen Innes Facility Yard</a>
                    </li>
                    <li class="hover:text-[#005D2A] transition-colors py-1 sm:py-0.5">
                        <a href="{{ route('service-areas') }}?town=Guyra#regional-vector-map" class="hover:underline py-0.5 block">Guyra High Country Run</a>
                    </li>
                    <li class="hover:text-[#005D2A] transition-colors py-1 sm:py-0.5">
                        <a href="{{ route('service-areas') }}?town=Uralla#regional-vector-map" class="hover:underline py-0.5 block">Uralla Township &amp; Surrounds</a>
                    </li>
                    <li class="hover:text-[#005D2A] transition-colors py-1 sm:py-0.5">
                        <a href="{{ route('service-areas') }}?town=Walcha#regional-vector-map" class="hover:underline py-0.5 block">Walcha &amp; Southern Slopes</a>
                    </li>
                    <li class="hover:text-[#005D2A] transition-colors py-1 sm:py-0.5">
                        <a href="{{ route('home') }}#epa-rules-section" class="hover:underline py-0.5 block">Accepted Waste &amp; EPA Rules</a>
                    </li>
                </ul>
                <div class="pt-2">
                    <a href="{{ route('service-areas') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-[#005D2A] hover:underline">
                        <span>View Interactive Route Map</span>
                        <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                    </a>
                </div>
            </div>

            <!-- Column 4: Secure Payments & Standards (lg:col-span-3) -->
            <div class="lg:col-span-3 flex flex-col gap-4">
                <span class="text-xs font-bold text-slate-900 uppercase tracking-wider">Secure Trade Payments</span>
                <p class="text-xs text-slate-600 leading-relaxed">
                    Direct booking confirmation with secure regional card and merchant processing.
                </p>
                <div class="flex flex-wrap items-center gap-2">
                    <span class="px-2.5 py-1.5 rounded bg-slate-50 border border-slate-200 text-xs font-semibold text-slate-800">Visa</span>
                    <span class="px-2.5 py-1.5 rounded bg-slate-50 border border-slate-200 text-xs font-semibold text-slate-800">Mastercard</span>
                    <span class="px-2.5 py-1.5 rounded bg-slate-50 border border-slate-200 text-xs font-semibold text-slate-800">EFTPOS</span>
                    <span class="px-2.5 py-1.5 rounded bg-slate-50 border border-slate-200 text-xs font-semibold text-slate-800">Apple Pay</span>
                </div>
                <div class="inline-flex items-center gap-2.5 p-3 rounded-lg bg-slate-50 border border-slate-200">
                    <span class="material-symbols-outlined text-[22px] text-[#005D2A]">lock</span>
                    <div class="flex flex-col">
                        <span class="text-xs font-bold text-slate-900">SSL 256-bit Encrypted</span>
                        <span class="text-xs text-slate-600">Safe &amp; Secure Payment Processing</span>
                    </div>
                </div>
                <div class="inline-flex items-center gap-2 text-xs text-slate-600">
                    <span class="material-symbols-outlined text-[18px] text-[#005D2A]">verified</span>
                    <span>EPA Resource Recovery Licence #4421</span>
                </div>
            </div>

        </div>

        <!-- Bottom Copyright & Legal Bar -->
        <div class="mt-12 pt-6 border-t border-slate-200 flex flex-col lg:flex-row items-center justify-between gap-4 text-xs text-slate-600">
            <div class="flex flex-wrap items-center gap-2 sm:gap-4 text-center lg:text-left">
                <span>© {{ date('Y') }} New England Waste. Lancaster Family Enterprises Pty Ltd.</span>
                <span class="hidden sm:inline">•</span>
                <span>Serving Armidale, Glen Innes, Guyra, Uralla &amp; Surrounds</span>
            </div>
            <div class="text-center lg:text-right text-slate-600">
                Locally Owned &amp; Operated Family Business • EPA Licence #4421
            </div>
        </div>
    </div>
</footer>

<!-- FALLBACK HELPER SCRIPT FOR BIN SELECTION VIA FOOTER -->
<script>
    if (typeof window.selectBinCapacityAndScroll !== 'function') {
        window.selectBinCapacityAndScroll = function(capacity) {
            const select = document.getElementById('bin-dropdown');
            if (select) {
                const opt = select.querySelector(`option[data-capacity="${capacity}"]`) || select.querySelector(`option[value="${capacity}"]`);
                if (opt) {
                    select.value = opt.value;
                    if (typeof handleBinDropdownChange === 'function') {
                        handleBinDropdownChange();
                    }
                }
                const dock = document.getElementById('booking-dock');
                if (dock) {
                    dock.scrollIntoView({ behavior: 'smooth' });
                }
            } else {
                window.location.href = `{{ route('home') }}?bin=${capacity}#booking-dock`;
            }
        };
    }
</script>
