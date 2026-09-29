@extends('layouts.admin')

@section('title', 'Products Inventory Catalog')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-white font-['Outfit']">Wholesale Products &amp; SKUs</h1>
            <p class="text-xs text-slate-400 mt-1">Catalog items currently active in public database.</p>
        </div>
    </div>

    <div class="rounded-3xl bg-[#0B1A2D] border border-slate-800 shadow-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="border-b border-slate-800 text-slate-400 uppercase tracking-wider text-[10px] bg-slate-950/40">
                        <th class="py-3.5 px-4">Product Code</th>
                        <th class="py-3.5 px-4">Product Name</th>
                        <th class="py-3.5 px-4">Brand</th>
                        <th class="py-3.5 px-4">Division</th>
                        <th class="py-3.5 px-4">Packaging Spec</th>
                        <th class="py-3.5 px-4">Featured</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @foreach($products as $p)
                        <tr class="hover:bg-slate-800/30">
                            <td class="py-3.5 px-4 font-mono font-bold text-cyan-300">{{ $p->product_code }}</td>
                            <td class="py-3.5 px-4 font-bold text-white">{{ $p->name }}</td>
                            <td class="py-3.5 px-4 text-amber-400 font-semibold">{{ $p->brand->name }}</td>
                            <td class="py-3.5 px-4 text-slate-300">{{ $p->category->name }}</td>
                            <td class="py-3.5 px-4 text-slate-300">{{ $p->package_size }}</td>
                            <td class="py-3.5 px-4">
                                @if($p->is_featured)
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">Featured</span>
                                @else
                                    <span class="text-slate-500 text-[10px]">Standard</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-800 flex justify-center">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
