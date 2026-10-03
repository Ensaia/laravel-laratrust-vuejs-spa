<template>
<!--    <div class="row justify-content-center">-->
<!--        <div class="col-md-6">-->
<!--            <div class="card shadow-sm">-->
<!--                <div class="card-body">-->
<!--                    <div><span class="fs-3 fw-semibold">{{ __('التحقق من البريد الإلكتروني') }}</span></div>-->
<!--                    <div class="fs-4 fw-medium mt-2"> {{ __('يجب عليك تأكيد بريدك الإلكتروني حتى يسمح لك بالمواصلة')-->
<!--                        }}-->
<!--                    </div>-->
<!--                    <div class="fs-5 mt-2"> {!! str(-->
<!--                        __('بريدك الإلكتروني هو `:email`', ['email' => request()->user()->email])-->
<!--                        )->markdown() !!}-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="card-footer">-->
<!--                    <div class="d-flex justify-content-between">-->
<!--                        <div>-->
<!--                            <form method="post" action="{{ route('verification.send') }}">-->
<!--                                @csrf-->
<!--                                <div class="">-->
<!--                                    <button type="submit" name="submit" class="btn btn-dark">-->
<!--                                        <span>{{ __('إرسال رابط التحقق') }}</span>-->
<!--                                        <span><i class="fa-solid fa-paper-plane"></i></span>-->
<!--                                    </button>-->
<!--                                </div>-->
<!--                            </form>-->
<!--                        </div>-->
<!--                        <div>-->
<!--                            <form method="post" action="{{ route('logout') }}">-->
<!--                                @csrf-->
<!--                                <div>-->
<!--                                    <div class="">-->
<!--                                        <button type="submit" name="submit" class="btn btn-dark">-->
<!--                                            <span>{{ __('تسجيل الخروج') }}</span>-->
<!--                                            <span><i class="fa-solid fa-right-from-bracket"></i></span>-->
<!--                                        </button>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </form>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <div class="verify-email-container">
        <div class="card">
            <h2>التحقق من البريد الإلكتروني</h2>

            <p>
                يجب عليك تأكيد بريدك الإلكتروني حتى يسمح لك بالمواصلة
            </p>

            <!-- Dynamic feedback messages -->
            <div v-if="statusMessage" class="alert success">
                {{ statusMessage }}
            </div>

            <div v-if="errorMessage" class="alert error">
                {{ errorMessage }}
            </div>

            <div class="actions">
                <button
                        @click="resendVerificationEmail"
                        :disabled="isSubmitting"
                        class="btn-primary"
                >
                    {{ isSubmitting ? 'Sending...' : 'Resend Verification Email' }}
                </button>

                <button @click="handleLogout" class="btn-secondary">
                    Log Out
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
    defineOptions({
        name: "verifyEmail"
    })
    import {ref} from 'vue';
    import axios from 'axios';
    import {useRouter} from 'vue-router';

    const router = useRouter();
    const isSubmitting = ref(false);
    const statusMessage = ref('');
    const errorMessage = ref('');

    const resendVerificationEmail = async () => {
        isSubmitting.value = true;
        statusMessage.value = '';
        errorMessage.value = '';

        try {
            // Matches default Laravel Sanctum/Breeze endpoint
            const response = await axios.post('/api/email/verification-notification');

            if (response.data.status === 'verification-link-sent') {
                statusMessage.value = 'A new verification link has been sent to your email address.';
            } else {
                statusMessage.value = 'Verification link sent successfully!';
            }
        } catch (error) {
            if (error.response && error.response.status === 429) {
                errorMessage.value = 'Too many requests. Please wait before trying again.';
            } else {
                errorMessage.value = 'Something went wrong. Please try again later.';
            }
        } finally {
            isSubmitting.value = false;
        }
    };

    const handleLogout = async () => {
        try {
            await axios.post('/logout');
            // Clear your local auth state/tokens here if applicable
            router.push({name: 'Login'});
        } catch (error) {
            console.error('Logout failed:', error);
        }
    };
</script>

<style scoped>

</style>