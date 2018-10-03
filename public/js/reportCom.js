var comToReport = {
    comReportElt: $('.report_com'),

    init: function() {
        var self = this;

        self.comReportElt.click(function() {
            alert('Le commentaire a bien été signalé à l\'administrateur');
        });
    }
}