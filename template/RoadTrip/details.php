<div class="relative">
    <img src="<?= $data['roadTrip'][0]->getIllustration() != null ? $data['roadTrip'][0]->getIllustration() : "https://picsum.photos/600/400/?random" ?>" class="w-full brightness-50 lg:h-full h-[50vh] lg:object-fill object-none"
         alt="background-liste-roadtrips"/>
    <div class="absolute text-white top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
        <h1 class="font-bold text-4xl lg:text-5xl"><?= $data['roadTrip'][0]->getIntitule() ?></h1>
    </div>
</div>
<div class="w-full flex flex-col lg:flex-row my-20">
    <div class="w-full lg:w-1/2" align="center">
        <h2 class="text-4xl font-bold text-black mb-5">DÉTAILS DU VOYAGE</h2>
        <?php foreach($data['listeCheckPoint'] as $index => $currentCheckpoint){ ?>
            <div class="flex justify-center">
                <div class="block p-6 rounded-lg shadow-lg bg-white w-4/5 border my-2">
                    <?php if(array_key_first($data['listeCheckPoint']) == $index) { ?>
                        <h3 class="text-gray-900 text-xl leading-tight font-medium mb-2 text-left">Départ</h3>
                        <hr class="h-px mt-1 bg-gray-500 border-0 mx-2">
                    <?php } else if(array_key_last($data['listeCheckPoint']) == $index) { ?>
                        <h3 class="text-gray-900 text-xl leading-tight font-medium mb-2 text-left">Arrivée</h3>
                        <hr class="h-px mt-1 bg-gray-500 border-0 mx-2">
                    <?php } else { ?>
                        <h3 class="text-gray-900 text-xl leading-tight font-medium mb-2 text-left">Étape <?= $index ?></h3>
                        <hr class="h-px mt-1 bg-gray-500 border-0 mx-2">
                    <?php } ?>
                    <p class="text-black text-xl text-left mx-5 my-1">
                        <span class="text-blue-700 text-xl leading-tight font-medium mb-2 text-left">Nom de l'étape </span>
                        <br><?= $currentCheckpoint->getNom(); ?>
                    </p>
                    <p class="text-black text-xl text-left mx-5 my-1">
                        <span class="text-blue-700 text-xl leading-tight font-medium mb-2 text-left">Coordonnées </span>
                        <br><?= json_decode($currentCheckpoint->getCoordonnee()) ? json_decode($currentCheckpoint->getCoordonnee())->displayName : "Aucune coordonnées"?>
                    </p>
                    <p class="hidden"><?= $currentCheckpoint->getCoordonnee() ?></p>
                    <p class="text-black text-xl text-left mx-5 my-1">
                        <span class="text-blue-700 text-xl leading-tight font-medium mb-2 text-left">Date de départ </span>
                        <br><?= $currentCheckpoint->getDateDepart() ?>
                    </p>
                    <p class="text-black text-xl text-left mx-5 my-1">
                        <span class="text-blue-700 text-xl leading-tight font-medium mb-2 text-left">Date d'arrivée </span>
                        <br><?= $currentCheckpoint->getDateArrive() ?>
                    </p>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="w-full lg:w-1/2" align="center">
        <h2 class="text-4xl font-bold text-black mb-5">EMPLACEMENT DES CHECKPOINTS</h2>
        <div class="w-4/5">
            <div id="map-container" style="height: 50vh;">

            </div>
        </div>

    </div>
</div>

<script>
    const mapContainer = $("#map-container");
    const currentMarkers = [];
    const map = L.map(mapContainer[0]).setView([20.13847, 1.40625], 2);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);


    $(document).ready(function(){
        $("p.hidden").each(function(){
            try{
                let json_item = JSON.parse($(this).text());
                let position = new L.LatLng(json_item.lat, json_item.lon);
                new L.marker(position).addTo(map);
            }catch (e){
                $(this).text('Aucunes coordonnées');
            }
        });
    });
</script>
