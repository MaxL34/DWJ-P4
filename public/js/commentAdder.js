var commentAdder = {
    addComButton: $('#add_com'),
    comForm: $('#com_form'),
    comAuthor: $('#author'),
    missPseudo: $('#missPseudo'),
    comContent: $('#content'),
    artId: $('#art_id').attr('value'),
    missCom: $('#missCom'),
    comSubmitBtn: $('#com_submit_btn'),
    modalCom: $('#modal_com'),
    modalText: $('#modal_text'),

    init: function() {
        var self = this;

        console.log('article_id = ' + self.artId);

        //Dissimulation du formulaire d'ajout de commentaire
        self.comForm.hide();

        self.addComButton.click(function() {
            self.comForm.show();
        });

        self.comSubmitBtn.click(function(e) {
            e.preventDefault();
            console.log('article_id = ' + self.artId);
            console.log('com_content = ' + self.comContent.val() + ', com_author = ' + self.comAuthor.val());

            $.ajax({
                url: '/tests/Openclassrooms/DWJ-P4/main_index.php?action=addComment',
                type: 'POST',
                data: 'com_content=' + self.comContent.val() + '&com_author=' + self.comAuthor.val() + '&art_id=' + self.artId,
                dataType: 'text',
                success: function() {
                    //if (data == 'success') {
                    self.modalText.text('Votre commentaire à bien été ajouté');
                    self.modalCom.show();
                    self.modalCom.fadeOut(3000, function() {
                        self.modalCom.hide();
                        window.location.href = "/tests/Openclassrooms/DWJ-P4/main_index.php?action=getArticle&article_id=" + self.artId;
                    });
                }
            });
        });
    }
};