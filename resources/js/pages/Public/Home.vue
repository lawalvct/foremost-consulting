<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import {
    ArrowRight,
    BriefcaseBusiness,
    Building2,
    Calculator,
    FileCheck2,
    GraduationCap,
    MonitorCog,
    SearchCheck,
    ShieldCheck,
} from '@lucide/vue';
import type { Component } from 'vue';

type ServiceItem = {
    id: string;
    title: string;
    description: string;
    href: string;
    icon: Component;
};

const services: ServiceItem[] = [
    {
        id: 'service-audit-assurance',
        title: 'Audit & Assurance',
        description:
            'Independent reviews that strengthen confidence, controls and reporting.',
        href: '/services/audit-and-assurance',
        icon: ShieldCheck,
    },
    {
        id: 'service-accounting-financial-management',
        title: 'Accounting & Financial Management',
        description:
            'Practical support for books, management accounts and financial statements.',
        href: '/services/accounting-and-financial-management',
        icon: Calculator,
    },
    {
        id: 'service-tax-regulatory-advisory',
        title: 'Tax & Regulatory Advisory',
        description:
            'Clear compliance, planning and support for regulatory obligations.',
        href: '/services/tax-and-regulatory-advisory',
        icon: FileCheck2,
    },
    {
        id: 'service-management-business-advisory',
        title: 'Management & Business Advisory',
        description:
            'Business planning, budgeting, appraisal and strategic advisory.',
        href: '/services/management-and-business-advisory',
        icon: BriefcaseBusiness,
    },
    {
        id: 'service-corporate-affairs',
        title: 'Corporate Affairs Services',
        description:
            'Incorporation and carefully managed post-incorporation filings.',
        href: '/services/corporate-affairs-services',
        icon: Building2,
    },
    {
        id: 'service-investigation-special-engagements',
        title: 'Investigation & Special Engagements',
        description:
            'Confidential due diligence, verification and special-purpose reviews.',
        href: '/services/investigation-and-special-engagements',
        icon: SearchCheck,
    },
    {
        id: 'service-accounting-technology-systems',
        title: 'Accounting Technology & Systems',
        description:
            'Process assessment, implementation, migration and user support.',
        href: '/services/accounting-technology-and-systems',
        icon: MonitorCog,
    },
    {
        id: 'service-training-capacity-development',
        title: 'Training & Capacity Development',
        description:
            'Practical programmes for professionals and organisational teams.',
        href: '/services/training-and-capacity-development',
        icon: GraduationCap,
    },
];

const trustItems = [
    'Established 2006',
    'Chartered Professionals',
    'Multi-sector Experience',
];
</script>

<template>
    <Head title="Professional Audit, Accounting, Tax & Advisory">
        <meta
            head-key="description"
            name="description"
            content="Foremost Consulting Associates provides audit, accounting, tax, advisory, training and accounting-technology services from Abeokuta, Ogun State."
        />
        <meta head-key="theme-color" name="theme-color" content="#0b4d3b" />
    </Head>

    <section
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
                        v-for="(item, index) in trustItems"
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

    <section id="services" class="scroll-mt-36 bg-[#f3f4f1] py-16 lg:py-20">
        <div class="public-container">
            <div class="max-w-3xl">
                <p class="public-eyebrow">Our Core Services</p>
                <h2
                    class="mt-3 font-serif text-4xl leading-tight font-medium tracking-[-0.025em] text-brand-charcoal sm:text-5xl"
                >
                    Our Core Services
                </h2>
                <p class="mt-3 text-base leading-7 text-brand-muted sm:text-lg">
                    Integrated audit, accounting, tax, training and advisory
                    capabilities.
                </p>
            </div>

            <div class="mt-9 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                <Link
                    v-for="service in services"
                    :id="service.id"
                    :key="service.title"
                    :href="service.href"
                    class="group flex min-h-52 scroll-mt-40 flex-col rounded-sm border border-brand-border bg-white p-6 shadow-[0_4px_18px_rgba(7,56,44,0.04)] transition-[transform,box-shadow,border-color] hover:-translate-y-1 hover:border-brand-gold hover:shadow-[0_16px_35px_rgba(7,56,44,0.09)]"
                >
                    <div class="flex items-start justify-between gap-4">
                        <span
                            class="inline-flex size-12 items-center justify-center rounded-sm bg-[#edf4f0] text-brand-forest"
                        >
                            <component
                                :is="service.icon"
                                class="size-6"
                                aria-hidden="true"
                            />
                        </span>
                        <ArrowRight
                            class="mt-1 size-5 text-brand-burgundy transition-transform group-hover:translate-x-1"
                            aria-hidden="true"
                        />
                    </div>
                    <h3
                        class="mt-5 text-lg leading-snug font-bold text-brand-charcoal"
                    >
                        {{ service.title }}
                    </h3>
                    <p class="mt-3 text-sm leading-6 text-brand-muted">
                        {{ service.description }}
                    </p>
                </Link>
            </div>
        </div>
    </section>
</template>
