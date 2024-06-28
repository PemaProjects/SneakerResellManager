// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: true },
  modules: [
    "@nuxtjs/tailwindcss",
    '@pinia/nuxt',
    '@pinia-plugin-persistedstate/nuxt',
  ],
  auth: {
    strategies: {
      laravelSocialite: {
        provider: 'laravel/socialite',
        url: 'http://localhost:8000',
        endpoints: {
          redirect: 'http://localhost:3000/login',
          callback: 'http://localhost:3000/auth/callback',
          user: 'http://localhost:8000/api/user'
        },
        token: {
          property: 'access_token',
          required: true,
          type: 'Bearer'
        },
        user: {
          property: 'data',
          autoFetch: true
        }
      }
    }
  }
})

