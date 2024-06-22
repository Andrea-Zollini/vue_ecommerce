<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Card from "@/Components/ui/Card.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    products: Object,
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="">
            <div
                class="max-w-2xl px-4 py-16 mx-auto sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8"
            >
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">
                    Our Products
                </h2>

                <div
                    class="grid grid-cols-1 mt-6 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8"
                >
                    <template
                        v-for="product in props.products.data"
                        :key="product.id"
                    >
                        <Card :product="product" />
                    </template>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
