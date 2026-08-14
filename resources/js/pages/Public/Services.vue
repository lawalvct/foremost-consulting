<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { ArrowRight, Check } from '@lucide/vue';
import HomeFinalCta from '@/components/public/home/HomeFinalCta.vue';
import { coreServices } from '@/content/homepage';
import { engagementApproach } from '@/content/serviceDetails';
</script>

<template>
    <Head title="Professional Services">
        <meta
            head-key="description"
            name="description"
            content="Explore Foremost Consulting Associates services in audit, accounting, tax, business advisory, corporate affairs, investigation, accounting technology and training."
        />
    </Head>

    <section class="relative overflow-hidden bg-brand-forest-dark text-white">
        <div
            class="pointer-events-none absolute -top-52 -right-28 size-[36rem] rounded-full border border-white/12"
            aria-hidden="true"
        >
            <span
                class="absolute inset-20 rounded-full border border-brand-gold/20"
            />
            <span
                class="absolute inset-40 rounded-full border border-white/12"
            />
        </div>
        <div class="public-container relative py-16 sm:py-20 lg:py-24">
            <p
                class="text-xs font-bold tracking-[0.18em] text-[var(--brand-gold-light)] uppercase"
            >
                Our Services
            </p>
            <h1
                class="mt-5 max-w-5xl font-serif text-[clamp(2.8rem,5.4vw,5.5rem)] leading-[0.98] font-medium tracking-[-0.035em]"
            >
                Integrated expertise for stronger organisations.
            </h1>
            <p
                class="mt-7 max-w-3xl text-base leading-7 text-white/76 sm:text-lg sm:leading-8"
            >
                Connected audit, accounting, tax, advisory, corporate,
                investigation, systems and training capabilities shaped around
                real organisational needs.
            </p>
        </div>
    </section>

    <section
        aria-labelledby="services-heading"
        class="bg-brand-warm-white py-16 sm:py-20 lg:py-24"
    >
        <div class="public-container">
            <div class="max-w-3xl">
                <p class="public-eyebrow">What We Do</p>
                <h2
                    id="services-heading"
                    class="mt-4 font-serif text-[clamp(2.4rem,4vw,4rem)] leading-[1.03] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    Eight connected service groups.
                </h2>
                <p class="mt-5 text-base leading-7 text-brand-muted sm:text-lg">
                    Select a service to see the problems addressed, available
                    components, intended clients and our engagement approach.
                </p>
            </div>

            <ul class="mt-11 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                <li v-for="(service, index) in coreServices" :key="service.id">
                    <Link
                        :href="service.href"
                        class="group flex h-full min-h-72 flex-col border border-brand-border bg-white p-7 transition-[border-color,transform,box-shadow] hover:-translate-y-1 hover:border-brand-gold hover:shadow-[0_18px_42px_rgba(7,56,44,0.1)] focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-brand-burgundy"
                    >
                        <div class="flex items-center justify-between gap-4">
                            <span
                                class="inline-flex size-12 items-center justify-center rounded-full bg-brand-forest text-white"
                                aria-hidden="true"
                            >
                                <component
                                    :is="service.icon"
                                    class="size-5"
                                    :stroke-width="1.7"
                                />
                            </span>
                            <span
                                class="text-xs font-bold tracking-[0.12em] text-[var(--brand-gold-text)]"
                                aria-hidden="true"
                            >
                                {{ String(index + 1).padStart(2, '0') }}
                            </span>
                        </div>
                        <h3
                            class="mt-7 font-serif text-2xl leading-tight font-medium text-brand-charcoal"
                        >
                            {{ service.title }}
                        </h3>
                        <p class="mt-4 text-sm leading-6 text-brand-muted">
                            {{ service.description }}
                        </p>
                        <span
                            class="mt-auto flex items-center gap-2 pt-7 text-sm font-bold text-brand-burgundy"
                        >
                            Explore service
                            <ArrowRight
                                class="size-4 transition-transform group-hover:translate-x-1"
                                aria-hidden="true"
                            />
                        </span>
                    </Link>
                </li>
            </ul>
        </div>
    </section>

    <section
        aria-labelledby="approach-heading"
        class="border-y border-brand-border bg-[var(--brand-warm-grey)] py-16 sm:py-20 lg:py-24"
    >
        <div class="public-container">
            <div class="grid gap-10 lg:grid-cols-[0.78fr_1.22fr] lg:gap-16">
                <div class="max-w-xl">
                    <p class="public-eyebrow">How We Engage</p>
                    <h2
                        id="approach-heading"
                        class="mt-4 font-serif text-[clamp(2.4rem,4vw,4rem)] leading-[1.03] font-medium tracking-[-0.03em] text-brand-charcoal"
                    >
                        Clear scope. Careful delivery. Practical next steps.
                    </h2>
                </div>

                <ol class="grid gap-4 sm:grid-cols-2">
                    <li
                        v-for="(step, index) in engagementApproach"
                        :key="step.title"
                        class="border border-brand-border bg-white p-6"
                    >
                        <div class="flex items-center gap-3">
                            <span
                                class="inline-flex size-8 items-center justify-center rounded-full bg-brand-forest text-white"
                                aria-hidden="true"
                            >
                                <Check class="size-4" />
                            </span>
                            <span
                                class="text-xs font-bold tracking-[0.12em] text-[var(--brand-gold-text)]"
                            >
                                STEP {{ String(index + 1).padStart(2, '0') }}
                            </span>
                        </div>
                        <h3
                            class="mt-5 font-serif text-2xl font-medium text-brand-charcoal"
                        >
                            {{ step.title }}
                        </h3>
                        <p class="mt-3 text-sm leading-6 text-brand-muted">
                            {{ step.description }}
                        </p>
                    </li>
                </ol>
            </div>
        </div>
    </section>

    <HomeFinalCta />
</template>
