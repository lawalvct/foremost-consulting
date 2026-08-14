<script setup lang="ts">
import { whyForemostItems } from '@/content/homepage';
</script>

<template>
    <section
        id="why-foremost"
        aria-labelledby="why-foremost-heading"
        class="relative overflow-hidden border-b border-brand-border bg-brand-warm-white py-16 sm:py-20 lg:py-24"
    >
        <div
            class="public-container relative grid gap-12 lg:grid-cols-[0.72fr_1.28fr] lg:gap-20 xl:gap-24"
        >
            <div
                class="relative max-w-xl lg:max-w-none lg:border-r lg:border-brand-border/70 lg:pr-16 xl:pr-20"
            >
                <div
                    class="pointer-events-none absolute top-0 right-0 hidden lg:block"
                    aria-hidden="true"
                >
                    <span
                        class="absolute top-0 right-[-1px] h-28 w-px bg-brand-burgundy"
                    />
                    <span
                        class="absolute top-28 right-[-1px] h-16 w-px bg-brand-gold"
                    />
                </div>

                <p class="public-eyebrow">Why Foremost</p>
                <h2
                    id="why-foremost-heading"
                    class="mt-4 font-serif text-[clamp(2.4rem,4vw,4rem)] leading-[1.03] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    Professional expertise, applied with purpose.
                </h2>
                <p
                    class="mt-6 max-w-lg text-base leading-7 text-brand-muted sm:text-lg sm:leading-8"
                >
                    Our work combines professional judgement, sector awareness
                    and practical systems thinking to help organisations make
                    better decisions.
                </p>

                <div class="mt-9 flex items-center" aria-hidden="true">
                    <span class="h-0.5 w-20 bg-brand-burgundy" />
                    <span class="h-0.5 w-12 bg-brand-gold" />
                </div>
            </div>

            <ul class="border-y border-brand-border">
                <li
                    v-for="(item, index) in whyForemostItems"
                    :key="item.title"
                    class="grid grid-cols-[2rem_2.75rem_minmax(0,1fr)] items-start gap-3 border-b border-brand-border py-6 last:border-b-0 sm:grid-cols-[2.5rem_3rem_minmax(0,1fr)] sm:gap-5 sm:py-7"
                >
                    <span
                        class="pt-1 text-xs leading-5 font-bold tracking-[0.12em] text-[var(--brand-gold-text)]"
                        aria-hidden="true"
                    >
                        {{ String(index + 1).padStart(2, '0') }}
                    </span>

                    <span
                        class="inline-flex size-10 items-center justify-center rounded-full border border-brand-border bg-white text-brand-forest sm:size-11"
                        aria-hidden="true"
                    >
                        <component
                            :is="item.icon"
                            class="size-5"
                            :stroke-width="1.7"
                        />
                    </span>

                    <div>
                        <h3
                            class="text-base leading-6 font-bold text-brand-charcoal sm:text-lg"
                        >
                            {{ item.title }}
                        </h3>
                        <p
                            class="mt-2 max-w-2xl text-sm leading-6 text-brand-muted sm:text-[0.95rem]"
                        >
                            {{ item.description }}
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
</template>
