<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>@yield('title') - {{config('app.name')}}</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
        <link rel="stylesheet" href="{{asset('css/all.min.css')}}">

    </head>
    <body>

        <div class="container-fluid h-100 my-vh100">
            <div class="row h-100 my-vh100">

                <section id="page-content-wrapper" class="p-0 col bg-faded">
                    <header class="bg-light border-bottom p-2 d-md-flex justify-content-center">
                        <div class="container px-4">
                            <h1 class="col-md-10"><i class="fas fa-warehouse"></i> Gestion des produits</h1>
                        </div>
                    </header>

                    <main role="main" class="mb-5 p-4" >
