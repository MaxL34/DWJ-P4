var articleToUpdate = {
    sessionUser: sUser,
    artTitle: $('#art_title'),
    artContent: $('#art_content'),
    articleId: $('#art_id'),
    artUpdateBtn: $('#art_update_btn'),

    init: function() {
        var self = this;
        console.log('init articleToUpdate lancée, user = ' + self.sessionUser + ' article_id = ' + artId);

        self.artUpdateBtn.click(function(e) {
            e.preventDefault();

            $.ajax({
                url: '/tests/Openclassrooms/DWJ-P4/main_index.php?action=updateArticle&article_id=' + artId,
                type: 'POST',
                data: '&title=' + self.artTitle.val() + '&content=' + self.artContent.val(),
                dataType: 'html',
                success: function(data) {
                    console.log('data=' + data);
                    
                    if (data == 'success') {
                        console.log('success articleToUpdate lancée, user = ' + self.sessionUser + ', titre = ' + self.artTitle.val() + 'contenu = ' + self.artContent.val());
                        alert('Votre billet a bien été mis à jour');
                    } else if (data == 'missing') {
                        console.log('missing articleToUpdate lancée, user = ' + self.sessionUser + ', titre = ' + self.artTitle.val() + 'contenu = ' + self.artContent.val());
                        alert('Veuillez remplir tous les champs.')
                    } else if (data == 'failed') {
                        console.log('failed articleToUpdate lancée, user = ' + self.sessionUser + ', titre = ' + self.artTitle.val() + 'contenu = ' + self.artContent.val() + 'article_id = ' + self.articleId.val());
                        alert('Erreur dans la récupération de l\'ID du billet.');
                    } 
                },
                error: function(resultat, statut, erreur) {
                    console.log(resultat);
                    console.log(statut);
                    console.log(erreur);
                }
            });
        });
    }
}