var comToReport = {
    comReportBtn: $('.report_com_btn'),
    modalCom: $('#modal_com'),
    modalText: $('#modal_text'),
    comText: $('.com_text'),
    artId: $('#art_id').attr('value'),

    init: function() {
        var self = this;

        if ($('#comments span').hasClass('span_censored')) {
            $('.span_censored').text('Commentaire signalé');
            } else {
                $('.span_censored').text('');    
            }

        self.comReportBtn.click(function(e) {
            var comId = $(this).attr('id');
            var artId = $('#art_id').attr('value');

            self.resetModal();

            $.ajax({
                url: 'index.php?action=reportCom',
                type: 'GET',
                data: 'article_id=' + artId + '&com_id=' + comId,
                dataType: 'text',
                success: function() {
                    self.modalText.text('Le commentaire a bien été signalé à l\'administrateur');
                    self.modalCom.show();
                    self.modalCom.fadeOut(4000, function() {
                        self.modalText.text('');
                        self.modalCom.hide();
                        window.location.href = "index.php?action=getArticle&article_id=" + self.artId;
                    });
                }
            });
            e.preventDefault();
        });
    },

    resetModal: function() {
        var self = this;

        $(document).click(function(event) { 
            if(!$(event.target).closest(self.modalCom).length) {
                console.log('document cliqué');
                self.modalCom.hide();
                self.modalCom.stop(true, true).fadeOut();
            } 
        });
    }
}