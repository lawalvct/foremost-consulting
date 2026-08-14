<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ArrowRight } from '@lucide/vue';
</script>

<template>
    <section
        id="consultation"
        aria-labelledby="final-cta-heading"
        class="bg-brand-warm-white py-12 sm:py-16 lg:py-20"
    >
        <div class="public-container">
            <div
                class="relative overflow-hidden border-l-[6px] border-brand-burgundy bg-brand-forest px-6 py-12 text-white shadow-[0_20px_60px_rgba(7,56,44,0.16)] sm:px-10 sm:py-14 lg:px-14 lg:py-16"
            >
                <div
                    class="pointer-events-none absolute -top-56 -right-32 size-[34rem] rounded-full border border-white/10"
                    aria-hidden="true"
                >
                    <span
                        class="absolute inset-20 rounded-full border border-brand-gold/18"
                    />
                    <span
                        class="absolute inset-40 rounded-full border border-white/10"
                    />
                </div>
                <div
                    class="pointer-events-none absolute right-0 bottom-0 h-px w-40 bg-brand-gold"
                    aria-hidden="true"
                />

                <div
                    class="relative grid items-center gap-9 lg:grid-cols-[1.2fr_0.8fr] lg:gap-16"
                >
                    <div class="max-w-4xl">
                        <p
                            class="text-xs leading-5 font-bold tracking-[0.18em] text-[var(--brand-gold-light)] uppercase"
                        >
                            Start a Conversation
                        </p>
                        <h2
                            id="final-cta-heading"
                            class="mt-4 font-serif text-[clamp(2.35rem,4.2vw,4.25rem)] leading-[1.02] font-medium tracking-[-0.03em]"
                        >
                            Let's Strengthen Your Financial and Business
                            Systems.
                        </h2>
                    </div>

                    <div>
                        <p
                            class="max-w-xl text-base leading-7 text-white/75 sm:text-lg sm:leading-8"
                        >
                            Start a focused conversation about your reporting,
                            controls, compliance, systems or
                            capacity-development priorities.
                        </p>
                        <div
                            class="mt-7 flex flex-col gap-3 sm:flex-row lg:flex-col xl:flex-row"
                        >
                            <Link
                                href="/request-consultation"
                                class="group inline-flex min-h-12 items-center justify-center gap-3 rounded-sm bg-brand-gold px-6 text-sm font-bold text-brand-forest-dark transition-colors hover:bg-[var(--brand-gold-light)]"
                            >
                                Request Consultation
                                <ArrowRight
                                    class="size-4 transition-transform group-hover:translate-x-1"
                                    aria-hidden="true"
                                />
                            </Link>
                            <Link
                                href="/contact"
                                class="inline-flex min-h-12 items-center justify-center rounded-sm border border-white/60 px-6 text-sm font-bold text-white transition-colors hover:border-white hover:bg-white hover:text-brand-forest-dark"
                            >
                                Contact Foremost
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
