<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import {
    ArrowRight,
    CalendarClock,
    Check,
    ChevronRight,
    MapPin,
} from '@lucide/vue';
import { computed } from 'vue';
import HomeFinalCta from '@/components/public/home/HomeFinalCta.vue';
import { trainingProgrammes } from '@/content/homepage';
import { trainingDetails, trainingSlugs } from '@/content/trainingDetails';
import type { TrainingSlug } from '@/content/trainingDetails';

const props = defineProps<{
    trainingSlug: TrainingSlug;
}>();

const programme = computed(() => trainingDetails[props.trainingSlug]);
const programmeIndex = computed(() =>
    trainingSlugs.indexOf(props.trainingSlug),
);
const programmeIcon = computed(
    () => trainingProgrammes[programmeIndex.value]?.icon,
);
const relatedProgrammes = computed(() =>
    trainingSlugs
        .filter((slug) => slug !== props.trainingSlug)
        .slice(0, 3)
        .map((slug) => trainingDetails[slug]),
);
const structuredData = computed(() =>
    JSON.stringify({
        '@context': 'https://schema.org',
        '@type': 'Course',
        name: programme.value.title,
        description: programme.value.valueProposition,
        provider: {
            '@type': 'Organization',
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
    <Head :title="programme.title">
        <meta
            head-key="description"
            name="description"
            :content="programme.metaDescription"
        />
        <component
            :is="'script'"
            head-key="training-structured-data"
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
                        <Link href="/training" class="hover:text-white">
                            Training
                        </Link>
                    </li>
                    <li aria-hidden="true">
                        <ChevronRight class="size-3.5" />
                    </li>
                    <li class="text-[var(--brand-gold-light)]">
                        {{ programme.category }}
                    </li>
                </ol>
            </nav>

            <div class="mt-10 grid gap-8 lg:grid-cols-[1fr_auto] lg:items-end">
                <div class="max-w-5xl">
                    <p
                        class="text-xs font-bold tracking-[0.18em] text-[var(--brand-gold-light)] uppercase"
                    >
                        {{ programme.category }}
                    </p>
                    <h1
                        class="mt-5 font-serif text-[clamp(2.8rem,5.2vw,5.25rem)] leading-[0.98] font-medium tracking-[-0.035em]"
                    >
                        {{ programme.title }}
                    </h1>
                    <p
                        class="mt-7 max-w-3xl text-base leading-7 text-white/78 sm:text-lg sm:leading-8"
                    >
                        {{ programme.valueProposition }}
                    </p>
                </div>
                <span
                    class="inline-flex size-20 items-center justify-center rounded-sm border border-brand-gold/55 bg-white/8 text-brand-gold lg:size-24"
                    aria-hidden="true"
                >
                    <component
                        :is="programmeIcon"
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
                <p class="public-eyebrow">Intended Audience</p>
                <h2
                    class="mt-4 font-serif text-[clamp(2.35rem,4vw,3.8rem)] leading-[1.04] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    Who this programme is designed to support.
                </h2>
                <ul class="mt-8 space-y-4">
                    <li
                        v-for="audience in programme.intendedAudience"
                        :key="audience"
                        class="flex gap-4 border-b border-brand-border pb-4 text-sm leading-6 text-brand-muted"
                    >
                        <Check
                            class="mt-0.5 size-5 shrink-0 text-brand-burgundy"
                            :stroke-width="1.8"
                            aria-hidden="true"
                        />
                        {{ audience }}
                    </li>
                </ul>
            </div>

            <div class="border border-brand-border bg-white p-7 sm:p-9">
                <p class="public-eyebrow">Programme Objectives</p>
                <h2
                    class="mt-4 font-serif text-3xl font-medium text-brand-charcoal sm:text-4xl"
                >
                    Learning directed toward practical application.
                </h2>
                <ol class="mt-8 space-y-3">
                    <li
                        v-for="(objective, index) in programme.objectives"
                        :key="objective"
                        class="grid grid-cols-[2rem_minmax(0,1fr)] gap-3 border-t border-brand-border pt-4 text-sm leading-6 font-semibold text-brand-charcoal"
                    >
                        <span
                            class="text-xs font-bold tracking-[0.1em] text-[var(--brand-gold-text)]"
                            aria-hidden="true"
                        >
                            {{ String(index + 1).padStart(2, '0') }}
                        </span>
                        {{ objective }}
                    </li>
                </ol>
            </div>
        </div>
    </section>

    <section
        class="border-y border-brand-border bg-[var(--brand-warm-grey)] py-16 sm:py-20 lg:py-24"
    >
        <div
            class="public-container grid gap-10 lg:grid-cols-[1.15fr_0.85fr] lg:gap-16"
        >
            <div>
                <p class="public-eyebrow">Modules & Topics</p>
                <h2
                    class="mt-4 font-serif text-[clamp(2.35rem,4vw,3.8rem)] leading-[1.04] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    Core learning areas within the programme scope.
                </h2>
                <ul class="mt-9 grid gap-3 sm:grid-cols-2">
                    <li
                        v-for="module in programme.modules"
                        :key="module"
                        class="flex min-h-20 items-center gap-3 border border-brand-border bg-white p-5 text-sm leading-6 font-semibold text-brand-charcoal"
                    >
                        <span
                            class="size-2 shrink-0 rounded-full bg-brand-gold"
                            aria-hidden="true"
                        />
                        {{ module }}
                    </li>
                </ul>
            </div>

            <aside class="bg-brand-forest-dark p-7 text-white sm:p-9">
                <p
                    class="text-xs font-bold tracking-[0.18em] text-[var(--brand-gold-light)] uppercase"
                >
                    Session Arrangement
                </p>
                <h2 class="mt-4 font-serif text-3xl font-medium sm:text-4xl">
                    Details aligned with each approved programme.
                </h2>

                <dl
                    class="mt-8 divide-y divide-white/15 border-y border-white/15"
                >
                    <div
                        class="grid grid-cols-[1.5rem_minmax(0,1fr)] gap-3 py-5"
                    >
                        <MapPin
                            class="mt-0.5 size-5 text-brand-gold"
                            aria-hidden="true"
                        />
                        <div>
                            <dt
                                class="text-xs font-bold tracking-[0.12em] uppercase"
                            >
                                Delivery
                            </dt>
                            <dd class="mt-2 text-sm leading-6 text-white/72">
                                {{ programme.deliveryMode }}
                            </dd>
                        </div>
                    </div>
                    <div
                        class="grid grid-cols-[1.5rem_minmax(0,1fr)] gap-3 py-5"
                    >
                        <CalendarClock
                            class="mt-0.5 size-5 text-brand-gold"
                            aria-hidden="true"
                        />
                        <div>
                            <dt
                                class="text-xs font-bold tracking-[0.12em] uppercase"
                            >
                                Schedule
                            </dt>
                            <dd class="mt-2 text-sm leading-6 text-white/72">
                                Dates, timing and venue details are confirmed
                                for individual approved sessions.
                            </dd>
                        </div>
                    </div>
                </dl>

                <Link
                    href="/request-consultation"
                    class="mt-8 inline-flex min-h-12 w-full items-center justify-center gap-3 rounded-sm bg-brand-gold px-6 text-sm font-bold text-brand-forest-dark transition-colors hover:bg-[var(--brand-gold-light)]"
                >
                    Discuss This Programme
                    <ArrowRight class="size-4" aria-hidden="true" />
                </Link>
            </aside>
        </div>
    </section>

    <section class="bg-white py-16 sm:py-20">
        <div class="public-container">
            <div class="flex flex-wrap items-end justify-between gap-5">
                <div>
                    <p class="public-eyebrow">Related Programmes</p>
                    <h2
                        class="mt-4 font-serif text-3xl font-medium text-brand-charcoal sm:text-4xl"
                    >
                        Explore other learning pathways.
                    </h2>
                </div>
                <Link
                    href="/training"
                    class="inline-flex min-h-11 items-center gap-2 text-sm font-bold text-brand-burgundy"
                >
                    View all programmes
                    <ArrowRight class="size-4" aria-hidden="true" />
                </Link>
            </div>

            <ul class="mt-9 grid gap-4 lg:grid-cols-3">
                <li v-for="item in relatedProgrammes" :key="item.slug">
                    <Link
                        :href="`/training/${item.slug}`"
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
