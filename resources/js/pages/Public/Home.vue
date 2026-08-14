<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { computed } from 'vue';
import HomeAccountingTechnology from '@/components/public/home/HomeAccountingTechnology.vue';
import HomeFinalCta from '@/components/public/home/HomeFinalCta.vue';
import HomeInsights from '@/components/public/home/HomeInsights.vue';
import HomeSectorExperience from '@/components/public/home/HomeSectorExperience.vue';
import HomeTraining from '@/components/public/home/HomeTraining.vue';
import HomeWhyForemost from '@/components/public/home/HomeWhyForemost.vue';
import HomeCoreServicesV1 from '@/components/public/home/v1/HomeCoreServices.vue';
import HomeHeroV1 from '@/components/public/home/v1/HomeHero.vue';
import HomeCoreServicesV2 from '@/components/public/home/v2/HomeCoreServices.vue';
import HomeHeroV2 from '@/components/public/home/v2/HomeHero.vue';
import type { HomepageVariant } from '@/content/homepage';

const props = defineProps<{
    homepageVariant: HomepageVariant;
}>();

const activeHomepageVariant = computed<HomepageVariant>(() =>
    props.homepageVariant === 'v1' ? 'v1' : 'v2',
);
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

    <template v-if="activeHomepageVariant === 'v1'">
        <HomeHeroV1 />
        <HomeCoreServicesV1 />
    </template>

    <template v-else>
        <HomeHeroV2 />
        <HomeCoreServicesV2 />
    </template>

    <HomeWhyForemost />
    <HomeSectorExperience />
    <HomeAccountingTechnology />
    <HomeTraining />
    <HomeInsights />
    <HomeFinalCta />
</template>
