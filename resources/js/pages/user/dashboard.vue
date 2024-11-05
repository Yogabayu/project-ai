<template>
  <div class="d-flex justify-center my-5 mx-5">
    <VRow>
      <PromptForm @submit-prompt="handlePromptSubmit" />
      
      <!-- Response Area -->
      <section v-if="response" class="response-section">
        <ResponseArea :response="response" />
      </section>
      
      <!-- Optional Spacer -->
      <div class="flex-grow"></div>
    </VRow>
  </div>
</template>

<script>
import mainURL from "@/axios";
import PromptForm from "./PromptForm.vue";
import ResponseArea from "./ResponseArea.vue";

export default {
  components: {
    PromptForm,
    ResponseArea,
  },
  data() {
    return {
      response: "",
    };
  },
  methods: {
    async handlePromptSubmit(prompt) {
      this.response = ""; // Clear previous response

      const formData = new FormData();
      formData.append("prompt", prompt);
      formData.append("_method", "POST");
      const response = await mainURL.post("/run-api", formData);
      if (response.status === 200) {        
        this.response = response.data.content;          
      } else {
        this.$showToast("error", "Sorry", "Something went wrong");
      }
    },
  },
};
</script>

<style scoped>
.card-style {
  box-shadow: 9px 9px 9px rgba(20, 20, 20, 0.6);
}
</style>
