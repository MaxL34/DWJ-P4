var comToDel = {
    deleteBtn: $('.delete_com_btn'),

    init: function() {
        var self = this;

        self.deleteBtn.click(function(e) {
            e.preventDefault();
            
            var comId = $(this).attr("id");
            var artId = $(this).attr('data_id');

            var confirmResult = confirm('Etes-vous certain de vouloir supprimer ce commentaire ?');
                if (confirmResult == true) {

                    $.ajax({
                        url: '/tests/Openclassrooms/DWJ-P4/main_index.php?action=deleteCom',
                        type: 'GET',
                        data: 'article_id=' + artId + '&com_id=' + comId,
                        dataType: 'text',
                        success: function(data) {
                            console.log('data = ' + data);
                            if (data == 'success') {
                                alert('Le commentaire a bien été supprimé.');
                                window.location.href = "/tests/Openclassrooms/DWJ-P4/main_index.php?action=adminBoardDisplay";
                            } else {
                                console.log('erreur');
                            }
                        }
                    });
                } else if (confirmResult == false) {
                    alert('Le commentaire n\'a pas été supprimé'); 
                }
        });
    }
};