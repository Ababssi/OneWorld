<h3>Tous les pays du monde :</h3>
<main class="grid">
        <?php
        foreach ($country as $country): ?>
                <div class ="drapCell" style="--background:url(/sources/RoundFlag/<?=strtolower($country->NameCountry())?>.svg)">
                        <p>NameCountry : <?= $country->NameCountry()?></p>
                        <p>CountryCode : <?= $country->Code() ?></p>                       
                        <p>Continent : <?= $country->Continent()?></p>
                        <p>Surface : <?= $country->Surface() ?> km²</p>
                        <p>Population : <?= $country->Population()?> hab</p>
                </div>   
        <?php endforeach; ?>  
</main>
