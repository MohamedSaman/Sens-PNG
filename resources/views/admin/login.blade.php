<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Login — Sens PNG Administration Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/brands/spl-emblem.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#040D1A] text-slate-100 min-h-screen flex items-center justify-center p-4 relative overflow-hidden select-none">

    <!-- Ambient Lighting & Corporate Glow Layers -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-40 left-1/2 -translate-x-1/2 w-[700px] h-[500px] bg-gradient-to-b from-[#006EAD]/30 via-sky-500/10 to-transparent rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 right-10 w-[500px] h-[400px] bg-[#003F6D]/20 rounded-full blur-3xl"></div>
        <div class="absolute inset-0 bg-[radial-gradient(#1e3a5f_1px,transparent_1px)] [background-size:24px_24px] opacity-20"></div>
    </div>

    <div class="w-full max-w-[460px] relative z-10">
        
        <!-- Main Login Card -->
        <div class="rounded-3xl bg-[#081728]/90 backdrop-blur-2xl border border-sky-500/25 p-7 sm:p-10 shadow-[0_25px_70px_rgba(0,110,173,0.3)] relative">
            
            <!-- Logo & Brand Header -->
            <div class="text-center space-y-3 mb-6">
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center gap-3 group">
                    <img src="{{ asset('images/brands/spl-emblem-white.png') }}?v=2" alt="Sens PNG" class="h-10 w-auto object-contain transition duration-300 group-hover:scale-105">
                    <span class="text-2xl font-black tracking-tight text-white font-['Outfit']">Sens PNG</span>
                </a>
                
                <div class="pt-1">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-sky-500/10 border border-sky-400/20 text-[10px] font-bold uppercase tracking-widest text-sky-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                        Admin Management Console
                    </span>
                </div>

                <p class="text-xs text-slate-300 leading-relaxed pt-1">
                    Restricted B2B administration portal for Sens PNG Limited authorized personnel.
                </p>
            </div>

            <!-- Credentials Callout Banner -->
            <div class="mb-6 p-4 rounded-2xl bg-sky-950/70 border border-sky-400/30 text-xs shadow-inner">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-amber-300 flex items-center gap-1.5">
                        <i data-lucide="key" class="w-3.5 h-3.5 text-amber-400"></i>
                        <span>Admin Login Credentials</span>
                    </span>
                    <button type="button" onclick="fillCredentials()" 
                            class="px-2.5 py-1 rounded-lg bg-sky-500 hover:bg-sky-400 text-slate-950 font-bold text-[11px] transition shadow-sm cursor-pointer">
                        Auto-Fill
                    </button>
                </div>
                <div class="space-y-1 font-mono text-[11px] text-slate-200">
                    <div class="flex items-center justify-between">
                        <span class="text-slate-400">Email:</span>
                        <code class="text-white bg-slate-900/60 px-2 py-0.5 rounded border border-white/10">admin@senspng.com</code>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-slate-400">Password:</span>
                        <code class="text-amber-300 font-bold bg-slate-900/60 px-2 py-0.5 rounded border border-white/10">SensAdmin2026!</code>
                    </div>
                </div>
            </div>

            <!-- Error Alerts -->
            @if($errors->any())
                <div class="mb-5 p-3.5 rounded-xl bg-red-950/80 border border-red-500/50 text-xs text-red-200 flex items-center gap-2">
                    <i data-lucide="alert-circle" class="w-4 h-4 text-red-400 shrink-0"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <!-- Login Form -->
            <form action="{{ route('admin.authenticate') }}" method="POST" class="space-y-4">
                @csrf
                
                <!-- Email Field -->
                <div>
                    <label class="block text-xs font-semibold text-slate-200 uppercase tracking-wider mb-1.5">
                        Staff Email Address
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                        </div>
                        <input type="email" id="email" name="email" value="{{ old('email', 'admin@senspng.com') }}" required 
                               class="w-full pl-10 pr-4 py-3 rounded-xl bg-slate-900/90 border border-slate-700/80 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-500/20 transition">
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <label class="block text-xs font-semibold text-slate-200 uppercase tracking-wider mb-1.5">
                        Account Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i data-lucide="lock" class="w-4 h-4"></i>
                        </div>
                        <input type="password" id="password" name="password" required value="SensAdmin2026!"
                               class="w-full pl-10 pr-10 py-3 rounded-xl bg-slate-900/90 border border-slate-700/80 text-sm text-white placeholder-slate-500 focus:outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-500/20 transition">
                        <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-white transition cursor-pointer">
                            <i data-lucide="eye" id="eye-icon" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between text-xs pt-1">
                    <label class="flex items-center gap-2 text-slate-300 cursor-pointer">
                        <input type="checkbox" name="remember" checked class="rounded bg-slate-900 border-slate-700 text-[#006EAD] focus:ring-0">
                        <span>Remember this device</span>
                    </label>
                    <span class="text-slate-400 text-[11px] flex items-center gap-1">
                        <i data-lucide="shield-check" class="w-3.5 h-3.5 text-emerald-400"></i>
                        <span>256-Bit SSL</span>
                    </span>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        class="w-full py-3.5 px-6 rounded-xl font-bold text-sm text-white bg-gradient-to-r from-[#006EAD] to-[#0284C7] hover:from-[#005a8f] hover:to-[#0274af] transition duration-200 shadow-xl shadow-sky-600/30 flex items-center justify-center gap-2 cursor-pointer transform hover:-translate-y-0.5">
                    <span>Authenticate &amp; Access Dashboard</span>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </button>
            </form>

            <!-- Card Footer -->
            <div class="mt-6 pt-5 border-t border-slate-800/80 flex items-center justify-between text-xs">
                <a href="{{ route('home') }}" class="text-slate-400 hover:text-sky-400 transition flex items-center gap-1.5">
                    <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i>
                    <span>Return to Website</span>
                </a>
                <span class="text-slate-400 text-[10px]">Port Moresby &bull; Lae</span>
            </div>

        </div>

        <!-- Security Sub-note -->
        <p class="text-center text-[11px] text-slate-400 mt-4">
            Sens PNG Limited &bull; Wholesale Logistics &amp; Distribution Operations
        </p>

    </div>

    <!-- Quick Credentials Fill & Password Toggle Script -->
    <script>
        function fillCredentials() {
            const emailInput = document.getElementById('email');
            const passInput = document.getElementById('password');
            if (emailInput) emailInput.value = 'admin@senspng.com';
            if (passInput) passInput.value = 'SensAdmin2026!';
            
            // Visual feedback
            emailInput.classList.add('ring-2', 'ring-emerald-400');
            passInput.classList.add('ring-2', 'ring-emerald-400');
            setTimeout(() => {
                emailInput.classList.remove('ring-2', 'ring-emerald-400');
                passInput.classList.remove('ring-2', 'ring-emerald-400');
            }, 800);
        }

        function togglePasswordVisibility() {
            const passInput = document.getElementById('password');
            if (!passInput) return;
            passInput.type = passInput.type === 'password' ? 'text' : 'password';
        }
    </script>
</body>
</html>
