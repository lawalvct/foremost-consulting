<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import {
    ArrowRight,
    BookOpenCheck,
    BriefcaseBusiness,
    Building2,
    Calculator,
    FileCheck2,
    GraduationCap,
    MonitorCog,
    SearchCheck,
    ShieldCheck,
} from '@lucide/vue';
import HomeFinalCta from '@/components/public/home/HomeFinalCta.vue';
import { publishedInsights } from '@/content/homepage';

const insightCategories = [
    {
        title: 'Audit & Assurance',
        description: 'Reporting confidence, controls and assurance processes.',
        icon: ShieldCheck,
    },
    {
        title: 'Accounting',
        description: 'Records, reconciliations and financial management.',
        icon: Calculator,
    },
    {
        title: 'Tax & Compliance',
        description: 'Responsible awareness of tax and compliance processes.',
        icon: FileCheck2,
    },
    {
        title: 'Business Advisory',
        description: 'Planning, performance and informed business decisions.',
        icon: BriefcaseBusiness,
    },
    {
        title: 'Corporate Affairs',
        description: 'Incorporation and orderly corporate-record practices.',
        icon: Building2,
    },
    {
        title: 'Accounting Technology',
        description: 'Systems, workflows, reporting and user adoption.',
        icon: MonitorCog,
    },
    {
        title: 'Training',
        description: 'Professional learning and organisational capability.',
        icon: GraduationCap,
    },
] as const;

const editorialPrinciples = [
    {
        title: 'Useful and understandable',
        description:
            'Explain professional topics clearly for business owners, managers and finance teams.',
        icon: BookOpenCheck,
    },
    {
        title: 'Reviewed before publication',
        description:
            'Check time-sensitive, legal, tax and regulatory content before it becomes public.',
        icon: SearchCheck,
    },
    {
        title: 'Responsible in scope',
        description:
            'Distinguish general information from advice requiring organisation-specific professional review.',
        icon: ShieldCheck,
    },
] as const;
</script>

<template>
    <Head title="Insights & Knowledge Centre">
        <meta
            head-key="description"
            name="description"
            content="Professional insights from Foremost Consulting Associates on audit, accounting, tax, business advisory, corporate affairs, accounting technology and training."
        />
    </Head>

    <section class="relative overflow-hidden bg-brand-forest-dark text-white">
        <div
            class="pointer-events-none absolute -top-56 -left-40 size-[38rem] rounded-full border border-white/12"
            aria-hidden="true"
        >
            <span
                class="absolute inset-20 rounded-full border border-brand-gold/20"
            />
            <span
                class="absolute inset-40 rounded-full border border-white/12"
            />
        </div>
        <div
            class="pointer-events-none absolute right-[8%] bottom-0 h-px w-48 bg-brand-gold"
            aria-hidden="true"
        />

        <div
            class="public-container relative grid gap-10 py-16 sm:py-20 lg:grid-cols-[1fr_0.64fr] lg:items-end lg:gap-20 lg:py-24"
        >
            <div class="max-w-5xl">
                <p
                    class="text-xs font-bold tracking-[0.18em] text-[var(--brand-gold-light)] uppercase"
                >
                    Insights & Knowledge Centre
                </p>
                <h1
                    class="mt-5 font-serif text-[clamp(2.8rem,5.4vw,5.5rem)] leading-[0.98] font-medium tracking-[-0.035em]"
                >
                    Useful guidance, published with care.
                </h1>
            </div>
            <div class="border-l border-brand-gold/55 pl-6 sm:pl-8">
                <p
                    class="text-base leading-7 text-white/76 sm:text-lg sm:leading-8"
                >
                    Practical perspectives on reporting, controls, compliance,
                    business systems and professional development for stronger
                    organisational decisions.
                </p>
            </div>
        </div>
    </section>

    <section
        aria-labelledby="knowledge-areas-heading"
        class="bg-brand-warm-white py-16 sm:py-20 lg:py-24"
    >
        <div class="public-container">
            <div class="max-w-3xl">
                <p class="public-eyebrow">Knowledge Areas</p>
                <h2
                    id="knowledge-areas-heading"
                    class="mt-4 font-serif text-[clamp(2.4rem,4vw,4rem)] leading-[1.03] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    Professional topics relevant to organisations and teams.
                </h2>
            </div>

            <ul class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <li
                    v-for="(category, index) in insightCategories"
                    :key="category.title"
                    class="flex min-h-56 flex-col border border-brand-border bg-white p-6 lg:last:col-span-2 xl:last:col-span-1"
                >
                    <div class="flex items-center justify-between gap-4">
                        <span
                            class="inline-flex size-11 items-center justify-center rounded-full bg-brand-forest text-white"
                            aria-hidden="true"
                        >
                            <component
                                :is="category.icon"
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
                        class="mt-7 font-serif text-2xl font-medium text-brand-charcoal"
                    >
                        {{ category.title }}
                    </h3>
                    <p class="mt-3 text-sm leading-6 text-brand-muted">
                        {{ category.description }}
                    </p>
                </li>
            </ul>
        </div>
    </section>

    <section
        aria-labelledby="published-insights-heading"
        class="border-y border-brand-border bg-[var(--brand-warm-grey)] py-16 sm:py-20 lg:py-24"
    >
        <div class="public-container">
            <div class="max-w-3xl">
                <p class="public-eyebrow">Published Insights</p>
                <h2
                    id="published-insights-heading"
                    class="mt-4 font-serif text-[clamp(2.4rem,4vw,4rem)] leading-[1.03] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    Carefully reviewed perspectives from Foremost.
                </h2>
            </div>

            <div
                v-if="publishedInsights.length"
                class="mt-10 grid gap-5 lg:grid-cols-3"
            >
                <article
                    v-for="insight in publishedInsights"
                    :key="insight.href"
                    class="overflow-hidden border border-brand-border bg-white"
                >
                    <Link :href="insight.href" class="group block h-full">
                        <img
                            :src="insight.image.src"
                            :alt="insight.image.alt"
                            :width="insight.image.width"
                            :height="insight.image.height"
                            loading="lazy"
                            class="aspect-[1.58/1] w-full border-b border-brand-border object-cover"
                        />
                        <div class="p-6">
                            <p
                                class="text-xs font-bold tracking-[0.1em] text-brand-burgundy uppercase"
                            >
                                {{ insight.category }}
                            </p>
                            <h3
                                class="mt-4 font-serif text-2xl leading-tight font-medium text-brand-charcoal"
                            >
                                {{ insight.title }}
                            </h3>
                            <span
                                class="mt-6 inline-flex items-center gap-2 text-sm font-bold text-brand-forest"
                            >
                                Read Article
                                <ArrowRight
                                    class="size-4 transition-transform group-hover:translate-x-1"
                                    aria-hidden="true"
                                />
                            </span>
                        </div>
                    </Link>
                </article>
            </div>

            <div
                v-else
                class="mt-10 grid overflow-hidden border border-brand-border bg-white lg:grid-cols-[0.72fr_1.28fr]"
            >
                <div
                    class="flex min-h-64 items-center justify-center bg-brand-forest p-8 text-white"
                    aria-hidden="true"
                >
                    <div
                        class="flex size-28 items-center justify-center rounded-full border border-brand-gold/45"
                    >
                        <BookOpenCheck
                            class="size-11 text-[var(--brand-gold-light)]"
                            :stroke-width="1.4"
                        />
                    </div>
                </div>
                <div class="flex min-h-64 flex-col justify-center p-8 sm:p-10">
                    <p class="public-eyebrow">Publication in Preparation</p>
                    <h3
                        class="mt-3 font-serif text-3xl leading-tight font-medium text-brand-charcoal sm:text-4xl"
                    >
                        The first reviewed insights are being prepared.
                    </h3>
                    <p
                        class="mt-4 max-w-2xl text-base leading-7 text-brand-muted"
                    >
                        Articles will appear here after their professional,
                        regulatory and editorial review is complete.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section
        aria-labelledby="editorial-standard-heading"
        class="bg-white py-16 sm:py-20 lg:py-24"
    >
        <div class="public-container">
            <div class="max-w-3xl">
                <p class="public-eyebrow">Editorial Standard</p>
                <h2
                    id="editorial-standard-heading"
                    class="mt-4 font-serif text-[clamp(2.4rem,4vw,4rem)] leading-[1.03] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    Clear information with responsible boundaries.
                </h2>
            </div>

            <ul class="mt-10 grid gap-4 lg:grid-cols-3">
                <li
                    v-for="principle in editorialPrinciples"
                    :key="principle.title"
                    class="border-t-4 border-brand-forest bg-brand-warm-white p-7"
                >
                    <component
                        :is="principle.icon"
                        class="size-7 text-brand-burgundy"
                        :stroke-width="1.6"
                        aria-hidden="true"
                    />
                    <h3
                        class="mt-6 font-serif text-2xl font-medium text-brand-charcoal"
                    >
                        {{ principle.title }}
                    </h3>
                    <p class="mt-3 text-sm leading-6 text-brand-muted">
                        {{ principle.description }}
                    </p>
                </li>
            </ul>
        </div>
    </section>

    <HomeFinalCta />
</template>
