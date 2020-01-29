
function criaSession(nome, quantidade, valor, valor_unitario) {
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'post',
        url: 'session/set',
        data: { nome: nome, quantidade: quantidade, valor: valor, valor_unitario: valor_unitario }
    });
}


function excluiSession() {
    document.querySelector('.limpa-sacola').onclick = function () {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'get',
            url: 'session/remove'
        });
        location.reload();
    }
}