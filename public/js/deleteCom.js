var comToDel = {
    deleteComLink: $('.delete_com_link'),

    init: function() {
        var self = this;

        self.deleteComLink.click(function() {
            alert('Le commentaire a bien été supprimé.');
        });
    }
};