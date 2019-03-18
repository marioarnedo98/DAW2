'use strict'
//load express router
var express = require('express');
var UserController = require('../controllers/user');
var multipart = require ('connect-multiparty');
var md_auth = require ('../middleware/authentication');
var api= express.Router();
var md_upload = multipart({
    uploadDir: './uploads/users'
});


//routes
api.get('/home', UserController.home);
api.get('/pruebas', md_auth.ensureAuth, UserController.pruebas);
api.get('/register', UserController.saveUser);
api.get('/login', UserController.login);
api.get('/user/:id', md_auth.ensureAuth, UserController.getUser);
api.get('/users/:page?', md_auth.ensureAuth, UserController.getUsers);
api.put('/users/update/:id',md_auth.ensureAuth, UserController.updateUser);
api.post('/upload-image-user/:id', [md_auth.ensureAuth, md_upload], UserController.uploadImage);
api.get('/users/image/:imageFile', UserController.getImageFile);
api.get('users/conters/:id?', UserController.getCounters);
module.exports = api;