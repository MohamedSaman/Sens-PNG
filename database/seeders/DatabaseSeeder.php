<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Download;
use App\Models\Leadership;
use App\Models\Location;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin User
        User::firstOrCreate(
            ['email' => 'admin@senspng.com'],
            [
                'name' => 'Sens PNG Administrator',
                'password' => Hash::make('SensAdmin2026!'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Product Categories
        $fmcgCategory = ProductCategory::create([
            'name' => 'FMCG Wholesale Distribution',
            'slug' => 'fmcg',
            'tagline' => 'High-velocity food staples, packaged consumer goods & pantry essentials for PNG retailers.',
            'description' => 'Sens PNG partners with globally accredited FMCG manufacturers to supply premium flour, cooking oils, snacks, canned provisions, and breakfast staples directly to supermarkets, trade stores, and wholesalers across Papua New Guinea.',
            'icon' => 'shopping-cart',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $autoCategory = ProductCategory::create([
            'name' => 'Automotive & Commercial Tyres',
            'slug' => 'automotive',
            'tagline' => 'High-durability radial tyres engineered for PNG highway, rugged terrain & heavy transport conditions.',
            'description' => 'Direct wholesale distribution of proven international tyre brands. From passenger radials (PCR) and SUV/4WD tyres to heavy-duty truck and bus radials (TBR) designed to endure the demanding conditions of the Highlands Highway and national transport routes.',
            'icon' => 'truck',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        // 3. Brands
        $punjas = Brand::create([
            'category_id' => $fmcgCategory->id,
            'name' => 'Punjas',
            'slug' => 'punjas',
            'tagline' => 'Trusted Pacific heritage, premium flour, edible oils & biscuits',
            'description' => 'Punjas is one of the South Pacific\'s most prestigious and trusted food manufacturers, renowned for high-grade milled flours, pure canola and vegetable cooking oils, and beloved biscuits crafted to international food safety standards.',
            'country_of_origin' => 'Fiji / Pacific',
            'logo' => '/images/brands/punjas.png',
            'badge_text' => 'Pacific Favorite',
            'sort_order' => 1,
            'is_featured' => true,
            'is_active' => true,
        ]);

        $bakersFresh = Brand::create([
            'category_id' => $fmcgCategory->id,
            'name' => 'Bakers Fresh',
            'slug' => 'bakers-fresh',
            'tagline' => 'Premium baking flour, cake mixes, sugar & quality bakery essentials',
            'description' => 'Bakers Fresh is a premier commercial bakery and consumer flour line manufactured by Punjas & Sons. Highly trusted by commercial bakeries, hot bread kitchens, regional pastry shops, and household bakers throughout PNG for unmatched rising performance and consistency.',
            'country_of_origin' => 'Fiji / Pacific',
            'logo' => '/images/brands/bakers-fresh.png',
            'badge_text' => 'Bakery Standard',
            'sort_order' => 2,
            'is_featured' => true,
            'is_active' => true,
        ]);

        $happyMum = Brand::create([
            'category_id' => $fmcgCategory->id,
            'name' => 'Happy Mum',
            'slug' => 'happy-mum',
            'tagline' => 'Authentic Asian cooking sauces, premium oyster sauce, soy sauce & seasonings',
            'description' => 'Happy Mum (回家乐) produces high-quality culinary sauces and seasonings crafted with traditional brewing techniques and international certifications (HACCP, Halal, ISO). Sens PNG distributes the full range of Happy Mum oyster sauce, superior light soy sauce, and iodized table salt for PNG supermarkets, restaurants, and trade stores.',
            'country_of_origin' => 'Global FMCG / Jolion Foods',
            'logo' => '/images/brands/happy-mum.png',
            'badge_text' => 'Wholesale Foodservice Staple',
            'sort_order' => 3,
            'is_featured' => true,
            'is_active' => true,
        ]);

        $nachorittos = Brand::create([
            'category_id' => $fmcgCategory->id,
            'name' => 'Nachorittos',
            'slug' => 'nachorittos',
            'tagline' => 'Crunchy gourmet tortilla corn chips with authentic bold flavors',
            'description' => 'Nachorittos brings premium snacking excitement to PNG retailers with oven-baked and crispy corn tortilla chips available in Cheese Supreme, Jalapeno Spice, and Original Salted variants. Ideal for convenience stores, school canteens, and supermarkets.',
            'country_of_origin' => 'International',
            'logo' => '/images/brands/nachorittos.png',
            'badge_text' => 'Fast-Growing Snack',
            'sort_order' => 4,
            'is_featured' => true,
            'is_active' => true,
        ]);

        $kapsen = Brand::create([
            'category_id' => $autoCategory->id,
            'name' => 'Kapsen Tyres',
            'slug' => 'kapsen',
            'tagline' => 'Precision-engineered passenger, SUV, 4WD & light commercial radial tyres',
            'description' => 'Kapsen Tyres produces world-class radial tyres utilizing advanced German and European manufacturing technologies. Designed with reinforced sidewalls, superior wet-grip compounds, and low rolling resistance for passenger vehicles, taxis, utility fleets, and light trucks.',
            'country_of_origin' => 'Global Radial Technology',
            'logo' => '/images/brands/kapsen.png',
            'badge_text' => 'Passenger & SUV Choice',
            'sort_order' => 5,
            'is_featured' => true,
            'is_active' => true,
        ]);

        $longMarch = Brand::create([
            'category_id' => $autoCategory->id,
            'name' => 'Long March Tyres',
            'slug' => 'long-march',
            'tagline' => 'Heavy-duty Truck & Bus Radials (TBR) built for extreme loads and rugged PNG roads',
            'description' => 'Long March is a world leader in heavy commercial transport tyres. Built with extra-deep tread depths, puncture-resistant steel belts, and specialized heat-dissipation compounds, Long March TBR tyres deliver lowest cost-per-kilometer for logging, mining, freight, and PMV bus operations.',
            'country_of_origin' => 'Industrial Heavy TBR',
            'logo' => '/images/brands/long-march.png',
            'badge_text' => 'Heavy Fleet Standard',
            'sort_order' => 6,
            'is_featured' => true,
            'is_active' => true,
        ]);

        // 4. Sample Products
        // Punjas products
        Product::create([
            'category_id' => $fmcgCategory->id,
            'brand_id' => $punjas->id,
            'name' => 'Punjas Premium Enriched Bakers Flour',
            'slug' => 'punjas-premium-enriched-bakers-flour-25kg',
            'product_code' => 'PUN-FLR-25KG',
            'package_size' => '25kg Poly Woven Sack',
            'short_description' => 'Milled from high-protein hard wheat, ideal for commercial bakeries, pastry chefs, and bread production.',
            'description' => 'Punjas Bakers Flour is milled to ultra-fine specifications ensuring maximum water absorption, high gluten development, and consistent dough elasticity for high-yield bread baking.',
            'image' => '/images/products/punjas-flour.webp',
            'specifications' => [
                'Origin' => 'Fiji / Australia Wheat Blend',
                'Protein Content' => '11.8% - 12.5%',
                'Packaging' => '25kg Multi-wall Poly Sack',
                'Pallet Configuration' => '40 Bags / 1,000kg Metric Ton',
                'Shelf Life' => '12 Months',
            ],
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 1,
        ]);

        Product::create([
            'category_id' => $fmcgCategory->id,
            'brand_id' => $punjas->id,
            'name' => 'Punjas Pure Canola Cooking Oil',
            'slug' => 'punjas-pure-canola-cooking-oil-20l',
            'product_code' => 'PUN-OIL-20L',
            'package_size' => '20L Commercial Jerry Can',
            'short_description' => 'Triple-refined, cholesterol-free cooking oil with high smoke point for food service and catering.',
            'description' => 'Punjas Pure Canola Oil delivers clean, neutral taste and outstanding heat stability. Packaged in a heavy-duty food-grade Jerry Can with tamper-evident seal, making it the top choice for restaurants, hotels, and institutional caterers.',
            'image' => '/images/products/punjas-oil.webp',
            'specifications' => [
                'Grade' => 'Triple Refined Pure Canola',
                'Smoke Point' => '230°C',
                'Package' => '20L Heavy Duty Jerry Can',
                'Pallet Configuration' => '32 Drums / Pallet',
                'Certifications' => 'HACCP, ISO 22000, Halal',
            ],
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 2,
        ]);

        Product::create([
            'category_id' => $fmcgCategory->id,
            'brand_id' => $punjas->id,
            'name' => 'Punjas Breakfast Crackers Classic',
            'slug' => 'punjas-breakfast-crackers-classic-375g',
            'product_code' => 'PUN-CRK-375G',
            'package_size' => '375g Packet (Carton of 24)',
            'short_description' => 'Crispy, golden-baked breakfast biscuits ideal with butter, cheese, or tea. PNG\'s morning favorite.',
            'description' => 'Crisp, golden, and satisfyingly crunchy. Punjas Breakfast Crackers have been a household essential across the Pacific for generations, packed in moisture-proof foils to maintain freshness.',
            'image' => '/images/products/punjas-crackers.webp',
            'specifications' => [
                'Unit Weight' => '375g',
                'Carton Count' => '24 Packets per Master Carton',
                'Gross Carton Weight' => '9.5 kg',
                'Shelf Life' => '18 Months',
            ],
            'is_featured' => false,
            'is_active' => true,
            'sort_order' => 3,
        ]);

        // Happy Mum products
        Product::create([
            'category_id' => $fmcgCategory->id,
            'brand_id' => $happyMum->id,
            'name' => 'Happy Mum Premium Oyster Sauce (鲜味蚝油)',
            'slug' => 'happy-mum-premium-oyster-sauce-510g',
            'product_code' => 'HM-OYS-510G',
            'package_size' => '510g Glass Bottle (Carton of 24)',
            'short_description' => 'Thick, savory all-purpose oyster sauce brewed from premium oyster extracts. Ideal for stir-fries and marinades.',
            'description' => 'Happy Mum Oyster Sauce brings authentic umami richness to meat, seafood, and vegetable dishes across PNG food businesses and households. Manufactured under strict HACCP and Halal standards by Jolion Foods, featuring an easy-pour screw cap bottle.',
            'image' => '/images/products/happy-mum-oyster.webp',
            'specifications' => [
                'Volume / Net Weight' => '510g Glass Bottle',
                'Carton Pack' => '24 Bottles / Master Shipper',
                'Certifications' => 'HACCP, ISO 22000, Halal Certified',
                'Gross Weight' => '19.2 kg per Carton',
                'Shelf Life' => '24 Months',
            ],
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 4,
        ]);

        Product::create([
            'category_id' => $fmcgCategory->id,
            'brand_id' => $happyMum->id,
            'name' => 'Happy Mum Superior Light Soy Sauce (生抽王)',
            'slug' => 'happy-mum-superior-light-soy-sauce-500ml',
            'product_code' => 'HM-SOY-500ML',
            'package_size' => '500ml Table Bottle (Carton of 24)',
            'short_description' => 'Naturally brewed non-GMO light soy sauce. Delivers bright savory notes and aroma for everyday cooking.',
            'description' => 'Happy Mum Superior Light Soy Sauce is naturally fermented from selected non-GMO soybeans and wheat. Featuring a distinctive red cap dispenser, it is a high-demand retail staple across PNG trade stores and commercial kitchens.',
            'image' => '/images/products/happy-mum-soysauce.webp',
            'specifications' => [
                'Volume' => '500ml Bottle with Precision Dispenser',
                'Carton Pack' => '24 Bottles / Carton',
                'Ingredients' => 'Non-GMO Soybeans, Wheat, Water, Salt',
                'Gross Weight' => '17.5 kg per Carton',
                'Shelf Life' => '24 Months',
            ],
            'is_featured' => false,
            'is_active' => true,
            'sort_order' => 5,
        ]);

        // Nachorittos products
        Product::create([
            'category_id' => $fmcgCategory->id,
            'brand_id' => $nachorittos->id,
            'name' => 'Nachoritos Crunchy Tortilla Corn Chips',
            'slug' => 'nachoritos-crunchy-tortilla-corn-chips-175g',
            'product_code' => 'NCH-CHS-175G',
            'package_size' => '175g Share Pack (Carton of 12)',
            'short_description' => 'Stone-ground yellow corn tortilla chips seasoned with bold Chilli Lime and Cheese seasoning.',
            'description' => 'Nachoritos Corn Chips deliver a big crunch and bold Pacific flavor. Made from 100% whole kernel corn, oven-baked to golden crispness and packed in foil-metallized stay-fresh bags. Available in Chilli Lime, Tasty Cheese, and Smoky BBQ.',
            'image' => '/images/products/nachorittos-chips.webp',
            'specifications' => [
                'Pack Size' => '175g Foil Metallized Bag',
                'Master Carton' => '12 Bags / Shipper',
                'Available Flavors' => 'Chilli Lime, Tasty Cheese, Smoky BBQ, Lightly Salted',
                'Gluten Status' => 'Naturally Gluten Free',
            ],
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 6,
        ]);

        // Kapsen Tyres products
        Product::create([
            'category_id' => $autoCategory->id,
            'brand_id' => $kapsen->id,
            'name' => 'Kapsen PracticalMax A/T RS23 All-Terrain 4WD',
            'slug' => 'kapsen-practicalmax-at-rs23-265-65r17',
            'product_code' => 'KAP-AT-265-65-17',
            'package_size' => '265/65R17 112T',
            'short_description' => 'Aggressive all-terrain radial tyre designed for Toyota Hilux, Land Cruiser, and Ford Ranger.',
            'description' => 'The RS23 features interlocking center tread blocks and 3D stepped shoulder lugs that eject mud and stones effortlessly. 3-ply sidewall construction provides exceptional puncture resistance against jagged limestone and gravel roads.',
            'image' => '/images/products/kapsen-at.webp',
            'specifications' => [
                'Size' => '265/65R17',
                'Speed & Load' => '112T (1,120 kg @ 190 km/h)',
                'Ply Rating' => '4-Ply Radial with Steel Reinforcement',
                'Tread Depth' => '11.5 mm',
                'Primary Application' => 'Toyota Hilux, LandCruiser Prado, Ford Ranger, Isuzu D-Max',
            ],
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 7,
        ]);

        Product::create([
            'category_id' => $autoCategory->id,
            'brand_id' => $kapsen->id,
            'name' => 'Kapsen ComfortMax S2000 Ultra-High Performance',
            'slug' => 'kapsen-comfortmax-s2000-205-55r16',
            'product_code' => 'KAP-UHP-205-55-16',
            'package_size' => '205/55R16 91W',
            'short_description' => 'Low-noise passenger car radial tyre providing exceptional wet grip and fuel economy.',
            'description' => 'Asymmetric tread design with 4 continuous longitudinal grooves delivers rapid water evacuation to prevent hydroplaning during heavy tropical PNG rainfall.',
            'image' => '/images/products/kapsen-s2000.webp',
            'specifications' => [
                'Size' => '205/55R16',
                'Speed & Load' => '91W (615 kg @ 270 km/h)',
                'Treadwear' => '320 / Traction A / Temperature A',
                'Vehicle Fitment' => 'Sedans, Taxis, Hatchbacks, Fleet Vehicles',
            ],
            'is_featured' => false,
            'is_active' => true,
            'sort_order' => 8,
        ]);

        Product::create([
            'category_id' => $autoCategory->id,
            'brand_id' => $kapsen->id,
            'name' => 'Kapsen DurableMax RS01 Commercial Light Truck & Van',
            'slug' => 'kapsen-durablemax-rs01-195r14c',
            'product_code' => 'KAP-RS01-195R14C',
            'package_size' => '195R14C 8PR 106/104R',
            'short_description' => 'Reinforced 8-ply light commercial radial tyre built for PMV minibuses, delivery vans, and light cargo.',
            'description' => 'The Kapsen RS01 DurableMax features a reinforced 8-ply carcass and three zigzag main tread grooves for excellent water drainage and exceptional resistance against sidewall curb abrasion on PNG roads.',
            'image' => '/images/products/kapsen-van.webp',
            'specifications' => [
                'Size' => '195R14C',
                'Ply Rating' => '8 PR (Heavy Commercial)',
                'Load Index' => '106/104R (950 kg / 900 kg)',
                'Target Vehicles' => 'Toyota HiAce PMVs, Nissan Caravan, Light Cargo Trucks',
            ],
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 9,
        ]);

        // Long March products
        Product::create([
            'category_id' => $autoCategory->id,
            'brand_id' => $longMarch->id,
            'name' => 'Long March LM216 All-Position Premium Highway TBR',
            'slug' => 'long-march-lm216-295-80r22-5',
            'product_code' => 'LM-216-295-80-225',
            'package_size' => '295/80R22.5 18PR 152/149M',
            'short_description' => 'Top-tier steer and trailer axle tyre engineered for long-haul freight and highway transport.',
            'description' => 'Five ribbed design with stone ejector technology in every groove. Delivers exceptional casing durability, low rolling resistance, and superior retreadability over hundreds of thousands of kilometers.',
            'image' => '/images/products/longmarch-lm216.webp',
            'specifications' => [
                'Size' => '295/80R22.5',
                'Ply Rating' => '18 Ply All-Steel Radial',
                'Load & Speed' => '152/149M (3,550 kg Single / 3,250 kg Dual)',
                'Tread Depth' => '15.5 mm',
                'Axle Position' => 'Steer / All-Position / Trailer',
            ],
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 10,
        ]);

        Product::create([
            'category_id' => $autoCategory->id,
            'brand_id' => $longMarch->id,
            'name' => 'Long March LM328 Heavy Drive Deep-Tread Logging & Mining',
            'slug' => 'long-march-lm328-11r22-5',
            'product_code' => 'LM-328-11R225',
            'package_size' => '11R22.5 16PR 148/145L',
            'short_description' => 'Extra-deep lug drive tyre engineered for extreme torque, logging tracks, and unpaved Highlands routes.',
            'description' => 'Massive 21mm tread block depth provides extreme traction in thick mud and loose gravel. Reinforced cut-and-chip resistant compound prevents tread chunking under brutal heavy payloads.',
            'image' => '/images/products/longmarch-lm328.webp',
            'specifications' => [
                'Size' => '11R22.5',
                'Ply Rating' => '16 PR All-Steel Radial',
                'Tread Depth' => '21.0 mm (Deep Lug)',
                'Axle Position' => 'Drive Axle',
                'Operating Conditions' => 'Mining, Logging, Gravel & Highlands Highway',
            ],
            'is_featured' => true,
            'is_active' => true,
            'sort_order' => 11,
        ]);

        Product::create([
            'category_id' => $autoCategory->id,
            'brand_id' => $longMarch->id,
            'name' => 'Long March LM518 Severe Service On/Off-Road Tipper',
            'slug' => 'long-march-lm518-12-00r20',
            'product_code' => 'LM-518-1200R20',
            'package_size' => '12.00R20 18PR 154/151K Tube Type',
            'short_description' => 'Industrial tube-type radial tyre for 10-wheeler dump trucks and quarry transports.',
            'description' => 'Ultra-rugged casing designed to absorb intense shock loads. Widely deployed across civil construction projects, earthworks, and heavy hauling operations across Papua New Guinea.',
            'image' => '/images/products/longmarch-lm518.webp',
            'specifications' => [
                'Size' => '12.00R20 (Tube Type)',
                'Ply Rating' => '18 PR',
                'Load Index' => '154/151K (3,750 kg / 3,450 kg)',
                'Application' => 'Dump Trucks, Heavy Tippers, Cement Mixers',
            ],
            'is_featured' => false,
            'is_active' => true,
            'sort_order' => 12,
        ]);

        // 5. Locations
        Location::create([
            'name' => 'Port Moresby Warehouse & Corporate Headquarters',
            'city' => 'Port Moresby',
            'province' => 'National Capital District (NCD)',
            'address' => 'Unit 04 Wamco Haus, Section 35 Lot 50, Kunai Street, Hohola, Port Moresby, Papua New Guinea',
            'phone' => '+675 8387 5018',
            'email' => 'admin@senspng.com',
            'operating_hours' => 'Monday - Friday: 8:00 AM - 5:00 PM | Saturday: 8:00 AM - 12:30 PM',
            'latitude' => -9.4438,
            'longitude' => 147.1803,
            'is_primary' => true,
            'sort_order' => 1,
        ]);

        Location::create([
            'name' => 'Lae Distribution Depot & Highlands Logistics Center',
            'city' => 'Lae',
            'province' => 'Morobe Province',
            'address' => 'Milfordhaven Industrial Corridor, Sector 12, Lae, Morobe Province, Papua New Guinea',
            'phone' => '+675 8387 5018',
            'email' => 'lae@senspng.com',
            'operating_hours' => 'Monday - Friday: 8:00 AM - 5:00 PM | Saturday: 8:00 AM - 12:30 PM',
            'latitude' => -6.7280,
            'longitude' => 146.9970,
            'is_primary' => false,
            'sort_order' => 2,
        ]);

        // 6. Leadership
        Leadership::create([
            'name' => 'Navin Raju',
            'role_title' => 'Founder & Managing Director',
            'bio' => 'Navin Raju brings over two decades of senior executive leadership across retail, logistics, supply chain management, aviation, and commercial operations across Papua New Guinea, New Zealand, and Australia. Recognizing the structural supply hurdles faced by independent PNG businesses, Navin established Sens PNG with a relentless commitment to transparent international procurement, dependable wholesale distribution, and genuine commercial partnerships that foster grassroots economic growth.',
            'experience_summary' => '20+ years executive leadership across PNG, New Zealand & Australia in Retail, Logistics, Supply Chain & Aviation.',
            'quote' => 'Our purpose is clear: we connect global manufacturing excellence directly to PNG enterprises without retail conflict. When our retailer and commercial partners thrive, Papua New Guinea moves forward.',
            'photo' => '/images/leadership/navin-raju.jpg',
            'linkedin_url' => 'https://linkedin.com',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        // 7. Downloads
        Download::create([
            'title' => 'Sens PNG Corporate Profile 2026',
            'category' => 'Corporate Overview',
            'description' => 'Comprehensive brochure detailing company operations, Port Moresby & Lae facilities, supply chain capabilities, and leadership background.',
            'file_path' => '/documents/sens-png-corporate-profile.pdf',
            'file_size' => '3.8 MB',
            'file_format' => 'PDF',
            'download_count' => 142,
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Download::create([
            'title' => 'FMCG Wholesale Master Product Catalogue',
            'category' => 'Product Catalogue',
            'description' => 'Complete wholesale listing for Punjas, Happy Mum, and Nachorittos product ranges including carton counts, pallet specs, and minimum order requirements.',
            'file_path' => '/documents/sens-png-fmcg-catalogue.pdf',
            'file_size' => '5.2 MB',
            'file_format' => 'PDF',
            'download_count' => 284,
            'sort_order' => 2,
            'is_active' => true,
        ]);

        Download::create([
            'title' => 'Kapsen Tyres Passenger & SUV Range Guide',
            'category' => 'Automotive Technical',
            'description' => 'Technical specifications, speed/load ratings, tread patterns, and vehicle fitment tables for passenger, SUV, and light commercial vehicles.',
            'file_path' => '/documents/kapsen-tyres-guide.pdf',
            'file_size' => '4.1 MB',
            'file_format' => 'PDF',
            'download_count' => 195,
            'sort_order' => 3,
            'is_active' => true,
        ]);

        Download::create([
            'title' => 'Long March Commercial TBR Tyre Application Guide',
            'category' => 'Automotive Technical',
            'description' => 'Heavy transport fitment guide covering steer, drive, and trailer axle configurations for commercial fleets, logging operators, and PMV bus services.',
            'file_path' => '/documents/long-march-tbr-guide.pdf',
            'file_size' => '6.4 MB',
            'file_format' => 'PDF',
            'download_count' => 312,
            'sort_order' => 4,
            'is_active' => true,
        ]);

        Download::create([
            'title' => 'Wholesale Customer Account & Trade Credit Application',
            'category' => 'Business Forms',
            'description' => 'Official B2B merchant onboarding form for cash accounts and 30-day commercial trade credit facilities.',
            'file_path' => '/documents/sens-png-trade-application.pdf',
            'file_size' => '1.2 MB',
            'file_format' => 'PDF',
            'download_count' => 470,
            'sort_order' => 5,
            'is_active' => true,
        ]);

        // 8. Site Settings
        $settings = [
            ['key' => 'site_name', 'value' => 'Sens PNG Limited', 'group' => 'general', 'type' => 'text', 'description' => 'Company Name'],
            ['key' => 'site_tagline', 'value' => 'Connecting Global Brands with Papua New Guinea Businesses', 'group' => 'general', 'type' => 'text', 'description' => 'Corporate Tagline'],
            ['key' => 'contact_phone', 'value' => '+675 8387 5018', 'group' => 'contact', 'type' => 'text', 'description' => 'Public Phone Number'],
            ['key' => 'contact_email', 'value' => 'admin@senspng.com', 'group' => 'contact', 'type' => 'text', 'description' => 'Public Enquiry Email'],
            ['key' => 'office_address', 'value' => 'Unit 04 Wamco Haus, Section 35 Lot 50, Kunai Street, Hohola, Port Moresby, Papua New Guinea', 'group' => 'contact', 'type' => 'text', 'description' => 'Primary Head Office Address'],
            ['key' => 'lae_address', 'value' => 'Milfordhaven Industrial Corridor, Sector 12, Lae, Morobe Province, Papua New Guinea', 'group' => 'contact', 'type' => 'text', 'description' => 'Lae Operations Depot'],
            ['key' => 'working_hours', 'value' => 'Mon - Fri: 8:00 AM - 5:00 PM | Sat: 8:00 AM - 12:30 PM', 'group' => 'contact', 'type' => 'text', 'description' => 'Business Operating Hours'],
            ['key' => 'whatsapp_number', 'value' => '+67583875018', 'group' => 'contact', 'type' => 'text', 'description' => 'Direct WhatsApp Contact Link'],
            ['key' => 'announcement_bar', 'value' => 'Now Stocking: Long March 295/80R22.5 Heavy Fleet TBR & Punjas 25kg Bakers Flour across Port Moresby & Lae Warehouses.', 'group' => 'header', 'type' => 'text', 'description' => 'Top Banner Text'],
            ['key' => 'stats_brands', 'value' => '5+', 'group' => 'stats', 'type' => 'text', 'description' => 'Global Brands Distributed'],
            ['key' => 'stats_warehouses', 'value' => '2', 'group' => 'stats', 'type' => 'text', 'description' => 'Strategic Hubs (POM & Lae)'],
            ['key' => 'stats_experience', 'value' => '20+', 'group' => 'stats', 'type' => 'text', 'description' => 'Years Industry Leadership'],
            ['key' => 'stats_provinces', 'value' => '22', 'group' => 'stats', 'type' => 'text', 'description' => 'Provinces Served Nationwide'],
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/senspnglimited', 'group' => 'social', 'type' => 'url', 'description' => 'Official Facebook Page URL'],
            ['key' => 'social_linkedin', 'value' => 'https://linkedin.com/company/sens-png-limited', 'group' => 'social', 'type' => 'url', 'description' => 'LinkedIn Company Profile URL'],
            ['key' => 'social_whatsapp', 'value' => 'https://wa.me/67583875018', 'group' => 'social', 'type' => 'url', 'description' => 'Direct WhatsApp Chat Link'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/senspnglimited', 'group' => 'social', 'type' => 'url', 'description' => 'Official Instagram Profile URL'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
