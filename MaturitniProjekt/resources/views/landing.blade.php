<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JeDeMe | Pronajmi si JDM auto</title>
    <style>
        * {
            margin: 0;
            padding: 0;

        }

        /* Základní styly */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #E9E9E9;
            background-color: #181818;
        }

        /* Hero */
        .hero {
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        .hero-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .hero-content h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .hero-content p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .hero-content .btn {
            padding: 12px 30px;
            background-color: #E44146;
            color: #E9E9E9;
            font-size: 18px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .hero-content .btn:hover {
            background-color: #bf353a;
        }

        /* Main Content */
        /* Sekce - Tvá brána k dokonalé jízdě */
        .section-ride {
            background-color: #181818;
            color: #E9E9E9;
            padding: 50px 20px;
            text-align: center;
        }

        .section-ride .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-ride .section-title {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .section-ride .section-description {
            font-size: 18px;
            margin-bottom: 40px;
        }

        .ride-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 20px;
        }

        .ride-text {
            flex: 1;
            min-width: 280px;
            text-align: left;
        }

        .ride-text h3 {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .ride-text p {
            font-size: 16px;
            margin-bottom: 30px;
        }

        .ride-text-content {
            display: flex;
        }

        .ride-text-content div {
            margin: 0px 20px 0px 20px;
        }

        .ride-stats {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .ride-stats div h4 {
            font-size: 28px;
            color: #E44146;
            margin: 0;
        }

        .ride-stats div p {
            font-size: 14px;
            margin: 0;
        }

        .ride-stats div {
            margin: 0px 20px 0px 20px;
        }

        .ride-images {
            flex: 1;
            min-width: 280px;
            display: flex;
            gap: 20px;
            justify-content: center;
            align-items: center;
        }

        .image-placeholder {
            background-color: #E9E9E9;
            width: 180px;
            height: 250px;
            border-radius: 8px;
        }

        .image-placeholder.small {
            width: 120px;
            height: 200px;
        }

        .btn-primary {
            display: inline-block;
            margin-top: 40px;
            padding: 15px 30px;
            background-color: #E44146;
            color: #E9E9E9;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #bf353a;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: #2C2C2C;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .card h3 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #E44146;
        }

        /* Sekce Inženýři přesnosti */
        .precision {
            text-align: center;
            color: #E9E9E9;
            padding: 50px 20px;
            background-color: #181818;
        }

        .section-subtitle {
            color: #E44146;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .section-description {
            font-size: 1rem;
            margin-bottom: 40px;
            color: #CCCCCC;
        }

        .models {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        .model-button {
            background-color: #1D1D1D;
            color: #E9E9E9;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .model-button:hover,
        .model-button.active {
            background-color: #E44146;
            color: #FFFFFF;
        }

        .model-button.arrow {
            padding: 10px 20px;
            font-weight: bold;
        }

        .model-display {
            position: relative;
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
        }

        .model-image {
            position: relative;
            overflow: hidden;
        }

        .model-image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .model-text {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 8px;
            color: #FFFFFF;
            text-align: left;
            max-width: 80%;
        }

        .model-text h3 {
            margin-bottom: 10px;
            font-size: 1.5rem;
        }

        .model-text p {
            margin-bottom: 20px;
            font-size: 1rem;
            color: #CCCCCC;
        }

        .model-text .btn-primary {
            background-color: #E44146;
            color: #FFFFFF;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .model-text .btn-primary:hover {
            background-color: #BF353A;
        }


        /* Section - Dominuj asfaltu */
        .dominate-asphalt {
            display: flex;
            justify-content: space-around;
            /* Změna na space-between pro vyvážené mezery */
            align-items: flex-start;
            /* Zarovná text a obrázek nahoře */
            margin: 40px 0;
            /* Trochu větší vertikální mezera */
            gap: 30px;
            /* Větší mezera mezi textem a obrázkem */
        }

        .text-content {
            max-width: 55%;
        }

        .text-content h2 {
            font-size: 2.4rem;
            /* O něco větší nadpis */
            color: #ffffff;
            margin-bottom: 15px;
            /* Větší vertikální mezera */
        }

        .text-content p {
            color: #e0e0e0;
            font-size: 1.1rem;
            /* Zvýšení velikosti písma popisku */
            margin-bottom: 25px;
        }

        .progress-bars .progress-item {
            display: flex;
            flex-direction: column;
            /* Umístění textu nad a pod progress bary */
            align-items: flex-start;
            margin-bottom: 15px;
            /* Větší mezera mezi položkami */
        }

        .progress-item span:first-child {
            margin-bottom: 5px;
            /* Mezera mezi textem a čarou */
            font-size: 1rem;
            /* Zvýšení velikosti textu */
            color: #e0e0e0;
        }

        .progress {
            width: 100%;
            /* Full width */
            background-color: #333333;
            border-radius: 5px;
            height: 10px;
            /* O něco tlustší čára */
            margin-bottom: 5px;
            /* Menší mezera pod progress barem */
            position: relative;
        }

        .progress-fill {
            height: 100%;
            background-color: #e44146;
            border-radius: 5px;
        }

        .progress-item span:last-child {
            font-size: 0.9rem;
            /* Menší procenta */
            color: #e0e0e0;
        }

        .image-content {
            max-width: 40%;
            text-align: right;
        }

        .image-content img {
            width: 100%;
            height: auto;
            /* Automatické přizpůsobení výšky podle šířky */
            border-radius: 8px;
            /* Zaoblení rohů, pokud chcete */
            margin-bottom: 15px;
            /* Mezera pod obrázkem */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            /* Jemný stín pro estetiku */
        }


        .image-content h3 {
            font-size: 1.8rem;
            /* Větší nadpis */
            color: #ffffff;
            margin-bottom: 20px;
            /* Větší mezera pod nadpisem */
        }

        .image-placeholder {
            width: 100%;
            height: 200px;
            /* Vyšší obrázek */
            background-color: #888888;
            border-radius: 8px;
            margin-bottom: 15px;
            /* Menší mezera pod obrázkem */
        }

        .image-content .btn {
            display: inline-block;
            background-color: #e44146;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            /* Větší tlačítko */
            font-size: 1rem;
            /* Větší text v tlačítku */
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .image-content .btn:hover {
            background-color: #c0363a;
        }

        /* Sekce - Spojte se s naším týmem podpory */
        .support-section {
            text-align: center;
            color: #ffffff;
            margin: 40px 0;
        }

        .support-section h2 {
            font-size: 2.4rem;
            margin-bottom: 10px;
        }

        .support-section p {
            font-size: 1.1rem;
            color: #e0e0e0;
            margin-bottom: 30px;
        }

        .support-details {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
            max-width: 900px;
            margin: 0 auto;
        }

        .support-details div {
            flex: 1;
            min-width: 200px;
            text-align: left;
        }

        .support-details h3 {
            font-size: 1.2rem;
            margin-bottom: 5px;
            color: #e44146;
        }

        .support-details p {
            font-size: 1rem;
            color: #e0e0e0;
            line-height: 1.5;
        }


        /* FAQ Section */
        .faq {
            background-color: #2C2C2C;
            padding: 50px 20px;
        }

        .faq h2 {
            font-size: 36px;
            margin-bottom: 30px;
        }

        .faq-item {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #E44146;
            border-radius: 5px;
        }

        /* Footer */
        .footer {
            background-color: #1D1D1D;
            padding: 20px;
            text-align: center;
            color: #E9E9E9;
        }
    </style>
</head>

<body>
    @extends('layouts.app')

    @section('content')

    <!-- Hero Section -->
    <section class="hero">
        <img src="/images/hero.jpg" alt="Hero Background" class="hero-img">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1>Pronajmi si JDM auto dnes!</h1>
            <p>Vyber si své auto z naší kolekce JDM legend a vyraz na nezapomenutelnou jízdu.</p>
            <a href="dashboard" class="btn">Objevte více</a>
        </div>
    </section>

    <!-- Main Content -->
    <section class="section-ride">
        <div class="container">
            <h2 class="section-title">Tvá brána k dokonalé jízdě</h2>
            <p class="section-description">
                Rezervace JDM aut nebyla nikdy jednodušší. Snadné ovládání a rychlá rezervace ti umožní zaměřit se jen
                na řízení.
            </p>
            <div class="ride-content">
                <!-- Levý textový blok -->
                <div class="ride-text">
                    <div class="ride-text-content">
                        <div>
                            <h3>Poháněno dokonalostí</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                        </div>
                        <div>
                            <h3>Poháněno dokonalostí</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
                        </div>
                    </div>
                    <div class="ride-stats">
                        <div>
                            <h4>100+</h4>
                            <p>aut dostupných k pronájmu</p>
                        </div>
                        <div>
                            <h4>12</h4>
                            <p>různých značek, které si můžeš vybrat</p>
                        </div>
                        <div>
                            <h4>4000+</h4>
                            <p>spokojených zákazníků</p>
                        </div>
                        <div>
                            <h4>4.9+</h4>
                            <p>hodnocení s plnou spokojeností</p>
                        </div>
                    </div>
                </div>
                <!-- Pravé obrázky -->
                <div class="ride-images">
                    <div class="image-placeholder"></div>
                    <div class="image-placeholder small"></div>
                </div>
            </div>
            <!-- Tlačítko -->
            <a href="dashboard" class="btn-primary">Objevte nyní →</a>
        </div>
    </section>



    <!-- Inženýři přesnosti -->
    <section class="precision">
        <p class="section-subtitle">Pronajmi si sportovní model</p>
        <h2 class="section-title">Inženýři přesnosti</h2>
        <p class="section-description">
            Vyber si svůj oblíbený JDM model a připrav se na adrenalinovou jízdu.
        </p>
        <div class="models">
            <button class="model-button active">Model 1</button>
            <button class="model-button">Model 2</button>
            <button class="model-button">Model 3</button>
            <button class="model-button">Model 4</button>
            <button class="model-button">Model 5</button>
            <button class="model-button arrow">→</button>
        </div>
        <div class="model-display">
            <div class="model-image">
                <img src="/images/InzenyriPresnosti.jpg" alt="JDM Model">
                <div class="model-text">
                    <h3>Driven by Excellence</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit</p>
                    <a href="dashboard" class="btn-primary">Objev více →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Dominuj asfaltu -->
    <section class="dominate-asphalt">
        <div class="text-content">
            <h2>Dominuj asfaltu</h2>
            <p>Naše vozy jsou navrženy pro nejvyšší výkon a spolehlivost. Vyber si model, který odpovídá tvému stylu.
            </p>
            <div class="progress-bars">
                <div class="progress-item">
                    <span>Speed 1</span>
                    <div class="progress">
                        <div class="progress-fill" style="width: 80%;"></div>
                    </div>
                    <span>80%</span>
                </div>
                <div class="progress-item">
                    <span>Speed 2</span>
                    <div class="progress">
                        <div class="progress-fill" style="width: 60%;"></div>
                    </div>
                    <span>60%</span>
                </div>
                <div class="progress-item">
                    <span>Speed 3</span>
                    <div class="progress">
                        <div class="progress-fill" style="width: 90%;"></div>
                    </div>
                    <span>90%</span>
                </div>
            </div>
        </div>
        <div class="image-content">
            <h3>Síla v každé zatáčce!</h3>
            <img src="images/DominujAsfaltu.jpg" alt="Dominuj asfaltu" class="image">
            <a href="dashboard" class="btn">Rezervujte nyní →</a>
        </div>
    </section>

    <!-- Spojte se s naším týmem podpory -->
    <section class="support-section">
        <h2>Spojte se s naším týmem podpory</h2>
        <p>Máte otázky ohledně rezervace? Kontaktujte nás a rádi vám pomůžeme.</p>
        <div class="support-details">
            <div>
                <h3>Email:</h3>
                <p>podpora@jdmpujcovna.cz</p>
            </div>
            <div>
                <h3>Telefon:</h3>
                <p>+420 123 456 789</p>
            </div>
            <div>
                <h3>Adresa:</h3>
                <p>Ulice, Město, PSČ</p>
            </div>
            <div>
                <h3>Provozní Doba:</h3>
                <p>Pondělí - Pátek: 9:00 - 18:00<br> Sobota: 10:00 - 16:00<br> Neděle: zavřeno</p>
            </div>
        </div>
    </section>


    <!-- FAQ -->
    <section class="faq">
        <h2>Často kladené otázky</h2>
        <div class="faq-item">Jak dlouho dopředu musím rezervovat?</div>
        <div class="faq-item">Jak mohu auto přizpůsobit?</div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 JeDeMe. Všechna práva vyhrazena.</p>
    </footer>
    @endsection
</body>

</html>