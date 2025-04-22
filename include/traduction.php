<!-- include/traduction.php -->
<div id="google_translate_element" style="display:none;"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'fr',
        includedLanguages: 'fr,en,de,es,it,mg,pt',
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
    }, 'google_translate_element');
}
</script>

<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script>
// Applique la langue sauvegardée automatiquement
function triggerTranslation(lang) {
    const interval = setInterval(() => {
        const select = document.querySelector('.goog-te-combo');
        if (select) {
            select.value = lang;
            select.dispatchEvent(new Event('change'));
            clearInterval(interval);
        }
    }, 500);
}

document.addEventListener("DOMContentLoaded", () => {
    const savedLang = localStorage.getItem("selectedLang");
    if (savedLang) {
        triggerTranslation(savedLang);
    }
});
</script>

<!-- Barre de sélection de langue -->
<div style="position: fixed; top: 15px; left: 15px; z-index: 9999;">
    <select onchange="localStorage.setItem('selectedLang', this.value); triggerTranslation(this.value);" style="padding: 5px; font-size: 14px;">
        <option value="">🌐 Choisir langue</option>
        <option value="fr">Français</option>
        <option value="en">English</option>
        <option value="de">Deutsch</option>
        <option value="es">Español</option>
        <option value="it">Italiano</option>
        <option value="mg">Malagasy</option>
        <option value="pt">Português</option>
    </select>
</div>

<style>
iframe.skiptranslate,
.goog-te-banner-frame,
.goog-logo-link,
.goog-te-gadget span {
    display: none !important;
}
body {
    top: 0 !important;
}
</style>
