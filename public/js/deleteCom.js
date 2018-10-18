var comToDel = {
    deleteBtn: $('.delete_com_btn'),
    modal: $('#modal_delete'),
    modalText: $('#modal_text'),
    spanClose: $('.close'),
    yesModalBtn: $('#yes'),
    noModalBtn: $('#no'),

    init: function() {  
        var self = this;

        self.deleteBtn.click(function(e) {
            e.stopPropagation();
            e.preventDefault();

            self.yesModalBtn.show();
            self.noModalBtn.show();

            var comId = $(this).attr("id");
            var artId = $(this).attr('data_id');

            self.modal.show();
            
            self.spanClose.click(function() {
                self.modal.hide();
            });

            $(document).click(function(event) { 
                if(!$(event.target).closest(self.modal).length) {
                    console.log('document cliqué');
                    self.modal.hide();
                } 
            });

            self.yesModalBtn.click(function() {
                self.yesModalBtn.hide();
                self.noModalBtn.hide();

                $.ajax({
                    url: '/tests/Openclassrooms/DWJ-P4/main_index.php?action=deleteCom',
                    type: 'GET',
                    data: 'article_id=' + artId + '&com_id=' + comId,
                    dataType: 'text',
                    success: function(data) {
                        console.log('data = ' + data);
                        if (data == 'success') {
                            self.yesModalBtn.hide();
                            self.noModalBtn.hide();
                            self.modalText.text('Le commentaire a bien été supprimé.');
                            self.modal.fadeOut(1600, function() {
                                window.location.href = "/tests/Openclassrooms/DWJ-P4/main_index.php?action=adminBoardDisplay";
                            });
                        } else {
                            console.log('erreur');
                        }
                    }
                });
            });

            self.noModalBtn.click(function() {
                self.yesModalBtn.hide();
                self.noModalBtn.hide();
                self.modalText.text('Le commentaire n\'a pas été supprimé.');
                    self.modal.fadeOut(3000, function() {
                        self.modal.hide();
                        self.modalText.text('Voulez-vous vraiment supprimer ce commentaire ?');
                    });
            });
        });
    }
};