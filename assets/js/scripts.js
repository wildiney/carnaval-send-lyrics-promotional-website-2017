$(document).ready(function(){
    // LOGIN PAGE
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus();
    });
    
    // FORM ENREDO
    $('#data-de-nascimento').mask('00/00/0000');
    
    // Input File
    $("#file").change(function(){
        $("#inputFileName").val($("#file").val());
    });
    
    $("#inputFileName").click(function(){
        $("#file").trigger('click');
    });
});