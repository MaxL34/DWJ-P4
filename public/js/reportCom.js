var comToReport = {
    comReportBtn: $('.report_com_btn'),
    //articleId: artId,
    modalCom: $('#modal_com'),
    modalText: $('#modal_text'),

    init: function() {
        var self = this;

        self.comReportBtn.click(function(e) {
            e.stopPropagation();
            e.preventDefault();

            var comId = $(this).attr('id');
            console.log('com_id = ' + $(this).attr('id'));
            console.log('article_id = ' + artId);

            $(document).click(function(event) { 
                if(!$(event.target).closest(self.modalCom).length) {
                    console.log('document cliqué');
                    self.modalCom.hide();
                    self.modalCom.stop(true, true).fadeOut();
                } 
            });

            $.ajax({
                url: 'main_index.php?action=reportCom',
                type: 'GET',
                data: 'article_id=' + artId + '&com_id=' + comId,
                dataType: 'text',
                success: function() {
                    self.modalText.text('Le commentaire a bien été signalé à l\'administrateur');
                    self.modalCom.show();
                    self.modalCom.fadeOut(4000, function() {
                        self.modalText.text('');
                        self.modalCom.hide();
                    });
                }
            });
        });
    }
}