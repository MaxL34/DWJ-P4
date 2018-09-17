var commentAdder = {
    addComButton: $('.add_com'),
    comForm: $('.com_form'),
    comAuthor: $('.com_author'),
    missPseudo: $('.missPseudo'),
    comContent: $('.com_content'),
    missCom: $('.missCom'),
    comSubmitBtn: $('.com_submit_btn'),
    //comSubmitMessageElt: $('.com_submit_message > p'),

    init: function() {
        var self = this;

        //Dissimulation du formulaire d'ajout de commentaire
        self.comForm.hide();

        self.addComButton.click(function() {
            self.comForm.show();
        });
    }
};