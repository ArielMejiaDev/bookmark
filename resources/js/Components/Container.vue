<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div :class="{'bg-white overflow-hidden shadow-sm sm:rounded-lg': !transparent}">
                <div :class="{'p-6': withPadding}">
                    <slot></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Container",
    props: [
        'withPadding',
        'transparent',
    ]
}
</script>

