@include("site.head")
<section class="container-fluid">
    <div class="row">
        <nav class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4" id="menu">
            @include("site.menu")
        </nav>
    </div>
    <div class="row">
        <div class="hidden-xs-down hidden-sm-down col-md-4 col-lg-4 col-xl-4"></div>
        <main class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8" id="page_main">
            <h2 class="title_gray">Ajouter ma StartUp</h2>
            <form action="">

                <h3 class="label_h3_red">L'entreprise</h3>

                <label class="label_input1" for="">SIREN</label>
                <input class="create_input1" type="text" placeholder="123 456 789" maxlength="11">

                <label class="label_input1" for="">Nom</label>
                <input class="create_input1" type="text" placeholder="StartDaWay" maxlength="50">

                <label class="label_input1" for="">Description</label>
                <textarea name="" id="org_descr" class="create_input" rows="25" placeholder="Référence ta StartUp, montres toi ! Et gagne en notoriété"></textarea>


                <h3 class="label_h3_red">Contact & Informations</h3>

                <label class="label_input1" for="">Adresse</label>
                <input class="create_input1" type="text" placeholder="33 boulevard du massacre 44100 Nantes">

                <label class="label_input1" for="">E-mail</label>
                <input class="create_input1" type="text" placeholder="votre@domain.fr">

                <label class="label_input1" for="">Téléphone</label>
                <input class="create_input1" type="text" placeholder="0123456789">

                <label class="label_input1" for="">Site Web</label>
                <input class="create_input1" type="url" placeholder="www.votresite.com">

            </form>
        </main>
    </div>
</section>
@include("site.footer")