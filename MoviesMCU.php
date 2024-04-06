<?php
const API_URL = 'https://whenisthenextmcufilm.com/api';
$ch = curl_init(API_URL);
//Comando para recibir el resultado de la peticion
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);
?>

<head>
    <meta charset="UTF-8" />
    <title>La próxima película de Marvel</title>
    <meta name="description" content="La próxima película de marvel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>

<main>
   
    <section>
        <img src="<?= $data["poster_url"]?>" alt="Poster de <?= $data["title"];?>" width="300" 
        style="border-radius:16px"/>
    </section>

    <hgroup>
        <h3><?= $data["title"];?> se estrena en <?= $data["days_until"];?> días. </h3>
        <p>Fecha de estreno: <?= $data["release_date"];?></p>
        <p>La siguiente película es: <?= $data["following_production"]["title"];?></p>
    </hgroup>
</main>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }

    img{
        margin: 0 auto;
    }

    section {
        display: flex;
        justify-content: center;
    }

    hgroup {
        text-align: center;
    }
</style>