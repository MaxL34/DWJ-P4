var articleToUpdate = {
    sessionUser: sUser,
    articleId: $('#art_id').val(),
    artUpdateBtn: $('#art_update_btn'),
    modalUpdate: $('#modal_update'),
    modalText: $('#modal_text'),

    init: function() {
        var self = this;

        $(document).click(function(event) { 
            if(!$(event.target).closest(self.modal).length) {
                console.log('document cliqué');
                self.modalUpdate.hide();
                self.modalUpdate.stop(true, true).fadeOut();
            } 
        });

        self.artUpdateBtn.click(function(e) {
            e.preventDefault();

            var artTitle = tinyMCE.get('art_title').getContent();
            var artContent = tinyMCE.get('art_content').getContent();

            $.ajax({
                url: './index.php?action=updateArticle&article_id=' + self.articleId,
                type: 'POST',
                data: 'title=' + artTitle + '&content=' + artContent,
                dataType: 'text',
                success: function(data) {
                    console.log('data=' + data + ', article_id = ' + self.articleId);
                    


                    switch (data) {
                        case 'title_missing':
                            self.modalText.text('Veuillez écrire un titre');
                            self.modalUpdate.show();
                            self.modalUpdate.fadeOut(4000, function() {
                                self.modalText.text('');
                                self.modalUpdate.hide();
                            })
                        break;

                        case 'content_missing':
                            self.modalText.text('Veuillez écrire le contenu de votre billet');
                            self.modalUpdate.show();
                            self.modalUpdate.fadeOut(4000, function() {
                                self.modalText.text('');
                                self.modalUpdate.hide();
                        })
                        break;

                        case 'failed':
                            self.modalText.text('Veuillez remplir tous les champs, un titre et un contenu');
                            self.modalUpdate.show();
                            self.modalUpdate.fadeOut(4000, function() {
                                self.modalText.text('');
                                self.modalUpdate.hide();
                        })
                        break;

                        default:
                            self.modalText.text('Votre billet a été mis à jour');
                            self.modalUpdate.show();
                            self.modalUpdate.fadeOut(4000, function() {
                                self.modalText.text('');
                                self.modalUpdate.hide();
                                window.location.href = "./index.php?action=getArticle&article_id=" + data;
                            })
                    } 
                }
            });
        });
    }
}