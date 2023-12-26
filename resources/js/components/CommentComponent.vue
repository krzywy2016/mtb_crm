<template>
  <div>
    <label>Komentarz</label>
    <textarea class="form-control" v-model="newCommentText" @input="handleCommentInput"></textarea>
    <a href="#" class="btn btn-sm m-t-xs add-comment-warning" 
      :class="{ 'btn-primary': !isAddCommentDisabled, 'btn-secondary': isAddCommentDisabled }" 
      @click="addComment" 
      :disabled="isAddCommentDisabled"
    >Dodaj komentarz</a>
    <div class="feed-activity-list m-t">
      <div v-for="(comment, index) in comments" :key="index" class="feed-element">
        <div class="text-right m-b-xs">
          <button class="btn btn-xs btn-micro btn-danger" @click="removeComment(comment.id)">Usuń</button>
        </div>
        <div class="media-body border-l">
          <div class="pos-comment">
            <div class="well">
              {{ comment.text }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import axios from 'axios';
import Toastify from 'toastify-js';
import 'toastify-js/src/toastify.css';

export default {
  name: 'comments',
  props: ['projectId'],
  data() {
    return {
      newCommentText: "", 
      comments: [],
    };
  },
  methods: {
    handleCommentInput() {
      this.isAddCommentDisabled = this.newCommentText.length === 0;
    },
    async getComments() {
      try {
        const response = await axios.get(`/api/comment/${this.projectId}/get`);
        this.comments = response.data;
      } catch (error) {
        const errorMessage = 'Wystąpił błąd podczas pobierania komentarzy.';
        window.dispatchEvent(new CustomEvent('api-error', { detail: { message: errorMessage } }));
      }
    },
    async addComment() {
      if (this.newCommentText.length > 0) {
        try {
          const response = await axios.post(`/api/comment/${this.projectId}/store`, {
            text: this.newCommentText,
          });

          this.getComments();

          this.newCommentText = "";
        } catch (error) {
          console.error("Błąd podczas wysyłania komentarza:", error);
        }
      }
    },
    removeComment(id) {
      axios.delete(`/api/comment/${id}/destroy`)
        .then(() => {
          this.getComments();
        })
        .catch(error => {
          console.error("Błąd podczas usuwania komentarza:", error);
        });
    },
  },
  computed: {
    isAddCommentDisabled() {
      return this.newCommentText.length === 0;
    },
  },
  created() {
    this.getComments();
  },
  mounted() {
    window.addEventListener('api-error', (event) => {
        const errorMessage = event.detail.message;

        Toastify({
            text: errorMessage,
            duration: 5000,
            newWindow: true,
            close: true,
            gravity: 'top',
            position: 'right',
            backgroundColor: '#ff5757',  
        }).showToast();
    });
  }
};
</script>
