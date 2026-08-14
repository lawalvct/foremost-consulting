<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ArrowRight, Mail, MapPin, Phone } from '@lucide/vue';
import { contactDetails } from '@/content/contactDetails';

const currentYear = new Date().getFullYear();

const serviceLinks = [
    { label: 'Audit & Assurance', href: '/services/audit-and-assurance' },
    {
        label: 'Accounting & Financial Management',
        href: '/services/accounting-and-financial-management',
    },
    {
        label: 'Tax & Regulatory Advisory',
        href: '/services/tax-and-regulatory-advisory',
    },
    {
        label: 'Management & Business Advisory',
        href: '/services/management-and-business-advisory',
    },
];

const companyLinks = [
    { label: 'About', href: '/about' },
    { label: 'Industries', href: '/industries' },
    { label: 'Training', href: '/training' },
    // Insights remains unpublished until reviewed content is ready.
    // { label: 'Insights', href: '/insights' },
    { label: 'Contact', href: '/contact' },
];
</script>

<template>
    <footer id="contact" class="bg-brand-forest-dark text-white">
        <div class="public-container py-14 lg:py-16">
            <div class="grid gap-12 lg:grid-cols-[1.25fr_0.8fr_0.7fr_0.9fr]">
                <div class="max-w-md">
                    <Link
                        href="/"
                        class="inline-flex items-center gap-3"
                        aria-label="Foremost Consulting Associates — home"
                    >
                        <img
                            src="/brand/foremost-fca-mark-128.png"
                            alt=""
                            width="128"
                            height="128"
                            loading="lazy"
                            class="size-16 shrink-0"
                        />
                        <span class="leading-tight">
                            <span
                                class="block text-lg font-bold tracking-[0.05em]"
                            >
                                FOREMOST
                            </span>
                            <span
                                class="block text-xs font-semibold tracking-[0.16em] text-white/72"
                            >
                                CONSULTING ASSOCIATES
                            </span>
                        </span>
                    </Link>
                    <p class="mt-5 text-sm leading-7 text-white/72">
                        Integrated audit, accounting, tax, advisory, training
                        and accounting-technology support for stronger
                        organisations.
                    </p>
                    <Link
                        href="/request-consultation"
                        class="mt-6 inline-flex min-h-11 items-center gap-2 rounded-sm border border-brand-gold/70 px-4 text-sm font-bold text-white transition-colors hover:bg-white hover:text-brand-forest-dark"
                    >
                        Request a consultation
                        <ArrowRight class="size-4" aria-hidden="true" />
                    </Link>
                </div>

                <div>
                    <h2
                        class="text-sm font-bold tracking-[0.12em] text-white uppercase"
                    >
                        Services
                    </h2>
                    <ul class="mt-5 space-y-3 text-sm text-white/72">
                        <li v-for="item in serviceLinks" :key="item.label">
                            <a
                                :href="item.href"
                                class="leading-6 hover:text-brand-gold"
                            >
                                {{ item.label }}
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h2
                        class="text-sm font-bold tracking-[0.12em] text-white uppercase"
                    >
                        Company
                    </h2>
                    <ul class="mt-5 space-y-3 text-sm text-white/72">
                        <li v-for="item in companyLinks" :key="item.label">
                            <Link
                                :href="item.href"
                                class="hover:text-brand-gold"
                            >
                                {{ item.label }}
                            </Link>
                        </li>
                    </ul>
                </div>

                <div>
                    <h2
                        class="text-sm font-bold tracking-[0.12em] text-white uppercase"
                    >
                        Contact
                    </h2>
                    <p class="mt-5 flex gap-3 text-sm leading-6 text-white/72">
                        <MapPin
                            class="mt-0.5 size-4 shrink-0 text-brand-gold"
                            aria-hidden="true"
                        />
                        <span>
                            <span
                                v-for="line in contactDetails.addressLines"
                                :key="line"
                                class="block"
                            >
                                {{ line }}
                            </span>
                        </span>
                    </p>
                    <a
                        :href="contactDetails.phones[0].href"
                        class="mt-4 flex min-h-8 items-center gap-3 text-sm text-white/72 hover:text-brand-gold"
                    >
                        <Phone
                            class="size-4 shrink-0 text-brand-gold"
                            aria-hidden="true"
                        />
                        {{ contactDetails.phones[0].display }}
                    </a>
                    <a
                        :href="`mailto:${contactDetails.email}`"
                        class="mt-2 flex min-h-8 items-center gap-3 text-sm break-all text-white/72 hover:text-brand-gold"
                    >
                        <Mail
                            class="size-4 shrink-0 text-brand-gold"
                            aria-hidden="true"
                        />
                        {{ contactDetails.email }}
                    </a>
                </div>
            </div>

            <div
                class="mt-12 flex flex-col gap-4 border-t border-white/12 pt-6 text-xs text-white/58 sm:flex-row sm:items-center sm:justify-between"
            >
                <p>© {{ currentYear }} Foremost Consulting Associates.</p>
                <div class="flex gap-5">
                    <Link href="/privacy" class="hover:text-white"
                        >Privacy</Link
                    >
                    <Link href="/terms" class="hover:text-white">Terms</Link>
                </div>
            </div>
        </div>
    </footer>
</template>
