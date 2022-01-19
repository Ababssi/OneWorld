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

              <section> 
                <div class="locatn">
                    <p class="smlInfo">CountryCode : </p>
                    <p class="midInfo"><?= $countrylanguage->CountryCode() ?></p>    
                </div>  
                <div class="nomina">
                    <p class="midInfo"></p>
                    <p class="vbigInfo">The <?= $countrylanguage->Language() ?></p>
                </div> 
              </section> 


              <section>
                <div class="politc">                 
                    <p class="midInfo">IsOfficial : </p>
                    <p class="bigInfo"><?= $countrylanguage->IsOfficial() ?></p>
                </div>  
                <div class="poepl">
                    <p class="midInfo"></p>
                    <p class="bigInfo"><?= $countrylanguage->Percentage()?>% </p>
                </div>  
              </section>  

              </div>        
            
        <?php endforeach; ?>  
</main>