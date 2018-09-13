var commentAdder = {
    addComButton: $('.add_com'),
    comForm: $('.com_form'),

    init: function() {
        var self = this;

        //Dissimulation du formulaire d'ajout de commentaire
        self.comForm.hide();

        self.addComButton.click(function() {
            self.comForm.show();
        });



    }
};