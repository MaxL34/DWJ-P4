var commentAdder = {
    addComButton: $('.add_com'),
    comForm: $('.com_form'),
    comAuthor: $('.com_author'),
    comContent: $('.com_content'),
    comSubmitBtn: $('.com_submit_btn'),
    comSubmitMessageElt: $('.com_submit_message > p'),

    init: function() {
        var self = this;

        //Dissimulation du formulaire d'ajout de commentaire
        self.comForm.hide();

        self.addComButton.click(function() {
            self.comForm.show();
        });

        self.comSubmitBtn.click(function() {
            if (!self.comAuthor && !self.comContent) {
                self.comSubmitMessageElt.text('Veuillez renseigner votre Pseudo et un commentaire svp.');
                console.log(self.comSubmitMessageElt);
            } else if (!self.comAuthor) {
                self.comSubmitMessageElt.text('Veuillez renseigner votre Pseudo svp.');
                console.log(self.comSubmitMessageElt);
              } else if (!self.comContent) {
                self.comSubmitMessageElt.text('Veuillez laisser un commentaire svp.');
                console.log(self.comSubmitMessageElt);
                }
            else {
                self.comSubmitMessageElt.text('Votre commentaire a bien été ajouté.');
                console.log(self.comSubmitMessageElt);
            }             
        });
    }
};