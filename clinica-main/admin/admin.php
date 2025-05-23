<?php
include('protec.php');

if(isset($_POST['submit'])){
    include_once ('../config.php');

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = password_hash($_POST['cpf'],PASSWORD_DEFAULT);
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['data_nascimento'];

    $tipo = $_POST['tipo'];
    if($_POST['tipo'] == 'cliente'){
        $result = mysqli_query($conn, "INSERT INTO clientes (nome, cpf, telefone, dataNasc, senha, user) 
        VALUES ('$nome', '$cpf', '$telefone', '$data_nascimento', '$senha', 'cli')");
    } else{
        $result = mysqli_query($conn, "INSERT INTO medicos (nome, CRM, telefone, senha, user) 
        VALUES ('$nome', '$cpf', '$telefone', '$senha', 'med')");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulário</title>
        <style>
            body{
                font-family: Arial, Helvetica, sans-serif;
                background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            }
            .box{
                color: white;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-50%);
                background-color: rgba(0, 0, 0, 0.6);
                padding: 15px;
                border-radius: 15px;
                width: 20%;
            }
            fieldset{
                border: 3px solid dodgerblue;
            }
            legend{
                border: 1px solid dodgerblue;
                padding: 10px;
                text-align: center;
                background-color: dodgerblue;
                border-radius: 8px;
            }
            .inputBox{
                position: relative;
            }
            .inputUser{
                background: none;
                border: none;
                border-bottom: 1px solid white;
                outline: none;
                color: white;
                font-size: 15px;
                width: 100%;
                letter-spacing: 2px;
            }
            .labelInput{
                position: absolute;
                top: 0px;
                left: 0px;
                pointer-events: none;
                transition: .5s;
            }
            .inputUser:focus ~ .labelInput,
            .inputUser:valid ~ .labelInput{
                top: -20px;
                font-size: 12px;
                color: dodgerblue;
            }
            #data_nascimento{
                border: none;
                padding: 8px;
                border-radius: 10px;
                outline: none;
                font-size: 15px;
            }
            #submit{
                background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
                width: 100%;
                border: none;
                padding: 15px;
                color: white;
                font-size: 15px;
                cursor: pointer;
                border-radius: 10px;
            }
            #submit:hover{
                background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
            }
        </style>
    </head>
    <body>
        <div class="box">
            <form action="admin.php" method="POST">
                <fieldset>
                    <legend><b>Cadastro de Clientes</b></legend>
                    
                    <a href="home.php">Voltar</a>
                    <br><br>

                    <div class="inputBox">
                        <input type="text" name="nome" id="nome" class="inputUser" required>
                        <label for="nome" class="labelInput">Nome completo</label>
                    </div>

                    <br><br>
                    
                    <div class="inputBox">
                        <input type="number" name="cpf" class="inputUser" required>
                        <label for="cpf" class="labelInput">CPF</label>
                    </div>

                    <br><br>

                    <div class="inputBox">
                        <input type="tel" name="telefone" class="inputUser" required>
                        <label for="telefone" class="labelInput">Telefone</label>
                    </div>

                    <br><br>

                    <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                    <input type="date" name="data_nascimento" required>

                    <br><br>

                    <input type="radio" id="medico" name="tipo" value="medico" required>
                    <label for="medico">Médico</label>
                    <br>

                    <input type="radio" id="cliente" name="tipo" value="cliente" required>
                    <label for="cliente">Cliente</label>

                    <br><br><br>

                    <input type="submit" name="submit" id="submit">
                </fieldset>
            </form>
        </div>
    </body>
</html>