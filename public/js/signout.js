var signOut = {
    signOutLink: $('#signOut_link'),
    sessionUser: $('#session_user'),

    init: function() {
        var self = this;

        self.signOutLink.click(function(e) {
            e.preventDefault();

            $.ajax({
                url: '/tests/Openclassrooms/DWJ-P4/main_index.php?action=signOut',
                type: 'GET',
                success: function() {
                    console.log(self.sessionUser.text());
                    alert('A bientôt ' + self.sessionUser.text() + '.');
                    window.location.href = "/tests/Openclassrooms/DWJ-P4/main_index.php";
                }
            });
        });
    }
};