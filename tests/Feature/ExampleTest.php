<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Instant 4-Step Skip Dispatch');
        $response->assertDontSee('id="bin-finder-section"', false);
        $response->assertSee(route('bin-guide'));
        $response->assertSee('id="bin-dropdown"', false);
        $response->assertSee('id="bin-cards-grid"', false);
        $response->assertSee('id="bin-card-2"', false);
        $response->assertSee('id="bin-card-4"', false);
        $response->assertSee('id="bin-card-12"', false);
        $response->assertSee('selectBinCard', false);
        $response->assertSee('id="bin-specs-ramp-pill"', false);
        $response->assertSee('id="selected-bin-preview-card"', false);
        $response->assertSee('id="preview-bin-svg-container"', false);
        $response->assertSee('id="preview-bin-capacity-badge"', false);

        // Verify footer skip bin links point directly to bin guide anchors (no circular dead ends)
        $response->assertDontSee('<a href="#booking-dock">2m³ Mini Skip Bin</a>', false);
        $response->assertDontSee('<a href="#booking-dock">12m³ Commercial Hooklift</a>', false);
        $response->assertSee(route('bin-guide') . '#bin-2');
        $response->assertSee(route('bin-guide') . '#bin-12');
        $response->assertSee('selectBinCapacityAndScroll(12)', false);
    }

    public function test_bin_size_guide_page_renders_with_seven_sizes(): void
    {
        $response = $this->get('/bin-guide');
        $response->assertStatus(200);
        $response->assertSee('Skip Bin Sizing Guide &amp; Volume Calculator', false);
        $response->assertSee('id="bin-2"', false);
        $response->assertSee('id="bin-3"', false);
        $response->assertSee('id="bin-4"', false);
        $response->assertSee('id="bin-6"', false);
        $response->assertSee('id="bin-8"', false);
        $response->assertSee('id="bin-10"', false);
        $response->assertSee('id="bin-12"', false);
        $response->assertSee('2m³ Mini Skip');
        $response->assertSee('3m³ Domestic Skip');
        $response->assertSee('4m³ Renovation Skip');
        $response->assertSee('6m³ Builder Skip');
        $response->assertSee('8m³ Commercial Skip');
        $response->assertSee('10m³ Jumbo Hooklift');
        $response->assertSee('12m³ Mega Industrial');
        $response->assertSee('True Scale &amp; Proportional Comparison', false);
        $response->assertSee('Driveway &amp; Site Access Guidelines', false);
    }

    public function test_service_areas_page_renders_with_map_and_suburbs(): void
    {
        $response = $this->get('/service-areas');
        $response->assertStatus(200);
        $response->assertSee('Service Areas &amp; Delivery Logistics Map', false);
        $response->assertSee('id="regional-vector-map"', false);
        $response->assertSee('Armidale');
        $response->assertSee('Glen Innes');
        $response->assertSee('Uralla');
        $response->assertSee('Guyra');
        $response->assertSee('Walcha');
        $response->assertSee('New England 3-Zone Delivery Matrix');
    }

    public function test_header_is_consistent_and_logo_is_enlarged_across_all_pages(): void
    {
        $pages = ['/', '/bin-guide', '/service-areas'];

        foreach ($pages as $uri) {
            $response = $this->get($uri);
            $response->assertStatus(200);
            // Verify unified shared header is loaded
            $response->assertSee('id="site-header"', false);
            // Verify enlarged logo class
            $response->assertSee('h-11 sm:h-12 w-auto', false);
            // Verify brand logo image path
            $response->assertSee('/images/logo.webp', false);
            // Verify EST 1979
            $response->assertSee('EST. 1979');
            // Verify revised navigation labels
            $response->assertSee('Bin Size Guide');
            $response->assertDontSee('Bin Size Guide (2–12m³)', false);
            $response->assertSee('Service Areas');
            // Verify no wrapping class is applied to desktop nav
            $response->assertSee('whitespace-nowrap', false);
            // Verify mobile toggle button
            $response->assertSee('id="mobile-menu-toggle-btn"', false);

            // Extract header HTML specifically to verify exclusions
            $html = $response->getContent();
            preg_match('/<header id="site-header"[^>]*>(.*?)<\/header>/is', $html, $matches);
            $this->assertNotEmpty($matches, 'Header site-header should be present in page');
            $headerHtml = $matches[1];

            $this->assertStringContainsString('Bin Size Guide', $headerHtml);
            $this->assertStringNotContainsString('2–12m', $headerHtml);
            $this->assertStringContainsString('Service Areas', $headerHtml);
            $this->assertStringNotContainsString('Service Areas &', $headerHtml);
            $this->assertStringNotContainsString('Family Heritage', $headerHtml);
            $this->assertStringContainsString('wa.me/61429323696', $headerHtml);
            $this->assertStringContainsString('0429 323 696', $headerHtml);
        }
    }

    public function test_footer_is_consistent_and_unified_across_all_pages(): void
    {
        $pages = ['/', '/bin-guide', '/service-areas'];

        foreach ($pages as $uri) {
            $response = $this->get($uri);
            $response->assertStatus(200);

            // Verify unified shared footer is loaded
            $response->assertSee('id="site-footer"', false);
            
            // Verify brand elements
            $response->assertSee('/images/logo.webp', false);
            $response->assertSee('Lancaster Family Owned &amp; Operated Since 1979', false);
            $response->assertSee('0429 323 696');
            $response->assertSee('customerservice@newrecycling.com.au');
            $response->assertSee('Mon–Sat 6:30am–5:30pm');
            $response->assertSee('WhatsApp Direct Dispatch');

            // Verify all 7 skip bin guide direct anchors & select buttons
            $response->assertSee(route('bin-guide') . '#bin-2');
            $response->assertSee(route('bin-guide') . '#bin-3');
            $response->assertSee(route('bin-guide') . '#bin-4');
            $response->assertSee(route('bin-guide') . '#bin-6');
            $response->assertSee(route('bin-guide') . '#bin-8');
            $response->assertSee(route('bin-guide') . '#bin-10');
            $response->assertSee(route('bin-guide') . '#bin-12');
            $response->assertSee('selectBinCapacityAndScroll(2)', false);
            $response->assertSee('selectBinCapacityAndScroll(12)', false);
            $response->assertSee('Compare All 7 Bin Dimensions');

            // Verify service areas links
            $response->assertSee(route('service-areas') . '?town=Armidale#regional-vector-map');
            $response->assertSee(route('service-areas') . '?town=Glen+Innes#regional-vector-map');
            $response->assertSee(route('service-areas') . '?town=Guyra#regional-vector-map');
            $response->assertSee(route('service-areas') . '?town=Uralla#regional-vector-map');
            $response->assertSee('View Interactive Route Map');

            // Verify payment and compliance credentials
            $response->assertSee('SSL 256-bit Encrypted');
            $response->assertSee('Visa');
            $response->assertSee('Mastercard');
            $response->assertSee('EFTPOS');
            $response->assertSee('Apple Pay');
            $response->assertSee('EPA Licence #4421');
        }
    }

    public function test_ai_slop_anti_patterns_are_completely_removed(): void
    {
        $pages = ['/', '/bin-guide', '/service-areas'];

        foreach ($pages as $uri) {
            $response = $this->get($uri);
            $response->assertStatus(200);
            $html = $response->getContent();

            // 1. No SaaS aura blur blobs
            $this->assertStringNotContainsString('blur-3xl', $html, "Page {$uri} must not contain blur-3xl aura blobs");
            $this->assertStringNotContainsString('blur-2xl', $html, "Page {$uri} must not contain blur-2xl aura blobs");

            // 2. No fake bot ratings or star clutter
            $this->assertStringNotContainsString('4.9/5', $html, "Page {$uri} must not contain fake 4.9/5 ratings");
            $this->assertStringNotContainsString('REGIONAL BEST SELLER • LANCASTER RECOMMENDED', $html, "Page {$uri} must not contain fake best seller badges");

            // 3. No corporate SaaS jargon slop (hallucinated AI fluff)
            $this->assertStringNotContainsString('Bank-Grade', $html, "Page {$uri} must not contain 'Bank-Grade' corporate fluff");
            $this->assertStringNotContainsString('Zero-Friction', $html, "Page {$uri} must not contain 'Zero-Friction' SaaS jargon");
            $this->assertStringNotContainsString('Technical Sizing Matrix', $html, "Page {$uri} must not contain 'Technical Sizing Matrix'");
            $this->assertStringNotContainsString('WasteVantage', $html, "Page {$uri} must not contain fictional 'WasteVantage' platform");
            $this->assertStringNotContainsString('Hazardous Hotdesk', $html, "Page {$uri} must not contain 'Hazardous Hotdesk' jargon");

            // 4. No Google Stitch Material You garbage token slop
            $this->assertStringNotContainsString('on-tertiary-fixed-variant', $html, "Page {$uri} must not contain Stitch M3 token 'on-tertiary-fixed-variant'");
            $this->assertStringNotContainsString('tertiary-fixed-dim', $html, "Page {$uri} must not contain Stitch M3 token 'tertiary-fixed-dim'");
            $this->assertStringNotContainsString('surface-container-highest', $html, "Page {$uri} must not contain Stitch M3 token 'surface-container-highest'");
            $this->assertStringNotContainsString('outline-variant', $html, "Page {$uri} must not contain Stitch M3 token 'outline-variant'");
            $this->assertStringNotContainsString('"primary": "#00341d"', $html, "Page {$uri} primary color must be official #005D2A, not #00341d");
            $this->assertStringContainsString('"primary": "#005D2A"', $html, "Page {$uri} must define official primary '#005D2A'");

            // 5. No SaaS purple-tinted palette bleed (#f8f9ff)
            $this->assertStringNotContainsString('#f8f9ff', $html, "Page {$uri} must not contain Stitch purple-tinted white #f8f9ff");

            // 6. No low-contrast 11px text with opacity degradation (WCAG AA failure)
            $this->assertStringNotContainsString('text-[11px] opacity-', $html, "Page {$uri} must not combine 11px text with opacity dimming");
            $this->assertStringNotContainsString('opacity-80', $html, "Page {$uri} must not have low-contrast opacity-80 on text");

            // 7. No AI slop marketing buzzwords, binary contrasts, or inflated puffery
            $bannedSlopPhrases = [
                'Unmatched Regional Footprint',
                '100% Surface Protection Guaranteed',
                'Book Online in 60s',
                'metro aggregator',
                'Google Stitch',
                'environmental stewardship and trade reliability',
                'No Impersonal Third-Party Brokers',
                'Designed for trade precision and domestic clarity'
            ];
            foreach ($bannedSlopPhrases as $slop) {
                $this->assertStringNotContainsString($slop, $html, "Page {$uri} must not contain AI slop phrase '{$slop}'");
            }
        }

        // 3. Bin guide cards must not have sales pitch "Book ... Skip Online" CTA buttons
        $binGuideResp = $this->get('/bin-guide');
        $binGuideHtml = $binGuideResp->getContent();
        $this->assertStringNotContainsString('Book 2m³ Skip Online', $binGuideHtml);
        $this->assertStringNotContainsString('Book 4m³ Skip Online', $binGuideHtml);
        $this->assertStringNotContainsString('Book 12m³ Skip Online', $binGuideHtml);
        $this->assertStringContainsString('Standard 7-Day Hire • Eco-Sort Included', $binGuideHtml);

        // 4. Suburb matrix table on service-areas must not have 12 repetitive "Book Now" links
        $serviceAreasResp = $this->get('/service-areas');
        $serviceAreasHtml = $serviceAreasResp->getContent();
        $this->assertStringNotContainsString('<th class="py-3.5 px-5 text-right">Action</th>', $serviceAreasHtml);
        $this->assertStringContainsString('<th class="py-3.5 px-5 text-right">Route Status</th>', $serviceAreasHtml);
        $this->assertStringContainsString('Active Route', $serviceAreasHtml);

        // 5. No floating mobile bottom sticky bars on guide or service areas
        $this->assertStringNotContainsString('<!-- MOBILE QUICK DOCK -->', $serviceAreasHtml);
        $this->assertStringNotContainsString('<!-- MOBILE QUICK DOCK (Only visible on small viewports) -->', $binGuideHtml);

        // 6. Home page booking inputs use native interactive date inputs
        $homeResp = $this->get('/');
        $homeHtml = $homeResp->getContent();
        $this->assertStringContainsString('type="date"', $homeHtml);
        $this->assertStringContainsString('id="delivery-date-picker"', $homeHtml);
        $this->assertStringContainsString('id="pickup-date-picker"', $homeHtml);
        $this->assertStringContainsString('id="checkout-modal"', $homeHtml);
    }

    public function test_mobile_ux_optimizations_and_ergonomics(): void
    {
        // 1. Home page mobile touch ergonomics & iOS auto-zoom prevention
        $homeResp = $this->get('/');
        $homeResp->assertStatus(200);
        $homeHtml = $homeResp->getContent();

        // Suburb select & date pickers have base-16px on mobile to prevent iOS Safari auto-zoom
        $this->assertStringContainsString('text-base sm:text-sm', $homeHtml, "Inputs must use text-base on mobile to prevent iOS zoom");
        $this->assertStringContainsString('id="suburb-dropdown"', $homeHtml);
        $this->assertStringContainsString('h-12', $homeHtml, "Inputs must provide minimum 48px height for mobile touch targets");

        // Mobile snap carousel on 7-bin selector matrix
        $this->assertStringContainsString('snap-x', $homeHtml, "Bin selector must support horizontal swipe snap on mobile");
        $this->assertStringContainsString('overflow-x-auto', $homeHtml);

        // Mobile booking sticky dock & safe-area inset
        $this->assertStringContainsString('id="mobile-booking-dock"', $homeHtml);
        $this->assertStringContainsString('safe-area-inset-bottom', $homeHtml, "Mobile bottom dock must respect safe-area-inset-bottom");

        // Autocomplete attributes for 1-tap mobile keychain autofill
        $this->assertStringContainsString('autocomplete="name"', $homeHtml);
        $this->assertStringContainsString('autocomplete="tel"', $homeHtml);
        $this->assertStringContainsString('autocomplete="email"', $homeHtml);
        $this->assertStringContainsString('autocomplete="street-address"', $homeHtml);

        // Header mobile menu toggle touch ergonomics (min 44-48px target)
        $this->assertStringContainsString('w-11 h-11', $homeHtml, "Mobile hamburger toggle must have 44px+ hit area");
        $this->assertStringContainsString('tel:0429323696', $homeHtml, "Mobile menu must offer direct phone dialing");

        // 2. Bin guide mobile filter pills have 44px+ touch targets
        $binGuideResp = $this->get('/bin-guide');
        $binGuideHtml = $binGuideResp->getContent();
        $this->assertStringContainsString('min-h-[44px]', $binGuideHtml, "Filter pills must adhere to 44px WCAG/iOS touch guidelines");

        // 3. Service areas mobile quick search has mobile inputmode
        $serviceAreasResp = $this->get('/service-areas');
        $serviceAreasHtml = $serviceAreasResp->getContent();
        $this->assertStringContainsString('inputmode="search"', $serviceAreasHtml, "Search input should trigger search keyboard on mobile");
    }

    public function test_pricing_calculation_ajax_endpoint(): void
    {
        $suburb = \App\Models\Suburb::first();
        $bin = \App\Models\BinSize::first();
        $waste = \App\Models\WasteType::first();

        $tomorrow = now()->addDay()->format('Y-m-d');
        $nextWeek = now()->addDays(8)->format('Y-m-d');

        $response = $this->postJson('/order/skipbin/calculate', [
            'suburb_id' => $suburb->id,
            'bin_size_id' => $bin->id,
            'waste_type_id' => $waste->id,
            'delivery_date' => $tomorrow,
            'pickup_date' => $nextWeek,
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ])
            ->assertJsonStructure([
                'success',
                'pricing' => [
                    'base_price',
                    'delivery_fee',
                    'waste_surcharge',
                    'total_inc_gst',
                    'total_inc_gst_formatted',
                ],
            ]);
    }

    public function test_booking_store_endpoint_creates_order_and_returns_json(): void
    {
        \Illuminate\Support\Facades\Mail::fake();

        $suburb = \App\Models\Suburb::first();
        $bin = \App\Models\BinSize::first();
        $waste = \App\Models\WasteType::first();

        $tomorrow = now()->addDay()->format('Y-m-d');
        $nextWeek = now()->addDays(8)->format('Y-m-d');

        $response = $this->postJson('/order/skipbin/store', [
            'suburb_id' => $suburb->id,
            'bin_size_id' => $bin->id,
            'waste_type_id' => $waste->id,
            'delivery_date' => $tomorrow,
            'pickup_date' => $nextWeek,
            'customer_name' => 'David Lancaster',
            'customer_phone' => '0412345678',
            'customer_email' => 'david@lancaster.com.au',
            'delivery_address' => '142 Marsh Street, Armidale NSW 2350',
            'placement_location' => 'driveway',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
            ])
            ->assertJsonStructure([
                'success',
                'booking_ref',
                'redirect_url',
            ]);

        $this->assertDatabaseHas('bookings', [
            'customer_name' => 'David Lancaster',
            'customer_phone' => '0412345678',
            'customer_email' => 'david@lancaster.com.au',
        ]);
    }
}
