<?php

$mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);

if ($mysqli->connect_errno) {
    echo "There is a problem!";
    die();
}

function verificar_usuario($mysqli, $usuario)
{
    $sqlBusca = "SELECT * FROM cadastro WHERE usuario = '$usuario'";
    $resultado = $mysqli->query($sqlBusca);

    $verificar =  mysqli_num_rows($resultado);

    return $verificar;
}

function verificar_email($mysqli, $email)
{
    $sqlBusca = "SELECT * FROM cadastro WHERE email = '$email'";
    $resultado = $mysqli->query($sqlBusca);

    $verificar =  mysqli_num_rows($resultado);

    return $verificar;
}

function verificar_codigo($mysqli, $cod)
{
    $sqlBusca = "SELECT * FROM cadastro WHERE codigo = '$cod'";
    $resultado = $mysqli->query($sqlBusca);

    $verificar =  mysqli_num_rows($resultado);

    return $verificar;
}

function verificar_login($mysqli, $usuario, $senha)
{
    $sqlBusca = "SELECT * FROM cadastro WHERE usuario = '$usuario' AND senha = '$senha'";
    $resultado = $mysqli->query($sqlBusca);

    $verificar =  mysqli_num_rows($resultado);

    return $verificar;
}

function gravar_foto($mysqli, $foto){
    $sqlGravar = "INSERT INTO fotos
        (cadastro_id, nome, arquivo)
        VALUES
        (
            {$foto['cadastro_id']},
            '{$foto['nome']}',
            '{$foto['arquivo']}'
        )
    ";

    $mysqli->query($sqlGravar);
}

function gravar_arte($mysqli, $arte){
    $sqlGravar = "INSERT INTO artes
        (cadastro_id, nome, arquivo, nome_arte, descricao_arte, acc)
        VALUES
        (
            {$arte['cadastro_id']},
            '{$arte['nome']}',
            '{$arte['arquivo']}',
            '{$arte['nome_arte']}',
            '{$arte['descricao_arte']}',
            '0'
        )
    ";

    $mysqli->query($sqlGravar);
}

function buscar_foto($mysqli, $cadastro_id){
    $sqlBusca = "SELECT * FROM fotos WHERE cadastro_id = {$cadastro_id}";
    $resultado = $mysqli->query($sqlBusca);

    return mysqli_fetch_assoc($resultado);
}

function verificar_foto($mysqli, $cadastro_id)
{
    $sqlBusca = "SELECT * FROM fotos WHERE cadastro_id = '$cadastro_id'";
    $resultado = $mysqli->query($sqlBusca);

    $verificar =  mysqli_num_rows($resultado);

    return $verificar;
}

function editar_foto($mysqli, $foto) {
    $sqlEditar = "
            UPDATE fotos SET
                nome = '{$foto['nome']}',
                arquivo = '{$foto['arquivo']}'
            WHERE cadastro_id = {$foto['cadastro_id']}
            ";

    $mysqli->query($sqlEditar);
}

function buscar_artes($mysqli)
{
    $sqlBusca = "SELECT * FROM artes ORDER BY id DESC";
    $resultado = mysqli_query($mysqli, $sqlBusca);

    $artes = array();

    while ($arte = mysqli_fetch_assoc($resultado)) {
        $artes[] = $arte;
    }

    return $artes;
}

function buscar_arte($mysqli, $id)
{
    $sqlBusca = "SELECT * FROM artes WHERE id = {$id} AND acc='1'";
    $resultado = mysqli_query($mysqli, $sqlBusca);

    return $arte = mysqli_fetch_assoc($resultado);
}

function buscar_dados_artista($mysqli, $cadastro_id) {
    $sqlBusca = "SELECT id, usuario, nome FROM cadastro WHERE id = {$cadastro_id}";
    $resultado = $mysqli->query($sqlBusca);

    return mysqli_fetch_assoc($resultado); 
}

function buscar_artes_artista($mysqli, $cadastro_id){
    $sqlBusca = "SELECT * FROM artes WHERE cadastro_id = '$cadastro_id' ORDER BY id DESC";
    $resultado = mysqli_query($mysqli, $sqlBusca);

    $artes_artista = array();

    while ($arte_artista = mysqli_fetch_assoc($resultado)) {
        $artes_artista[] = $arte_artista;
    }

    return $artes_artista;
}

function buscar_artes_artista_limitadas($mysqli, $cadastro_id){
    $sqlBusca = "SELECT * FROM artes WHERE cadastro_id = '$cadastro_id' AND acc = '1' ORDER BY id DESC LIMIT 5";
    $resultado = mysqli_query($mysqli, $sqlBusca);

    $artes_artista = array();

    while ($arte_artista = mysqli_fetch_assoc($resultado)) {
        $artes_artista[] = $arte_artista;
    }

    return $artes_artista;
}

function buscar_dados_perfil($mysqli, $user) {
    $sqlBusca = "SELECT id, nome, usuario, sobre, endereco FROM cadastro WHERE usuario = '$user'";
    $resultado = $mysqli->query($sqlBusca);

    return mysqli_fetch_assoc($resultado); 
}

function converte_user_id($mysqli, $user) {
    $sqlBusca = "SELECT id, usuario FROM cadastro WHERE usuario = '$user'";
    $resultado = $mysqli->query($sqlBusca);

    $conta = mysqli_num_rows($resultado); 
    $fetch = mysqli_fetch_assoc($resultado);

    if($conta >= 1){
        return $fetch['id'];
    }
}

function buscar_dados_perfil_conta($mysqli, $id) {
    $sqlBusca = "SELECT id, nome, usuario, sobre, endereco FROM cadastro WHERE id = '$id'";
    $resultado = $mysqli->query($sqlBusca);

    return mysqli_fetch_assoc($resultado); 
}

function buscar_foto_perfil($mysqli, $cadastro_id){
    $sqlBusca = "SELECT * FROM fotos WHERE cadastro_id = '$cadastro_id'";
    $resultado = $mysqli->query($sqlBusca);

    return mysqli_fetch_assoc($resultado);
}

function buscar_senha($mysqli, $id){
    $sqlBusca = "SELECT senha FROM cadastro WHERE id = {$id}";
    $resultado = $mysqli->query($sqlBusca);

    return mysqli_fetch_assoc($resultado);
}

function verifica_arte($mysqli, $id)
{
    $sqlBusca = "SELECT * FROM artes WHERE id = {$id} AND acc='1'";
    $resultado = mysqli_query($mysqli, $sqlBusca);

    $existe = mysqli_num_rows($resultado);

    if($existe >= 1){
        return true;
    }else{
        return false;
    }
}

function verifica_user($mysqli, $id)
{
    $sqlBusca = "SELECT id FROM cadastro WHERE id = '$id'";
    $resultado = mysqli_query($mysqli, $sqlBusca);

    $existe = mysqli_num_rows($resultado);

    if($existe >= 1){
        return true;
    }else{
        return false;
    }
}

function buscar_arte_adm($mysqli)
{
    $sqlBusca = "SELECT * FROM artes WHERE acc = '0' ORDER BY id";
    //$sqlBusca = "SELECT * FROM artes ORDER BY id DESC";
    $resultado = mysqli_query($mysqli, $sqlBusca);

    return $resultado;
}

function resgatar_nome_user($mysqli, $id){
    $sqlBusca = "SELECT usuario FROM cadastro WHERE id = $id";
    $resultado = mysqli_query($mysqli, $sqlBusca);

    return $arte = mysqli_fetch_assoc($resultado);

}

function aceitar_arte_admin($mysqli, $id){
    $sqlTroca = "UPDATE artes SET  acc = '1' WHERE id=$id";
    $resultado = mysqli_query($mysqli, $sqlTroca);

    return true; 
}

function recusar_arte_admin($mysqli, $id){
    $sqlTroca = "DELETE FROM artes WHERE id='$id'";
    $resultado = mysqli_query($mysqli, $sqlTroca);

    return true; 
}

function recuperar_dados($mysqli, $email) {
    $sqlBusca = "SELECT nome, usuario, senha FROM cadastro WHERE email = '$email'";
    $resultado = mysqli_query($mysqli, $sqlBusca);

    $dados = mysqli_fetch_assoc($resultado);


    return $dados;    
}

function inserir_cod($cod, $email){
    $sqlTroca = "UPDATE cadastro SET  codigo = '$cod' WHERE email=$email";
    $resultado = mysqli_query($mysqli, $sqlTroca);

    return true; 
}

function trocar_senha($email, $cod, $senha){
    $senha = md5($senha);
    $sqlTroca = "UPDATE cadastro SET  senha = '$senha' WHERE email=$email AND codigo=$cod";
    $resultado = mysqli_query($mysqli, $sqlTroca);

    return true; 
}