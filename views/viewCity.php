<h3>Toutes les villes du monde :</h3>
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