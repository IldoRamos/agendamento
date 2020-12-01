
$(document).ready(function () {
    //alert('entrou..');
    $('a[data-confirm]').click(function () {
        var href = $(this).attr('href');
        alert(href);
        if (!$('#confirm-delite').length) {
            
            $('body').append('<div class="modal fade" id="confirm-delite" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white"> EXCLUIR ITEM<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza que deseja excluir item selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button><a id="dataconfirmOk" class="btn btn-danger text-white">Apagar</a></div></div></div></div>');
        }
        $('#dataconfirmOk').Attr('href', href);
        $('#confirm-delite').modal({shown: true});
        return false;
    });

});



