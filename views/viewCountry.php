<h3>Quelques Moyennes sur votre selection</h3>

        <?php
        $nbValeur = count($country);     
        $totSuf=0;
        $totPop=0;
        $totLif=0;
        $totGnp=0;
        $totGnpOld=0;

        foreach ($country as $value) {
                
              $totSuf=$totSuf+$value->Surface();
              $totPop=$totPop+$value->Population();
              $totLif=$totLif+$value->LifeExpectancy();
              $totGnp=$totGnp+$value->GNP();
              $totGnpOld=$totGnpOld+$value->GNPOld();
        }
        ?>
        <table>
            <tbody>
                <th>
                    <td><p class="key locatn midInfo">Surface</p></td>
                    <td><p class="key poepl midInfo">Population</p></td>
                    <td><p class="key poepl midInfo">Espérance de vie</p></td>
                    <td><p class="key econo midInfo">GNP</p></td>
                    <td><p class="key econo midInfo">GNPOld</p></td>
                </th>
                <tr>
                    <td><p>Moyennes</p></td>
                    <td><p class="key locatn midInfo"><?= round($totSuf/$nbValeur,2)?></p></td>
                    <td><p class="key poepl midInfo"><?= round($totPop/$nbValeur,2)?></p></td>
                    <td><p class="key poepl midInfo"><?= round($totLif/$nbValeur,2)?></p></td>
                    <td><p class="key econo midInfo"><?= round($totGnp/$nbValeur,2)?></p></td>
                    <td><p class="key econo midInfo"><?= round($totGnpOld/$nbValeur,2)?></p></td>
                </tr>
            </tbody>
        </table>
        <main class="grid">
        <?php
        
        foreach ($country as $country): ?>
            <div class ="drapCell" style="--background:url(/sources/svg/<?=$country->Code()?>.svg)">  

                <div>                   
                   <p class="key nomina midInfo">Name : </p>
                   <p class="val nomina bigInfo"><?= $country->NameCountry()?></p>
                </div>    
                <div>
                   <p class="key nomina midInfo">LocalName : </p>
                   <p class="val nomina bigInfo"><?= $country->LocalName()?></p>
                </div>   
                <div>
                   <p class="key nomina smlInfo">Code2 : </p>
                   <p class="val nomina smlInfo"><?= $country->Code2()?> </p>
                   <p class="key nomina smlInfo">Code3 : </p>
                   <p class="val nomina smlInfo"><?= $country->Code() ?></p> 
                </div>    
                <div>                    
                   <p class="key locatn smlInfo">Continent : </p>
                   <p class="val locatn midInfo"><?= $country->Continent()?></p>
                   <p class="key locatn smlInfo">Region : </p>
                   <p class="val locatn midInfo"><?= $country->Region()?></p>
                </div>  
                <div>
                   <p class="key locatn smlInfo">Surface : </p>
                   <p class="val locatn midInfo"><?= $country->Surface() ?> </p>
                </div>  
                <div>
                   <p class="key poepl midInfo">Population : </p>
                   <p class="val poepl bigInfo"><?= $country->Population()?> </p>
                </div>  
                <div>   
                   <p class="key poepl midInfo">LifeExpectancy : </p>
                   <p class="val poepl bigInfo"><?= $country->LifeExpectancy()?></p>
                </div>  
                <div>
                   <p class="key econo midInfo">GNP : </p>
                   <p class="val econo bigInfo"><?= $country->GNP() ?> </p>
                   <p class="key econo smlInfo">GNPOld : </p>
                   <p class="val econo midInfo"><?= $country->GNPOld()?> </p>
                </div>  
                <div>
                   <p class="key politc smlInfo">IndepYear : </p>
                   <p class="val politc midInfo"><?= $country->IndepYear() ?></p>   
                </div>  
                <div>
                   <p class="key politc smlInfo">Gov : </p>
                   <p class="val politc midInfo"><?= $country->GovernmentForm() ?></p>  
                </div>  
                <div>  
                   <p class="key politc smlInfo">HeadOfState: </p>
                   <p class="val politc midInfo"><?= $country->HeadOfState()?></p>
                </div>  


                
           </div>   
        <?php endforeach; ?>  
        <p>Nombre de résulat : <?= $nbValeur ?></p>
</main>
