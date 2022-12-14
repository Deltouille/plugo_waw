<div class="relative">
    <img src="images/liste-roadtrip-background.png" class="w-full brightness-50 h-[500px] lg:object-fill object-cover"
         alt="background-liste-roadtrips"/>
    <div class="absolute text-white top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
        <h1 class="font-bold text-4xl lg:text-5xl">NOS ROAD TRIPS</h1>
        <p class="font-light my-5">Vous retrouverez ici la liste des road trips de nos utilisateurs</p>
    </div>
</div>
<div class="container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap -mx-1 lg:-mx-4">
        <?php foreach ($data['listeRoadTrip'] as $currentRoadTrip) { ?>
            <!-- Column -->
            <div class="my-1 px-1 w-full sm:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                <!-- Article -->
                <article class="overflow-hidden border shadow-lg hover:scale-105 ease-in duration-200">
                    <a href="/index.php?page=detailsRoadTrip&id=<?= $currentRoadTrip->getId() ?>">
                        <img alt="Placeholder" class="block h-[230px] w-full" src="<?= $currentRoadTrip->getIllustration() != null ? $currentRoadTrip->getIllustration() : "https://picsum.photos/1920/1080/?random" ?>">
                    </a>
                    <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                        <h1 class="text-lg">
                            <a class="no-underline hover:underline text-black" href="/index.php?page=detailsRoadTrip&id=<?= $currentRoadTrip->getId() ?>">
                                <?= $currentRoadTrip->getIntitule() ?>
                            </a>
                        </h1>
                        <p class="text-grey-darker text-sm">
                            <span class="">#<?= $currentRoadTrip->getTypeVehicule(); ?></span>
                        </p>
                    </header>
                    <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                        <a class="flex items-center no-underline hover:underline text-black" href="#">
                            <img alt="Placeholder" class="block rounded-full h-6 w-6" src="<?= $currentRoadTrip->getUser()->getPicture() != null ? $currentRoadTrip->getUser()->getPicture() : "images/default-picture.png" ?>">
                            <p class="ml-2 text-sm">
                                <?= $currentRoadTrip->getUser()->getEmail() ?>
                            </p>
                        </a>
                        <?php if(isset($_SESSION['user']) && $_SESSION['user']['id'] == $currentRoadTrip->getUser()->getId()){ ?>
                            <div>
                                <a href="/index.php?page=updateRoadTrip&id=<?= $currentRoadTrip->getId() ?>" class="btn btn-sm btn-warning rounded-none"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="/index.php?page=removeRoadTrip&id=<?= $currentRoadTrip->getId() ?>" class="btn btn-sm btn-error rounded-none"><i class="fa-solid fa-trash"></i></a>
                            </div>
                        <?php } ?>
                    </footer>
                </article>
                <!-- END Article -->
            </div>
            <!-- END Column -->
        <?php } ?>
    </div>
</div>