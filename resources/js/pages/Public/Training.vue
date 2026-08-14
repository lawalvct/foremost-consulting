<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { ArrowRight, CheckCircle2 } from '@lucide/vue';
import HomeFinalCta from '@/components/public/home/HomeFinalCta.vue';
import { trainingProgrammes } from '@/content/homepage';
import { trainingDetails, trainingSlugs } from '@/content/trainingDetails';

const programmes = trainingSlugs.map((slug, index) => ({
    ...trainingDetails[slug],
    icon: trainingProgrammes[index]?.icon,
}));

const programmeApproach = [
    {
        title: 'Clarify the need',
        description:
            'Understand the intended audience, existing knowledge and practical outcome required.',
    },
    {
        title: 'Shape the learning',
        description:
            'Align programme content, examples and delivery with the approved training objective.',
    },
    {
        title: 'Support application',
        description:
            'Connect learning with workplace practice, clear actions and agreed follow-through.',
    },
] as const;
</script>

<template>
    <Head title="Training & Capacity Development">
        <meta
            head-key="description"
            name="description"
            content="Explore practical professional, corporate, tax, accounting software and custom capacity-building programmes from Foremost Consulting Associates."
        />
    </Head>

    <section class="relative overflow-hidden bg-brand-forest-dark text-white">
        <div
            class="pointer-events-none absolute -top-48 -right-28 size-[36rem] rounded-full border border-white/12"
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
            class="pointer-events-none absolute bottom-0 left-0 h-1 w-40 bg-brand-burgundy sm:w-56"
            aria-hidden="true"
        />
        <div
            class="pointer-events-none absolute bottom-0 left-40 h-1 w-24 bg-brand-gold sm:left-56 sm:w-32"
            aria-hidden="true"
        />

        <div
            class="public-container relative grid gap-10 py-16 sm:py-20 lg:grid-cols-[1fr_0.64fr] lg:items-end lg:gap-20 lg:py-24"
        >
            <div class="max-w-5xl">
                <p
                    class="text-xs font-bold tracking-[0.18em] text-[var(--brand-gold-light)] uppercase"
                >
                    Training & Capacity Development
                </p>
                <h1
                    class="mt-5 font-serif text-[clamp(2.8rem,5.4vw,5.5rem)] leading-[0.98] font-medium tracking-[-0.035em]"
                >
                    Practical capability that lasts beyond the classroom.
                </h1>
            </div>
            <div class="border-l border-brand-gold/55 pl-6 sm:pl-8">
                <p
                    class="text-base leading-7 text-white/76 sm:text-lg sm:leading-8"
                >
                    Professional and organisational learning designed around
                    confident application, responsible practice and clearly
                    defined development needs.
                </p>
            </div>
        </div>
    </section>

    <section
        aria-labelledby="programmes-heading"
        class="bg-brand-warm-white py-16 sm:py-20 lg:py-24"
    >
        <div class="public-container">
            <div class="max-w-3xl">
                <p class="public-eyebrow">Training Programmes</p>
                <h2
                    id="programmes-heading"
                    class="mt-4 font-serif text-[clamp(2.4rem,4vw,4rem)] leading-[1.03] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    Learning for professionals and organisational teams.
                </h2>
                <p class="mt-5 text-base leading-7 text-brand-muted sm:text-lg">
                    Explore intended audiences, programme objectives, learning
                    topics and available delivery approaches.
                </p>
            </div>

            <ul class="mt-11 grid gap-4 md:grid-cols-2 xl:grid-cols-5">
                <li
                    v-for="(programme, index) in programmes"
                    :key="programme.slug"
                    class="md:last:col-span-2 xl:last:col-span-1"
                >
                    <Link
                        :href="`/training/${programme.slug}`"
                        class="group flex h-full min-h-80 flex-col border border-brand-border bg-white p-6 transition-[border-color,transform,box-shadow] hover:-translate-y-1 hover:border-brand-gold hover:shadow-[0_18px_42px_rgba(7,56,44,0.1)] focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-brand-burgundy"
                    >
                        <div class="flex items-start justify-between gap-4">
                            <span
                                class="inline-flex size-12 items-center justify-center rounded-sm bg-brand-forest text-white"
                                aria-hidden="true"
                            >
                                <component
                                    :is="programme.icon"
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
                        <p
                            class="mt-7 text-xs font-bold tracking-[0.12em] text-brand-burgundy uppercase"
                        >
                            {{ programme.category }}
                        </p>
                        <h3
                            class="mt-3 font-serif text-2xl leading-tight font-medium text-brand-charcoal"
                        >
                            {{ programme.title }}
                        </h3>
                        <p class="mt-4 text-sm leading-6 text-brand-muted">
                            {{ programme.valueProposition }}
                        </p>
                        <span
                            class="mt-auto flex items-center gap-2 pt-6 text-sm font-bold text-brand-burgundy"
                        >
                            View programme
                            <ArrowRight
                                class="size-4 transition-transform group-hover:translate-x-1"
                                aria-hidden="true"
                            />
                        </span>
                    </Link>
                </li>
            </ul>
        </div>
    </section>

    <section
        aria-labelledby="training-in-practice-heading"
        class="border-t border-brand-border bg-white py-16 sm:py-20 lg:py-24"
    >
        <div
            class="public-container grid items-stretch gap-8 lg:grid-cols-[1.12fr_0.88fr] lg:gap-0"
        >
            <figure class="relative pb-4 pl-4 sm:pb-6 sm:pl-6 lg:py-8">
                <div
                    class="absolute top-4 right-4 bottom-0 left-0 border border-brand-gold/75 sm:top-6 sm:right-6 lg:right-0 lg:bottom-4"
                    aria-hidden="true"
                />
                <img
                    src="/brand/foremost-training-session.png"
                    alt="Participants in a professional training workshop with a facilitator presenting"
                    width="1536"
                    height="1024"
                    loading="lazy"
                    class="relative aspect-[3/2] h-full min-h-72 w-full object-cover shadow-[0_22px_55px_rgba(7,56,44,0.16)]"
                />
                <figcaption class="sr-only">
                    A professional workshop session with participants learning
                    from a standing facilitator.
                </figcaption>
            </figure>

            <div
                class="relative overflow-hidden bg-brand-forest-dark px-7 py-12 text-white sm:px-10 lg:flex lg:flex-col lg:justify-center lg:px-12"
            >
                <div
                    class="pointer-events-none absolute -right-32 -bottom-40 size-80 rounded-full border border-white/10"
                    aria-hidden="true"
                >
                    <span
                        class="absolute inset-16 rounded-full border border-brand-gold/18"
                    />
                </div>
                <div class="relative max-w-xl">
                    <p
                        class="text-xs font-bold tracking-[0.18em] text-[var(--brand-gold-light)] uppercase"
                    >
                        Training in Practice
                    </p>
                    <h2
                        id="training-in-practice-heading"
                        class="mt-4 font-serif text-[clamp(2.35rem,3.8vw,3.75rem)] leading-[1.04] font-medium tracking-[-0.03em]"
                    >
                        Learning built around participation and application.
                    </h2>
                    <p class="mt-5 text-base leading-7 text-white/74">
                        Sessions connect clear instruction with discussion,
                        practical examples and the workplace responsibilities of
                        participants.
                    </p>
                    <ul class="mt-8 space-y-4 border-t border-white/15 pt-6">
                        <li
                            class="flex items-center gap-3 text-sm text-white/82"
                        >
                            <CheckCircle2
                                class="size-5 shrink-0 text-brand-gold"
                                aria-hidden="true"
                            />
                            Facilitated professional discussion
                        </li>
                        <li
                            class="flex items-center gap-3 text-sm text-white/82"
                        >
                            <CheckCircle2
                                class="size-5 shrink-0 text-brand-gold"
                                aria-hidden="true"
                            />
                            Practical, context-aware examples
                        </li>
                        <li
                            class="flex items-center gap-3 text-sm text-white/82"
                        >
                            <CheckCircle2
                                class="size-5 shrink-0 text-brand-gold"
                                aria-hidden="true"
                            />
                            Clear connection to workplace application
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section
        aria-labelledby="training-approach-heading"
        class="border-y border-brand-border bg-[var(--brand-warm-grey)] py-16 sm:py-20 lg:py-24"
    >
        <div
            class="public-container grid gap-11 lg:grid-cols-[0.8fr_1.2fr] lg:gap-20"
        >
            <div class="max-w-xl">
                <p class="public-eyebrow">Learning Approach</p>
                <h2
                    id="training-approach-heading"
                    class="mt-4 font-serif text-[clamp(2.4rem,4vw,4rem)] leading-[1.03] font-medium tracking-[-0.03em] text-brand-charcoal"
                >
                    Designed for confident workplace application.
                </h2>
                <p class="mt-5 text-base leading-7 text-brand-muted">
                    Programme scope, session arrangements and delivery details
                    are established around each approved learning engagement.
                </p>
            </div>

            <ol class="grid gap-4 sm:grid-cols-3">
                <li
                    v-for="(step, index) in programmeApproach"
                    :key="step.title"
                    class="border border-brand-border bg-white p-6"
                >
                    <CheckCircle2
                        class="size-8 text-brand-forest"
                        :stroke-width="1.5"
                        aria-hidden="true"
                    />
                    <p
                        class="mt-6 text-xs font-bold tracking-[0.12em] text-[var(--brand-gold-text)]"
                    >
                        {{ String(index + 1).padStart(2, '0') }}
                    </p>
                    <h3
                        class="mt-2 font-serif text-2xl font-medium text-brand-charcoal"
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

    <section class="bg-white py-16 sm:py-20">
        <div class="public-container">
            <div
                class="relative overflow-hidden border-l-[6px] border-brand-gold bg-brand-burgundy px-7 py-12 text-white sm:px-10 lg:grid lg:grid-cols-[1fr_auto] lg:items-center lg:gap-12 lg:px-14"
            >
                <div
                    class="pointer-events-none absolute -top-40 -right-24 size-80 rounded-full border border-white/12"
                    aria-hidden="true"
                />
                <div class="relative max-w-3xl">
                    <p
                        class="text-xs font-bold tracking-[0.18em] text-white/72 uppercase"
                    >
                        Custom Corporate Training
                    </p>
                    <h2
                        class="mt-4 font-serif text-3xl font-medium sm:text-4xl"
                    >
                        Build a programme around your organisation's needs.
                    </h2>
                    <p class="mt-4 text-base leading-7 text-white/78">
                        Start with the capability gap, intended participants and
                        practical outcome your team needs to achieve.
                    </p>
                </div>
                <Link
                    href="/request-consultation"
                    class="relative mt-8 inline-flex min-h-12 items-center justify-center gap-3 rounded-sm bg-white px-6 text-sm font-bold text-brand-burgundy transition-colors hover:bg-brand-warm-white lg:mt-0"
                >
                    Request Custom Training
                    <ArrowRight class="size-4" aria-hidden="true" />
                </Link>
            </div>
        </div>
    </section>

    <HomeFinalCta />
</template>
