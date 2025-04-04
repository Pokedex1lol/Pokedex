@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
    }

    .welcome-header {
        background: linear-gradient(135deg, #ff6b6b 0%, #ff8e8e 100%);
        color: white;
        padding: 4rem 0;
        text-align: center;
        position: relative;
        overflow: hidden;
        margin-top: -2rem;
    }

    .welcome-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('https://assets.pokemon.com/assets/cms2/img/pokedex/full/025.png') no-repeat center center;
        background-size: contain;
        opacity: 0.1;
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
        100% { transform: translateY(0px); }
    }

    .pokemon-title {
        font-size: 3.5rem;
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        margin-bottom: 1rem;
    }

    .lead {
        font-size: 1.5rem;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    }

    .info-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 2rem;
        margin: 2rem 0;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-5px);
    }

    .section-title {
        color: #ff6b6b;
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .stat-item {
        background: white;
        padding: 1.5rem;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: transform 0.3s ease;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease;
    }

    .stat-item:hover {
        transform: translateY(-5px);
    }

    .stat-item.aos-animate {
        opacity: 1;
        transform: translateY(0);
    }

    .stat-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color: #ff6b6b;
    }

    .explore-btn {
        background: linear-gradient(135deg, #ff6b6b 0%, #ff8e8e 100%);
        color: white;
        padding: 1rem 2rem;
        border-radius: 30px;
        font-size: 1.2rem;
        border: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-decoration: none;
        display: inline-block;
        margin-top: 2rem;
    }

    .explore-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(255,107,107,0.4);
        color: white;
    }

    .type-badge {
        display: inline-block;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        margin: 0.3rem;
        color: white;
        font-weight: bold;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        opacity: 0;
        transform: scale(0.8);
        transition: all 0.4s ease;
    }

    .type-badge:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .type-badge.aos-animate {
        opacity: 1;
        transform: scale(1);
    }

    .feature-section {
        background: white;
        padding: 4rem 0;
        margin-top: 4rem;
    }

    .feature-card {
        text-align: center;
        padding: 2rem;
        margin: 1rem;
        border-radius: 15px;
        background: #f8f9fa;
        transition: transform 0.3s ease;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease;
    }

    .feature-card:hover {
        transform: translateY(-5px);
    }

    .feature-card.aos-animate {
        opacity: 1;
        transform: translateY(0);
    }

    .feature-icon {
        font-size: 3rem;
        color: #ff6b6b;
        margin-bottom: 1rem;
    }

    .pokemon-fact {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
        padding: 2rem;
        border-radius: 15px;
        margin: 2rem 0;
        text-align: center;
        opacity: 0;
        transform: translateX(-20px);
        transition: all 0.6s ease;
    }

    .pokemon-fact i {
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    .pokemon-fact.aos-animate {
        opacity: 1;
        transform: translateX(0);
    }

    .footer {
        background: #2c3e50;
        color: white;
        padding: 3rem 0;
        margin-top: 4rem;
        width: 100vw;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
    }

    .footer-content {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .social-links a {
        color: white;
        font-size: 1.5rem;
        margin: 0 1rem;
        transition: color 0.3s ease;
    }

    .social-links a:hover {
        color: #ff6b6b;
    }

    /* Přidáme styly pro animace */
    [data-aos] {
        pointer-events: none;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }

    [data-aos].aos-animate {
        pointer-events: auto;
    }
</style>

<div class="welcome-header">
    <h1 class="pokemon-title" data-aos="fade-down">Vítejte v Pokédexu</h1>
    <p class="lead" data-aos="fade-up" data-aos-delay="200">Váš průvodce světem Pokémonů</p>
</div>

<div class="container">
    <div class="info-card" data-aos="fade-up">
        <h2 class="section-title">Co jsou Pokémoni?</h2>
        <p class="lead text-center mb-4">Pokémoni jsou úžasné bytosti, které obývají náš svět. Každý Pokémon je jedinečný svými schopnostmi, typem a statistikami. Trenéři je chytají, trénují a používají k soubojům.</p>
        
        <div class="stats-grid">
            <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-heart stat-icon"></i>
                <h3>HP</h3>
                <p>Body života určují, jak dlouho může Pokémon bojovat</p>
            </div>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-fist-raised stat-icon"></i>
                <h3>Attack</h3>
                <p>Útočná síla určuje sílu fyzických útoků</p>
            </div>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                <i class="fas fa-shield-alt stat-icon"></i>
                <h3>Defense</h3>
                <p>Obrana určuje odolnost proti útokům</p>
            </div>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="400">
                <i class="fas fa-bolt stat-icon"></i>
                <h3>Speed</h3>
                <p>Rychlost určuje pořadí v souboji</p>
            </div>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="500">
                <i class="fas fa-star stat-icon"></i>
                <h3>Level</h3>
                <p>Úroveň určuje sílu a zkušenosti Pokémona</p>
            </div>
            <div class="stat-item" data-aos="fade-up" data-aos-delay="600">
                <i class="fas fa-fire stat-icon"></i>
                <h3>Type</h3>
                <p>Typ určuje silné a slabé stránky Pokémona</p>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('pokemons.index') }}" class="explore-btn" data-aos="fade-up" data-aos-delay="700">
                <i class="fas fa-search"></i> Prozkoumat Pokémony
            </a>
        </div>
    </div>

    <div class="feature-section" data-aos="fade-up">
        <div class="row">
            <div class="col-md-4">
                <div class="feature-card" data-aos="fade-right" data-aos-delay="100">
                    <i class="fas fa-pokeball feature-icon"></i>
                    <h3>Chytání Pokémonů</h3>
                    <p>Použijte Poké Bally k chycení divokých Pokémonů a rozšiřte svou sbírku.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-dumbbell feature-icon"></i>
                    <h3>Trénink</h3>
                    <p>Trénujte své Pokémony, aby byli silnější a získali nové schopnosti.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card" data-aos="fade-left" data-aos-delay="300">
                    <i class="fas fa-trophy feature-icon"></i>
                    <h3>Souboje</h3>
                    <p>Utkejte se s ostatními trenéry a staňte se mistrem Pokémonů.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="pokemon-fact" data-aos="fade-right">
        <i class="fas fa-lightbulb"></i>
        <h3>Zajímavý fakt</h3>
        <p>Věděli jste, že Pikachu je nejznámější Pokémon na světě? Tento elektrický myší Pokémon se stal maskotem celé série a je milován fanoušky po celém světě!</p>
    </div>

    <div class="info-card" data-aos="fade-up">
        <h2 class="section-title">Typy Pokémonů</h2>
        <div class="text-center">
            <span class="type-badge" style="background: #F08030" data-aos="zoom-in" data-aos-delay="100">Ohnivý</span>
            <span class="type-badge" style="background: #6890F0" data-aos="zoom-in" data-aos-delay="200">Vodní</span>
            <span class="type-badge" style="background: #98D8D8" data-aos="zoom-in" data-aos-delay="300">Ledový</span>
            <span class="type-badge" style="background: #A8A878" data-aos="zoom-in" data-aos-delay="400">Normální</span>
            <span class="type-badge" style="background: #A040A0" data-aos="zoom-in" data-aos-delay="500">Psychický</span>
            <span class="type-badge" style="background: #F8D030" data-aos="zoom-in" data-aos-delay="600">Elektrický</span>
            <span class="type-badge" style="background: #78C850" data-aos="zoom-in" data-aos-delay="700">Travní</span>
            <span class="type-badge" style="background: #B8A038" data-aos="zoom-in" data-aos-delay="800">Kámen</span>
        </div>
    </div>
</div>

<footer class="footer" data-aos="fade-up">
    <div class="footer-content text-center">
        <h3>Sledujte nás</h3>
        <div class="social-links">
            <a href="#" data-aos="fade-up" data-aos-delay="100"><i class="fab fa-twitter"></i></a>
            <a href="#" data-aos="fade-up" data-aos-delay="200"><i class="fab fa-facebook"></i></a>
            <a href="#" data-aos="fade-up" data-aos-delay="300"><i class="fab fa-instagram"></i></a>
            <a href="#" data-aos="fade-up" data-aos-delay="400"><i class="fab fa-youtube"></i></a>
        </div>
        <p class="mt-3">© 2024 Pokedex. Všechna práva vyhrazena.</p>
    </div>
</footer>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: false,
        offset: 100,
        mirror: true
    });
</script>
@endsection
