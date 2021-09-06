<template>
    <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">

        <Link v-if="$page.props.auth.user" :href="route(dashboardLink)" class="text-sm text-gray-700 underline">
            Dashboard
        </Link>

        <template v-else>
            <Link :href="route('admins.login.create')" class="text-sm text-gray-700 underline">
                Admin Log in
            </Link>

            <Link :href="route('editors.login.create')" class="ml-4 text-sm text-gray-700 underline">
                Editors Log in
            </Link>

            <Link :href="route('login')" class="ml-4 text-sm text-gray-700 underline">
                Log in
            </Link>

            <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                Register
            </Link>
        </template>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Head,
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
