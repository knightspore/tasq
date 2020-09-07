module.exports = {
  purge: [
    './resources/js/components/**/*.vue',
  ],
  theme: {
    extend: {},
    fontFamily: {
        'sans': ['Sora', 'sans-serif']
    }
  },
  variants: {},
  plugins: [],
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
}
