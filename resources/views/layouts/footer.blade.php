@vite(['resources/css/footer.css'])

<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-brand">
            <a href="{{ url('/dashboard') }}" class="inline-block hover:opacity-90 transition-opacity">
                <img src="{{ asset('img/logo.svg') }}" alt="DBEbay">
            </a>
        </div>
        <div class="footer-column">
            <h3>Unternehmen</h3>
            <a href="#">Über uns</a>
            <a href="#">Karriere</a>
            <a href="#">Newsletter</a>
            <a href="#">Hilfebereich</a>
        </div>
        <div class="footer-column">
            <h3>Rechtliches</h3>
            <a href="#">Impressum</a>
            <a href="#">Datenschutz</a>
            <a href="#">AGB</a>
        </div>
        <div class="footer-column social-column">
            <h3>Social Media</h3>
            <div class="social-icons">
                <a href="#" aria-label="Instagram">
                    <img src="{{ asset('img/instagram.svg') }}" alt="">
                </a>
                <a href="#" aria-label="Facebook">
                    <img src="{{ asset('img/facebook.svg') }}" alt="">
                </a>
                <a href="#" aria-label="YouTube">
                    <img src="{{ asset('img/youtube.svg') }}" alt="">
                </a>
                <a href="#" aria-label="TikTok">
                    <img src="{{ asset('img/tiktok.svg') }}" alt="">
                </a>
            </div>
            <p>© 2026 DBEbay - KAS. Alle Rechte vorbehalten.</p>
        </div>
    </div>
</footer>
