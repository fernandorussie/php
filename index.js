let selectCategoria = document.getElementById('select-tipo-servico');

selectCategoria.onchange = function(){
    let selectSubCategoria = document.getElementById('subcategoria');
    let valor = selectCategoria.value;
    fetch("select_subcategoria.php?categoria=" + valor)
        .then( response => {
            return response.text();
        })
        .then(content => {
            selectSubCategoria.innerHTML = content;
        });
}



// let subCategoria = document.getElementById('subcategoria');
// subCategoria.onchange = function(){
//     let input = document.getElementById('preco_produto');
//     let valor = input.value;

//     $.ajax({
//         type: 'POST',
//         url: 'preco.php',
//         data: {valor: valor},
//         beforeSend : function () {
//             console.log('Carregando...');
//         },
//         success : function(retorno){
//             console.log("Sucesso");
//             console.log(this.data);
//         },
//         error : function(a,b,c){
//             console.log('Erro: '+a[status]+' '+c);
//         }
//     });
// }

//Mudar Status para em Execução
// $(function() {
//     $("#subcategoria input[type=hidden]").bind("click",
//     function()
//     {
//         var str_id = this.value;
//         // $("#id_usuario").val(str_id);
//         // $("#nota").val( this.value);
//         // $("#favoritar").submit();
//         console.log(str_id);
//     }
//     );
// });

// function preco(elemento){
//     // elemento = document.getElementById('#preco_servico');
//     var str_id = elemento.value;
//     console.log(str_id);

//     $.ajax({
//         type: 'POST',
//         url: 'preco.php',
//         data: {texto: texto},
//         beforeSend : function () {
//             console.log('Carregando...');
//         },
//         success : function(retorno){
//             console.log("Sucesso");
//             console.log(this.data);
//         },
//         error : function(a,b,c){
//             console.log('Erro: '+a[status]+' '+c);
//         }
//     });
// }
// $("#favoritar").submit(function(e){
            //     e.preventDefault();
            //     var nome_produto = $('input[name="nome_servico"]').val();
            //     console.log(nome_produto);

            //     $.ajax({
            //         url:'inserir_banco.php',
            //         method:'POST',
            //         data:{nome: nome_produto},
            //         dataType:'JSON',

            //     },
            //     success: (resultado)=>{
            //         alert("Sucesso!");
            //     }).done(function(result){
            //         console.log(result);
            //     });
            // })



            // $(document).ready(()=>{
            //     $("#btn_criar").click(function(event) {
            //     event.preventDefault();
            //     // console.log(event.target.tagName);
            //     $.ajax({
            //         url: 'criar_dados_banco.php',
            //         type: 'POST',
            //         data: {
            //             nome_produto: $('input[name="nome_produto"]').val(),
            //             descricao_servico: $('input[name="descricao_servico"]').val(),
            //             dia_pedido: $('input[name="dia_pedido"]').val(),
            //             status_servico: $('input[name="status_servico"]').val(),
            //             id_prestador: $('input[name="id_prestador"]').val(),
            //             email_prestador: $('input[name="email_prestador"]').val(),
            //         },
            //         success: (resultado)=>{
            //             alert("Sucesso");
            //         }
            //     })
            // })

            





            // $(function() {
            //     $("#box_button button[type=submit]").bind("click",
            //     function()
            //     {
            //         $("#nome_produto").val($nome_servico);
            //         $("#descricao_servico").val($descricao_servico);
            //         $("#dia_pedido").val($dia_pedido);
            //         $("#status_servico").val($status_servico);
            //         $("#id_prestador").val($id_prestador);
            //         $("#email_prestador").val($email_prestador);
            //         $("#favoritar").submit();
            //     }
            //     );
            // });