<template>
  <div
    :class="['alert', `alert-${variant}`, 'alert-dismissible', 'fade', 'show']"
    class="d-flex justify-content-between"
    role="alert"
  >
    <!-- Slot allows passing complex HTML or plain text -->
    <div>
      <slot>{{ message }}</slot>
    </div>
    <div>
      <font-awesome-icon :icon="['fas', icon]" size="lg" />
    </div>
    <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"
    ></button>
  </div>
</template>

<script setup>
// Define the properties required by the component
defineProps({
  message: {
    type: String,
    default: "",
  },
  variant: {
    type: String,
    default: "primary", // success, danger, warning, info, primary, secondary, light, dark
  },
  icon: {
    type: String,
    default: "info-circle", // Font Awesome icon name
  },
  // show: {
  //   type: Boolean,
  //   default: true,
  // },
});

// Emits event to parent for two-way state syncing
// const emit = defineEmits(["close"]);
//
// const dismissAlert = () => {
//   emit("close");
// };
</script>
