<h3>Quelques Moyennes sur votre selection</h3>

        <?php
        $niveauAccreditation = $_SESSION['role'];
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
        $admin = false;
        $superAdmin = false;
        if($niveauAccreditation == 3 || $niveauAccreditation == 2)
        {
           $admin = true;
           if($niveauAccreditation == 3)
           {
              $superAdmin = true;
           }
        }
        ?>
 
        <table>
            <tbody>
                <tr>
                    <td><p>résulat <?= $nbValeur ?></p></td>
                    <td><p class="key">Surface</p></td>
                    <td><p class="key">Population</p></td>
                    <td><p class="key">Espérance de vie</p></td>
                </tr>
                <tr>
                    <td><p class="key">Moyennes</p></td>
                    <td><p class="val"><?= round($totSuf/$nbValeur,2)?></p></td>
                    <td><p class="val"><?= round($totPop/$nbValeur,2)?></p></td>
                    <td><p class="val"><?= round($totLif/$nbValeur,2)?></p></td>
                </tr>
            </tbody>
        </table>
        <main class="grid">

        <?php for($i=0; $i<count($country); $i++): ?>

            <?php if($admin==true): ?>
                  <form method="post" name="frmUpdate<?php echo $i?>"  class ="drapCell" style="--background:url(/sources/svg/<?=$country[$i]->Code()?>.svg)" onsubmit="return validateFormUpda(<?php echo $i?>)">
            <?php elseif($admin==false): ?>
                  <div class ="drapCell" style="--background:url(/sources/svg/<?=$country[$i]->Code()?>.svg)">
            <?php endif; ?>

                <section>
                  <div class="poepl">
                     <p class="smlInfo">Population de</p>
                     <?php if($admin): ?>
                        <input type="number" name ="population" class="bigInput" value="<?= $country[$i]->Population()?>" required  style="width:<?php echo strlen($country[$i]->Population())*9 ?>px">
                     <?php elseif(!$admin): ?>
                        <p class="bigInfo"><?= $country[$i]->Population()?></p>
                     <?php endif; ?>
                  </div>
                  <div class="locatn">
                     <p class="smlInfo">Surface en km²</p>
                     <?php if($admin): ?>
                        <input type="number" name ="surface" class="midInput" value="<?= $country[$i]->Surface()?>" required style="width:<?php echo strlen($country[$i]->Surface())*10 ?>px">
                     <?php elseif(!$admin): ?>
                        <p class="midInfo"><?= $country[$i]->Surface()?></p>
                     <?php endif; ?>
                  </div>    
                  <div class="poepl">
                     <p class="smlInfo">Espérance de vie</p>
                     <?php if($admin): ?>
                        <input type="number" name ="lifeExpectancy" class="bigInput" value="<?= $country[$i]->LifeExpectancy()?>" required style="width: 45px">
                     <?php elseif(!$admin): ?>
                        <p class="bigInfo"><?= $country[$i]->LifeExpectancy()?></p>
                     <?php endif; ?>
                  </div>
                </section>

                <section>
                  <div class="politc">
                     <p class="smlInfo">Année d'Indépendance </p>
                     <?php if($admin): ?>
                        <input type="number" name ="indepYear" class="midInput" value="<?= $country[$i]->IndepYear()?>" required style="width:45px">
                     <?php elseif(!$admin): ?>
                        <p class="midInfo"><?= $country[$i]->IndepYear()?></p>
                     <?php endif; ?>                  
                  </div>
                  <div class="nomina">
                     <p class="smlInfo">Code3 du Pays </p>
                     <?php if($admin): ?>
                        <input type="text" name ="code" class="bigInput" value="<?= $country[$i]->Code()?>" readonly ="readonly"  style="width:<?php echo strlen($country[$i]->Code())*9 ?>px">
                     <?php elseif(!$admin): ?>
                        <p class="bigInfo"><?= $country[$i]->Code()?></p>
                     <?php endif; ?>            
                  </div> 
                  <div class="locatn">                
                     <p class="smlInfo">Continent </p>
                     <?php if($admin): ?>
                        <input type="text" name ="continent" class="bigInput" value="<?= $country[$i]->Continent()?>" required style="width:<?php echo strlen($country[$i]->Continent())*7 ?>px">
                     <?php elseif(!$admin): ?>
                        <p class="bigInfo"><?= $country[$i]->Continent()?></p>
                     <?php endif; ?>
                  </div>               
                </section>  

                <section> 
  
                  <div class="nomina">
                     <p class="smlInfo">Name du Pays</p>
                     <?php if($admin): ?>
                        <input type="text" name ="nameCountry" class="vbigInput" value="<?= $country[$i]->NameCountry()?>" required style="width:<?php echo strlen($country[$i]->NameCountry())*11 ?>px">
                     <?php elseif(!$admin): ?>
                        <p class="vbigInfo"><?= $country[$i]->NameCountry()?></p>
                     <?php endif; ?>
                  </div>

                </section>

                <section>
                  <div class="politc">
                     <p class="smlInfo">Régime Gouv</p>
                     <?php if($admin): ?>
                        <input type="text" name ="governmentForm" class="midInput" value="<?= $country[$i]->GovernmentForm()?>" required style="width:<?php echo strlen($country[$i]->GovernmentForm())*6 ?>px">
                     <?php elseif(!$admin): ?>
                        <p class="midInfo"><?= $country[$i]->GovernmentForm()?></p>
                     <?php endif; ?>
                  </div>
                  <div class="politc">  
                     <p class="smlInfo">Tête de l'état</p>
                     <?php if($admin): ?>
                        <input type="text" name ="headOfState" class="midInput" value="<?= $country[$i]->HeadOfState()?>" required style="width:<?php echo strlen($country[$i]->HeadOfState())*7 ?>px">
                     <?php elseif(!$admin): ?>
                        <p class="midInfo"><?= $country[$i]->HeadOfState()?></p>
                     <?php endif; ?>
                   </div> 
                </section>  

         <?php if($admin==true): ?>
            <section>
               <div>
                  <input type="submit" value="update" name ="update" class="btnUpdate">   
               </div>
               <?php if($superAdmin==true): ?>   
                  <div>
                     <span name ="delete" class="btnDelete">Delete</span>
                  </div>
               <?php endif; ?>
            </section>
         </form>
         <?php elseif($admin==false): ?>
         </div>
         <?php endif; ?>
      <?php endfor; ?>
      
      <?php if($superAdmin==true): ?>  

         <form method="POST"  class="drapCell" name ="frmUpdateCrea" onsubmit="return validateFormCrea()">

            <section>
                  <div class="poepl">
                     <p class="smlInfo">Population de </p>
                        <input type="number" name ="population" class="bigInput" required  style="width:90px">
                  </div>
                  <div class="locatn">
                     <p class="smlInfo">Surface en km² </p>
                        <input type="number" name ="surface" class="midInput" required style="width:120px">
                  </div>  
                  <div class="poepl">
                     <p class="smlInfo">Espérance de vie </p>
                        <input type="number" name ="lifeExpectancy" class="bigInput" required style="width: 90px">
                  </div>
            </section>

            <section>
                  <div class="politc">
                     <p class="smlInfo">Année d'Indépendance </p>
                        <input type="number" name ="indepYear" class="midInput" required style="width:45px">          
                  </div>
                  <div class="nomina">
                     <p class="smlInfo">Code3 du Pays </p>
                        <input type="text" name ="code" class="bigInput" required style="width: 45px">       
                  </div> 
                  <div class="locatn">                
                     <p class="smlInfo">Continent </p>
                        <input type="text" name ="continent" class="bigInput" required style="width:100px">
                  </div>               
            </section>  

            <section> 
                  <div class="nomina">
                     <p class="smlInfo">Name de Pays </p>
                        <input type="text" name ="nameCountry" class="vbigInput" required style="width:150px">
                  </div>
            </section>

            <section>
                  <div class="politc">
                     <p class="smlInfo">Régime Gouv</p>
                        <input type="text" name ="governmentForm" class="midInput" required style="width:120px">
                  </div>
                  <div class="politc">  
                     <p class="smlInfo">Tête de l'état</p>
                        <input type="text" name ="headOfState" class="midInput" required style="width:120px">
                   </div> 
            </section>  

            <section>
                  <div class="politc">
                     <p class="smlInfo">capitale</p>
                        <input type="text" name ="capitale" class="midInput" required style="width:110px">
                  </div>
                  <div class="politc">  
                     <p class="smlInfo">langue Officiel</p>
                        <input type="text" name ="officialLang" class="midInput" required style="width:110px">
                   </div> 
            </section>  
           

            <input type="submit" value="create" name ="create" class="btnUpdate">  

         </form>
      <?php endif; ?>   
        
</main>

