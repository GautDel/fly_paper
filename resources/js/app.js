import Alpine from 'alpinejs'
import postVote from './postVote'
import postCommentVote from './postCommentVote'
import {postNote} from './postNote'
import {deleteNote} from './postNote'
import {postLog} from './postLog'

window.postVote = postVote
window.postCommentVote = postCommentVote
window.deleteNote = deleteNote
window.postNote = postNote
window.postLog = postLog

Alpine.start();
