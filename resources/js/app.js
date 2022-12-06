import './bootstrap';
import '../css/app.css';

const axios = require("axios");

const form = document.getElementById('form');
const inputMessage = document.getElementById('input-message');
const listMessage = document.getElementById('list-messages');
form.addEventListener('submit', function (event) {
    event.preventDefault();
    const userInput = inputMessage.value;

    axios.post('/chat-message', {
        message: userInput
    })

    inputMessage.value = "";

});
function addChatMessage(name, message, color="black"){
    const li = document.createElement('li');

    li.classList.add('d-flex', 'flex-col');

    const span = document.createElement('span')
    span.classList.add('message-author');
    span.textContent = name;

    const messageSpan = document.createElement('span');
    messageSpan.textContent = message;

    messageSpan.style.color = color;

    li.append(span, messageSpan);

    listMessage.append(li);
}
//const channel = Echo.channel('public.chat.1'); // public channel
const channel = Echo.private('private.chat.1'); // private channel

channel.subscribed(()=>{
    console.log('subscribed');
}).listen('.chat-message',(event)=>{
   // console.log(event);
   // const User = event.user;
   // const message = User.name + " : " + event.message;

   // const  li = document.createElement('li');
   // li.textContent = message;
  //  listMessage.append(li);
    addChatMessage(event.user.name,event.message);

})


//import ExampleComponent from './components/ExampleComponent.vue';
// app.component('example-component', ExampleComponent);

// import { createApp, h } from 'vue';
// import { createInertiaApp } from '@inertiajs/inertia-vue3';
// import { InertiaProgress } from '@inertiajs/progress';
// import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
// import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
//
// const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';
//
// createInertiaApp({
//     title: (title) => `${title} - ${appName}`,
//     resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
//     setup({ el, app, props, plugin }) {
//         return createApp({ render: () => h(app, props) })
//             .use(plugin)
//             .use(ZiggyVue, Ziggy)
//             .mount(el);
//     },
// });
//
// InertiaProgress.init({ color: '#4B5563' });
