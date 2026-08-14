<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import {
    ArrowRight,
    Building2,
    CheckCircle2,
    Mail,
    MapPin,
    MessageSquareText,
    Phone,
    Send,
} from '@lucide/vue';
import { onMounted, ref } from 'vue';
import InputError from '@/components/InputError.vue';
import { contactDetails } from '@/content/contactDetails';

const submitted = ref(false);

const form = useForm({
    full_name: '',
    organisation: '',
    email: '',
    phone: '',
    subject: '',
    message: '',
    consent: false,
    website: '',
    started_at: '',
});

const startFormTimer = (): void => {
    form.started_at = String(Math.floor(Date.now() / 1000));
};

onMounted(startFormTimer);

const submit = (): void => {
    submitted.value = false;
    form.post('/contact', {
        preserveScroll: true,
        onSuccess: () => {
            submitted.value = true;
            form.reset();
            startFormTimer();
        },
    });
};
</script>

<template>
    <Head title="Contact Foremost Consulting Associates">
        <meta
            head-key="description"
            name="description"
            content="Contact Foremost Consulting Associates in Abeokuta, Ogun State, for audit, accounting, tax, advisory, corporate affairs, technology and training enquiries."
        />
    </Head>

    <section class="relative overflow-hidden bg-brand-forest-dark text-white">
        <div
            class="pointer-events-none absolute -top-52 -left-44 size-[38rem] rounded-full border border-white/12"
            aria-hidden="true"
        >
            <span
                class="absolute inset-20 rounded-full border border-brand-gold/22"
            />
            <span
                class="absolute inset-40 rounded-full border border-white/12"
            />
        </div>
        <div
            class="pointer-events-none absolute top-0 right-[16%] h-full w-px bg-white/6"
            aria-hidden="true"
        />
        <div
            class="public-container relative grid gap-10 py-16 sm:py-20 lg:grid-cols-[1fr_0.62fr] lg:items-end lg:gap-20 lg:py-24"
        >
            <div class="max-w-5xl">
                <p
                    class="text-xs font-bold tracking-[0.18em] text-[var(--brand-gold-light)] uppercase"
                >
                    Contact Foremost
                </p>
                <h1
                    class="mt-5 font-serif text-[clamp(2.8rem,5.4vw,5.5rem)] leading-[0.98] font-medium tracking-[-0.035em]"
                >
                    Start a focused professional conversation.
                </h1>
            </div>
            <p
                class="border-l border-brand-gold/55 pl-6 text-base leading-7 text-white/76 sm:pl-8 sm:text-lg sm:leading-8"
            >
                Tell us what your organisation needs, or contact the Abeokuta
                office directly using the confirmed details below.
            </p>
        </div>
    </section>

    <section
        aria-labelledby="contact-details-heading"
        class="bg-brand-warm-white py-16 sm:py-20 lg:py-24"
    >
        <div class="public-container">
            <div class="max-w-3xl">
                <p class="public-eyebrow">Direct Contact</p>
                <h2
                    id="contact-details-heading"
                    class="mt-4 font-serif text-[clamp(2.4rem,4vw,4rem)] leading-[1.03] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    Reach the team in the way that works for you.
                </h2>
            </div>

            <div class="mt-10 grid gap-5 lg:grid-cols-3">
                <article class="border border-brand-border bg-white p-7">
                    <span
                        class="flex size-12 items-center justify-center rounded-full bg-brand-forest text-white"
                    >
                        <MapPin class="size-5" aria-hidden="true" />
                    </span>
                    <h3
                        class="mt-6 font-serif text-2xl font-medium text-brand-charcoal"
                    >
                        Visit the office
                    </h3>
                    <address
                        class="mt-4 text-sm leading-7 text-brand-muted not-italic"
                    >
                        <span
                            v-for="line in contactDetails.addressLines"
                            :key="line"
                            class="block"
                        >
                            {{ line }}
                        </span>
                    </address>
                    <a
                        :href="contactDetails.mapsUrl"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="mt-6 inline-flex min-h-11 items-center gap-2 text-sm font-bold text-brand-forest hover:text-brand-burgundy"
                    >
                        Search this address on Google Maps
                        <ArrowRight class="size-4" aria-hidden="true" />
                    </a>
                </article>

                <article class="border border-brand-border bg-white p-7">
                    <span
                        class="flex size-12 items-center justify-center rounded-full bg-brand-forest text-white"
                    >
                        <Phone class="size-5" aria-hidden="true" />
                    </span>
                    <h3
                        class="mt-6 font-serif text-2xl font-medium text-brand-charcoal"
                    >
                        Call Foremost
                    </h3>
                    <ul class="mt-4 grid grid-cols-2 gap-x-5 gap-y-1">
                        <li
                            v-for="phone in contactDetails.phones"
                            :key="phone.href"
                        >
                            <a
                                :href="phone.href"
                                class="inline-flex min-h-10 items-center text-sm font-semibold text-brand-muted hover:text-brand-burgundy"
                            >
                                {{ phone.display }}
                            </a>
                        </li>
                    </ul>
                </article>

                <article class="border border-brand-border bg-white p-7">
                    <span
                        class="flex size-12 items-center justify-center rounded-full bg-brand-forest text-white"
                    >
                        <Mail class="size-5" aria-hidden="true" />
                    </span>
                    <h3
                        class="mt-6 font-serif text-2xl font-medium text-brand-charcoal"
                    >
                        Send an email
                    </h3>
                    <p class="mt-4 text-sm leading-7 text-brand-muted">
                        Use email for a written enquiry or supporting context.
                    </p>
                    <a
                        :href="`mailto:${contactDetails.email}`"
                        class="mt-5 inline-flex min-h-11 items-center text-sm font-bold break-all text-brand-forest hover:text-brand-burgundy"
                    >
                        {{ contactDetails.email }}
                    </a>
                </article>
            </div>
        </div>
    </section>

    <section
        id="send-message"
        aria-labelledby="contact-form-heading"
        class="scroll-mt-36 border-t border-brand-border bg-[var(--brand-warm-grey)] py-16 sm:py-20 lg:py-24"
    >
        <div
            class="public-container grid gap-10 lg:grid-cols-[0.72fr_1.28fr] lg:gap-16"
        >
            <div class="lg:sticky lg:top-40 lg:self-start">
                <p class="public-eyebrow">Send a Message</p>
                <h2
                    id="contact-form-heading"
                    class="mt-4 font-serif text-[clamp(2.4rem,4vw,4rem)] leading-[1.03] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    Share the purpose of your enquiry.
                </h2>
                <p class="mt-6 text-base leading-7 text-brand-muted">
                    Provide enough context for the team to understand your
                    request. A representative can then respond using the details
                    you provide.
                </p>

                <div class="mt-8 border-l-4 border-brand-burgundy bg-white p-6">
                    <Building2
                        class="size-6 text-brand-forest"
                        aria-hidden="true"
                    />
                    <p
                        class="mt-4 text-sm leading-6 font-semibold text-brand-charcoal"
                    >
                        For a detailed service discussion, the consultation
                        request workflow will collect additional information in
                        the next phase.
                    </p>
                </div>
            </div>

            <form
                class="border border-brand-border bg-white p-6 shadow-[0_20px_55px_rgba(7,56,44,0.08)] sm:p-9"
                novalidate
                @submit.prevent="submit"
            >
                <div
                    v-if="submitted"
                    class="mb-7 flex gap-3 border border-brand-forest/25 bg-brand-forest/6 p-4 text-sm leading-6 text-brand-forest"
                    role="status"
                    aria-live="polite"
                >
                    <CheckCircle2
                        class="mt-0.5 size-5 shrink-0"
                        aria-hidden="true"
                    />
                    <p>
                        Thank you. Your message has been received and recorded
                        for follow-up.
                    </p>
                </div>

                <div class="grid gap-6 sm:grid-cols-2">
                    <div>
                        <label
                            for="full_name"
                            class="text-sm font-bold text-brand-charcoal"
                        >
                            Full name <span aria-hidden="true">*</span>
                        </label>
                        <input
                            id="full_name"
                            v-model="form.full_name"
                            name="full_name"
                            type="text"
                            autocomplete="name"
                            required
                            class="mt-2 min-h-12 w-full rounded-sm border border-brand-border bg-white px-4 text-base text-brand-charcoal transition outline-none focus:border-brand-forest focus:ring-2 focus:ring-brand-forest/20"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.full_name"
                        />
                    </div>

                    <div>
                        <label
                            for="organisation"
                            class="text-sm font-bold text-brand-charcoal"
                        >
                            Organisation
                        </label>
                        <input
                            id="organisation"
                            v-model="form.organisation"
                            name="organisation"
                            type="text"
                            autocomplete="organization"
                            class="mt-2 min-h-12 w-full rounded-sm border border-brand-border bg-white px-4 text-base text-brand-charcoal transition outline-none focus:border-brand-forest focus:ring-2 focus:ring-brand-forest/20"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.organisation"
                        />
                    </div>

                    <div>
                        <label
                            for="email"
                            class="text-sm font-bold text-brand-charcoal"
                        >
                            Email address <span aria-hidden="true">*</span>
                        </label>
                        <input
                            id="email"
                            v-model="form.email"
                            name="email"
                            type="email"
                            inputmode="email"
                            autocomplete="email"
                            required
                            class="mt-2 min-h-12 w-full rounded-sm border border-brand-border bg-white px-4 text-base text-brand-charcoal transition outline-none focus:border-brand-forest focus:ring-2 focus:ring-brand-forest/20"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div>
                        <label
                            for="phone"
                            class="text-sm font-bold text-brand-charcoal"
                        >
                            Phone number
                        </label>
                        <input
                            id="phone"
                            v-model="form.phone"
                            name="phone"
                            type="tel"
                            inputmode="tel"
                            autocomplete="tel"
                            class="mt-2 min-h-12 w-full rounded-sm border border-brand-border bg-white px-4 text-base text-brand-charcoal transition outline-none focus:border-brand-forest focus:ring-2 focus:ring-brand-forest/20"
                        />
                        <InputError class="mt-2" :message="form.errors.phone" />
                    </div>
                </div>

                <div class="mt-6">
                    <label
                        for="subject"
                        class="text-sm font-bold text-brand-charcoal"
                    >
                        Subject <span aria-hidden="true">*</span>
                    </label>
                    <input
                        id="subject"
                        v-model="form.subject"
                        name="subject"
                        type="text"
                        required
                        class="mt-2 min-h-12 w-full rounded-sm border border-brand-border bg-white px-4 text-base text-brand-charcoal transition outline-none focus:border-brand-forest focus:ring-2 focus:ring-brand-forest/20"
                    />
                    <InputError class="mt-2" :message="form.errors.subject" />
                </div>

                <div class="mt-6">
                    <label
                        for="message"
                        class="text-sm font-bold text-brand-charcoal"
                    >
                        Message <span aria-hidden="true">*</span>
                    </label>
                    <textarea
                        id="message"
                        v-model="form.message"
                        name="message"
                        rows="7"
                        required
                        class="mt-2 w-full resize-y rounded-sm border border-brand-border bg-white px-4 py-3 text-base leading-7 text-brand-charcoal transition outline-none focus:border-brand-forest focus:ring-2 focus:ring-brand-forest/20"
                    />
                    <div class="mt-1 flex items-start justify-between gap-4">
                        <InputError :message="form.errors.message" />
                        <span
                            class="ml-auto text-xs text-brand-muted"
                            aria-live="polite"
                        >
                            {{ form.message.length }} / 5000
                        </span>
                    </div>
                </div>

                <div class="sr-only" aria-hidden="true">
                    <label for="website">Website</label>
                    <input
                        id="website"
                        v-model="form.website"
                        name="website"
                        type="text"
                        tabindex="-1"
                        autocomplete="off"
                    />
                </div>

                <label class="mt-6 flex cursor-pointer items-start gap-3">
                    <input
                        v-model="form.consent"
                        name="consent"
                        type="checkbox"
                        value="1"
                        required
                        class="mt-1 size-4 shrink-0 accent-brand-forest"
                    />
                    <span class="text-sm leading-6 text-brand-muted">
                        I agree that Foremost Consulting Associates may use the
                        information provided to respond to this enquiry.
                        <span aria-hidden="true">*</span>
                    </span>
                </label>
                <InputError class="mt-2" :message="form.errors.consent" />
                <InputError class="mt-2" :message="form.errors.started_at" />

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="mt-7 inline-flex min-h-12 w-full items-center justify-center gap-3 rounded-sm bg-brand-forest px-7 text-sm font-bold text-white transition-colors hover:bg-brand-forest-dark disabled:cursor-not-allowed disabled:opacity-60 sm:w-auto"
                >
                    <Send class="size-4" aria-hidden="true" />
                    {{
                        form.processing ? 'Sending Message...' : 'Send Message'
                    }}
                </button>

                <p class="mt-5 flex gap-2 text-xs leading-5 text-brand-muted">
                    <MessageSquareText
                        class="mt-0.5 size-4 shrink-0 text-brand-burgundy"
                        aria-hidden="true"
                    />
                    Please do not include passwords, banking credentials or
                    other sensitive access information.
                </p>
            </form>
        </div>
    </section>
</template>
