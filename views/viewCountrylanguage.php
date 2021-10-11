<h3>Toutes les langues parlées du monde :</h3>
<main class="grid">
        <?php
        foreach ($countrylanguage as $countrylanguage): ?>
                <div class ="drapCell" style="--background:url(/sources/svg/<?= $countrylanguage->CountryCode()?>.svg)">
                        <p>Language : <?= $countrylanguage->Language() ?></p>
                        <p>CountryCode : <?= $countrylanguage->CountryCode() ?></p>                     
                        <p>IsOfficial : <?= $countrylanguage->IsOfficial() ?></p>
                        <p>Percentage : <?= $countrylanguage->Percentage() ?></p>
                </div>   
        <?php endforeach; ?>  
</main>