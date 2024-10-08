<?php 
    include "conx.php";
    
    session_start();
    if (isset($_POST["email"]) && isset($_POST["pass"])) {
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $sql = "SELECT * FROM usuario WHERE email = '$email' AND passe = '$pass'";
        $result = $conn->query("$sql");
        if ($result->num_rows == 1) {
            echo "<h1>SignIn feito com sucesso, já tens acesso a nossa aplicação.</h1>";
            header("Location:index.html");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <script>
        var signup = <?php echo json_encode(isset($_SESSION["signup"]) ? $_SESSION["signup"] : false); ?>;

        if (signup === true) {
            alert("Conta criada com sucesso, já podes fazer login.");
        
            // Redefine a variável da sessão para false
            <?php
                $_SESSION["signup"] = false; // Redefinindo a variável
                session_write_close(); // Garante que as alterações na sessão sejam salvas
            ?>
        }
    </script>

    <div>
	    <form action="" method="post">
			<label for="">Email</label>
            <input type="email" name="email" placeholder="E-mail">
            <label for="">Palavra-passe</label>
			<input type="password" name="pass" placeholder="Palavra-passe">
			<input type="submit" class="btn-primary" value="Login">
		</form>	
	</div>
</body>
</html>