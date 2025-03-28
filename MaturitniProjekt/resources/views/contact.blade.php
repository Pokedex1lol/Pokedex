@extends('layouts.app')

@section('content')
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #1a1a1a;
        font-family: Arial, sans-serif;
    }

    .contact-container {
        min-height: calc(100vh - 64px);
        background-color: #1a1a1a;
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        margin-top: 64px;
        width: 100%;
        overflow-x: hidden;
    }

    .contact-wrapper {
        width: 100%;
        margin: 0;
        padding: 0;
        max-width: 100%;
    }

    .contact-card {
        background-color: #1a1a1a;
        width: 100%;
    }

    .contact-header {
        padding: 48px 24px;
        text-align: center;
        background-color: #1a1a1a;
    }

    .contact-header h2 {
        font-size: 2.5rem;
        font-weight: 600;
        color: #E44146;
        margin: 0;
        font-family: 'Poppins', sans-serif;
    }

    .contact-header p {
        color: #a0a0a0;
        margin-top: 12px;
        font-size: 1.1rem;
    }

    .contact-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0;
        padding: 0;
        max-width: 100%;
    }

    @media (max-width: 768px) {
        .contact-content {
            grid-template-columns: 1fr;
        }
    }

    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 32px;
        padding: 48px;
        background-color: #1a1a1a;
        max-width: 600px;
        margin: 0 auto;
    }

    .info-section h3 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #E44146;
        margin-bottom: 24px;
        font-family: 'Poppins', sans-serif;
    }

    .contact-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 24px;
    }

    .contact-icon {
        width: 28px;
        height: 28px;
        margin-right: 20px;
        flex-shrink: 0;
        color: #E44146;
    }

    .contact-text {
        color: #ffffff;
    }

    .contact-text p {
        margin: 0;
        line-height: 1.6;
        font-size: 1.1rem;
    }

    .contact-text a {
        color: #E44146;
        text-decoration: none;
        transition: color 0.3s, transform 0.3s;
        font-size: 1.1rem;
        display: inline-block;
    }

    .contact-text a:hover {
        color: #ff5a5f;
        transform: translateX(5px);
    }

    .contact-text a:hover {
        color: #ff5a5f;
        transform: translateX(5px);
    }

    .map-container {
        height: 100%;
        min-height: 500px;
        padding: 48px;
    }

    .map-container iframe {
        width: 100%;
        height: 100%;
        border: 0;
        filter: grayscale(0.8) contrast(1.2);
        transition: filter 0.3s;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }

    .map-container iframe:hover {
        filter: grayscale(0) contrast(1);
    }

    .social-section {
        padding: 48px 0;
        background-color: #1a1a1a;
        text-align: center;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .social-section h3 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #E44146;
        margin-bottom: 24px;
        font-family: 'Poppins', sans-serif;
        width: 100%;
        text-align: center;
    }

    .social-links {
        display: flex;
        justify-content: center;
        gap: 24px;
        margin-top: 20px;
        width: 100%;
    }

    .social-link {
        color: #ffffff;
        transition: all 0.3s ease;
        padding: 12px;
        border-radius: 50%;
        background-color: #2d2d2d;
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .social-link:hover {
        color: #E44146;
        transform: translateY(-5px);
        background-color: #3d3d3d;
    }

    .social-icon {
        width: 24px;
        height: 24px;
    }

    .opening-hours p {
        color: #ffffff;
        margin: 12px 0;
        font-size: 1.1rem;
        line-height: 1.6;
    }

    @media (max-width: 768px) {
        .contact-info {
            padding: 24px;
        }
        
        .map-container {
            min-height: 400px;
            padding: 24px;
        }
        
        .contact-header h2 {
            font-size: 2rem;
        }
    }

    /* Úprava fontu pro menu */
    .navbar a {
        font-family: 'Poppins', sans-serif !important;
        font-weight: 300 !important;
        letter-spacing: 0.5px !important;
        color: #E9E9E9 !important;
    }

    .navbar a:hover {
        color: #E44146 !important;
    }
</style>

<div class="contact-container">
    <div class="contact-wrapper">
        <div class="contact-card">
            <!-- Hlavička -->
            <div class="contact-header">
                <h2>Kontaktujte nás</h2>
                <p>Máte dotaz? Neváhejte nás kontaktovat!</p>
            </div>

            <!-- Kontaktní informace -->
            <div class="contact-content">
                <!-- Levý sloupec - Kontaktní údaje -->
                <div class="contact-info">
                    <div class="info-section">
                        <h3>Kontaktní údaje</h3>
                        <div class="contact-item">
                            <svg class="contact-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <div class="contact-text">
                                <p>SPŠE Pardubice</p>
                                <p>Karla IV. 13, Pardubice</p>
                                <p>530 02</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <svg class="contact-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <div class="contact-text">
                                <p>Email</p>
                                <a href="mailto:info@pujcovna-jdm.cz">info@pujcovna-jdm.cz</a>
                            </div>
                        </div>

                        <div class="contact-item">
                            <svg class="contact-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <div class="contact-text">
                                <p>Telefon</p>
                                <a href="tel:+420777888999">+420 777 888 999</a>
                            </div>
                        </div>
                    </div>

                    <div class="info-section opening-hours">
                        <h3>Otevírací doba</h3>
                        <p>Pondělí - Pátek: 9:00 - 18:00</p>
                        <p>Sobota: 10:00 - 14:00</p>
                        <p>Neděle: Zavřeno</p>
                    </div>
                </div>

                <!-- Pravý sloupec - Mapa -->
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2560.5100810515234!2d15.777567076266334!3d50.03737997932072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470dcced2c0f99a9%3A0x13e68abed8193137!2zU1DFoEUgYSBWT8WhIFBhcmR1YmljZQ!5e0!3m2!1scs!2scz!4v1710428433659!5m2!1scs!2scz"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <!-- Sociální sítě -->
            <div class="social-section">
                <h3>Sledujte nás</h3>
                <div class="social-links">
                    <a href="#" class="social-link">
                        <span class="sr-only">Facebook</span>
                        <svg class="social-icon" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                        </svg>
                    </a>

                    <a href="#" class="social-link">
                        <span class="sr-only">Instagram</span>
                        <svg class="social-icon" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/>
                        </svg>
                    </a>

                    <a href="#" class="social-link">
                        <span class="sr-only">Twitter</span>
                        <svg class="social-icon" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
<script>
function initMap() {
    const schoolLocation = { lat: 50.0373799, lng: 15.7797558 };
    
    const map = new google.maps.Map(document.getElementById('map'), {
        zoom: 17,
        center: schoolLocation,
        styles: [
            {
                "elementType": "geometry",
                "stylers": [{"color": "#242f3e"}]
            },
            {
                "elementType": "labels.text.fill",
                "stylers": [{"color": "#746855"}]
            },
            {
                "elementType": "labels.text.stroke",
                "stylers": [{"color": "#242f3e"}]
            },
            {
                "featureType": "road",
                "elementType": "geometry",
                "stylers": [{"color": "#38414e"}]
            },
            {
                "featureType": "road",
                "elementType": "geometry.stroke",
                "stylers": [{"color": "#212a37"}]
            },
            {
                "featureType": "road",
                "elementType": "labels.text.fill",
                "stylers": [{"color": "#9ca5b3"}]
            }
        ]
    });
    
    const marker = new google.maps.Marker({
        position: schoolLocation,
        map: map,
        title: 'SPŠE a VOŠ Pardubice',
        animation: google.maps.Animation.DROP
    });

    const infowindow = new google.maps.InfoWindow({
        content: '<div style="color: black;"><strong>SPŠE a VOŠ Pardubice</strong><br>Karla IV. 13, Pardubice<br>530 02</div>'
    });

    marker.addListener('click', () => {
        infowindow.open(map, marker);
    });
}
</script>
@endsection 