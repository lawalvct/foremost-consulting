<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { ChevronUp, MessageCircleMore } from '@lucide/vue';
import { computed, onBeforeUnmount, onMounted, reactive, ref } from 'vue';
import type { CSSProperties } from 'vue';

type SavedPosition = {
    x: number;
    y: number;
};

const page = usePage();
const showBackToTop = ref(false);
const hasMounted = ref(false);
const isDragging = ref(false);
const position = reactive<SavedPosition>({ x: 16, y: 16 });

const widgetSize = 56;
const edgePadding = 16;
const storageKey = 'foremost-whatsapp-widget-position';

let hasCustomPosition = false;
let activePointerId: number | null = null;
let startPointerX = 0;
let startPointerY = 0;
let startWidgetX = 0;
let startWidgetY = 0;
let didDrag = false;
let suppressNextClick = false;
let suppressResetTimer: number | null = null;

const whatsappNumber = computed(
    () => page.props.site.whatsappNumber?.trim() ?? '',
);

const whatsappHref = computed(() => {
    if (!whatsappNumber.value) {
        return '';
    }

    const message = encodeURIComponent(
        'Hello Foremost Consulting Associates, I would like to make an enquiry.',
    );

    return `https://wa.me/${whatsappNumber.value}?text=${message}`;
});

const whatsappStyle = computed<CSSProperties>(() => {
    if (!hasMounted.value) {
        return {
            left: '1rem',
            bottom: '1rem',
        };
    }

    return {
        left: `${position.x}px`,
        top: `${position.y}px`,
    };
});

const clampPosition = (x: number, y: number): SavedPosition => {
    const maxX = Math.max(
        edgePadding,
        window.innerWidth - widgetSize - edgePadding,
    );
    const maxY = Math.max(
        edgePadding,
        window.innerHeight - widgetSize - edgePadding,
    );

    return {
        x: Math.min(Math.max(x, edgePadding), maxX),
        y: Math.min(Math.max(y, edgePadding), maxY),
    };
};

const setPosition = (x: number, y: number): void => {
    const nextPosition = clampPosition(x, y);
    position.x = nextPosition.x;
    position.y = nextPosition.y;
};

const savePosition = (): void => {
    try {
        window.localStorage.setItem(storageKey, JSON.stringify(position));
    } catch {
        // Device-local persistence is optional.
    }
};

const initialisePosition = (): void => {
    try {
        const savedValue = window.localStorage.getItem(storageKey);

        if (savedValue) {
            const savedPosition = JSON.parse(
                savedValue,
            ) as Partial<SavedPosition>;

            if (
                Number.isFinite(savedPosition.x) &&
                Number.isFinite(savedPosition.y)
            ) {
                hasCustomPosition = true;
                setPosition(
                    savedPosition.x as number,
                    savedPosition.y as number,
                );

                return;
            }
        }
    } catch {
        // Fall back to the default bottom-left position.
    }

    setPosition(edgePadding, window.innerHeight - widgetSize - edgePadding);
};

const updateBackToTopVisibility = (): void => {
    showBackToTop.value = window.scrollY > 560;
};

const handleResize = (): void => {
    if (hasCustomPosition) {
        setPosition(position.x, position.y);

        return;
    }

    setPosition(edgePadding, window.innerHeight - widgetSize - edgePadding);
};

const scrollToTop = (): void => {
    const reduceMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)',
    ).matches;

    window.scrollTo({
        top: 0,
        behavior: reduceMotion ? 'auto' : 'smooth',
    });
};

const handlePointerDown = (event: PointerEvent): void => {
    if (event.pointerType === 'mouse' && event.button !== 0) {
        return;
    }

    activePointerId = event.pointerId;
    startPointerX = event.clientX;
    startPointerY = event.clientY;
    startWidgetX = position.x;
    startWidgetY = position.y;
    didDrag = false;
    isDragging.value = true;

    (event.currentTarget as HTMLElement).setPointerCapture(event.pointerId);
};

const handlePointerMove = (event: PointerEvent): void => {
    if (!isDragging.value || event.pointerId !== activePointerId) {
        return;
    }

    const deltaX = event.clientX - startPointerX;
    const deltaY = event.clientY - startPointerY;

    if (Math.hypot(deltaX, deltaY) > 5) {
        didDrag = true;
    }

    if (didDrag) {
        event.preventDefault();
        setPosition(startWidgetX + deltaX, startWidgetY + deltaY);
    }
};

const finishDragging = (event: PointerEvent): void => {
    if (event.pointerId !== activePointerId) {
        return;
    }

    const target = event.currentTarget as HTMLElement;

    if (target.hasPointerCapture(event.pointerId)) {
        target.releasePointerCapture(event.pointerId);
    }

    isDragging.value = false;
    activePointerId = null;
    suppressNextClick = didDrag;

    if (didDrag) {
        hasCustomPosition = true;
        savePosition();
    }

    if (suppressResetTimer !== null) {
        window.clearTimeout(suppressResetTimer);
    }

    suppressResetTimer = window.setTimeout(() => {
        suppressNextClick = false;
    }, 0);
};

const handleWhatsappClick = (event: MouseEvent): void => {
    if (!suppressNextClick) {
        return;
    }

    event.preventDefault();
    suppressNextClick = false;
};

onMounted(() => {
    hasMounted.value = true;
    initialisePosition();
    updateBackToTopVisibility();

    window.addEventListener('scroll', updateBackToTopVisibility, {
        passive: true,
    });
    window.addEventListener('resize', handleResize, { passive: true });
});

onBeforeUnmount(() => {
    window.removeEventListener('scroll', updateBackToTopVisibility);
    window.removeEventListener('resize', handleResize);

    if (suppressResetTimer !== null) {
        window.clearTimeout(suppressResetTimer);
    }
});
</script>

<template>
    <a
        v-if="whatsappHref"
        :href="whatsappHref"
        :style="whatsappStyle"
        target="_blank"
        rel="noopener noreferrer"
        class="group fixed z-40 inline-flex size-14 cursor-grab touch-none items-center justify-center rounded-full bg-[var(--whatsapp-green)] text-white shadow-[0_12px_32px_rgba(7,56,44,0.24)] select-none active:cursor-grabbing"
        :class="{ 'scale-[1.04]': isDragging }"
        aria-label="Chat with Foremost on WhatsApp. Drag to reposition."
        aria-describedby="whatsapp-drag-hint"
        title="Chat on WhatsApp - drag to move"
        @click="handleWhatsappClick"
        @dragstart.prevent
        @pointerdown="handlePointerDown"
        @pointermove="handlePointerMove"
        @pointerup="finishDragging"
        @pointercancel="finishDragging"
    >
        <MessageCircleMore
            class="size-7"
            :stroke-width="2"
            aria-hidden="true"
        />
        <span
            id="whatsapp-drag-hint"
            class="pointer-events-none absolute left-full ml-3 hidden w-max rounded-sm bg-brand-charcoal px-3 py-2 text-xs font-semibold text-white opacity-0 shadow-lg transition-opacity group-hover:opacity-100 group-focus-visible:opacity-100 sm:block"
        >
            WhatsApp - drag to move
        </span>
    </a>

    <Transition
        enter-active-class="transition duration-200 ease-out"
        enter-from-class="translate-y-2 opacity-0"
        enter-to-class="translate-y-0 opacity-100"
        leave-active-class="transition duration-150 ease-in"
        leave-from-class="translate-y-0 opacity-100"
        leave-to-class="translate-y-2 opacity-0"
    >
        <button
            v-if="showBackToTop"
            type="button"
            class="fixed right-4 bottom-4 z-40 inline-flex size-12 items-center justify-center rounded-full border border-brand-forest/25 bg-white/65 text-brand-forest-dark shadow-[0_10px_28px_rgba(7,56,44,0.14)] backdrop-blur-md transition-colors hover:border-brand-forest/45 hover:bg-white/85 sm:right-6 sm:bottom-6"
            aria-label="Back to top"
            title="Back to top"
            @click="scrollToTop"
        >
            <ChevronUp class="size-5" :stroke-width="2" aria-hidden="true" />
        </button>
    </Transition>
</template>
