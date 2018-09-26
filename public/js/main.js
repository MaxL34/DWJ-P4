$(function() {
    var commentForm = Object.create(commentAdder);
    commentForm.init();

    var login = Object.create(loginValid);
    login.init();
});