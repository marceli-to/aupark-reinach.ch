<template>
  <div v-if="error" :class="classes" class="bg-red-600 text-white absolute top-0 right-0 px-4 text-xs">{{ error }}</div>
</template>
<script setup>

const props = defineProps({
  error: {
    type: String,
    default: ''
  },
  classes: {
    type: String,
    default: ''
  }
});
</script>