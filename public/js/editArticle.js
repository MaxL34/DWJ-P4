/*var artDel = {
    editBtn: $('.edit'),

    init: function() {
        var self = this;
        console.log('init deleteArticle lancé');
        console.log(artId);

        self.editBtn.click(function(e) {
            e.preventDefault();
            console.log('cliqué');
            console.log(artId);

            $.ajax({
                url: '/tests/Openclassrooms/DWJ-P4/main_index.php?action=editArticle',
                type: 'GET',
                data: '&article_id=' + artId,
                dataType: 'text',
                success: function(data) {
                    if (data == '1') {
                        alert('L\'article a bien été supprimé.');
                        window.location.href = "/tests/Openclassrooms/DWJ-P4/main_index.php?action=listArticlesToEdit";
                    }
                } 
            });
        })  ;
    }
};*/