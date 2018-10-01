var signOut = {
    signOutLink: $('.signOut_link'),
    sessionUser: $('#session_user'),
    //session_user: '<?php echo json_encode($_SESSION['user']); ?>',
    

    init: function() {
        var self = this;
        //console.log(sessionUser);

        self.signOutLink.click(function(e) {
            e.preventDefault();
            
            $.ajax({
                url: '/tests/Openclassrooms/DWJ-P4/main_index.php?action=signOut',
                type: 'GET',
                success: function() {
                    console.log(sessionUser);
                    console.log(self.sessionUser.text());
                    alert('A bientôt ' + self.sessionUser.text() + '.');
                    window.location.href = "/tests/Openclassrooms/DWJ-P4/main_index.php";
                }
            });
        });
    }
};