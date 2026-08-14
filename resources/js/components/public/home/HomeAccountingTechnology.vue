<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ArrowRight, Check } from '@lucide/vue';
import { accountingTechnologySteps } from '@/content/homepage';
</script>

<template>
    <section
        id="accounting-technology"
        aria-labelledby="accounting-technology-heading"
        class="relative scroll-mt-36 overflow-hidden bg-[var(--brand-warm-grey)] py-16 sm:py-20 lg:py-24"
    >
        <div
            class="pointer-events-none absolute top-0 right-0 hidden h-full w-[18%] border-l border-brand-border/60 lg:block"
            aria-hidden="true"
        >
            <span class="absolute top-0 left-0 h-24 w-px bg-brand-burgundy" />
            <span class="absolute top-24 left-0 h-16 w-px bg-brand-gold" />
        </div>

        <div
            class="public-container relative grid items-start gap-12 lg:grid-cols-[0.88fr_1.12fr] lg:gap-20 xl:gap-24"
        >
            <div class="max-w-2xl">
                <p class="public-eyebrow">Accounting Technology</p>
                <h2
                    id="accounting-technology-heading"
                    class="mt-4 font-serif text-[clamp(2.4rem,4.2vw,4.25rem)] leading-[1.03] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    Technology that fits the way your organisation works.
                </h2>
                <p
                    class="mt-6 max-w-xl text-base leading-7 text-brand-muted sm:text-lg sm:leading-8"
                >
                    We help organisations assess, select, configure and adopt
                    accounting systems around their operational needs and
                    financial controls.
                </p>

                <p
                    class="mt-8 max-w-xl border-l-2 border-brand-gold bg-white px-5 py-4 text-sm leading-6 font-semibold text-brand-forest-dark sm:text-base sm:leading-7"
                >
                    Our approach begins with processes, people and reporting
                    requirements rather than with a software product.
                </p>

                <Link
                    href="/services/accounting-technology-and-systems"
                    class="group mt-8 inline-flex min-h-12 items-center justify-center gap-3 rounded-sm bg-brand-forest px-6 text-sm font-bold text-white transition-colors hover:bg-brand-forest-dark"
                >
                    Explore Accounting Technology
                    <ArrowRight
                        class="size-4 transition-transform group-hover:translate-x-1"
                        aria-hidden="true"
                    />
                </Link>
            </div>

            <div
                class="border border-brand-border bg-white shadow-[0_18px_50px_rgba(7,56,44,0.07)]"
            >
                <div
                    class="flex items-center justify-between gap-6 border-b border-brand-border px-5 py-5 sm:px-7"
                >
                    <div>
                        <p
                            class="text-xs leading-5 font-bold tracking-[0.16em] text-[var(--brand-gold-text)] uppercase"
                        >
                            Implementation Path
                        </p>
                        <h3
                            class="mt-1 font-serif text-2xl font-medium text-brand-charcoal"
                        >
                            From assessment to ongoing support
                        </h3>
                    </div>
                    <span
                        class="hidden size-11 shrink-0 items-center justify-center rounded-full bg-brand-forest text-white sm:inline-flex"
                        aria-hidden="true"
                    >
                        <Check class="size-5" :stroke-width="2" />
                    </span>
                </div>

                <ol>
                    <li
                        v-for="(step, index) in accountingTechnologySteps"
                        :key="step"
                        class="grid grid-cols-[2.25rem_minmax(0,1fr)_1.5rem] items-center gap-4 border-b border-brand-border px-5 py-4 last:border-b-0 sm:grid-cols-[2.75rem_minmax(0,1fr)_1.75rem] sm:px-7 sm:py-5"
                    >
                        <span
                            class="text-xs font-bold tracking-[0.12em] text-[var(--brand-gold-text)]"
                            aria-hidden="true"
                        >
                            {{ String(index + 1).padStart(2, '0') }}
                        </span>
                        <span
                            class="text-sm leading-6 font-semibold text-brand-charcoal sm:text-base"
                        >
                            {{ step }}
                        </span>
                        <span
                            class="inline-flex size-6 items-center justify-center rounded-full bg-[var(--brand-warm-grey)] text-brand-forest"
                            aria-hidden="true"
                        >
                            <Check class="size-3.5" :stroke-width="2" />
                        </span>
                    </li>
                </ol>
            </div>
        </div>
    </section>
</template>
