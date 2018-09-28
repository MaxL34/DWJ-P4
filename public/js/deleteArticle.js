var artDel = {
    articleDelLink: $('#article_del_link'),

    init: function() {
        var self = this;

        self.articleDelLink.click(function(e) {
            e.preventDefault();

            $.ajax({
                url: '/tests/Openclassrooms/DWJ-P4/main_index.php?action=deleteArticle',
                type: 'GET',
                success: function(data) {
                    if (data == 1) {
                        alert('L\'article a bien été supprimé.');
                        window.location.href = "/tests/Openclassrooms/DWJ-P4/main_index.php";
                    }
                } 
            });
        });
    }
};