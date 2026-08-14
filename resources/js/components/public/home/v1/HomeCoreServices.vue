<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ArrowRight } from '@lucide/vue';
import { coreServices } from '@/content/homepage';
</script>

<template>
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
                    v-for="service in coreServices"
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
