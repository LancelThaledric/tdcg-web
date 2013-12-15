function checkSolution()
{
    var inputtoolbar = document.getElementById('inputsolution');
    var urldebut = window.location.protocol+window.location.hostname+window.location.pathname;
    if(urldebut.charAt(urldebut.length-1) != '/'){
        urldebut += '/';
    }
    urldebut += inputtoolbar.value;
    alert(urldebut);
    window.location.href = urldebut;
    
}