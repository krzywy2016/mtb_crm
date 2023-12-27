import {createApp} from 'vue'

import CommentComponent from './components/CommentComponent.vue'

const commentComponentAppElement = document.getElementById('commentComponentApp');

if (commentComponentAppElement) {
  const app = createApp(CommentComponent, { projectId: commentComponentAppElement.dataset.projectId });
  app.mount("#commentComponentApp");
}

