tinymce.init({
    selector: '.content',
        theme: 'modern',
        menubar: false,
        //statusbar: false,
        width: 1024,
        height: 300,
        plugins: [
            'searchreplace wordcount'
        ],
        //content_css: '/tests/Openclassrooms/DWJ-P4/public/css/main.css',
        toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | searchreplace | copy paste',
        valid_elements : 'em/i,strike,u,strong/b,div[align],br,#p[align],-ol[type|compact],-ul[type|compact],-li',
        forced_root_block: false,
        force_br_newlines: true,
        force_p_newlines: false
});
