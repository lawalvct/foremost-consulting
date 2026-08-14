<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { ArrowRight, Check, ChevronRight } from '@lucide/vue';
import { computed } from 'vue';
import HomeFinalCta from '@/components/public/home/HomeFinalCta.vue';
import { coreServices } from '@/content/homepage';
import { engagementApproach, serviceDetails } from '@/content/serviceDetails';
import type { ServiceSlug } from '@/content/serviceDetails';

const props = defineProps<{
    serviceSlug: ServiceSlug;
}>();

const service = computed(() => serviceDetails[props.serviceSlug]);
const serviceSummary = computed(() =>
    coreServices.find((item) => item.href.endsWith(props.serviceSlug)),
);
const relatedServices = computed(() =>
    coreServices
        .filter((item) => !item.href.endsWith(props.serviceSlug))
        .slice(0, 3),
);
const structuredData = computed(() =>
    JSON.stringify({
        '@context': 'https://schema.org',
        '@type': 'Service',
        name: service.value.title,
        description: service.value.valueProposition,
        serviceType: service.value.title,
        provider: {
            '@type': 'ProfessionalService',
            name: 'Foremost Consulting Associates',
            address: {
                '@type': 'PostalAddress',
                addressLocality: 'Abeokuta',
                addressRegion: 'Ogun State',
                addressCountry: 'NG',
            },
        },
        areaServed: service.value.sectors,
    }),
);
</script>

<template>
    <Head :title="service.title">
        <meta
            head-key="description"
            name="description"
            :content="service.metaDescription"
        />
        <component
            :is="'script'"
            head-key="service-structured-data"
            type="application/ld+json"
        >
            {{ structuredData }}
        </component>
    </Head>

    <section class="relative overflow-hidden bg-brand-forest-dark text-white">
        <div
            class="pointer-events-none absolute -top-52 -right-24 size-[35rem] rounded-full border border-white/12"
            aria-hidden="true"
        >
            <span
                class="absolute inset-20 rounded-full border border-brand-gold/20"
            />
            <span
                class="absolute inset-40 rounded-full border border-white/12"
            />
        </div>

        <div class="public-container relative py-14 sm:py-18 lg:py-24">
            <nav aria-label="Breadcrumb">
                <ol
                    class="flex flex-wrap items-center gap-2 text-xs font-semibold text-white/66"
                >
                    <li><Link href="/" class="hover:text-white">Home</Link></li>
                    <li aria-hidden="true">
                        <ChevronRight class="size-3.5" />
                    </li>
                    <li>
                        <Link href="/services" class="hover:text-white">
                            Services
                        </Link>
                    </li>
                    <li aria-hidden="true">
                        <ChevronRight class="size-3.5" />
                    </li>
                    <li class="text-[var(--brand-gold-light)]">
                        {{ service.title }}
                    </li>
                </ol>
            </nav>

            <div class="mt-10 grid gap-8 lg:grid-cols-[1fr_auto] lg:items-end">
                <div class="max-w-5xl">
                    <p
                        class="text-xs font-bold tracking-[0.18em] text-[var(--brand-gold-light)] uppercase"
                    >
                        Professional Service
                    </p>
                    <h1
                        class="mt-5 font-serif text-[clamp(2.8rem,5.2vw,5.25rem)] leading-[0.98] font-medium tracking-[-0.035em]"
                    >
                        {{ service.title }}
                    </h1>
                    <p
                        class="mt-7 max-w-3xl text-base leading-7 text-white/78 sm:text-lg sm:leading-8"
                    >
                        {{ service.valueProposition }}
                    </p>
                </div>
                <span
                    class="inline-flex size-20 items-center justify-center rounded-full border border-brand-gold/55 bg-white/8 text-brand-gold lg:size-24"
                    aria-hidden="true"
                >
                    <component
                        :is="serviceSummary?.icon"
                        class="size-9 lg:size-11"
                        :stroke-width="1.4"
                    />
                </span>
            </div>
        </div>
    </section>

    <section class="bg-brand-warm-white py-16 sm:py-20 lg:py-24">
        <div
            class="public-container grid gap-12 lg:grid-cols-[0.84fr_1.16fr] lg:gap-20"
        >
            <div>
                <p class="public-eyebrow">Problems Addressed</p>
                <h2
                    class="mt-4 font-serif text-[clamp(2.35rem,4vw,3.8rem)] leading-[1.04] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    When this service can help.
                </h2>
                <ul class="mt-8 space-y-4">
                    <li
                        v-for="problem in service.problems"
                        :key="problem"
                        class="flex gap-4 border-b border-brand-border pb-4 text-sm leading-6 text-brand-muted"
                    >
                        <Check
                            class="mt-0.5 size-5 shrink-0 text-brand-burgundy"
                            :stroke-width="1.8"
                            aria-hidden="true"
                        />
                        {{ problem }}
                    </li>
                </ul>
            </div>

            <div class="border border-brand-border bg-white p-7 sm:p-9">
                <p class="public-eyebrow">Service Components</p>
                <h2
                    class="mt-4 font-serif text-3xl font-medium text-brand-charcoal sm:text-4xl"
                >
                    A carefully scoped range of support.
                </h2>
                <ul class="mt-8 grid gap-x-8 gap-y-4 sm:grid-cols-2">
                    <li
                        v-for="component in service.components"
                        :key="component"
                        class="flex gap-3 border-t border-brand-border pt-4 text-sm leading-6 font-semibold text-brand-charcoal"
                    >
                        <span
                            class="mt-2 size-1.5 shrink-0 rounded-full bg-brand-gold"
                            aria-hidden="true"
                        />
                        {{ component }}
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section
        class="border-y border-brand-border bg-[var(--brand-warm-grey)] py-16 sm:py-20 lg:py-24"
    >
        <div class="public-container grid gap-5 lg:grid-cols-2">
            <article class="bg-brand-forest-dark p-7 text-white sm:p-9">
                <p
                    class="text-xs font-bold tracking-[0.18em] text-[var(--brand-gold-light)] uppercase"
                >
                    Who It Is For
                </p>
                <h2 class="mt-4 font-serif text-3xl font-medium sm:text-4xl">
                    Organisations with a defined need and objective.
                </h2>
                <ul
                    class="mt-8 divide-y divide-white/15 border-y border-white/15"
                >
                    <li
                        v-for="audience in service.audiences"
                        :key="audience"
                        class="flex gap-3 py-4 text-sm leading-6 text-white/78"
                    >
                        <Check
                            class="mt-0.5 size-4 shrink-0 text-brand-gold"
                            aria-hidden="true"
                        />
                        {{ audience }}
                    </li>
                </ul>
            </article>

            <article class="border border-brand-border bg-white p-7 sm:p-9">
                <p class="public-eyebrow">Relevant Sector Contexts</p>
                <h2
                    class="mt-4 font-serif text-3xl font-medium text-brand-charcoal sm:text-4xl"
                >
                    Experience shaped across varied operating environments.
                </h2>
                <ul class="mt-8 grid gap-3 sm:grid-cols-2">
                    <li
                        v-for="sector in service.sectors"
                        :key="sector"
                        class="border-l-2 border-brand-gold bg-brand-warm-white px-4 py-4 text-sm leading-6 font-semibold text-brand-charcoal"
                    >
                        {{ sector }}
                    </li>
                </ul>
            </article>
        </div>
    </section>

    <section
        aria-labelledby="service-approach-heading"
        class="bg-white py-16 sm:py-20 lg:py-24"
    >
        <div class="public-container">
            <div class="max-w-3xl">
                <p class="public-eyebrow">Engagement Approach</p>
                <h2
                    id="service-approach-heading"
                    class="mt-4 font-serif text-[clamp(2.35rem,4vw,3.8rem)] leading-[1.04] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    A clear path from need to practical next steps.
                </h2>
            </div>

            <ol class="mt-10 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                <li
                    v-for="(step, index) in engagementApproach"
                    :key="step.title"
                    class="border-t-4 border-brand-forest bg-brand-warm-white p-6"
                >
                    <span
                        class="text-xs font-bold tracking-[0.12em] text-[var(--brand-gold-text)]"
                    >
                        STEP {{ String(index + 1).padStart(2, '0') }}
                    </span>
                    <h3
                        class="mt-4 font-serif text-2xl font-medium text-brand-charcoal"
                    >
                        {{ step.title }}
                    </h3>
                    <p class="mt-3 text-sm leading-6 text-brand-muted">
                        {{ step.description }}
                    </p>
                </li>
            </ol>
        </div>
    </section>

    <section
        class="border-t border-brand-border bg-brand-warm-white py-16 sm:py-20"
    >
        <div class="public-container">
            <div class="flex flex-wrap items-end justify-between gap-5">
                <div>
                    <p class="public-eyebrow">Related Services</p>
                    <h2
                        class="mt-4 font-serif text-3xl font-medium text-brand-charcoal sm:text-4xl"
                    >
                        Explore connected capabilities.
                    </h2>
                </div>
                <Link
                    href="/services"
                    class="inline-flex min-h-11 items-center gap-2 text-sm font-bold text-brand-burgundy"
                >
                    View all services
                    <ArrowRight class="size-4" aria-hidden="true" />
                </Link>
            </div>

            <ul class="mt-9 grid gap-4 lg:grid-cols-3">
                <li v-for="item in relatedServices" :key="item.id">
                    <Link
                        :href="item.href"
                        class="group flex min-h-32 items-center justify-between gap-5 border border-brand-border bg-white p-6 font-serif text-xl font-medium text-brand-charcoal transition-colors hover:border-brand-gold hover:text-brand-forest"
                    >
                        {{ item.title }}
                        <ArrowRight
                            class="size-5 shrink-0 text-brand-burgundy transition-transform group-hover:translate-x-1"
                            aria-hidden="true"
                        />
                    </Link>
                </li>
            </ul>
        </div>
    </section>

    <HomeFinalCta />
</template>
