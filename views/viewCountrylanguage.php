<h3>Quelques Moyennes sur votre selection</h3>

        <?php
        $nbValeur = count($countrylanguage);     
        $totPer=0;

        foreach ($countrylanguage as $value) {
        
              $totPer=$totPer+$value->Percentage();
        }
        ?>
        <table>
                <tbody>
                        <th>
                                <td><p>Percentage</p></td>
                        </th>
                        <tr>
                                <td><p>Moyennes</p></td>
                                <td><p><?= round($totPer/$nbValeur,2)?></p></td>
                        </tr>
                </tbody>
        </table>

<main class="grid">
        <?php
        foreach ($countrylanguage as $countrylanguage): ?>
                <div class ="drapCell" style="--background:url(/sources/svg/<?= $countrylanguage->CountryCode()?>.svg)">
                        <p><?= $countrylanguage->Language() ?></p>
                        <p>CountryCode : <?= $countrylanguage->CountryCode() ?></p>                     
                        <p>IsOfficial : <?= $countrylanguage->IsOfficial() ?></p>
                        <p><?= $countrylanguage->Percentage()?>% </p>
                </div>   
        <?php endforeach; ?>  
</main>