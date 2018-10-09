var articleToAdd = {
    sessionUser: sUser,
    //artTitle: tinyMCE.('art_title').getContent(),
    //artContent: tinyMCE.get('art_content').getContent(),
    artSubmitBtn: $('#art_submit_btn'),

    init: function() {
        var self = this;
        console.log('init articleToAdd lancée, user = ' + self.sessionUser);



        self.artSubmitBtn.click('submit', function(e) {
            e.preventDefault();
            var artTitle = tinyMCE.get('art_title').getContent();
            var artContent = tinyMCE.get('art_content').getContent();  

            console.log(artTitle);
            console.log(artContent);
            
            $.ajax({
                url: '/tests/Openclassrooms/DWJ-P4/main_index.php?action=addArticle',
                type: 'POST',
                data: 'title=' + artTitle + '&content=' + artContent + '&user=' + self.sessionUser,
                dataType: 'text',
                success: function(data) {
                    console.log('data=' + data);
                    if (data == 'success') {
                        console.log('success articleToAdd lancée, user = ' + self.sessionUser + ', titre = ' + artTitle + 'contenu = ' + artContent);
                        alert('Votre billet a bien été ajouté');
                    } else if (data == 'failed') {
                        console.log('failed articleToAdd lancée, user = ' + self.sessionUser + ', titre = ' + self.artTitle + 'contenu = ' + artContent);
                        alert('Veuillez remplir tous les champs.')
                    }
                }
            });
        });
    }
}