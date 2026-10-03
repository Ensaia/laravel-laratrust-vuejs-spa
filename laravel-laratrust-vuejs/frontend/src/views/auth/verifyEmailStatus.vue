<template>
    <div class="col-md-12 py-5">
    <div class="processing-container">
        <h2>{{ statusMessage }}</h2>
    </div>
    </div>
</template>

<script setup>
    import { onMounted, ref } from 'vue';
    import {useAuthStore} from "@/stores";
    import router from '@/router'

    defineOptions({name : 'verifyEmailStatus'})

    const props = defineProps({
        id:{
            type: String
        },
        hash:{
            type: String
        }
    })

    const statusMessage = ref('Verifying your email, please wait...');
    const authStore = useAuthStore();

    onMounted(async () => {
        const queryParams = window.location.search;
        // try {
            // Send payload directly back to Fortify's internal route execution schema
            await authStore.emailVerification(props.id,props.hash,queryParams)
            statusMessage.value = 'Email successfully verified! Redirecting...';
        //
        //     setTimeout(() => {
        //         router.push({ name: 'dashboard' });
        //     }, 2500);
        // } catch (error) {
        //     statusMessage.value = 'Verification failed or link expired.';
        // }
    });
    // let count = 10;
    // const display = document.getElementById("countdown");
    //
    // function runCounter() {
    //     display.textContent = count;
    //     if (count > 0) {
    //         count--;
    //         setTimeout(runCounter, 1000);
    //     } else {
    //         display.textContent = "Done!";
    //     }
    // }
    //
    // runCounter();
    /*
    http://localhost:3000/email/verify/13/2af6d4a2d07b66b8eb2b69b804a3ae4f30c8d608?expires=1785163265&signature=92c24ef3ad6f635dfd1c46cfad71341f3529a373679c914468bdac9c72e74ff3
     */
</script>
