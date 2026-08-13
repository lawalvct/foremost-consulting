<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { ChevronDown, MapPin, Menu } from '@lucide/vue';
import { computed, ref } from 'vue';
import {
    NavigationMenu,
    NavigationMenuContent,
    NavigationMenuItem,
    NavigationMenuLink,
    NavigationMenuList,
    NavigationMenuTrigger,
} from '@/components/ui/navigation-menu';
import {
    Sheet,
    SheetContent,
    SheetDescription,
    SheetHeader,
    SheetTitle,
    SheetTrigger,
} from '@/components/ui/sheet';

type NavigationItem = {
    label: string;
    href: string;
};

const beforeServices: NavigationItem[] = [
    { label: 'Home', href: '/' },
    { label: 'About', href: '/about' },
];

const afterServices: NavigationItem[] = [
    { label: 'Industries', href: '/industries' },
    { label: 'Training', href: '/training' },
    { label: 'Insights', href: '/insights' },
    { label: 'Contact', href: '/contact' },
];

const serviceItems: NavigationItem[] = [
    { label: 'Audit & Assurance', href: '/#service-audit-assurance' },
    {
        label: 'Accounting & Financial Management',
        href: '/#service-accounting-financial-management',
    },
    {
        label: 'Tax & Regulatory Advisory',
        href: '/#service-tax-regulatory-advisory',
    },
    {
        label: 'Management & Business Advisory',
        href: '/#service-management-business-advisory',
    },
    {
        label: 'Corporate Affairs Services',
        href: '/#service-corporate-affairs',
    },
    {
        label: 'Investigation & Special Engagements',
        href: '/#service-investigation-special-engagements',
    },
    {
        label: 'Accounting Technology & Systems',
        href: '/#service-accounting-technology-systems',
    },
    {
        label: 'Training & Capacity Development',
        href: '/#service-training-capacity-development',
    },
];

const page = usePage();
const mobileOpen = ref(false);
const currentPath = computed(() => page.url.split(/[?#]/, 1)[0] ?? '/');

const isActive = (href: string): boolean => {
    if (href === '/') {
        return currentPath.value === '/';
    }

    return (
        currentPath.value === href || currentPath.value.startsWith(`${href}/`)
    );
};

const closeMobileNavigation = (): void => {
    mobileOpen.value = false;
};
</script>

<template>
    <header
        class="sticky top-0 z-50 bg-white shadow-[0_1px_0_rgba(11,77,59,0.08)]"
    >
        <div class="bg-brand-forest-dark text-white">
            <div
                class="public-container flex min-h-8 items-center justify-between gap-4 py-1 text-[0.72rem] font-medium tracking-[0.02em]"
            >
                <p class="flex items-center gap-2">
                    <MapPin
                        class="size-3.5 text-brand-gold"
                        aria-hidden="true"
                    />
                    <span>Abeokuta, Ogun State, Nigeria</span>
                </p>
                <p class="hidden text-white/88 sm:block">
                    Probity
                    <span class="px-1.5 text-brand-gold">•</span> Integrity
                    <span class="px-1.5 text-brand-gold">•</span>
                    Honesty
                </p>
            </div>
        </div>

        <div class="border-b border-brand-border/85 bg-white">
            <div class="public-container flex h-[5.5rem] items-center gap-6">
                <Link
                    href="/"
                    class="flex shrink-0 items-center"
                    aria-label="Foremost Consulting Associates — home"
                >
                    <img
                        src="/brand/foremost-fca-mark-128.png"
                        alt=""
                        width="128"
                        height="128"
                        class="size-12 sm:hidden"
                    />
                    <img
                        src="/brand/foremost-logo-header.png"
                        alt="Foremost Consulting Associates"
                        width="720"
                        height="192"
                        class="hidden h-16 w-auto sm:block"
                    />
                </Link>

                <nav
                    aria-label="Primary navigation"
                    class="ml-auto hidden h-full items-center gap-0.5 xl:flex"
                >
                    <Link
                        v-for="item in beforeServices"
                        :key="item.label"
                        :href="item.href"
                        class="relative flex min-h-11 items-center px-3 text-[0.84rem] font-semibold text-brand-charcoal transition-colors hover:text-brand-burgundy"
                        :class="{ 'text-brand-burgundy': isActive(item.href) }"
                        :aria-current="isActive(item.href) ? 'page' : undefined"
                    >
                        {{ item.label }}
                        <span
                            v-if="isActive(item.href)"
                            class="absolute inset-x-3 bottom-0 h-0.5 bg-brand-burgundy"
                            aria-hidden="true"
                        />
                    </Link>

                    <NavigationMenu :viewport="false">
                        <NavigationMenuList>
                            <NavigationMenuItem class="relative">
                                <NavigationMenuTrigger
                                    class="min-h-11 bg-transparent px-3 text-[0.84rem] font-semibold text-brand-charcoal hover:bg-transparent hover:text-brand-burgundy focus:bg-brand-warm-white data-[state=open]:bg-brand-warm-white data-[state=open]:text-brand-burgundy"
                                >
                                    Services
                                </NavigationMenuTrigger>
                                <NavigationMenuContent
                                    class="left-1/2 w-[44rem] -translate-x-1/2 rounded-sm border-brand-border bg-white p-3 shadow-[0_18px_50px_rgba(7,56,44,0.16)]"
                                >
                                    <div class="grid grid-cols-2 gap-1">
                                        <NavigationMenuLink
                                            v-for="item in serviceItems"
                                            :key="item.label"
                                            :as-child="true"
                                        >
                                            <a
                                                :href="item.href"
                                                class="rounded-sm px-4 py-3 text-sm font-semibold text-brand-charcoal transition-colors hover:bg-[#f3f6f4] hover:text-brand-forest focus:bg-[#f3f6f4]"
                                            >
                                                {{ item.label }}
                                            </a>
                                        </NavigationMenuLink>
                                    </div>
                                </NavigationMenuContent>
                            </NavigationMenuItem>
                        </NavigationMenuList>
                    </NavigationMenu>

                    <Link
                        v-for="item in afterServices"
                        :key="item.label"
                        :href="item.href"
                        class="relative flex min-h-11 items-center px-3 text-[0.84rem] font-semibold text-brand-charcoal transition-colors hover:text-brand-burgundy"
                        :class="{ 'text-brand-burgundy': isActive(item.href) }"
                        :aria-current="isActive(item.href) ? 'page' : undefined"
                    >
                        {{ item.label }}
                        <span
                            v-if="isActive(item.href)"
                            class="absolute inset-x-3 bottom-0 h-0.5 bg-brand-burgundy"
                            aria-hidden="true"
                        />
                    </Link>

                    <Link
                        href="/request-consultation"
                        class="ml-3 inline-flex min-h-11 items-center justify-center rounded-sm bg-brand-forest px-5 text-[0.84rem] font-bold text-white shadow-sm transition-colors hover:bg-brand-forest-dark"
                    >
                        Request Consultation
                    </Link>
                </nav>

                <div class="ml-auto xl:hidden">
                    <Sheet v-model:open="mobileOpen">
                        <SheetTrigger :as-child="true">
                            <button
                                type="button"
                                class="inline-flex size-11 items-center justify-center rounded-sm border border-brand-border bg-white text-brand-forest transition-colors hover:bg-brand-warm-white"
                                aria-label="Open navigation menu"
                            >
                                <Menu class="size-5" aria-hidden="true" />
                            </button>
                        </SheetTrigger>
                        <SheetContent
                            side="right"
                            class="public-site w-[min(92vw,25rem)] gap-0 border-l-brand-border bg-white p-0"
                        >
                            <SheetHeader
                                class="border-b border-brand-border px-6 py-5 text-left"
                            >
                                <SheetTitle class="sr-only"
                                    >Navigation menu</SheetTitle
                                >
                                <SheetDescription class="sr-only">
                                    Browse Foremost Consulting Associates pages
                                    and services.
                                </SheetDescription>
                                <Link
                                    href="/"
                                    aria-label="Foremost Consulting Associates — home"
                                    @click="closeMobileNavigation"
                                >
                                    <img
                                        src="/brand/foremost-logo-header.png"
                                        alt="Foremost Consulting Associates"
                                        width="720"
                                        height="192"
                                        class="h-14 w-auto"
                                    />
                                </Link>
                            </SheetHeader>

                            <nav
                                aria-label="Mobile navigation"
                                class="flex min-h-0 flex-1 flex-col overflow-y-auto px-6 py-5"
                            >
                                <Link
                                    v-for="item in beforeServices"
                                    :key="item.label"
                                    :href="item.href"
                                    class="flex min-h-12 items-center border-b border-brand-border/75 text-base font-semibold text-brand-charcoal"
                                    :class="{
                                        'text-brand-burgundy': isActive(
                                            item.href,
                                        ),
                                    }"
                                    :aria-current="
                                        isActive(item.href) ? 'page' : undefined
                                    "
                                    @click="closeMobileNavigation"
                                >
                                    {{ item.label }}
                                </Link>

                                <details
                                    class="group border-b border-brand-border/75"
                                >
                                    <summary
                                        class="flex min-h-12 cursor-pointer list-none items-center justify-between text-base font-semibold text-brand-charcoal [&::-webkit-details-marker]:hidden"
                                    >
                                        Services
                                        <ChevronDown
                                            class="size-4 transition-transform group-open:rotate-180"
                                            aria-hidden="true"
                                        />
                                    </summary>
                                    <div class="space-y-1 pb-4 pl-3">
                                        <a
                                            v-for="item in serviceItems"
                                            :key="item.label"
                                            :href="item.href"
                                            class="block rounded-sm px-3 py-2.5 text-sm leading-snug font-medium text-brand-muted hover:bg-[#f3f6f4] hover:text-brand-forest"
                                            @click="closeMobileNavigation"
                                        >
                                            {{ item.label }}
                                        </a>
                                    </div>
                                </details>

                                <Link
                                    v-for="item in afterServices"
                                    :key="item.label"
                                    :href="item.href"
                                    class="flex min-h-12 items-center border-b border-brand-border/75 text-base font-semibold text-brand-charcoal"
                                    :class="{
                                        'text-brand-burgundy': isActive(
                                            item.href,
                                        ),
                                    }"
                                    :aria-current="
                                        isActive(item.href) ? 'page' : undefined
                                    "
                                    @click="closeMobileNavigation"
                                >
                                    {{ item.label }}
                                </Link>

                                <Link
                                    href="/request-consultation"
                                    class="mt-6 inline-flex min-h-12 items-center justify-center rounded-sm bg-brand-forest px-5 font-bold text-white transition-colors hover:bg-brand-forest-dark"
                                    @click="closeMobileNavigation"
                                >
                                    Request Consultation
                                </Link>
                            </nav>
                        </SheetContent>
                    </Sheet>
                </div>
            </div>
        </div>
    </header>
</template>
