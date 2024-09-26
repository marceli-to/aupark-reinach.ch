<template>
  <button :type="type" :class="classes" :disabled="disabled">{{ label }}</button>
</template>
<script setup>
const props = defineProps({
  type: {
    type: String,
    default: 'submit'
  },
  label: {
    type: String,
    required: true
  },
  classes: {
    type: String,
    default: 'bg-pine text-white px-10 py-6 lg:px-12 lg:py-8 rounded-sm uppercase tracking-wider inline-flex items-center w-auto justify-center hover:bg-bronze hover:text-white transition-all disabled:opacity-50 disabled:cursor-not-allowed'
  },
  disabled: {
    type: Boolean,
    default: false
  }
});
</script>