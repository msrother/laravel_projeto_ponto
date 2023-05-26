/*
    Essa é uma função em JavaScript que utiliza a biblioteca SweetAlert2 e a biblioteca Axios para excluir um usuário de um sistema web. 
    A função recebe dois parâmetros: id e name, que correspondem ao ID e nome do usuário que será excluído.
    Quando a função é chamada, ela exibe uma mensagem de confirmação usando o método fire(), que apresenta um diálogo personalizado. 
    Se o usuário confirmar a exclusão, a função faz uma requisição HTTP DELETE usando a biblioteca Axios para excluir o usuário do sistema. 
    Se a exclusão for bem-sucedida, a página é recarregada usando o método location.reload().
    Caso ocorra algum erro durante a exclusão, uma mensagem de erro é exibida.
*/


function deleteCidade(id, nome) {
    Swal.fire({
        title: 'Tem certeza?',
        text: `Você está prestes a excluir a cidade ${nome}.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, excluir',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/cidades/${id}`)
                .then(() => {
                    Swal.fire(
                        'Excluído!',
                        'Cidade excluída com sucesso.',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                })
                .catch(() => {
                    Swal.fire(
                        'Erro!',
                        'Não foi possível excluir a cidade.',
                        'error'
                    );
                });
        }
    });
};
