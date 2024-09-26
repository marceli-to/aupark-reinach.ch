<template>
  <form @submit.prevent="submitForm" class="max-w-4xl md:grid md:grid-cols-12 md:gap-20 lg:gap-20">
    <template v-if="isSuccess">
      <alert-success>
        Ihre Anfrage wurde erfolgreich versendet.
      </alert-success>
    </template>
    <form-group class="md:!col-span-12">
      <p class="mb-10">Ich interessiere mich für folgende Wohnung (bitte auswählen):</p>
      <template v-if="errors.interest">
        <form-error :error="errors.interest" classes="!relative !inline-block !w-auto !mb-10" />
      </template>
      <div class="flex flex-wrap gap-5 md:gap-20 relative">
        <div class="flex flex-col gap-5">
          <form-checkbox
            :id="'interest-2-5-zimmer'"
            :name="'interest-2-5-zimmer'"
            v-model="form.interest['2.5-Zimmerwohnung-Service']"
            :label="'2.5-Zimmerwohnung (Wohnen mit Service)'"
            :value="'2.5-Zimmerwohnung (Wohnen mit Service)'"
            @change="errors.interest = null"
          />
          <form-checkbox
            :id="'interest-3-5-zimmer'"
            :name="'interest-3-5-zimmer'"
            v-model="form.interest['3.5-Zimmerwohnung-Service']"
            :label="'3.5-Zimmerwohnung (Wohnen mit Service)'"
            :value="'3.5-Zimmerwohnung (Wohnen mit Service)'"
            @change="errors.interest = null"
          />
        </div>
        <div class="flex flex-col gap-5">
          <form-checkbox
            :id="'interest-4-5-zimmer'"
            :name="'interest-4-5-zimmer'"
            v-model="form.interest['4.5-Zimmerwohnung']"
            :label="'4.5-Zimmerwohnung'"
            :value="'4.5-Zimmerwohnung'"
            @change="errors.interest = null"
          />
          <form-checkbox
            :id="'interest-5-5-zimmer'"
            :name="'interest-5-5-zimmer'"
            v-model="form.interest['5.5-Zimmerwohnung']"
            :label="'5.5-Zimmerwohnung'"
            :value="'5.5-Zimmerwohnung'"
            @change="errors.interest = null"
          />
        </div>
      </div>
    </form-group>
    <form-group>
      <form-text-field 
        v-model="form.firstname" 
        placeholder="Vorname"
        :error="errors.firstname"
        @update:error="errors.firstname = $event"
      />
    </form-group>
    <form-group>
      <form-text-field 
        v-model="form.name" 
        placeholder="Name"
        :error="errors.name"
        @update:error="errors.name = $event"
      />
    </form-group> 
    <form-group>
      <form-text-field 
        v-model="form.street" 
        placeholder="Strasse/Nr."
        :error="errors.street"
        @update:error="errors.street = $event"
      />
    </form-group>
    <form-group>
      <form-text-field 
        v-model="form.location" 
        placeholder="PLZ/Ort"
        :error="errors.location"
        @update:error="errors.location = $event"
      />
    </form-group> 
    <form-group>
      <form-text-field 
        type="email"
        placeholder="E-Mail"
        v-model="form.email" 
        :error="errors.email"
        @update:error="errors.email = $event"
      />
    </form-group>
    <form-group>
      <form-text-field 
        type="tel"
        placeholder="Telefon"
        v-model="form.phone" 
        :error="errors.phone"
        @update:error="errors.phone = $event"
      />
    </form-group>
    <form-group class="md:!col-span-12">
      <form-text-area 
        v-model="form.message" 
        :error="errors.message"
        @update:error="errors.message = $event"
      />
    </form-group>
    <form-group class="md:!col-span-12">
      <form-toc 
        id="toc" 
        label="Datenschutzerklärung" 
        v-model="form.toc"
        :error="errors.toc" 
        @update:error="errors.toc = $event"
      />
    </form-group>
    <form-group classes="md:!col-span-12">
      <form-button 
        type="submit" 
        label="Absenden" 
        :disabled="isSubmitting"
      />
    </form-group>

  </form>
</template>
<script setup>
import { ref, onMounted, watch } from 'vue';
import axios from 'axios';
import FormGroup from '../components/fields/group.vue';
import FormError from '../components/fields/error.vue';
import FormTextField from '../components/fields/text.vue';
import FormTextArea from '../components/fields/textarea.vue';
import FormCheckbox from '../components/fields/checkbox.vue';
import FormButton from '../components/fields/button.vue';
import FormToc from '../components/fields/toc.vue';
import AlertSuccess from '../components/alerts/success.vue';

const isSuccess = ref(false);

const form = ref({
  name: '',
  firstname: '',
  street: '',
  location: '',
  email: '',
  phone: '',
  message: '',
  interest: {
    '2.5-Zimmerwohnung-Service': false,
    '3.5-Zimmerwohnung-Service': false,
    '4.5-Zimmerwohnung': false,
    '5.5-Zimmerwohnung': false
  },
  toc: false,
});

const errors = ref({
  name: '',
  firstname: '',
  street: '',
  location: '',
  email: '',
  phone: '',
  message: '',
  toc: '',
  interest: '',
});

const isSubmitting = ref(false);

async function submitForm() {
  isSubmitting.value = true;
  try {
    const formData = { ...form.value };
    // Convert interest object to array of selected options
    formData.interest = Object.entries(formData.interest)
      .filter(([_, value]) => value)
      .map(([key, _]) => key);

    const response = await axios.post('/api/contact-request', {
      ...formData
    });
    handleSuccess();
    return true;

  } catch (error) {
    handleError(error);
    return false;
  }
}

function handleSuccess() {
  form.value = {
    name: '',
    firstname: '',
    street: '',
    location: '',
    email: '',
    phone: '',
    message: '',
    interest: {
      '2.5-Zimmerwohnung-Service': false,
      '3.5-Zimmerwohnung-Service': false,
      '4.5-Zimmerwohnung': false,
      '5.5-Zimmerwohnung': false
    },
    toc: false,
  };
  errors.value = {
    interest: '',
    name: '',
    firstname: '',
    street: '',
    location: '',
    email: '',
    phone: '',
    message: '',
    toc: '',
  };
  isSubmitting.value = false;
  isSuccess.value = true;

  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
}

function handleError(error) {
  if (error.response && error.response.data && typeof error.response.data.errors === 'object') {
    Object.keys(error.response.data.errors).forEach(key => {
      errors.value[key] = error.response.data.errors[key][0];
    });
    isSubmitting.value = false;
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  }
}
</script>