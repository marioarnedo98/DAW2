'use strict'
//load express router
var express = require('express');
var FollowController = require('../controllers/follow');
var multipart = require ('connect-multiparty');
var md_auth = require ('../middleware/authentication');
var api= express.Router();
var md_upload = multipart({
    uploadDir: './uploads/users'
});


//routes
api.get('/pruebas-follow', FollowController.prueba_follow);
api.post('/follow/', md_auth.ensureAuth, FollowController.saveFollow);
api.delete('/unfollow/:id',md_auth.ensureAuth, FollowController.deleteFollow)
module.exports = api;