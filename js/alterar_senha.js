
$(document).ready(function () {
    //alert('entrou..');
    $('#data-alter').click(function () {
        var action = $(this).attr('action');
        alert(action);
        //if (!$('#confirm-update').length) {
            
            $('body').append('<div class="modal fade" id="confirm-update" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="staticBackdropLabel">Configuração</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div><div class="modal-body"><form  class="text-center border border-light p-4" action="../controller/atualizar_login.php" method="POST"><div align="center"><img src="../img/logo_aegbce.jpg" align="center" class="rounded-circle" alt="Associação dos Estudantes Guineense dos Estado de Ceará" width="166" height="166" ></div><p class="h4 mb-4 white-text">Alterar senha</p><input type="number" name="cpf" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="CPF" minlength="11" maxlength="11" required><input type="password" name="senhaantigo" id="senha_atual" class="form-control mb-4" placeholder="Senha atual" maxlength="12" minlength="6" required><input type="password" name="senha" id="nova_senha" class="form-control mb-4" placeholder="Nova Senha" maxlength="12" minlength="6" required><input type="password" name="nova_senha" id="senha_rep" class="form-control mb-4" placeholder="Repetir Senha" maxlength="12" minlength="6" required><button id="dataconfirmOk"class="btn btn-dark btn-block my-4" type="submit">Alterar</button><a id="cancel_cad" class="btn btn-dark btn-block my-4" href="../index.php">Cancelar</a></form> </div></div> </div>');
        //}
        ///$('#dataconfirmOk').Attr('action', action);
        $('#confirm-update').modal('shown');
        return false;
    });

});



