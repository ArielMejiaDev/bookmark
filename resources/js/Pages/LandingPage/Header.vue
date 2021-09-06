<template>
    <header class="flex items-center justify-between py-2 border-b">
        <a href="#" class="px-2 lg:px-0 uppercase font-bold text-purple-800">
            Bookmark
        </a>
        <ul class="inline-flex items-center">
            <li class="px-2 md:px-4">
                <Link v-if="$page.props.auth.user" :href="route(dashboardLink)" href="" class="text-purple-600 font-semibold hover:text-purple-500"> Home </Link>
            </li>
            <template v-if="canLogin">

                <li class="px-2 md:px-4 hidden md:block">
                    <Link :href="route('login')" class="text-gray-500 font-semibold hover:text-purple-500"> Login </Link>
                </li>
                <li class="px-2 md:px-4 hidden md:block">
                    <Link v-if="canRegister" :href="route('register')" class="text-gray-500 font-semibold hover:text-purple-500"> Register </Link>
                </li>
                <li class="px-2 md:px-4 hidden md:block">
                    <Link :href="route('editors.login.create')" class="text-gray-500 font-semibold hover:text-purple-500"> Are you an editor?</Link>
                </li>
                <li class="px-2 md:px-4 hidden md:block">
                    <Link :href="route('admins.login.create')" class="text-gray-500 font-semibold hover:text-purple-500"> Admin</Link>
                </li>
            </template>
        </ul>

    </header>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    name: "Header",

    components : {
        Link,
    },

    props: {
        canLogin: Boolean,
        canRegister: Boolean,
    },

    computed: {
        dashboardLink() {
            const routes = {
                'Admin': 'admins.dashboard',
                'Editor': 'editors.dashboard',
                'User': 'dashboard',
            }

            if (this.$page.props.auth.user) {
                return routes[this.$page.props.auth.user.role.description]
            }

            return 'dashboard'
        },
    }
}
</script>
