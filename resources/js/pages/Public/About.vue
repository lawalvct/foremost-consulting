<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ArrowDown, Check, MapPin } from '@lucide/vue';
import HomeFinalCta from '@/components/public/home/HomeFinalCta.vue';
import { coreServices, sectorExperienceItems } from '@/content/homepage';

const values = [
    {
        title: 'Probity',
        description:
            'Careful professional judgement and accountability in every engagement.',
    },
    {
        title: 'Integrity',
        description:
            'Clear, principled work grounded in professional responsibility.',
    },
    {
        title: 'Honesty',
        description:
            'Straightforward communication and respect for the confidence of clients.',
    },
] as const;
</script>

<template>
    <Head title="About Foremost Consulting Associates">
        <meta
            head-key="description"
            name="description"
            content="Learn about Foremost Consulting Associates, an established professional-services firm based in Abeokuta, Ogun State."
        />
    </Head>

    <section class="relative overflow-hidden bg-brand-forest-dark text-white">
        <div
            class="pointer-events-none absolute -top-64 -left-48 size-[40rem] rounded-full border border-white/10"
            aria-hidden="true"
        >
            <span
                class="absolute inset-24 rounded-full border border-brand-gold/15"
            />
            <span
                class="absolute inset-48 rounded-full border border-white/10"
            />
        </div>

        <div
            class="public-container relative grid items-center gap-12 py-16 lg:grid-cols-[1.02fr_0.98fr] lg:gap-20 lg:py-24"
        >
            <div class="max-w-4xl">
                <p
                    class="text-xs leading-5 font-bold tracking-[0.18em] text-[var(--brand-gold-light)] uppercase"
                >
                    About Foremost
                </p>
                <h1
                    class="mt-5 font-serif text-[clamp(2.8rem,5.4vw,5.5rem)] leading-[0.98] font-medium tracking-[-0.035em]"
                >
                    Professional judgement shaped by experience and purpose.
                </h1>
                <p
                    class="mt-7 max-w-2xl text-base leading-7 text-white/76 sm:text-lg sm:leading-8"
                >
                    Formally registered in February 2006, Foremost Consulting
                    Associates brings audit, accounting, tax, advisory,
                    corporate affairs, investigation, accounting technology and
                    training capabilities together for stronger organisations.
                </p>

                <div class="mt-8 flex flex-wrap items-center gap-5">
                    <a
                        href="#firm-overview"
                        class="inline-flex min-h-12 items-center justify-center gap-3 rounded-sm bg-brand-gold px-6 text-sm font-bold text-brand-forest-dark transition-colors hover:bg-[var(--brand-gold-light)]"
                    >
                        Discover Our Firm
                        <ArrowDown class="size-4" aria-hidden="true" />
                    </a>
                    <span
                        class="inline-flex min-h-12 items-center gap-2 text-sm font-semibold text-white/78"
                    >
                        <MapPin
                            class="size-4 text-brand-gold"
                            aria-hidden="true"
                        />
                        Abeokuta, Ogun State
                    </span>
                </div>
            </div>

            <figure class="relative mx-auto w-full max-w-[46rem] pb-8">
                <div
                    class="absolute -top-3 right-4 bottom-11 -left-3 border border-brand-gold/70"
                    aria-hidden="true"
                />
                <picture>
                    <source
                        media="(max-width: 1023px)"
                        srcset="/brand/foremost-hero-professionals-v1-960.jpg"
                    />
                    <img
                        src="/brand/foremost-hero-professionals-v1.jpg"
                        alt="Business professionals reviewing financial reports together"
                        width="1727"
                        height="911"
                        fetchpriority="high"
                        class="relative aspect-[1.55/1] w-full object-cover shadow-[0_24px_60px_rgba(0,0,0,0.24)]"
                    />
                </picture>
                <div
                    class="absolute right-4 bottom-0 flex min-h-20 items-center gap-4 border border-brand-border bg-white px-5 py-3 text-brand-charcoal shadow-[0_16px_38px_rgba(0,0,0,0.2)] sm:right-8"
                >
                    <img
                        src="/brand/foremost-fca-mark-128.png"
                        alt=""
                        width="128"
                        height="128"
                        class="size-14"
                    />
                    <span class="h-11 w-px bg-brand-gold" aria-hidden="true" />
                    <span class="font-serif text-lg">Established 2006</span>
                </div>
                <figcaption class="sr-only">
                    Representative professional imagery; the people shown are
                    not identified as Foremost staff.
                </figcaption>
            </figure>
        </div>
    </section>

    <section
        id="firm-overview"
        aria-labelledby="firm-overview-heading"
        class="scroll-mt-36 bg-brand-warm-white py-16 sm:py-20 lg:py-24"
    >
        <div
            class="public-container grid items-start gap-12 lg:grid-cols-[1fr_0.9fr] lg:gap-20"
        >
            <div class="max-w-3xl">
                <p class="public-eyebrow">Firm Overview</p>
                <h2
                    id="firm-overview-heading"
                    class="mt-4 font-serif text-[clamp(2.4rem,4.2vw,4.25rem)] leading-[1.03] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    An integrated professional-services firm.
                </h2>
                <div
                    class="mt-7 space-y-5 text-base leading-8 text-brand-muted sm:text-lg"
                >
                    <p>
                        Foremost Consulting Associates grew from the decision of
                        three audit practices to work under one umbrella. The
                        idea took shape in 2005, and the firm was formally
                        registered in February 2006.
                    </p>
                    <p>
                        Based in Abeokuta, Ogun State, the firm supports
                        businesses, institutions and government-related
                        organisations through connected financial, regulatory,
                        business, systems and capacity-development services.
                    </p>
                    <p>
                        Its historic structure brought Consultancy & Training,
                        Audit & Tax, and Corporate Affairs & Investment together
                        as three complementary professional divisions.
                    </p>
                    <p>
                        That integrated foundation continues to shape a
                        practical approach to reporting, controls, compliance,
                        technology and people development.
                    </p>
                </div>
            </div>

            <div class="border border-brand-border bg-white">
                <div class="border-b border-brand-border p-7 sm:p-8">
                    <p
                        class="text-xs font-bold tracking-[0.16em] text-[var(--brand-gold-text)] uppercase"
                    >
                        The Idea
                    </p>
                    <p
                        class="mt-4 font-serif text-6xl font-medium tracking-[-0.04em] text-brand-forest"
                    >
                        2005
                    </p>
                    <p class="mt-3 text-sm leading-6 text-brand-muted">
                        Three audit practices began the process of coming
                        together under one professional umbrella.
                    </p>
                </div>
                <div class="border-b border-brand-border p-7 sm:p-8">
                    <p
                        class="text-xs font-bold tracking-[0.16em] text-brand-burgundy uppercase"
                    >
                        Formal Registration
                    </p>
                    <p
                        class="mt-4 font-serif text-5xl font-medium text-brand-forest"
                    >
                        2006
                    </p>
                    <p class="mt-3 text-sm leading-6 text-brand-muted">
                        Foremost Consulting Associates was formally registered
                        in February.
                    </p>
                </div>
                <div class="p-7 sm:p-8">
                    <p class="public-eyebrow">Integrated Foundation</p>
                    <p
                        class="mt-3 text-lg leading-7 font-bold text-brand-charcoal"
                    >
                        Three historic divisions, one professional firm.
                    </p>
                    <p class="mt-3 text-sm leading-6 text-brand-muted">
                        Consultancy & Training, Audit & Tax, and Corporate
                        Affairs & Investment established the firm's broad
                        professional-services foundation.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section
        aria-labelledby="values-heading"
        class="border-y border-brand-border bg-[var(--brand-warm-grey)] py-16 sm:py-20 lg:py-24"
    >
        <div class="public-container">
            <div class="max-w-3xl">
                <p class="public-eyebrow">Our Values</p>
                <h2
                    id="values-heading"
                    class="mt-4 font-serif text-[clamp(2.4rem,4vw,4rem)] leading-[1.03] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    Principles that guide professional service.
                </h2>
            </div>

            <ul class="mt-10 grid gap-4 lg:grid-cols-3">
                <li
                    v-for="(value, index) in values"
                    :key="value.title"
                    class="border border-brand-border bg-white p-7 sm:p-8"
                >
                    <div class="flex items-center justify-between gap-5">
                        <span
                            class="inline-flex size-11 items-center justify-center rounded-full bg-brand-forest text-white"
                            aria-hidden="true"
                        >
                            <Check class="size-5" />
                        </span>
                        <span
                            class="text-xs font-bold tracking-[0.12em] text-[var(--brand-gold-text)]"
                            aria-hidden="true"
                        >
                            {{ String(index + 1).padStart(2, '0') }}
                        </span>
                    </div>
                    <h3
                        class="mt-7 font-serif text-3xl font-medium text-brand-charcoal"
                    >
                        {{ value.title }}
                    </h3>
                    <p class="mt-3 text-sm leading-6 text-brand-muted">
                        {{ value.description }}
                    </p>
                </li>
            </ul>

            <div class="mt-10 grid gap-4 lg:grid-cols-2">
                <article class="border-l-4 border-brand-burgundy bg-white p-7">
                    <p class="public-eyebrow">Our Mission</p>
                    <h3
                        class="mt-3 font-serif text-2xl font-medium text-brand-charcoal"
                    >
                        Ethical professional service that supports growth.
                    </h3>
                    <p class="mt-3 text-sm leading-6 text-brand-muted">
                        To provide professional services grounded in
                        professional ethics, contributing to the growth and
                        development of our clients and the wider national
                        economy.
                    </p>
                </article>
                <article class="border-l-4 border-brand-gold bg-white p-7">
                    <p class="public-eyebrow">Our Vision</p>
                    <h3
                        class="mt-3 font-serif text-2xl font-medium text-brand-charcoal"
                    >
                        A highly efficient consultancy practice in Nigeria.
                    </h3>
                    <p class="mt-3 text-sm leading-6 text-brand-muted">
                        To build a leading, efficient professional consultancy
                        practice with the capability to serve organisations
                        across Nigeria.
                    </p>
                </article>
            </div>
        </div>
    </section>

    <section
        id="capabilities"
        aria-labelledby="capabilities-heading"
        class="scroll-mt-36 bg-white py-16 sm:py-20 lg:py-24"
    >
        <div
            class="public-container grid gap-14 lg:grid-cols-[1.05fr_0.95fr] lg:gap-20"
        >
            <div>
                <p class="public-eyebrow">Divisions & Capabilities</p>
                <h2
                    id="capabilities-heading"
                    class="mt-4 max-w-3xl font-serif text-[clamp(2.4rem,4vw,4rem)] leading-[1.03] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    Connected expertise around organisational needs.
                </h2>

                <ul
                    class="mt-9 grid border-t border-brand-border sm:grid-cols-2"
                >
                    <li
                        v-for="(service, index) in coreServices"
                        :key="service.title"
                        class="grid grid-cols-[2rem_minmax(0,1fr)] gap-3 border-b border-brand-border py-5 sm:pr-5 sm:odd:border-r sm:even:pl-5"
                    >
                        <span
                            class="text-xs font-bold tracking-[0.1em] text-[var(--brand-gold-text)]"
                            aria-hidden="true"
                        >
                            {{ String(index + 1).padStart(2, '0') }}
                        </span>
                        <span
                            class="text-sm leading-6 font-semibold text-brand-charcoal"
                        >
                            {{ service.title }}
                        </span>
                    </li>
                </ul>
            </div>

            <div class="bg-brand-forest-dark p-7 text-white sm:p-9">
                <p
                    class="text-xs font-bold tracking-[0.18em] text-[var(--brand-gold-light)] uppercase"
                >
                    Sector Reach
                </p>
                <h3 class="mt-4 font-serif text-4xl leading-tight font-medium">
                    Experience across varied operating contexts.
                </h3>
                <ul
                    class="mt-8 divide-y divide-white/15 border-y border-white/15"
                >
                    <li
                        v-for="sector in sectorExperienceItems"
                        :key="sector.title"
                        class="flex items-center gap-4 py-4 text-sm font-semibold text-white/82"
                    >
                        <component
                            :is="sector.icon"
                            class="size-4 shrink-0 text-brand-gold"
                            :stroke-width="1.7"
                            aria-hidden="true"
                        />
                        {{ sector.title }}
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section
        aria-labelledby="leadership-heading"
        class="border-t border-brand-border bg-brand-warm-white py-16 sm:py-20"
    >
        <div
            class="public-container grid items-center gap-8 lg:grid-cols-[0.8fr_1.2fr] lg:gap-16"
        >
            <div>
                <p class="public-eyebrow">Leadership</p>
                <h2
                    id="leadership-heading"
                    class="mt-4 font-serif text-[clamp(2.35rem,3.8vw,3.75rem)] leading-[1.04] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    Professional leadership, presented with clarity.
                </h2>
            </div>
            <div class="border border-brand-border bg-white p-7 sm:p-9">
                <p class="public-eyebrow">[TO CONFIRM]</p>
                <p class="mt-4 text-base leading-7 text-brand-muted sm:text-lg">
                    Leadership cards will be added after management approves
                    current names, roles, professional designations,
                    specialisations, biographies and portraits.
                </p>
            </div>
        </div>
    </section>

    <HomeFinalCta />
</template>
