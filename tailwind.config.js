import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
	content: [
		'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
		'./storage/framework/views/*.php',
		'./resources/views/**/*.blade.php',
		'./public/preline/dist/*.js',
	],

	theme: {
		extend: {
			fontFamily: {
				sans: ['Nunito Sans', ...defaultTheme.fontFamily.sans],
			},
			colors: {
				'blue-green': '#03989E'
			}
		},
	},

	plugins: [
		forms,
		require('preline/plugin')
	],
	darkMode: 'false',
};