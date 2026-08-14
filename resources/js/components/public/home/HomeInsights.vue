<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ArrowUpRight, BookOpenText, Clock3 } from '@lucide/vue';
import { publishedInsights } from '@/content/homepage';

const latestInsights = publishedInsights.slice(0, 3);
</script>

<template>
    <section
        id="insights"
        aria-labelledby="insights-heading"
        class="relative scroll-mt-36 overflow-hidden bg-[var(--brand-warm-grey)] py-16 sm:py-20 lg:py-24"
    >
        <div
            class="pointer-events-none absolute top-0 right-0 h-px w-1/3 bg-brand-gold"
            aria-hidden="true"
        />
        <div
            class="pointer-events-none absolute top-0 right-1/3 h-px w-1/5 bg-brand-burgundy"
            aria-hidden="true"
        />

        <div class="public-container relative">
            <div
                class="grid items-end gap-6 lg:grid-cols-[1.15fr_0.85fr] lg:gap-16"
            >
                <div class="max-w-4xl">
                    <p class="public-eyebrow">Insights & Updates</p>
                    <h2
                        id="insights-heading"
                        class="mt-4 font-serif text-[clamp(2.4rem,4.4vw,4.4rem)] leading-[1.02] font-medium tracking-[-0.03em] text-brand-charcoal"
                    >
                        Useful guidance, published with care.
                    </h2>
                </div>
                <p
                    class="max-w-2xl text-base leading-7 text-brand-muted sm:text-lg sm:leading-8 lg:pb-1"
                >
                    Practical perspectives on accounting, tax, controls,
                    business systems and professional development.
                </p>
            </div>

            <div
                v-if="latestInsights.length"
                class="mt-12 grid gap-5 lg:grid-cols-3"
            >
                <article
                    v-for="insight in latestInsights"
                    :key="insight.href"
                    class="group overflow-hidden border border-brand-border bg-white"
                >
                    <Link :href="insight.href" class="block h-full">
                        <div
                            class="overflow-hidden border-b border-brand-border"
                        >
                            <img
                                :src="insight.image.src"
                                :alt="insight.image.alt"
                                :width="insight.image.width"
                                :height="insight.image.height"
                                loading="lazy"
                                class="aspect-[1.58/1] w-full object-cover transition-transform duration-500 group-hover:scale-[1.025]"
                            />
                        </div>
                        <div class="p-6">
                            <div
                                class="flex flex-wrap items-center gap-x-3 gap-y-2 text-xs font-semibold text-brand-muted"
                            >
                                <span
                                    class="tracking-[0.1em] text-brand-burgundy uppercase"
                                >
                                    {{ insight.category }}
                                </span>
                                <span
                                    class="size-1 rounded-full bg-brand-gold"
                                    aria-hidden="true"
                                />
                                <time :datetime="insight.publishedAt.iso">
                                    {{ insight.publishedAt.label }}
                                </time>
                                <span class="inline-flex items-center gap-1.5">
                                    <Clock3
                                        class="size-3.5"
                                        aria-hidden="true"
                                    />
                                    {{ insight.readingTime }}
                                </span>
                            </div>
                            <h3
                                class="mt-4 font-serif text-2xl leading-tight font-medium text-brand-charcoal"
                            >
                                {{ insight.title }}
                            </h3>
                            <span
                                class="mt-6 inline-flex items-center gap-2 text-sm font-bold text-brand-forest"
                            >
                                Read Article
                                <ArrowUpRight
                                    class="size-4 transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5"
                                    aria-hidden="true"
                                />
                            </span>
                        </div>
                    </Link>
                </article>
            </div>

            <div
                v-else
                class="mt-12 grid overflow-hidden border border-brand-border bg-white lg:grid-cols-[0.7fr_1.3fr]"
            >
                <div
                    class="flex min-h-56 items-center justify-center bg-brand-forest p-8 text-white"
                    aria-hidden="true"
                >
                    <div
                        class="flex size-24 items-center justify-center rounded-full border border-brand-gold/45"
                    >
                        <BookOpenText
                            class="size-10 text-[var(--brand-gold-light)]"
                            :stroke-width="1.5"
                        />
                    </div>
                </div>
                <div class="flex min-h-56 flex-col justify-center p-8 sm:p-10">
                    <p
                        class="text-xs leading-5 font-bold tracking-[0.16em] text-[var(--brand-gold-text)] uppercase"
                    >
                        Coming Soon
                    </p>
                    <h3
                        class="mt-3 font-serif text-3xl leading-tight font-medium text-brand-charcoal"
                    >
                        New perspectives are on the way.
                    </h3>
                    <p
                        class="mt-4 max-w-2xl text-base leading-7 text-brand-muted"
                    >
                        Foremost is preparing practical articles for businesses,
                        institutions and professionals.
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>
