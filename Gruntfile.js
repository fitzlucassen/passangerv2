module.exports = function(grunt) {

    // Je préfère définir mes imports tout en haut
    grunt.loadNpmTasks('grunt-contrib-sass')
    grunt.loadNpmTasks('grunt-contrib-concat')
    grunt.loadNpmTasks('grunt-contrib-watch')

    var jsSrc = ['Website/Content/Js/home.js', 'Website/Content/Js/Base/*.js']
    var jsDist = 'Website/Content/Js/_built.js'

    // Configuration de Grunt
    grunt.initConfig({
        sass: {
            dist: {
                options: {
                    style: 'compressed',
                    compass: true
                },
                files: {
                    "Website/Content/Css/main.css": "Website/Content/Sass/main.scss",
                }
            },
            dev: {} // A vous de le faire ! vous verrez que certaines options Sass sont plus intéressantes en mode dev que d'autres.
        },
        concat: {
            options: {
                separator: ';'
            },
            compile: { // On renomme vu qu'on a pas de mode dev/dist. Dist étant une autre tâche : uglify
                src: jsSrc, // Vu qu'on doit l'utiliser deux fois, autant en faire une variable.
                dest: jsDist // Il existe des hacks plus intéressants mais ce n'est pas le sujet du post.
            }
        },
        uglify: {
            options: {
                separator: ';'
            },
            compile: {
                src: jsSrc,
                dest: jsDist
            }
        },
        watch: {
            scripts: {
                files: '**/*.js',
                tasks: ['scripts:dev']
            },
            styles: {
                files: '**/*.scss',
                tasks: ['sass']
            }
        }
    })

    grunt.registerTask('default', ['dev', 'watch'])
    grunt.registerTask('dev', ['styles:dev', 'scripts:dev'])
    grunt.registerTask('dist', ['styles:dist', 'scripts:dist'])

    // J'aime bien avoir des noms génériques
    grunt.registerTask('scripts:dev', ['concat:compile'])
    grunt.registerTask('scripts:dist', ['uglify:compile'])

    grunt.registerTask('styles:dev', ['sass:dev'])
    grunt.registerTask('styles:dist', ['sass:dist'])
}