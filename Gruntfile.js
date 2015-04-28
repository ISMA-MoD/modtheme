module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),


		/**
		 * Autoprefixer
		 */
		autoprefixer: {
		    options: {
	      		browsers: ['last 4 versions']
		    },
			// prefix all files
			single_file: {
				src: 'style-pre.css', 
				dest: 'style.css' 
			},
	  	},


	  	/**
	  	 * Watch
	  	 */
		watch: {
			css: {
				files: 'style-pre.css',
				tasks: ['autoprefixer']
			}
		},

	});
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.registerTask('default',['watch']);
}