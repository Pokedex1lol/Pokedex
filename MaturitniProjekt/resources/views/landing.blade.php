<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JeDeMe | Pronajmi si JDM auto</title>
    <style>
        /* Základní styly */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-text-size-adjust: 100%;
        }

        body {
            font-family: Arial, sans-serif;
            color: #E9E9E9;
            background-color: #181818;
            line-height: 1.6;
            overflow-x: hidden;
            width: 100%;
        }

        /* Hero Section */
        .hero {
            position: relative;
            min-height: 100vh;
            width: 100%;
            background: url('/images/hero.jpg') no-repeat center center;
            background-size: cover;
            display: flex;
            align-items: flex-end;
            padding: 0 8% 120px;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                linear-gradient(to top, 
                #181818 0%,
                rgba(24, 24, 24, 0.95) 10%,
                rgba(24, 24, 24, 0.8) 30%,
                rgba(24, 24, 24, 0.6) 50%,
                rgba(24, 24, 24, 0.4) 70%,
                rgba(24, 24, 24, 0.2) 100%);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .hero-text {
            max-width: 700px;
        }

        .hero-content h1 {
            font-size: clamp(3rem, 4vw, 4.5rem);
            font-weight: bold;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            line-height: 1.1;
        }

        .hero-content p {
            font-size: clamp(1rem, 1.2vw, 1.2rem);
            margin-bottom: 0;
            opacity: 0.9;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            max-width: 500px;
        }

        .hero-right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 2rem;
        }

        .hero-tagline {
            text-align: right;
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .hero-tagline-text {
            text-align: right;
        }

        .hero-tagline h3 {
            font-size: clamp(1.5rem, 1.8vw, 2rem);
            margin-bottom: 0.25rem;
            font-weight: normal;
            line-height: 1.2;
            white-space: nowrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            padding: 1.2rem 3rem;
            background-color: #E44146;
            color: #E9E9E9;
            text-decoration: none;
            border-radius: 8px;
            font-size: clamp(1rem, 1.1vw, 1.1rem);
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
            white-space: nowrap;
        }

        .btn:hover {
            background-color: #bf353a;
            transform: translateY(-2px);
        }

        .btn::after {
            content: '→';
            font-size: 1.2rem;
            margin-left: 1rem;
        }

        /* Statistiky */
        .stats-section {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 120px;
            padding: 60px 20px;
            background-color: #181818;
            flex-wrap: wrap;
            text-align: center;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: bold;
            color: #E44146;
            margin-bottom: 0.5rem;
        }

        .stat-text {
            font-size: 1rem;
            color: #E9E9E9;
            opacity: 0.8;
        }

        /* Sekce - Tvá brána k dokonalé jízdě */
        .section-ride {
            padding: 200px 8% 120px;
            background-color: #181818;
            position: relative;
        }

        .section-ride .container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6rem;
            align-items: start;
        }

        .section-ride-content {
            text-align: left;
        }

        .section-title {
            font-size: clamp(2.5rem, 3.5vw, 4rem);
            margin-bottom: 1.5rem;
            font-weight: bold;
            color: #E9E9E9;
            line-height: 1.1;
        }

        .section-description {
            font-size: clamp(1rem, 1.2vw, 1.2rem);
            margin-bottom: 3rem;
            opacity: 0.7;
            max-width: 500px;
            line-height: 1.6;
        }

        .excellence-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .excellence-item h3 {
            font-size: 1.5rem;
            color: #E44146;
            margin-bottom: 0.5rem;
        }

        .excellence-item p {
            font-size: 1rem;
            opacity: 0.7;
            line-height: 1.6;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 4rem;
            margin-bottom: 2rem;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .section-images-wrapper {
            position: relative;
            padding-top: 3rem;
        }

        .section-images {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            position: relative;
        }

        .section-image {
            width: 100%;
            aspect-ratio: 4/5;
            background-color: #252525;
            border-radius: 12px;
            overflow: hidden;
            position: relative;
        }

        .section-image:first-child {
            margin-top: 0;
        }

        .section-image:last-child {
            margin-top: 4rem;
        }

        .section-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Media Queries pro mobilní zařízení */
        @media (max-width: 768px) {
            .hero {
                padding: 0 20px 40px;
                min-height: 90vh;
                align-items: center;
                width: 100%;
            }

            .hero-content {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 2rem;
                width: 100%;
                padding: 0;
            }

            .hero-text {
                max-width: 100%;
                padding: 0 10px;
            }

            .hero-text h1 {
                font-size: 2.2rem;
                margin-bottom: 1rem;
                word-wrap: break-word;
            }

            .hero-text p {
                font-size: 1rem;
                max-width: 100%;
                padding: 0;
            }

            .hero-right {
                align-items: center;
                width: 100%;
                padding: 0 10px;
            }

            .hero-tagline {
                flex-direction: column;
                align-items: center;
                gap: 1rem;
                text-align: center;
                width: 100%;
            }

            .hero-tagline-text {
                text-align: center;
                width: 100%;
            }

            .hero-tagline h3 {
                font-size: 1.6rem;
                white-space: normal;
            }

            .btn {
                width: 100%;
                max-width: 300px;
                justify-content: center;
                padding: 1rem 2rem;
                font-size: 1rem;
            }

            /* Statistiky */
            .stats-section {
                gap: 30px;
                padding: 40px 20px;
                width: 100%;
            }

            .stat-number {
                font-size: 2.2rem;
            }

            .stat-text {
                font-size: 0.9rem;
            }

            /* Tvá brána k dokonalé jízdě */
            .section-ride {
                padding: 60px 20px;
                width: 100%;
            }

            .section-ride .container {
                grid-template-columns: 1fr;
                gap: 2rem;
                width: 100%;
            }

            .section-ride-content {
                text-align: center;
                padding: 0;
            }

            .section-title {
                font-size: 1.8rem;
                margin-bottom: 1rem;
                padding: 0 10px;
            }

            .section-description {
                font-size: 1rem;
                margin-bottom: 2rem;
                max-width: 100%;
                padding: 0 10px;
            }

            .excellence-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                margin-bottom: 2rem;
                padding: 0 10px;
            }

            .excellence-item {
                text-align: center;
            }

            .excellence-item h3 {
                font-size: 1.3rem;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem;
                padding: 0 10px;
            }

            .section-images {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                padding: 0 10px;
            }

            .section-image {
                aspect-ratio: 16/9;
                width: 100%;
            }

            /* Dominuj asfaltu */
            .dominate {
                padding: 60px 5%;
            }

            .dominate-container {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .dominate-content {
                text-align: center;
            }

            .progress-bars {
                margin: 2rem 0;
            }

            .progress-item {
                margin-bottom: 1.5rem;
            }

            .dominate-image {
                height: 300px;
                border-radius: 8px;
            }

            .dominate-cta {
                flex-direction: column;
                align-items: center;
                gap: 1.5rem;
                text-align: center;
            }

            .btn-rezervujte {
                width: 100%;
                justify-content: center;
            }

            /* Kontaktní sekce */
            .contact-section {
                padding: 60px 20px;
            }

            .contact-info {
                grid-template-columns: 1fr;
                gap: 2rem;
                padding: 1.5rem;
            }

            .contact-item {
                text-align: center;
                align-items: center;
            }

            .contact-item h3 {
                font-size: 1.2rem;
                margin-bottom: 0.3rem;
            }

            .contact-item p {
                font-size: 0.95rem;
            }

            /* Často kladené otázky */
            .faq-section {
                padding: 60px 20px;
            }

            .faq-grid {
                gap: 1rem;
                padding: 0 10px;
            }

            .faq-question {
                padding: 1.2rem;
                font-size: 0.95rem;
            }
        }

        @media (max-width: 480px) {
            .hero-text h1 {
                font-size: 2rem;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .stat-number {
                font-size: 2rem;
            }

            .section-title {
                font-size: 1.6rem;
            }

            .btn {
                font-size: 0.9rem;
                padding: 0.9rem 1.8rem;
                max-width: 280px;
            }
        }

        /* Inženýři přesnosti */
        .hero-section {
            padding: 2rem 8%;
            text-align: center;
            position: relative;
        }

        .small-text {
            color: #E34146;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 1rem;
            text-transform: uppercase;
        }

        .hero-section h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 700;
            margin-bottom: 1rem;
            color: #fff;
        }

        .hero-description {
            font-size: 1.125rem;
            color: rgba(255, 255, 255, 0.8);
            max-width: 600px;
            margin: 0 auto 2rem;
        }

        .model-nav {
            display: flex;
            gap: 2rem;
            justify-content: center;
            margin: 2rem 0;
        }

        .model-btn {
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.6);
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            padding: 0.5rem 1rem;
            position: relative;
        }

        .model-btn::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #E34146;
            transition: width 0.3s;
        }

        .model-btn.active {
            color: #fff;
        }

        .model-btn.active::after {
            width: 100%;
        }

        .hero-content {
            margin-top: 2rem;
        }

        .hero-card {
            background: rgba(24, 24, 24, 0.8);
            border-radius: 12px;
            overflow: hidden;
            max-width: 1200px;
            margin: 0 auto;
        }

        .hero-image {
            width: 100%;
            height: 600px;
            object-fit: cover;
        }

        .card-content {
            padding: 2rem;
            text-align: left;
        }

        .card-content h3 {
            font-size: 1.5rem;
            color: #fff;
            margin-bottom: 0.5rem;
        }

        .card-content p {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 1.5rem;
        }

        .btn-objevte {
            position: absolute;
            top: 0;
            right: 0;
            display: inline-flex;
            align-items: center;
            padding: 1.2rem 3rem;
            background-color: #E44146;
            color: #E9E9E9;
            text-decoration: none;
            border-radius: 8px;
            font-size: 1.1rem;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
            z-index: 2;
        }

        .btn-objevte:hover {
            background-color: #bf353a;
            transform: translateY(-2px);
        }

        .btn-objevte::after {
            content: '→';
            margin-left: 1rem;
            font-size: 1.2rem;
        }

        .hero-image-container {
            position: relative;
            width: 100%;
        }

        .image-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 2rem;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            color: #fff;
        }

        .image-overlay h3 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #fff;
        }

        .image-overlay p {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.8);
            margin: 0;
        }

        /* Odstraňuji nepotřebné styly */
        .carousel-nav,
        .card-content {
            display: none;
        }

        .slideshow-container {
            position: relative;
            width: 100%;
            height: 600px;
            overflow: hidden;
        }

        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            display: none;
        }

        .slide.active {
            opacity: 1;
            display: block;
        }

        .models-content {
            margin-top: 2rem;
            max-width: 1400px;
            margin-left: auto;
            margin-right: auto;
        }

        .models-card {
            background: rgba(24, 24, 24, 0.8);
            border-radius: 12px;
            overflow: hidden;
        }

        .model-image {
            width: 100%;
            height: 600px;
            object-fit: cover;
            display: block;
        }

        .slideshow-container {
            position: relative;
            width: 100%;
            height: 600px;
            overflow: hidden;
        }

        .slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            display: none;
        }

        .slide.active {
            opacity: 1;
            display: block;
        }

        .image-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 2rem;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            color: #fff;
        }

        .image-overlay h3 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #fff;
        }

        .image-overlay p {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.8);
            margin: 0;
        }

        .dominate {
            padding: 120px 8%;
            background-color: #181818;
        }

        .dominate-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6rem;
            align-items: start;
        }

        .dominate-content {
            text-align: left;
        }

        .progress-bars {
            margin: 3rem 0;
        }

        .progress-item {
            margin-bottom: 2rem;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            color: #fff;
            font-size: 1rem;
        }

        .progress-bar {
            height: 2px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 1px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background-color: #E34146;
            transition: width 0.3s ease;
        }

        .dominate-right {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .dominate-image {
            width: 100%;
            height: 400px;
            border-radius: 12px;
            overflow: hidden;
        }

        .dominate-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .dominate-cta {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .dominate-cta h3 {
            font-size: 1.5rem;
            color: #fff;
            margin: 0;
        }

        .btn-rezervujte {
            display: inline-flex;
            align-items: center;
            padding: 1rem 2rem;
            background-color: #E34146;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .btn-rezervujte:hover {
            background-color: #c83238;
        }

        .btn-rezervujte::after {
            content: '→';
            margin-left: 0.5rem;
        }

        .faq-section {
            padding: 120px 8%;
            text-align: center;
            background-color: #181818;
        }

        .faq-section .section-title {
            margin-bottom: 1rem;
            font-size: 2.5rem;
            color: #fff;
        }

        .faq-section .section-description {
            max-width: 800px;
            margin: 0 auto 4rem;
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.6;
        }

        .faq-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .faq-column {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .faq-item {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            background: rgba(255, 255, 255, 0.08);
        }

        .faq-question {
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            color: #fff;
            font-size: 1rem;
        }

        .expand-btn {
            width: 24px;
            height: 24px;
            min-width: 24px;
            min-height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #E34146;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
            transition: transform 0.3s ease;
            font-size: 12px;
        }

        .faq-answer {
            padding: 0 1.5rem 1.5rem;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.95rem;
            line-height: 1.5;
            display: none;
        }

        .faq-item.active .expand-btn {
            transform: rotate(180deg);
        }

        .faq-item.active .faq-answer {
            display: block;
        }

        @media (max-width: 768px) {
            /* Základní úpravy pro mobilní zařízení */
            .hero-section, .dominate {
                padding: 40px 20px;
                width: 100%;
                overflow: hidden;
            }

            .hero-section h1 {
                font-size: 2rem;
                word-wrap: break-word;
                hyphens: auto;
            }

            .hero-description {
                font-size: 1rem;
                padding: 0 10px;
            }

            /* Model navigace */
            .model-nav {
                display: flex;
                flex-wrap: nowrap;
                gap: 0.3rem;
                padding: 0 10px;
                width: 100%;
                overflow-x: auto;
                overflow-y: hidden;
                scrollbar-width: none;
                -ms-overflow-style: none;
            }

            .model-btn {
                font-size: 0.7rem;
                padding: 0.3rem 0.5rem;
                white-space: nowrap;
                flex-shrink: 0;
            }

            /* Skrytí scrollbaru pro Chrome, Safari a novější prohlížeče */
            .model-nav::-webkit-scrollbar {
                display: none;
            }

            /* Dominuj asfaltu sekce */
            .dominate-container {
                grid-template-columns: 1fr;
                gap: 2rem;
                padding: 0;
            }

            .dominate-content {
                padding: 0 10px;
            }

            .dominate-content .section-title {
                font-size: 2rem;
                word-wrap: break-word;
                hyphens: auto;
            }

            .dominate-content .section-description {
                font-size: 1rem;
                margin-bottom: 1.5rem;
            }

            .progress-bars {
                margin: 1.5rem 0;
            }

            .progress-item {
                margin-bottom: 1rem;
            }

            .dominate-right {
                padding: 0 10px;
            }

            .dominate-image {
                width: 100%;
                height: auto;
                max-height: 300px;
            }

            .dominate-cta {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
                padding: 0 10px;
            }

            .dominate-cta h3 {
                font-size: 1.2rem;
                width: 100%;
            }

            /* Obrázky a karty */
            .models-card, .model-image {
                width: 100%;
                height: auto;
            }

            .slideshow-container {
                height: auto;
                max-height: 400px;
            }

            .slide {
                position: relative;
                height: auto;
            }

            .image-overlay {
                position: relative;
                padding: 1rem;
            }

            .image-overlay h3 {
                font-size: 1.5rem;
            }

            /* Obecné úpravy pro lepší čitelnost */
            .section-title, h1, h2, h3 {
                max-width: 100%;
                overflow-wrap: break-word;
                word-wrap: break-word;
                hyphens: auto;
            }
        }

        @media (max-width: 480px) {
            .model-nav {
                grid-template-columns: repeat(2, 1fr);
            }

            .hero-section h1, .dominate-content .section-title {
                font-size: 1.8rem;
            }

            .image-overlay h3 {
                font-size: 1.3rem;
            }

            .progress-info {
                font-size: 0.9rem;
            }
        }

        /* Footer */
        .footer {
            background-color: #181818;
            padding: 80px 8% 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 4rem;
        }

        .footer-column h3 {
            color: #fff;
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        .footer-column p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .footer-column ul {
            list-style: none;
            padding: 0;
        }

        .footer-column ul li {
            margin-bottom: 0.75rem;
        }

        .footer-column ul li a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .footer-column ul li a:hover {
            color: #E34146;
        }

        .copyright {
            background-color: #181818;
            padding: 20px 8%;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .copyright p {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.85rem;
        }

        @media (max-width: 1024px) {
            .footer-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 3rem;
            }
        }

        @media (max-width: 640px) {
            .footer-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .footer {
                padding: 60px 5% 30px;
            }
        }

        /* Contact Section */
        .contact-section {
            padding: 120px 8%;
            text-align: center;
            background-color: #181818;
        }

        .contact-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .contact-info {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            margin-top: 3rem;
            background: rgba(255, 255, 255, 0.05);
            padding: 2rem;
            border-radius: 12px;
        }

        .contact-item {
            text-align: center;
        }

        .contact-item h3 {
            color: #E44146;
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        .contact-item p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1rem;
            line-height: 1.6;
        }

        /* Úprava statistik pro zarovnání na střed */
        .stat-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        /* Úprava responzivity pro tlačítka modelů */
        @media (max-width: 768px) {
            .model-nav {
                display: flex;
                flex-wrap: nowrap;
                gap: 0.3rem;
                padding: 0 10px;
                width: 100%;
                overflow-x: auto;
                overflow-y: hidden;
                scrollbar-width: none;
                -ms-overflow-style: none;
            }

            /* Skrytí scrollbaru pro Chrome, Safari a novější prohlížeče */
            .model-nav::-webkit-scrollbar {
                display: none;
            }

            .model-btn {
                font-size: 0.7rem;
                padding: 0.3rem 0.5rem;
                white-space: nowrap;
                flex-shrink: 0;
            }

            /* Úprava FAQ pro mobilní zobrazení */
            .faq-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            /* Úprava kontaktní sekce pro mobilní zobrazení */
            .contact-info {
                grid-template-columns: 1fr;
                gap: 2rem;
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    @extends('layouts.app')

    @section('content')
    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Pronajmi si JDM auto dnes!</h1>
                <p>Vyber si své auto z naší kolekce JDM legend a vyraž na nezapomenutelnou jízdu!</p>
            </div>
            <div class="hero-tagline">
                <div class="hero-tagline-text">
                    <h3>Kde styl</h3>
                    <h3>potkává výkon</h3>
                </div>
                <a href="{{ route('dashboard') }}" class="btn">Objevte více</a>
            </div>
        </div>
    </div>

    <!-- Tvá brána k dokonalé jízdě -->
    <section class="section-ride">
        <div class="container">
            <div class="section-ride-content">
                <h2 class="section-title">Tvá brána k<br>dokonalé jízdě</h2>
                <p class="section-description">
                    Rezervace JDM aut nebyla nikdy jednodušší. Snadné ovládání a rychlá rezervace ti umožní zaměřit
                    se jen na řízení.
                </p>

                <div class="excellence-grid">
                    <div class="excellence-item">
                        <h3>Poháněno dokonalostí</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                    </div>
                    <div class="excellence-item">
                        <h3>Poháněno dokonalostí</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                    </div>
                </div>

                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-number">{{ $carsCount }}</div>
                        <div class="stat-text">aut dostupných k pronájmu</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">{{ $brandsCount }}</div>
                        <div class="stat-text">různých značek v nabídce</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">4000+</div>
                        <div class="stat-text">spokojených zákazníků</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">4.9</div>
                        <div class="stat-text">hodnocení s plnou spokojeností</div>
                    </div>
                </div>
            </div>

            <div class="section-images-wrapper">
                <a href="#" class="btn-objevte">Objevte nyní</a>
                <div class="section-images">
                    <div class="section-image">
                        <img src="/images/InzenyriPresnosti.jpg" alt="JDM auto 1">
                    </div>
                    <div class="section-image">
                        <img src="/images/DominujAsfaltu.jpg" alt="JDM auto 2">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Inženýři přesnosti -->
    <section class="hero-section">
        <div class="small-text">PRONAJMI SI SPORTOVNÍ MODEL</div>
        <h1>Inženýři přesnosti</h1>
        <p class="hero-description">Vyber si svůj oblíbený JDM model a připrav se na adrenalinovou jízdu.</p>

        <!-- Model navigation -->
        <div class="model-nav">
            <button class="model-btn active" data-model="1">Model 1</button>
            <button class="model-btn" data-model="2">Model 2</button>
            <button class="model-btn" data-model="3">Model 3</button>
            <button class="model-btn" data-model="4">Model 4</button>
            <button class="model-btn" data-model="5">Model 5</button>
        </div>

        <div class="models-content">
            <div class="models-card">
                <div class="slideshow-container">
                    <!-- První slide - původní -->
                    <div class="slide active" data-model="1">
                        <img src="/images/model1.jpg" alt="Model 1" class="model-image">
                        <div class="image-overlay">
                            <h3>Driven by Excellence</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit</p>
                        </div>
                    </div>
                    <!-- Další slidy -->
                    <div class="slide" data-model="2">
                        <img src="/images/model2.jpg" alt="Model 2" class="model-image">
                        <div class="image-overlay">
                            <h3>Síla a elegance</h3>
                            <p>Nechte se unést výkonem a stylem</p>
                        </div>
                    </div>
                    <div class="slide" data-model="3">
                        <img src="/images/model3.jpg" alt="Model 3" class="model-image">
                        <div class="image-overlay">
                            <h3>Rychlost bez kompromisů</h3>
                            <p>Zažijte pravou japonskou technologii</p>
                        </div>
                    </div>
                    <div class="slide" data-model="4">
                        <img src="/images/model4.jpg" alt="Model 4" class="model-image">
                        <div class="image-overlay">
                            <h3>Preciznost v detailu</h3>
                            <p>Každá křivka má svůj účel</p>
                        </div>
                    </div>
                    <div class="slide" data-model="5">
                        <img src="/images/model5.jpg" alt="Model 5" class="model-image">
                        <div class="image-overlay">
                            <h3>Legenda žije</h3>
                            <p>Ikona JDM kultury</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dominuj asfaltu -->
    <section class="dominate">
        <div class="dominate-container">
            <div class="dominate-content">
                <h2 class="section-title">Dominuj asfaltu</h2>
                <p class="section-description">
                    Naše vozy jsou navrženy pro nejvyšší výkon a spolehlivost. Vyber si model, který odpovídá tvému stylu.
                </p>
                <div class="progress-bars">
                    <div class="progress-item">
                        <div class="progress-info">
                            <span>Speed 1</span>
                            <span>80%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 80%;"></div>
                        </div>
                    </div>
                    <div class="progress-item">
                        <div class="progress-info">
                            <span>Speed 2</span>
                            <span>60%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 60%;"></div>
                        </div>
                    </div>
                    <div class="progress-item">
                        <div class="progress-info">
                            <span>Speed 3</span>
                            <span>90%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 90%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dominate-right">
                <div class="dominate-image">
                    <img src="/images/DominujAsfaltu.jpg" alt="Dominuj asfaltu">
                </div>
                <div class="dominate-cta">
                    <h3>Síla v každé zatáčce!</h3>
                    <a href="#" class="btn-rezervujte">Rezervujte nyní </a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Contact Section -->
    <section class="contact-section">
        <div class="contact-container">
            <h2 class="section-title">Spojte se s naším týmem podpory</h2>
            <p class="section-description">Máte otázky ohledně rezervace? Kontaktujte nás a náš tým vám pomůže.</p>
            
            <div class="contact-info">
                <div class="contact-item">
                    <h3>Email:</h3>
                    <p>podpora@jedeme.cz</p>
                </div>
                <div class="contact-item">
                    <h3>Telefon:</h3>
                    <p>+420 123 456 789</p>
                </div>
                <div class="contact-item">
                    <h3>Adresa:</h3>
                    <p>Ulice 123<br>Město, PSČ</p>
                </div>
                <div class="contact-item">
                    <h3>Provozní Doba:</h3>
                    <p>Pondělí - Pátek: 9:00 - 18:00<br>Sobota: 10:00 - 16:00<br>Neděle: zavřeno</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Často kladené otázky -->
    <section class="faq-section">
        <h2 class="section-title">Často Kladené Otázky</h2>
        <p class="section-description">
            Lorem ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Sed Do Eiusmod Tempor Incididunt Ut Labore Et Dolore Magna.
            Aliqua Ut Enim Ad Minim Veniam, Quis Nostrud Exercitation Ullamco Laboris Nisi Ut Aliquip
        </p>

        <div class="faq-grid">
            <div class="faq-column">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Jaké JDM vozy nabízíte?</span>
                        <button class="expand-btn">↓</button>
                    </div>
                    <div class="faq-answer">
                        Nabízíme širokou škálu JDM modelů, včetně Nissanu Skyline a Toyota Supra
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Jak dlouho dopředu musím rezervovat?</span>
                        <button class="expand-btn">↓</button>
                    </div>
                    <div class="faq-answer">
                        Doporučujeme rezervovat alespoň týden předem, zejména v hlavní sezóně. Pro víkendové pronájmy je lepší rezervovat s větším předstihem.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Jak mohu zrušit rezervaci?</span>
                        <button class="expand-btn">↓</button>
                    </div>
                    <div class="faq-answer">
                        Rezervaci můžete zrušit až 48 hodin před začátkem pronájmu bez poplatku. Stačí nás kontaktovat emailem nebo telefonicky.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Jaká je záruka na vaše auta?</span>
                        <button class="expand-btn">↓</button>
                    </div>
                    <div class="faq-answer">
                        Všechna naše auta jsou pravidelně servisována a mají plné pojištění. V případě jakýchkoliv technických problémů poskytujeme náhradní vůz.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Mohu si auto přizpůsobit?</span>
                        <button class="expand-btn">↓</button>
                    </div>
                    <div class="faq-answer">
                        Ano, nabízíme možnost různých úprav a vylepšení. Konkrétní možnosti konzultujte s našimi techniky před pronájmem.
                    </div>
                </div>
            </div>

            <div class="faq-column">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>Jaké financování nabízíte?</span>
                        <button class="expand-btn">↓</button>
                    </div>
                    <div class="faq-answer">
                        Nabízíme různé možnosti platby včetně splátkového kalendáře, kreditních karet a firemních účtů. Pro dlouhodobé pronájmy poskytujeme speciální podmínky.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Jak mohu udržovat auto v perfektním stavu?</span>
                        <button class="expand-btn">↓</button>
                    </div>
                    <div class="faq-answer">
                        Poskytujeme kompletní návod k údržbě a našeho technika na telefonu 24/7. Doporučujeme pravidelné kontroly a šetrné zacházení s vozem.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Co bych měl vědět o pojištění auta?</span>
                        <button class="expand-btn">↓</button>
                    </div>
                    <div class="faq-answer">
                        Všechna naše auta mají plné havarijní pojištění a povinné ručení. Spoluúčast při nehodě je minimální a lze ji předem snížit.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Jakou nabízíte podporu?</span>
                        <button class="expand-btn">↓</button>
                    </div>
                    <div class="faq-answer">
                        Máme k dispozici 24/7 zákaznickou podporu, odtahovou službu a síť servisních partnerů po celé ČR. V případě problému jsme vždy připraveni pomoci.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Jsou sportovní vozy vhodné pro každodenní jízdu?</span>
                        <button class="expand-btn">↓</button>
                    </div>
                    <div class="faq-answer">
                        Naše JDM vozy jsou plně přizpůsobené pro běžný provoz. Přesto doporučujeme zvážit jejich využití vzhledem k vyšší spotřebě a sportovnímu charakteru.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <span>Jak si vybrat správné JDM auto pro mě?</span>
                        <button class="expand-btn">↓</button>
                    </div>
                    <div class="faq-answer">
                        Rádi vám pomůžeme s výběrem podle vašich preferencí a zkušeností. Můžete si také domluvit testovací jízdu a vyzkoušet různé modely.
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.slide');
            const buttons = document.querySelectorAll('.model-btn');
            let currentSlide = 0;
            let slideInterval;

            // Funkce pro změnu slidu
            function showSlide(index) {
                slides.forEach(slide => {
                    slide.classList.remove('active');
                });
                buttons.forEach(button => {
                    button.classList.remove('active');
                });

                slides[index].classList.add('active');
                buttons[index].classList.add('active');
                currentSlide = index;
            }

            // Event listenery pro tlačítka
            buttons.forEach((button, index) => {
                button.addEventListener('click', () => {
                    showSlide(index);
                    resetInterval();
                });
            });

            // Automatická slideshow
            function startSlideshow() {
                slideInterval = setInterval(() => {
                    let nextSlide = (currentSlide + 1) % slides.length;
                    showSlide(nextSlide);
                }, 5000); // Změna každých 5 sekund
            }

            // Reset intervalu při kliknutí na tlačítko
            function resetInterval() {
                clearInterval(slideInterval);
                startSlideshow();
            }

            // Spuštění slideshow
            startSlideshow();

            const faqItems = document.querySelectorAll('.faq-item');
            
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                
                question.addEventListener('click', () => {
                    const isActive = item.classList.contains('active');
                    
                    // Zavře všechny ostatní odpovědi
                    faqItems.forEach(otherItem => {
                        otherItem.classList.remove('active');
                    });
                    
                    // Přepne aktuální odpověď
                    if (!isActive) {
                        item.classList.add('active');
                    }
                });
            });
        });
    </script>
</body>

</html>