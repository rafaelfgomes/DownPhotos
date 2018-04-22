
function fix (img){


    window.EXIF.getData(img, function () {
        var orientation = EXIF.getTag(this, "Orientation");
        var canvas = window.loadImage.scale(img, {orientation: orientation || 0, canvas: true});
        document.getElementById("fixed").appendChild(canvas); 
        // or using jquery $("#container").append(canvas);

    });
}


