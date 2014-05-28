module.exports = function(grunt) {
    grunt.initConfig({
        concat: {
            options: {
                separator: ';',
            },
            js_frontend: {
                src: [
                    './app/assets/javascript/plugins/pace/pace.min.js',
                    './bower_components/jquery/jquery.js',
                    './bower_components/jqueryui/ui/jquery-ui.js',
                    './bower_components/bootstrap/dist/js/bootstrap.js',
                    './app/assets/javascript/notification/SmartNotification.min.js',
                    './app/assets/javascript/smartwidgets/jarvis.widget.min.js',
                    './app/assets/javascript/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js',
                    './app/assets/javascript/plugin/sparkline/jquery.sparkline.min.js',
                    './app/assets/javascript/plugin/jquery-validate/jquery.validate.min.js',
                    './app/assets/javascript/plugin/masked-input/jquery.maskedinput.min.js',
                    './app/assets/javascript/plugin/select2/select2.min.js',
                    './app/assets/javascript/plugin/bootstrap-slider/bootstrap-slider.min.js',
                    './app/assets/javascript/plugin/msie-fix/jquery.mb.browser.min.js',
                    './app/assets/javascript/plugin/fastclick/fastclick.js',
                    './app/assets/javascript/app.js',
                    './app/assets/javascript/frontend.js'
                ],
                dest: './public/assets/javascript/frontend.js',
            },
            js_backend: {
                src: [
                    './app/assets/javascript/plugins/pace/pace.min.js',
                    './bower_components/jquery/jquery.js',
                    './bower_components/jqueryui/ui/jquery-ui.js',
                    './bower_components/bootstrap/dist/js/bootstrap.js',
                    './app/assets/javascript/notification/SmartNotification.min.js',
                    './app/assets/javascript/smartwidgets/jarvis.widget.min.js',
                    './app/assets/javascript/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js',
                    './app/assets/javascript/plugin/sparkline/jquery.sparkline.min.js',
                    './app/assets/javascript/plugin/jquery-validate/jquery.validate.min.js',
                    './app/assets/javascript/plugin/masked-input/jquery.maskedinput.min.js',
                    './app/assets/javascript/plugin/select2/select2.min.js',
                    './app/assets/javascript/plugin/bootstrap-slider/bootstrap-slider.min.js',
                    './app/assets/javascript/plugin/msie-fix/jquery.mb.browser.min.js',
                    './app/assets/javascript/plugin/fastclick/fastclick.js',
                    './app/assets/javascript/app.js',
                    './app/assets/javascript/backend.js'
                ],
                dest: './public/assets/javascript/backend.js',
            },
        },
        less: {
            development: {
                options: {
                    compress: true,  //minifying the result
                },
                files: {
                    //compiling frontend.less into frontend.css
                    "./public/assets/stylesheets/frontend.css":"./app/assets/stylesheets/frontend.less",
                    //compiling backend.less into backend.css
                    "./public/assets/stylesheets/backend.css":"./app/assets/stylesheets/backend.less"
                }
            }
        },
        uglify: {
            options: {
                mangle: false
            },
            frontend: {
                files: {
                    './public/assets/javascript/frontend.js': './public/assets/javascript/frontend.js',
                }
            },
            backend: {
                files: {
                    './public/assets/javascript/backend.js': './public/assets/javascript/backend.js',
                }
            },
        },
        watch: {
            js_frontend: {
                files: [
                    './bower_components/jquery/jquery.js',
                    './bower_components/bootstrap/dist/js/bootstrap.js',
                    './app/assets/javascript/frontend.js'
                ],   
                tasks: ['concat:js_frontend','uglify:frontend'],
                options: {
                    livereload: true
                }
            },
            js_backend: {
                files: [
                    './bower_components/jquery/jquery.js',
                    './bower_components/bootstrap/dist/js/bootstrap.js',
                    './app/assets/javascript/backend.js'
                ],   
                tasks: ['concat:js_backend','uglify:backend'],
                options: {
                    livereload: true
                }
            },
            less: {
                files: ['./app/assets/stylesheets/*.less'],
                tasks: ['less'],
                options: {
                    livereload: true
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.registerTask('default', ['watch']);
};