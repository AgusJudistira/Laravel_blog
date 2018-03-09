
var commentAllowanceForm = document.getElementById('comment-checkbox');

commentAllowanceForm.onchange = function(ev) {
    //ev.preventDefault();
    this.submit();
}