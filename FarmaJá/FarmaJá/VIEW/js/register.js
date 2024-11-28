function formatarTelefone(input) {
    // Remove todos os caracteres que não são dígitos
    let telefone = input.value.replace(/\D/g, '');

    // Aplica a máscara (XX) XXXXX-XXXX
    if (telefone.length <= 10) {
        telefone = telefone.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
    } else {
        telefone = telefone.replace(/(\d{2})(\d{5})(\d{0,4})/, '($1) $2-$3');
    }

    // Atualiza o valor do campo de entrada
    input.value = telefone;
}