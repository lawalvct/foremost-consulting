<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ArrowRight } from '@lucide/vue';
import { trainingProgrammes } from '@/content/homepage';
</script>

<template>
    <section
        id="training"
        aria-labelledby="training-heading"
        class="relative scroll-mt-36 overflow-hidden border-b border-brand-border bg-white py-16 sm:py-20 lg:py-24"
    >
        <div
            class="pointer-events-none absolute top-0 left-0 h-1 w-32 bg-brand-burgundy sm:w-48"
            aria-hidden="true"
        />
        <div
            class="pointer-events-none absolute top-0 left-32 h-1 w-20 bg-brand-gold sm:left-48 sm:w-28"
            aria-hidden="true"
        />

        <div class="public-container relative">
            <div
                class="grid items-end gap-8 lg:grid-cols-[1.25fr_0.75fr] lg:gap-16"
            >
                <div class="max-w-4xl">
                    <p class="public-eyebrow">
                        Training & Capacity Development
                    </p>
                    <h2
                        id="training-heading"
                        class="mt-4 font-serif text-[clamp(2.4rem,4.4vw,4.4rem)] leading-[1.02] font-medium tracking-[-0.03em] text-brand-charcoal"
                    >
                        Practical capability that lasts beyond the classroom.
                    </h2>
                </div>

                <div class="lg:pb-1">
                    <p
                        class="max-w-xl text-base leading-7 text-brand-muted sm:text-lg sm:leading-8"
                    >
                        Programmes for emerging professionals, organisational
                        teams and participants who need practical, relevant
                        learning.
                    </p>
                    <Link
                        href="/training"
                        class="group mt-6 inline-flex min-h-12 items-center justify-center gap-3 rounded-sm bg-brand-burgundy px-6 text-sm font-bold text-white transition-colors hover:bg-brand-burgundy/90"
                    >
                        View Training Programmes
                        <ArrowRight
                            class="size-4 transition-transform group-hover:translate-x-1"
                            aria-hidden="true"
                        />
                    </Link>
                </div>
            </div>

            <ul class="mt-12 grid gap-4 sm:grid-cols-2 xl:grid-cols-5">
                <li
                    v-for="(programme, index) in trainingProgrammes"
                    :key="programme.title"
                    class="relative flex min-h-64 flex-col border border-brand-border bg-[var(--brand-warm-grey)] p-6 sm:last:col-span-2 xl:last:col-span-1"
                >
                    <div class="flex items-start justify-between gap-4">
                        <span
                            class="inline-flex size-11 items-center justify-center rounded-sm bg-brand-forest text-white"
                            aria-hidden="true"
                        >
                            <component
                                :is="programme.icon"
                                class="size-5"
                                :stroke-width="1.7"
                            />
                        </span>
                        <span
                            class="text-xs leading-5 font-bold tracking-[0.12em] text-[var(--brand-gold-text)]"
                            aria-hidden="true"
                        >
                            {{ String(index + 1).padStart(2, '0') }}
                        </span>
                    </div>

                    <h3
                        class="mt-8 text-lg leading-snug font-bold text-brand-charcoal"
                    >
                        {{ programme.title }}
                    </h3>
                    <p class="mt-3 text-sm leading-6 text-brand-muted">
                        {{ programme.description }}
                    </p>

                    <span class="mt-auto block pt-6" aria-hidden="true">
                        <span class="block h-px w-10 bg-brand-burgundy" />
                        <span class="block h-px w-6 bg-brand-gold" />
                    </span>
                </li>
            </ul>
        </div>
    </section>
</template>
