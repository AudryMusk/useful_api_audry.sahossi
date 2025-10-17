<template>
    <div class="min-h-screen flex justify-center">
        <div class="bg-white rounded-xl p-8 max-w-md w-full shadow-2xl my-15">
            <h2 class="text-2xl font-bold text-center text-indigo-800 mb-8">Create an Account</h2>
            <form @submit.prevent="authStore.register" method="POST" class="space-y-6">
                <div v-if="authStore.error" class="mb-5 text-red-400">
                    <span class="font-medium">{{ authStore.error }}</span>
                </div>
                <div v-if="authStore.success" class="mb-5 text-green-400">
                    <span class="font-medium">{{ authStore.success }}</span>
                </div>
                <div>
                    <label for="username" class="block text-indigo-900 font-semibold mb-2">Name</label>
                    <input v-model="user.name" type="text" name="name" id="username"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-800 transition-all duration-300"
                        placeholder="Enter your username" required>
                    <p class="text-red-500 text-sm mt-2 hidden" id="usernameError">Username is required.</p>
                </div>

                <div>
                    <label for="email" class="block text-indigo-900 font-semibold mb-2">Email</label>
                    <input v-model="user.email" type="email" name="email" id="email"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-800 transition-all duration-300"
                        placeholder="Enter your email" required>
                    <p class="text-red-500 text-sm mt-2 hidden" id="emailError">Please enter a valid email.</p>
                </div>

                <div>
                    <label for="password" class="block text-indigo-900 font-semibold mb-2">Password</label>
                    <input v-model="user.password" type="password" name="password" id="password"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-800 transition-all duration-300"
                        placeholder="Enter your password" required>
                    <p class="text-red-500 text-sm mt-2 hidden" id="passwordError">Password is required.</p>
                </div>

                <div>
                    <label for="confirm-password" class="block text-indigo-900 font-semibold mb-2">Confirm
                        Password</label>
                    <input v-model="user.password_confirmation" type="password" name="password_confirmation"
                        id="confirm-password"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-800 transition-all duration-300"
                        placeholder="Confirm your password" required>
                </div>
                <button type="submit"
                    class="w-full bg-indigo-800 text-white py-3 rounded-lg font-semibold hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-800 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02]">
                    Register
                </button>
            </form>

            <p class="text-center text-gray-600 mt-6">
                Already have an account?
                <router-link to="/login">
                    <a class="text-indigo-800 font-semibold hover:text-blue-900 transition-colors duration-300">Sign
                        In</a>
                </router-link>
            </p>
        </div>
    </div>
</template>

<script setup>
import { useAuthStore } from '@/stores/AuthStore';
import { storeToRefs } from 'pinia';


const authStore = useAuthStore()

const { user } = storeToRefs(authStore)

</script>

<style lang="scss" scoped></style>