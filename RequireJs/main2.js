//第三方模块，不符合AMD规范
require.config({
    shim: {
        "underscore": {
            exports: "_"
        }
    },
    "jquery.form" : {
        deps : ["jquery"]
    }
})