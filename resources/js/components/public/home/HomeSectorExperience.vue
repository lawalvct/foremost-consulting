<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ArrowUpRight } from '@lucide/vue';
import { sectorExperienceItems } from '@/content/homepage';
</script>

<template>
    <section
        id="industries"
        aria-labelledby="sector-experience-heading"
        class="relative scroll-mt-36 overflow-hidden bg-brand-forest-dark py-16 text-white sm:py-20 lg:py-24"
    >
        <div
            class="pointer-events-none absolute -top-64 -right-44 size-[38rem] rounded-full border border-white/10"
            aria-hidden="true"
        >
            <span
                class="absolute inset-20 rounded-full border border-brand-gold/15"
            />
            <span
                class="absolute inset-40 rounded-full border border-white/10"
            />
        </div>
        <div
            class="pointer-events-none absolute bottom-0 left-0 h-px w-2/5 bg-brand-burgundy"
            aria-hidden="true"
        />
        <div
            class="pointer-events-none absolute bottom-0 left-[40%] h-px w-1/5 bg-brand-gold"
            aria-hidden="true"
        />

        <div class="public-container relative">
            <div
                class="grid items-end gap-6 lg:grid-cols-[1.1fr_0.9fr] lg:gap-16"
            >
                <div class="max-w-3xl">
                    <p
                        class="text-xs leading-5 font-bold tracking-[0.18em] text-[var(--brand-gold-light)] uppercase"
                    >
                        Sector Experience
                    </p>
                    <h2
                        id="sector-experience-heading"
                        class="mt-4 font-serif text-[clamp(2.4rem,4.4vw,4.4rem)] leading-[1.02] font-medium tracking-[-0.03em]"
                    >
                        Experience shaped by different operating realities.
                    </h2>
                </div>
                <p
                    class="max-w-2xl text-base leading-7 text-white/75 sm:text-lg sm:leading-8 lg:pb-1"
                >
                    From regulated institutions to growing businesses, our
                    approach adapts to each organisation's context, priorities
                    and responsibilities.
                </p>
            </div>

            <ul
                class="mt-12 grid border-t border-l border-white/15 sm:grid-cols-2 xl:grid-cols-4"
                aria-label="Sectors served"
            >
                <li
                    v-for="(sector, index) in sectorExperienceItems"
                    :key="sector.title"
                    class="group relative flex min-h-44 flex-col justify-between border-r border-b border-white/15 p-5 transition-colors hover:bg-white/[0.04] sm:p-6"
                >
                    <div class="flex items-start justify-between gap-5">
                        <span
                            class="inline-flex size-11 items-center justify-center rounded-full border border-brand-gold/35 text-[var(--brand-gold-light)]"
                            aria-hidden="true"
                        >
                            <component
                                :is="sector.icon"
                                class="size-5"
                                :stroke-width="1.7"
                            />
                        </span>
                        <span
                            class="text-xs leading-5 font-bold tracking-[0.12em] text-white/45"
                            aria-hidden="true"
                        >
                            {{ String(index + 1).padStart(2, '0') }}
                        </span>
                    </div>
                    <h3
                        class="mt-8 max-w-[15rem] text-lg leading-snug font-semibold text-white"
                    >
                        {{ sector.title }}
                    </h3>
                </li>
            </ul>

            <div class="mt-8 flex justify-end">
                <Link
                    href="/industries"
                    class="group inline-flex min-h-12 items-center justify-center gap-3 border-b border-brand-gold pb-1 text-sm font-bold text-white transition-colors hover:text-[var(--brand-gold-light)]"
                >
                    Explore Our Industries
                    <ArrowUpRight
                        class="size-4 transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5"
                        aria-hidden="true"
                    />
                </Link>
            </div>
        </div>
    </section>
</template>
