import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import path from 'path'

export default defineConfig({
  plugins: [
    laravel([
      'resources/scripts/app.js',
    ]),
  ],
  resolve: {
    alias: {
      '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
      '~datepicker': path.resolve(__dirname, 'node_modules/vanillajs-datepicker')
    }
  },
})
