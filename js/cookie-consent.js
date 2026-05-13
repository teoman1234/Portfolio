/**
 * Cookie Consent Banner
 * Kullanıcı onayını "cookie_consent" adlı bir cookie'de 1 yıl boyunca saklar.
 */

(function () {
    function getCookie(name) {
        const match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        return match ? decodeURIComponent(match[2]) : null;
    }

    function setCookie(name, value, days) {
        const d = new Date();
        d.setTime(d.getTime() + days * 24 * 60 * 60 * 1000);
        document.cookie = name + '=' + encodeURIComponent(value) +
            ';expires=' + d.toUTCString() +
            ';path=/;SameSite=Lax';
    }

    document.addEventListener('DOMContentLoaded', () => {
        const banner = document.getElementById('cookieBanner');
        const acceptBtn = document.getElementById('cookieAccept');
        if (!banner || !acceptBtn) return;

        if (getCookie('cookie_consent') !== 'accepted') {
            banner.classList.add('is-visible');
        }

        acceptBtn.addEventListener('click', () => {
            setCookie('cookie_consent', 'accepted', 365);
            banner.classList.remove('is-visible');
        });
    });
})();
