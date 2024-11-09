<template>
  <div class="response-container">
    <div v-if="response" class="response-content">
      <div class="response-header">
        <div class="ai-avatar">
          <span class="avatar-icon">AI</span>
        </div>
        <div class="typing-indicator" v-if="isTyping">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>

      <div class="typed-text">
        <p class="text-content" ref="textContent">{{ typedText }}</p>
      </div>

      <div class="response-footer">
        <div class="actions">
          <button
            class="action-button"
            title="Copy to clipboard"
            @click="copyToClipboard"
          >
            <span class="icon" v-html="copyIcon"></span>
            <span class="tooltip" :class="{ show: showCopyTooltip }">
              {{ copyTooltipText }}
            </span>
          </button>
          <button
            class="action-button"
            title="Read aloud"
            @click="toggleSpeech"
          >
            <span class="icon">{{ isSpeaking ? "🔇" : "🔊" }}</span>
          </button>
        </div>
        <div class="timestamp">
          {{ getCurrentTime() }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { francAll } from 'franc';
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
      typedText: "",
      isTyping: false,
      isSpeaking: false,
      speechUtterance: null,
      showCopyTooltip: false,
      copyTooltipText: "Copy",
      copyIcon: "📋",
      speechSynthesis: null,
      languageMap: {
        ind: "id-ID",    // Indonesian
        eng: "en-US",    // English
        jpn: "ja-JP",    // Japanese
        ara: "ar-SA",    // Arabic
        cmn: "zh-CN",    // Mandarin Chinese
        zsm: "ms-MY",    // Malay
        kor: "ko-KR",    // Korean
        tha: "th-TH",    // Thai
        vie: "vi-VN",    // Vietnamese
        deu: "de-DE",    // German
        fra: "fr-FR",    // French
        spa: "es-ES",    // Spanish
        sun: "id-ID",    // Sundanese (fallback to Indonesian)
        jav: "id-ID",    // Javanese (fallback to Indonesian)
      },
      // Language detection confidence thresholds
      confidenceThresholds: {
        ind: 0.5,
        eng: 0.5,
        jpn: 0.6,
        ara: 0.6,
        cmn: 0.6,
        zsm: 0.6,
        kor: 0.6,
        tha: 0.6,
        vie: 0.6,
        deu: 0.5,
        fra: 0.5,
        spa: 0.5,
        sun: 0.5,
        jav: 0.5,
      },
      voiceSettings: {
        "id-ID": { rate: 0.9, pitch: 1 },
        "en-US": { rate: 0.9, pitch: 1 },
        "ja-JP": { rate: 0.8, pitch: 1.1 },
        "ar-SA": { rate: 0.85, pitch: 1 },
        "zh-CN": { rate: 0.8, pitch: 1.2 },
        "ms-MY": { rate: 0.9, pitch: 1 },
        "ko-KR": { rate: 0.8, pitch: 1.1 },
        "th-TH": { rate: 0.8, pitch: 1 },
        "vi-VN": { rate: 0.85, pitch: 1 },
        "de-DE": { rate: 0.9, pitch: 1 },
        "fr-FR": { rate: 0.9, pitch: 1 },
        "es-ES": { rate: 0.9, pitch: 1 },
      },
    };
  },
  watch: {
    response(newVal) {
      if (newVal) {
        this.typeText(newVal);
      }
    },
  },
  async mounted() {
    if (this.response) {
      this.typeText(this.response);
    }
    this.speechSynthesis = window.speechSynthesis;
    if (this.speechSynthesis) {
      await this.initVoices();
    }
  },
  beforeDestroy() {
    // Cleanup speech synthesis
    if (this.speechSynthesis && this.isSpeaking) {
      this.speechSynthesis.cancel();
    }
  },
  methods: {
    typeText(text) {
      this.typedText = "";
      this.isTyping = true;
      let index = 0;
      const typingSpeed = 30;

      const type = () => {
        if (index < text.length) {
          this.typedText += text.charAt(index);
          index++;
          this.$nextTick(() => {
            if (this.$refs.textContent) {
              this.$refs.textContent.scrollTop =
                this.$refs.textContent.scrollHeight;
            }
          });
          setTimeout(type, typingSpeed);
        } else {
          this.isTyping = false;
        }
      };
      type();
    },
    getCurrentTime() {
      const now = new Date();
      return now.toLocaleTimeString("id-ID", {
        hour: "2-digit",
        minute: "2-digit",
      });
    },
    async copyToClipboard() {
      try {
        await navigator.clipboard.writeText(this.typedText);
        this.copyIcon = "✓";
        this.copyTooltipText = "Copied!";
        this.showCopyTooltip = true;

        // Reset after 2 seconds
        setTimeout(() => {
          this.copyIcon = "📋";
          this.copyTooltipText = "Copy";
          this.showCopyTooltip = false;
        }, 2000);
      } catch (err) {
        this.copyTooltipText = "Failed to copy";
        this.showCopyTooltip = true;
        console.error("Failed to copy text: ", err);
      }
    },
    toggleSpeech() {
      if (this.isSpeaking) {
        this.stopSpeech();
      } else {
        this.startSpeech();
      }
    },
    detectLanguage(text) {
      try {
        // Get language detection results with probabilities
        const detectionResults = francAll(text, { 
          minLength: 20, // Increased minimum length for better accuracy
          only: Object.keys(this.languageMap), // Only detect languages we support
        });

        if (detectionResults && detectionResults.length > 0) {
          // Get the most likely language and its probability
          const [langCode, probability] = detectionResults[0];
          
          // Check if probability meets our threshold
          if (probability >= (this.confidenceThresholds[langCode] || 0.5)) {
            return this.languageMap[langCode];
          }

          // Special handling for Indonesian and similar languages
          if (['ind', 'zsm', 'sun', 'jav'].includes(langCode)) {
            // Additional checks for Indonesian/Malay text patterns
            const hasIndonesianMarkers = this.checkIndonesianMarkers(text);
            if (hasIndonesianMarkers) {
              return 'id-ID';
            }
          }
        }

        // Fallback to English if detection fails or confidence is low
        return 'en-US';
      } catch (error) {
        console.error('Language detection error:', error);
        return 'en-US'; // Fallback to English
      }
    },

    // Helper method to check for Indonesian language markers
    checkIndonesianMarkers(text) {
      const indonesianMarkers = [
        'yang', 'dengan', 'untuk', 'dari', 'ke', 'di', 'ini', 'itu',
        'pada', 'dalam', 'bisa', 'ada', 'akan', 'sudah', 'saya',
        'anda', 'dia', 'mereka', 'kita', 'tersebut'
      ];
      
      const lowercaseText = text.toLowerCase();
      const words = lowercaseText.split(/\s+/);
      
      // Count how many Indonesian marker words appear in the text
      const markerCount = indonesianMarkers.reduce((count, marker) => {
        return count + (words.includes(marker) ? 1 : 0);
      }, 0);

      // If we find more than 2 marker words, it's likely Indonesian
      return markerCount > 2;
    },

    startSpeech() {
      if (this.speechSynthesis) {
        this.speechSynthesis.cancel();

        try {
          // Use improved language detection
          const detectedLangCode = this.detectLanguage(this.typedText);
          console.log('Detected language:', detectedLangCode);

          this.speechUtterance = new SpeechSynthesisUtterance(this.typedText);
          this.speechUtterance.lang = detectedLangCode;

          const voices = this.speechSynthesis.getVoices();
          
          // Improved voice selection logic
          const voice = voices.find(v => v.lang === detectedLangCode) ||
                       voices.find(v => v.lang.startsWith(detectedLangCode.split('-')[0])) ||
                       voices.find(v => v.default);

          if (voice) {
            this.speechUtterance.voice = voice;
            console.log('Selected voice:', voice.name);
          }

          // Apply voice settings
          const settings = this.voiceSettings[detectedLangCode] || this.voiceSettings['en-US'];
          this.speechUtterance.rate = settings.rate;
          this.speechUtterance.pitch = settings.pitch;

          this.speechUtterance.onend = () => {
            this.isSpeaking = false;
          };

          this.speechUtterance.onerror = (event) => {
            console.error('Speech synthesis error:', event);
            this.isSpeaking = false;
          };

          this.isSpeaking = true;
          this.speechSynthesis.speak(this.speechUtterance);

        } catch (error) {
          console.error('Error in speech synthesis:', error);
          this.isSpeaking = false;
        }
      }
    },

    // Add helper method to initialize voices
    initVoices() {
      return new Promise((resolve) => {
        let voices = this.speechSynthesis.getVoices();
        if (voices.length) {
          resolve(voices);
        } else {
          this.speechSynthesis.onvoiceschanged = () => {
            voices = this.speechSynthesis.getVoices();
            resolve(voices);
          };
        }
      });
    },
    stopSpeech() {
      if (this.speechSynthesis) {
        this.speechSynthesis.cancel();
        this.isSpeaking = false;
      }
    },
  },
};
</script>

<style scoped>
.response-container {
  background-color: #ffffff;
  border-radius: 16px;
  padding: 1.5rem;
  max-width: 800px;
  width: 100%;
  margin: 1rem auto;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
}

.response-content {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.response-header {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.ai-avatar {
  width: 40px;
  height: 40px;
  background: linear-gradient(135deg, #3498db, #2980b9);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.avatar-icon {
  color: white;
  font-weight: bold;
  font-size: 0.9rem;
}

.typing-indicator {
  display: flex;
  gap: 4px;
}

.typing-indicator span {
  width: 8px;
  height: 8px;
  background-color: #3498db;
  border-radius: 50%;
  animation: bounce 1.4s infinite ease-in-out;
  opacity: 0.6;
}

.typing-indicator span:nth-child(1) {
  animation-delay: -0.32s;
}
.typing-indicator span:nth-child(2) {
  animation-delay: -0.16s;
}

@keyframes bounce {
  0%,
  80%,
  100% {
    transform: scale(0);
  }
  40% {
    transform: scale(1);
  }
}

.typed-text {
  background-color: #f8f9fa;
  border-radius: 12px;
  padding: 1.5rem;
  margin: 0.5rem 0;
}

.text-content {
  font-family: "Inter", system-ui, sans-serif;
  color: #2c3e50;
  line-height: 1.6;
  font-size: 1rem;
  margin: 0;
  white-space: pre-wrap;
  overflow-wrap: break-word;
}

.response-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 0.5rem;
  border-top: 1px solid #eee;
}

.actions {
  display: flex;
  gap: 0.5rem;
  position: relative;
}

.action-button {
  background: none;
  border: none;
  padding: 0.5rem;
  cursor: pointer;
  border-radius: 8px;
  transition: all 0.2s ease;
  position: relative;
}

.action-button:hover {
  background-color: #f0f0f0;
}

.icon {
  font-size: 1.2rem;
}

.tooltip {
  position: absolute;
  bottom: 100%;
  left: 50%;
  transform: translateX(-50%);
  padding: 4px 8px;
  background-color: #333;
  color: white;
  border-radius: 4px;
  font-size: 0.8rem;
  opacity: 0;
  visibility: hidden;
  transition: all 0.2s ease;
  white-space: nowrap;
  margin-bottom: 5px;
}

.tooltip:after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  transform: translateX(-50%);
  border: 4px solid transparent;
  border-top-color: #333;
}

.tooltip.show {
  opacity: 1;
  visibility: visible;
}

.timestamp {
  color: #666;
  font-size: 0.9rem;
}

@media (max-width: 640px) {
  .response-container {
    margin: 0.5rem;
    padding: 1rem;
  }

  .typed-text {
    padding: 1rem;
  }

  .text-content {
    font-size: 0.95rem;
  }
}
</style>
