import Alpine from 'alpinejs'
import postVote from './postVote'
import postCommentVote from './postCommentVote'
import {postNote} from './postNote'
import {deleteNote} from './postNote'
import {postLog} from './postLog'
import {deleteLog} from './postLog'
import {getProductsByCategory} from './product'

window.postVote = postVote
window.postCommentVote = postCommentVote
window.postNote = postNote
window.deleteNote = deleteNote
window.postLog = postLog
window.deleteLog = deleteLog
window.getProductsByCategory = getProductsByCategory

Alpine.start();
