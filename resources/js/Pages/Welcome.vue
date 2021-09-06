<template>
    <Head title="Welcome" />

    <!-- component -->
    <div class="max-w-screen-xl mx-auto">

        <Header :can-login="canLogin" :can-register="canRegister" />

        <main class="mt-10">

            <Hero :popular-recipes="popularRecipes" />

            <div class="block lg:flex lg:space-x-2 px-2 lg:p-0 mt-10 mb-10">
                <Cards :recipes="recipes" />

                <RightSidebar />

            </div>
        </main>

        <Footer />
    </div>

</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import Links from "@/Pages/LandingPage/Links";
import Footer from "@/Pages/LandingPage/Footer";
import Hero from "@/Pages/LandingPage/Hero";
import RightSidebar from "@/Pages/LandingPage/RightSidebar";
import Cards from "@/Pages/LandingPage/Cards";
import Header from "@/Pages/LandingPage/Header";

export default {
    components: {
        Cards,
        RightSidebar,
        Head,
        Header,
        Hero,
        Links,
        Footer,
    },

    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        popularRecipes: Object | Array,
        recipes: Object | Array,
    },
}
</script>
