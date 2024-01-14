import Alpine from 'alpinejs'
import postVote from './postVote'
import postCommentVote from './postCommentVote'
import {postNote} from './postNote'
import {deleteNote} from './postNote'

window.postVote = postVote
window.postCommentVote = postCommentVote
window.deleteNote = deleteNote
window.postNote = postNote

Alpine.start();
