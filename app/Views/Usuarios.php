<?= $this->extend('default') ?>
<?= $this->section('content') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- STYLES -->
    <style>
        body {
            background-image:whitesmoke;
            background-size: cover;
            background-repeat: no-repeat;
        }
        table{
            background-color: whitesmoke;
        }
        th,
        td{
            width: 300px;
        }
    </style>
</head>

<body>
    <main>
        <div style="width:50%; margin:0 auto;">
            <h1>Bem Vindo a pagina de usuarios</h1>


            <table>
                <tr>
                    <th>ID</th>
                    <th>E-mail<th>
                </tr>
            </table>
            <?php foreach ($usuarios as $usuario) : ?>
                <tr>
                    <td id="id"><?php echo ($usuario['id']) ?></td>
                    <td id="nome"><?php echo ($usuario['email']) ?></td>
                </tr>
            <?php endforeach; ?>
        </div>
    </main>
</body>

</html>

<?= $this->endSection() ?>