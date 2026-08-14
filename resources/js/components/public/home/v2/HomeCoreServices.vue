<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ArrowRight } from '@lucide/vue';
import { coreServices } from '@/content/homepage';
</script>

<template>
    <section
        id="services"
        class="relative z-10 scroll-mt-36 bg-[var(--brand-warm-grey)]"
    >
        <div
            class="mx-auto grid w-full max-w-[120rem] lg:grid-cols-[minmax(21rem,1fr)_minmax(0,2fr)]"
        >
            <div
                class="bg-[var(--brand-forest-panel)] px-4 py-14 text-white sm:px-6 lg:px-10 lg:py-14 xl:px-12"
            >
                <p
                    class="text-xs leading-5 font-bold tracking-[0.18em] text-[var(--brand-gold-light)] uppercase"
                >
                    Our Core Services
                </p>
                <h2
                    class="mt-4 max-w-md font-serif text-4xl leading-[1.05] font-medium tracking-[-0.025em] sm:text-[2.5rem]"
                >
                    Integrated expertise. One trusted firm.
                </h2>
                <p class="mt-5 max-w-md text-base leading-7 text-white/72">
                    Audit, accounting, tax, training and advisory capabilities
                    for stronger organisations.
                </p>
                <div class="mt-9 flex items-center" aria-hidden="true">
                    <span class="h-0.5 w-20 bg-brand-burgundy" />
                    <span class="h-0.5 w-12 bg-brand-gold" />
                </div>
            </div>

            <div class="grid bg-[var(--brand-warm-grey)] sm:grid-cols-2">
                <Link
                    v-for="(service, index) in coreServices"
                    :id="service.id"
                    :key="service.title"
                    :href="service.href"
                    class="group grid min-h-24 scroll-mt-40 grid-cols-[1.7rem_2rem_minmax(0,1fr)_1.25rem] items-center gap-3 border-b border-brand-border px-4 py-4 transition-colors hover:bg-white focus-visible:bg-white sm:min-h-24 sm:px-6 lg:px-8 sm:[&:nth-child(odd)]:border-r"
                >
                    <span
                        class="text-[0.68rem] font-bold tracking-[0.1em] text-[var(--brand-gold-text)]"
                    >
                        {{ String(index + 1).padStart(2, '0') }}
                    </span>
                    <span
                        class="inline-flex size-8 items-center justify-center text-brand-forest"
                    >
                        <component
                            :is="service.icon"
                            class="size-5"
                            aria-hidden="true"
                        />
                    </span>
                    <h3
                        class="text-sm leading-snug font-bold text-brand-charcoal sm:text-base"
                    >
                        {{ service.title }}
                    </h3>
                    <ArrowRight
                        class="size-4 text-brand-burgundy transition-transform group-hover:translate-x-1"
                        aria-hidden="true"
                    />
                </Link>
            </div>
        </div>
    </section>
</template>
