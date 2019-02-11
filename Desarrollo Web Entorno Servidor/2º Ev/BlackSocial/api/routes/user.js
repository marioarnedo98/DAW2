'use strict'
//load express router
var express = require('express');
var UserController = require('../controllers/user');
var md_auth = require ('../middleware/authentication');
var api= express.Router();


//routes
api.get('/home', UserController.home);
api.get('/pruebas', md_auth.ensureAuth, UserController.pruebas);
api.get('/register', UserController.saveUser);
api.get('/login', UserController.login);
api.get('/user/:id', md_auth.ensureAuth, UserController.getUser);
api.get('/users/:page?', md_auth.ensureAuth, UserController.getUsers);
module.exports = api;