<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { homepageTrustItems } from '@/content/homepage';
</script>

<template>
    <section
        data-homepage-variant="v1"
        class="overflow-hidden border-b border-brand-border bg-brand-warm-white"
    >
        <div
            class="public-container grid items-center gap-14 py-16 lg:grid-cols-[0.9fr_1.1fr] lg:gap-16 lg:py-20 xl:py-24"
        >
            <div class="relative z-10">
                <p class="public-eyebrow">
                    Audit • Accounting • Tax • Advisory
                </p>
                <h1
                    class="mt-5 max-w-3xl font-serif text-[clamp(2.7rem,5vw,5rem)] leading-[0.98] font-medium tracking-[-0.035em] text-brand-charcoal"
                >
                    Professional Insight for Better Business Decisions.
                </h1>
                <p
                    class="mt-7 max-w-2xl text-base leading-7 text-brand-muted sm:text-lg sm:leading-8"
                >
                    Foremost Consulting Associates helps organisations
                    strengthen financial reporting, improve controls, meet
                    regulatory obligations and build sustainable systems for
                    growth.
                </p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <Link
                        href="/request-consultation"
                        class="inline-flex min-h-12 items-center justify-center rounded-sm bg-brand-forest px-6 text-sm font-bold text-white shadow-[0_8px_24px_rgba(11,77,59,0.16)] transition-colors hover:bg-brand-forest-dark"
                    >
                        Request a Consultation
                    </Link>
                    <a
                        href="#services"
                        class="inline-flex min-h-12 items-center justify-center rounded-sm border border-brand-burgundy px-6 text-sm font-bold text-brand-burgundy transition-colors hover:bg-brand-burgundy hover:text-white"
                    >
                        Explore Our Services
                    </a>
                </div>

                <ul
                    class="mt-8 flex flex-wrap gap-x-3 gap-y-2 text-sm font-medium text-brand-muted"
                    aria-label="Foremost credentials"
                >
                    <li
                        v-for="(item, index) in homepageTrustItems"
                        :key="item"
                        class="flex items-center gap-3"
                    >
                        <span
                            v-if="index > 0"
                            class="size-1 rounded-full bg-brand-gold"
                            aria-hidden="true"
                        />
                        {{ item }}
                    </li>
                </ul>
            </div>

            <figure class="relative mx-auto w-full max-w-[52rem] pb-8 lg:pb-10">
                <div
                    class="absolute -top-3 right-4 bottom-11 -left-3 rounded-sm border border-brand-gold"
                    aria-hidden="true"
                />
                <div
                    class="absolute top-3 -right-2 bottom-11 w-1 rounded-r-sm bg-brand-burgundy"
                    aria-hidden="true"
                />
                <picture>
                    <source
                        media="(max-width: 1023px)"
                        srcset="/brand/foremost-hero-professionals-v1-960.jpg"
                    />
                    <img
                        src="/brand/foremost-hero-professionals-v1.jpg"
                        alt="Three business professionals reviewing financial reports together in an office"
                        width="1727"
                        height="911"
                        fetchpriority="high"
                        class="relative aspect-[1.82/1] w-full rounded-sm object-cover shadow-[0_20px_50px_rgba(32,38,43,0.15)]"
                    />
                </picture>

                <div
                    class="absolute right-4 bottom-0 flex min-h-20 items-center gap-4 rounded-sm border border-brand-border bg-white px-5 py-3 shadow-[0_14px_35px_rgba(32,38,43,0.16)] sm:right-10 sm:min-w-72"
                >
                    <img
                        src="/brand/foremost-fca-mark-128.png"
                        alt=""
                        width="128"
                        height="128"
                        class="size-14 shrink-0"
                    />
                    <span class="h-11 w-px bg-brand-gold" aria-hidden="true" />
                    <span class="font-serif text-lg text-brand-charcoal"
                        >Established 2006</span
                    >
                </div>
                <figcaption class="sr-only">
                    Representative professional imagery; the people shown are
                    not identified as Foremost staff.
                </figcaption>
            </figure>
        </div>
    </section>
</template>
