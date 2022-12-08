<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>cashbook</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- STYLES -->
    <style>
        * {
            color: #000
        }
        #nav{
            background: #091c47;

        }
        #navbarNav {
            display: flex;
            justify-content: space-between;
        }

        main {
            padding: 1vh 2vh;
        }

        #header-moviment {
            display: flex;
        }

        #form-moviment {
            width: 60%;
            margin: 0 auto;
        }
        #btn-danger{
            background-color: #000;
            border-color: #ff0000;
        }
        .bg-darkk{
            background-color:#363636;
        }

        #a-header{

            color:#fff !important;
        }
        
    </style>
    <link href="<?php echo  base_url() ?>/public/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-darkk" id="nav">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="<?php echo base_url() ?>/public/assets/templates/default/images/cifrao.png" style="width:3rem" class="d-inline-block align-text-top" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="text-white nav-link active" id="a-header" aria-current="page" href="<?php echo base_url() ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-white nav-link" id="a-header" href="<?php echo base_url() ?>/moviments">Moviment</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-white nav-link" id="a-header" href="<?php echo base_url() ?>/reports">Reports</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-white nav-link " id="a-header" href="<?php echo base_url() ?>/users">Users</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        <a href="<?php echo base_url() ?>/user/logout">
                            <button class="btn btn-danger text-white p-2" id="btn-danger" style="color:#F00">Logout</button>
                        </a>

                    </span>
                </div>
            </div>
        </nav>
    </header>
    <?= $this->renderSection('content') ?>
</body>