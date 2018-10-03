var signOut = {
    signOutLink: $('.signOut_link'),
    user: sUser,
    
    init: function() {
        var self = this;
        console.log('init signOut lancée, user = ' + self.user);

        self.signOutLink.click(function(e) {
            e.preventDefault();
            console.log('click lien, user = ' + self.user);
            
            $.ajax({
                url: '/tests/Openclassrooms/DWJ-P4/main_index.php?action=signOut',
                type: 'GET',
                success: function() {
                    console.log('success function console log : ' + self.user);
                    alert('A bientôt ' + self.user + '.');
                    window.location.href = "/tests/Openclassrooms/DWJ-P4/main_index.php";
                }
            });
        });
    }
};