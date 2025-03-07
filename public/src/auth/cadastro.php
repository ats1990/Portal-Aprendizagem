<?php
// Inclui o cabeçalho da página
include $_SERVER['DOCUMENT_ROOT'] . '/Projeto-ong/public/templates/header.php';
?>

<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('/Projeto-ong/public/images/bg_1.jpg')">
  <div class="container">
    <div class="row align-items-end justify-content-center text-center">
      <div class="col-lg-7">
        <h2 class="mb-0">Crie sua Conta</h2>
        <p>Preencha os campos abaixo para se registrar e aproveitar nossos serviços.</p>
      </div>
    </div>
  </div>
</div>

<div class="custom-breadcrumns border-bottom">
  <div class="container">
    <a href="/Projeto-ong/public/index.php">Início</a>
    <span class="mx-3 icon-keyboard_arrow_right"></span>
    <span class="current">Cadastro</span>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <form method="POST" action="/Projeto-ong/public/src/auth/registra_usuario.php" onsubmit="return verificarSenhas()">
          <div class="row">
            <!-- Campo para selecionar o papel antes de nome -->
            <div class="col-md-12 form-group">
              <label for="tipo">Selecione seu Papel</label>
              <select class="form-control" id="tipo" name="tipo" required onchange="mostrarCamposAdicionais()">
                <option value="aprendiz">Aprendiz</option>
                <option value="professor">Professor</option>
                <option value="formacao_basica">Formação Básica</option>
                <option value="coordenacao">Coordenação</option>
                <option value="administracao">Administração</option>
              </select>
            </div>

            <!-- Campos adicionais que aparecerão para "Formação" ou "Aprendizagem" -->
            <div id="campos_adicionais" style="display:none;">

              <div class="col-md-12 form-group">
                <label for="identidade_genero">Identidade de Gênero</label>
                <select class="form-control" id="identidade_genero" name="identidade_genero" required>
                  <option value="cisgenero">Cisgênero</option>
                  <option value="transgenero">Transgênero</option>
                  <option value="nao_binario">Não Binário</option>
                  <option value="genero_fluido">Gênero Fluido</option>
                  <option value="agenero">Agênero</option>
                </select>
              </div>
              <div class="col-md-12 form-group">
                <label for="sexo">Sexo</label>
                <select class="form-control" id="sexo" name="sexo" required>
                  <option value="masculino">Masculino</option>
                  <option value="feminino">Feminino</option>
                  <option value="outro">Outro</option>
                </select>
              </div>
              <!-- Escolaridade com as novas opções -->
              <div class="col-md-12 form-group">
                <label for="escolaridade">Escolaridade</label>
                <select class="form-control" id="escolaridade" name="escolaridade" required>
                  <option value="1_ano_ensino_medio">1° Ano do Ensino Médio</option>
                  <option value="2_ano_ensino_medio">2° Ano do Ensino Médio</option>
                  <option value="3_ano_ensino_medio">3° Ano do Ensino Médio</option>
                  <option value="concluiu">Concluiu</option>
                </select>
              </div>
              <!-- Período escolar com as opções de manhã, tarde e noite -->
              <div class="col-md-12 form-group">
                <label for="periodo_escola">Período Escolar</label>
                <select class="form-control" id="periodo_escola" name="periodo_escola" required>
                  <option value="manha">Manhã</option>
                  <option value="tarde">Tarde</option>
                  <option value="noite">Noite</option>
                </select>
              </div>
              <div class="col-md-12 form-group">
                <label for="rg">RG</label>
                <input type="text" class="form-control" id="rg" name="rg" maxlength="12" required>
              </div>
              <div class="col-md-12 form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" maxlength="14" required>
              </div>
              <div class="col-md-12 form-group">
                <label for="data_nasc">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nasc" name="data_nasc" required>
              </div>
              <div class="col-md-12 form-group">
                <label for="cep">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" maxlength="10" required onblur="buscarEndereco()">
              </div>
              <div class="col-md-12 form-group">
                <label for="rua">Rua</label>
                <input type="text" class="form-control" id="rua" name="rua" readonly>
              </div>
              <div class="col-md-12 form-group">
                <label for="localidade">Localidade</label>
                <input type="text" class="form-control" id="localidade" name="localidade" readonly>
              </div>
              <div class="col-md-12 form-group">
                <label for="bairro">Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" readonly>
              </div>
              <div class="col-md-12 form-group">
                <label for="bairro">Número</label>
                <input type="text" class="form-control" id="numero" name="numero" require>
              </div>
              <div class="col-md-12 form-group">
                <label for="bairro">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento" require>
              </div>
              <div class="col-md-12 form-group">
                <label for="celular">Celular</label>
                <input type="text" class="form-control" id="celular" name="celular" maxlength="15" required>
              </div>
              <div class="col-md-12 form-group">
                <label for="celular_responsavel">Celular Responsável</label>
                <input type="text" class="form-control" id="celular_responsavel" name="celular_responsavel" maxlength="15">
              </div>
              <div class="col-md-12 form-group">
                <label for="nome_responsavel">Nome do Responsável</label>
                <input type="text" class="form-control" id="nome_responsavel" name="nome_responsavel">
              </div>
              <div class="col-md-12 form-group">
                <label for="nome_recado">Nome para Recado</label>
                <input type="text" class="form-control" id="nome_recado" name="nome_recado">
              </div>
              <div class="col-md-12 form-group">
                <label for="tel_recado">Telefone para Recado</label>
                <input type="text" class="form-control" id="tel_recado" name="tel_recado" maxlength="15">
              </div>
              <div class="col-md-12 form-group">
                <label for="curso_relacionado">Você está cursando ou já fez algum curso relacionado às disciplinas da Sodiprom?</label>
                <input type="text" class="form-control" id="curso_relacionado" name="curso_relacionado">
              </div>
              <div class="col-md-12 form-group">
                <label for="curso_qual">Possui algum curso? Qual?</label>
                <input type="text" class="form-control" id="curso_qual" name="curso_qual">
              </div>
            </div>

            <!-- Campos básicos para outros papéis -->
            <div id="campos_basicos">
              <div class="col-md-12 form-group">
                <label for="nome_usuario">Nome do Usuário</label>
                <input type="text" class="form-control" id="nome_usuario" name="nome_usuario" required>
              </div>

              <div class="col-md-12 form-group">
                <label for="nome_social">Nome Social</label>
                <input type="text" class="form-control" id="nome_social" name="nome_social">
              </div>

              <div class="col-md-12 form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="col-md-12 form-group">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
              </div>
              <div class="col-md-12 form-group">
                <label for="confirmar_senha">Confirmar Senha</label>
                <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha" required>
              </div>
            </div>

            <div class="col-md-12 form-group">
              <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/Projeto-ong/public/templates/footer.php'; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script>
  // Máscaras para os campos de entrada
  $(document).ready(function() {
    $('#rg').mask('00.000.000-0');
    $('#cpf').mask('000.000.000-00');
    $('#cep').mask('00000-000');
    $('#celular').mask('(00) 00000-0000');
    $('#celular_responsavel').mask('(00) 00000-0000');
    $('#tel_recado').mask('(00) 00000-0000');
  });

  // Preenchimento automático do endereço com base no CEP
  function buscarEndereco() {
    var cep = document.getElementById('cep').value;

    // Remover traços do CEP, para garantir que a consulta no ViaCEP seja feita corretamente
    cep = cep.replace('-', '').trim();

    if (cep.length === 8) { // Verifica se o CEP tem 8 dígitos
      $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function(data) {
        if (!data.erro) { // Se a consulta retornar sucesso
          $('#rua').val(data.logradouro);
          $('#bairro').val(data.bairro);
          $('#localidade').val(data.localidade);
          $('#uf').val(data.uf); // Se você quiser adicionar o campo "UF"
        } else {
          alert('CEP não encontrado!');
        }
      });
    } else {
      alert('Por favor, insira um CEP válido.');
    }
  }

  // Função de verificação das senhas
  function verificarSenhas() {
    var senha = document.getElementById("senha").value;
    var confirmarSenha = document.getElementById("confirmar_senha").value;

    if (senha !== confirmarSenha) {
      alert("As senhas não são iguais. Por favor, verifique.");
      return false;
    }
    return true;
  }

  // Função para mostrar campos adicionais ou não com base no tipo de papel
  function mostrarCamposAdicionais() {
    var tipo = document.getElementById("tipo").value;

    // Exibir/ocultar campos conforme o tipo de usuário
    if (tipo === "aprendiz" || tipo === "formacao_basica") {
      document.getElementById("campos_adicionais").style.display = "block"; // Exibe campos de Aprendiz/Formação
      document.getElementById("campos_basicos").style.display = "block"; // Exibe campos básicos
    } else {
      document.getElementById("campos_adicionais").style.display = "none"; // Esconde campos de Aprendiz/Formação
      document.getElementById("campos_basicos").style.display = "block"; // Exibe apenas campos básicos
    }
  }

  // Chama a função ao carregar a página
  mostrarCamposAdicionais();

  // Chama a função ao carregar a página
  mostrarCamposAdicionais();
</script>

</body>

</html>