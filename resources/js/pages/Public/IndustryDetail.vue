<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { ArrowRight, BookOpenCheck, Check, ChevronRight } from '@lucide/vue';
import { computed } from 'vue';
import HomeFinalCta from '@/components/public/home/HomeFinalCta.vue';
import { coreServices, sectorExperienceItems } from '@/content/homepage';
import { industryDetails, industrySlugs } from '@/content/industryDetails';
import type { IndustrySlug } from '@/content/industryDetails';

const props = defineProps<{
    industrySlug: IndustrySlug;
}>();

const industry = computed(() => industryDetails[props.industrySlug]);
const industryIndex = computed(() => industrySlugs.indexOf(props.industrySlug));
const industryIcon = computed(
    () => sectorExperienceItems[industryIndex.value]?.icon,
);
const relevantServices = computed(() =>
    coreServices.filter((service) =>
        industry.value.relevantServices.some((slug) =>
            service.href.endsWith(slug),
        ),
    ),
);
const relatedIndustries = computed(() =>
    industrySlugs
        .filter((slug) => slug !== props.industrySlug)
        .slice(0, 3)
        .map((slug) => industryDetails[slug]),
);
const structuredData = computed(() =>
    JSON.stringify({
        '@context': 'https://schema.org',
        '@type': 'WebPage',
        name: `${industry.value.title} Industry Support`,
        description: industry.value.valueProposition,
        about: industry.value.title,
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
    }),
);
</script>

<template>
    <Head :title="industry.title">
        <meta
            head-key="description"
            name="description"
            :content="industry.metaDescription"
        />
        <component
            :is="'script'"
            head-key="industry-structured-data"
            type="application/ld+json"
        >
            {{ structuredData }}
        </component>
    </Head>

    <section class="relative overflow-hidden bg-brand-forest-dark text-white">
        <div
            class="pointer-events-none absolute -top-48 -right-24 size-[34rem] rounded-full border border-white/12"
            aria-hidden="true"
        >
            <span
                class="absolute inset-20 rounded-full border border-brand-gold/20"
            />
            <span
                class="absolute inset-40 rounded-full border border-white/12"
            />
        </div>

        <div class="public-container relative py-14 sm:py-20 lg:py-24">
            <nav aria-label="Breadcrumb">
                <ol
                    class="flex flex-wrap items-center gap-2 text-xs font-semibold text-white/66"
                >
                    <li><Link href="/" class="hover:text-white">Home</Link></li>
                    <li aria-hidden="true">
                        <ChevronRight class="size-3.5" />
                    </li>
                    <li>
                        <Link href="/industries" class="hover:text-white">
                            Industries
                        </Link>
                    </li>
                    <li aria-hidden="true">
                        <ChevronRight class="size-3.5" />
                    </li>
                    <li class="text-[var(--brand-gold-light)]">
                        {{ industry.shortTitle }}
                    </li>
                </ol>
            </nav>

            <div class="mt-10 grid gap-8 lg:grid-cols-[1fr_auto] lg:items-end">
                <div class="max-w-5xl">
                    <p
                        class="text-xs font-bold tracking-[0.18em] text-[var(--brand-gold-light)] uppercase"
                    >
                        Industry Focus
                    </p>
                    <h1
                        class="mt-5 font-serif text-[clamp(2.8rem,5.2vw,5.25rem)] leading-[0.98] font-medium tracking-[-0.035em]"
                    >
                        {{ industry.title }}
                    </h1>
                    <p
                        class="mt-7 max-w-3xl text-base leading-7 text-white/78 sm:text-lg sm:leading-8"
                    >
                        {{ industry.valueProposition }}
                    </p>
                </div>
                <span
                    class="inline-flex size-20 items-center justify-center rounded-full border border-brand-gold/55 bg-white/8 text-brand-gold lg:size-24"
                    aria-hidden="true"
                >
                    <component
                        :is="industryIcon"
                        class="size-9 lg:size-11"
                        :stroke-width="1.4"
                    />
                </span>
            </div>
        </div>
    </section>

    <section class="bg-brand-warm-white py-16 sm:py-20 lg:py-24">
        <div
            class="public-container grid gap-12 lg:grid-cols-[0.82fr_1.18fr] lg:gap-20"
        >
            <div>
                <p class="public-eyebrow">Typical Challenges</p>
                <h2
                    class="mt-4 font-serif text-[clamp(2.35rem,4vw,3.8rem)] leading-[1.04] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    Financial and control priorities in this sector.
                </h2>
                <ul class="mt-8 space-y-4">
                    <li
                        v-for="challenge in industry.challenges"
                        :key="challenge"
                        class="flex gap-4 border-b border-brand-border pb-4 text-sm leading-6 text-brand-muted"
                    >
                        <Check
                            class="mt-0.5 size-5 shrink-0 text-brand-burgundy"
                            :stroke-width="1.8"
                            aria-hidden="true"
                        />
                        {{ challenge }}
                    </li>
                </ul>
            </div>

            <div class="border border-brand-border bg-white p-7 sm:p-9">
                <p class="public-eyebrow">Relevant Foremost Services</p>
                <h2
                    class="mt-4 font-serif text-3xl font-medium text-brand-charcoal sm:text-4xl"
                >
                    Connected capabilities around sector needs.
                </h2>
                <ul class="mt-8 grid gap-3 sm:grid-cols-2">
                    <li v-for="service in relevantServices" :key="service.id">
                        <Link
                            :href="service.href"
                            class="group flex h-full min-h-36 flex-col border border-brand-border bg-brand-warm-white p-5 transition-colors hover:border-brand-gold"
                        >
                            <component
                                :is="service.icon"
                                class="size-5 text-brand-forest"
                                :stroke-width="1.7"
                                aria-hidden="true"
                            />
                            <span
                                class="mt-4 text-sm leading-6 font-bold text-brand-charcoal"
                            >
                                {{ service.title }}
                            </span>
                            <span
                                class="mt-auto flex items-center gap-2 pt-4 text-xs font-bold text-brand-burgundy"
                            >
                                View service
                                <ArrowRight
                                    class="size-3.5 transition-transform group-hover:translate-x-1"
                                    aria-hidden="true"
                                />
                            </span>
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="bg-brand-forest text-white">
        <div
            class="public-container grid gap-10 py-16 lg:grid-cols-[0.68fr_1.32fr] lg:items-start lg:gap-20 lg:py-20"
        >
            <div>
                <p
                    class="text-xs font-bold tracking-[0.18em] text-[var(--brand-gold-light)] uppercase"
                >
                    Potential Outcomes
                </p>
                <h2
                    class="mt-4 font-serif text-[clamp(2.35rem,4vw,3.75rem)] leading-[1.04] font-medium tracking-[-0.03em]"
                >
                    Practical improvements an engagement may support.
                </h2>
            </div>

            <ul class="grid gap-px overflow-hidden bg-white/15 sm:grid-cols-2">
                <li
                    v-for="(outcome, index) in industry.outcomes"
                    :key="outcome"
                    class="bg-brand-forest-dark p-6 sm:p-7"
                >
                    <span
                        class="text-xs font-bold tracking-[0.12em] text-brand-gold"
                        aria-hidden="true"
                    >
                        {{ String(index + 1).padStart(2, '0') }}
                    </span>
                    <p
                        class="mt-4 text-sm leading-6 font-semibold text-white/82"
                    >
                        {{ outcome }}
                    </p>
                </li>
            </ul>
        </div>
    </section>

    <section
        aria-labelledby="insight-themes-heading"
        class="border-b border-brand-border bg-[var(--brand-warm-grey)] py-16 sm:py-20 lg:py-24"
    >
        <div class="public-container">
            <div class="max-w-3xl">
                <p class="public-eyebrow">Related Insight Themes</p>
                <h2
                    id="insight-themes-heading"
                    class="mt-4 font-serif text-[clamp(2.35rem,4vw,3.8rem)] leading-[1.04] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    Knowledge areas relevant to {{ industry.shortTitle }}.
                </h2>
                <p class="mt-5 text-base leading-7 text-brand-muted">
                    These themes will guide related professional insights as
                    approved articles are published.
                </p>
            </div>

            <ul class="mt-9 grid gap-4 md:grid-cols-3">
                <li
                    v-for="theme in industry.insightThemes"
                    :key="theme"
                    class="flex min-h-36 flex-col border border-brand-border bg-white p-6"
                >
                    <BookOpenCheck
                        class="size-6 text-brand-forest"
                        :stroke-width="1.6"
                        aria-hidden="true"
                    />
                    <p
                        class="mt-auto pt-6 font-serif text-xl font-medium text-brand-charcoal"
                    >
                        {{ theme }}
                    </p>
                </li>
            </ul>
        </div>
    </section>

    <section class="bg-white py-16 sm:py-20">
        <div class="public-container">
            <div class="flex flex-wrap items-end justify-between gap-5">
                <div>
                    <p class="public-eyebrow">Related Industries</p>
                    <h2
                        class="mt-4 font-serif text-3xl font-medium text-brand-charcoal sm:text-4xl"
                    >
                        Explore other operating contexts.
                    </h2>
                </div>
                <Link
                    href="/industries"
                    class="inline-flex min-h-11 items-center gap-2 text-sm font-bold text-brand-burgundy"
                >
                    View all industries
                    <ArrowRight class="size-4" aria-hidden="true" />
                </Link>
            </div>

            <ul class="mt-9 grid gap-4 lg:grid-cols-3">
                <li v-for="item in relatedIndustries" :key="item.slug">
                    <Link
                        :href="`/industries/${item.slug}`"
                        class="group flex min-h-32 items-center justify-between gap-5 border border-brand-border bg-brand-warm-white p-6 font-serif text-xl font-medium text-brand-charcoal transition-colors hover:border-brand-gold hover:text-brand-forest"
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
