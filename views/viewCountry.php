<h3>Tous les pays du monde :</h3>
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
</main>
