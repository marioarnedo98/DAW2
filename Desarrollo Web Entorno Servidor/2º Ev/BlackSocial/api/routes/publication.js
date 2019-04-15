'use strict'
//load express router
var express = require('express');
var publicationController = require('../controllers/publication');
var multipart = require ('connect-multiparty');
var md_auth = require ('../middleware/authentication');
var api= express.Router();
var md_upload = multipart({
    uploadDir: './uploads/publications'
});


//routes
api.get('/testeo', md_auth.ensureAuth, publicationController.prueba_publication);
api.post('/publicacion', md_auth.ensureAuth, publicationController.savePublication);
api.get('/publication/:id', md_auth.ensureAuth, publicationController.getPublication);
api.get('/publications/:page?', md_auth.ensureAuth, publicationController.getPublications);
api.delete('/publications/delete/:id', md_auth.ensureAuth, publicationController.deletePublication);
api.post('/publications/upload-image/:id', [md_auth.ensureAuth, md_upload], publicationController.uploadImage);
api.get('/publication/image/:imageFile', publicationController.getImageFile);
module.exports = api;