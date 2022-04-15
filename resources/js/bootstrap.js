window._ = require('lodash');
window.$ = window.jQuery = require('jquery')
try {
    require('bootstrap');
} catch (e) { }

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
import Echo from "laravel-echo";
window.Pusher = require("pusher-js");
//Pusher.logToConsole = true;
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Echo = new Echo({
    broadcaster: process.env.MIX_BROADCAST_DRIVER,
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: "us2",
    forceTLS: true
});
