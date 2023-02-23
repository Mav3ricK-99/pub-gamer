window._ = require('lodash');
window.$ = window.jQuery = require('jquery')

require('bootstrap');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
import Echo from "laravel-echo";
window.Pusher = require("pusher-js");
//Pusher.logToConsole = true;
window.axios = require('axios');

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.Echo = new Echo({
    //Esto deberia ? cargar de .env
    broadcaster: 'pusher',
    key: '9543cee9c90878346997',
    cluster: "us2",
    forceTLS: true
});
