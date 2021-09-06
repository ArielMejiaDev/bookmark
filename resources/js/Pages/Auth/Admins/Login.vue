<template>
    <Head title="Admins Log in" />

    <div class="py-6 h-screen bg-gray-200 flex items-center justify-center">
        <div class="bg-gray-200 h-screen w-screen">
            <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
                <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" style="height: 500px">
                    <div class="hidden md:block md:w-1/2 rounded-l-lg" style="background: url('https://source.unsplash.com/random?desserts'); background-size: cover; background-position: center center;"></div>
                    <div class="flex flex-col w-full md:w-1/2 p-4">
                        <div class="flex flex-col flex-1 justify-center mb-8">
                            <h2 class="text-2xl tracking-tighter font-bold text-center text-gray-700 dark:text-white">Admin Login</h2>
                            <div class="w-full mt-4">

                                <form @submit.prevent="submit" class="form-horizontal w-3/4 mx-auto">

                                    <BreezeValidationErrors class="mb-4" />

                                    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                                        {{ status }}
                                    </div>

                                    <div class="mt-4">
                                        <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="email">Email Address</label>
                                        <input v-model="form.email" id="email" type="email" required autofocus autocomplete="username" class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring focus:ring-blue-200">
                                    </div>

                                    <div class="mt-4">
                                        <div class="flex justify-between">
                                            <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="password">Password</label>
                                            <Link v-if="canResetPassword" :href="route('password.request')" href="#" class="text-xs text-gray-500 dark:text-gray-300 hover:underline">Forget Password?</Link>
                                        </div>

                                        <input v-model="form.password" id="password" required class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring focus:ring-blue-200" type="password">
                                    </div>

                                    <div class="block mt-4">
                                        <label class="flex items-center">
                                            <BreezeCheckbox name="remember" v-model:checked="form.remember" />
                                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                                        </label>
                                    </div>

                                    <div class="mt-8">
                                        <button :class="{ 'opacity-25': form.processing }" :disabled="form.processing" class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-gray-800 rounded hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeCheckbox from '@/Components/Checkbox.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeButton,
        BreezeCheckbox,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        Head,
        Link,
    },

    props: {
        canResetPassword: Boolean,
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: 'admin@mail.com',
                password: 'password',
                remember: false
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('admins.login.store'), {
                onFinish: () => this.form.reset('password'),
            })
        }
    }
}
</script>
