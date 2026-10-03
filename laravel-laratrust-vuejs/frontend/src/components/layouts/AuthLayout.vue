<template>
    <main class="container-fluid bg-transparent">
        <div class="row no-gutter">
            <div class="col-md-6 d-none d-md-flex bg-image"></div>
            <div class="col-md-6 bg-light">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto bg-transparent">
                                <slot></slot>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
    name: "AuthLayout",
    setup() {
        let AppConfig = window.AppConfig;
        return {
            AppConfig,
        };
    },
});
</script>
<style>
.login,
.image {
    min-height: 100vh;
}

.bg-image {
    background-image: url("@/assets/images/auth.png");
    background-size: cover;
    background-position: center center;
}
</style>
