var articleToAdd = {
    sessionUser: sUser,
    artSubmitBtn: $('#art_submit_btn'),
    modalCreate: $('#modal_create'),
    modalText: $('#modal_text'),

    init: function() {
        var self = this;

        $(document).click(function(event) { 
            if(!$(event.target).closest(self.modal).length) {
                self.modalCreate.hide();
                self.modalCreate.stop(true, true).fadeOut();
            } 
        });

        self.artSubmitBtn.click('submit', function(e) {
            e.preventDefault();
            var artTitle = tinyMCE.get('art_title').getContent();
            var artContent = tinyMCE.get('art_content').getContent();  
            
            $.ajax({
                url: './index.php?action=addArticle',
                type: 'POST',
                data: 'title=' + artTitle + '&content=' + artContent + '&user=' + self.sessionUser,
                dataType: 'text',
                success: function(data) {
                    switch (data) {
                        case 'title_missing':
                            self.modalText.text('Veuillez écrire un titre');
                            self.modalCreate.show();
                            self.modalCreate.fadeOut(4000, function() {
                                self.modalText.text('');
                                self.modalCreate.hide();
                            })
                        break;

                        case 'content_missing':
                            self.modalText.text('Veuillez écrire le contenu de votre billet');
                            self.modalCreate.show();
                            self.modalCreate.fadeOut(4000, function() {
                                self.modalText.text('');
                                self.modalCreate.hide();
                        })
                        break;

                        case 'failed':
                            self.modalText.text('Veuillez remplir tous les champs, un titre et un contenu');
                            self.modalCreate.show();
                            self.modalCreate.fadeOut(4000, function() {
                                self.modalText.text('');
                                self.modalCreate.hide();
                        })
                        break;

                        default:
                            self.modalText.text('Votre billet a bien été ajouté');
                            self.modalCreate.show();
                            self.modalCreate.fadeOut(4000, function() {
                                self.modalText.text('');
                                self.modalCreate.hide();
                                window.location.href = "./index.php?action=getArticle&article_id=" + data;
                            })
                             
                    }
                }
            });
        });
    }
}