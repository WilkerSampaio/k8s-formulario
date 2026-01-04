$("#button-blue").on("click", function() {
    const txt_nome = $("#name").val();
    const txt_email = $("#email").val();
    const txt_comentario = $("#comment").val();

    $.ajax({
        url: "http://127.0.0.1:58363",
        type: "POST",
        data: {
            nome: txt_nome,
            email: txt_email,
            comentario: txt_comentario
        },
        beforeSend: function() {
            console.log("Enviando dados...");
        }
    })
    .done(function() {
        alert("Dados salvos com sucesso 😈");
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        console.error("Erro:", textStatus, errorThrown, jqXHR.responseText);
        alert("Erro ao salvar");
    });
});
