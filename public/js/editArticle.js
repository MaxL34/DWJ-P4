var artDelEdit = {
    editBtn: $('.edit_btn'),
    delBtn: $('.delete_btn'),
    modal: $('#modal_edit'),
    modalText: $('#modal_text'),
    spanClose: $('.close'),
    yesModalBtn: $('#yes'),
    noModalBtn: $('#no'),

    init: function() {  
        var self = this;

        self.editBtn.click(function(e) {
            //e.stopPropagation();
            e.preventDefault();

            console.log('bouton edit cliqué');

            var artId = $(this).attr('data_id');

            $.ajax({
                url: '/tests/Openclassrooms/DWJ-P4/main_index.php?action=editArticle',
                type: 'GET',
                data: 'article_id=' + artId,
                dataType: 'text',
                success: function() {
                    //console.log('data = ' + data);
                        //if (data == 'success') {
                            self.yesModalBtn.hide();
                            self.noModalBtn.hide();
                            self.modalText.text('Redirection vers la page d\'édition du billet');
                            self.modal.show();
                            self.modal.fadeOut(3000, function() {
                                self.modal.hide();
                                window.location.href = "/tests/Openclassrooms/DWJ-P4/main_index.php?action=editArticle&article_id=" + artId;
                            });
                }
            });
        });

        self.delBtn.click(function(e) {
            self.modal.show();
            self.yesModalBtn.show();
            self.noModalBtn.show();

            self.modalText.text('Voulez-vous vraiment supprimer ce billet ?');

            self.yesModalBtn.click(function() {
                var artId = $(this).attr('data2_id');

                self.spanClose.click(function() {
                    self.modal.hide();
                });

                $.ajax({
                    url: '/tests/Openclassrooms/DWJ-P4/main_index.php?action=deleteArticle',
                    type: 'GET',
                    data: 'article_id=' + artId,
                    dataType: 'text',
                    success: function() {
                        //console.log('d/ata = ' + data);
                            //if (data == 'success') {
                                self.yesModalBtn.hide();
                                self.noModalBtn.hide();
                                self.modalText.text('Votre billet a été supprimé.');
                                self.modal.fadeOut(3000, function() {
                                    self.modalText.empty();    
                                    window.location.href = "/tests/Openclassrooms/DWJ-P4/main_index.php?action=listArticlesToEdit";
                                });
                            /*} else {
                                console.log('erreur');
                            }*/
                    }
                }); 
            });

            self.noModalBtn.click(function() {
                self.yesModalBtn.hide();
                self.noModalBtn.hide();
                self.modalText.text('Votre billet n\'a pas été supprimé.');
                    self.modal.fadeOut(3000, function() {
                        self.modal.hide();
                        self.modalText.empty();
                    });
            });
        });
    }
};