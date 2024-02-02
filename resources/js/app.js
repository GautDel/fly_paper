import Alpine from 'alpinejs'
import postVote from './postVote'
import postCommentVote from './postCommentVote'
import {postNote, deleteNote} from './postNote'
import {postLog, deleteLog} from './postLog'
import {getProducts,
        countProducts,
        getByAvailability,
        getProductsByPrice,
        getProductsBySearch,
        getProductsByCategory} from './product'

window.postVote = postVote

window.postCommentVote = postCommentVote

window.postNote = postNote
window.deleteNote = deleteNote

window.postLog = postLog
window.deleteLog = deleteLog

window.getProducts = getProducts
window.getProductsByCategory = getProductsByCategory
window.getByAvailability = getByAvailability
window.countProducts = countProducts
window.getProductsByPrice = getProductsByPrice
window.getProductsBySearch = getProductsBySearch

Alpine.start();
