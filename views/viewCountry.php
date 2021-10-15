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
                <tr>
                    <td><p>résulat <?= $nbValeur ?></p></td>
                    <td><p class="key">Surface</p></td>
                    <td><p class="key">Population</p></td>
                    <td><p class="key">Espérance de vie</p></td>
                    <td><p class="key">GNP</p></td>
                    <td><p class="key">GNPOld</p></td>
                </tr>
                <tr>
                    <td><p class="key">Moyennes</p></td>
                    <td><p class="val"><?= round($totSuf/$nbValeur,2)?></p></td>
                    <td><p class="val"><?= round($totPop/$nbValeur,2)?></p></td>
                    <td><p class="val"><?= round($totLif/$nbValeur,2)?></p></td>
                    <td><p class="val"><?= round($totGnp/$nbValeur,2)?></p></td>
                    <td><p class="val"><?= round($totGnpOld/$nbValeur,2)?></p></td>
                </tr>
            </tbody>
        </table>
        <main class="grid">
        <?php
        
        foreach ($country as $country): ?>
            <div class ="drapCell" style="--background:url(/sources/svg/<?=$country->Code()?>.svg)">  

                <section >
                  <div class="poepl" >
                     <p class="smlInfo">Population </p>
                     <p class="bigInfo"><?= $country->Population()?> </p>
                  </div>
                  <div class="poepl">
                     <p class="smlInfo">LifeExpectancy </p>
                     <p class="bigInfo"><?= $country->LifeExpectancy()?></p>
                  </div>
                </section>  

                <section >    
                  <div class="locatn">
                     <p class="smlInfo">Region </p>
                     <p class="midInfo"><?= $country->Region()?></p>
                  </div>
                  <div class="locatn">                
                     <p class="smlInfo">Continent </p>
                     <p class="bigInfo"><?= $country->Continent()?></p>
                  </div>
                  <div class="locatn">
                     <p class="smlInfo">Surface </p>
                     <p class="midInfo"><?= $country->Surface() ?> </p>
                  </div>
                </section>  

                <section> 
                  <div class="nomina">
                     <p class="smlInfo">LocalName </p>
                     <p class="midInfo"><?= $country->LocalName()?></p>
                  </div>
                  <div class="nomina">
                     <p class="smlInfo">Name </p>
                     <p class="vbigInfo"><?= $country->NameCountry()?></p>
                  </div>
                  <div class="nomina">
                     <p class="smlInfo">Code2 </p>
                     <p class="midInfo"><?= $country->Code2()?> </p>
                  </div>
                  <div class="nomina">
                     <p class="smlInfo">Code3 </p>
                     <p class="midInfo"><?= $country->Code() ?></p>
                  </div> 
                </section>

                <section>
                  <div class="politc">
                     <p class="smlInfo">IndepYear </p>
                     <p class="midInfo"><?= $country->IndepYear() ?></p>  
                  </div>
                  <div class="politc"> 
                     <p class="smlInfo">Gov </p>
                     <p class="midInfo"><?= $country->GovernmentForm() ?></p>
                  </div>
                  <div class="politc">  
                     <p class="smlInfo">HeadOfState </p>
                     <p class="midInfo"><?= $country->HeadOfState()?></p>
                   </div> 
                </section>  

                <section>
                  <div class="econo">
                     <p class="smlInfo">GNP </p>
                     <p class="bigInfo"><?= $country->GNP() ?> </p>
                  </div>
                  <div class="econo">
                     <p class="smlInfo">GNPOld </p>
                     <p class="midInfo"><?= $country->GNPOld()?> </p>
                  </div>
                </section>  
       
           </div>   
        <?php endforeach; ?>  
        
</main>
