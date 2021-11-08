
    function checkForm() {
        var nome = document.getElementById("nome").value;
        var cpf = document.getElementById("cpf").value;
        var telefone = document.getElementById("telefone").value;
        
        cpf = cpf.replace('.', '');
        cpf = cpf.replace('.', '');
        cpf = cpf.replace('-', '');
        
        telefone = telefone.replace('(', '');
        telefone = telefone.replace(')', '');
        telefone = telefone.replace('-', '');
        telefone = telefone.replace(' ', '');
        telefone = telefone.replace(' ', '');

    
        
        if (nome == '' || cpf == '' || telefone == '') {
            alert("Por favor preencha todos os campos.");
            return false;
        } else {
            if(TestaCPF(cpf) == true)
            {
                if(nome.includes(" ")){
                    if(telefone.length > 9)
                    {
                        document.getElementById("myForm").submit();
                        return true;
                    }else{
                        alert("Por favor preencha um telefone válido");
                        return false;
                    }
                }else{
                    alert("Por favor preencha nome e sobrenome");
                    return false;
                }
            }else{
                alert("Por favor preencha um cpf válido.");
                return false;
            }
            
    
        }
    }

function TestaCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;
  if (strCPF == "00000000000") return false;

  for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
  Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;

  Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
    return true;
}