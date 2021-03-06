// defining a single global object (wolfman_vampire) and adding some functions in to its prototype (eg preload, create functions)

var wolfman_vampire = {};


wolfman_vampire.State001 = function (game) {


};

wolfman_vampire.State001.prototype = {

    preload: function () {

        //  You can fill the preloader with as many assets as your game requires

        //  Here we are loading an image. The first parameter is the unique
        //  string by which we'll identify the image later in our code.

        //  The second parameter is the URL of the image (relative)
        this.load.image('plate', '019_wolfman_vampire.jpg');

    },
    create: function () {

        //  This creates a simple sprite that is using our loaded image and
        //  displays it on-screen and assign it to a variable
        var image = this.add.sprite(game.world.centerX, game.world.centerY, 'plate');

        //  Moves the image anchor to the middle, so it centers inside the game properly
        image.anchor.set(0.5);

    }
}
