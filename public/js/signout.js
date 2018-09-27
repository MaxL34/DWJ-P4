var signOut = {
    signOutLink: $('#signOut_link'),

    init: function() {
        var self = this;



        self.signOutLink.click(function(e) {
            e.preventDefault();

            $.ajax({
                url: '/tests/Openclassrooms/DWJ-P4/main_index.php?action=signOut',
                type: 'GET',
                success: function() {
                    //console.log(sessionUser);
                    alert('A bientôt.');
                    window.location.href = "/tests/Openclassrooms/DWJ-P4/main_index.php";
                }
            });
        });
    }
};