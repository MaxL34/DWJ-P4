var loginValid = {
    userLogin: $('#user_login'),
    userPass: $('#user_pass'),
    loginBtn: $('#login_btn'),
    loginMessageElt: $('#login_message > p'),

    init: function() {
        var self = this;
        self.loginBtn.on('submit', function(e) {
            e.preventDefault();
            var donnees = $(this).serialize();

            $.post(
                '/tests/Openclassrooms/DWJ-P4/main_index.php?action=adminLogin',
                {
                    username: self.userLogin.val(),
                    userpass: self.userPass.val()
                },
                
                function(donnees) {
                  console.log(donnees);
                },
                'json'
            );
        });
    }
};