import {createApp} from 'vue'

import CommentComponent from './components/CommentComponent.vue'

const app = createApp(CommentComponent, { projectId: document.getElementById('commentComponentApp').dataset.projectId });
app.mount("#commentComponentApp");

