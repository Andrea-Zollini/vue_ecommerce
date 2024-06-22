<template>
    <Head :title="product.name" />
    <div class="mt-12">
        <Link :href="'/products'">
            <div
                class="flex items-center justify-center w-full px-8 py-3 text-base font-medium border border-transparent rounded-md max-w-fit focus:outline-none focus:ring-2 focus:text-underline focus:ring-offset-2 focus:ring-offset-gray-50"
            >
                <ArrowLeftIcon
                    class="flex-shrink-0 w-5 h-5 mr-2"
                    aria-hidden="true"
                />
                Go Back
            </div>
        </Link>
    </div>
    <div class="mt-12">
        <div
            class="max-w-2xl px-4 py-16 mx-auto sm:px-6 sm:py-24 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8"
        >
            <!-- Product details -->
            <div class="lg:max-w-lg lg:self-end">
                <nav aria-label="Breadcrumb">
                    <ol role="list" class="flex items-center space-x-2">
                        <li
                            v-for="(
                                breadcrumb, breadcrumbIdx
                            ) in product.breadcrumbs"
                            :key="breadcrumb.id"
                        >
                            <div class="flex items-center text-sm">
                                <p
                                    class="font-medium text-gray-500 hover:text-gray-900"
                                >
                                    {{ product.name }}
                                </p>
                                <svg
                                    v-if="
                                        breadcrumbIdx !==
                                        product.breadcrumbs.length - 1
                                    "
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                    class="flex-shrink-0 w-5 h-5 ml-2 text-gray-300"
                                >
                                    <path
                                        d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z"
                                    />
                                </svg>
                            </div>
                        </li>
                    </ol>
                </nav>

                <div class="mt-4">
                    <h1
                        class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"
                    >
                        {{ product.name }}
                    </h1>
                </div>

                <section aria-labelledby="information-heading" class="mt-4">
                    <h2 id="information-heading" class="sr-only">
                        Product information
                    </h2>

                    <div class="flex items-center">
                        <p class="text-lg text-gray-900 sm:text-xl">
                            € {{ product.price }}
                        </p>

                        <!-- <div class="pl-4 ml-4 border-l border-gray-300">
                            <h2 class="sr-only">Reviews</h2>
                            <div class="flex items-center">
                                <div>
                                    <div class="flex items-center">
                                        <StarIcon
                                            v-for="rating in [0, 1, 2, 3, 4]"
                                            :key="rating"
                                            :class="[
                                                reviews.average > rating
                                                    ? 'text-yellow-400'
                                                    : 'text-gray-300',
                                                'h-5 w-5 flex-shrink-0',
                                            ]"
                                            aria-hidden="true"
                                        />
                                    </div>
                                    <p class="sr-only">
                                        {{ reviews.average }} out of 5 stars
                                    </p>
                                </div>
                                <p class="ml-2 text-sm text-gray-500">
                                    {{ reviews.totalCount }} reviews
                                </p>
                            </div>
                        </div> -->
                    </div>

                    <div class="mt-4 space-y-6">
                        <p class="text-base text-gray-500">
                            {{ product.description }}
                        </p>
                    </div>

                    <div class="flex items-center mt-6">
                        <template v-if="product.quantity > 0">
                            <CheckIcon
                                class="flex-shrink-0 w-5 h-5 text-green-500"
                                aria-hidden="true"
                            />
                            <p class="ml-2 text-sm text-gray-500">
                                In stock and ready to ship
                            </p>
                        </template>
                        <template v-else>
                            <XMarkIcon
                                class="flex-shrink-0 w-5 h-5 text-red-500"
                                aria-hidden="true"
                            />
                            <p class="ml-2 text-sm text-gray-500">
                                Out of stock
                            </p>
                        </template>
                    </div>
                </section>
            </div>

            <!-- Product image -->
            <div
                class="mt-10 lg:col-start-2 lg:row-span-2 lg:mt-0 lg:self-center"
            >
                <div class="overflow-hidden rounded-lg aspect-h-1 aspect-w-1">
                    <img
                        :src="product.image"
                        :alt="product.description"
                        class="object-cover object-center w-full h-full"
                    />
                </div>
            </div>

            <div class="mt-10">
                <button
                    type="submit"
                    class="flex items-center justify-center w-full px-8 py-3 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50"
                >
                    Add to bag
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, Head } from "@inertiajs/vue3";
import { CheckIcon, XMarkIcon, ArrowLeftIcon } from "@heroicons/vue/20/solid";

defineProps({
    product: Object,
});
</script>
