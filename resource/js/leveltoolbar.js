function checkSolution()
{
    var inputtoolbar = document.getElementById('inputsolution');
    var formtoolbar = document.getElementById('formsolution');
    var urldebut = window.location.protocol+'//'+window.location.hostname+window.location.pathname;
    if(urldebut.charAt(urldebut.length-1) != '/'){
        urldebut += '/';
    }
    urldebut += inputtoolbar.value;
    alert(urldebut);
    formtoolbar.setAttribute("action",urldefault);
    formtoolbar.submit();
}