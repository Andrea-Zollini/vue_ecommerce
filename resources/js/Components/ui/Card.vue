<template>
    <div class="relative p-3 border-2 rounded shadow-md group">
        <div
            class="w-full overflow-hidden bg-gray-200 rounded-md aspect-h-1 aspect-w-1 lg:aspect-none group-hover:opacity-75 lg:h-80"
        >
            <Link :href="route('product.show', { slug: product.slug })">
                <img
                    :src="product.image"
                    :alt="product.description"
                    class="object-cover object-center w-full h-full lg:h-full lg:w-full"
                />
            </Link>
        </div>
        <div class="flex justify-between mt-4">
            <div>
                <h3 class="text-sm text-gray-700">
                    <a :href="route('product.show', { slug: product.slug })">
                        <span aria-hidden="true" class="absolute inset-0" />
                        {{ product.name }}
                    </a>
                </h3>
            </div>
            <p class="text-sm font-medium text-gray-900">
                € {{ product.price }}
            </p>
        </div>
        <div class="mt-6 transition-all duration-300 ease-in-out border">
            <a
                :href="product.href"
                class="relative flex items-center justify-center px-8 py-2 text-sm font-medium text-gray-900 bg-gray-100 border border-transparent rounded-md hover:bg-gray-200"
                >Add to bag<span class="sr-only">, {{ product.name }}</span></a
            >
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    product: Object,
});
</script>
