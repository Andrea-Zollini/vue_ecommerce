<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Card from "@/Components/ui/Card.vue";
import { ArrowLongLeftIcon, ArrowLongRightIcon } from "@heroicons/vue/20/solid";
import Container from "@/Components/ui/Container.vue";
import { Head } from "@inertiajs/vue3";
import { onMounted } from "vue";

const props = defineProps({
    products: Object,
});
</script>

<template>
    <Head title="Products" />

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
        <!-- Pagination -->
        <Container>
            <nav
                class="flex items-center justify-between px-4 pb-12 border-t border-gray-200 sm:px-0"
            >
                <div class="flex flex-1 w-0 -mt-px">
                    <a
                        :href="props.products.prev_page_url"
                        class="inline-flex items-center pt-4 pr-1 text-sm font-medium text-gray-500 border-t-2 border-transparent hover:border-gray-300 hover:text-gray-700"
                    >
                        <ArrowLongLeftIcon
                            class="w-5 h-5 mr-3 text-gray-400"
                            aria-hidden="true"
                        />
                        Previous
                    </a>
                </div>
                <div class="hidden md:-mt-px md:flex">
                    <span>{{ props.products.current_page }}</span>
                </div>
                <div class="flex justify-end flex-1 w-0 -mt-px">
                    <a
                        :href="props.products.next_page_url"
                        class="inline-flex items-center pt-4 pl-1 text-sm font-medium text-gray-500 border-t-2 border-transparent hover:border-gray-300 hover:text-gray-700"
                    >
                        Next
                        <ArrowLongRightIcon
                            class="w-5 h-5 ml-3 text-gray-400"
                            aria-hidden="true"
                        />
                    </a>
                </div>
            </nav>
        </Container>
    </AuthenticatedLayout>
</template>
