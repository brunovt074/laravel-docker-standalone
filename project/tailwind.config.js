import preset from './vendor/filament/support/tailwind.config.preset'
module.exports = {
    purge: [],
    darkMode: false,
    theme: {
      extend: {},
    },
    variants: {},
    plugins: [],
  } 

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
}