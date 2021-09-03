<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Recipes
            </h2>
        </template>

        <Container>

            <form @submit.prevent="submit">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-6">
                                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                <input v-model="form.title" type="text" name="title" id="title" required autofocus class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6">
                                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                                <textarea v-model="form.content" name="content" id="content" cols="30" rows="10" style="resize: none" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>
                </div>
            </form>


        </Container>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import Container from "@/Components/Container";

export default {
    components: {
        Container,
        BreezeAuthenticatedLayout,
        Head,
        Link,
    },

    data() {
        return {
            form: this.$inertia.form({
                title: this.recipe.title,
                content: this.recipe.content,
            })
        }
    },

    props: {
        recipe: Object | Array
    },

    methods: {
        submit() {
            this.form.put(this.route('manage.recipes.update', this.recipe.id), this.form)
        }
    },
}
</script>
