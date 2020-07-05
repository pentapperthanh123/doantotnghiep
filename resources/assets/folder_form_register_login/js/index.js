var show = document.querySelector('div.signup-link a');
var input = document.querySelector('.card-signup');
var cancel = document.querySelector('div.cancel input')

show.onclick = function() {
    input.style.display = 'block';
}
cancel.onclick = function() {
    input.style.display = 'none';
}