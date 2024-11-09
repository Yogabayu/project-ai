<template>
    <div class="form-container">
        <div class="form-header">
            <h2 class="title">Asisten AI</h2>
            <p class="subtitle">Bagaimana saya dapat membantu Anda hari ini?</p>
        </div>
        <div class="input-wrapper">
            <textarea 
                id="prompt-input" 
                v-model="prompt" 
                placeholder="Ketik pertanyaan atau permintaan Anda di sini..." 
                class="textarea"
                @input="autoResize"
                ref="textArea"
            ></textarea>
            <div class="button-container">
                <button 
                    @click="$emit('submit-prompt', prompt)"
                    class="submit-button"
                    :disabled="!prompt.trim()"
                >
                    <span class="button-text">Bantu Saya</span>
                    <span class="button-icon">→</span>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            prompt: '',
        }
    },
    methods: {
        autoResize() {
            const textarea = this.$refs.textArea;
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        }
    },
    mounted() {
        this.$refs.textArea.focus();
    }
}
</script>

<style scoped>
.form-container {
    width: 100%;
    max-width: 800px;
    margin: 2rem auto;
    padding: 2rem;
    background-color: #ffffff;
    border-radius: 16px;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 
                0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.form-header {
    text-align: center;
    margin-bottom: 2rem;
}

.title {
    font-size: 2rem;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 0.5rem;
}

.subtitle {
    font-size: 1.1rem;
    color: #666;
    margin: 0;
}

.input-wrapper {
    position: relative;
}

.textarea {
    width: 100%;
    min-height: 120px;
    padding: 1rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #1a1a1a;
    background-color: #f8f9fa;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    resize: none;
    transition: all 0.3s ease;
    margin-bottom: 1rem;
}

.textarea:focus {
    outline: none;
    border-color: #3498db;
    background-color: #ffffff;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
}

.textarea::placeholder {
    color: #adb5bd;
}

.button-container {
    display: flex;
    justify-content: flex-end;
}

.submit-button {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 10px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 2px 4px rgba(52, 152, 219, 0.2);
}

.submit-button:hover {
    background-color: #2980b9;
    transform: translateY(-1px);
    box-shadow: 0 4px 6px rgba(52, 152, 219, 0.3);
}

.submit-button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
    transform: none;
    box-shadow: none;
}

.button-text {
    font-weight: 600;
}

.button-icon {
    font-size: 1.2rem;
}

@media (max-width: 640px) {
    .form-container {
        padding: 1rem;
        margin: 1rem;
    }

    .title {
        font-size: 1.5rem;
    }

    .subtitle {
        font-size: 1rem;
    }
}
</style>
