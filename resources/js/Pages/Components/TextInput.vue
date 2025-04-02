<script setup>
const model = defineModel({
    type: null,
    required: true,
});

defineProps({
    title: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        default: "text",
    },
    message: String,
});
</script>

<template>
    <div class="mb-6">
        <label>{{ title }}</label>
        <input class="border border-gray-300 rounded p-2" :type="text" v-model="model"  />
        <small class="ml-2 text-red-500 text-xs italic" v-if="message">{{ message }}</small>
    </div>
</template>
