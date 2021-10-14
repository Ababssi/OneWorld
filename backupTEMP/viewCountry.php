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
                                <td><p>Surface</p></td>
                                <td><p>Population</p></td>
                                <td><p>Espérance de vie</p></td>
                                <td><p>GNP</p></td>
                                <td><p>GNPOld</p></td>
                        </th>
                        <tr>
                                <td><p>Moyennes</p></td>
                                <td><p><?= round($totSuf/$nbValeur,2)?></p></td>
                                <td><p><?= round($totPop/$nbValeur,2)?></p></td>
                                <td><p><?= round($totLif/$nbValeur,2)?></p></td>
                                <td><p><?= round($totGnp/$nbValeur,2)?></p></td>
                                <td><p><?= round($totGnpOld/$nbValeur,2)?></p></td>
                        </tr>
                </tbody>
        </table>
        <main class="grid">
        <?php
        foreach ($country as $country): ?>
                <div class ="drapCell" style="--background:url(/sources/svg/<?=$country->Code()?>.svg)">                     
                        <p>NameCountry : <?= $country->NameCountry()?></p>
                        <p>CountryCode : <?= $country->Code() ?></p>                       
                        <p>Continent : <?= $country->Continent()?></p>
                        <p>Surface : <?= $country->Surface() ?> </p>
                        <p>Population : <?= $country->Population()?> </p>
                        <p>Region : <?= $country->Region()?></p>
                        <p>IndepYear : <?= $country->IndepYear() ?></p>      
                        <p>LifeExpectancy : <?= $country->LifeExpectancy()?></p>
                        <p>GNP : <?= $country->GNP() ?> </p>
                        <p>GNPOld : <?= $country->GNPOld()?> </p>
                        <p>LocalName : <?= $country->LocalName()?></p>
                        <p>Gov : <?= $country->GovernmentForm() ?></p>    
                        <p>HeadOfState: <?= $country->HeadOfState()?></p>
                        <p>Capital : <?= $country->Capital() ?> </p>
                        <p>Code2 : <?= $country->Code2()?> </p>
                </div>   
        <?php endforeach; ?>  
        <p>Nombre de résulat : <?= $nbValeur ?></p>
</main>
