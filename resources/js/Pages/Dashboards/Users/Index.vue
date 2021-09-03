<template>
    <Head title="Admins Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users Dashboard
            </h2>
        </template>

        <Container transparent="true">
            <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Last 30 days
            </h3>
            <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-1">
                <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                    <dt class="text-sm font-medium text-gray-500 truncate">Your saved bookmarks</dt>
                    <dd class="mt-1 text-3xl font-semibold text-gray-900">{{ savedBookmarks }}</dd>
                </div>
            </dl>
        </div>
        </Container>

    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import Container from "@/Components/Container";

export default {
    name: 'AdminsDashboardIndex',

    components: {
        Container,
        BreezeAuthenticatedLayout,
        Head,
    },

    props: {
        savedBookmarks: Number,
    }
}
</script>
