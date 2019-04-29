var artDelEdit = {
    editBtn: $('.edit_btn'),
    delBtn: $('.delete_btn'),
    modal: $('#modal_edit'),
    modalText: $('#modal_text'),
    spanClose: $('.close'),
    editModalBtn: $('#edit'),
    delModalBtn: $('#delete'),
    yesModalBtn: $('#yes'),
    noModalBtn: $('#no'),
    artId: $('.edit_btn').attr('name'),

    init: function() {  
        var self = this;

        self.editBtn.click(function(e) {
            e.stopPropagation();
            e.preventDefault();

            $(document).click(function(event) { 
                if(!$(event.target).closest(self.modal).length) {
                    self.modal.hide();
                    self.modal.stop(true, true).fadeOut();
                } 
            });

            self.modalText.text('Que souhaitez-vous faire ?');
            self.editModalBtn.show();
            self.delModalBtn.show();

            self.modal.show();

            self.yesModalBtn.hide();
            self.noModalBtn.hide();

            self.spanClose.click(function() {
                self.modal.hide();
            });

            self.artId = $(this).attr('name');

            self.editModalBtn.click(function(e) {
                e.preventDefault();

                $.ajax({
                    url: './index.php?action=editArticle',
                    type: 'GET',
                    data: 'article_id=' + self.artId,
                    dataType: 'text',
                    success: function() {
                        self.delModalBtn.hide();
                        self.editModalBtn.hide();
                        self.modalText.text('Redirection vers la page d\'édition du billet');
                        self.modal.show();
                        self.modal.fadeOut(4000, function() {
                            self.modal.hide();
                            window.location.href = "./index.php?action=editArticle&article_id=" + self.artId;
                        });
                    }
                });

                self.resetModal();
            });

            self.delModalBtn.click(function(e) {
                e.preventDefault();

                self.modalText.text('Voulez-vous vraiment supprimer ce billet ?');
                self.modal.show();
                self.editModalBtn.hide();
                self.delModalBtn.hide();
                self.yesModalBtn.show();
                self.noModalBtn.show();

                self.spanClose.click(function() {
                    self.modal.hide();
                });

                self.yesModalBtn.click(function(e) {
                    e.preventDefault();

                    $.ajax({
                        url: 'index.php?action=deleteArticle',
                        type: 'GET',
                        data: 'article_id=' + self.artId,
                        dataType: 'text',
                        success: function() {
                            self.yesModalBtn.hide();
                            self.noModalBtn.hide();
                            self.modalText.text('Votre billet a été supprimé.');
                            self.modal.fadeOut(4000, function() {   
                                window.location.href = "./index.php?action=listArticlesToEdit";
                            });
                        }
                    }); 
                    
                    self.resetModal();                
                });

                self.noModalBtn.click(function() {
                    self.yesModalBtn.hide();
                    self.noModalBtn.hide();
                    self.modalText.text('Votre billet n\'a pas été supprimé.');
                        self.modal.fadeOut(4000, function() {
                            self.modal.hide();
                        });

                    self.resetModal();
                });

            });
        });
    },

    resetModal : function() {
        var self = this;

        $(document).click(function(event) { 
            if(!$(event.target).closest(self.modal).length) {
                self.modal.hide();
                self.modal.stop(true, true).fadeOut();
            } 
        });
    }

};