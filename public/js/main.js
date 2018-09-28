$(function() {
    var commentForm = Object.create(commentAdder);
    commentForm.init();

    var login = Object.create(loginValid);
    login.init();

    var logOut = Object.create(signOut);
    logOut.init();

    var articleToDel = Object.create(artDel);
    articleToDel.init();
});