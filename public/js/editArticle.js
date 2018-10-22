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
    //artId: $('.edit_btn').attr('id'),

    init: function() {  
        var self = this;



        self.editBtn.click(function(e) {
            //e.stopPropagation();
            e.preventDefault();

            self.modalText.text('Que souhaitez-vous faire ?');
            self.editModalBtn.show();
            self.delModalBtn.show();

            self.modal.show();

            self.yesModalBtn.hide();
            self.noModalBtn.hide();


            console.log('bouton edit cliqué');

            var artId = $(this).attr('id');
            //console.log(self.artId);
            console.log('art_id = ' + artId);

            self.editModalBtn.click(function(e) {
                e.preventDefault();

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

                    //var artId = $('.hidden_input').attr('id');
                    console.log('art_id = ' + artId);
                    //console.log($('.edit_btn').attr('id'));

                    $.ajax({
                        url: '/tests/Openclassrooms/DWJ-P4/main_index.php?action=deleteArticle',
                        type: 'GET',
                        data: 'article_id=' + artId,
                        dataType: 'text',
                        success: function() {
                            self.yesModalBtn.hide();
                            self.noModalBtn.hide();
                            self.modalText.text('Votre billet a été supprimé.');
                            self.modal.fadeOut(3000, function() {   
                                window.location.href = "/tests/Openclassrooms/DWJ-P4/main_index.php?action=listArticlesToEdit";
                            });
                        }
                    }); 
                });

                self.noModalBtn.click(function() {
                    self.yesModalBtn.hide();
                    self.noModalBtn.hide();
                    self.modalText.text('Votre billet n\'a pas été supprimé.');
                        self.modal.fadeOut(3000, function() {
                            self.modal.hide();
                        });
                });

            });
        });
    }
};