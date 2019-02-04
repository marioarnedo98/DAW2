'use strict'

var moongose = require('mongoose');
var Schema= moongose.Schema;
var messageSchema = Schema({
    enmiter: {
        type: Schema.ObjectId,
        ref: 'User'
    },
    receiver:{
        type: Schema.ObjectId,
        ref: 'User'
    },
    text: String,
    created_at: String,
});
module.exports = moongose.model ('Messages', messageSchema);