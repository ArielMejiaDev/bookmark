<template>
    <Head title="Editors Log in" />

    <section class="flex flex-col md:flex-row h-screen items-center">

        <div class="bg-indigo-600 hidden lg:block w-full md:w-1/2 xl:w-2/3 h-screen">
            <img src="https://source.unsplash.com/random?desserts" alt="" class="w-full h-full object-cover">
        </div>

        <div class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 xl:w-1/3 h-screen px-6 lg:px-16 xl:px-12
        flex items-center justify-center">

            <div class="w-full h-100">

                <h1 class="text-xl md:text-2xl lg:text-4xl font-bold leading-tight mt-12">Editors Log in</h1>

                <form @submit.prevent="submit" class="mt-6">

                    <BreezeValidationErrors class="mb-4" />

                    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                        {{ status }}
                    </div>

<!--                    <div>-->
<!--                        <label class="block text-gray-700" for="email">Email Address</label>-->
<!--                        <input type="email" v-model="form.email" name="email" id="email" placeholder="Enter Email Address" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" autofocus required autocomplete="username" />-->
<!--                    </div>-->

                    <div class="mt-4">
                        <label class="block text-gray-700" for="password">Password</label>
                        <input type="password" v-model="form.password" name="password" id="password" placeholder="Enter Password" minlength="6" class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none" required>
                    </div>

                    <div class="text-right mt-2">
                        <a href="#" class="text-sm font-semibold text-gray-700 hover:text-blue-700 focus:text-blue-700">Forgot Password?</a>
                    </div>

                    <button type="submit" class="w-full block bg-indigo-500 hover:bg-indigo-400 focus:bg-indigo-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">Log In</button>
                </form>

                <hr class="my-6 border-gray-300 w-full">

<!--                <p class="mt-8">Need an account?-->
<!--                    <a href="#" class="text-blue-500 hover:text-blue-700 font-semibold">Create an account</a>-->
<!--                </p>-->


            </div>
        </div>

    </section>

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
                id: null,
                password: '',
                remember: false
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('editors.login.store'), {
                onFinish: () => this.form.reset('password'),
            })
        }
    },

    created() {
        const urlParams = new URLSearchParams(window.location.search);
        this.form.id = urlParams.get('id');
    }
}
</script>
