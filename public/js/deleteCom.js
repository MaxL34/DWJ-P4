var comToDel = {
    deleteBtn: $('.del_btn'),
    comId: $('.del_btn').attr('name'),
    modal: $('#modal_delete'),
    modalText: $('#modal_text'),
    spanClose: $('.close'),
    yesModalBtn: $('#yes'),
    noModalBtn: $('#no'),

    init: function() {  
        var self = this;

        $(document).click(function(event) { 
            if(!$(event.target).closest(self.modal).length) {
                console.log('document cliqué');
                self.modal.hide();
                self.modal.stop(true, true).fadeOut();
            } 
        });


        self.deleteBtn.click(function(e) {
            e.stopPropagation();
            e.preventDefault();

            self.modalText.text('Voulez-vous vraiment supprimer ce commentaire ?');
            self.modal.show();

            self.yesModalBtn.show();
            self.noModalBtn.show();

            self.spanClose.click(function() {
                self.modal.hide();
            });

            self.comId = $(this).attr('name');
            console.log("comId = " + self.comId);
            
            self.yesModalBtn.click(function() {
                self.yesModalBtn.hide();
                self.noModalBtn.hide();

                $.ajax({
                    url: 'index.php?action=deleteCom',
                    type: 'POST',
                    data: 'com_id=' + self.comId,
                    dataType: 'text',
                    success: function(data) {
                        console.log("ajax success comId = " + self.comId);
                        if (data == 'success') {
                            self.yesModalBtn.hide();
                            self.noModalBtn.hide();
                            self.modalText.text('Le commentaire a bien été supprimé.');
                            self.modal.fadeOut(4000, function() {
                                window.location.href = "index.php?action=adminBoardDisplay";
                            });
                        } else {
                            console.log('erreur');
                        }
                    }
                });
            });
        
        });

            self.noModalBtn.click(function() {
                self.yesModalBtn.hide();
                self.noModalBtn.hide();
                self.modalText.text('Le commentaire n\'a pas été supprimé.');
                    self.modal.fadeOut(4000, function() {
                        self.modal.hide();
                        
                    });
            });
    }
};