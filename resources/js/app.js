import Alpine from 'alpinejs'
import postVote from './postVote'
import postCommentVote from './postCommentVote'
import {postNote} from './postNote'
import {deleteNote} from './postNote'
import {postLog} from './postLog'
import {deleteLog} from './postLog'

window.postVote = postVote
window.postCommentVote = postCommentVote
window.postNote = postNote
window.deleteNote = deleteNote
window.postLog = postLog
window.deleteLog = deleteLog

Alpine.start();
