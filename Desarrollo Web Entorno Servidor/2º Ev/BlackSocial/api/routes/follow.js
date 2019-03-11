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
api.delete('/unfollow/:id',md_auth.ensureAuth, FollowController.deleteFollow);
api.get('/following/:id?/:page?', md_auth.ensureAuth, FollowController.getFollowedUsers);
api.get('/getFollowingUsers/:id?/:page?', md_auth.ensureAuth, FollowController.getFollowingUsers)
api.get('/MyFollows/:id?', md_auth.ensureAuth, FollowController.getMyFollows);
module.exports = api;