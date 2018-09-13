var commentAdder = {
    addComButton: $('.add_com'),
    comForm: $('.com_form'),
    comAuthor: $('.com_author'),
    comContent: $('.com_content'),
    comSubmitBtn: $('.com_submit_btn'),
    comSubmitMessageElt: $('.com_submit_message'),

    init: function() {
        var self = this;

        //Dissimulation du formulaire d'ajout de commentaire
        self.comForm.hide();

        self.addComButton.click(function() {
            self.comForm.show();
        });

        self.comSubmitBtn.click(function() {
            if (self.comAuthor == null && self.comContent == null) {
                self.comSubmitMessageElt.text('Veuillez renseigner votre Pseudo et un commentaire svp.');
            } else if (self.comAuthor == null) {
                self.comSubmitMessageElt.text('Veuillez renseigner votre Pseudo svp.');
              } else if (self.comContent == null) {
                self.comSubmitMessageElt.text('Veuillez laisser un commentaire svp.');
                }
            else {
                self.comSubmitMessageElt.text('Votre commentaire a bien été ajouté.');
            }             
        });
    }
};