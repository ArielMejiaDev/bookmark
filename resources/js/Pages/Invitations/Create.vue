<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Invite a user
            </h2>
        </template>

        <Container>
            <form @submit.prevent="submit">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Invite a user</h3>
                            <p class="mt-1 text-sm text-gray-500">The user would get an email to get notified.</p>
                        </div>

                        <div class="grid grid-cols-12 gap-6">
                            <div class="col-span-12 sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input v-model="form.name" type="text" name="name" id="name" autocomplete="false" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <p v-if="errors.name" class="my-1 text-xs text-red-500">{{ errors.name }}</p>
                            </div>

                            <div class="col-span-12 sm:col-span-6">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                                <input v-model="form.email" type="email" name="email" id="email-address" autocomplete="false" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <p v-if="errors.email" class="my-1 text-xs text-red-500">{{ errors.email }}</p>
                            </div>
                        </div>

                        <div>
                            <div class="col-span-12 sm:col-span-3">
                                <label for="roles" class="block text-sm font-medium text-gray-700">Role</label>
                                <select v-model="form.role_id" id="roles" name="roles" autocomplete="roles" class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option v-for="({id, description}, index) in roles" :key="index" :value="id">{{ description }}</option>
                                </select>
                                <p v-if="errors.role_id" class="my-1 text-xs text-red-500">{{ errors.role_id }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
import { Head } from '@inertiajs/inertia-vue3';
import Container from "@/Components/Container";

export default {
    components: {
        Container,
        BreezeAuthenticatedLayout,
        Head,
    },

    data() {
        return {
            form: this.$inertia.form({
                name: null,
                email: null,
                role_id: 1,
            })
        }
    },

    props: {
        roles: Object | Array,
        errors: Object,
    },

    methods: {
        submit() {
            this.form.post(this.route('invitations.store'), this.form)
        }
    }
}
</script>
