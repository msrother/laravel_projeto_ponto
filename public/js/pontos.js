function deletePonto(id, nome) {
    Swal.fire({
        title: 'Tem certeza?',
        text: `Você está prestes a excluir o registro ${id}.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, excluir',
        cancelButtonText: 'Cancelar',    
        customClass: {
            confirmButton: 'btn btn-danger btn-sm mr-2', // Adiciona margem à direita
            cancelButton: 'btn btn-secondary btn-sm' // Botão de cancelar sem margem adicional
          }          
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/pontos/${id}`)
                .then(() => {
                    Swal.fire(
                        'Excluído!',
                        'Registro excluído com sucesso.',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                })
                .catch(() => {
                    Swal.fire(
                        'Erro!',
                        'Não foi possível excluir o registro.',
                        'error'
                    );
                });
        }
    });
};