var loginValid = {
    userLogin: $('#user_login'),
    userPass: $('#user_password'),
    loginBtn: $('#login_btn'),
    modal: $('#modal_login'),
    spanClose: $('.close'),
    modalText: $('#modal_text'),

    init: function() {
        var self = this;
        self.loginBtn.click(function(e) {
            e.stopPropagation();
            e.preventDefault();

            self.modal.show();

            self.spanClose.click(function() {
                self.modalText.empty();
                self.modal.hide();
            });
        
            $(document).click(function(event) { 
                if(!$(event.target).closest(self.modal).length) {
                    console.log('document cliqué');
                    self.modalText.empty();
                    self.modal.hide();
                } 
            });
            

            $.ajax({                
                url: '/tests/Openclassrooms/DWJ-P4/main_index.php?action=adminLogin',
                type: 'POST',
                data: 'user=' + self.userLogin.val() + '&password=' + self.userPass.val(),
                dataType: 'text',
                success: function(data) {
                    console.log(data);

                    if (data == 'success') {
                        self.modalText.text('Heureux de vous revoir ' + self.userLogin.val() + '.');
                        self.modal.fadeOut(3000, function() {
                            window.location.href = "/tests/Openclassrooms/DWJ-P4/main_index.php?action=adminBoardDisplay";
                        });
                    } else if (data == 'failed') {
                        self.modalText.text('Echec d\'authentfication : mauvais identifiants.');
                    } else {
                        self.modalText.text('Veuillez renseigner tous les champs requis.');
                    } 
                }
            });
        });
    }
};