<?= $this->extend('default') ?>
<?= $this->section('content') ?>

<section class="mt-2">
    <?php
    $ano = date("Y");
    $mes = date("m");

    ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script type="text/javascript">
    function gerarRelatorio() {
        var doc = new jsPDF();
        doc.setFontSize(25)
        doc.text(85, 10, "BalançoCaixa")
        doc.setFontSize(14)
        doc.text(10, 30, "Id")
        doc.text(25, 30, "descrição")
        doc.text(110, 30, "data")
        doc.text(160, 30, "valor")
        doc.text(190, 30, "tipo")
        <?php
        $data = $this->data;
        $numero = 40;
        foreach ($data['moviments'] as $moviment) {
            echo 'doc.text(10, ' . $numero . ', "' . $moviment['id'] . '")
            '; 
            echo 'doc.text(20, ' . $numero . ', "' . $moviment['description'] . '")
            ';
            echo 'doc.text(100, ' . $numero . ', "' . $moviment['date'] . '")
            ';
            echo 'doc.text(155, ' . $numero . ', "R$ ' . $moviment['value'] . '")
            ';
            echo 'doc.text(185, ' . $numero . ', "' . $moviment['type'] . '")
            ';
            $numero += 7;
        }
        echo 'doc.text(80, 275, "Saldo: R$ ' . $data['balanco_caixa'] . '")
        ';
        ?>
        doc.addPage();
        doc.save('BalançoCaixa.pdf');


    }
</script>
<style>
    #btn-dark{
        background-color: #091c47;
        color: white;
        margin-top: 0.5em;
        margin-bottom: 0.5em;
        margin-left: 5vw;
    }
</style>
    <form method="post" action="<?= base_url('moviments/filtrar') ?>">
        <div id="header-moviment">
            
            <div class="input-group">
                <label class="input-group-text" for="inputGroupSelect01">Mês</label>
                <select class="form-select" id="inputGroupSelect01" name="mes">
                    <?php
                    echo "<option value='$mes'>Mes</option>";
                    ?>
                    <option value="1">Jan</option>
                    <option value="2">Fev</option>
                    <option value="3">Mar</option>
                    <option value="4">Abr</option>
                    <option value="5">Mai</option>
                    <option value="6">Jun</option>
                    <option value="7">Jul</option>
                    <option value="8">Ago</option>
                    <option value="9">Set</option>
                    <option value="10">Out</option>
                    <option value="11">Nov</option>
                    <option value="12">Dez</option>
                </select>
            </div>
            <div class="input-group">
                <label class="input-group-text" for="inputGroupSelect01">Ano</label>
                <select class="form-select" id="inputGroupSelect01" name="ano">
                    <?php
                    echo "<option value='$ano' selected>$ano</option>";
                    $ano = $ano + 1;
                    echo "<option value='$ano' selected>$ano</option>";
                    $ano = $ano - 1;
                    echo "<option value='$ano' >$ano</option>";
                    $ano = $ano - 1;
                    echo "<option value='$ano' >$ano</option>";
                    $ano = $ano - 1;
                    echo "<option value='$ano' >$ano</option>";
                    $ano = $ano - 1;
                    echo "<option value='$ano' >$ano</option>";
                    $ano = $ano - 1;
                    echo "<option value='$ano' >$ano</option>";
                    $ano = $ano - 1;
                    echo "<option value='$ano' >$ano</option>";
                    $ano = $ano - 1;
                    echo "<option value='$ano' >$ano</option>";
                    $ano = $ano - 1;
                    echo "<option value='$ano' selected>$ano</option>";
                    $ano = $ano - 1;
                    echo "<option value='$ano' >$ano</option>";
                    $ano = $ano - 1;
                    echo "<option value='$ano' >$ano</option>";
                    $ano = $ano - 1;
                    echo "<option value='$ano' >$ano</option>";
                    $ano = $ano - 1;
                    echo "<option value='$ano' >$ano</option>";
                    ?>

                </select>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <a target="_blank" type="btn" class="btn btn-dark p-3 fs-6" id="btn-dark" onclick="gerarRelatorio()">Baixar</a>
                    </div>
                </div>
            </div>
            <button class="btn btn-dark" id="btn-dark"> Buscar </button>
        </div>
    </form>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Descrição</th>
                <th scope="col">Data</th>
                <th scope="col">Valor</th>
                <th scope="col">Input</th>
                <th scope="col">Output</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($this->data['moviments'] as $moviment) {

                echo "<tr>
        <td>{$moviment['id']}</td>
        <td>{$moviment['description']}</td>
        <td>{$moviment['date']}</td>
        <td>{$moviment['value']}</td>";
                if ($moviment['type'] == "input") {
                    echo "<td>*</td><td> - </td>";
                } else {
                    echo "<td> - </td><td> * </td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
        <table>
        <div class="input-group">
                <span class="input-group-text" id="basic-addon1">Cash balance</span>
                <input type="text" class="form-control" id="input-cash-balance" value="R$<?php echo $this->data['balanco_caixa']; ?>" disabled>
        </div>
        <div class="d-flex justify-content-end">
                <a href="<?= site_url('form')?>" id="btn-dark" class="btn btn-success mb-2">Add</a>
            </div>
</section>

<?= $this->endSection() ?>