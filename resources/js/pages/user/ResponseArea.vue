<template>
  <div class="response-container">
    <div v-if="response" class="typed-text">
      <p class="text-content">{{ typedText }}</p>
    </div>
    <div v-else class="loading-container">
      <div class="spinner"></div>
      <p class="loading-message">Waiting for AI response...</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "ResponseArea",
  props: {
    response: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      typedText: "", // Data property to hold the typed text
    };
  },
  mounted() {
    if (this.response) {
      this.typeText(this.response); // Start typing when mounted
    }
  },
  methods: {
    typeText(text) {
      this.typedText = ""; // Reset typedText before typing
      let index = 0;
      const typingSpeed = 30;

      const type = () => {
        if (index < text.length) {
          this.typedText += text.charAt(index); // Append character to typedText
          index++;
          setTimeout(type, typingSpeed);
        }
      };
      type();
    },
  },
};
</script>

<style scoped>
.response-container {
  background-color: #ffffff;
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 20px;
  max-width: 800px;
  width: 100%;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.text-content {
  font-family: "Courier New", monospace;
  color: #333;
  white-space: pre-wrap;
  text-align: justify !important;
}

.loading-container {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.spinner {
  border: 4px solid rgba(0, 0, 0, 0.1);
  border-top-color: #3498db;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  to {
    transform: rotate(360deg);
  }
}

.loading-message {
  margin-top: 10px;
  font-size: 0.9em;
  color: #666;
}
</style>
