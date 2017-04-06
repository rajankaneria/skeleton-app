/**
 * Grunt Tasks
 */
module.exports = function (grunt) {

    grunt.initConfig({
        run: {
            composer_update: {
                exec: 'php composer.phar self-update; php composer.phar update'
            },
            update_schema: {
                exec: './vendor/bin/doctrine-module orm:schema-tool:update --complete --force'
            },
            validate_schema: {
                exec: './vendor/bin/doctrine-module orm:validate-schema'
            },
            orm_info: {
                exec: 'php public/index.php orm:info'
            }
        }
    });

    grunt.registerTask('default', 'Log some stuff', function () {
        grunt.log.write('logged some stuff...').ok();
    });

    grunt.loadNpmTasks('grunt-run');

};
