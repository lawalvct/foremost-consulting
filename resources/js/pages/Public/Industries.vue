<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { ArrowRight, CheckCircle2 } from '@lucide/vue';
import HomeFinalCta from '@/components/public/home/HomeFinalCta.vue';
import { sectorExperienceItems } from '@/content/homepage';
import { industryDetails, industrySlugs } from '@/content/industryDetails';

const industries = industrySlugs.map((slug, index) => ({
    ...industryDetails[slug],
    icon: sectorExperienceItems[index]?.icon,
}));

const sectorPrinciples = [
    {
        title: 'Understand the operating context',
        description:
            'Begin with the organisation, its responsibilities, information flows and decision needs.',
    },
    {
        title: 'Connect the right capabilities',
        description:
            'Bring together relevant financial, control, regulatory, systems and people-development support.',
    },
    {
        title: 'Keep recommendations practical',
        description:
            'Translate findings into clear actions that reflect the organisation and its available resources.',
    },
] as const;
</script>

<template>
    <Head title="Industries">
        <meta
            head-key="description"
            name="description"
            content="Explore the sectors supported by Foremost Consulting Associates, including financial services, public sector, education, healthcare, manufacturing, hospitality, oil and gas, and growing businesses."
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
            class="public-container relative grid gap-10 py-16 sm:py-20 lg:grid-cols-[1fr_0.62fr] lg:items-end lg:gap-20 lg:py-24"
        >
            <div class="max-w-5xl">
                <p
                    class="text-xs font-bold tracking-[0.18em] text-[var(--brand-gold-light)] uppercase"
                >
                    Industry Experience
                </p>
                <h1
                    class="mt-5 font-serif text-[clamp(2.8rem,5.4vw,5.5rem)] leading-[0.98] font-medium tracking-[-0.035em]"
                >
                    Professional insight grounded in operating context.
                </h1>
            </div>
            <div class="border-l border-brand-gold/55 pl-6 sm:pl-8">
                <p
                    class="text-base leading-7 text-white/76 sm:text-lg sm:leading-8"
                >
                    Financial and business challenges look different across
                    sectors. Our approach begins with those differences, then
                    connects the capabilities most relevant to the organisation.
                </p>
            </div>
        </div>
    </section>

    <section
        aria-labelledby="industries-heading"
        class="bg-brand-warm-white py-16 sm:py-20 lg:py-24"
    >
        <div class="public-container">
            <div class="max-w-3xl">
                <p class="public-eyebrow">Sectors We Support</p>
                <h2
                    id="industries-heading"
                    class="mt-4 font-serif text-[clamp(2.4rem,4vw,4rem)] leading-[1.03] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    Experience across varied organisational environments.
                </h2>
                <p class="mt-5 text-base leading-7 text-brand-muted sm:text-lg">
                    Explore common sector challenges, relevant Foremost
                    capabilities and the practical outcomes an engagement may
                    support.
                </p>
            </div>

            <ul class="mt-11 grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                <li
                    v-for="(industry, index) in industries"
                    :key="industry.slug"
                >
                    <Link
                        :href="`/industries/${industry.slug}`"
                        class="group flex h-full min-h-80 flex-col overflow-hidden border border-brand-border bg-white transition-[border-color,transform,box-shadow] hover:-translate-y-1 hover:border-brand-gold hover:shadow-[0_18px_42px_rgba(7,56,44,0.1)] focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-brand-burgundy"
                    >
                        <div
                            class="flex items-center justify-between border-b border-brand-border bg-[var(--brand-warm-grey)] px-6 py-5"
                        >
                            <component
                                :is="industry.icon"
                                class="size-7 text-brand-forest"
                                :stroke-width="1.6"
                                aria-hidden="true"
                            />
                            <span
                                class="text-xs font-bold tracking-[0.12em] text-[var(--brand-gold-text)]"
                                aria-hidden="true"
                            >
                                {{ String(index + 1).padStart(2, '0') }}
                            </span>
                        </div>
                        <div class="flex flex-1 flex-col p-6">
                            <h3
                                class="font-serif text-2xl leading-tight font-medium text-brand-charcoal"
                            >
                                {{ industry.title }}
                            </h3>
                            <p class="mt-4 text-sm leading-6 text-brand-muted">
                                {{ industry.valueProposition }}
                            </p>
                            <span
                                class="mt-auto flex items-center gap-2 pt-6 text-sm font-bold text-brand-burgundy"
                            >
                                Explore industry
                                <ArrowRight
                                    class="size-4 transition-transform group-hover:translate-x-1"
                                    aria-hidden="true"
                                />
                            </span>
                        </div>
                    </Link>
                </li>
            </ul>
        </div>
    </section>

    <section
        aria-labelledby="sector-approach-heading"
        class="border-y border-brand-border bg-[var(--brand-warm-grey)] py-16 sm:py-20 lg:py-24"
    >
        <div
            class="public-container grid gap-11 lg:grid-cols-[0.78fr_1.22fr] lg:gap-20"
        >
            <div class="max-w-xl">
                <p class="public-eyebrow">Our Sector Approach</p>
                <h2
                    id="sector-approach-heading"
                    class="mt-4 font-serif text-[clamp(2.4rem,4vw,4rem)] leading-[1.03] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    The sector informs the engagement.
                </h2>
                <p class="mt-5 text-base leading-7 text-brand-muted">
                    We avoid one-size-fits-all recommendations. Each assignment
                    is scoped around the organisation's circumstances and the
                    agreed objective.
                </p>
            </div>

            <ol class="space-y-4">
                <li
                    v-for="(principle, index) in sectorPrinciples"
                    :key="principle.title"
                    class="grid gap-4 border border-brand-border bg-white p-6 sm:grid-cols-[3rem_minmax(0,1fr)] sm:p-7"
                >
                    <span
                        class="inline-flex size-10 items-center justify-center rounded-full bg-brand-forest text-white"
                        aria-hidden="true"
                    >
                        <CheckCircle2 class="size-5" />
                    </span>
                    <div>
                        <p
                            class="text-xs font-bold tracking-[0.12em] text-[var(--brand-gold-text)]"
                        >
                            {{ String(index + 1).padStart(2, '0') }}
                        </p>
                        <h3
                            class="mt-2 font-serif text-2xl font-medium text-brand-charcoal"
                        >
                            {{ principle.title }}
                        </h3>
                        <p class="mt-2 text-sm leading-6 text-brand-muted">
                            {{ principle.description }}
                        </p>
                    </div>
                </li>
            </ol>
        </div>
    </section>

    <HomeFinalCta />
</template>
