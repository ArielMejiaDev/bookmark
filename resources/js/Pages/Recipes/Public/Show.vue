<template>
    <!-- component -->
    <div class="flex flex-wrap md items-center h-screen">
        <div class="bg-white w-full md:w-1/2 h-screen">
            <div class="mx-32">
                <h1 class="text-6xl font-bold mt-16">{{ recipe.title }}</h1>

                <div class="flex mt-16 font-light text-gray-500">
                    <div class="pr-4">
                        <span class="uppercase">Author</span>
                        <p class="text-2xl text-gray-900 font-semibold pt-2">{{ recipe.author.name }}</p>
                    </div>
                </div>

                <div class="description w-full sm: md:w-2/3 mt-16 text-gray-500 text-sm">{{ recipe.content }}</div>

                <Link :href="route('home')" class="block uppercase mt-5 text-sm font-semibold hover:underline">Back</Link>
            </div>
        </div>

        <div class="bg-red-600 w-full md:w-1/2 h-screen">
            <img :src="recipe.thumbnail" class="h-screen w-full" :alt="`${recipe.thumbnail} image`" />
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    name: "Show",

    components: {
        Link,
    },

    props: {
        recipe: Object,
    },
}
</script>
