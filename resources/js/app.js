import Alpine from 'alpinejs'
import postVote from './postVote'
import postCommentVote from './postCommentVote'
import { postNote, deleteNote } from './postNote'
import { postLog, deleteLog } from './postLog'
import {
    getProducts,
    getByFilter,
    getProductsByCategory
} from './product'

window.postVote = postVote

window.postCommentVote = postCommentVote

window.postNote = postNote
window.deleteNote = deleteNote

window.postLog = postLog
window.deleteLog = deleteLog

window.getProducts = getProducts
window.getProductsByCategory = getProductsByCategory
window.getByFilter = getByFilter

Alpine.start();
