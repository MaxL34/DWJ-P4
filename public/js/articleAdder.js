var articleToAdd = {
    sessionUser: sUser,
    artSubmitBtn: $('#art_submit_btn'),

    init: function() {
        var self = this;
        console.log('init articleToAdd lancée, user = ' + self.sessionUser);

        self.artSubmitBtn.click('submit', function(e) {
            e.preventDefault();
            var artTitle = tinyMCE.get('art_title').getContent();
            var artContent = tinyMCE.get('art_content').getContent();  
            
            $.ajax({
                url: '/tests/Openclassrooms/DWJ-P4/main_index.php?action=addArticle',
                type: 'POST',
                data: 'title=' + artTitle + '&content=' + artContent + '&user=' + self.sessionUser,
                dataType: 'text',
                success: function(data) {
                    console.log('data=' + data);

                    switch (data) {
                        case 'title_missing':
                            alert('Veuillez renseigner un titre.');
                        break;

                        case 'content_missing':
                            alert('Veuillez écrire le contenu de votre billet.');
                        break;

                        case 'failed':
                            alert('Veuillez remplir tous les champs.');
                        break;

                        default:
                            alert('Votre billet a bien été ajouté');
                            window.location.href = "/tests/Openclassrooms/DWJ-P4/main_index.php?action=getArticle&article_id=" + data; 
                    }
                }
            });
        });
    }
}