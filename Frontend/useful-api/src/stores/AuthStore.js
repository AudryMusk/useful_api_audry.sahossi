import { defineStore } from 'pinia'
import axios from 'axios'
import router from '@/router';
import LoginView from '@/views/LoginView.vue';
const BASE_URL = import.meta.env.VITE_URL;

export const useAuthStore = defineStore('auth', {
    persist: true,
    state: () => ({
        user: {
            name: '',
            email: '',
            password: '',
            password_confirmation: ''
        },
        success: null,
        error: null,
        token: null
    }),



    actions: {
        async register() {
            try {
                let response = await axios.post(`${BASE_URL}/register`, {
                    'name': this.user.name,
                    'email': this.user.email,
                    'password': this.user.password,
                    'password_confirmation': this.user.password_confirmation
                })
                this.success = response.data.message || `You've been successfully registered`
                router.push({ name: 'login' });
            } catch (error) {
                this.error = error.response.data.message || 'Error during registration'
                throw error
            }
        },
        async login() {
            try {
                let response = await axios.post(`${BASE_URL}/login`, {
                    'email': this.user.email,
                    'password': this.user.password,
                })
                this.token = response.data.token
                localStorage.setItem('token', JSON.stringify(this.token))
                this.success = response.data.message || `You've been successfully logged in`
                router.push({ name: 'dashboard' });
            } catch (error) {
                this.error = error.response.data.message || 'Error during login'
                throw error
            }
        }
    }
})