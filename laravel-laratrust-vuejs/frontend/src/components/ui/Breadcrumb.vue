<template>
    <nav class="breadcrumb">
        <ol>
            <li v-for="(crumb, index) in breadcrumbs" :key="index">
                <router-link :to="crumb">{{ crumb.name }}</router-link>
            </li>
        </ol>
    </nav>
</template>

<script>
    import { defineComponent, computed } from 'vue'
    import { useRoute } from 'vue-router'
    export default defineComponent({
        name: "Breadcrumb",
        components:{},
        props:{},
        setup(props,context){
            const route = useRoute()
            const breadcrumbs = computed(() => {
                const matchedRoutes = route.matched
                const breadcrumbs = [];
                matchedRoutes.forEach(route => {
                    if (route.meta && route.meta.breadcrumb) {
                        breadcrumbs.push({
                            name: route.meta.breadcrumb,
                            path: route.path
                        });
                    }
                });
                return breadcrumbs;
            })
            return{breadcrumbs}
        }
    })
</script>

<style scoped>

</style>
