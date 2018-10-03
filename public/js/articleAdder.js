var articleToAdd = {
    sessionUser: sUser,
    artTitle: $('#art_title'),
    artContent: $('#art_content'),
    artSubmitBtn: $('#art_submit_btn'),

    init: function() {
        var self = this;
        console.log('init articleToAdd lancée, user = ' + self.sessionUser);

        self.artSubmitBtn.click(function(e) {
            e.preventDefault();

            $.ajax({
                url: '/tests/Openclassrooms/DWJ-P4/main_index.php?action=addArticle',
                type: 'POST',
                data: '&title=' + self.artTitle.val() + '&content=' + self.artContent.val() + '&user=' + self.sessionUser,
                dataType: 'text',
                success: function(data) {
                    if (data == 'success') {
                        console.log('success articleToAdd lancée, user = ' + self.sessionUser + ', titre = ' + self.artTitle.val() + 'contenu = ' + self.artContent.val());
                        alert('Votre billet a bien été ajouté');
                    } else if (data == 'failed') {
                        console.log('failed articleToAdd lancée, user = ' + self.sessionUser + ', titre = ' + self.artTitle.val() + 'contenu = ' + self.artContent.val());
                        alert('Veuillez remplir tous les champs.')
                    }
                }
            });
        });
    }
}