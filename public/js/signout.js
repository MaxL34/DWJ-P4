var signOut = {
    signOutLink: $('.signOut_link'),
    user: sUser,
    
    init: function() {
        var self = this;

        self.signOutLink.click(function(e) {
            e.preventDefault();
            
            $.ajax({
                url: '/tests/Openclassrooms/DWJ-P4/main_index.php?action=signOut',
                type: 'GET',
                success: function() {
                    alert('A bientôt ' + self.user + '.');
                    window.location.href = "/tests/Openclassrooms/DWJ-P4/main_index.php";
                }
            });
        });
    }
};