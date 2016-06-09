module.exports = function (grunt) { // obalovací funkce
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'), // cesta ke konfiguračnímu package.json
        // kompilace LESS souboru
        less: { // název úlohy a její nastavení
            dev: {
                files: {
                    "www/css/style.css": ["www/less/style.less" ]
                }
            }
        },
        // sledování změn ve všech LESS souborech
    watch: {
        files: ['./**/*.less'],
        tasks: ['less']
    }
    });
 
    grunt.loadNpmTasks('grunt-contrib-less'); // chci načíst balíček grunt-contrib-less
    grunt.loadNpmTasks('grunt-contrib-watch'); // sledování změn
 
    grunt.registerTask('default', ['less']); // registrace defaultní úlohy
};