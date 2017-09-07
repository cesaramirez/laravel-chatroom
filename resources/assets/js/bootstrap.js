import UIkit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';
import lodash from 'lodash';
import axios from 'axios';

UIkit.use(Icons);

window._ = lodash;
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

import Echo from 'laravel-echo'

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'fc1bb2ba1a19ded93e6c',
    cluster: 'us2',
    encryption: true
});
