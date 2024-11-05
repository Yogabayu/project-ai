<template>
    <div class="form-container">
        <label for="prompt-input" class="label">Prompt:</label>
        <textarea id="prompt-input" v-model="prompt" placeholder="Enter your prompt here" class="textarea"></textarea>
        <button @click="$emit('submit-prompt', prompt)" class="submit-button">
            Send Prompt
        </button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            prompt: '',
        }
    },
}
</script>

<style scoped>
.form-container {
    width: 100%;
    max-width: 800px;
    display: flex;
    flex-direction: column;
    margin: 20px 0;
}

.label {
    font-size: 1.1em;
    margin-bottom: 8px;
    font-weight: 500;
    color: black;
}

.textarea {
    width: 100%;
    padding: 12px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 1em;
    resize: none;
    min-height: 120px;
    margin-bottom: 12px;
    transition: border 0.3s ease;
}

.textarea:focus {
    border: 1px solid #3498db;
    outline: none;
}

.submit-button {
    padding: 12px 20px;
    background-color: #3498db;
    border: none;
    border-radius: 6px;
    color: white;
    font-size: 1em;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.submit-button:hover {
    background-color: #2980b9;
}
</style>
