$(function() {
    var commentForm = Object.create(commentAdder);
    commentForm.init();

    var comDelete = Object.create(comToDel);
    comDelete.init();

    var reportedCom = Object.create(comToReport);
    reportedCom.init();

    var login = Object.create(loginValid);
    login.init();

    var logOut = Object.create(signOut);
    logOut.init();

    var artEdition = Object.create(artDelEdit);
    artEdition.init();

    var artToAdd = Object.create(articleToAdd);
    artToAdd.init();

    var artToUpdate = Object.create(articleToUpdate);
    artToUpdate.init();
});