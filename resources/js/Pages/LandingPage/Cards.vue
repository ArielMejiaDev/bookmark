<template>
    <div class="w-full lg:w-2/3">

        <div v-for="(recipe, index) in recipes" :key="index" class="rounded w-full lg:flex mb-10">
            <div class="h-48 lg:w-48 flex-none bg-cover text-center overflow-hidden opacity-75" :style="`background-image: url('${recipe.thumbnail}')`"></div>
            <div class="bg-white rounded px-4 flex flex-col justify-between leading-normal">
                <div>
                    <Link :href="route('recipes.public.show', recipe.id)" class="mt-3 md:mt-0 text-gray-700 font-bold text-2xl mb-2">{{ recipe.title }}</Link>
                    <p class="text-gray-700 text-base">{{ excerpt(recipe.content) }}</p>
                </div>
                <div class="flex mt-3">
                    <img src="https://randomuser.me/api/portraits/men/86.jpg" class="h-10 w-10 rounded-full mr-2 object-cover" />
                    <div>
                        <p class="font-semibold text-gray-700 text-sm capitalize">{{ recipe.author.name }}</p>
                        <p class="text-gray-600 text-xs">{{ recipe.published_at }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";

export default {
    name: "Cards",

    components: {
      Link,
    },

    props: {
      recipes: Array | Object,
    },

    methods: {

      excerpt(text) {
        return text.substring(0,200) + "...";
      }

    }
}
</script>
