@extends('layouts.admin')

@section('title', 'Website Settings & Social Links')

@section('content')
<div class="space-y-6 max-w-5xl">
    <div>
        <div class="flex items-center gap-2 mb-1">
            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 font-mono">Configuration</span>
            <span class="text-slate-500 text-xs">•</span>
            <span class="text-xs text-slate-400">Public Website Master Controls</span>
        </div>
        <h1 class="text-2xl sm:text-3xl font-bold text-white font-['Outfit']">Website Settings &amp; Social Media Links</h1>
        <p class="text-xs sm:text-sm text-slate-400 mt-1">Manage public company contact channels, social media profile links, facility addresses, and top banner notices.</p>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- SECTION 1: Social Media Channels (NEW & HIGHLIGHTED) -->
        <div class="rounded-3xl bg-[#0B1A2D] border border-cyan-500/30 shadow-2xl p-6 sm:p-8 space-y-6 relative overflow-hidden">
            <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-cyan-500 via-sky-400 to-indigo-500"></div>

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 border-b border-slate-800">
                <div>
                    <h3 class="text-base font-bold text-white font-['Outfit'] flex items-center gap-2">
                        <i data-lucide="share-2" class="w-4 h-4 text-cyan-400"></i>
                        <span>Social Media Channels &amp; Direct Messaging</span>
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">These links are displayed in the website footer and contact sections across all pages.</p>
                </div>
                <span class="px-2.5 py-1 rounded-full bg-cyan-500/10 text-cyan-300 border border-cyan-500/30 text-[10px] font-bold uppercase tracking-wider font-mono self-start sm:self-auto">
                    Live Footer Links
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                
                <!-- Facebook -->
                <div class="p-4 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-2">
                    <label class="flex items-center gap-2 text-xs font-bold text-slate-200">
                        <div class="w-6 h-6 rounded-lg bg-blue-600/20 text-blue-400 flex items-center justify-center border border-blue-500/30">
                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 320 512" aria-hidden="true">
                                <path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V137.9c0-26.4 12.9-52.2 54.4-52.2H297V2.6S254.3 0 213.9 0c-84.3 0-139.1 51.1-139.1 143.4v58.1H32v97.8h48z"/>
                            </svg>
                        </div>
                        <span>Facebook Page URL</span>
                    </label>
                    <input type="url" name="settings[social_facebook]" 
                           value="{{ \App\Models\SiteSetting::get('social_facebook', 'https://facebook.com/senspnglimited') }}"
                           placeholder="https://facebook.com/your-page"
                           class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-700 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 font-mono">
                    <p class="text-[10px] text-slate-400">Primary social platform for retail traders &amp; provincial consumers across PNG.</p>
                </div>

                <!-- LinkedIn -->
                <div class="p-4 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-2">
                    <label class="flex items-center gap-2 text-xs font-bold text-slate-200">
                        <div class="w-6 h-6 rounded-lg bg-sky-600/20 text-sky-400 flex items-center justify-center border border-sky-500/30">
                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 448 512" aria-hidden="true">
                                <path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"/>
                            </svg>
                        </div>
                        <span>LinkedIn Corporate Profile URL</span>
                    </label>
                    <input type="url" name="settings[social_linkedin]" 
                           value="{{ \App\Models\SiteSetting::get('social_linkedin', 'https://linkedin.com/company/sens-png-limited') }}"
                           placeholder="https://linkedin.com/company/your-company"
                           class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-700 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 font-mono">
                    <p class="text-[10px] text-slate-400">B2B commercial trade, shipping logistics, and international supplier engagement.</p>
                </div>

                <!-- WhatsApp -->
                <div class="p-4 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-2">
                    <label class="flex items-center gap-2 text-xs font-bold text-slate-200">
                        <div class="w-6 h-6 rounded-lg bg-emerald-600/20 text-emerald-400 flex items-center justify-center border border-emerald-500/30">
                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 448 512" aria-hidden="true">
                                <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
                            </svg>
                        </div>
                        <span>WhatsApp Direct Chat Link</span>
                    </label>
                    <input type="text" name="settings[social_whatsapp]" 
                           value="{{ \App\Models\SiteSetting::get('social_whatsapp', 'https://wa.me/67583875018') }}"
                           placeholder="https://wa.me/67583875018"
                           class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-700 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 font-mono">
                    <p class="text-[10px] text-slate-400">Direct click-to-chat link for store owners &amp; fleet procurement managers.</p>
                </div>

                <!-- Instagram -->
                <div class="p-4 rounded-2xl bg-slate-900/80 border border-slate-800 space-y-2">
                    <label class="flex items-center gap-2 text-xs font-bold text-slate-200">
                        <div class="w-6 h-6 rounded-lg bg-rose-600/20 text-rose-400 flex items-center justify-center border border-rose-500/30">
                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 448 512" aria-hidden="true">
                                <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                            </svg>
                        </div>
                        <span>Instagram Profile URL</span>
                    </label>
                    <input type="url" name="settings[social_instagram]" 
                           value="{{ \App\Models\SiteSetting::get('social_instagram', 'https://instagram.com/senspnglimited') }}"
                           placeholder="https://instagram.com/your-handle"
                           class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-700 text-xs text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 font-mono">
                    <p class="text-[10px] text-slate-400">Visual FMCG brand campaigns and wholesale container arrival announcements.</p>
                </div>

            </div>
        </div>

        <!-- SECTION 2: Core Corporate Contacts & Depots -->
        <div class="rounded-3xl bg-[#0B1A2D] border border-slate-800 shadow-2xl p-6 sm:p-8 space-y-6">
            <div class="pb-3 border-b border-slate-800">
                <h3 class="text-base font-bold text-white font-['Outfit'] flex items-center gap-2">
                    <i data-lucide="phone-call" class="w-4 h-4 text-amber-400"></i>
                    <span>Contact Information &amp; Operational Warehouses</span>
                </h3>
                <p class="text-xs text-slate-400 mt-0.5">Physical depot addresses and wholesale inquiry contact numbers.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1.5">Public Phone Number</label>
                    <input type="text" name="settings[contact_phone]" value="{{ \App\Models\SiteSetting::get('contact_phone', '+675 8387 5018') }}"
                           class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-xs text-white focus:outline-none focus:border-cyan-400 font-mono">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1.5">Public Enquiry Email</label>
                    <input type="email" name="settings[contact_email]" value="{{ \App\Models\SiteSetting::get('contact_email', 'admin@senspng.com') }}"
                           class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-xs text-white focus:outline-none focus:border-cyan-400 font-mono">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1.5">Business Operating Hours</label>
                    <input type="text" name="settings[working_hours]" value="{{ \App\Models\SiteSetting::get('working_hours', 'Mon - Fri: 8:00 AM - 5:00 PM | Sat: 8:00 AM - 12:30 PM') }}"
                           class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-xs text-white focus:outline-none focus:border-cyan-400">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1.5">Direct WhatsApp Number</label>
                    <input type="text" name="settings[whatsapp_number]" value="{{ \App\Models\SiteSetting::get('whatsapp_number', '+67583875018') }}"
                           class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-xs text-white focus:outline-none focus:border-cyan-400 font-mono">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1.5">Port Moresby Central Hub Address</label>
                    <input type="text" name="settings[office_address]" value="{{ \App\Models\SiteSetting::get('office_address', 'Unit 04 Wamco Haus, Section 35 Lot 50, Kunai Street, Hohola, Port Moresby, Papua New Guinea') }}"
                           class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-xs text-white focus:outline-none focus:border-cyan-400">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1.5">Lae Logistics Hub Address</label>
                    <input type="text" name="settings[lae_address]" value="{{ \App\Models\SiteSetting::get('lae_address', 'Milfordhaven Industrial Corridor, Sector 12, Lae, Morobe Province, Papua New Guinea') }}"
                           class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-xs text-white focus:outline-none focus:border-cyan-400">
                </div>
            </div>
        </div>

        <!-- SECTION 3: Header Announcement Banner -->
        <div class="rounded-3xl bg-[#0B1A2D] border border-slate-800 shadow-2xl p-6 sm:p-8 space-y-4">
            <div class="pb-3 border-b border-slate-800">
                <h3 class="text-base font-bold text-white font-['Outfit'] flex items-center gap-2">
                    <i data-lucide="megaphone" class="w-4 h-4 text-cyan-400"></i>
                    <span>Top Announcement Ticker</span>
                </h3>
                <p class="text-xs text-slate-400 mt-0.5">Top-of-page notice displayed on public website for inventory arrivals and container stock updates.</p>
            </div>

            <div>
                <textarea name="settings[announcement_bar]" rows="2" 
                          class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-xs text-white focus:outline-none focus:border-cyan-400">{{ \App\Models\SiteSetting::get('announcement_bar') }}</textarea>
            </div>
        </div>

        <!-- Submit Action -->
        <div class="pt-2 flex items-center justify-between">
            <span class="text-xs text-slate-400">Changes apply immediately to public website and footer.</span>
            <button type="submit" class="px-8 py-3 rounded-xl bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-bold text-xs transition shadow-lg shadow-cyan-500/20 cursor-pointer flex items-center gap-2">
                <i data-lucide="save" class="w-4 h-4"></i>
                <span>Save All Settings</span>
            </button>
        </div>
    </form>
</div>
@endsection
