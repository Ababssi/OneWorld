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
                                <td><p>Population</p></td>
                        </th>
                        <tr>
                                <td><p>Moyennes</p></td>
                                <td><p><?= round($totPop/$nbValeur,2)?></p></td>
                        </tr>
                </tbody>
        </table>

<main class="grid">
<?php
foreach ($city as $city): ?>
        <div class ="drapCell" style="--background:url(/sources/svg/<?= $city->CountryCode()?>.svg)">
                <p>Name : <?= $city->Name() ?></p>  
                <p>CountryCode : <?= $city->CountryCode() ?></p>    
                <p>District : <?= $city->District() ?></p>
                <p>Population : <?= $city->Population()?> hab</p>
        </div>
<?php endforeach; ?>
</main>