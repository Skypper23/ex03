<?php 
    include "conx.php";
    
    session_start();

    if (isset($_POST["new-email"]) && isset($_POST["new-pass"])) {
        $email = $_POST["new-email"] ?: "vazio";
        $pass = $_POST["new-pass"] ?: "vazio";
        $code_sql = "INSERT INTO usuario (email, passe) VALUES ('$email', '$pass')";
        $code_sql2 = "SELECT * FROM usuario WHERE email = '$email'";
        $result2 = $conn->query($code_sql2);
        if ($result2->num_rows>0) {
            echo "<h1>Já existe uma conta com esse email</h1>";
        }elseif ($email == "vazio" | $pass == "vazio") {
            echo "<h1>Tens de completar todos os campos de texto.</h1>";
        }
        elseif ($email !== "vazio" && $pass !== "vazio" && $result2->num_rows<=0){
            $result = $conn->query("$code_sql");
            $_SESSION["signup"] = true;
            header("Location: login.php");
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
    <div>
	    <form action="" method="post">
			<input type="email" name="new-email" placeholder="E-mail">
			<input type="password" name="new-pass" placeholder="Palavra-passe">
			<input type="submit" class="btn-primary" value="Login">
		</form>	
	</div>
</body>
</html>