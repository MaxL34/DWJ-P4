var loginValid = {
    userLogin: $('#user_login'),
    userPass: $('#user_password'),
    loginBtn: $('#login_btn'),
    loginMessageElt: $('#login_message > p'),

    init: function() {
        var self = this;
        self.loginBtn.click(function(e) {
            e.preventDefault();

            $.ajax({                
                url: '/tests/Openclassrooms/DWJ-P4/main_index.php?action=adminLogin',
                type: 'POST',
                data: 'user=' + self.userLogin.val() + '&password=' + self.userPass.val(),
                dataType: 'text',
                success: function(data) {
                    if (data == 'success') {
                        alert('Heureux de vous revoir ' + self.userLogin.val() + '.');
                        window.location.href = "/tests/Openclassrooms/DWJ-P4/main_index.php?action=adminBoardDisplay";
                    } else if (data == 'failed') {
                        alert('Echec d\'authentfication : mauvais identifiants.');
                    } else {
                        alert('Veuillez renseigner tous les champs requis.');
                    } 
                }
            });
        });
    }
};