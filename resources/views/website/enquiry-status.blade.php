@extends('layouts.app')

@section('title', 'Enquiry Status Tracking — Sens PNG')

@section('content')
<section class="py-20 bg-radial-hero min-h-[70vh] flex items-center justify-center">
    <div class="max-w-xl mx-auto px-4 w-full">
        
        <div class="rounded-3xl bg-white border border-slate-200 p-8 shadow-xl space-y-6">
            <div class="flex items-center gap-3 border-b border-slate-200 pb-4">
                <div class="w-10 h-10 rounded-xl bg-sky-50 text-[#006EAD] flex items-center justify-center border border-sky-100">
                    <i data-lucide="file-search" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-slate-900 font-['Outfit']">Wholesale Enquiry Tracking</h2>
                    <p class="text-xs text-slate-500">Live registry status</p>
                </div>
            </div>

            @if($enquiry)
                <div class="space-y-4">
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex items-center justify-between">
                        <div>
                            <span class="text-xs text-slate-500 block">Enquiry Reference:</span>
                            <span class="text-lg font-mono font-bold text-[#006EAD]">{{ $enquiry->reference_no }}</span>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider
                            {{ $enquiry->status === 'new' ? 'bg-sky-100 text-[#006EAD] border border-sky-200' : '' }}
                            {{ $enquiry->status === 'contacted' ? 'bg-amber-100 text-amber-800 border border-amber-200' : '' }}
                            {{ $enquiry->status === 'in_review' ? 'bg-indigo-100 text-indigo-700 border border-indigo-200' : '' }}
                            {{ $enquiry->status === 'closed' ? 'bg-emerald-100 text-emerald-700 border border-emerald-200' : '' }}
                        ">
                            {{ ucfirst(str_replace('_', ' ', $enquiry->status)) }}
                        </span>
                    </div>

                    <div class="space-y-2 text-xs text-slate-600">
                        <div class="flex justify-between py-1.5 border-b border-slate-100">
                            <span class="text-slate-500">Registered Business:</span>
                            <strong class="text-slate-900">{{ $enquiry->business_name }}</strong>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-100">
                            <span class="text-slate-500">Contact Person:</span>
                            <strong class="text-slate-900">{{ $enquiry->contact_name }}</strong>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-100">
                            <span class="text-slate-500">Target Region:</span>
                            <strong class="text-slate-900">{{ $enquiry->province }}</strong>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-100">
                            <span class="text-slate-500">Product Division:</span>
                            <strong class="text-[#006EAD]">{{ $enquiry->category_interest }}</strong>
                        </div>
                        <div class="flex justify-between py-1.5">
                            <span class="text-slate-500">Logged On:</span>
                            <strong class="text-slate-900">{{ $enquiry->created_at->format('M d, Y - h:i A') }}</strong>
                        </div>
                    </div>

                    <div class="p-4 rounded-xl bg-sky-50 border border-sky-200 text-xs text-slate-700">
                        @if($enquiry->status === 'new')
                            <p class="text-[#006EAD] font-semibold mb-1">Status: Initial Queue</p>
                            <p class="text-[11px] text-slate-600">Your wholesale application has been received and assigned to our Port Moresby / Lae account management desks. A representative will contact you within 24 business hours.</p>
                        @elseif($enquiry->status === 'contacted')
                            <p class="text-amber-800 font-semibold mb-1">Status: In Contact</p>
                            <p class="text-[11px] text-slate-600">Our wholesale manager has reached out to your contact details. Please check your email or phone for initial price schedules.</p>
                        @else
                            <p class="text-emerald-800 font-semibold mb-1">Status: Active Account</p>
                            <p class="text-[11px] text-slate-600">Your business account has been processed. For direct dispatch coordination, contact your allocated account manager or call +675 8387 5018.</p>
                        @endif
                    </div>
                </div>
            @else
                <div class="text-center py-6 space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center mx-auto border border-amber-200">
                        <i data-lucide="search" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-900">Enter Your Tracking Reference</h3>
                        <p class="text-xs text-slate-500 mt-1">Please enter your 10-digit Sens PNG reference code (e.g. <span class="font-mono text-[#006EAD] font-semibold">SENS-2026-XXXXX</span>):</p>
                    </div>

                    <form action="{{ route('enquiry.track') }}" method="GET" class="space-y-3 pt-2">
                        <input type="text" name="reference_no" value="{{ $referenceNo ?? '' }}" required placeholder="SENS-2026-..." 
                               class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-300 font-mono text-sm text-center text-[#006EAD] placeholder-slate-400 focus:outline-none focus:border-[#006EAD]">
                        <button type="submit" class="w-full py-3 rounded-xl font-bold text-xs uppercase tracking-wider bg-[#006EAD] hover:bg-[#00598E] text-white transition shadow-sm">
                            Check Registry Status
                        </button>
                    </form>
                    
                    @if(isset($referenceNo) && $referenceNo)
                        <div class="p-3 rounded-xl bg-red-50 border border-red-200 text-xs text-red-600">
                            No active enquiry found with reference "{{ $referenceNo }}". Please verify your reference number.
                        </div>
                    @endif
                </div>
            @endif

            <div class="pt-4 border-t border-slate-200 flex justify-between items-center text-xs">
                <a href="{{ route('home') }}" class="text-[#006EAD] hover:underline flex items-center gap-1">
                    <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i>
                    <span>Back to Home</span>
                </a>
                <button @click="trackOpen = true" class="text-amber-600 hover:underline">
                    Search Another Code
                </button>
            </div>
        </div>

    </div>
</section>
@endsection
