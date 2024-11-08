<?php

$name = $age = $gender = $profession = $hobby = "";
$message = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $profession = $_POST['profession'];
    $hobby = $_POST['hobby'];


    if (isset($_POST['modify'])) {
        $message = "Por favor, modifique los datos.";
    } elseif (isset($_POST['accept'])) {

        $message = "Los datos son correctos:\n\n";
        $message .= "Nombre: " . $name . "\n";
        $message .= "Edad: " . $age . "\n";
        $message .= "Sexo: " . $gender . "\n";
        $message .= "Profesión: " . $profession . "\n";
        $message .= "Pasatiempo: " . $hobby . "\n";
    }
} else {

    $message = "Por favor, ingrese sus datos.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Datos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
        }
        .form-container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Formulario de Información</h2>
        <form method="post">
            <?php if ($message): ?>
                <p><?php echo nl2br($message); ?></p>
            <?php endif; ?>


            <?php if (!isset($_POST['accept']) && !isset($_POST['modify'])): ?>
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>

                <label for="age">Edad:</label>
                <input type="number" id="age" name="age" required>

                <label for="gender">Sexo:</label>
                <select id="gender" name="gender" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>

                <label for="profession">Profesión:</label>
                <input type="text" id="profession" name="profession" required>

                <label for="hobby">Pasatiempo:</label>
                <input type="text" id="hobby" name="hobby" required>

                <div class="buttons">
                    <button type="submit">Enviar</button>
                </div>
            <?php else: ?>
                
                <div class="buttons">
                    <button type="submit" name="accept">Aceptar</button>
                    <button type="submit" name="modify">Modificar</button>
                </div>
            <?php endif; ?>
        </form>
    </div>

</body>
</html>
