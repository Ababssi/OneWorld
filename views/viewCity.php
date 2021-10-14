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
        <div class ="drapCell" style="--background:url(/sources/svg/<?= $city->CountryCode()?>.svg)">
            <div>
                    <p class="key nomina smlInfo">Name : </p>
                    <p class="val nomina bigInfo"><?=$city->Name()?></p>
            </div>
            <div>
                    <p class="key nomina smlInfo">CountryCode : </p>
                    <p class="val nomina smlInfo"><?=$city->CountryCode()?></p>
            </div>  
            <div>
                    <p class="key locatn midInfo">District : </p>
                    <p class="val locatn bigInfo"><?=$city->District()?></p>
            </div>
            <div>
                    <p class="key poepl midInfo">Population : </p>
                    <p class="val poepl bigInfo"><?=$city->Population()?> hab</p>
            </div>
        </div>
        <?php endforeach; ?>
</main>
