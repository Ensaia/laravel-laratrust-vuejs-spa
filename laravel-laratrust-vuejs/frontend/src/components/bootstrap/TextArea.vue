<template>
  <label
    :for="name"
    class="form-label"
    :class="{ 'visually-hidden': !showLabel }"
    v-if="label"
  >
    {{ label }}
    <span class="text-red-600" v-if="$props.required">*</span>
  </label>
  <textarea
    :id="name"
    :required="required"
    :disabled="disabled"
    :placeholder="placeholder"
    :autocomplete="autocomplete"
    :class="['form-control', { 'is-invalid': error }]"
    v-model="model"
    rows="3"
  ></textarea>
  <span v-if="error" class="valid-feedback">{{ error }}</span>
</template>
<script setup>
defineOptions({
  name: "TextArea",
});
const model = defineModel();
defineProps({
  for: {
    type: String,
    default: "",
  },
  label: {
    type: String,
    default: "",
  },
  id: {
    type: String,
    default: "",
  },
  placeholder: {
    type: String,
    default: "",
  },
  required: {
    type: Boolean,
    default: false,
  },
  autocomplete: {
    type: String,
    default: "off",
  },
  disabled: {
    type: Boolean,
    default: false,
  },
  error: {
    type: String,
    default: "",
  },
  showLabel: {
    type: Boolean,
    default: true,
  },
});
</script>
