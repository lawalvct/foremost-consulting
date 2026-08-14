<script setup lang="ts">
import PublicFloatingActions from '@/components/public/PublicFloatingActions.vue';
import PublicFooter from '@/components/public/PublicFooter.vue';
import PublicHeader from '@/components/public/PublicHeader.vue';
</script>

<template>
    <div class="public-site flex min-h-screen flex-col font-sans">
        <a href="#main-content" class="public-skip-link">
            Skip to main content
        </a>

        <PublicHeader />

        <main id="main-content" tabindex="-1" class="flex-1 outline-none">
            <slot />
        </main>

        <PublicFooter />
        <PublicFloatingActions />
    </div>
</template>
