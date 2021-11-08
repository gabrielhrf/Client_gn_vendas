
function checkForm() {
    // Fetching values from all input fields and storing them in variables.
    var nome = document.getElementById("nome").value;
    var preco = document.getElementById("preco").value;

    //Check input Fields Should not be blanks.
    if (nome == '' || preco == '') {
        alert("Por favor preencha todos os campos.");
        return false;
    } else {
        if(preco.includes('.')){
            preco = preco.replace('.', '');
            if(preco < 500){
                alert("Por favor preencha um preço válido, preço deve ser acima de R$ 5.00.");
                return false;
            }else{
                document.getElementById("myForm").submit();
                return true;
            }
        }else{
            alert("Por favor preencha um preço válido, casas decimais ausentes.");
            return false;
        }
    }

    }