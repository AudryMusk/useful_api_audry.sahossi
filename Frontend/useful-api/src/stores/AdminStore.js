import { defineStore } from 'pinia'
import axios from 'axios'
const BASE_URL = import.meta.env.VITE_URL;

export const useAdminStore = defineStore('admin', {
    persist: true,
    state: () => ({
        modules: [],
        success: null,
        error: null,
        token: null
    }),



    actions: {
        async fetchModules() {
            const token = localStorage.getItem('token')
            try {
                let response = await axios.get(`${BASE_URL}/modules`, {
                    headers: {
                        Authorization: `Bearer ${token}`,
                        'Accept': 'application/json'
                    }
                })

                this.modules = response.data
                this.success = response.data.message || `Modules imported`
            } catch (error) {
                this.error = error.response.data.message || 'Error during importation'
                throw error
            }
        },

        // async activateModule() {
        //     try {
        //         let response = await axios.post(`${BASE_URL}/login`, {
        //             'email': this.user.email,
        //             'password': this.user.password,
        //         })
        //         this.token = response.data.token
        //         localStorage.setItem('token', JSON.stringify(this.token))
        //         this.success = response.data.message || `You've been successfully logged in`
        //         router.push({ name: 'dashboard' });
        //     } catch (error) {
        //         this.error = error.response.data.message || 'Error during login'
        //         throw error
        //     }
        // }
    }
})