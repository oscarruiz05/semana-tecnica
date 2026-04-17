<section id="registro" class="py-24 px-8 bg-surface">
    <div class="max-w-4xl mx-auto">
        <div class="bg-surface-container-low p-12 rounded-2xl shadow-2xl border border-primary/20">
            <div class="text-center mb-10">
                <h2 class="font-headline text-4xl font-bold mb-4">Registro de Interés</h2>
                <p class="text-on-surface-variant">Completa el formulario para recibir información detallada sobre paquetes corporativos y estudiantiles.</p>
            </div>
            <form class="space-y-6" method="POST" action="#">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-widest text-on-surface-variant">Nombre Completo</label>
                        <input class="w-full bg-surface-container border-none rounded-md p-4 text-on-surface focus:ring-2 focus:ring-primary placeholder:text-outline/50" placeholder="Ej. Juan Pérez" type="text" name="nombre"/>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-widest text-on-surface-variant">Correo Electrónico</label>
                        <input class="w-full bg-surface-container border-none rounded-md p-4 text-on-surface focus:ring-2 focus:ring-primary placeholder:text-outline/50" placeholder="juan@ejemplo.com" type="email" name="email"/>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-widest text-on-surface-variant">Teléfono</label>
                        <input class="w-full bg-surface-container border-none rounded-md p-4 text-on-surface focus:ring-2 focus:ring-primary placeholder:text-outline/50" placeholder="+57 300 000 0000" type="tel" name="telefono"/>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-widest text-on-surface-variant">Empresa o Universidad</label>
                        <input class="w-full bg-surface-container border-none rounded-md p-4 text-on-surface focus:ring-2 focus:ring-primary placeholder:text-outline/50" placeholder="Nombre de tu institución" type="text" name="institucion"/>
                    </div>
                </div>
                <button class="w-full kinetic-gradient text-on-primary font-headline font-bold py-5 rounded-md text-lg mt-4 hover:shadow-[0_0_20px_rgba(255,140,0,0.3)] transition-all" type="submit">
                    Enviar mi pre-inscripción
                </button>
                <p class="text-center text-[10px] text-on-surface-variant/50 uppercase tracking-widest mt-4">Al registrarte, aceptas nuestra política de tratamiento de datos personales.</p>
            </form>
        </div>
    </div>
</section>
