<!-- Footer -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-column">
            <h3>O nás</h3>
            <p>Jsme specializovaná půjčovna JDM vozů, která nabízí jedinečnou příležitost zažít legendární japonské sportovní vozy.</p>
        </div>
        <div class="footer-column">
            <h3>Rychlé odkazy</h3>
            <ul>
                <li><a href="{{ route('landing') }}">Domů</a></li>
                <li><a href="{{ route('dashboard') }}">Auta</a></li>
                <li><a href="{{ route('contact') }}">Kontakt</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Kontakt</h3>
            <p>Email: info@jedeme.cz</p>
            <p>Telefon: +420 123 456 789</p>
            <p>Adresa: Ulice 123, Město, PSČ</p>
        </div>
    </div>
</footer>

<div class="copyright">
    <p>&copy; {{ date('Y') }} JeDeMe. Vytvořil: Nikolas Hendrych 4F</p>
</div> 