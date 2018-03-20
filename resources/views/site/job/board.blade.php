<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include("site.include_head")
    <title>Document</title>
</head>
<body>
<style>
    .jobs-menu {
        background-color: white;
    }

    .jobs-menu-item {
        padding: 10px 50px;
    }
</style>
    <section class="container-fluid">
        <div class="row jobs-menu">
            <div class="col-6 jobs-menu-item">A</div>
            <div class="col-4 jobs-menu-item">
                <form action="" class="row">
                    <label for="" class="col-3">Rechercher</label>
                    <input class="col-7" type="text" name="search">
                    <button class="col-2">Rechercher</button>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </section>
    @include("site.include_foot")
</body>
</html>