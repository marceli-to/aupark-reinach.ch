<template>
  <div :class="classes" class="mb-20 last-of-type:mb-0 md:mb-0 md:col-span-6">
    <slot></slot>
  </div>
</template>
<script setup>
const props = defineProps({
  classes: {
    type: String,
    default: ''
  }
});
</script>