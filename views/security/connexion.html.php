<?php
$errors = $_SESSION["errors"] ?? [];
$email = $_SESSION["email"] ?? "";
unset($_SESSION["errors"], $_SESSION["email"]);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Gestion des Inscriptions Scolaires</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .login-bg {
            background-image: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body class="login-bg min-h-screen flex items-center justify-center p-4 ;">
   
    <div class="w-full max-w-md p-8 border-r-4 border-green-400 rounded-md shadow-md space-y-6 bg-white bg-opacity-80">
        <h2 class="text-2xl font-bold text-center text-blue-700">Connexion à la plateforme</h2>
        <p class="text-sm text-center text-gray-600">Accédez à votre espace de gestion des inscriptions scolaires</p>
        <form class="space-y-4" method="post">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Adresse Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 mt-1 text-gray-700 bg-gray-100 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Entrez votre email" value="<?= $_POST["email"] ?? "" ?>">
            </div>
            <span class="text-red-500"><?= $_SESSION["error"]["email"] ?? "" ?></span>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Mot de passe</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 mt-1 text-gray-700 bg-gray-100 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Entrez votre mot de passe" value="<?= $_POST["password"] ?? "" ?>">
            </div>
            <span class="text-red-500"><?= $_SESSION["error"]["mot_de_passe"] ?? "" ?></span>
            <button type="submit" class="w-full px-4 py-2 font-bold text-white bg-blue-600 rounded-lg hover:bg-blue-700">Se connecter</button>
        </form>
        <p class="text-sm text-center text-gray-600">Pas encore de compte ? <a href="#" class="text-blue-500 hover:underline">Inscrivez-vous</a></p>
    </div>
    
</body>

</html>