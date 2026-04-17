<section id="precios" class="py-24 px-8 bg-surface-container-lowest">
    <div class="max-w-screen-2xl mx-auto">
        <div class="text-center mb-16">
            <span class="text-accent-yellow font-label text-sm font-bold uppercase tracking-widest block mb-2">Inscripciones</span>
            <h2 class="font-headline text-5xl font-bold tracking-tight text-on-surface">Planes de Acceso</h2>
            <p class="text-on-surface-variant mt-4 max-w-xl mx-auto">Precios con IVA incluido. Asegura tu lugar antes de que se agoten los cupos.</p>
        </div>

        @if($plans->isEmpty())
            <p class="text-center text-on-surface-variant">Próximamente se publicarán los planes de inscripción.</p>
        @else
            @php
                $styles = [
                    [
                        'icon'        => 'school',
                        'card'        => 'hover:border-accent-green/50',
                        'icon_box'    => 'bg-accent-green/10 text-accent-green group-hover:bg-accent-green group-hover:text-white',
                        'price'       => 'text-accent-green',
                        'btn'         => 'border-accent-green text-accent-green hover:bg-accent-green hover:text-white',
                    ],
                    [
                        'icon'        => 'engineering',
                        'card'        => 'hover:border-primary/50',
                        'icon_box'    => 'bg-primary/10 text-primary group-hover:bg-primary group-hover:text-on-primary',
                        'price'       => 'text-primary',
                        'btn'         => 'border-primary text-primary hover:bg-primary hover:text-on-primary',
                    ],
                    [
                        'icon'        => 'workspace_premium',
                        'card'        => 'hover:border-secondary/50',
                        'icon_box'    => 'bg-secondary/10 text-secondary group-hover:bg-secondary group-hover:text-white',
                        'price'       => 'text-secondary',
                        'btn'         => 'border-secondary text-secondary hover:bg-secondary hover:text-white',
                    ],
                    [
                        'icon'        => 'star',
                        'card'        => 'hover:border-accent-yellow/50',
                        'icon_box'    => 'bg-accent-yellow/10 text-accent-yellow group-hover:bg-accent-yellow group-hover:text-on-primary',
                        'price'       => 'text-accent-yellow',
                        'btn'         => 'border-accent-yellow text-accent-yellow hover:bg-accent-yellow hover:text-on-primary',
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                @foreach($plans as $plan)
                    @php $s = $styles[$loop->index % count($styles)]; @endphp
                    <div class="relative p-10 bg-surface-container rounded-xl border border-outline-variant/50 flex flex-col gap-6 hover:bg-surface-bright transition-all group min-h-120 {{ $s['card'] }}">
                        <div class="w-12 h-12 rounded-lg flex items-center justify-center transition-all {{ $s['icon_box'] }}">
                            <span class="material-symbols-outlined">{{ $s['icon'] }}</span>
                        </div>
                        <div>
                            <h3 class="font-headline text-2xl font-bold mb-1">{{ $plan->name }}</h3>
                            @if($plan->description)
                                <p class="text-on-surface-variant text-sm leading-relaxed">{{ $plan->description }}</p>
                            @endif
                        </div>
                        <div class="mt-auto">
                            <div class="flex items-end gap-2 mb-6">
                                <span class="font-headline text-5xl font-black {{ $s['price'] }}">
                                    ${{ number_format($plan->price, 0, ',', '.') }}
                                </span>
                                <span class="text-on-surface-variant text-sm mb-2">COP</span>
                            </div>
                            <button onclick="scrollToSection('registro')"
                                    class="w-full py-4 rounded-md border-2 font-headline font-bold text-sm uppercase tracking-wider transition-all flex items-center justify-center gap-2 group/btn {{ $s['btn'] }}">
                                <span>Inscribirme</span>
                                <span class="material-symbols-outlined text-base group-hover/btn:translate-x-1 transition-transform">arrow_forward</span>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
