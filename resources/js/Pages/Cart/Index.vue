<template>
    <div class="">
        <!-- Mobile menu -->
        <TransitionRoot as="template" :show="open">
            <Dialog class="relative z-40 lg:hidden" @close="open = false">
                <TransitionChild
                    as="template"
                    enter="transition-opacity ease-linear duration-300"
                    enter-from="opacity-0"
                    enter-to="opacity-100"
                    leave="transition-opacity ease-linear duration-300"
                    leave-from="opacity-100"
                    leave-to="opacity-0"
                >
                    <div class="fixed inset-0 bg-black bg-opacity-25" />
                </TransitionChild>

                <div class="fixed inset-0 z-40 flex">
                    <TransitionChild
                        as="template"
                        enter="transition ease-in-out duration-300 transform"
                        enter-from="-translate-x-full"
                        enter-to="translate-x-0"
                        leave="transition ease-in-out duration-300 transform"
                        leave-from="translate-x-0"
                        leave-to="-translate-x-full"
                    >
                        <DialogPanel
                            class="relative flex flex-col w-full max-w-xs pb-12 overflow-y-auto bg-white shadow-xl"
                        >
                            <div class="flex px-4 pt-5 pb-2">
                                <button
                                    type="button"
                                    class="inline-flex items-center justify-center p-2 -m-2 text-gray-400 rounded-md"
                                    @click="open = false"
                                >
                                    <span class="sr-only">Close menu</span>
                                    <XMarkIcon
                                        class="w-6 h-6"
                                        aria-hidden="true"
                                    />
                                </button>
                            </div>

                            <!-- Links -->
                            <TabGroup as="div" class="mt-2">
                                <div class="border-b border-gray-200">
                                    <TabList class="flex px-4 -mb-px space-x-8">
                                        <Tab
                                            as="template"
                                            v-for="category in navigation.categories"
                                            :key="category.name"
                                            v-slot="{ selected }"
                                        >
                                            <button
                                                :class="[
                                                    selected
                                                        ? 'border-indigo-600 text-indigo-600'
                                                        : 'border-transparent text-gray-900',
                                                    'flex-1 whitespace-nowrap border-b-2 px-1 py-4 text-base font-medium',
                                                ]"
                                            >
                                                {{ category.name }}
                                            </button>
                                        </Tab>
                                    </TabList>
                                </div>
                                <TabPanels as="template">
                                    <TabPanel
                                        v-for="category in navigation.categories"
                                        :key="category.name"
                                        class="px-4 pt-10 pb-8 space-y-10"
                                    >
                                        <div class="space-y-4">
                                            <div
                                                v-for="(
                                                    item, itemIdx
                                                ) in category.featured"
                                                :key="itemIdx"
                                                class="relative overflow-hidden bg-gray-100 rounded-md group aspect-h-1 aspect-w-1"
                                            >
                                                <img
                                                    :src="item.imageSrc"
                                                    :alt="item.imageAlt"
                                                    class="object-cover object-center group-hover:opacity-75"
                                                />
                                                <div
                                                    class="flex flex-col justify-end"
                                                >
                                                    <div
                                                        class="p-4 text-base bg-white bg-opacity-60 sm:text-sm"
                                                    >
                                                        <a
                                                            :href="item.href"
                                                            class="font-medium text-gray-900"
                                                        >
                                                            <span
                                                                class="absolute inset-0"
                                                                aria-hidden="true"
                                                            />
                                                            {{ item.name }}
                                                        </a>
                                                        <p
                                                            aria-hidden="true"
                                                            class="mt-0.5 text-gray-700 sm:mt-1"
                                                        >
                                                            Shop now
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            v-for="(
                                                column, columnIdx
                                            ) in category.sections"
                                            :key="columnIdx"
                                            class="space-y-10"
                                        >
                                            <div
                                                v-for="section in column"
                                                :key="section.name"
                                            >
                                                <p
                                                    :id="`${category.id}-${section.id}-heading-mobile`"
                                                    class="font-medium text-gray-900"
                                                >
                                                    {{ section.name }}
                                                </p>
                                                <ul
                                                    role="list"
                                                    :aria-labelledby="`${category.id}-${section.id}-heading-mobile`"
                                                    class="flex flex-col mt-6 space-y-6"
                                                >
                                                    <li
                                                        v-for="item in section.items"
                                                        :key="item.name"
                                                        class="flow-root"
                                                    >
                                                        <a
                                                            :href="item.href"
                                                            class="block p-2 -m-2 text-gray-500"
                                                            >{{ item.name }}</a
                                                        >
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </TabPanel>
                                </TabPanels>
                            </TabGroup>

                            <div
                                class="px-4 py-6 space-y-6 border-t border-gray-200"
                            >
                                <div
                                    v-for="page in navigation.pages"
                                    :key="page.name"
                                    class="flow-root"
                                >
                                    <a
                                        :href="page.href"
                                        class="block p-2 -m-2 font-medium text-gray-900"
                                        >{{ page.name }}</a
                                    >
                                </div>
                            </div>

                            <div class="px-4 py-6 border-t border-gray-200">
                                <a href="#" class="flex items-center p-2 -m-2">
                                    <img
                                        src="https://tailwindui.com/img/flags/flag-canada.svg"
                                        alt=""
                                        class="flex-shrink-0 block w-5 h-auto"
                                    />
                                    <span
                                        class="block ml-3 text-base font-medium text-gray-900"
                                        >CAD</span
                                    >
                                    <span class="sr-only"
                                        >, change currency</span
                                    >
                                </a>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </Dialog>
        </TransitionRoot>

        <div class="max-w-2xl px-4 mx-auto sm:px-6 sm:py-12 lg:px-0">
            <h1
                class="text-3xl font-bold tracking-tight text-center text-gray-900 sm:text-4xl"
            >
                Shopping Cart
            </h1>

            <form class="mt-12">
                <section aria-labelledby="cart-heading">
                    <h2 id="cart-heading" class="sr-only">
                        Items in your shopping cart
                    </h2>

                    <ul
                        role="list"
                        class="border-t border-b border-gray-200 divide-y divide-gray-200"
                    >
                        <li
                            v-for="product in products"
                            :key="product.id"
                            class="flex py-6"
                        >
                            <div class="flex-shrink-0">
                                <img
                                    :src="product.imageSrc"
                                    :alt="product.imageAlt"
                                    class="object-cover object-center w-24 h-24 rounded-md sm:h-32 sm:w-32"
                                />
                            </div>

                            <div class="flex flex-col flex-1 ml-4 sm:ml-6">
                                <div>
                                    <div class="flex justify-between">
                                        <h4 class="text-sm">
                                            <a
                                                :href="product.href"
                                                class="font-medium text-gray-700 hover:text-gray-800"
                                                >{{ product.name }}</a
                                            >
                                        </h4>
                                        <p
                                            class="ml-4 text-sm font-medium text-gray-900"
                                        >
                                            {{ product.price }}
                                        </p>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">
                                        {{ product.color }}
                                    </p>
                                    <p class="mt-1 text-sm text-gray-500">
                                        {{ product.size }}
                                    </p>
                                </div>

                                <div
                                    class="flex items-end justify-between flex-1 mt-4"
                                >
                                    <p
                                        class="flex items-center space-x-2 text-sm text-gray-700"
                                    >
                                        <CheckIcon
                                            v-if="product.inStock"
                                            class="flex-shrink-0 w-5 h-5 text-green-500"
                                            aria-hidden="true"
                                        />
                                        <ClockIcon
                                            v-else
                                            class="flex-shrink-0 w-5 h-5 text-gray-300"
                                            aria-hidden="true"
                                        />
                                        <span>{{
                                            product.inStock
                                                ? "In stock"
                                                : `Will ship in ${product.leadTime}`
                                        }}</span>
                                    </p>
                                    <div class="ml-4">
                                        <button
                                            type="button"
                                            class="text-sm font-medium text-indigo-600 hover:text-indigo-500"
                                        >
                                            <span>Remove</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </section>

                <!-- Order summary -->
                <section aria-labelledby="summary-heading" class="mt-10">
                    <h2 id="summary-heading" class="sr-only">Order summary</h2>

                    <div>
                        <dl class="space-y-4">
                            <div class="flex items-center justify-between">
                                <dt class="text-base font-medium text-gray-900">
                                    Subtotal
                                </dt>
                                <dd
                                    class="ml-4 text-base font-medium text-gray-900"
                                >
                                    $96.00
                                </dd>
                            </div>
                        </dl>
                        <p class="mt-1 text-sm text-gray-500">
                            Shipping and taxes will be calculated at checkout.
                        </p>
                    </div>

                    <div class="mt-10">
                        <button
                            type="submit"
                            class="w-full px-4 py-3 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50"
                        >
                            Checkout
                        </button>
                    </div>

                    <div class="mt-6 text-sm text-center text-gray-500">
                        <p>
                            or
                            <a
                                href="#"
                                class="font-medium text-indigo-600 hover:text-indigo-500"
                            >
                                Continue Shopping
                                <span aria-hidden="true"> &rarr;</span>
                            </a>
                        </p>
                    </div>
                </section>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import {
    Dialog,
    DialogPanel,
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
    Tab,
    TabGroup,
    TabList,
    TabPanel,
    TabPanels,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";
import {
    Bars3Icon,
    MagnifyingGlassIcon,
    ShoppingBagIcon,
    UserIcon,
    XMarkIcon,
} from "@heroicons/vue/24/outline";
import { CheckIcon, ClockIcon } from "@heroicons/vue/20/solid";

const navigation = {
    categories: [
        {
            id: "women",
            name: "Women",
            featured: [
                {
                    name: "New Arrivals",
                    href: "#",
                    imageSrc:
                        "https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg",
                    imageAlt:
                        "Models sitting back to back, wearing Basic Tee in black and bone.",
                },
                {
                    name: "Basic Tees",
                    href: "#",
                    imageSrc:
                        "https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg",
                    imageAlt:
                        "Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees.",
                },
                {
                    name: "Accessories",
                    href: "#",
                    imageSrc:
                        "https://tailwindui.com/img/ecommerce-images/mega-menu-category-03.jpg",
                    imageAlt:
                        "Model wearing minimalist watch with black wristband and white watch face.",
                },
            ],
            sections: [
                [
                    {
                        id: "shoes",
                        name: "Shoes & Accessories",
                        items: [
                            { name: "Sneakers", href: "#" },
                            { name: "Boots", href: "#" },
                            { name: "Flats", href: "#" },
                            { name: "Sandals", href: "#" },
                            { name: "Heels", href: "#" },
                            { name: "Socks", href: "#" },
                        ],
                    },
                    {
                        id: "collection",
                        name: "Shop Collection",
                        items: [
                            { name: "Everything", href: "#" },
                            { name: "Core", href: "#" },
                            { name: "New Arrivals", href: "#" },
                            { name: "Sale", href: "#" },
                            { name: "Accessories", href: "#" },
                        ],
                    },
                ],
                [
                    {
                        id: "clothing",
                        name: "All Clothing",
                        items: [
                            { name: "Basic Tees", href: "#" },
                            { name: "Artwork Tees", href: "#" },
                            { name: "Tops", href: "#" },
                            { name: "Bottoms", href: "#" },
                            { name: "Swimwear", href: "#" },
                            { name: "Underwear", href: "#" },
                        ],
                    },
                    {
                        id: "accessories",
                        name: "All Accessories",
                        items: [
                            { name: "Watches", href: "#" },
                            { name: "Wallets", href: "#" },
                            { name: "Bags", href: "#" },
                            { name: "Sunglasses", href: "#" },
                            { name: "Hats", href: "#" },
                            { name: "Belts", href: "#" },
                        ],
                    },
                ],
                [
                    {
                        id: "brands",
                        name: "Brands",
                        items: [
                            { name: "Full Nelson", href: "#" },
                            { name: "My Way", href: "#" },
                            { name: "Re-Arranged", href: "#" },
                            { name: "Counterfeit", href: "#" },
                            { name: "Significant Other", href: "#" },
                        ],
                    },
                ],
            ],
        },
        {
            id: "men",
            name: "Men",
            featured: [
                {
                    name: "Accessories",
                    href: "#",
                    imageSrc:
                        "https://tailwindui.com/img/ecommerce-images/home-page-03-category-01.jpg",
                    imageAlt:
                        "Wooden shelf with gray and olive drab green baseball caps, next to wooden clothes hanger with sweaters.",
                },
                {
                    name: "New Arrivals",
                    href: "#",
                    imageSrc:
                        "https://tailwindui.com/img/ecommerce-images/product-page-04-detail-product-shot-01.jpg",
                    imageAlt:
                        "Drawstring top with elastic loop closure and textured interior padding.",
                },
                {
                    name: "Artwork Tees",
                    href: "#",
                    imageSrc:
                        "https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-06.jpg",
                    imageAlt:
                        "Three shirts in gray, white, and blue arranged on table with same line drawing of hands and shapes overlapping on front of shirt.",
                },
            ],
            sections: [
                [
                    {
                        id: "shoes",
                        name: "Shoes & Accessories",
                        items: [
                            { name: "Sneakers", href: "#" },
                            { name: "Boots", href: "#" },
                            { name: "Sandals", href: "#" },
                            { name: "Socks", href: "#" },
                        ],
                    },
                    {
                        id: "collection",
                        name: "Shop Collection",
                        items: [
                            { name: "Everything", href: "#" },
                            { name: "Core", href: "#" },
                            { name: "New Arrivals", href: "#" },
                            { name: "Sale", href: "#" },
                        ],
                    },
                ],
                [
                    {
                        id: "clothing",
                        name: "All Clothing",
                        items: [
                            { name: "Basic Tees", href: "#" },
                            { name: "Artwork Tees", href: "#" },
                            { name: "Pants", href: "#" },
                            { name: "Hoodies", href: "#" },
                            { name: "Swimsuits", href: "#" },
                        ],
                    },
                    {
                        id: "accessories",
                        name: "All Accessories",
                        items: [
                            { name: "Watches", href: "#" },
                            { name: "Wallets", href: "#" },
                            { name: "Bags", href: "#" },
                            { name: "Sunglasses", href: "#" },
                            { name: "Hats", href: "#" },
                            { name: "Belts", href: "#" },
                        ],
                    },
                ],
                [
                    {
                        id: "brands",
                        name: "Brands",
                        items: [
                            { name: "Re-Arranged", href: "#" },
                            { name: "Counterfeit", href: "#" },
                            { name: "Full Nelson", href: "#" },
                            { name: "My Way", href: "#" },
                        ],
                    },
                ],
            ],
        },
    ],
    pages: [
        { name: "Company", href: "#" },
        { name: "Stores", href: "#" },
    ],
};
const products = [
    {
        id: 1,
        name: "Artwork Tee",
        href: "#",
        price: "$32.00",
        color: "Mint",
        size: "Medium",
        inStock: true,
        imageSrc:
            "https://tailwindui.com/img/ecommerce-images/checkout-page-03-product-04.jpg",
        imageAlt: "Front of mint cotton t-shirt with wavey lines pattern.",
    },
    {
        id: 2,
        name: "Basic Tee",
        href: "#",
        price: "$32.00",
        color: "Charcoal",
        inStock: false,
        leadTime: "7-8 years",
        size: "Large",
        imageSrc:
            "https://tailwindui.com/img/ecommerce-images/shopping-cart-page-01-product-02.jpg",
        imageAlt: "Front of charcoal cotton t-shirt.",
    },
    {
        id: 3,
        name: "Basic Tee",
        href: "#",
        price: "$32.00",
        color: "Sienna",
        inStock: true,
        size: "Large",
        imageSrc:
            "https://tailwindui.com/img/ecommerce-images/shopping-cart-page-01-product-01.jpg",
        imageAlt: "Front of sienna cotton t-shirt.",
    },
];
const policies = [
    {
        name: "Free returns",
        imageUrl:
            "https://tailwindui.com/img/ecommerce/icons/icon-returns-light.svg",
        description:
            "Not what you expected? Place it back in the parcel and attach the pre-paid postage stamp.",
    },
    {
        name: "Same day delivery",
        imageUrl:
            "https://tailwindui.com/img/ecommerce/icons/icon-calendar-light.svg",
        description:
            "We offer a delivery service that has never been done before. Checkout today and receive your products within hours.",
    },
    {
        name: "All year discount",
        imageUrl:
            "https://tailwindui.com/img/ecommerce/icons/icon-gift-card-light.svg",
        description:
            'Looking for a deal? You can use the code "ALLYEAR" at checkout and get money off all year round.',
    },
    {
        name: "For the planet",
        imageUrl:
            "https://tailwindui.com/img/ecommerce/icons/icon-planet-light.svg",
        description:
            "We’ve pledged 1% of sales to the preservation and restoration of the natural environment.",
    },
];
const footerNavigation = {
    products: [
        { name: "Bags", href: "#" },
        { name: "Tees", href: "#" },
        { name: "Objects", href: "#" },
        { name: "Home Goods", href: "#" },
        { name: "Accessories", href: "#" },
    ],
    company: [
        { name: "Who we are", href: "#" },
        { name: "Sustainability", href: "#" },
        { name: "Press", href: "#" },
        { name: "Careers", href: "#" },
        { name: "Terms & Conditions", href: "#" },
        { name: "Privacy", href: "#" },
    ],
    customerService: [
        { name: "Contact", href: "#" },
        { name: "Shipping", href: "#" },
        { name: "Returns", href: "#" },
        { name: "Warranty", href: "#" },
        { name: "Secure Payments", href: "#" },
        { name: "FAQ", href: "#" },
        { name: "Find a store", href: "#" },
    ],
};

const open = ref(false);
</script>
