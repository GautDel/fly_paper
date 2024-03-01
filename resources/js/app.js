import Alpine from 'alpinejs'
import postVote from './postVote'
import postCommentVote from './postCommentVote'
import { postNote, deleteNote } from './postNote'
import { postLog, deleteLog } from './postLog'
import {
    getProducts,
    getByFilter,
    cart,
    getProductsByCategory
} from './product'


import {reset, range} from './range'
import { findProduct, generateSku } from './findProduct'

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
window.cart = cart

// RANGE
window.reset = reset
window.range = range

// POSTVOTE
window.findProduct = findProduct
window.generateSku = generateSku

Alpine.start();
