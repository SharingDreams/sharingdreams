<?php
	ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>Edit!</title>
		<link rel="stylesheet" href="assets/css/others/bootstrap.css">
		<link rel="stylesheet" href="assets/css/index.css">
		<link rel="stylesheet" href="assets/css/cadastro.css">
		<link rel="stylesheet" href="assets/css/others/datepicker.css">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
		<script src="assets/js/others/jquery.js"></script>
		<script src="assets/js/others/jquery-ui-1.10.4.custom.min.js"></script> 
		<script src="assets/js/others/bootstrap.js"></script>
		<script src="assets/js/others/datepicker.js"></script>  
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-60227935-1', 'auto');
          ga('send', 'pageview');

        </script>
	</head>
	<body>

		<style>
			.botoes {
				display: inline-block;
				margin-bottom: 10px;
				margin-left: 8px;
			}
			
			.editar {
				background-color: green;
				color: white;
			}

			.cancelar {
				color: black;
				background-color: gray;
				padding: 10px;
				text-decoration: none;
			}
		</style>


		<div class="top tp_marginlg">
            <div class="logo">
                <a href='/gallery'><img src="assets/img/logo.png" class="logo_img"></a>
            </div>
            <ul class="menu_list">
                <li><a href="/gallery" id="menu">Gallery</a></li>
                <li><a href="/submit" id="menu">Submit</a></li>
                <li><a href="/editProfile" id="menu">Settings</a></li>
                <li><a href="deslogar.php" id="menu">Logout</a>
                </li>
				
				<?php if (isset($_SESSION['foto'])) : ?>
					<li>
						<a href="/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img class="perfil_img_menu" src='assets/fotos_perfil/<?php echo $_SESSION['foto']['nome']; ?>' width="50px" height="50px" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
					</li>
				<?php else : ?>
					<li>
						<a href="/conta.php?user=<?php echo $_SESSION['usuario']; ?>"><img class="perfil_img_menu" src="assets/img/sem-foto.png" width="50px" height="50px" style="-webkit-border-radius:500; -moz-border-radius: 500px; border-radius: 500px; float:right; margin-top:-20px;"></a>
					</li>
				<?php endif ?>
				</li>
            </ul>
        </div>
		<div class="hr"></div>
        <div class='form' style="text-align:center;">
        <center>
        	<div style="height:30px;"></div>

			<form method="post">
					<input type='hidden' name='id' value='<?php echo $cadastro['id']; ?>'>

					<label>
						<input type='password' id="passwordLogin" name='senha_atual' id='senha' placeholder='Type here your password'>
						<?php if ($tem_erros && isset($erros_validacao['senha_atual'])) : ?>
		               		<span class="erro"><?php echo $erros_validacao['senha_atual']; ?></span>
		           		<?php endif; ?>
					</label>

						<label>
							<input type='password' id="passwordLogin" name='senha' id='senha' placeholder='Type here your new password'>
							<?php if ($tem_erros && isset($erros_validacao['senha'])) : ?>
		                		<span class="erro"><?php echo $erros_validacao['senha']; ?></span>
		            		<?php endif; ?>
						</label>

						<label>
							<input type='password' id="passwordLogin" name='senha2' placeholder='Here your new password again!'>
							<?php if ($tem_erros && isset($erros_validacao['senha2'])) : ?>
		                		<span class="erro"><?php echo $erros_validacao['senha2']; ?></span>
		            		<?php endif; ?>
						</label>

						<br>

						<br>

						<p class='botoes cancelar'><a href="http://sharingdreams.co/gallery">Cancel</a></p>
						<button type='submit' class='botoes editar' name='editar'>Edit!</button>
						
				</form>
			</center>
		</div>
	</body>
</html>