<template>
  <div :class="['text-red-500 bg-red-50 mb-20 xl:mb-40 p-10 border border-red-500', classes]">
    <slot></slot>
  </div>
</template>

<script>
export default {
  props: {
    classes: {
      type: [String, Array, Object],
      default: '',
    },
  },
}
</script>