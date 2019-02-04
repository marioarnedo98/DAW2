'use strict'

var moongose = require('mongoose');
var Schema= moongose.Schema;
var publicationSchema = Schema({
    text:String,
    file:String,
    created_at: String,
    user: {
        type: Schema.ObjectId,
        ref: 'User'
    },
});
module.exports = moongose.model ('Publication', publicationSchema);