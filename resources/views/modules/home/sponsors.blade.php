<section class="py-12 bg-surface-container-low border-y border-outline-variant/30 overflow-hidden">
    <div class="max-w-screen-2xl mx-auto px-8 mb-8">
        <p class="text-center text-xs font-bold uppercase tracking-[0.3em] text-on-surface-variant/50">Patrocinadores &amp; Aliados</p>
    </div>
    <div class="sponsors-track-wrapper">
        <div class="sponsors-track">
            <!-- Sponsor items (duplicated for infinite loop) -->
            @foreach (['Ecopetrol', 'Halliburton', 'Schlumberger', 'Baker Hughes', 'TotalEnergies', 'Shell', 'Weatherford', 'Oxy', 'Ecopetrol', 'Halliburton', 'Schlumberger', 'Baker Hughes', 'TotalEnergies', 'Shell', 'Weatherford', 'Oxy'] as $sponsor)
            <div class="sponsor-item">
                <div class="flex items-center gap-3 px-8 py-3 rounded-lg bg-surface-container border border-outline-variant/40 hover:border-primary/40 transition-colors whitespace-nowrap">
                    <span class="material-symbols-outlined text-primary/60 text-lg">oil_barrel</span>
                    <span class="font-headline font-bold text-on-surface-variant text-sm uppercase tracking-wider">{{ $sponsor }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
