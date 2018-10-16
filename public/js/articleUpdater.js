var articleToUpdate = {
    sessionUser: sUser,
    articleId: $('#art_id').val(),
    artUpdateBtn: $('#art_update_btn'),

    init: function() {
        var self = this;

        self.artUpdateBtn.click(function(e) {
            e.preventDefault();

            var artTitle = tinyMCE.get('art_title').getContent();
            var artContent = tinyMCE.get('art_content').getContent();

            $.ajax({
                url: '/tests/Openclassrooms/DWJ-P4/main_index.php?action=updateArticle&article_id=' + self.articleId,
                type: 'POST',
                data: 'title=' + artTitle + '&content=' + artContent,
                dataType: 'text',
                success: function(data) {
                    console.log('data=' + data + ', article_id = ' + self.articleId);
                    
                    switch (data) {
                        case 'success':
                            alert('Votre billet a bien été ajouté');
                            console.log(self.articleId);
                            window.location.href = "/tests/Openclassrooms/DWJ-P4/main_index.php?action=getArticle&article_id=" + self.articleId;
                        break;

                        case 'missing':
                            alert('Veuillez remplir tous les champs.');
                        break;

                        case 'failed':
                            alert('Erreur dans la récupération de l\'ID du billet.');
                        break;

                        default:
                            alert('Erreur : aucun cas correspondant.')
                    } 
                }
            });
        });
    }
}