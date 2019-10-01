<div class="col-md-12">
    <div class="row">
        <form action="ProcessarHistorico.php" method="post">
            <div class="form-group col-md-2 col-sm-6 col-md-offset-10" style="margin-top:22px;">
                <button style="color:#ffffff !important;" type="submit" class="btn btn-outline-success btn-md btn-block" name="enviar">Recarregar <img src="img/glyphicons-82-refresh.png" alt=""></button>
            </div>
        </form>
        <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
            <table class="table  table-striped table-hover">
                <caption style="font-family:'Century Gothic';background-color:#ff3300;color:#ffffff;font-size:12pt;font-weight:bolder;">ATIVIDADES REALIZADAS COM O CLIENTE</caption>
                <thead style="color:#000000;font-family:'Century Gothic';">
                    <tr>
                        <th scope="col">Nome do Cliente</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Assistencias solicitadas</th>
                        <th scope="col">Data de entrada na empresa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if (isset($_SESSION["historico"])) {
                         $tabela = $_SESSION["historico"];
                         $qtd = $_SESSION["row"];
                         for ($i=0; $i < $qtd; $i++) { 
                            echo "<tr>";
                            echo "<td>".$tabela[$i][0]." ".$tabela[$i][1]."</td>";
                            echo "<td>".$tabela[$i][2]."</td>";
                            echo "<td style='padding-left:80px;'>".$tabela[$i][4]."</td>";
                            echo "<td>".date_format(new DateTime($tabela[$i][3]),"d/m/Y")."</td>";
                            echo "</tr>";
                         }
                        }else{
                            echo "<tr>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>