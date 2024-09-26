import { createApp } from 'vue';
import ContactForm from './ContactForm.vue';
const app = createApp(ContactForm);
if (document.getElementById('contact-form')) {
  app.mount('#contact-form');
}