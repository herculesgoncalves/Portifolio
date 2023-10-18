<?php 
require_once("conexao.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $nome_sistema ?></title>
	<meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<link rel="shortcut icon" type="image/x-icon" href="img/icone.png">

</head>
<body>

	<section class="vh-100" style="background-color: #f0f0f0;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
          	
          	<img src="img/logo.png" width="200px" style="margin-bottom: 20px">

          	<form method="post" action="autenticar.php">
            <div class="form-outline mb-4">
            	
              <input name="email" type="email" id="typeEmailX-2" class="form-control" placeholder="Email" required/>
              
            </div>

            <div class="form-outline mb-4">
            	  
              <input name="senha" type="password" id="typePasswordX-2" class="form-control " placeholder="Senha" required/>
            
            </div>       

            <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Login</button>
        	</div>

        </form>

            <hr class="my-4">

          <div align="center"><small><a href="#" data-bs-toggle="modal" data-bs-target="#modalRecuperar">Recuperar Senha</a></small></div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>




<!-- Modal -->
<div class="modal fade" id="modalRecuperar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recuperar Senha</h5>
        <button id="btn-fechar-recuperar" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
        <div class="modal-body">

          <form id="form-recuperar">
            <div class="row">
              <div class="col-md-8">
                  <input name="email" type="email" id="typeEmailX-2" class="form-control" placeholder="Digite seu Email" required/>
              </div>
              <div class="col-md-4">
                      <button class="btn btn-primary" type="submit">Recuperar</button>            
              </div>
            </div>
          </form>  
          <hr>        
          <small><div id="mensagem-recuperar" align="center"></div></small>

        </div>
       
     
    </div>
  </div>
</div>



  <!-- jQery -->
  <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>

<script type="text/javascript">
  

$("#form-recuperar").submit(function () {
  $('#mensagem-recuperar').text('...Carregando!')

    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: "recuperar.php",
        type: 'POST',
        data: formData,

        success: function (mensagem) {
            $('#mensagem-recuperar').text('');
            $('#mensagem-recuperar').removeClass()
            if (mensagem.trim() == "Recuperado com Sucesso") {  
              $('#mensagem-recuperar').addClass('text-success')
              $('#mensagem-recuperar').text('Sua Senha foi enviada para seu email!')
            } else {
                $('#mensagem-recuperar').addClass('text-danger')
                $('#mensagem-recuperar').text(mensagem)
            }


        },

        cache: false,
        contentType: false,
        processData: false,

    });

});


</script>