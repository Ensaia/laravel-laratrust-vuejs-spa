<template>
    <component :is="layout">
        <router-view />
    </component>
</template>

<script>
    import { computed, defineComponent } from 'vue';
    import { useRoute } from 'vue-router';

    export default defineComponent({
        name: 'AppLayout',
        setup() {
            const route = useRoute();
            const layout = computed(() => {
                const layout = route?.meta?.layout;
                if (layout) {
                    return `${layout}Layout`;
                }
                return 'div';
            });
            return {
                layout,
            };
        },
    });
</script>

<style scoped>

</style>
