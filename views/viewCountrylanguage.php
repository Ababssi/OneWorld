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
                            <td><p class="key poepl midInfo">Percentage</p></td>
                     </th>
                     <tr>
                            <td><p>Moyennes</p></td>
                            <td><p class="val poepl midInfo"><?= round($totPer/$nbValeur,2)?></p></td>
                     </tr>
                </tbody>
        </table>

<main class="grid">
        <?php
        foreach ($countrylanguage as $countrylanguage): ?>
           <div class ="drapCell" style="--background:url(/sources/svg/<?= $countrylanguage->CountryCode()?>.svg)">
                <div>
                        <p class="key nomina midInfo"></p>
                        <p class="val nomina bigInfo"><?= $countrylanguage->Language() ?></p>
                </div>  
                <div>
                        <p class="key locatn smlInfo">CountryCode : </p>
                        <p class="val locatn smlInfo"><?= $countrylanguage->CountryCode() ?></p>    
                </div>  
                <div>                 
                        <p class="key politc midInfo">IsOfficial : </p>
                        <p class="val politc bigInfo"><?= $countrylanguage->IsOfficial() ?></p>
                </div>  
                <div>
                        <p class="key poepl midInfo"></p>
                        <p class="val poepl bigInfo"><?= $countrylanguage->Percentage()?>% </p>
                </div>            
            </div>
        <?php endforeach; ?>  
</main>