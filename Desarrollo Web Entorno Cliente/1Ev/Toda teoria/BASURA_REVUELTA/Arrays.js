var a = [4, 0, 3, 4, 7, 3, 5, 8, 1, 8, 8, 0, 2, 3, 1, 2, 5, 7, 3, 2, 5, 1];

uniqueArray = a.filter(function (item, pos) {
    return a.indexOf(item) == pos;
})