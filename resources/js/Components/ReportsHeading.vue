<template>
    <div class="pb-5 border-b border-gray-200 sm:pb-0">
        <h3 v-if="title" class="text-lg leading-6 font-medium text-gray-900">
            {{ title }}
        </h3>
        <div class="mt-3 sm:mt-4">
            <!-- Dropdown menu on small screens -->
            <div class="sm:hidden">
                <label for="current-tab" class="sr-only">Select a tab</label>
                <select id="current-tab" name="current-tab" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option selected>Admins</option>

                    <option>Editors</option>

                    <option>Users</option>
                </select>
            </div>
            <!-- Tabs at small breakpoint and up -->
            <div class="hidden sm:block">
                <nav class="-mb-px flex space-x-8">
                    <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->

                    <Link :href="route('reports.admins.index')" :class="{'border-indigo-500 text-indigo-600 hover:border-indigo-500 hover:text-indigo-600': route().current('reports.admins.index')}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm" aria-current="page">
                         Admins
                    </Link>

                    <Link :href="route('reports.editors.index')" :class="{'border-indigo-500 text-indigo-600 hover:border-indigo-500 hover:text-indigo-600': route().current('reports.editors.index')}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm">
                        Editors
                    </Link>

                    <Link :href="route('reports.users.index')" :class="{'border-indigo-500 text-indigo-600 hover:border-indigo-500 hover:text-indigo-600': route().current('reports.users.index')}" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm">
                        Guests
                    </Link>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    name: "ReportsHeading",
    components: {
        Link,
    },
    props: ['title']
}
</script>
