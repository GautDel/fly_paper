import Alpine from 'alpinejs'
import postVote from './postVote'
import postCommentVote from './postCommentVote'
import postNote from './postNote'

window.postVote = postVote
window.postCommentVote = postCommentVote
window.postNote = postNote

Alpine.start();
