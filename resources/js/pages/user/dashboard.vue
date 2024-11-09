<template>
  <div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <!-- Prompt Form Column -->
      <div class="bg-white rounded-lg shadow-lg p-6">
        <PromptForm
          @submit-prompt="handlePromptSubmit"
          :isLoading="isLoading"
        />
      </div>

      <!-- Response Column -->
      <div class="bg-white rounded-lg shadow-lg p-6">
        <Transition
          enter-active-class="transition-opacity duration-300"
          enter-from-class="opacity-0"
          enter-to-class="opacity-100"
        >
          <!-- Loading State -->
          <div
            v-if="isLoading"
            class="min-h-[200px] flex flex-col items-center justify-center space-y-4"
          >
            <div class="relative w-12 h-12">
              <div class="absolute top-0 left-0 w-full h-full">
                <div
                  class="w-12 h-12 rounded-full border-4 border-blue-200 border-t-blue-600 animate-spin"
                ></div>
              </div>
            </div>
            <!-- <p class="text-gray-600">Processing your request...</p> -->
            <div class="loading-container">
              <div class="loading-content">
                <div class="spinner"></div>
                <p class="loading-message">AI sedang menyiapkan jawaban...</p>
                <p class="loading-subtitle">Mohon tunggu sebentar</p>
              </div>
            </div>
          </div>

          <!-- Response Content -->
          <ResponseArea
            v-else-if="response"
            :response="response"
            class="min-h-[200px]"
          />

          <!-- Empty State -->
          <!-- <div
            v-else
            class="flex items-center justify-center min-h-[200px] text-gray-500"
          >
            Your response will appear here
          </div> -->
        </Transition>
      </div>
    </div>

    <!-- Toast Notifications -->
    <div
      v-if="error"
      class="fixed bottom-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg transition-opacity duration-300"
      @click="clearError"
    >
      {{ error }}
      <span class="text-sm ml-2">(Click to dismiss)</span>
    </div>
  </div>
</template>

<script>
import mainURL from "@/axios";
import PromptForm from "./PromptForm.vue";
import ResponseArea from "./ResponseArea.vue";

export default {
  name: "PromptResponseLayout",

  components: {
    PromptForm,
    ResponseArea,
  },

  data() {
    return {
      response: "",
      isLoading: false,
      error: "",
    };
  },

  methods: {
    clearError() {
      this.error = "";
    },

    async handlePromptSubmit(prompt) {
      try {
        // Clear states
        this.error = "";
        this.isLoading = true;
        this.response = "";

        const formData = new FormData();
        formData.append("prompt", prompt);
        formData.append("_method", "POST");

        // Add artificial delay for better UX if response is too quick
        const [response] = await Promise.all([
          mainURL.post("/run-api", formData),
          new Promise((resolve) => setTimeout(resolve, 400)), // Minimum loading time
        ]);

        if (response.status === 200) {
          this.response = response.data.content;
        } else {
          throw new Error("Request failed");
        }
      } catch (err) {
        console.error("Error submitting prompt:", err);
        this.error = "Something went wrong. Please try again.";
        this.response = ""; // Clear response on error
      } finally {
        this.isLoading = false;
      }
    },
  },
};
</script>

<style scoped>

.loading-container {
  min-height: 200px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.loading-content {
  text-align: center;
}

.spinner {
  border: 3px solid #f3f3f3;
  border-top: 3px solid #3498db;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  animation: spin 1s linear infinite;
  margin: 0 auto 1rem;
}

.loading-message {
  color: #2c3e50;
  font-size: 1.1rem;
  margin: 0.5rem 0;
  font-weight: 500;
}

.loading-subtitle {
  color: #666;
  font-size: 0.9rem;
  margin: 0;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
