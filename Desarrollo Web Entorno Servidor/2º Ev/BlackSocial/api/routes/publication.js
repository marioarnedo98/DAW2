'use strict'
//load express router
var express = require('express');
var publicationController = require('../controllers/publication');
var multipart = require ('connect-multiparty');
var md_auth = require ('../middleware/authentication');
var api= express.Router();
var md_upload = multipart({
    uploadDir: './uploads/users'
});


//routes
api.get('/testeo', md_auth.ensureAuth, publicationController.prueba_publication);
api.post('/publicacion', md_auth.ensureAuth, publicationController.savePublication);
api.post('/getpublications', md_auth.ensureAuth, publicationController.getPublications);
module.exports = api;