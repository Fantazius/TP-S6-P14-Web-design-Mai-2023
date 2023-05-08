var input = document.getElementById('imagefile');
var wrapper = document.getElementById('wrapper');
var visuel = document.getElementById('visuel');

const WIDTH = 500
const HEIGHT = 300

function getRatio(width,height) {
    if (width>height) {
        return WIDTH/width;
    }else{
        return HEIGHT/height;
    }

}

input.addEventListener('change', function (event) {

    let image_file = event.target.files[0];

    let reader = new FileReader();
    reader.readAsDataURL(image_file);

    reader.onload = (event) => {
        let img_url = event.target.result;
        console.log("img_url="+img_url);

        let image = document.createElement("img");
        image.src = img_url;

        image.onload = (e) => {
            let canvas = document.createElement("canvas");
            let ratio = getRatio(e.target.width,e.target.height);
            canvas.width = e.target.width*ratio;
            canvas.height = e.target.height * ratio;

            const context = canvas.getContext("2d");
            context.drawImage(image, 0, 0, canvas.width, canvas.height);
            var mimeType = image_file.type
            let new_img_url = context.canvas.toDataURL(mimeType, 95);

            let new_image = document.createElement("img");
            new_image.src = new_img_url;

            console.log("Image URL="+new_img_url);
//remove all child
            while (wrapper.firstChild) {
                wrapper.removeChild(wrapper.lastChild);
            }

            wrapper.appendChild(new_image);
            visuel.value=new_img_url;
        }

    };

    console.log(reader);
});