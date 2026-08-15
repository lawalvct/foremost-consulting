<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import {
    ArrowDown,
    CalendarDays,
    CheckCircle2,
    ClipboardCheck,
    FileUp,
    LoaderCircle,
    MessageSquareText,
    Send,
    ShieldCheck,
} from '@lucide/vue';
import { onMounted, ref } from 'vue';
import InputError from '@/components/InputError.vue';

type SelectOption = {
    value: string;
    label: string;
};

defineProps<{
    serviceOptions: SelectOption[];
    industryOptions: SelectOption[];
}>();

const submitted = ref(false);
const selectedFileName = ref('');
const attachmentInput = ref<HTMLInputElement | null>(null);

const form = useForm({
    full_name: '',
    organisation: '',
    job_title: '',
    email: '',
    phone: '',
    location: '',
    service_key: '',
    industry: '',
    description: '',
    preferred_contact_method: 'email',
    preferred_at: '',
    attachment: null as File | null,
    consent: false,
    website: '',
    started_at: '',
});

const startFormTimer = (): void => {
    form.started_at = String(Math.floor(Date.now() / 1000));
};

onMounted(startFormTimer);

const handleAttachment = (event: Event): void => {
    const input = event.target as HTMLInputElement;
    const file = input.files?.[0] ?? null;

    form.attachment = file;
    selectedFileName.value = file?.name ?? '';
};

const submit = (): void => {
    submitted.value = false;
    form.post('/request-consultation', {
        forceFormData: true,
        preserveScroll: true,
        onSuccess: () => {
            submitted.value = true;
            form.reset();
            selectedFileName.value = '';

            if (attachmentInput.value) {
                attachmentInput.value.value = '';
            }

            startFormTimer();
        },
    });
};

const requestSteps = [
    {
        title: 'Describe the priority',
        description:
            'Select the relevant service and briefly explain what your organisation needs.',
        icon: ClipboardCheck,
    },
    {
        title: 'Add useful context',
        description:
            'Include your industry, location, preferred timing and an optional supporting document.',
        icon: FileUp,
    },
    {
        title: 'Choose how to connect',
        description:
            'Tell the team whether email, telephone or WhatsApp is your preferred contact method.',
        icon: MessageSquareText,
    },
] as const;
</script>

<template>
    <Head title="Request a Consultation">
        <meta
            head-key="description"
            name="description"
            content="Request a professional consultation with Foremost Consulting Associates for audit, accounting, tax, advisory, corporate affairs, accounting technology or training support."
        />
    </Head>

    <section class="relative overflow-hidden bg-brand-forest-dark text-white">
        <div
            class="pointer-events-none absolute -top-52 -right-40 size-[38rem] rounded-full border border-white/12"
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
            class="pointer-events-none absolute bottom-0 left-[8%] h-px w-52 bg-brand-gold"
            aria-hidden="true"
        />

        <div
            class="public-container relative grid gap-10 py-16 sm:py-20 lg:grid-cols-[1fr_0.62fr] lg:items-end lg:gap-20 lg:py-24"
        >
            <div class="max-w-5xl">
                <p
                    class="text-xs font-bold tracking-[0.18em] text-[var(--brand-gold-light)] uppercase"
                >
                    Request a Consultation
                </p>
                <h1
                    class="mt-5 font-serif text-[clamp(2.8rem,5.4vw,5.5rem)] leading-[0.98] font-medium tracking-[-0.035em]"
                >
                    Give the team a clear starting point.
                </h1>
            </div>
            <div>
                <p
                    class="border-l border-brand-gold/55 pl-6 text-base leading-7 text-white/76 sm:pl-8 sm:text-lg sm:leading-8"
                >
                    Share your organisation's priority so Foremost can
                    understand the context before making contact.
                </p>
                <a
                    href="#consultation-form"
                    class="mt-7 inline-flex min-h-12 items-center gap-3 rounded-sm bg-brand-gold px-6 text-sm font-bold text-brand-forest-dark transition-colors hover:bg-[var(--brand-gold-light)]"
                >
                    Begin Your Request
                    <ArrowDown class="size-4" aria-hidden="true" />
                </a>
            </div>
        </div>
    </section>

    <section
        aria-labelledby="request-process-heading"
        class="bg-brand-warm-white py-14 sm:py-16 lg:py-20"
    >
        <div class="public-container">
            <div class="max-w-3xl">
                <p class="public-eyebrow">A Focused Process</p>
                <h2
                    id="request-process-heading"
                    class="mt-4 font-serif text-[clamp(2.25rem,3.6vw,3.6rem)] leading-[1.04] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    Three steps to frame the conversation.
                </h2>
            </div>

            <ol class="mt-10 grid gap-4 lg:grid-cols-3">
                <li
                    v-for="(step, index) in requestSteps"
                    :key="step.title"
                    class="relative border border-brand-border bg-white p-7"
                >
                    <div class="flex items-center justify-between gap-5">
                        <span
                            class="flex size-12 items-center justify-center rounded-full bg-brand-forest text-white"
                        >
                            <component
                                :is="step.icon"
                                class="size-5"
                                aria-hidden="true"
                            />
                        </span>
                        <span
                            class="text-xs font-bold tracking-[0.14em] text-[var(--brand-gold-text)]"
                            aria-hidden="true"
                        >
                            {{ String(index + 1).padStart(2, '0') }}
                        </span>
                    </div>
                    <h3
                        class="mt-6 font-serif text-2xl font-medium text-brand-charcoal"
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
        id="consultation-form"
        aria-labelledby="consultation-form-heading"
        class="scroll-mt-36 border-t border-brand-border bg-[var(--brand-warm-grey)] py-16 sm:py-20 lg:py-24"
    >
        <div
            class="public-container grid gap-10 lg:grid-cols-[0.62fr_1.38fr] lg:gap-16"
        >
            <div class="lg:sticky lg:top-40 lg:self-start">
                <p class="public-eyebrow">Consultation Details</p>
                <h2
                    id="consultation-form-heading"
                    class="mt-4 font-serif text-[clamp(2.4rem,4vw,4rem)] leading-[1.03] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    Tell us about the support you need.
                </h2>
                <p class="mt-6 text-base leading-7 text-brand-muted">
                    Fields marked with an asterisk are required. Please avoid
                    including passwords, banking credentials or confidential
                    access information.
                </p>

                <div class="mt-8 border-l-4 border-brand-burgundy bg-white p-6">
                    <ShieldCheck
                        class="size-6 text-brand-forest"
                        aria-hidden="true"
                    />
                    <p
                        class="mt-4 text-sm leading-6 font-semibold text-brand-charcoal"
                    >
                        Optional files are stored privately. Accepted formats:
                        PDF, DOCX, XLSX, JPG and PNG, up to 5 MB.
                    </p>
                </div>
            </div>

            <form
                class="border border-brand-border bg-white p-6 shadow-[0_20px_55px_rgba(7,56,44,0.08)] sm:p-9"
                novalidate
                enctype="multipart/form-data"
                @submit.prevent="submit"
            >
                <div
                    v-if="submitted"
                    class="mb-8 flex gap-3 border border-brand-forest/25 bg-brand-forest/6 p-4 text-sm leading-6 text-brand-forest"
                    role="status"
                    aria-live="polite"
                >
                    <CheckCircle2
                        class="mt-0.5 size-5 shrink-0"
                        aria-hidden="true"
                    />
                    <p>
                        Thank you. Your consultation request has been received
                        and recorded for follow-up.
                    </p>
                </div>

                <fieldset>
                    <legend
                        class="font-serif text-2xl font-medium text-brand-charcoal"
                    >
                        Your details
                    </legend>
                    <div class="mt-6 grid gap-6 sm:grid-cols-2">
                        <div>
                            <label
                                for="consultation_full_name"
                                class="text-sm font-bold text-brand-charcoal"
                            >
                                Full name <span aria-hidden="true">*</span>
                            </label>
                            <input
                                id="consultation_full_name"
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
                                for="consultation_organisation"
                                class="text-sm font-bold text-brand-charcoal"
                            >
                                Organisation <span aria-hidden="true">*</span>
                            </label>
                            <input
                                id="consultation_organisation"
                                v-model="form.organisation"
                                name="organisation"
                                type="text"
                                autocomplete="organization"
                                required
                                class="mt-2 min-h-12 w-full rounded-sm border border-brand-border bg-white px-4 text-base text-brand-charcoal transition outline-none focus:border-brand-forest focus:ring-2 focus:ring-brand-forest/20"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.organisation"
                            />
                        </div>

                        <div>
                            <label
                                for="consultation_job_title"
                                class="text-sm font-bold text-brand-charcoal"
                            >
                                Role or title
                            </label>
                            <input
                                id="consultation_job_title"
                                v-model="form.job_title"
                                name="job_title"
                                type="text"
                                autocomplete="organization-title"
                                class="mt-2 min-h-12 w-full rounded-sm border border-brand-border bg-white px-4 text-base text-brand-charcoal transition outline-none focus:border-brand-forest focus:ring-2 focus:ring-brand-forest/20"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.job_title"
                            />
                        </div>

                        <div>
                            <label
                                for="consultation_location"
                                class="text-sm font-bold text-brand-charcoal"
                            >
                                Location
                            </label>
                            <input
                                id="consultation_location"
                                v-model="form.location"
                                name="location"
                                type="text"
                                autocomplete="address-level2"
                                placeholder="City and state"
                                class="mt-2 min-h-12 w-full rounded-sm border border-brand-border bg-white px-4 text-base text-brand-charcoal transition outline-none focus:border-brand-forest focus:ring-2 focus:ring-brand-forest/20"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.location"
                            />
                        </div>

                        <div>
                            <label
                                for="consultation_email"
                                class="text-sm font-bold text-brand-charcoal"
                            >
                                Email address
                                <span aria-hidden="true">*</span>
                            </label>
                            <input
                                id="consultation_email"
                                v-model="form.email"
                                name="email"
                                type="email"
                                inputmode="email"
                                autocomplete="email"
                                required
                                class="mt-2 min-h-12 w-full rounded-sm border border-brand-border bg-white px-4 text-base text-brand-charcoal transition outline-none focus:border-brand-forest focus:ring-2 focus:ring-brand-forest/20"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.email"
                            />
                        </div>

                        <div>
                            <label
                                for="consultation_phone"
                                class="text-sm font-bold text-brand-charcoal"
                            >
                                Phone number <span aria-hidden="true">*</span>
                            </label>
                            <input
                                id="consultation_phone"
                                v-model="form.phone"
                                name="phone"
                                type="tel"
                                inputmode="tel"
                                autocomplete="tel"
                                required
                                class="mt-2 min-h-12 w-full rounded-sm border border-brand-border bg-white px-4 text-base text-brand-charcoal transition outline-none focus:border-brand-forest focus:ring-2 focus:ring-brand-forest/20"
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.phone"
                            />
                        </div>
                    </div>
                </fieldset>

                <div class="my-9 h-px bg-brand-border" aria-hidden="true" />

                <fieldset>
                    <legend
                        class="font-serif text-2xl font-medium text-brand-charcoal"
                    >
                        Organisation needs
                    </legend>
                    <div class="mt-6 grid gap-6 sm:grid-cols-2">
                        <div>
                            <label
                                for="service_key"
                                class="text-sm font-bold text-brand-charcoal"
                            >
                                Service required
                                <span aria-hidden="true">*</span>
                            </label>
                            <select
                                id="service_key"
                                v-model="form.service_key"
                                name="service_key"
                                required
                                class="mt-2 min-h-12 w-full rounded-sm border border-brand-border bg-white px-4 text-base text-brand-charcoal transition outline-none focus:border-brand-forest focus:ring-2 focus:ring-brand-forest/20"
                            >
                                <option value="" disabled>
                                    Select a service
                                </option>
                                <option
                                    v-for="option in serviceOptions"
                                    :key="option.value"
                                    :value="option.value"
                                >
                                    {{ option.label }}
                                </option>
                            </select>
                            <InputError
                                class="mt-2"
                                :message="form.errors.service_key"
                            />
                        </div>

                        <div>
                            <label
                                for="consultation_industry"
                                class="text-sm font-bold text-brand-charcoal"
                            >
                                Industry
                            </label>
                            <select
                                id="consultation_industry"
                                v-model="form.industry"
                                name="industry"
                                class="mt-2 min-h-12 w-full rounded-sm border border-brand-border bg-white px-4 text-base text-brand-charcoal transition outline-none focus:border-brand-forest focus:ring-2 focus:ring-brand-forest/20"
                            >
                                <option value="">Select if applicable</option>
                                <option
                                    v-for="option in industryOptions"
                                    :key="option.value"
                                    :value="option.value"
                                >
                                    {{ option.label }}
                                </option>
                            </select>
                            <InputError
                                class="mt-2"
                                :message="form.errors.industry"
                            />
                        </div>
                    </div>

                    <div class="mt-6">
                        <label
                            for="consultation_description"
                            class="text-sm font-bold text-brand-charcoal"
                        >
                            Brief description <span aria-hidden="true">*</span>
                        </label>
                        <textarea
                            id="consultation_description"
                            v-model="form.description"
                            name="description"
                            rows="7"
                            required
                            placeholder="Describe the current situation, priority or outcome you would like to discuss."
                            class="mt-2 w-full resize-y rounded-sm border border-brand-border bg-white px-4 py-3 text-base leading-7 text-brand-charcoal transition outline-none focus:border-brand-forest focus:ring-2 focus:ring-brand-forest/20"
                        />
                        <div
                            class="mt-1 flex items-start justify-between gap-4"
                        >
                            <InputError :message="form.errors.description" />
                            <span
                                class="ml-auto text-xs text-brand-muted"
                                aria-live="polite"
                            >
                                {{ form.description.length }} / 7000
                            </span>
                        </div>
                    </div>
                </fieldset>

                <div class="my-9 h-px bg-brand-border" aria-hidden="true" />

                <fieldset>
                    <legend
                        class="font-serif text-2xl font-medium text-brand-charcoal"
                    >
                        Contact preference
                    </legend>
                    <p class="mt-2 text-sm leading-6 text-brand-muted">
                        Choose how you would prefer the team to contact you.
                    </p>

                    <div class="mt-5 grid gap-3 sm:grid-cols-3">
                        <label
                            v-for="method in [
                                { value: 'email', label: 'Email' },
                                { value: 'phone', label: 'Telephone' },
                                { value: 'whatsapp', label: 'WhatsApp' },
                            ]"
                            :key="method.value"
                            class="flex min-h-12 cursor-pointer items-center gap-3 rounded-sm border border-brand-border px-4 text-sm font-semibold text-brand-charcoal has-checked:border-brand-forest has-checked:bg-brand-forest/6"
                        >
                            <input
                                v-model="form.preferred_contact_method"
                                name="preferred_contact_method"
                                type="radio"
                                :value="method.value"
                                class="size-4 accent-brand-forest"
                            />
                            {{ method.label }}
                        </label>
                    </div>
                    <InputError
                        class="mt-2"
                        :message="form.errors.preferred_contact_method"
                    />

                    <div class="mt-6 grid gap-6 sm:grid-cols-2">
                        <div>
                            <label
                                for="preferred_at"
                                class="text-sm font-bold text-brand-charcoal"
                            >
                                Preferred date and time
                            </label>
                            <div class="relative mt-2">
                                <CalendarDays
                                    class="pointer-events-none absolute top-1/2 left-4 size-4 -translate-y-1/2 text-brand-muted"
                                    aria-hidden="true"
                                />
                                <input
                                    id="preferred_at"
                                    v-model="form.preferred_at"
                                    name="preferred_at"
                                    type="datetime-local"
                                    class="min-h-12 w-full rounded-sm border border-brand-border bg-white pr-4 pl-11 text-base text-brand-charcoal transition outline-none focus:border-brand-forest focus:ring-2 focus:ring-brand-forest/20"
                                />
                            </div>
                            <InputError
                                class="mt-2"
                                :message="form.errors.preferred_at"
                            />
                        </div>

                        <div>
                            <label
                                for="consultation_attachment"
                                class="text-sm font-bold text-brand-charcoal"
                            >
                                Supporting document
                            </label>
                            <input
                                id="consultation_attachment"
                                ref="attachmentInput"
                                name="attachment"
                                type="file"
                                accept=".pdf,.docx,.xlsx,.jpg,.jpeg,.png"
                                class="mt-2 block min-h-12 w-full cursor-pointer rounded-sm border border-brand-border bg-white text-sm text-brand-muted file:mr-4 file:min-h-12 file:border-0 file:bg-brand-forest file:px-4 file:text-sm file:font-bold file:text-white hover:file:bg-brand-forest-dark"
                                @change="handleAttachment"
                            />
                            <p
                                v-if="selectedFileName"
                                class="mt-2 text-xs leading-5 text-brand-muted"
                            >
                                Selected: {{ selectedFileName }}
                            </p>
                            <InputError
                                class="mt-2"
                                :message="form.errors.attachment"
                            />
                        </div>
                    </div>
                </fieldset>

                <div class="sr-only" aria-hidden="true">
                    <label for="consultation_website">Website</label>
                    <input
                        id="consultation_website"
                        v-model="form.website"
                        name="website"
                        type="text"
                        tabindex="-1"
                        autocomplete="off"
                    />
                </div>

                <label class="mt-8 flex cursor-pointer items-start gap-3">
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
                        information and files provided to assess and respond to
                        this request. <span aria-hidden="true">*</span>
                    </span>
                </label>
                <InputError class="mt-2" :message="form.errors.consent" />
                <InputError class="mt-2" :message="form.errors.started_at" />

                <button
                    type="submit"
                    :disabled="form.processing"
                    :aria-busy="form.processing"
                    class="mt-7 inline-flex min-h-12 w-full items-center justify-center gap-3 rounded-sm bg-brand-forest px-7 text-sm font-bold text-white transition-colors hover:bg-brand-forest-dark disabled:cursor-not-allowed disabled:opacity-60 sm:w-auto"
                >
                    <LoaderCircle
                        v-if="form.processing"
                        class="size-5 animate-spin"
                        aria-hidden="true"
                    />
                    <Send v-else class="size-4" aria-hidden="true" />
                    {{
                        form.processing
                            ? 'Submitting Request...'
                            : 'Submit Consultation Request'
                    }}
                </button>

                <div
                    v-if="submitted"
                    class="mt-5 flex max-w-xl gap-3 border border-brand-forest/25 bg-brand-forest/6 p-4 text-sm leading-6 text-brand-forest"
                    role="status"
                    aria-live="polite"
                >
                    <CheckCircle2
                        class="mt-0.5 size-5 shrink-0"
                        aria-hidden="true"
                    />
                    <p>
                        Thank you. Your consultation request has been received
                        and recorded for follow-up.
                    </p>
                </div>
            </form>
        </div>
    </section>
</template>
