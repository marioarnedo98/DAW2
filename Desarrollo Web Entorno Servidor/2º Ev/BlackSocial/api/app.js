'use strict'
var express = require('express');
var bodyparser = require('body-parser');

var user_routes= require('./routes/user');
var follow_routes= require ('./routes/follow');
var publication_routes = require('./routes/publication')
var app = express();
//middlewares
app.use(bodyparser.urlencoded({
    extended: false
}));
app.use(bodyparser.json());

//cors

//rutes
app.use('/api', user_routes);
app.use('/api', follow_routes);
app.use('/api', publication_routes);
//exportar la conf
module.exports = app;