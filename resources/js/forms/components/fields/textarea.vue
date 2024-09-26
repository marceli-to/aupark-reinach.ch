<template>
  <div class="relative">
    <textarea
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      @focus="$emit('update:error', '')"
    >
    </textarea>
    <Error :error="error" />
  </div>
</template>

<script setup>
import { defineEmits } from 'vue';
import Error from './error.vue';
const props = defineProps({
  modelValue: {
    type: String,
    default: ''
  },
  error: {
    type: String,
    default: ''
  }
});

const emit = defineEmits(['update:modelValue', 'update:error']);
</script>
