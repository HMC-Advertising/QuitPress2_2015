 'use strict';
module.exports = function (grunt){
	require("time-grunt")(grunt);
	require('load-grunt-tasks')(grunt);
	require("rsyncwrapper").rsync;

	 //loading grunt tasks
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-compass');
	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.loadNpmTasks('grunt-notify');
	grunt.loadNpmTasks('grunt-bower-task');
	grunt.loadNpmTasks('grunt-rsync');
   	grunt.loadNpmTasks('grunt-jade-php');
   	grunt.loadNpmTasks('grunt-contrib-coffee');

 //grunt options
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		//package optionsgrunt 
		jadephp: {
		  compile: {
			options: {
			  pretty: true
			},
			files:[{
			  expand: true,
			  cwd: 'assets/jade',
			  src: ['**/*.jade'],
			  dest: './',
			  ext: '.php'
			}]
		  }
		},
		coffee:{ 
			glob_to_multiple: {
				expand: true,
				bare: true,
				flatten: false,
				cwd: 'assets/script/coffee/',
				src: ['*.coffee'],
				dest: 'assets/script/build',
				ext: '.js'
			}
		},
		compass: {
			dev: {
				options: {
					sassDir: 'assets/style/sass',
					cssDir: './',
					fontsDir: 'assets/fonts',
					javascriptsDir: 'assets/script',
					imagesDir: 'assets/img',
					force:true,
					relativeAssets: true,
				}
			}
		},
	   jshint:{
			files: ['assets/script/*.js'],
			options: {
				globals: {
					jQuery: true
				}
			}
		},
		concat: {
			dev: {
				src: ['assets/script/build/*.js' ],
				dest: 'assets/script/dev/script.js'
			  }
		 },
		uglify: {
				target: {
					src: '<%= concat.dev.dest %>',
					dest: 'assets/script/main.min.js'
				}
		  },
		imagemin: {
				dist: {
					options: {
						optimizationLevel: 5
					},
					files: [{
						expand: true,
						cwd: 'assets/img',
						src: ['**/*.{png,jpg,gif}'],
						dest: '../QT2015_production/assets/img'
					}]
				}
		  },

		watch: {
			options: {
				livereload: {
					port:8000

				},
				spawn: false
			},
			
			compass: {
				files: ['assets/style/sass/{,*/}*.{scss,sass}'],
				tasks: ['compass:dev']
			},
			
			jadephp:{
				files:['assets/jade/**/*.jade'],
				tasks: ['jadephp']
			},
			
			coffee:{
				files:["assets/js/coffee/**/*.coffee"],
				tasks: ['coffee']
			},
			concat: {
				files: ['assets/script/build/*.js' ],
				tasks: ['concat:dev']
			}  	
		},
		rsync: {
			options: {
				args: ["--verbose"],
				exclude: [".git*","*.scss","node_modules",".bowerrc", "bower.json", "livereload.js", "Gruntfile.js", ".sass-cache", 'src', 'Main', 'bootstrap/grunt','bootstrap/js','bootstrap/less','bootstrap/fonts' ,'pro', 'build', 'sass/_bootstrapSass', 'sass/_partials' ,'sass/style.scss', 'sass/download-monitor.html.zip' ,'sass/img.zip' ,'package.js', 'LICENSE' ,'package.json', 'js/script.js', 'designs', '.DS_Store','assets/jade', 'config.rb', 'assets/script/build', 'assets/script/dev','assets/style', 'js/coffee'],
				recursive: true
			},
			dist: {
				options: {
					src: "./",
					dest: "../QT2015_production/"
				}
			},
			stage: {
				options: {
					src: "../QT2015_production/",
					dest: "/var/www/site",
					host: "user@staging-host",
					// delete: true // Careful this option could cause data loss, read the docs!
				}
			},
			prod: {
				options: {
					src: "../QT2015_production/",
					dest: "/var/www/site",
					host: "user@live-host",
					//delete: true // Careful this option could cause data loss, read the docs!
				}
			}
		}
	});



	//register tasks here


	grunt.registerTask('go', ['watch', 'compass:dev', 'coffee', 'jadephp', 'concat:dev' ]);

	grunt.registerTask('build-pro', [ 'imagemin' , 'rsync:dist']);

	grunt.registerTask('pro', [  'rsync:dist']);

	grunt.registerTask('ug', [  'concat', 'uglify']);



}