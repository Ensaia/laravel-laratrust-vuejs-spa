import { defineStore } from 'pinia';
import { useRouter } from 'vue-router';
import { authService } from '@/services/authService';
import { messages } from '@/helpers/messages';
import router from '@/router'
import Swal from "sweetalert2";
// const router = useRouter();



export const useAuthStore = defineStore('auth', {
  state: () =>    JSON.parse(localStorage.getItem('authState')) ?? {
      user: null,
      isLoggedIn: false,
      errors: [],
      loginErrors: [],
      loginErrorsMessages: [],
      registrationErrors: [],
      registrationErrorsMessages: [],
      message: [],
  },
  // state: () => {
  //     return   {
  //         user: null,
  //         isLoggedIn: false,
  //         errors: [],
  //         loginErrors: [],
  //         loginErrorsMessages: [],
  //         registrationErrors: [],
  //         registrationErrorsMessages: [],
  //         message: [],
  //     }
  // },
  actions: {
    updateStateFromLocalStorage(payload) {
     let newAuthState = {...this.$state,...payload}
     localStorage.removeItem('authState')
     localStorage.setItem('authState', JSON.stringify(newAuthState))
     this.$reset()
    },
    async login(payload) {
      try{
        const response = await authService.login(payload)
        // this.isLoggedIn = true
        await this.getCurrentUser()
        this.updateStateFromLocalStorage({isLoggedIn: true})
        await router.push({name: 'dashboard'})
      }catch(error){
        if(error.response && error.response.status === 422) {
          this.loginErrors = error.response.data.errors
          this.loginErrorsMessages = error.response.data.message
        }else{
          this.errors = { general: [error.response.data.message] }
        }
      }
    },
    async register(payload) {
      try{
       await authService.register(payload).then((response) => {
            if (response.status == 201) {
                Swal.fire({
                    toast: true,
                    icon: 'success',
                    title: messages.REGISTER_SUCCESS,
                    animation: false,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    width: '620px',
                    timerProgressBar: true,
                })
            }
        });
        this.updateStateFromLocalStorage({isLoggedIn: true})
        // this.isLoggedIn = true
        // await router.push({name: 'dashboard'})
      }catch(error){
         if (error.response && error.response.status === 422) {
          this.registrationErrors = error.response.data.errors;
          this.registrationErrorsMessages = error.response.data.message;
        } else {
          console.error("An unexpected error occurred:", error);
        }
      }
    },
    async getCurrentUser() {
       try{
        const response = await authService.getCurrentUser()
        this.user = response.data.data
        this.setBrowserData()
      }catch(error){
        console.error(error)
      }
    },
    async logout() {
      localStorage.clear()
      this.$reset()
      try {
        const response = await authService.logout()
        await router.push({name: 'login'})
      } catch (error) {
        console.error(error);
      } 
    },
    async forgotPassword(payload) {
      try {
         await authService.forgotPassword(payload).then((response) => {
            if (response.status == 200) {
                Swal.fire({
                    toast: true,
                    icon: 'success',
                    title: response.data.message,
                    animation: false,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    width: '590px',
                    timerProgressBar: true,
                })
            }
        });
      } catch (error) {
          if(error.response) {
              if(error.response.status === 422) {
                  this.errors = error.response.data.errors
              }
          }else if (error.request) {
              console.error('No response received:', error.request)
          } else {
              console.error('Error:', error.message)
          }
      }
    },
      async resetPassword(payload) {
      try {
         await authService.resetPassword(payload).then((response) => {
            if (response.status == 200) {
                Swal.fire({
                    toast: true,
                    icon: 'success',
                    title: response.data.message,
                    animation: false,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    width: '590px',
                    timerProgressBar: true,
                })
            }
            router.push({name: 'login'})
        });
      } catch (error) {
          if(error.response) {
              if(error.response.status === 422) {
                  this.errors = error.response.data.errors
              }
          }else if (error.request) {
              console.error('No response received:', error.request)
          } else {
              console.error('Error:', error.message)
          }
      }
    },
      async emailVerification(id,hash,queryParams) {
      try {
         await authService.emailVerification(id,hash,queryParams).then((response) => {
             console.log("response" + response)
         })
        //      .then((response) => {
        //     if (response.status == 200) {
        //         Swal.fire({
        //             toast: true,
        //             icon: 'success',
        //             title: response.data.message,
        //             animation: false,
        //             position: 'top-end',
        //             showConfirmButton: false,
        //             timer: 3000,
        //             width: '590px',
        //             timerProgressBar: true,
        //         })
        //     }
        //     router.push({name: 'login'})
        // });
      } catch (error) {
          if(error.response) {
              if(error.response.status === 422) {
                  this.errors = error.response.data.errors
              }
          }else if (error.request) {
              console.error('No response received:', error.request)
          } else {
              console.error('Error:', error.message)
          }
      }
    },
     hasBrowserData() {
      let data = window.localStorage.getItem('currentUser');
      return !!data;
    },
    setBrowserData() {
      window.localStorage.setItem('currentUser', JSON.stringify(this.user))
    },
    clearBrowserData() {
      window.localStorage.removeItem('currentUser');
    },
  },
  getters: {
    isAuthenticated: (state) => !!state.user && state.isLoggedIn,
    name: (state) => (state.user ? state.user.name : 'ضيف'),
    email: (state) => (state.user ? state.user.email : 'لا يوجد بريد إلكتروني'),
  },
});

/*
   JSON.parse(localStorage.getItem('authState')) ?? {
      user: null,
      isLoggedIn: false,
      errors: [],
      loginErrors: [],
      loginErrorsMessages: [],
      registrationErrors: [],
      registrationErrorsMessages: [],
      message: [],
  },
 */