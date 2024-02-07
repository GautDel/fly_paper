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

import {reset, range} from './range'

// POSTVOTE
window.postVote = postVote

// POSTCOMMENT
window.postCommentVote = postCommentVote

// POSTNOTE
window.postNote = postNote
window.deleteNote = deleteNote

// POSTLOG
window.postLog = postLog
window.deleteLog = deleteLog

// PRODUCT
window.getProducts = getProducts
window.getProductsByCategory = getProductsByCategory
window.getByFilter = getByFilter

// RANGE
window.reset = reset
window.range = range

Alpine.start();
