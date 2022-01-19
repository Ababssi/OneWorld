<h3>Quelques Moyennes sur votre selection</h3>

        <?php
        $nbValeur = count($city);     
        $totPop=0;

        foreach ($city as $value) {
        
              $totPop=$totPop+$value->Population();
        }
        ?>
        <table>
                <tbody>
                        <th>
                                <td><p class=" key poepl midInfo">Population</p></td>
                        </th>
                        <tr>
                                <td><p>Moyennes</p></td>
                                <td><p class=" val poepl midInfo"><?= round($totPop/$nbValeur,2)?></p></td>
                        </tr>
                </tbody>
        </table>

<main class="grid">
        <?php
        foreach ($city as $city): ?>
            <div class ="drapCell" style="--background:url(/sources/svg/
            <?= $city->CountryCode()?>.svg)">

                <section>  
                    <div class="locatn">
                        <p class="smlInfo">District : </p>
                        <p class="midInfo"><?=$city->District()?></p>
                    </div>
                    <div class="poepl">
                        <p class="smlInfo">Population : </p>
                        <p class="midInfo"><?=$city->Population()?> hab</p>
                    </div>

                </section>  

                <section>   
                    <div class="nomina">
                        <p class="midInfo">Name : </p>
                        <p class="vbigInfo"><?=$city->Name()?></p>
                    </div>
                    <div>
                        <p class="smlInfo">CountryCode : </p>
                        <p class="midInfo"><?=$city->CountryCode()?></p>
                    </div>  
                </section>  

            </div>
        
        <?php endforeach; ?>

        
</main>
