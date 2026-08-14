<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { homepageTrustItems } from '@/content/homepage';
</script>

<template>
    <section
        data-homepage-variant="v2"
        class="relative z-20 border-b border-brand-gold/55 bg-[var(--brand-forest-panel)]"
    >
        <div
            class="mx-auto grid w-full max-w-[120rem] lg:min-h-[31rem] lg:grid-cols-2"
        >
            <div
                class="relative flex items-center overflow-hidden px-4 py-16 sm:px-6 lg:px-12 lg:py-16 xl:px-14"
            >
                <div
                    class="pointer-events-none absolute inset-0 overflow-hidden"
                    aria-hidden="true"
                >
                    <span class="hero-v2-linework" />

                    <span
                        class="absolute right-10 bottom-7 hidden grid-cols-5 gap-5 opacity-45 lg:grid"
                    >
                        <span
                            v-for="index in 15"
                            :key="index"
                            class="size-1 rounded-full bg-brand-gold/35"
                        />
                    </span>
                </div>
                <div class="relative z-10 max-w-3xl">
                    <p
                        class="text-xs leading-5 font-bold tracking-[0.18em] text-[var(--brand-gold-light)] uppercase"
                    >
                        Audit • Accounting • Tax • Advisory
                    </p>
                    <h1
                        class="mt-5 max-w-[42rem] font-serif text-[clamp(2.8rem,3.6vw,3.5rem)] leading-[1.02] font-medium tracking-[-0.035em] text-white"
                    >
                        Professional Insight for Better Business Decisions.
                    </h1>
                    <p
                        class="mt-7 max-w-2xl text-base leading-7 text-white/76 sm:text-lg sm:leading-8"
                    >
                        Foremost Consulting Associates helps organisations
                        strengthen financial reporting, improve controls, meet
                        regulatory obligations and build sustainable systems for
                        growth.
                    </p>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <Link
                            href="/request-consultation"
                            class="inline-flex min-h-12 items-center justify-center rounded-sm bg-brand-gold px-6 text-sm font-bold text-brand-forest-dark shadow-[0_10px_30px_rgba(0,0,0,0.16)] transition-colors hover:bg-[var(--brand-gold-light)]"
                        >
                            Request a Consultation
                        </Link>
                        <a
                            href="#services"
                            class="inline-flex min-h-12 items-center justify-center rounded-sm border border-white/55 px-6 text-sm font-bold text-white transition-colors hover:border-white hover:bg-white hover:text-brand-forest-dark"
                        >
                            Explore Our Services
                        </a>
                    </div>

                    <ul
                        class="mt-8 flex flex-wrap gap-x-3 gap-y-2 text-sm font-medium text-white/68"
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
            </div>

            <figure class="relative min-h-[24rem] lg:min-h-full">
                <div
                    class="absolute inset-0 overflow-hidden border-l-[6px] border-brand-burgundy"
                >
                    <picture>
                        <source
                            media="(max-width: 1023px)"
                            srcset="
                                /brand/foremost-hero-professionals-v2-960.jpg
                            "
                        />
                        <img
                            src="/brand/foremost-hero-professionals-v2.jpg"
                            alt="Three business professionals reviewing a financial report beside a laptop in an executive office"
                            width="1672"
                            height="941"
                            fetchpriority="high"
                            class="h-full w-full object-cover object-center"
                        />
                    </picture>
                    <div
                        class="absolute inset-x-0 bottom-0 h-px bg-brand-gold"
                        aria-hidden="true"
                    />
                </div>

                <div
                    class="absolute bottom-4 left-4 z-10 flex min-h-20 items-center gap-4 rounded-sm border border-brand-border bg-white px-5 py-3 shadow-[0_16px_42px_rgba(7,56,44,0.22)] lg:bottom-0 lg:left-0 lg:min-w-72 lg:-translate-x-1/2 lg:translate-y-1/2"
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
