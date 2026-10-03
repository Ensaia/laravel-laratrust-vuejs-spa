<template>
  <label
    v-if="label"
    :for="name"
    class="form-label"
    :class="{ 'visually-hidden': !showLabel }"
  >
    {{ label }}
    <span class="text-red-600" v-if="$props.required">*</span>
  </label>
  <input
    :id="id"
    :type="type"
    :class="['form-control', { 'is-invalid': error }]"
    :placeholder="placeholder"
    :value="value"
    @input="$emit('input', $event.target.value)"
    :required="required"
    :autocomplete="autocomplete"
    :disabled="disabled"
  />
  <span v-if="error" class="valid-feedback">{{ error }}</span>
</template>

<script setup>
/** 
 const emit = defineEmits(['update:modelValue']);
 const inInput = (event) => {
    emit('update:modelValue', event.target.value);
  };
  // we can use const model = defineModel() instead of the above code, but it is not supported in Vue 3.2 yet,
  //  so we will use the above code for now.
*/

defineOptions({
  name: "InputField",
});

const props = defineProps({
  for: {
    type: String,
    default: "",
  },
  type: {
    type: String,
    default: "text",
  },
  name: {
    type: String,
    required: true,
  },
  id: {
    type: String,
    default: "",
  },
  label: {
    type: String,
    default: "",
  },
  placeholder: {
    type: String,
    default: "",
  },
  value: {
    type: [String, Number],
    default: "",
  },
  error: {
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
  class: {
    type: String,
    default: "",
  },
  showLabel: {
    type: Boolean,
    default: true,
  },
});
/*
In Vue.js, emit is a built-in method used by child components to send data or trigger events in their parent components.
--------
we use : when you want to pass a dynamic JavaScript expression, variable, number, boolean, object, or array as a prop
*/
</script>

<style scoped>
.form-group {
  margin-bottom: 1rem;
}
</style>
<!--
      props: {
    value: {
      type: [String, Number],
      default: "",
    },
    label: {
      type: String,
      default: "",
    },
    type: {
      type: String,
      default: "text",
    },
    placeholder: {
      type: String,
      default: "",
    },
    error: {
      type: String,
      default: "",
    },
  },
  --->
