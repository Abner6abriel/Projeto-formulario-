<?php			
$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["numero"];
$estadoCivil = $_POST["tipo"];
$dtNascimento = $_POST["dataNascimento"];
$sexo = $_POST["sexo"];
$dtAgendamento = $_POST["dataAgendamento"];
$hAgendamento = $_POST["horaAgendamento"];
$doenca = $_POST["doenca"];
$doencaFormatado = $doenca == "S"? 1:0;
$foto = $_FILES["foto"];
$fotoNome = $foto["name"];
$caminhoFoto = "./arquivos/".uniqid().$fotoNome;
$descricao = $_POST["descricao"];


$con = mysqli_connect('localhost', 'root','', "ALUNO31309801") or die( ' Erro na conexão ' );
       mysqli_select_db($con, "ALUN031309801") 
       or die("Erro na abertura do banco de dados:" .mysqli_error($con) );
       move_uploaded_file($foto["tmp_name"],$caminhoFoto);
$resultado = mysqli_select_db($con , 'ALUNO29440491');
$sql = "insert into cadastro (nome, email, estadoCivil, telefone,   dtNascimento, dtAgendamento, hAgendamento, doenca, foto, descricao) values ".
"('$nome', ' '$email', '$estadoCivil', $telefone', '$dtNascimento', '$dtAgendamento', '$hAgendamento', '$doencaFormatado', '$caminhoFoto', '$descricao')";
       mysqli_query($con, $sql) or die("Erro na inserção de dados: " .mysqli_error($con) );
       mysqli_close($con);

echo "O nome é: $nome <br>";
echo "O email é: $email <br>";
echo "O telefone é: $telefone <br>";
echo "O estado civíl é: $estadoCivil <br>";
echo "A data de nascimento é: $dtNascimento <br>";
echo "O sexo é: $sexo <br>";
echo "A data de agendamento é: $dtAgendamento <br>";
echo "A hora do agendamento é: $hAgendamento <br>";
echo "Possui doenca crônica?: $doenca <br>";
echo "Foto da carterinha: <img src='$caminhoFoto'> <br>";
echo "Descricao medica: $descricao";
?>